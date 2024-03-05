<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class LalamoveAPIBodyHelper
{
    private $arr_service_type = [
        'MOTORCYCLE' => [
            'min_weight' => '0',
            'max_weight' => '10'
        ],
        'SEDAN200KG' => [
            'min_weight' => '10',
            'max_weight' => '200'
        ],
        'MPV300KG' => [
            'min_weight' => '200',
            'max_weight' => '300'
        ],
        'MPV600KG' => [
            'min_weight' => '300',
            'max_weight' => '600'
        ],
    ];

    public $priceBreakdown = [], $quotation = [], $total_delivery_fee = 0.0, $sender = null, $recipient = null;

    public function setQuoteData($data){
        extract($data);

        // ship to coordinates
        $ship_to = [
            "coordinates" => [
                'lat' => (string) $selectedDeliveryAddress['lat'],
                'lng' => (string) $selectedDeliveryAddress['lng'],
            ],
            "address" => "{$selectedDeliveryAddress['address']}, {$selectedDeliveryAddress['city']}, {$selectedDeliveryAddress['state']}, {$selectedDeliveryAddress['country']}, {$selectedDeliveryAddress['pincode']}"
        ];

        $body = [
            'serviceType' => '',
            'language' => 'en_PH',
            'stops' => [],
            'item' => [
                'quantity' => (string) $total_qty,
                'weight' => '',
                'categories' => $categories,
                'handlingInstructions' => []
            ],
            'isRouteOptimized' => true,
        ];

        // set service type
        foreach ($this->arr_service_type as $key => $service_type_weight) {
            if ($service_type_weight['min_weight'] <= $total_weight && $total_weight <= $service_type_weight['max_weight'])
                $body['serviceType'] = $key; $body['item']['weight'] = (string) $total_weight;
        }

        $responses = [];

        // set stops
        foreach ($pickupAddresses as $pickup_address) {
            $body['stops'] = [
                [
                    "coordinates" => [
                        'lat' => (string) $pickup_address['lat'],
                        'lng' => (string) $pickup_address['long'],
                    ],
                    'address' => $pickup_address['shop_fulladdress']
                ], $ship_to
            ];
            
            $responses[] = $this->processLalamove(json_encode(['data' => $body]));
        }

        $this->quotation = $responses;

        return $this;
    }

    public function getTotal_PriceBreakdown () {
        $col_quotations = collect($this->quotation);
        $this->priceBreakdown = $col_quotations->pluck('data.priceBreakdown');
        $this->total_delivery_fee = $col_quotations->pluck('data.priceBreakdown.total')->sum();
        return $this;
    }
    public function getQuote() {
        $data = [];
        foreach ($this as $key => $value) {
            if (is_array($value)) {
                if (!empty($value)) $data[$key] = $value;
            } else {
                if (!is_null($value)) $data[$key] = $value;
            }
        }

        return ["data" => $data];
    }

    public function getQuotation ($order_id, $vendor_id) {
        $order_model = new \App\Models\Order;
        $user_model = new \App\Models\User;
        $vendor_model = new \App\Models\Vendor;

        $order = $order_model->with('orders_products_categories')->find($order_id);
        // dd($order);
        // create quotation body
        $body = [
            'serviceType' => '',
            'language' => 'en_PH',
            'stops' => [],
            'item' => [
                'quantity' => (string) $order->orders_products_categories->pluck('product_qty')->sum(),
                'weight' => (string) $order->total_weight,
                'categories' => $order->orders_products_categories->pluck('product_category.category_name')->toArray(),
                'handlingInstructions' => []
            ],
            'isRouteOptimized' => true,
        ];

        // set service type
        foreach ($this->arr_service_type as $key => $service_type_weight) {
            if ($service_type_weight['min_weight'] <= $order->total_weight && $order->total_weight <= $service_type_weight['max_weight']) {
                $body['serviceType'] = $key;
            }
        }
        
        // set stops
        // get vendor details
        $vendor = $vendor_model->with('vendorbusinessdetails')->find($vendor_id);
        $this->sender = $vendor;
        $vendor_address = "{$vendor->vendorbusinessdetails->shop_name}, {$vendor->vendorbusinessdetails->shop_address}, {$vendor->vendorbusinessdetails->shop_city}, {$vendor->vendorbusinessdetails->shop_state}, {$vendor->vendorbusinessdetails->country}, {$vendor->vendorbusinessdetails->shop_pincode}";

        $body['stops'] = [
            [ // vendor stop
                'coordinates' => [
                    'lat' => (string) $vendor->vendorbusinessdetails['lat'],
                    'lng' => (string) $vendor->vendorbusinessdetails['long']
                ],
                "address" => $vendor_address
            ],
            [ // recipient stop
                'coordinates' => [
                    'lat' => (string) $order->lat,
                    'lng' => (string) $order->lng
                ],
                "address" => "{$order->address}, {$order->city}, {$order->state}, {$order->country}, {$order->pincode}"
            ]
        ];

        $this->recipient = $user_model->find($order->user_id);
        $this->quotation = $this->processLalamove(json_encode(["data" => $body]));

        return $this;
    }

    public function processLalamove($body) {
        $secret = config('app.lalamove.api_secret');

        $key = config('app.lalamove.api_key');
        $url = config('app.lalamove.api_url');

        $time = time() * 1000;

        // $baseURL = 'https://rest.sandbox.lalamove.com'; // URL to Lalamove Sandbox API
        $method = 'POST';
        $path = '/v3/quotations';

        $rawSignature = "{$time}\r\n{$method}\r\n{$path}\r\n\r\n{$body}";
        $signature = hash_hmac("sha256", $rawSignature, $secret);
        $token = "{$key}:{$time}:{$signature}";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url.$path,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 3,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HEADER => false, // Enable this option if you want to see what headers Lalamove API returning in response
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_HTTPHEADER => array(
                "Content-type: application/json; charset=utf-8",
                "Authorization: hmac ".$token, // A unique Signature Hash has to be generated for EVERY API call at the time of making such call.
                "Accept: application/json",
                "Market: PH" // Please note to which city are you trying to make API call
            ),
        ));

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        $json_decoded_response = json_decode($response);

        return $json_decoded_response;
    }
}

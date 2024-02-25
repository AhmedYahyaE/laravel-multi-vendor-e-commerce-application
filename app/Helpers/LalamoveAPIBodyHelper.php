<?php
namespace App\Helpers;

class LalamoveAPIBodyHelper
{
    public $serviceType = "MOTORCYCLE", $specialRequests = [], $language = "en_PH", $isRouteOptimized = true;

    public $quotationId = null, $sender = [], $recipients = [], $priceBreakdown = [], $metadata = [];
    
    public $stops = [
        'coordinates' => [],
        'address' => "",
        'name' => "",
        'phone' => ""
    ];
    
    public $item = [
        'weight' => "",
        'categories' => [],
        'quantity' => ""
    ];

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

    public function getPlaceOrder(){
        return json_encode([
            "data" => [
                'quotationId' => $this->quotationId,
                'sender' => $this->sender,
                'recipients' => $this->recipients,
                'metadata' => $this->metadata
            ]
        ]);
    }
}

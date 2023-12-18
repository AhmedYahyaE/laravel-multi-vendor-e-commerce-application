<?php


// Using Omnipay PayPal package    "composer require league/omnipay omnipay/paypal"    :https://github.com/thephpleague/omnipay-paypal.    // https://github.com/thephpleague/omnipay    
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Models\Order;
use App\Models\ProductsAttribute;

use Omnipay\Omnipay;



class PaypalController extends Controller
{
    // PayPal Gateway Integration



    // Using Omnipay PayPal package    "composer require league/omnipay omnipay/paypal"    :https://github.com/thephpleague/omnipay-paypal.    // https://omnipay.thephpleague.com/simple-example    // https://github.com/thephpleague/omnipay    
    private $gateway; // $gateway is an object of    Omnipay\Common\GatewayFactory interface (check the first line of code in the __construct() method)


    public function __construct() {
        // Setup payment gateway
        $this->gateway = Omnipay::create('PayPal_Rest'); // https://github.com/thephpleague/omnipay-paypal#:~:text=PayPal_Rest%20(Paypal%20Rest%20API)
        // dd($this->gateway);

        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));   // We get the "PayPal Client ID" from our project's .env file using the env() method    // env(): https://laravel.com/docs/9.x/helpers#method-env
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET')); // We get the "PayPal Secret"    from our project's .env file using the env() method    // env(): https://laravel.com/docs/9.x/helpers#method-env
        $this->gateway->setTestMode(true); // Meaning that we're using this whole thing only for "testing" purposes
    }

    // Pay using PayPal    // https://omnipay.thephpleague.com/simple-example    // https://github.com/thephpleague/omnipay    
    public function pay(Request $request) {
        try {
            $paypal_amount = round(Session::get('grand_total') / 80, 2); // 'grand_total' was stored in Session in checkout() method in Front/ProductsController.php    // Interacting With The Session: Retrieving Data: https://laravel.com/docs/9.x/session#retrieving-data    // Note: PayPal accepts world major currencies ONLY, so we divided INR by 80 to convert INR to USD

            // Send purchase request
            $response = $this->gateway->purchase(array( // $gateway is an object of    Omnipay\Common\GatewayFactory interface (check the first line of code in the __construct() method)    // $response comes from PayPal website (i.e. API / backend)
                // Example form data
                'amount'    => $paypal_amount,
                'currency'  => env('PAYPAL_CURRENCY'), // We get our chosen "PayPal Currency" from our project's .env file using the env() method    // env(): https://laravel.com/docs/9.x/helpers#method-env
                'returnUrl' => url('success'), // url(): https://laravel.com/docs/10.x/helpers#method-url    // https://github.com/thephpleague/omnipay#:~:text=clientIp-,returnUrl,-cancelUrl
                'cancelUrl' => url('error')    // url(): https://laravel.com/docs/10.x/helpers#method-url    // https://github.com/thephpleague/omnipay#:~:text=returnUrl-,cancelUrl
            ))->send();
            // dd($response);

            // Process response
            if ($response->isRedirect()) { // $response comes from PayPal website (i.e. API / backend)
                // Redirect to offsite payment gateway
                $response->redirect(); // $response comes from PayPal website (i.e. API / backend)
            } else {
                // payment failed: display message to customer
                return $response->getMessage(); // $response comes from PayPal website (i.e. API / backend)    // the message comes from PayPal website (i.e. API / backend)
            }

        } catch (\Throwable $th) {    // $th object stands for the Throwable interface    // Throwable interface: https://www.php.net/manual/en/class.throwable.php
            return $th->getMessage(); // $th object stands for the Throwable interface    // Throwable::getMessage(): https://www.php.net/manual/en/throwable.getmessage.php
        }
    }

    
    public function success(Request $request) {
        if (!Session::has('order_id')) { // if there's no 'order_id' in the Session    // 'user_id' was stored in the Session inside checkout() method in Front/ProductsController.php
            return view('cart');
        }


        if ($request->input('paymentId') && $request->input('PayerID')) { // Retrieving An Input Value: https://laravel.com/docs/9.x/requests#retrieving-an-input-value
            $transaction = $this->gateway->completePurchase(array(
                'payer_id'             => $request->input('PayerID'), // Retrieving An Input Value: https://laravel.com/docs/9.x/requests#retrieving-an-input-value
                'transactionReference' => $request->input('paymentId'), // Retrieving An Input Value: https://laravel.com/docs/9.x/requests#retrieving-an-input-value
            ));

            $response = $transaction->send(); // $response comes from PayPal website (i.e. API / backend)

            if ($response->isSuccessful()) { // If the payment is successful, insert the payment details into our `payments` database table    // $response comes from PayPal website (i.e. API / backend)
                $arr = $response->getData(); // $response comes from PayPal website (i.e. API / backend)

                // Insert the payment details into our `payments` table
                $payment = new \App\Models\Payment;

                $payment->order_id       = Session::get('order_id'); // 'user_id' was stored in Session inside checkout() method in Front/ProductsController.php    // Interacting With The Session: Retrieving Data: https://laravel.com/docs/9.x/session#retrieving-data    // Comes from our website
                $payment->user_id        = Auth::user()->id; // Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user    // Comes from our website
                $payment->payment_id     = $arr['id']; // Comes from PayPal website (i.e. API / backend)    // Comes from PayPal website (i.e. API / backend)
                $payment->payer_id       = $arr['payer']['payer_info']['payer_id'];    // Comes from PayPal website (i.e. API / backend)
                $payment->payer_email    = $arr['payer']['payer_info']['email'];       // Comes from PayPal website (i.e. API / backend)
                $payment->amount         = $arr['transactions'][0]['amount']['total']; // Comes from PayPal website (i.e. API / backend)
                $payment->currency       = env('PAYPAL_CURRENCY'); // We get our chosen "PayPal Currency" from our project's .env file using the env() method    // env(): https://laravel.com/docs/9.x/helpers#method-env    // Comes from our website
                $payment->payment_status = $arr['state']; // Comes from PayPal website (i.e. API / backend)

                $payment->save();


                // Update the `order_status` column in `orders` table with 'Paid'    
                $order_id = Session::get('order_id'); // Interacting With The Session: Retrieving Data: https://laravel.com/docs/9.x/session#retrieving-data
                Order::where('id', $order_id)->update(['order_status' => 'Paid']);


                // Send making the order PayPal payment confirmation email to the user    
                $orderDetails = Order::with('orders_products')->where('id', $order_id)->first()->toArray(); // Eager Loading: https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // 'orders_products' is the relationship method name in Order.php model
                $email = Auth::user()->email; // Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user

                // The email message data/variables that will be passed in to the email view
                $messageData = [
                    'email'        => $email,
                    'name'         => Auth::user()->name, // Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user
                    'order_id'     => $order_id,
                    'orderDetails' => $orderDetails
                ];

                \Illuminate\Support\Facades\Mail::send('emails.order', $messageData, function ($message) use ($email) { // Sending Mail: https://laravel.com/docs/9.x/mail#sending-mail    // 'emails.order' is the order.blade.php file inside the 'resources/views/emails' folder that will be sent as an email    // We pass in all the variables that order.blade.php will use    // https://www.php.net/manual/en/functions.anonymous.php
                    $message->to($email)->subject('Order Paid through PayPal - MultiVendorEcommerceApplication.com.eg');
                });


                // Inventory Management - Reduce inventory/stock when an order gets placed
                // We wrote the Inventory/Stock Management script in TWO places: in the checkout() method in Front/ProductsController.php and in the success() method in Front/PaypalController.php
                foreach ($orderDetails['orders_products'] as $key => $order) {
                    $getProductStock = ProductsAttribute::getProductStock($order['product_id'], $order['product_size']); // Get the `stock` of that product `product_id` with that specific `size` from `products_attributes` table

                    $newStock = $getProductStock - $order['product_qty']; // The new product `stock` is the original stock reduced by the order `quantity`

                    ProductsAttribute::where([ // Update the new `quantity` in the `products_attributes` table
                        'product_id' => $order['product_id'],
                        'size'       => $order['product_size']
                    ])->update(['stock' => $newStock]);
                }


                // We empty the Cart after making the PayPal payment
                \App\Models\Cart::where('user_id', Auth::user()->id)->delete(); // Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user


                // Redirect the user to the front/products/success.blade.php page
                return view('front.paypal.success');

            } else { // If the payment fails
                // payment failed: display message to customer
                return $response->getMessage(); // $response comes from PayPal website (i.e. API / backend)    // the message comes from PayPal website (i.e. API / backend)
            }

        } else {
            return 'Payment Declined!';
        }
    }

    
    public function error() {
        // return 'User declined the payment';

        
        return view('front.paypal.fail');
    }



    // PayPal payment gateway integration in Laravel (this route is accessed from checkout() method in Front/ProductsController.php). Rendering front/paypal/paypal.blade.php page
    public function paypal() {
        if (Session::has('order_id')) { // if there's an order has been placed (and got redirected from inside the checkout() method inside Front/ProductsController.php)    // 'user_id' was stored in Session inside checkout() method in Front/ProductsController.php
            return view('front.paypal.paypal');

        } else { // if there's no order has been placed
            return redirect('cart'); // redirect user to cart.blade.php page
        }
    }

}
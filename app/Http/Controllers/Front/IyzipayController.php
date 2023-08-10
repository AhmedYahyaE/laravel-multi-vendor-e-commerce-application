<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IyzipayController extends Controller
{
    // iyzico Payment Gateway integration in/with Laravel    
    // https://github.com/iyzico/iyzipay-php



    // iyzico payment gateway integration in Laravel (this route is accessed from checkout() method in Front/ProductsController.php). Rendering front/iyzipay/iyzipay.blade.php page
    public function iyzipay() {
        if (Session::has('order_id')) { // if there's an order has been placed (and got redirected from inside the checkout() method inside Front/ProductsController.php)    // 'user_id' was stored in Session inside checkout() method in Front/ProductsController.php
            return view('front.iyzipay.iyzipay');

        } else { // if there's no order has been placed
            return redirect('cart'); // redirect user to cart.blade.php page
        }
    }

    // Make an iyzipay payment (redirect the user to iyzico payment gateway with the order details)    
    public function pay() {
        // dd(Session::get('order_id')); // 'order_id' was stored in the Session in checkout() method in Front/ProductsController.php    // Interacting With The Session: Retrieving Data: https://laravel.com/docs/9.x/session#retrieving-data
        $orderDetails = \App\Models\Order::with('orders_products')->where('id', Session::get('order_id'))->first()->toArray(); // Eager Loading: https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // 'order_id' was stored in the Session in checkout() method in Front/ProductsController.php    // Interacting With The Session: Retrieving Data: https://laravel.com/docs/9.x/session#retrieving-data
        // dd($orderDetails);

        $nameArr = explode(' ', $orderDetails['name']); // to separate the First Name and Last Name to be able to send them with the data sent with the iyzico integrated service down below
        // dd($nameArr);

        $options = \App\Models\Iyzipay::options();



        // This is a dummy request with dummy data    // Copied from: https://dev.iyzipay.com/en/iyzico-ile-ode/intialize#:~:text=request%20and%20response-,payWithIyzicoPageUrl,-value%20in%20the    
        // We replace this expample's dummy data with our real data of the order details
        $request = new \Iyzipay\Request\CreatePayWithIyzicoInitializeRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        // $request->setConversationId("123456789"); // dummy data
        $request->setConversationId(Session::get('order_id')); // real data (our order details)    // 'order_id' was stored in the Session in checkout() method in Front/ProductsController.php    // Interacting With The Session: Retrieving Data: https://laravel.com/docs/9.x/session#retrieving-data
        // $request->setPrice("1"); // dummy data
        $request->setPrice(Session::get('grand_total')); // real data (our order details)    // 'grand_total' was stored in the Session in checkout() method in Front/ProductsController.php    // Interacting With The Session: Retrieving Data: https://laravel.com/docs/9.x/session#retrieving-data
        // $request->setPaidPrice("1.2"); // dummy data
        $request->setPaidPrice(Session::get('grand_total')); // real data (our order details)    // 'grand_total' was stored in the Session in checkout() method in Front/ProductsController.php    // Interacting With The Session: Retrieving Data: https://laravel.com/docs/9.x/session#retrieving-data
        $request->setCurrency(\Iyzipay\Model\Currency::TL);
        // $request->setBasketId("B67832"); // dummy data
        $request->setBasketId(Session::get('order_id')); // real data (our order details)    // 'order_id' was stored in the Session in checkout() method in Front/ProductsController.php    // Interacting With The Session: Retrieving Data: https://laravel.com/docs/9.x/session#retrieving-data
        $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
        $request->setCallbackUrl("https://www.merchant.com/callback");
        $request->setEnabledInstallments(array(2, 3, 6, 9));
        $buyer = new \Iyzipay\Model\Buyer();
        // $buyer->setId("BY789"); // dummy data
        $buyer->setId($orderDetails['user_id']); // real data (our order details)    // user_id
        // $buyer->setName("John"); // dummy data
        $buyer->setName($nameArr[0]); // real data (our order details)
        // $buyer->setSurname("Doe"); // dummy data
        $buyer->setSurname($nameArr[1] ?? 'Not set'); // real data (our order details)
        $buyer->setGsmNumber("+905350000000"); // dummy data
        // $buyer->setEmail("email@email.com"); // dummy data
        $buyer->setEmail($orderDetails['email']); // real data (our order details)
        $buyer->setIdentityNumber("74300864791"); // dummy data
        // $buyer->setLastLoginDate("2015-10-05 12:43:35"); // dummy data
        $buyer->setLastLoginDate(""); // real data (our order details)    // Not mandatory (from the Documentation: https://dev.iyzipay.com/en/iyzico-ile-ode/intialize#:~:text=Sample%20Codes-,Request,-Parameters%20to%20be)
        // $buyer->setRegistrationDate("2013-04-21 15:12:09"); // dummy data
        $buyer->setRegistrationDate(""); // real data (our order details)    // Not mandatory (from the Documentation: https://dev.iyzipay.com/en/iyzico-ile-ode/intialize#:~:text=Sample%20Codes-,Request,-Parameters%20to%20be)
        // $buyer->setRegistrationAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1"); // dummy data
        $buyer->setRegistrationAddress($orderDetails['address']); // real data (our order details)
        // $buyer->setIp("85.34.78.112"); // dummy data
        $buyer->setIp(""); // real data (our order details)    // Not mandatory (from the Documentation: https://dev.iyzipay.com/en/iyzico-ile-ode/intialize#:~:text=Sample%20Codes-,Request,-Parameters%20to%20be)
        // $buyer->setCity("Istanbul"); // dummy data
        $buyer->setCity($orderDetails['city']); // real data (our order details)
        // $buyer->setCountry("Turkey"); // dummy data
        $buyer->setCountry($orderDetails['country']); // real data (our order details)
        // $buyer->setZipCode("34732"); // dummy data
        $buyer->setZipCode($orderDetails['pincode']); // real data (our order details)
        $request->setBuyer($buyer); // dummy data
        $shippingAddress = new \Iyzipay\Model\Address(); // dummy data
        // $shippingAddress->setContactName("Jane Doe"); // dummy data
        $shippingAddress->setContactName($orderDetails['name']); // real data (our order details)
        // $shippingAddress->setCity("Istanbul"); // dummy data
        $shippingAddress->setCity($orderDetails['city']); // real data (our order details)
        // $shippingAddress->setCountry("Turkey"); // dummy data
        $shippingAddress->setCountry($orderDetails['country']); // real data (our order details)
        // $shippingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1"); // dummy data
        $shippingAddress->setAddress($orderDetails['address']); // real data (our order details)
        // $shippingAddress->setZipCode("34742"); // dummy data
        $shippingAddress->setZipCode($orderDetails['pincode']); // real data (our order details)
        $request->setShippingAddress($shippingAddress); // dummy data
        $billingAddress = new \Iyzipay\Model\Address(); // dummy data
        // $billingAddress->setContactName("Jane Doe"); // dummy data
        $billingAddress->setContactName($orderDetails['name']); // real data (our order details)
        // $billingAddress->setCity("Istanbul"); // dummy data
        $billingAddress->setCity($orderDetails['city']); // real data (our order details)
        // $billingAddress->setCountry("Turkey"); // dummy data
        $billingAddress->setCountry($orderDetails['country']); // real data (our order details)
        // $billingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1"); // dummy data
        $billingAddress->setAddress($orderDetails['address']); // real data (our order details)
        // $billingAddress->setZipCode("34742"); // dummy data
        $billingAddress->setZipCode($orderDetails['pincode']); // real data (our order details)
        $request->setBillingAddress($billingAddress); // dummy data
        $basketItems = array(); // dummy data
        $firstBasketItem = new \Iyzipay\Model\BasketItem(); // dummy data
        // $firstBasketItem->setId("BI101"); // dummy data
        $firstBasketItem->setId(Session::get('order_id')); // real data (our order details)    // 'order_id' was stored in the Session in checkout() method in Front/ProductsController.php    // Interacting With The Session: Retrieving Data: https://laravel.com/docs/9.x/session#retrieving-data
        // $firstBasketItem->setName("Binocular"); // dummy data
        $firstBasketItem->setName("Order ID: " . Session::get('order_id')); // real data (our order details)    // 'order_id' was stored in the Session in checkout() method in Front/ProductsController.php    // Interacting With The Session: Retrieving Data: https://laravel.com/docs/9.x/session#retrieving-data
        // $firstBasketItem->setCategory1("Collectibles"); // dummy data
        $firstBasketItem->setCategory1("Multi-vendor E-commerce Application Product"); // real data (our order details)
        // $firstBasketItem->setCategory2("Accessories"); // dummy data
        $firstBasketItem->setCategory2("");// Not mandatory (from the Documentation: https://dev.iyzipay.com/en/iyzico-ile-ode/intialize#:~:text=Sample%20Codes-,Request,-Parameters%20to%20be)
        $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL); // dummy data
        // $firstBasketItem->setPrice("0.3"); // dummy data
        $firstBasketItem->setPrice(Session::get('grand_total')); // real data (our order details)    // 'grand_total' was stored in the Session in checkout() method in Front/ProductsController.php    // Interacting With The Session: Retrieving Data: https://laravel.com/docs/9.x/session#retrieving-data
        $basketItems[0] = $firstBasketItem; // dummy data

        /*
            $secondBasketItem = new \Iyzipay\Model\BasketItem(); // dummy data
            $secondBasketItem->setId("BI102"); // dummy data
            $secondBasketItem->setName("Game code"); // dummy data
            $secondBasketItem->setCategory1("Game"); // dummy data
            $secondBasketItem->setCategory2("Online Game Items"); // dummy data
            $secondBasketItem->setItemType(\Iyzipay\Model\BasketItemType::VIRTUAL); // dummy data
            $secondBasketItem->setPrice("0.5"); // dummy data
            $basketItems[1] = $secondBasketItem; // dummy data
            $thirdBasketItem = new \Iyzipay\Model\BasketItem(); // dummy data
            $thirdBasketItem->setId("BI103"); // dummy data
            $thirdBasketItem->setName("Usb"); // dummy data
            $thirdBasketItem->setCategory1("Electronics"); // dummy data
            $thirdBasketItem->setCategory2("Usb / Cable"); // dummy data
            $thirdBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL); // dummy data
            $thirdBasketItem->setPrice("0.2"); // dummy data
            $basketItems[2] = $thirdBasketItem; // dummy data
        */

        $request->setBasketItems($basketItems); // dummy data
        # make request
        $payWithIyzicoInitialize = \Iyzipay\Model\PayWithIyzicoInitialize::create($request, $options); 



        // Debug the JSON Response
        // dd($payWithIyzicoInitialize);
        /* echo '<pre>', var_dump($payWithIyzicoInitialize), '</pre>';
        exit; */

        // Convert the JSON Response (string/text) to a PHP array
        $paymentResponse = (array) $payWithIyzicoInitialize; // Type Casting: https://www.php.net/manual/en/language.types.type-juggling.php#language.types.typecasting
        // dd($paymentResponse);
        /* echo '<pre>', var_dump($paymentResponse), '</pre>';
        exit; */

        foreach ($paymentResponse as $key => $response) {
            $response_decode = json_decode($response);

            $pay_url = $response_decode->payWithIyzicoPageUrl;

            break; // get out of the loop just after the first iteration
        }


        // Redirect the user to the payment page
        return redirect($pay_url);
    }

}
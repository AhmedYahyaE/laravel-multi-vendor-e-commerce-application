<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iyzipay extends Model
{
    use HasFactory;

    // iyzico Payment Gateway integration in/with Laravel    



    // This method has been copied from    Multi-vendor E-commerce Application\vendor\iyzico\iyzipay-php\samples\config.php    file    
    public static function options()
    {
        $options = new \Iyzipay\Options();



        // API Key:
        $options->setApiKey('sandbox-W7IiunBL5OALo4iibT3r0S3t3fMswzkn');    

        // Secret Key:
        $options->setSecretKey('sandbox-gVf4cjziwu6FJGrwkeIyBlPlizniaqhw'); 



        $options->setBaseUrl('https://sandbox-api.iyzipay.com');

        return $options;
    }

}
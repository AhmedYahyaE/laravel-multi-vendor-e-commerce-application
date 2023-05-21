<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iyzipay extends Model
{
    use HasFactory;

    // iyzico Payment Gateway integration in/with Laravel    // https://www.youtube.com/watch?v=fEpjSro84Ag&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=208



    // This method has been copied from    ecom9\vendor\iyzico\iyzipay-php\samples\config.php    file    // https://www.youtube.com/watch?v=F9LvPALxO6c&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=209
    public static function options()
    {
        $options = new \Iyzipay\Options();



        // API Key:
        $options->setApiKey('sandbox-W7IiunBL5OALo4iibT3r0S3t3fMswzkn');    // Check 12:21 in https://www.youtube.com/watch?v=F9LvPALxO6c&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=209

        // Secret Key:
        $options->setSecretKey('sandbox-gVf4cjziwu6FJGrwkeIyBlPlizniaqhw'); // Check 12:21 in https://www.youtube.com/watch?v=F9LvPALxO6c&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=209



        $options->setBaseUrl('https://sandbox-api.iyzipay.com');

        return $options;
    }

}
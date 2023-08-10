<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    use HasFactory;



    // Sending an offline SMS using an SMS API
    public static function sendSms($message, $mobile) {
        /*Code for SMS Script Starts*/
        $request ="";
        $param['authorization']="0fghGt7O6rJ1C8fsddpUXSEPLWv2aDRuMkyeif7mKBwNHxd4vw0gKcTfrhemqdsFS8gb6Do59Nzp1Ry5fi";
        $param['sender_id'] = 'FSTSMS';
        $param['message']= $message;
        // $param['numbers']= '9800000000';
        $param['numbers']= $mobile;
        $param['username']= 'Ahmed';
        $param['password']= '3212415445fsfgs5';
        $param['language']="english";
        $param['route']="p";

        foreach($param as $key=>$val) {
            $request.= $key."=".urlencode($val);
            $request.= "&";
        }
        $request = substr($request, 0, strlen($request)-1);

        $url ="https://www.fast2sms.com/dev/bulk?".$request;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $curl_scraped_page = curl_exec($ch);
        curl_close($ch);
        /*Code for SMS Script Ends*/
    }
}
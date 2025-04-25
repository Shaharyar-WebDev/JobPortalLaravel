<?php

namespace App\Helpers;
use Exception;
use Illuminate\Support\Str;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Mail;
class Otp
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
        
    }
    public static function send($email, $view, $length = 6){
    
        $to = $email;
        $otp = Str::upper(Str::random($length));
        
        try{
        Mail::to($to)->send(new OtpMail($to, $otp, $view));
            return $otp;

    }catch(Exception $e){
        throw new Exception("Unable To Send Email : " .$e->getMessage());
    }
    }
}

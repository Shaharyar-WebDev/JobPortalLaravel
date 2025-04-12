<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class MyFunc
{
    /**
     * Create a new class instance.
     */
    public static function currency_format($number)
    {
        if ($number >= 1_000_000_000) {
            return round($number / 1_000_000_000, 2) . ' B';
        } elseif ($number >= 1_000_000) {
            return round($number / 1_000_000, 2) . ' M';
        } elseif ($number >= 1_000) {
            return round($number / 1_000, 2) . ' K';
        } else {
            return number_format($number);
        }
    }

    public static function sexySlug ($values = array(), $time = true) {

        if(empty($values)){
            return null;
        }
        $slg = collect($values)->filter()->map(fn($value)=> trim($value))->implode('-');

        if($time == true){
        $slug = Str::slug(strtolower($slg).'-'.time());
        }else{
        $slug = Str::slug(strtolower($slg));
        }

        return $slug;

    } 
    public function __construct()
    {
        //
    }
}

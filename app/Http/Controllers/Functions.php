<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Functions extends Controller
{
    public static function Mask($mask,$str){

        $str = str_replace(" ","",$str);
    
        for($i=0;$i<strlen($str);$i++){
            $mask[strpos($mask,"#")] = $str[$i];
        }
    
        return $mask;
    
    }
    
}

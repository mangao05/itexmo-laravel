<?php

namespace Mangao05\Itexmo;

class Itexmo
{
    private function itexmo($number, $message, $apicode){
        $url = 'https://www.itexmo.com/php_api/api.php';
        $itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
        $param = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($itexmo),
            ),
        );
        $context  = stream_context_create($param);
        return file_get_contents($url, false, $context);
    }

    public function sendmessage($to, $message){
        $result = $this->itexmo($to, $message, config('itexmo.api_code'));
        if ($result == ""){
            return "iTexMo: No response from server!!!
            Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
            Please CONTACT US for help. ";	
        }else if ($result == 0){
            return "Message Sent!";        }
        else{	
            return "Error Num ". $result . " was encountered!";
        }
    }
}
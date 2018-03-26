<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
	var $token = "562258307:AAF7ljfH87V1jhZ4jGonaLJZfcxdMG41vSs";
	var $method = "sendMessage";
	var $chatId = "302569660";
	var $text = "Привет, кусок мяса";
	


    //ФУНКЦИЯ ЗАПРОСА К API
    function getInfo($method, $params)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot$this->token/$method?".http_build_query($params));
        $result = curl_exec($ch);
        curl_close($ch);

        return $info = json_decode($result, true);
    }

    function getUpdates(){
    	$params = [
			'chat_id' => $this->chatId,
			'text' => $this->text
		];
    	dump("dfbdf");
    	dump($this->getInfo('sendMessage',[]));

    }

}

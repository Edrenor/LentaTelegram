<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
	var $token = "562258307:AAF7ljfH87V1jhZ4jGonaLJZfcxdMG41vSs";
	var $method = "sendMessage";
	var $chatId = "404022092"; // 
	


    //ФУНКЦИЯ ЗАПРОСА К API
    function getTelegramInfo($method, $params)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot$this->token/$method?".http_build_query($params));
        $result = curl_exec($ch);
        curl_close($ch);

        return $info = json_decode($result);
    }

    function getUpdates(){    	
    	dump($this->getTelegramInfo('getUpdates',[]));
        $this->sendMessage();
    }


    function sendMessage(){

    	$params = [
			'chat_id' => '404022092',
            'media' => [['type' => 'photo','media' => 'https://sun9-9.userapi.com/c830108/v830108396/aae48/DSO_kTqrCZg.jpg']]
            ];
        //dump(http_build_query($params));
		dump($this->getTelegramInfo('sendMediaGroup',$params));


    }
    public function index(){
    	$this->getUpdates();
    	
    }

}

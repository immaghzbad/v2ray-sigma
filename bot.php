<?php
date_default_timezone_set('Asia/Tehran');
error_reporting(0);

$token = '5924987278:AAGtOCAKYLlCct8HqxFe_XrlkQVsQe3C_g8';
$method = 'sendMessage';

$update = file_get_contents('php://input');
$update = json_decode($update, true);

if (isset($update['message'])) {
    $message = $update['message']['text'];
    $chat_id = $update['message']['chat']['id'];

    if ($message == '/start' || $message == '/Start') {
        $text = 'سلام 🌟 خوش آمدید!';
        
        $url = 'https://api.telegram.org/bot'.$token.'/'.$method;
        $data = array('chat_id' => $chat_id, 'text' => $text);
        
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        
        if ($result === FALSE) {
            echo 'خطا در ارسال پیام';
        } else {
            echo 'پیام با موفقیت ارسال شد';
        }
    }
}
?>

<?php
#-----------------------------#
date_default_timezone_set('Asia/Tehran');
error_reporting(0);
#-----------------------------#
$token = '5924987278:AAGtOCAKYLlCct8HqxFe_XrlkQVsQe3C_g8';
$method = 'sendMessage';

$update = json_decode(file_get_contents('php://input'), true);
$message = $update['message']['text'];

if ($message == '/start' || $message == '/Start') {
    $chat_id = $update['message']['chat']['id'];
    $text = 'سلام 🌟 خوش آمدید!';
    
    $url = 'https://api.telegram.org/bot'.$token.'/'.$method.'?chat_id='.$chat_id.'&text='.urlencode($text);
    
    file_get_contents($url);
}
?>

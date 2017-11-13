<?php

require_once __DIR__ . '/vendor/autload.php';

$httpClient = new \LINE\LINEBot\HTTPClient(getenv('CHANNEL_ACCESS_TOKEN'));
$bot = new \LINE\LINEBot($httpClient, ['hannelSecret' => getenv('CHANNEL_SECRET')]);

$signature = $_SERVER["HTTP_" . \LINE\LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];
try{
    $events = $bot->parseEventRequest(file_get_contents('php://input'), $signature);
}catch(\LINE\LINEBot\Exception\InvalidSignatureException $e){
    error_log("parseEvenRequest failed. InvalidSignatureExecption =>" . var_export($e, true));
}catch (\LINE\LINEBot\Exception\UnknowenEventTypeException $e){
    error_log("parseEventRequest failed. UnknownEventTypeException =>" . var_export($e, true));
}catch (\LINE\LINEBot\Exception\UnknowenMessageTypeException $e){
    error_log("parseEventRequest failed UnknownMessageTypeException =>" . var_export($e, true));
}catch(\LINE\LINEBot\Exception\InvalidEventRequestException $e){
    error_log("parseEventRequest failed. InvalidEventRequestException =>" . var_export($e, true));
}

foreach($events as $event){
    if(!($event instanceof \LINE\LINEBot\Event\MessageEvent)){
        error_log('Non message event has come');
        continue;
    }
    if(!($event instanceof \LINE\LINEBot\Event\MessageEvent\TextMessage)){
        error_log('Non text message has come');
        continue;
    }
    $bot->replyText($event->getReplyToken(), $event->getText());
}
<?php

require_once __DIR__ . '/vendor/autload.php';

$httpClient = new \LINE\LINEBot\HTTPClient(getenv('CHANNEL_ACCESS_TOKEN'));
$bot = new \LINE\LINEBot($httpClient, ['hannelSecret' => getenv('CHANNEL_SECRET')]);

$signature = $_SERVER["HTTP_" . \LINE\LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];
try{
	$events = $bot->parseEventRequest();
}catch(\LINE\LINEBot\Exception\InvalidEventRequestException $e){

}
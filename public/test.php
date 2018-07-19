<?php

$header = "GET /echo HTTP/1.1\r\n";
$header .= "Upgrade: WebSocket\r\n";
$header .= "Connection: Upgrade\r\n";
$header .= "Host: demos.kaazing.com:80\r\n";
$header .= "Origin: http://startup.lndo.site\r\n";
$header .= "Sec-WebSocket-Key1: abcdefg12345\r\n";
$header .= "Sec-WebSocket-Key2: 12345abcdefg\r\n";
$header .= "\r\n";
$header .= "12345abc789defg";

$socket = fsockopen('demos.kaazing.com', 80, $errno, $errstr, 2);
fwrite($socket, $header) or die('Error: ' . $errno . ':' . $errstr);
$response = fread($socket, 8000);

echo "<pre>";
var_dump($response);
echo "</pre>";

fwrite($socket, "\x00Hello\xff") or die('Error:' . $errno . ':' . $errstr);

$wsData = fread($socket, 8000);
$retData = trim($wsData, "\x00\xff");

var_dump($wsData);

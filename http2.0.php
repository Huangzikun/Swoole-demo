<?php

$serv = new swoole_http_server("0.0.0.0", 9501, SWOOLE_PROCESS, SWOOLE_SOCK_TCP);
$serv->set([
    'open_http2_protocol' => true,
]);
$serv->on('request', function($request, $response){
    $response->end("<h1>hello swoole http2.0</h1>");
});
$serv->start();
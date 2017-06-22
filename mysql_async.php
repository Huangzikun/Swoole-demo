<?php

$http = new swoole_http_server("0.0.0.0", 9501);

$http->on('request', function($request, $response){
    $swoole_mysql1 = new Swoole\Coroutine\MySQL();
    $swoole_mysql2 = new Swoole\Coroutine\MySQL();

    $swoole_mysql1->connect([
        'host' => '127.0.0.1',
        'port' => 3306,
        'user' => 'root',
        'password' => 'root',
        'database' => 'swoole',
    ]);
    $swoole_mysql2->connect([
        'host' => '127.0.0.1',
        'port' => 3306,
        'user' => 'root',
        'password' => 'root',
        'database' => 'swoole',
    ]);

    $res1 = $swoole_mysql1->query('SELECT * FROM data1');
    $res2 = $swoole_mysql2->query('SELECT * FROM data2');

    $response->header("Content-Type", "text/html; charset=utf-8");
    $response->end("<h1>Hello Swoole. #".count($res1).count($res2)."</h1>");

});

$http->start();
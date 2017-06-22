<?php

$http = new swoole_http_server("0.0.0.0", 9501);

$http->on('request', function($request, $response){
    $swoole_mysql1 = mysqli_connect('127.0.0.1', 'root', 'root', 'swoole', 3306);
    $swoole_mysql2 = mysqli_connect('127.0.0.1', 'root', 'root', 'swoole', 3306);

    $res1 = $swoole_mysql1->query('SELECT * FROM data1');
    $res2 = $swoole_mysql2->query('SELECT * FROM data2');

    $response->header("Content-Type", "text/html; charset=utf-8");
    $response->end("<h1>Hello Swoole. #".$res1->num_rows.$res2->num_rows."</h1>");

});

$http->start();
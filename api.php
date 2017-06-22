<?php

include_once ("async_1.php");

/**
 * Class MyServer
 * @var MyServer $MyServer
 */
class MyServer
{
    private $Client1;
    private $Client2;
    private $baidu = "api.map.baidu.com";
    private $amap = "restapi.amap.com";
    private $baidu_href = "/location/ip?ip=yourneedip&ak=yourkey";
    private $amap_href = "/v3/ip?key=yourkey&ip=yourneedip";
    public function __construct()
    {
        $this->serv = new swoole_http_server("0.0.0.0", 9501);
        $this->serv->on('request', array($this, 'onRequest'));
        $this->serv->start();
    }

    public function onRequest()
    {
        $this->Client1 = new MyClient($this->baidu, 80, $this->baidu_href);
        $this->Client2 = new MyClient($this->amap, 80, $this->amap_href);
    }
}

$Server = new MyServer();
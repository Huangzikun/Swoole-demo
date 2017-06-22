<?php
class MyClient
{
    private $cli;
    private $ip;
    private $port;
    public function __construct($ip, $port)
    {
        $this->ip = $ip;//请求地址
        $this->port = $port;//端口号
        $this->cli = new swoole_client(SWOOLE_SOCK_TCP, SWOOLE_SOCK_ASYNC);//异步非阻塞
        $this->cli->on('connect', array($this, 'onConnect'));//连接成功回调
        $this->cli->on('receive', array($this, 'onReceive'));//接受数据回调
        $this->cli->on('error', array($this, 'onError'));//错误回调
        $this->cli->on('close', array($this, 'onClose'));//关闭连接回调
        $this->cli->connect($this->ip, $this->port);
    }
    public function onConnect()
    {
        echo "success:".$this->ip."\n";
    }

    public function onReceive()
    {
        echo "Receive:".$this->ip."\n";
    }

    public function onError()
    {
        echo "error\n";
    }

    public function onClose()
    {
        echo "Connection close:".$this->ip."\n";
    }
}



$C1 = new MyClient('127.0.0.1', 9501);
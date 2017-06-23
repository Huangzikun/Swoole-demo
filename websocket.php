<?php

class MySocket
{
    private $server;
    public function __construct()
    {
        $this->server = new swoole_websocket_server("0.0.0.0", 9501);
        $this->server->on("open", array($this, "onOpen"));
        $this->server->on("message", array($this, "onMessage"));
        $this->server->on("close", array($this, "onClose"));
        $this->server->on("request", array($this, "onRequest"));
        $this->server->start();
    }

    public function onOpen(swoole_websocket_server $server, $request)
    {
        echo "server: handshake success with fd{$request->fd}\n";
    }

    public function onMessage(swoole_websocket_server $server, $frame)
    {
        echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
        $this->server->push($frame->fd, "this is server");
    }

    public function onClose($ser, $fd)
    {
        echo "client {$fd} closed\n";
    }

    public function onRequest($request, $response)
    {
        $response->end("<h1>Hello Swoole. #".rand(1000, 9999)."</h1>");
    }
}

$Socket = new MySocket();
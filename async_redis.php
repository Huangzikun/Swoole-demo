<?php

class MyRedis
{
    private $redis;
    public function __construct()
    {
        $this->redis = new swoole_redis;
        $this->redis->on("message", array($this, "onMessage"));
        $this->redis->on("close", array($this, "onClose"));
        $this->redis->connect("127.0.0.1", 6379, array($this, 'onConnect'));
    }

    function onConnect(swoole_redis $redis, $result)
    {
        if ($result === false) {
            echo "connect to redis server failed.\n";
        return ;
        }
        $this->redis->set('key', 'swoole', function (swoole_redis $client, $result) {
            var_dump($result);
        });
    }
    public function onClose(swoole_redis $redis)
    {
        echo "redis close\n";
    }

    public function onMessage(swoole_redis $redis, $message)
    {
        echo "$message.\n";
    }
}

$redis = new MyRedis();
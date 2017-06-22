<?php

/**
 * Class MyClient
 * @var MyClient $MyClient
 */
class MyClient
{
    private $cli;
    private $ip;
    private $port;
    public function __construct($ip, $port, $href)
    {
        $this->ip = $ip;//请求地址
        $this->port = $port;//端口号
        Swoole\Async::dnsLookup($this->ip, function ($domainName, $ip) use ($href){
            $this->cli = new swoole_http_client($ip, $this->port);//异步非阻塞
            $this->cli->setHeaders([
                'Host' => $domainName,
                "User-Agent" => 'Chrome/49.0.2587.3',
                'Accept-Encoding' => 'gzip',
            ]);
            $this->cli->get($href, function () {
                echo $this->ip."\n";
            });
        });
    }
    public function onConnect()
    {
        echo "success:".$this->ip."\n";


    }

    public function onReceive(swoole_client $cli, $data)
    {
        echo "Receive:".$this->ip.":\n";
        var_dump($data);

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

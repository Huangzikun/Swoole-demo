# Swoole-demo
这是一个Swoole的demo

* api_async.php  ->  异步连接客户端，请求API数据，使用百度地图的IP定位接口和高德地图的IP定位接口
* api.php    ->  异步HTTP服务端，配合async.php使用，实现异步请求API数据，可以使用ab工具压力测试
* mysql_async.php  ->  异步MySQL查询，运行在http服务端中
* mysql.php  ->  同步MySQL查询，对比异步
* client_async.php  ->  异步客户端建立demo
* readfile.php  -> 异步读文件，最大4M
* read.php  -> 分段读取文件
* writefile.php  ->  异步写文件，如果需要在文件末尾添加需要使用SWOOLE_AIO_BASE模式
* websocket.php  ->  websocket demo
* async_redis.php  ->  异步redis


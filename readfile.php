<?php
swoole_async_set(array([
    'SWOOLE_AIO_LINUX' => true,
]));
swoole_async_readfile(__DIR__."/readfile.php", function ($filename, $content){
    echo "$filename: $content";
});

<?php
$file_contents = "hello swoole.\n";
swoole_async_set(array([
    'SWOOLE_AIO_BASE' => true,
]));
swoole_async_writefile("test.txt", $file_contents, function($filename){
    echo "hello.\n";
}, FILE_APPEND);
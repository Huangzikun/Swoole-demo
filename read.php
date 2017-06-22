<?php

$x = function ($filename, $content){
    if($content)
    {
        echo "$content.\n";
        return true;
    }
    else
    {
        return false;
    }
};
swoole_async_read("readfile.php", $x, 20, 0);
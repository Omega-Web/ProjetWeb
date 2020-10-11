<?php

class Utils
{
    public static function log($message)
    {
        $fp = fopen('log.txt', 'a');
        fwrite($fp, $message . "\n");
        fclose($fp);
    }
}

<?php

namespace Library;

class Log
{
    public static function write(string $message): void
    {
        $logDirectory = __DIR__ . '/../logs/';
        $logFile = $logDirectory . 'app.log';

        if (!file_exists($logDirectory) || !is_dir($logDirectory)) {
            mkdir($logDirectory, 0777, true);
        }

        $fp = fopen($logFile, 'a+');

        if ($fp !== false) {
            fwrite($fp, sprintf("[%s] %s\n", date('d/m/Y H:i:s'), $message));
            fclose($fp);
        }
    }
}

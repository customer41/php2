<?php

namespace App\Classes;

class LogException
{
    protected $time;
    protected $location;
    protected $exception;
    protected $errorMsg;

    public function __construct($exception) {
        $this->time = date('Y-m-d H:i:s', time());
        $this->location = $exception->getFile();
        $this->exception = get_class($exception);
        $this->errorMsg = $exception->getMessage();
    }

    public function writeToLogFile() {
        $entry  = 'Time: ' . $this->time . "\r\n";
        $entry .= 'Location: ' . $this->location . "\r\n";
        $entry .= 'Type: ' . $this->exception . "\r\n";
        $entry .= 'Message: ' . $this->errorMsg . "\r\n";
        $entry .= '--------------------------------------------------------------------------------------' . "\r\n";
        if (is_readable(__DIR__ . '/../../log.txt')) {
            file_put_contents(__DIR__ . '/../../log.txt', $entry, FILE_APPEND);
        }
    }
}
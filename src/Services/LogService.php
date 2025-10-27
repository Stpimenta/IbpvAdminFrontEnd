<?php

namespace App\Services;

use Dotenv\Dotenv;

class LogService
{
    private string $logFile;

    public function __construct()
    {

        $rootPath = dirname(__DIR__, 2);

        $this->logFile = $_ENV['LOG_PATH'] ?? $rootPath . '/storage/app.log';


        $dir = dirname($this->logFile);

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }


        ini_set('log_errors', 1);
        ini_set('error_log', '/proc/self/fd/2'); // stderr → docker logs
    }

    private function write(string $level, string $message): void
    {
        $timestamp = date('d/m/Y H:i:s');
        $formatted = "[$timestamp][$level] $message" . PHP_EOL;


        error_log($formatted);
        file_put_contents($this->logFile, $formatted, FILE_APPEND | LOCK_EX);
    }

    public function info(string $message): void
    {
        $this->write('INFO', $message);
    }

    public function warning(string $message): void
    {
        $this->write('WARNING', $message);
    }

    public function error(string $message): void
    {
        $this->write('ERROR', $message);
    }
}

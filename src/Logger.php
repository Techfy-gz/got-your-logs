<?php

namespace Techfy\GotYourLogs;

use Illuminate\Support\Facades\File;

class Logger
{
    protected $config;

    public function __construct()
    {
        $this->config = config('gotyourlogs');
    }

    public function log($operation, $details)
    {
        $logData = [
            'time' => now()->format($this->config['log_format']['time']),
            'operation' => $operation,
            'details' => $details,
        ];

        $logFilePath = $this->getLogFilePath();
        File::append($logFilePath, json_encode($logData) . PHP_EOL);
    }

    protected function getLogFilePath()
    {
        $logDir = $this->config['storage_path'];
        if (!File::exists($logDir)) {
            File::makeDirectory($logDir, 0755, true);
        }

        return $logDir . '/' . now()->format('Y-m-d') . '.json';
    }
}

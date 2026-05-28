<?php

namespace common\log;

use Psr\Log\LoggerInterface;
use yii\log\Logger as YiiLogger;

class YiiPsrLogger implements LoggerInterface
{
    private YiiLogger $logger;

    public function __construct()
    {
        $this->logger = \Yii::$app->get('log');
    }

    public function emergency($message, array $context = []): void
    {
        $this->log('emergency', $message, $context);
    }
    public function alert($message, array $context = []): void
    {
        $this->log('alert', $message, $context);
    }
    public function critical($message, array $context = []): void
    {
        $this->log('critical', $message, $context);
    }
    public function error($message, array $context = []): void
    {
        $this->log('error', $message, $context);
    }
    public function warning($message, array $context = []): void
    {
        $this->log('warning', $message, $context);
    }
    public function notice($message, array $context = []): void
    {
        $this->log('notice', $message, $context);
    }
    public function info($message, array $context = []): void
    {
        $this->log('info', $message, $context);
    }
    public function debug($message, array $context = []): void
    {
        $this->log('debug', $message, $context);
    }

    public function log($level, $message, array $context = []): void
    {
        $levelMap = [
            'emergency' => YiiLogger::LEVEL_ERROR,
            'alert'     => YiiLogger::LEVEL_ERROR,
            'critical'  => YiiLogger::LEVEL_ERROR,
            'error'     => YiiLogger::LEVEL_ERROR,
            'warning'   => YiiLogger::LEVEL_WARNING,
            'notice'    => YiiLogger::LEVEL_INFO,
            'info'      => YiiLogger::LEVEL_INFO,
            'debug'     => YiiLogger::LEVEL_TRACE,
        ];

        $yiiLevel = $levelMap[$level] ?? YiiLogger::LEVEL_INFO;
        $this->logger->log($message, $yiiLevel, __METHOD__);
    }
}

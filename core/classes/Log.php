<?php

namespace BotManager\Log;

define('BOT_LOG_INFO', '[INFO] ');
define('BOT_LOG_ERROR', '[ERROR] ');
define('BOT_LOG_DEBUG', '[DEBUG] ');

class Log
{

    static function i($message)
    {
        self::write(BOT_LOG_INFO . self::isArray($message));
    }

    static function e($message)
    {
        self::write(BOT_LOG_ERROR . self::isArray($message), 'error');
    }

    static function d($message)
    {
        self::write(BOT_LOG_DEBUG . self::isArray($message), 'custom');
    }

    private static function isArray($message) {
        if (is_array($message)) {
            $message = json_encode($message);
        }
        return $message;
    }

    private static function write($message, $prefix = 'log')
    {
        if (!file_exists(LOGS_DIRECTORY)) {
            mkdir(LOGS_DIRECTORY);
        }

        $trace = debug_backtrace();
        $function_name = isset($trace[2]) ? $trace[2]['function'] : '-';
        $mark = date("H:i:s") . ' [ Method: ' . $function_name . ' ]';
        $log_name = LOGS_DIRECTORY . '/' . $prefix . '_' . date("j.n.Y") . '.txt';
        file_put_contents($log_name, $mark . " : " . $message . "\n", FILE_APPEND);
    }

}
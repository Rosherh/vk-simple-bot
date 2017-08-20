<?php
use Bot\BotManager;

if (!isset($_REQUEST)) {
    exit;
}

/*
 * Подключаем autoload.
 */
require_once 'vendor/autoload.php';

debug_enable(true);

/*
 * Запускаем нашего бота.
 */
$bot = new BotManager();
$bot->start();
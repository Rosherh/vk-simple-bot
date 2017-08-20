<?php
define('VK_API_VERSION', '5.68'); // Используемая версия API
define('VK_API_ROOT', 'https://api.vk.com/method/'); // Куда будем стучаться и ждать ответа
define('VK_API_CONFIRMATION_TOKEN', 'CONFIRMATION_TOKEN'); // Строка для подтверждения адреса сервера из настроек Callback API
define('VK_API_TOKEN', 'CALLBACK_API_KEY'); // Ключ доступа сообщества

define('YANDEX_API_KEY', 'c9bdd017-cff6-4729-b4be-xxxxxxxxxxxx'); // Ключ для доступа к Yandex Speech Kit

define('BASE_DIRECTORY', dirname(dirname(__FILE__)));
define('LOGS_DIRECTORY', BASE_DIRECTORY . '/logs');
define('ASSETS_IMAGES_DIRECTORY', BASE_DIRECTORY . '/assets/images');
define('ASSETS_AUDIO_DIRECTORY', BASE_DIRECTORY . '/assets/audio');
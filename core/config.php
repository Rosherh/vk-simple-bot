<?php
define('VK_API_VERSION', '5.68'); // Используемая версия API
define('VK_API_ROOT', 'https://api.vk.com/method/'); // Куда будем стучаться и ждать ответа
define('VK_API_CONFIRMATION_TOKEN', '54543c0d'); // Строка для подтверждения адреса сервера из настроек Callback API
define('VK_API_TOKEN', '5cbbffae100c6e586b75514d433ee767f66c42fbac43c5094bccddb8777eab29c3b48c82e58bb3804ee26'); // Ключ доступа сообщества

define('YANDEX_API_KEY', 'c9bdd017-cff6-4729-b4be-d768701c50c5'); // Ключ для доступа к Yandex Speech Kit

define('BASE_DIRECTORY', dirname(dirname(__FILE__)));
define('LOGS_DIRECTORY', BASE_DIRECTORY . '/logs');
define('ASSETS_IMAGES_DIRECTORY', BASE_DIRECTORY . '/assets/images');
define('ASSETS_AUDIO_DIRECTORY', BASE_DIRECTORY . '/assets/audio');
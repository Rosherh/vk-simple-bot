<?php

namespace Api;

use Exception;
use Log\Log;

class VK
{

    /*
     * Формируем запрос на получение информации о пользователе
     */
    public static function getDataUser($user_id)
    {
        $data = self::send("users.get", [
            'user_ids' => $user_id,

            /*
             * Заполняем поле fields, если нужно
             */
            'fields' => implode(',', [
            ])
        ]);
        return $data[0];
    }

    /*
     * Формируем запрос на отправку сообщения
     */
    public static function sendMessage($user_id, $message)
    {
        return self::send('messages.send', [
            'peer_id' => $user_id,
            'message' => $message
        ]);
    }

    /**
     * TODO 21.08.2017 - Реализовать прочие методы VK API.
     * - Прикрепление изображения
     * - Видео
     * - Голосовые сообщения
     */

    /*
     * Отправляем запрос
     */
    private static function send($method, $params = [])
    {
        if (!self::isCurl())
            throw new Exception('cUrl is not defined');

        $params['access_token'] = VK_API_TOKEN;
        $params['v'] = VK_API_VERSION;

        $query = http_build_query($params);
        $url = VK_API_ROOT . $method . '?' . $query;

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $json = curl_exec($curl);
        $error = curl_error($curl);

        if ($error) {
            Log::e($error);
            throw new Exception("Failed {$method} request");
        }
        curl_close($curl);

        $response = json_decode($json, true);
        if (!$response || !isset($response['response'])) {
            Log::e($response);
            throw new Exception("Invalid response for {$method} request");
        }
        return $response['response'];
    }

    private static function isCurl()
    {
        return function_exists('curl_version');
    }

}
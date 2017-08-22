<?php

namespace BotManager\Bot;

use BotManager\Api\VK;
use BotManager\Log\Log;
use Exception;

class BotEvent
{

    /*
     * Список событий, которые нужно отслеживать через VK API
     */
    static $event = [
        'confirmation' => 'confirmation',
        'message_new' => 'message_new'
    ];

    /**
     * @param $data - this body response from VK API.
     * Example: {..., "object":{..., "body":"Hi!"},"group_id":000}
     * @return array
     */
    function searchCommand($data)
    {
        $match = null;
        preg_match("/^-[\w|а-яё]+/i", $data, $matches);
        if (!empty($matches))
            $match = str_replace('-', '', $matches[0]);

        return $match;
    }

    /**
     * @param $user_id
     * @param null $command
     * Sending a message from the bot
     */
    function setParamsNewMessage($user_id, $command = null)
    {
        if (empty($user_id))
            new Exception('$user_id variable cannot be empty!');

        $command = BotCommands::parseCommand($command);
        $user = VK::getDataUser($user_id);

        // Пишем свою логику на событие messages_new.
        $message = '';
        if (!empty($command)) {
            $bot = new BotCommands();
            try {
                $message = $bot->$command();
            } catch (Exception $e) {
                Log::e($e);
            }
        } else {
            $message = "Hello, {$user['first_name']}! My name is BotManager! If you need to know more about me enter the command \"-help\"";
        }
        VK::sendMessage($user_id, $message);
    }

}
<?php

namespace Rosherh\BotManager\Bot;

use Exception;
use Rosherh\BotManager\Log\Log;

class BotManager
{
    private $events = null;

    public function __construct(){
        $this->events = new BotEvent();
    }

    /*
     * Начинаем работу нашего бота
     */
    function start() {
        $event = handlerEvent();
        try {

            /*
             * Примеры событий. Вся логика событий вынеса в класс Event
             */
            switch ($event['type']) {
                case BotEvent::$event['confirmation']:
                    Log::d('The server confirmed');
                    $this->response(VK_API_CONFIRMATION_TOKEN);
                    break;

                case BotEvent::$event['message_new']:
                    $obj = $this->getObject($event);

                    /*
                     * Если боту нужна поддержка каких-либо команд
                     */
                    $command = $this->events->searchCommand($obj['body']);
                    $this->events->setParamsNewMessage($obj['user_id'], $command);
                    $this->response('ok');
                    break;

                    /*
                     * Добавляем свои события, указанные в настройках группы
                     * Реализацию события выполняем в BotEvent
                     * В конце не забываем отдавать ответ на наш сервер с сообщением 'ok'
                     */

                    /*
                     * Здесь твой код
                     */

                default:
                    $method = empty($event['type']) ? 'null' : $event['type'];
                    Log::d('Unsupported event - ' . $method);
                    $this->response('Unsupported event.');
            }
        } catch (Exception $e) {
            Log::e($e);
        }
    }

    private function getObject($obj) {
        return $obj['object'];
    }

    function response($data = null) {
        echo $data;
        exit();
    }

}
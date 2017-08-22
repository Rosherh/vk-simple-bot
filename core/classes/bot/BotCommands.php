<?php

namespace Rosherh\BotManager\Bot;

use Exception;

class BotCommands
{

    /*
     * Регистрируем свой список команд, который бот будет выполнять
     * Пример:
     *  'метод класса BotCommands' => [
     *      'варианты обращения пользователя к боту' => [
     *          'Вариант 1',
     *          'Вариант 2'
     *      ],
     *      'Описание метода' => 'Описание метода, для пояснения пользователю'
     */
    private static $commands = [
        'help' => [
            'options' => [
                'help',
                'h',
                'settings'
            ],
            'description' => 'Выводим список моих возможностей.'
        ]
    ];

    public function __call($name, $arguments)
    {
        throw new Exception("Sorry, method is not found.");
    }

    function getMethods()
    {
        return get_class_methods($this);
    }

    function help()
    {
        $output = "Хочешь узнать, что я могу? =) Без проблем! \n\n";

        $row = '';
        foreach ($this->getMethods() as $method) {
            if (isset(self::$commands[$method])) {
                $row .= "-" . implode(' / ', self::$commands[$method]['options']) . " | " . self::$commands[$method]['description'];
            }
        }
        $output .= $row;
        return $output;
    }

    static function parseCommand($method)
    {
        foreach (self::$commands as $key => $command) {
            if (in_array($method, $command['options'])) {
                return $key;
            }
        }
        return null;
    }

}
<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit35083cd3632813149dd18c9252f6f744
{
    public static $files = array (
        '219dc302a62fbd12647a3e9550bb402c' => __DIR__ . '/../..' . '/core/global.php',
        '042220ce53c9d67fb9b1586ca2a33afa' => __DIR__ . '/../..' . '/core/config.php',
    );

    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Log\\' => 4,
        ),
        'B' => 
        array (
            'Bot\\' => 4,
        ),
        'A' => 
        array (
            'Api\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Log\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core/classes',
        ),
        'Bot\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core/classes/bot',
        ),
        'Api\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core/classes/api',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit35083cd3632813149dd18c9252f6f744::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit35083cd3632813149dd18c9252f6f744::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
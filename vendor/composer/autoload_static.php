<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd58f03bbe392085b54e8203d94c8170f
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'LINE\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'LINE\\' => 
        array (
            0 => __DIR__ . '/..' . '/linecorp/line-bot-sdk/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd58f03bbe392085b54e8203d94c8170f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd58f03bbe392085b54e8203d94c8170f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}

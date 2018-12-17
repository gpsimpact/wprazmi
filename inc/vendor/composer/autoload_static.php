<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3ff064bdb62cbf62ce54fdd58d2ed010
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Dotenv\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Dotenv\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/phpdotenv/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3ff064bdb62cbf62ce54fdd58d2ed010::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3ff064bdb62cbf62ce54fdd58d2ed010::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}

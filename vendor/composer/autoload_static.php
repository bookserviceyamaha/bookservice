<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0e2a5fa82e4fb7f09b75b28253c3b8d6
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0e2a5fa82e4fb7f09b75b28253c3b8d6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0e2a5fa82e4fb7f09b75b28253c3b8d6::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}

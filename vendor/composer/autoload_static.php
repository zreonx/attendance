<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4a699d45ffde9230ab1fdc851dca4ae5
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

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4a699d45ffde9230ab1fdc851dca4ae5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4a699d45ffde9230ab1fdc851dca4ae5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4a699d45ffde9230ab1fdc851dca4ae5::$classMap;

        }, null, ClassLoader::class);
    }
}
<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit380ec248aedae882ef5d3ba7275a196d
{
    public static $prefixLengthsPsr4 = array (
        'Q' => 
        array (
            'QuickBooksOnline\\API\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'QuickBooksOnline\\API\\' => 
        array (
            0 => __DIR__ . '/..' . '/quickbooks/v3-php-sdk/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit380ec248aedae882ef5d3ba7275a196d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit380ec248aedae882ef5d3ba7275a196d::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}

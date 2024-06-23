<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4935b31e96983947a7f426533533f2b3
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Core',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4935b31e96983947a7f426533533f2b3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4935b31e96983947a7f426533533f2b3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4935b31e96983947a7f426533533f2b3::$classMap;

        }, null, ClassLoader::class);
    }
}
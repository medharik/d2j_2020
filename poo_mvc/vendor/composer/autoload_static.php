<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4d74e9c15e3fdb3e640b46cb915170a0
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models',
        ),
    );

    public static $classMap = array (
        'App\\Abonne' => __DIR__ . '/../..' . '/models/abonne.class.php',
        'App\\Idao' => __DIR__ . '/../..' . '/models/idao.class.php',
        'App\\Imetier' => __DIR__ . '/../..' . '/models/imetier.class.php',
        'App\\User' => __DIR__ . '/../..' . '/models/user.class.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4d74e9c15e3fdb3e640b46cb915170a0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4d74e9c15e3fdb3e640b46cb915170a0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4d74e9c15e3fdb3e640b46cb915170a0::$classMap;

        }, null, ClassLoader::class);
    }
}

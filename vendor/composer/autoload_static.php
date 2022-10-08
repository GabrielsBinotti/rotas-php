<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitaf9a3212e116800ede9eaf85b4d32060
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
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitaf9a3212e116800ede9eaf85b4d32060::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitaf9a3212e116800ede9eaf85b4d32060::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitaf9a3212e116800ede9eaf85b4d32060::$classMap;

        }, null, ClassLoader::class);
    }
}

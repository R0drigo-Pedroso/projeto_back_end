<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitb283b6194b6a220e34139d2eeaba66ad
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitb283b6194b6a220e34139d2eeaba66ad', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitb283b6194b6a220e34139d2eeaba66ad', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitb283b6194b6a220e34139d2eeaba66ad::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
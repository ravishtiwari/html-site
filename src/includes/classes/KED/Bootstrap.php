<?php
/**
 * Created by PhpStorm.
 * User: ravish
 * Date: 12/19/14
 * Time: 12:47 PM
 */
namespace KED;


class Bootstrap
{
    /**
     * Register the autoloader and any other setup needed
     */
    public static function init($includePath, $nameSpace=__NAMESPACE__)
    {
        require_once 'SplClassLoader.php';
        $classLoader = new SplClassLoader($nameSpace, $includePath );
        $classLoader->register();
    }
}
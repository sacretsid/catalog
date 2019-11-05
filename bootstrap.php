<?php

require_once(__DIR__ . '/SplClassLoader.php');
require_once(__DIR__ . '/conf/config.php');

/**
 * Class Bootstrap
 * @package Core
 */
class Bootstrap
{
    public function init()
    {
        $this->autoloader();
    }

    private function autoloader()
    {
        $autoloader = new SplClassLoader();
        $autoloader->register();
    }
}
<?php

require_once(__DIR__ . '/conf/config.php');
require_once(__DIR__ . '/SplClassLoader.php');
require_once(__DIR__ . '/router.php');

/**
 * Class Bootstrap
 * @package Core
 */
class Bootstrap
{
    public function init()
    {
        $this->autoloader();
        $this->router();
    }

    private function autoloader()
    {
        $autoloader = new SplClassLoader();
        $autoloader->register();
    }

    private function router()
    {
        Router::start();
    }
}
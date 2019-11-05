<?php
ini_set('display_errors', 0);

ob_start();

require_once(__DIR__ . '/bootstrap.php');
$bootstrap = new Bootstrap();
$bootstrap->init();
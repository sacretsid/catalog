<?php
ini_set('display_errors', 1);

ob_start();

require_once(__DIR__ . '/bootstrap.php');
$bootstrap = new Bootstrap();
$bootstrap->init();
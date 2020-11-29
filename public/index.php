<?php
session_start();

require __DIR__ . "/../vendor/autoload.php";

use Noodlehaus\Config;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$config =  new Config(__DIR__ . "/../config/database.php");

require __DIR__ . "/../app/router.php";

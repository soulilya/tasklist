<?php
session_start();
mb_internal_encoding("UTF-8");
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include_once 'autoloader.php';
require_once('controllers/RouterController.php');

Db::connect("127.0.0.1", "tasks", "tasks", "tasks");

$router = new RouterController();
$router->process(array($_SERVER['REQUEST_URI']));
$router->renderView();

?>

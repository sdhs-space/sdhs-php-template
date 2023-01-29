<?php 
session_start();
require_once './lib.php';
require_once './router.php';


$router = new Router();
$controllerFiles =  glob('./controller/*.php');
foreach($controllerFiles as $file){
    require_once($file);
}

$router->handleRequest();
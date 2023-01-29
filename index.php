<?php 
session_start();
require_once './lib.php';
require_once './router.php';


$controllerFiles = glob('./controller/*.php');
foreach($controllerFiles as $file){
    require_once($file);
}

Router::handleRequest();
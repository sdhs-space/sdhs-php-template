<?php


$router->get("/",function(){
    views('home');
});

$router->get("/users/{id}",function($id){
    $datas = (object)[];
    $datas->id = $id;
    views("users/profile",$datas);
});

$router->get("/users/{id}/{board}",function($id,$board){
    $datas = (object)[];
    $datas->id = $id;
    $datas->board = $board;
    views("users/board",$datas);
});
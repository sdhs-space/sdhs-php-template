<?php

GET("/",function(){
    views('home');
});

GET("/users/{id}",function($id){
    $datas = (object)[];
    $datas->id = $id;
    views("users/profile",$datas);
});

GET("/users/{id}/{board}",function($id,$board){
    $datas = (object)[];
    $datas->id = $id;
    $datas->board = $board;
    views("users/board",$datas);
});
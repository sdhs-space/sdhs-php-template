<?php 


POST("/users/profile/{id}",function($id){
    echo '프로필 수정';
    echo $id;
});


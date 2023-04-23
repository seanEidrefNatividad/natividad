<?php

if (isset($_POST["submit"])){
    init();
} else {
    header("location: ../view/index.php");
}

function init() {
    $id = $_POST["imgId"];
    $albumId = $_POST["albumId"];

    include_once '../config/database.php';
    require_once '../model/indexModel.php';

        
    deleteImage($conn, $albumId, $id); 
    header("location: ../view/index.php?album=".$albumId."&error=none");
    
}

?>
<?php

if (isset($_POST["submit"])){
    init();
} else {
    header("location: ../view/index.php");
}

function init() {
    $albumId = $_POST["albumId"];

    include_once '../config/database.php';
    require_once '../model/indexModel.php';

        
    deleteAlbum($conn, $albumId); 
    header("location: ../view/index.php?error=none");
    
}

?>
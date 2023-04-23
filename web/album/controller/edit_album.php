<?php

if (isset($_POST["submit"])){
    init();
} else {
    header("location: ../view/index.php");
}

function init() {
    $id = $_POST["userId"];
    $albumTitle = $_POST["album_title"];

    include_once '../config/database.php';
    require_once '../model/indexModel.php';

    if (empty($albumTitle)) {
        header("location: ../view/index.php?error=inputEmpty");
        exit();
    } else {
        
        editAlbum($conn, $id, $albumTitle); 
        header("location: ../view/index.php?error=none");
    } 
}

?>
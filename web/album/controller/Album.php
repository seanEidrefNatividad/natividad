<?php

if (isset($_POST["submit"])){
    init();
} else {
    header("location: ../view/index.php");
}

function init() {
    $userId = $_POST["userId"];
    $album_title = $_POST["album_title"];

    require_once '../config/database.php';
    require_once 'functions/functions.php';
    require_once '../model/indexModel.php';

    validate($userId, $album_title, $conn);  
}

function validate($userId, $album_title, $conn) {
    
    if (album_emptyInput_functions($userId, $album_title) !== false) {
        header("location: ../view/index.php?error=emptyInput");
        exit();
    };
    if (albumTaken_functions($conn, $album_title, $userId) !== false) {
        header("location: ../view/index.php?error=titleTaken");
        exit();
    };

    album_create_functions($userId, $album_title, $conn);     
}

?>
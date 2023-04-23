<?php

if (isset($_POST["submit"])){
    init();
} else {
    header("location: ../view/index.php");
}

function init() {
    $id = $_POST["imgId"];
    $albumId = $_POST["albumId"];
    $imgTitle = $_POST["imgTitle"];
    $imgDesc = $_POST["imgDesc"];

    include_once '../config/database.php';
    require_once '../model/indexModel.php';

    if (empty($imgTitle) || empty($imgDesc)) {
        header("location: ../view/index.php?album=".$albumId."&error=inputEmpty");
        exit();
    } else {
        
        editImage($conn, $albumId, $id, $imgTitle, $imgDesc); 
        header("location: ../view/index.php?album=".$albumId."&error=none");
    } 
}

?>
<?php

if (isset($_POST["submit"])){
    init();
} else {
    header("location: ../view/index.php");
}

function init() {
    $userId = $_POST["userId"];
    $albumId = $_POST["albumId"];
    $imgName = $_POST["imgName"];
    $imgTitle = $_POST["imgTitle"];
    $imgDesc = $_POST["imgDesc"];
    $img = $_FILES["img"];

    if (empty($_POST["imgName"])) {
        $imgName = "gallery";
    } else {
        $imgName = strtolower(str_replace("", "-", $imgName));
    }

    $name = $img["name"];
    $type = $img["type"];
    $tempName = $img["tmp_name"];
    $error = $img["error"];
    $size = $img["size"];

    $ext = explode(".", $name);
    $ext = strtolower(end($ext));
    
    $allow = array("jpg","jpeg","png");

    if (in_array($ext, $allow)) {
        if($error === 0) {
            if($size < 1000000) {
                $imgFullName = $imgName . "." . uniqid("") . "." . $ext;
                $dest = "../assets/img/" . $imgFullName;
                
                include_once '../config/database.php';
                require_once '../model/indexModel.php';


                if (empty($imgTitle) || empty($imgDesc)) {
                    header("location: ../view/index.php?album=".$albumId."&error=uploadEmpty");
                    exit();
                } else {
                    
                    //$currRow = imageCount($conn, $albumId, $userId);
                    addImage($conn, $albumId, $userId, $imgTitle, $imgDesc, $imgFullName);               
                   
                    move_uploaded_file($tempName, $dest);

                    header("location: ../view/index.php?album=".$albumId."&error=none");
                }


            } else {
                //echo "size to large.";
                header("location: ../view/index.php?album=".$albumId."&error=sizeLarge");

            }
        } else {
            echo "error";
        }

    } else {
        echo "file type error";
    }

    // require_once 'functions/functions.php';
    // require_once '../model/indexModel.php';

    //validate($userId, $album_title, $conn);  
}

function validate($userId, $album_title, $conn) {
    
    if (album_emptyInput_functions($userId, $album_title) !== false) {
        header("location: ../view/index.php?error=emptyInput");
        exit();
    };
    if (albumTaken_functions($conn, $album_title) !== false) {
        header("location: ../view/index.php?error=titleTaken");
        exit();
    };

    album_create_functions($userId, $album_title, $conn);     
}

?>
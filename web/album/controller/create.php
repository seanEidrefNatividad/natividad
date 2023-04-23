<?php


if (isset($_POST["submit"])){
    init();
} else {
    header("location: ../view/login.php");
}

function init() {
    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once '../config/database.php';
    require_once 'functions/functions.php';
    require_once '../model/registerModel.php';

    validate($username, $password, $conn);  
}

function validate($username, $password, $conn) {
    
    if (emptyInput_functions($username, $password) !== false) {
        header("location: ../view/register.php?error=emptyInput");
        exit();
    };
    if (usernameTaken_functions($conn, $username) !== false) {
        header("location: ../view/register.php?error=usernameTaken");
        exit();
    };

    create_functions($username, $password, $conn);     
}


?>
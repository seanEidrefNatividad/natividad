<?php

if (isset($_POST["submit"])){
    init();
} else {
    header("location: ../view/login.php");
    exit();
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
    
    if (login_emptyInput_functions($username, $password) !== false) {
        header("location: ../view/login.php?error=emptyInput");
        exit();
    }

    login_functions($username, $password, $conn);   

}

?>
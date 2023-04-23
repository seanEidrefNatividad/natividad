<?php 

if(isset($_GET["error"])) {

    if ($_GET["error"] == "emptyInput") {    
        echo '
        <div class="register_errorMsg">
            <span> 
                <i class="fa-solid fa-triangle-exclamation"></i>
                &nbsp;
                Fill in all fields! 
            </span>
        </div>'
        ;
    } else if ($_GET["error"] == "notExist") {    
        echo '
        <div class="register_errorMsg">
            <span> 
                <i class="fa-solid fa-triangle-exclamation"></i>
                &nbsp;
                User not Exist! 
            </span>
        </div>'
        ;
    } else if ($_GET["error"] == "wrongLogin") {    
        echo '
        <div class="register_errorMsg">
            <span> 
                <i class="fa-solid fa-triangle-exclamation"></i>
                &nbsp;
                Incorrect Login Information! 
            </span>
        </div>'
        ;
    } 
}


?>
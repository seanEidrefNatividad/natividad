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
    } else if ($_GET["error"] == "usernameTaken") {
        echo '
        <div class="register_errorMsg">
            <span> 
                <i class="fa-solid fa-triangle-exclamation"></i> 
                &nbsp;
                Username Taken! 
            </span>
        </div>'
        ;
    } else if ($_GET["error"] == "none") {
        echo '
        <div class="register_errorMsg">
            <span> 
                Successfully Registered! 
            </span>
        </div>'
        ;
    }
}


?>
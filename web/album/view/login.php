<?php include 'template/header.php';?>

    <div class="login_div1">
        <form action="../controller/login.php" method="post">
            <div class="login_div2">
                <input id="login_tb_username" class="login_tb" type="text" id="username" name="username" placeholder="Username" autocomplete="off">
                <input class="login_tb" type="password" id="password" name="password" placeholder="Password" autocomplete="off">
                <button class="login_btn btn btn-primary" type="submit" name="submit">Log In</button>   
            </div>
        </form>
        <div class="login_div3">
            <hr>
            <a class="login_btn btn btn-success" type="button" href="register.php">Create new account</a>   
        </div>
    </div>

    <?php include 'template/login_validate.php';?>


<?php include 'template/footer.php';?>


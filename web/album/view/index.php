<?php include 'template/header.php'; ?>
<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("location: ../view/login.php");
}

require_once '../config/database.php';
require_once '../model/indexModel.php';
require_once 'template/album_show.php';
require_once 'template/image_show.php';


?>


<!-- Modal Create Album-->
<div class="modal fade" id="modal_createAlbum" data-bs-backdrop="static" tabindex="-1" aria-labelledby="modal_createAlbumLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modal_createAlbumLabel">Create Album</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body"> 
        <form action="../controller/Album.php" method="post" id="create_album">
            <div class="login_div2">
                <input class="login_tb" type="number" name="userId" value="<?php echo $_SESSION["id"] ?>" hidden>
                <input class="login_tb" type="text" id="album_title" name="album_title" placeholder="Title" autocomplete="off">
            </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Discard</button>
        <button type="submit" form="create_album" class="btn btn-success" name="submit">Create Album</button>
      </div>

    </div>
  </div>
</div>

<!-- Modal Add Image -->
<div class="modal fade" id="modal_addImage" data-bs-backdrop="static" tabindex="-1" aria-labelledby="modal_addImageLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modal_addImageLabel">Add Image</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body"> 
        <form action="../controller/add_image.php" method="post" id="add_image" enctype="multipart/form-data">
            <div class="login_div2">
                <input class="login_tb" type="number" name="userId" value="<?php echo $_SESSION["id"] ?>" hidden>
                <input class="login_tb" type="number" name="albumId" value="<?php echo $_GET["album"] ?>" hidden>
                <input class="login_tb" type="text" name="imgName" placeholder="image name">
                <input class="login_tb" type="text" name="imgTitle" placeholder="image title">
                <input class="login_tb" type="text" name="imgDesc" placeholder="image description">
                <input type="file" name="img">
            </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Discard</button>
        <button type="submit" form="add_image" class="btn btn-success" name="submit">Add Image</button>
      </div>

    </div>
  </div>
</div>


<div id="sidebar">
    <div id="sidebar_div1">
        <div>

        </div>
        <div>
        <?php

            if(isset($_GET["album"])) {                           
                echo '
                <button type="button" class="btn btn-light" style="padding:.75rem; box-shadow: 2px 2px 2px 2px gray;" data-bs-toggle="modal" data-bs-target="#modal_addImage">
                    <i class="fa-solid fa-plus"></i>
                    &nbsp; Add Image
                </button> 
                '; 
                
            } else {
                echo '
                <button type="button" class="btn btn-light" style="padding:.75rem; box-shadow: 2px 2px 2px 2px gray;" data-bs-toggle="modal" data-bs-target="#modal_createAlbum">
                    <i class="fa-solid fa-plus"></i>
                    &nbsp; Create Album
                </button> 
                ';                                                                                
            }
            ?>
            
        </div>
        <div id="sidebarNav">
            <ul>
                <li><button class="navBtn"><a href="index.php"><i class="fa-solid fa-house"></i>&nbsp;Home</a></button></li>
                <li><button class="navBtn1"><i class="fa-solid fa-images"></i>&nbsp;Albums</button></li>
                <ul>
                    <?php 
                        $result = albumShow_Model($conn, $_SESSION["id"]);
                        if ($result){
                            while($row = mysqli_fetch_assoc($result)) {
                                echo '
                                    <li><a href="index.php?album='.$row["id"].'"><button class="navBtn2">'.$row["title"].'</button></a></li>                                                                      
                                ';
                            }
                        }           
                    ?>
                </ul>
            </ul>
        </div>  
    </div>
    <div id="sidebar_div2">
        <hr>
            <?php           
                echo '
                    <button class="navBtn">
                        <a href="../controller/logout.php" type="button">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            &nbsp;
                            Logout
                        </a>
                    </button>
                ';          
            ?>
    </div>
</div>

<div id="main">                 

    <div id="navbar">
        <div style="margin: auto 0;">
            Hello, <?php echo $_SESSION["username"] ?>!
        </div>
        <?php           
            echo '
                <button class="navBtn4">
                    <a href="../controller/logout.php" type="button">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        &nbsp;
                        Logout
                    </a>
                </button>
            ';          
        ?>
    </div>

    <div id="album_main">
        <div id="album">
            <?php
            if(isset($_GET["album"])) { 
                echo '
                    <h2 style="font-size: 1.5rem; margin: 1.5rem;">Images</h2>
                ';
            } else {
                echo '
                    <h2 style="font-size: 1.5rem; margin: 1.5rem;">Albums</h2>
                ';
            }
            ?>
            <div id="album_div1">

                <div class="container">
                    <div class="row">   

                        <?php
                        if(isset($_GET["album"])) {  
                            $rowCount = imageCount($conn, $_GET["album"],  $_SESSION["id"]);                         
                            

                            if ($rowCount) {
                                imageShow($conn, $_SESSION["id"], $_GET["album"]);
                            } else {
                                echo '
                                    <h3>Empty Album</h3>
                                ';
                            }
                            
                        } else {
                           albumShow($conn, $_SESSION["id"]);                                                                                                                               
                        }
                        ?>
                                     
                    </div>
                </div>

            </div>
        </div>

    </div>


</div>

<script>

$('img[data-enlargable]').addClass('img-enlargable').click(function(){
    var src = $(this).attr('src');
    $('<div>').css({
        background: 'RGBA(0,0,0,.5) url('+src+') no-repeat center',
        backgroundSize: 'contain',
        width:'100%', height:'100%',
        position:'fixed',
        zIndex:'10000',
        top:'0', left:'0',
        cursor: 'zoom-out'
    }).click(function(){
        $(this).remove();
    }).appendTo('body');
});

</script>

<?php include 'template/footer.php'; ?>
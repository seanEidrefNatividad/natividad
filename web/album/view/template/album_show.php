<?php 

function albumShow($conn, $userId) {
    // if($row = mysqli_fetch_assoc(albumShow_Model($conn, $userId))) {
    //     return $row;
    // } else {
    //     return false;
    // };

    $result = albumShow_Model($conn, $userId);
    if ($result){
        while($row = mysqli_fetch_assoc($result)) {
            $resultImg = imageShowOne_Model($conn, $userId, $row["id"]);
            
            echo '                     
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="card mb-4 box-shadow">
            ';

            if ($resultImg) {
                echo '
                
                <div class="imageDiv card-img-top">                      
                            <img class="images"
                            data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
                            alt="Thumbnail [100%x225]"
                            src="../assets/img/'.$resultImg["name"].'"
                            data-holder-rendered="true">                         
                        </div>

                ';

            } else {

            echo '
            <div class="card-img-top"
            style="height: 225px; width: 100%; display: flex; justify-content: center; align-items: center;">
            Empty Album 
            </div>
            
            ';

            }

                                          
            echo ' 
                        <div class="card-body">
                            <h5 class="card-title">'.$row["title"].'</h5>
                            <p class="card-text">.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="../view/index.php?album='.$row["id"].'">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modal_editAlbum'.$row["id"].'">Edit</button>

                                    <form action="../controller/delete_album.php" method="post" id="delete_album'.$row["id"].'" hidden>
                                        <input class="login_tb" type="number" name="albumId" value="'.$row["id"].'" hidden>
                                    </form>

                                    <button type="submit" name="submit" form="delete_album'.$row["id"].'" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash-can"></i>Delete</button>

                                </div>
                                <!-- <small class="text-muted">9 mins</small> -->
                            </div>
                        </div>
                    </div>
                </div>
            ';

            echo '
            <!-- Modal -->
            <div class="modal fade" id="modal_editAlbum'.$row["id"].'" data-bs-backdrop="static" tabindex="-1" aria-labelledby="modal_editAlbumLabel'.$row["id"].'" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">

                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modal_editAlbumLabel'.$row["id"].'">Edit Album</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body"> 
                        <form action="../controller/edit_album.php" method="post" id="edit_album'.$row["id"].'">
                            <div class="login_div2">
                                <input class="login_tb" type="number" name="userId" value="'.$row["id"].'" hidden>
                                <input class="login_tb" type="text" id="album_title" name="album_title" value="'.$row["title"].'" placeholder="Title" autocomplete="off">
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" form="edit_album'.$row["id"].'" class="btn btn-success" name="submit">Update</button>
                    </div>

                    </div>
                </div>
            </div>
        ';

        }
    } 
    return $result;
};

?>

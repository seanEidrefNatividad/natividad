<?php 

function imageShow($conn, $userId, $albumId) {

    $result = imageShow_Model($conn, $userId, $albumId);
    if ($result){
        while($row = mysqli_fetch_assoc($result)) {
            echo '                       
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="card mb-4 box-shadow">
                         
                        <div class="imageDiv card-img-top">                      
                            <img data-enlargable class="images"
                            data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
                            alt="Thumbnail [100%x225]"
                            src="../assets/img/'.$row["name"].'"
                            data-holder-rendered="true">                         
                        </div>                                           

                        <div class="card-body">
                            <h5 class="card-title">'.$row["title"].'</h5>
                            <p class="card-text">'.$row["description"].'</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group mt-2">
                                    <!-- <button type="button" class="btn btn-sm btn-outline-secondary">View</button> -->
                                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modal_editImage'.$row["id"].'">Edit</button>
                                    
                                    <form action="../controller/delete_image.php" method="post" id="delete_image'.$row["id"].'" hidden>
                                        <input class="login_tb" type="number" name="imgId" value="'.$row["id"].'" hidden>
                                        <input class="login_tb" type="number" name="albumId" value="'.$albumId.'" hidden>
                                    </form>

                                    <button type="submit" name="submit" form="delete_image'.$row["id"].'" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash-can"></i>Delete</button>

                                </div>
                                <!-- <small class="text-muted">9 mins</small> -->
                            </div>
                        </div>
                    </div>
                </div>
            ';

            echo '
                <!-- Modal -->
                <div class="modal fade" id="modal_editImage'.$row["id"].'" data-bs-backdrop="static" tabindex="-1" aria-labelledby="modal_editImageLabel'.$row["id"].'" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">

                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modal_editImageLabel'.$row["id"].'">Edit Image</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <div class="modal-body"> 
                            <form action="../controller/edit_image.php" method="post" id="edit_image'.$row["id"].'">
                                <div class="login_div2">
                                    <input class="login_tb" type="number" name="imgId" value="'.$row["id"].'" hidden>
                                    <input class="login_tb" type="number" name="albumId" value="'.$albumId.'" hidden>
                                    <!-- <input class="login_tb" type="text" name="imgName" value="'.$row["name"].'" placeholder="image name"> -->
                                    <input class="login_tb" type="text" name="imgTitle" value="'.$row["title"].'" placeholder="image title">
                                    <input class="login_tb" type="text" name="imgDesc" value="'.$row["description"].'" placeholder="image description">
                                    <!-- <input type="file" name="img"> -->
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Discard</button>
                            <button type="submit" form="edit_image'.$row["id"].'" class="btn btn-success" name="submit">Update</button>
                        </div>

                        </div>
                    </div>
                </div>
            ';
        }
    } 
};


// <div class="card-img-top" style="background-color: red;height: 225px; width: 100%;">
                            
//                             <img style="object-fit: cover;" src="../assets/img/'.$row["name"].'"/>
//                          </div>

// <div style="height: 225px; width: 100%; display: block; background-image: url(../assets/img/'.$row["name"].')">

//                             </div>


// <img class="card-img-top"
//                             data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
//                             alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;"
//                             src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22288%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20288%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_187a6ab79e1%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_187a6ab79e1%22%3E%3Crect%20width%3D%22288%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2296.828125%22%20y%3D%22118.8%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
//                             data-holder-rendered="true">

?>
<?php
ob_start();
session_start();

// If session variable is not found
if (!isset($_SESSION['user_name'])) {
    // Redirect user to login page
    header('Location: login.php');
}

require_once('inc/top.php');
require_once('inc/db.php');

if($_GET['id']) {
    $edit_id=$_GET['id'];

    $gallery="SELECT * FROM gallery WHERE gallery_id = '$edit_id'";
    $runGallery=mysqli_query($con,$gallery);
    $row=mysqli_fetch_array($runGallery);

    $gallery_id=$row['gallery_id'];
    $gallery_title=$row['gallery_title'];
    $u_imagea=$row['gallery_image'];
}

?>



<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-2">
            <?php include('inc/navbar.php'); ?>
        </div>
    </div>

    <div class="row mt-1">
        <div class="col-md-3">
            <?php include('inc/sidebar.php'); ?>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <img src="images/logo.jpg" alt="logo" class="img-fluid"><hr>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center text-white bg-primary">Add Image to Gallery</h3><hr>
                

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Image Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $gallery_title;?>" 
                                name="imageTitle"/>
                            </div> 
                        </div>  
                        
                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Image </label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file btn btn-danger"  name="u_image" />
                            </div> 
                        </div> 

                        <div class="form-group row">
                                
                            <div class="offset-sm-2 col-sm-10">
                                <button class="btn btn-outline-primary btn-block" name="update" type="submit">Update
                                Image</button> 
                            </div> 
                        </div> 
                    </form>
                    </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row bg-dark mt-2 p-3">
            <?php include('inc/footer.php'); ?>
        </div>
    </div>
</div>

</body>
</html>

<?php 
    if(isset($_POST['update'])) {
        $imageTitle=$_POST['imageTitle'];

        $u_image=$_FILES['u_image']['name'];
        $image_tmp=$_FILES['u_image']['tmp_name'];

        if(empty($u_image)){
            $u_image=$u_imagea;
        } else {
            $u_image= 'GalleryImg' .date('Y-m-d-H-i-s') . '_' . uniqid() . 'jpg';
        }

        move_uploaded_file($image_tmp, "../images/gallery/$u_image");

        $update ="UPDATE gallery set
        gallery_title = '$imageTitle',
        gallery_image = '$u_image'
        WHERE gallery_id='$edit_id';
        ";
        
        $insert_pro = mysqli_query($con,$update);

        if($insert_pro) {
            echo "<script>alert('Welcome , You have Updated a new image !')</script>";
            echo "<script>window.open('gallery.php','_self')</script>";
        }
    }
?>
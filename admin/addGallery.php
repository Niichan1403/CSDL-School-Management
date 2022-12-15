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
                    <h3 class="text-center text-white bg-primary">Thêm ảnh vào thư viện</h3><hr>
                

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Tiêu đề</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Thêm tiêu đề" name="imageTitle"
                                />
                            </div> 
                        </div>  
                        
                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Ảnh </label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file btn btn-danger"  name="u_image" />
                            </div> 
                        </div> 

                        <div class="form-group row">
                                
                            <div class="offset-sm-2 col-sm-10">
                                <button class="btn btn-outline-primary btn-block" name="submit" type="submit">Thêm ảnh</button> 
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
    if(isset($_POST['submit'])) {
        $imageTitle=$_POST['imageTitle'];

        $u_image=$_FILES['u_image']['name'];
        $image_tmp=$_FILES['u_image']['tmp_name'];

        $u_image= 'GalleryImg' .date('Y-m-d-H-i-s') . '_' . uniqid() . 'jpg';

        move_uploaded_file($image_tmp, "../images/gallery/$u_image");

        $insert_gallery = "INSERT INTO gallery (gallery_title,gallery_image) VALUES ('$imageTitle','$u_image')";
        
        $insert_pro = mysqli_query($con,$insert_gallery);

        if($insert_pro) {
            echo "<script>alert('Welcome , You have Added a new image !')</script>";
            echo "<script>window.open('gallery.php','_self')</script>";
        }
    }
?>
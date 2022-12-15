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

if(isset($_GET['del'])) {
    $del_id = $_GET['del'];

    $del_query ="DELETE FROM gallery WHERE gallery_id = '$del_id'";
    $del_run = mysqli_query($con,$del_query);
    if($del_run) {
        echo "<script> alert('You have Deleted Successfully')</script>";
        echo "<script> window.open('gallery.php', '_self')</script>";
    }
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
                    <img src="images/logo.jpg" class="img-fluid" /><hr>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center text-white bg-primary">Thư viện ảnh</h2>
                    <div align = "right">
                        <a href="addGallery.php" class="btn btn-outline-primary">Thêm ảnh </a><hr>
                    </div>
                    <table class="table table-border" id="table2excel">
                        <thead class="thead-dark">
                            <tr> 
                                <th>STT</th> 
                                <th>Tiêu đề</th> 
                                <th>Ảnh</th> 
                                <th>
                                    <i class="fa fa-pencil-square-o"></i>
                                </th> 
                                <th>
                                    <i class="fa fa-trash-o"></i>
                                </th> 
                            </tr> 
                        </thead>
                        <tbody>
                            <?php
                                $gallery = "SELECT * FROM gallery ORDER BY gallery_id DESC";
                                $runGallery = mysqli_query($con,$gallery);
                                $i=0;
                                while($rowGallery = mysqli_fetch_array($runGallery)){
                                    $gallery_id=$rowGallery['gallery_id'];
                                    $gallery_title = $rowGallery['gallery_title'];
                                    $gallery_image = $rowGallery['gallery_image'];
                                    $i++;
                                
                            ?>
                            <tr> 
                            <td><?php echo  $i;?></td>
                            <td><?php echo  ucfirst($gallery_title);?></td>
                            <td>
                                <img class="img-fluid" src="../images/gallery/<?php echo $gallery_image;?>" 
                                width ="100px;" />
                            </td>
                            <td>
                                <a class="btn btn-warning" href="editGallery.php?id=<?php echo $gallery_id;?>"><i 
                                class="fa fa-pencil-square-o"></i></a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="gallery.php?del=<?php echo $gallery_id;?>"><i 
                                class="fa fa-trash-o"></i></a>
                            </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                    <button class="btn btn-danger offset-md-4" id="btn" type="button">Xuất ra Excel</button>

            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row bg-dark mt-2">
            <?php include('inc/footer.php'); ?>
        </div>
    </div>
</div>

</body>
</html>

<script>
    $(document).ready(function() {
        $('#table2excel').DataTable();
    });
</script>

<script>
    $("#btn").click(function(){
        $("#table2excel").table2excel({
            name:"Worksheet name",
            filename:"gallery.xls"
        });
    });
</script>
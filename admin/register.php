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

    $del_query ="DELETE FROM student WHERE id = '$del_id'";
    $del_run = mysqli_query($con,$del_query);
    if($del_run) {
        echo "<script> alert('You have Deleted Successfully')</script>";
        echo "<script> window.open('student.php', '_self')</script>";
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
                    <h2 class="text-center text-white bg-primary">Hiển thị danh sách đăng ký</h2>
                    <table class="table table-border" id="table2excel">
                        <thead class="thead-dark">
                            <tr> 
                                <th>STT</th> 
                                <th>Tên</th> 
                                <th>Email</th> 
                                <th>Điện thoại</th> 
                                <th>Địa chỉ</th>
                                <th>Lớp</th>
                                <th>Ngày</th>
                            </tr> 
                        </thead>
                        <tbody>
                            <?php
                                $register = "SELECT * FROM register ORDER BY regid DESC";
                                $runregister = mysqli_query($con,$register);
                                $i=0;
                                while($rowregister = mysqli_fetch_array($runregister)){
                                    $regName = $rowregister['regName'];
                                    $regEmail = $rowregister['regEmail'];
                                    $regMobile = $rowregister['regMobile'];
                                    $regAddress = $rowregister['regAddress'];
                                    $regQua = $rowregister['regQua'];
                                    $date = $rowregister['date'];
                                    $i++;
                            
                            ?>
                            <tr> 
                                <td><?php echo  $i;?></td>
                                <td><?php echo  ucfirst($regName);?></td>
                                <td><?php echo  $regEmail;?></td>
                                <td><?php echo  $regMobile;?></td>
                                <td><?php echo  $regAddress;?></td>
                                <td><?php echo  $regQua;?></td>
                                <td><?php echo  $date;?></td>
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
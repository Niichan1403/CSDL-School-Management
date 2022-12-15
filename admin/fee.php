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

    $del_query ="DELETE FROM fee WHERE id = '$del_id'";
    $del_run = mysqli_query($con,$del_query);
    if($del_run) {
        echo "<script> alert('You have Deleted Successfully')</script>";
        echo "<script> window.open('fee.php', '_self')</script>";
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
                    <h2 class="text-center text-white bg-primary">Chi tiết học phí</h2>
                    <table class="table table-border" id="table2excel">
                        <thead class="thead-dark">
                            <tr> 
                                <th>STT</th> 
                                <th>Tên</th> 
                                <th>Lớp</th> 
                                <th>Khóa học</th> 
                                <th>Số tiền</th>
                                <th>Số hóa đơn</th>
                                <th>Ngày</th>
                                <th><i class="fa fa-trash-o"></i></th>
                            </tr> 
                        </thead>
                        <tbody>
                            <?php
                                $fee = "SELECT * FROM fee ORDER BY id DESC";
                                $runfee = mysqli_query($con,$fee);
                                $i=0;
                                while($rowfee = mysqli_fetch_array($runfee)){
                                    $id = $rowfee['id'];
                                    $studentId = $rowfee['studentID'];
                                    $classId = $rowfee['classID'];
                                    $batchId = $rowfee['batchID'];
                                    $fees = $rowfee['fees'];
                                    $rNo = $rowfee['rNo'];
                                    $date = $rowfee['date'];
                                    $i++;
                                    
                                    $list = "select * from student where id = $studentId";
                                    $runlist = mysqli_query($con, $list);
                                    $rowlist = mysqli_fetch_array($runlist);
                                    
                                    $name = $rowlist['name'];
                                    
                                    $batch = "select * from courses where course_id = $batchId";
                                    $runbatch = mysqli_query($con, $batch);
                                    $rowbatch = mysqli_fetch_array($runbatch);
                                    
                                    $course_name = $rowbatch['course_name'];
                            
                            ?>
                            <tr> 
                                <td><?php echo  $i;?></td>
                                <td><?php echo  ucfirst($name);?></td>
                                <td>Class <?php echo  $classId;?></td>
                                <td><?php echo $batchId;?></td>
                                <td><?php echo  $fees;?></td>
                                <td><?php echo  $rNo;?></td>
                                <td><?php echo  $date;?></td>
                                <td><a href="fee.php?del=<?php echo $id;?>" class="btn btn-danger">
                                <i class="fa fa-trash-o"></i></a>
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
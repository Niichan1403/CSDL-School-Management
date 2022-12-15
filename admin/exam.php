<?php
ob_start();
session_start();

if (!isset($_SESSION['user_name']))
{
    header('Location: login.php');
}

require_once ('inc/top.php');
require_once ('inc/db.php');

if(isset($_GET['del'])) {
    $del_id = $_GET['del'];
    
    $del_query = "DELETE FROM exam WHERE id = '$del_id'";
    $del_run = mysqli_query($con, $del_query);
    if ($del_run) {
        echo "<script>alert('Delete Successfully')</script>";
        echo "<script>window.open('exam.php', '_self')</script>";
    }
}

?>


<div class="container-fluid">
    <div class="row-mt-2">
        <div class="col-md-12">
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
                    <h2 class="text-center text-white bg-primary">Hiển thị kỳ thi</h2>
                    <div align="right">
                        <a href="addExam.php" class="btn btn-outline-primary">Thêm kỳ thi</a> <hr>
                    </div>
                    <table class="table table-border" id = "table2excel">
                        <thead class="thead-dark">
                            <tr>
                                <th>STT</th>
                                <th>Tên khóa học</th>
                                <th>Ngày</th>
                                <th>Môn học</th>
                                <th>Điểm tổng</th>
                                <th>
                                    <i class="fa fa-eye"></i>
                                </th>
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
                                $exam = "SELECT * FROM exam ORDER BY id DESC";
                                $run_exam = mysqli_query($con, $exam);
                                $i=0;
                                while($row_exam = mysqli_fetch_array($run_exam)) {
                                    $id = $row_exam['id'];
                                    $batchName = $row_exam['batchName'];
                                    $date = $row_exam['date'];
                                    $subject = $row_exam['subject'];
                                    $totalMarks = $row_exam['totalMark'];
                                    $class = $row_exam['class'];
                                    $i++;
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo ucfirst($batchName);?></td>
                                <td><?php echo $date;?></td>
                                <td><?php echo $subject;?></td>
                                <td><?php echo $totalMarks;?></td>
                                
                                <td>
                                    <a class="btn btn-primary" href="csv.php?id=<?php echo $id;?>"><i class="fa fa-eye"></i></a>
                                </td>
                                <td>
                                     <a class="btn btn-warning" href="exam.php?id=<?php echo $id;?>"><i class="fa fa-pencil-square-o"></i></a>
                                </td>
                                <td>
                                     <a class="btn btn-danger" href="exam.php?del=<?php echo $id;?>"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-danger offset-md-4" id ="btn" type="button">Xuất ra Excel</button>
            </div>
            
        </div>
    </div>
    
           
    <div class="container-fluid">
        <div class="row bg-dark mt-2">
            <?php include ('inc/footer.php'); ?>
        </div>
    </div>
</div>

</body>
</html>
            
<script>
    $(document).ready(function(){
        $('table2excel').DataTable();
    });
</script>

<script>
$("#btn").click(function(){
    $("#table2excel").table2excel({
        name:"Worksheet name",
        filename: "gallery.xls"
    });
});
</script>
            

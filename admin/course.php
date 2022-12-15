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
    
    $del_query = "DELETE FROM courses WHERE course_id = '$del_id'";
    $del_run = mysqli_query($con, $del_query);
    if ($del_run) {
        echo "<script>alert('Delete Successfully')</script>";
        echo "<script>window.open('course.php', '_self')</script>";
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
                    <h2 class="text-center text-white bg-primary">Hiển thị khóa học</h2>
                    <div align="right">
                        <a href="addCourse.php" class="btn btn-outline-primary">Thêm khóa học</a> <hr>
                    </div>
                    <table class="table table-border" id = "table2excel">
                        <thead class="thead-dark">
                            <tr>
                                <th>STT</th>
                                <th>Tên khóa học</th>
                                <th>Lớp</th>
                                <th>Thời gian</th>
                                <th>Học phí</th>
                                <th>Số lượng học sinh</th>
                                <th>Bắt đầu từ</th>
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
                                $course = "SELECT * FROM courses ORDER BY course_id DESC";
                                $run_course = mysqli_query($con, $course);
                                $i=0;
                                while($row_course = mysqli_fetch_array($run_course)) {
                                    $course_id = $row_course['course_id'];
                                    $course_name = $row_course['course_name'];
                                    $course_duration = $row_course['course_duration'];
                                    $course_fee = $row_course['course_fee'];
                                    $course_start = $row_course['course_start'];
                                    $class = $row_course['class'];
                                    $i++;

                                    $list = "SELECT * FROM student WHERE batch = '$course_id'";
                                    $run_list = mysqli_query($con, $list);
                                    $row_list = mysqli_num_rows($run_list);

                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo ucfirst($course_name);?></td>
                                <td><?php echo $class;?></td>
                                <td><?php echo $course_duration;?></td>
                                <td><?php echo $course_fee;?></td>
                                <td><?php echo $row_list;?></td>
                                <td><?php echo $course_start;?></td>
                                
                                <td>
                                    <a class="btn btn-primary" href="viewCourse.php?id=<?php echo $course_id;?>"><i class="fa fa-eye"></i></a>
                                </td>
                                <td>
                                     <a class="btn btn-warning" href="editCourse.php?id=<?php echo $course_id;?>"><i class="fa fa-pencil-square-o"></i></a>
                                </td>
                                <td>
                                     <a class="btn btn-danger" href="course.php?del=<?php echo $course_id;?>"><i class="fa fa-trash-o"></i></a>
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
            

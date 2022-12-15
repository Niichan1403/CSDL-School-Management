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
                    <h2 class="text-center text-white bg-primary">Hiển thị học sinh</h2>
                    <div align = "right">
                        <a href="addStudent.php" class="btn btn-outline-primary">Thêm học sinh </a><hr>
                    </div>
                    <table class="table table-border" id="table2excel">
                        <thead class="thead-dark">
                            <tr> 
                                <th>STT</th> 
                                <th>Tên</th> 
                                <th>Lớp</th> 
                                <th>Khóa học</th> 
                                <th>Ảnh</th> 
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
                                $student = "SELECT * FROM student ORDER BY id DESC";
                                $runstudent = mysqli_query($con,$student);
                                $i=0;
                                while($rowstudent = mysqli_fetch_array($runstudent)){
                                    $id = $rowstudent['id'];
                                    $name = $rowstudent['name'];
                                    $class = $rowstudent['class'];
                                    $batch = $rowstudent['batch'];
                                    $image = $rowstudent['image'];
                                    $i++;
                                

                                    $course = "SELECT * FROM courses WHERE course_id = '$batch'";
                                    $run_course = mysqli_query($con,$course);
                                    $row_courses = mysqli_fetch_array($run_course);

                                    $course_id= $row_courses['course_id'];
                                    $course_name= $row_courses['course_name'];
                            
                            ?>
                            <tr> 
                            <td><?php echo  $i;?></td>
                            <td><?php echo  ucfirst($name);?></td>
                            <td><?php echo  $class;?></td>
                            <td><?php echo  $course_name;?></td>
                            <td>
                                <img class="img-fluid" src="../images/student/<?php echo $image;?>" width ="100px;" />
                            </td>
                            <td>
                                <a class="btn btn-primary" href="studentDetails.php?id=<?php echo  $id;?>"><i 
                                class="fa fa-pencil-square-o"></i></a>
                            </td>
                            <td>
                                <a class="btn btn-warning" href="editStudent.php?id=<?php echo  $id;?>"><i 
                                class="fa fa-pencil-square-o"></i></a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="student.php?del=<?php echo  $id;?>"><i 
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
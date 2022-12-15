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

if(isset($_GET['id'])) {
    $id = $_GET['id'];
}

if(isset($_POST['checkboxes'])) {
    foreach($_POST['checkboxes'] as $user_id) {
        $bulk_option = $_POST['bulk-options'];
        if($bulk_option == 'present') {
            $insert = "insert into attendance (studentId, attendance, date) values ('$user_id', 'Present', NOW())";
            $insert_pro = mysqli_query($con, $insert);
        }
        if($bulk_option == 'absent') {
            $insert = "insert into attendance (studentId, attendance, date) values ('$user_id', 'Absent', NOW())";
            $insert_pro = mysqli_query($con, $insert);
        }
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
                    <h2 class="text-center text-white bg-primary">Danh sách học sinh</h2>
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="form-group">
                                <select class="form-control" name="bulk-options">
                                    <option value="">Select</option>
                                    <option value="present">Có mặt</option>
                                    <option value="absent">Vắng mặt</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-8">
                            <input type="submit" class="btn btn-warning" value="Apply" onClick="javascript: return confirm('Please Confirm')" />
                        </div>
                    </div>
                    
                    <table class="table table-border" id="table2excel">
                        <thead class="thead-dark">
                            <tr> 
                                <th><input type="checkbox" id="selectallboxes"/></th>
                                <th>STT</th> 
                                <th>Tên</th> 
                                <th>Trường</th> 
                                <th>Giới tính</th> 
                                <th>Lớp</th> 
                                <th>Khóa học</th> 
                                <th>Ảnh</th> 
                            </tr> 
                        </thead>
                        <tbody>
                            <?php
                                $student = "SELECT * FROM student where batch = '$id'";
                                $runstudent = mysqli_query($con,$student);
                                $i=0;
                                while($rowstudent = mysqli_fetch_array($runstudent)){
                                    $id = $rowstudent['id'];
                                    $name = $rowstudent['name'];
                                    $class = $rowstudent['class'];
                                    $batch = $rowstudent['batch'];
                                    $image = $rowstudent['image'];
                                    $school = $rowstudent['school'];
                                    $gender = $rowstudent['gender'];
                                    $i++;
                                

                                    $course = "SELECT * FROM courses WHERE course_id = '$batch'";
                                    $run_course = mysqli_query($con,$course);
                                    $row_courses = mysqli_fetch_array($run_course);

                                    $course_id= $row_courses['course_id'];
                                    $course_name= $row_courses['course_name'];
                            
                            ?>
                            <tr> 
                                <td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php echo $id;?>"/></td>
                                <td><?php echo  $i;?></td>
                                <td><a href="presenty.php?id=<?php echo $id;?>"><?php echo  ucfirst($name);?></a></td>
                                <td><?php echo  $school;?></td>
                                <td><?php echo  $gender;?></td>
                                <td><?php echo  $class;?></td>
                                <td><?php echo  $batch;?></td>
                                <td>
                                    <img class="img-fluid" src="../images/student/<?php echo $image;?>" width ="100px;" />
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

<script>
    $(document).ready(function(){
        $('#selectallboxes').click(function(event){
            if(this.checked){
                $('.checkboxes').each(function(){
                    this.checked = true;
                });
            } else {
                $('.checkboxes').each(function(){
                    this.checked = false;
                });
            }
        })
    })
</script>
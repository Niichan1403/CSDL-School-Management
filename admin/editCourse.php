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

    $Course="SELECT * FROM courses WHERE course_id = '$edit_id'";
    $runCourse=mysqli_query($con,$Course);
    $row=mysqli_fetch_array($runCourse);

    $course_id=$row['course_id'];
    $course_name=$row['course_name'];
    $date = $row['course_start'];
    $duration=$row['course_duration'];
    $course_fee=$row['course_fee'];
    $class = $row['class'];

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
                    <h3 class="text-center text-white bg-primary">Sửa khóa học</h3><hr>
                

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Tên khóa học</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $course_name;?>" name="courseName"/>
                            </div> 
                        </div>  


                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Lớp</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="class" required>
                                    <option value="1" <?php if($class == '1'){echo "selected";} ?> >Lớp 1</option>
                                    <option value="2" <?php if($class == '2'){echo "selected";} ?> >Lớp 2</option>
                                    <option value="3" <?php if($class == '3'){echo "selected";} ?>>Lớp 3</option>
                                    <option value="4" <?php if($class == '4'){echo "selected";} ?>>Lớp 4</option>
                                    <option value="5" <?php if($class == '5'){echo "selected";} ?>>Lớp 5</option>
                                    <option value="6" <?php if($class == '6'){echo "selected";} ?>>Lớp 6</option>
                                    <option value="7" <?php if($class == '7'){echo "selected";} ?>>Lớp 7</option>
                                    <option value="8" <?php if($class == '8'){echo "selected";} ?>>Lớp 8</option>
                                    <option value="9" <?php if($class == '9'){echo "selected";} ?>>Lớp 9</option>
                                    <option value="10" <?php if($class == '10'){echo "selected";} ?>>Lớp 10</option>
                                </select>
                            </div> 
                        </div>  


                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Học phí</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $course_fee;?>" name="fee"
                                required/>
                            </div> 
                        </div>  



                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Bắt đầu từ</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="date" value="<?php echo $date;?>"/>
                            </div> 
                        </div>  
                        
                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger"> Thời gian </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value = "<?php echo $duration;?>"  name="duration" required/>
                            </div> 
                        </div> 

                        <div class="form-group row">
                                
                            <div class="offset-sm-2 col-sm-10">
                                <button class="btn btn-outline-primary btn-block" name="update" type="submit">Sửa khóa học</button> 
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
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        $courseName=$_POST['courseName'];
        $fee=$_POST['fee'];
        $date=$_POST['date'];
        $duration=$_POST['duration'];
        $class=$_POST['class'];


        $update = "UPDATE courses set
        course_name = '$courseName',
        course_duration = '$duration',
        course_fee = '$fee',
        course_start = '$date',
        class = '$class'
        where course_id = '$id';
        ";
        
        $insert_pro = mysqli_query($con,$update);

        if($insert_pro) {
            echo "<script>alert('Welcome , You have Edit Course !')</script>";
            echo "<script>window.open('course.php','_self')</script>";
        } else {
            echo "<script>alert('Nope !')</script>";
        }
    }
?>
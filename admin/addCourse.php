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
                    <h3 class="text-center text-white bg-primary">Thêm khóa học</h3><hr>
                

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Tên khóa học</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Nhập tên" name="courseName"
                                />
                            </div> 
                        </div>  

                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Lớp</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="class" required>
                                    <option value="1">Lớp 1</option>
                                    <option value="2">Lớp 2</option>
                                    <option value="3">Lớp 3</option>
                                    <option value="4">Lớp 4</option>
                                    <option value="5">Lớp 5</option>
                                    <option value="6">Lớp 6</option>
                                    <option value="7">Lớp 7</option>
                                    <option value="8">Lớp 8</option>
                                    <option value="9">Lớp 9</option>
                                    <option value="10">Lớp 10</option>
                                </select>
                            </div> 
                        </div>  

            

                

         

                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Thời gian</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Nhập thời gian" name="duration" required/>
                            </div> 
                        </div>  

                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Học phí</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Nhập học phí" name="fee"
                                required/>
                            </div> 
                        </div>  

                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Bắt đầu từ</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="date" required/>
                            </div> 
                        </div>  

                        <div class="form-group row">    
                            <div class="offset-sm-2 col-sm-10">
                                <button class="btn btn-outline-primary btn-block" name="submit" type="submit">Thêm khóa học</button> 
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
        $courseName=$_POST['courseName'];
        $class=$_POST['class'];
        $duration=$_POST['duration'];
        $fee=$_POST['fee'];
        $date=$_POST['date'];


        $insert_course = "INSERT INTO courses
         (course_name, course_duration, course_fee, course_start, class) value ('$courseName', '$duration', '$fee', '$date', '$class')";
        
        $insert_pro = mysqli_query($con,$insert_course);

        if($insert_pro) {
            echo "<script>alert('Welcome , You have Added a new Batch !')</script>";
            echo "<script>window.open('course.php','_self')</script>";
        }
    }
?>
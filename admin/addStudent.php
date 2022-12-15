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
                    <h3 class="text-center text-white bg-primary">Thêm học sinh</h3><hr>
                

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Tên học sinh</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Nhập tên" name="studentName"
                                />
                            </div> 
                        </div>  

                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Địa chỉ</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Thêm địa chỉ" name="address"
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
                                <label class="col-sm-2 col-form-label text-danger">Khóa học</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="batch" onChange="myNewFunction(this);" required>
                                    <?php
                                        $getBatch ="SELECT * FROM courses";
                                        $run_batch = mysqli_query($con,$getBatch);
                                        while($rowBatch=mysqli_fetch_array($run_batch)) {
                                            $id=$rowBatch['course_id'];
                                            $course_name=$rowBatch['course_name'];                                        
                                    ?>
                                    <option value="<?php echo $id;?>"><?php echo $course_name;?></option>

                                    <?php } ?>
                                </select>
                            </div> 
                        </div>  

                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Bằng cấp</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="medium" required>
                                    <option value="Marathi">Marathi</option>
                                    <option value="SEMI">SEMI</option>
                                    <option value="CBSE">CBSE</option>
                                </select>
                            </div> 
                        </div>  

                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Giới tính</label>
                            <div class="col-sm-10">
                            <select class="form-control" name="gender" required>
                                    <option value="male">Nam</option>
                                    <option value="female">Nữ</option>
                                </select>
                            </div> 
                        </div>  

                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Điện thoai</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Thêm số điện thoại" name="mobile"
                                required/>
                            </div> 
                        </div>  

                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Nhập Email" name="email"
                                required/>
                            </div> 
                        </div>  

                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Trường</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Nhập trường" name="school"
                                required/>
                            </div> 
                        </div>  

                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Học phí</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Nhập tổng học phí" name="fee"
                                required/>
                            </div> 
                        </div>  

                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Mật khẩu</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Nhập mật khẩu" name="password"
                                required/>
                            </div> 
                        </div> 

                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Môn học</label>
                            <div class="col-sm-10">
                                <?php
                                    $subject="SELECT * FROM subject";
                                    $runSubject=mysqli_query($con,$subject);
                                    while($rowSubject=mysqli_fetch_array($runSubject)) {
                                        $id=$rowSubject['id'];
                                        $subjectName=$rowSubject['subjectName'];
                                ?>

                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="sub[]" value="<?php echo 
                                        $subjectName;?>"/> <?php echo $subjectName;?>
                                    </label>
                                </div>
                                <?php } ?>
                            </div> 
                        </div>   

                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Kỳ thi</label>
                            <div class="col-sm-10">
                                <?php
                                    $subject="SELECT * FROM competitive";
                                    $runSubject=mysqli_query($con,$subject);
                                    while($rowSubject=mysqli_fetch_array($runSubject)) {
                                        $id=$rowSubject['id'];
                                        $examName=$rowSubject['examName'];
                                ?>

                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="com[]" value="<?php echo 
                                        $examName;?>"/> <?php echo $examName;?>
                                    </label>
                                </div>
                                <?php } ?>
                            </div> 
                        </div>  

                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Ngày sinh</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="date"
                                />
                            </div> 
                        </div>  
                        
                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Ảnh học sinh</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file btn btn-danger"  name="u_image" required/>
                            </div> 
                        </div> 

                        <div class="form-group row">
                                
                            <div class="offset-sm-2 col-sm-10">
                                <button class="btn btn-outline-primary btn-block" name="submit" type="submit">Thêm học sinh</button> 
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

<script>
    function myNewFunction(sel) {
        return sel.options[sel.selectedIndex].text;
    }
</script>

<?php 
    if(isset($_POST['submit'])) {
        $studentName=$_POST['studentName'];
        $address=$_POST['address'];
        $class=$_POST['class'];
        $batch=$_POST['batch'];
        $medium=$_POST['medium'];
        $gender=$_POST['gender'];
        $mobile=$_POST['mobile'];
        $email=$_POST['email'];
        $school=$_POST['school'];
        $fee=$_POST['fee'];
        $password=$_POST['password'];
        $date=$_POST['date'];

        $sub = implode(",",$_POST['sub']);
        $com = implode(",",$_POST['com']);

        $image_tmp = $_FILES['u_image']['tmp_name'];
        $u_image = 'student_'.date('Y-m-d-H-i-s'). '_'. uniqid() . '.jpg';

        move_uploaded_file($image_tmp,"../images/student/$u_image");

        $insert_student = "INSERT INTO student
         (name,address,class,batch,medium,gender,mobile,email,school,fee,password,subject,cexam,dob,image,date) 
         VALUES 
         ('$studentName','$address','$class','$batch','$medium','$gender'
         ,'$mobile','$email','$school','$fee','$password','$sub','$com','$date','$u_image',NOW())";
        
        $insert_pro = mysqli_query($con,$insert_student);

        if($insert_pro) {
            echo "<script>alert('Welcome , You have Added a new Student !')</script>";
            echo "<script>window.open('student.php','_self')</script>";
        }
    }
?>
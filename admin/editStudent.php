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

    $Student="SELECT * FROM student WHERE id = '$edit_id'";
    $runStudent=mysqli_query($con,$Student);
    $row=mysqli_fetch_array($runStudent);

    $id=$row['id'];
    $name=$row['name'];
    $address=$row['address'];
    $class=$row['class'];
    $batch=$row['batch'];
    $medium=$row['medium'];
    $gender=$row['gender'];
    $mobile=$row['mobile'];
    $email=$row['email'];
    $school=$row['school'];
    $feeAmt=$row['fee'];
    $password=$row['password'];

    $dob=$row['dob'];
    $u_imagea=$row['image'];
    $date=$row['date'];
    $subject=$row['subject'];
    $cexam=$row['cexam'];
    $subjectArray=explode(",",$subject);
    $compArray=explode(",",$cexam);

    $courses = "SELECT * FROM courses WHERE course_id = '$batch'";
    $run_courses = mysqli_query($con,$courses);
    $row_courses = mysqli_fetch_array($run_courses);
    
    $course_id = $row_courses['course_id'];
    $course_name = $row_courses['course_name'];
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
                    <h3 class="text-center text-white bg-primary">Edit Student</h3><hr>
                

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Student Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $name;?>" name="studentName"/>
                            </div> 
                        </div>  

                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Address</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $address;?>" name="address"
                                />
                            </div> 
                        </div>  

                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">For Class</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="class" required>
                                    <option value="1" <?php if($class == '1'){echo "selected";} ?> >Class 1</option>
                                    <option value="2" <?php if($class == '2'){echo "selected";} ?> >Class 2</option>
                                    <option value="3" <?php if($class == '3'){echo "selected";} ?>>Class 3</option>
                                    <option value="4" <?php if($class == '4'){echo "selected";} ?>>Class 4</option>
                                    <option value="5" <?php if($class == '5'){echo "selected";} ?>>Class 5</option>
                                    <option value="6" <?php if($class == '6'){echo "selected";} ?>>Class 6</option>
                                    <option value="7" <?php if($class == '7'){echo "selected";} ?>>Class 7</option>
                                    <option value="8" <?php if($class == '8'){echo "selected";} ?>>Class 8</option>
                                    <option value="9" <?php if($class == '9'){echo "selected";} ?>>Class 9</option>
                                    <option value="10" <?php if($class == '10'){echo "selected";} ?>>Class 10</option>
                                </select>
                            </div> 
                        </div>  

                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Batch</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="batch" required>
                                    <?php
                                        $getBatch ="SELECT * FROM courses";
                                        $run_batch = mysqli_query($con,$getBatch);
                                        while($rowBatch=mysqli_fetch_array($run_batch)) {
                                            $option_id=$rowBatch['course_id'];
                                            $option_title=$rowBatch['course_name'];
                                        
                                    ?>
                                    <option value="<?php echo $option_id;?>"  <?php if($batch == $option_id){echo "selected";} ?>><?php echo 
                                    $option_title;?></option>

                                    <?php } ?>
                                </select>
                            </div> 
                        </div>  

                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Medium</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="medium" required>
                                    <option value="Marathi" <?php if($medium == "Marathi"){echo "selected";} ?> >Marathi</option>
                                    <option value="SEMI" <?php if($medium == "SEMI"){echo "selected";} ?> >SEMI</option>
                                    <option value="CBSE" <?php if($medium == "CBSE"){echo "selected";} ?> >CBSE</option>
                                </select>
                            </div> 
                        </div>  

                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Gender</label>
                            <div class="col-sm-10">
                            <select class="form-control" name="gender" required>
                                    <option value="male" <?php if($gender == "male"){echo "selected";} ?> >Male</option>
                                    <option value="female" <?php if($gender == "female"){echo "selected";} ?> >Female</option>
                                </select>
                            </div> 
                        </div>  

                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Mobile</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $mobile;?>" name="mobile"
                                required/>
                            </div> 
                        </div>  

                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $email;?>" name="email"
                                required/>
                            </div> 
                        </div>  

                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">School</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $school;?>" name="school"
                                required/>
                            </div> 
                        </div>  

                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Fees</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $feeAmt;?>" name="fee"
                                required/>
                            </div> 
                        </div>  

                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Password</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php echo $password;?>" name="password"
                                required/>
                            </div> 
                        </div> 

                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Subject</label>
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
                                        $subjectName;?>" <?php if(in_array("$subjectName",$subjectArray)){echo "checked";}?> /> 
                                        <?php echo $subjectName;?>
                                    </label>
                                </div>
                                <?php } ?>
                            </div> 
                        </div>   

                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Compititive Exam</label>
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
                                        $examName;?>" <?php if(in_array("$examName",$compArray)){echo "checked";}?> /> 
                                        <?php echo $examName;?>
                                    </label>
                                </div>
                                <?php } ?>
                            </div> 
                        </div>  

                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Date of Birth</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="date" value="<?php echo $dob;?>"/>
                            </div> 
                        </div>  
                        
                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Student Image </label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file btn btn-danger"  name="u_image" required/>
                            </div> 
                        </div> 

                        <div class="form-group row">
                                
                            <div class="offset-sm-2 col-sm-10">
                                <button class="btn btn-outline-primary btn-block" name="update" type="submit">Add
                                Student</button> 
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
            $id= $_GET['id'];
        }

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


        $u_image=$_FILES['u_image']['name'];
        $image_tmp=$_FILES['u_image']['tmp_name'];

        if(empty($u_image)){
            $u_image=$u_imagea;
        } else {
            $u_image= 'student_' .date('Y-m-d-H-i-s') . '_' . uniqid() . 'jpg';
        }

        move_uploaded_file($image_tmp, "../images/student/$u_image");

        $update = "UPDATE student set
        name = '$studentName',
        address = '$address',
        class = '$class',
        batch = '$batch',
        medium= '$medium',
        gender= '$gender',
        mobile= '$mobile',
        email = '$email',
        school= '$school',
        fee= '$fee',
        password ='$password',
        subject = '$sub',
        cexam = '$com',
        dob = '$date',
        image = '$u_image'
        WHERE id = '$id'
        ";
        
        $insert_pro = mysqli_query($con,$update);

        if($insert_pro) {
            echo "<script>alert('Welcome , You have Updated Student !')</script>";
            echo "<script>window.open('student.php','_self')</script>";
        }
    }
?>
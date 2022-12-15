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
                    <h3 class="text-center text-white bg-primary">Thêm kỳ thi</h3><hr>
                

                    <form action="" method="post" enctype="multipart/form-data">

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
                                <input type="text" class="form-control" placeholder="Nhập khóa học" name="batchName" required/>
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
                                        <input class="form-check-input" type="checkbox" name="subject" value="<?php echo 
                                        $subjectName;?>"/> <?php echo $subjectName;?>
                                    </label>
                                </div>
                                <?php } ?>
                            </div> 
                        </div>   

                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Điểm tổng</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Nhập điểm" name="totalMark" required/>
                            </div> 
                        </div>  
                        
                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Ngày kiểm tra</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="date" required/>
                            </div> 
                        </div> 

                        <div class="form-group row">    
                            <div class="offset-sm-2 col-sm-10">
                                <button class="btn btn-outline-primary btn-block" name="submit" type="submit">Thêm kỳ thi</button> 
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
        $batchName=$_POST['batchName'];
        $date=$_POST['date'];
        $subject=$_POST['subject'];
        $class=$_POST['class'];
        $totalMark=$_POST['totalMark'];


        $insert_exam = "INSERT INTO exam(batchName, date, subject, class, totalMark) value ('$batchName', '$date', '$subject', '$class', '$totalMark')";
        
        $insert_pro = mysqli_query($con,$insert_exam);

        if($insert_pro) {
            echo "<script>alert('Welcome , You have Added a new Exam !')</script>";
            echo "<script>window.open('exam.php','_self')</script>";
        }
    }
?>
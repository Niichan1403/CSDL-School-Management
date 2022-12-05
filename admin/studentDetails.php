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
                    <h3 class="text-center text-white bg-primary">Student Details</h3>
                </div>
                <div class="col-md-4">
                    <?php
                        $user_id = $_GET['id'];
                        $selectStudent = "SELECT * FROM student WHERE id = '$user_id'";
                        $run = mysqli_query($con, $selectStudent);
                        $row = mysqli_fetch_array($run);

                        $id = $row['id'];
                        $name = $row['name'];
                        $address = $row['address'];
                        $class = $row['class'];
                        $batch = $row['batch'];
                        $medium = $row['medium'];
                        $gender = $row['gender'];
                        $mobile = $row['mobile'];
                        $email = $row['email'];
                        $school = $row['school'];
                        $fee = $row['fee'];
                        $subject = $row['subject'];
                        $password = $row['password'];
                        $dob = $row['dob'];
                        $image = $row['image'];
                        $date = $row['date'];
                        $cexam = $row['cexam'];

                        $course = "SELECT * FROM courses WHERE course_id = '$batch'";
                        $run_course = mysqli_query($con, $course);
                        $row_course = mysqli_fetch_array($run_course);

                        $course_id = $row_course['course_id'];
                        $course_name = $row_course['course_name'];
                    ?>
                    <table class="table table-bordered table-condensed">
                        <tbody>
                            <tr>
                                <th class="bg-dark text-white">Name</th>
                                <th><?php echo $name;?></th>
                            </tr>
                            <tr>
                                <th class="bg-dark text-white">Address</th>
                                <th><?php echo $address;?></th>
                            </tr>
                            <tr>
                                <th class="bg-dark text-white">Class</th>
                                <th><?php echo $class;?></th>
                            </tr>
                            <tr>
                                <th class="bg-dark text-white">Batch</th>
                                <th><?php echo $batch;?></th>
                            </tr>
                            <tr>
                                <th class="bg-dark text-white">Medium</th>
                                <th><?php echo $medium;?></th>
                            </tr>
                            <tr>
                                <th class="bg-dark text-white">Gender</th>
                                <th><?php echo $gender;?></th>
                            </tr>
                            <tr>
                                <th class="bg-dark text-white">Mobile</th>
                                <th><?php echo $mobile;?></th>
                            </tr>
                            <tr>
                                <th class="bg-dark text-white">Email</th>
                                <th><?php echo $email;?></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <th class="bg-dark text-white">School</th>
                            <th><?php echo $school;?></th>
                        </tr>
                        <tr>
                            <th class="bg-dark text-white">Fees</th>
                            <th><?php echo $fee;?></th>
                        </tr>
                        <tr>
                            <th class="bg-dark text-white">Password</th>
                            <th><?php echo $password;?></th>
                        </tr>
                        <tr>
                            <th class="bg-dark text-white">Subject</th>
                            <th><?php echo $subject;?></th>
                        </tr>
                        <tr>
                            <th class="bg-dark text-white">Exam</th>
                            <th><?php echo $cexam;?></th>
                        </tr>
                        <tr>
                            <th class="bg-dark text-white">Date Of Birth</th>
                            <th><?php echo $dob;?></th>
                        </tr>
                        <tr>
                            <th class="bg-dark text-white">Registration Date</th>
                            <th><?php echo $date;?></th>
                        </tr>
                        
                    </table>
                
                </div>
                <div class="col-md-4">
                    <?php
                        $user_id = $_GET['id'];
                        $selectStudent = "SELECT * FROM student WHERE id = '$user_id'";
                        $run = mysqli_query($con, $selectStudent);
                        $row = mysqli_fetch_array($run);

                        $image = $row['image'];
                    ?>
                    <div class="card-mb-3" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="../images/student/<?php echo $image;?>" width="100%" class="img-fluid" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-danger" ><?php echo $name;?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div><hr>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center text-white bg-primary">Fees Details</h3>
                </div>
                <div class="col-md-0"></div>
                    <form action="" method="post">
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label text-dark">Add Fee Amount</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Enter Fee Amount" name="feepaid"/>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label text-dark">Receipt No</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Enter Receipt No" name="rNo"/>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="offset-sm-6 col-sm-6">
                                <button class="btn btn-primary" name ="addFees">Add Fees</button>
                            </div>
                        </div> 
                        
                    </form>
                    <div class="col-md-4">
                        <table class="table table-bordered table-condensed">
                            <?php
                                $feePaidByStudent = "select * from fee where studentId = '$id'";
                                $runPaidStudent = mysqli_query($con, $feePaidByStudent);
                                $tFees = 0;
                                $feesPaid = 0;

                                while($rowPaidStudent = mysqli_fetch_array($runPaidStudent)) {
                                    $feesPaid = $rowPaidStudent['fees'];
                                    $paidDate = $rowPaidStudent['date'];
                                    $tFees += $feesPaid;
                            ?>
                            <tbody>
                                <tr>
                                    <th class="bg-dark text-white"><?php echo $paidDate;?></th>
                                    <th><?php echo $feesPaid;?></th>
                                </tr>
                            </tbody>
                            <?php }?>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <table class="table table-bordered table-condensed">
                            <tbody>
                                <tr>
                                    <th class="bg-dark text-white">Total Fees</th>
                                    <th><?php echo $fee;?></th>
                                </tr>
                                <tr>
                                    <th class="bg-dark text-white">Paid Fees</th>
                                    <th><?php echo $tFees;?></th>
                                </tr>
                                <tr>
                                    <th class="bg-danger text-white">Balance</th>
                                    <th><?php echo $fee - $tFees;?></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-8">
                    <h3 class="text-center text-white bg-primary">Marks Details</h3>
                    <table class="table table-bordered" id="table2excel">
                        <thead class="thead-dark">
                            <tr>
                                <th>Date</th>
                                <th>Subject</th>
                                <th>Total Marks</th>
                                <th>Obtained Marks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $result = "select * from result where studentId = '$user_id'";
                                $run_result = mysqli_query($con, $result);
                                while($row_result = mysqli_fetch_array($run_result)) {
                                    $date = $row_result['date'];
                                    $subject = $row_result['subject'];
                                    $totalMarks = $row_result['totalMarks'];
                                    $obtainMark = $row_result['obtainmark'];
                            ?>
                            <tr>
                                <th><?php echo $date;?></th>
                                <th><?php echo $subject;?></th>
                                <th><?php echo $totalMarks;?></th>
                                <th><?php echo $obtainMark;?></th>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <h3 class="text-center text-white bg-primary">Attendance Details</h3>
                    <hr>
                    <div class="row">
                        <?php 
                            $present = "select * from attendance where studentId = '$user_id' and attendance = 'Present'";
                            $run_present = mysqli_query($con, $present);
                            $row_present = mysqli_num_rows($run_present);

                            $absent = "select * from attendance where studentId = '$user_id' and attendance = 'Absent'";
                            $run_absent = mysqli_query($con, $absent);
                            $row_absent = mysqli_num_rows($run_absent);
                        ?>
                        <div class="col-md-12">
                            <button type="button" class="btn btn-info btn-block">Present Days
                                <span class="badge badge-light"><? php echo $row_present; ?></span>
                            </button><hr>
                        </div>
                        
                        <div class="col-md-12">
                            <button type="button" class="btn btn-danger btn-block">Absent Days
                                <span class="badge badge-light"><? php echo $row_absent; ?></span>
                            </button>
                        </div>
                    </div>                
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <hr>
                    <h3 class="text-center bg-primary text-white">Message</h3><hr>
                    <table class="table table-bordered" id="newtable2excel">
                        <thead class="thead-dark">
                            <tr>
                                <th>Sr No</th>
                                <th>Date</th>
                                <th>Messages</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $msg = "select * from msg where studentId = '$user_id'";
                                $run_msg = mysqli_query($con, $result);
                                $i = 1;
                                while($row_msg = mysqli_fetch_array($run_msg)) {
                                    $msgMessage = $row_msg['message'];
                                    $msgDate = $row_msg['date'];
                                    $i++;
                                ?>
                                <tr>
                                    <th><?php echo $i;?></th>
                                    <th><?php echo $msgDate;?></th>
                                    <th><?php echo $msgMessage;?></th>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
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
    $(document).ready(function(){
        $('#table2excel').DataTable();
    });
    $(document).ready(function(){
        $('#newtable2excel').DataTable();
    });
</script>

<?php
    if(isset($_POST['addFees'])) {
        $feepaid = $_POST['feepaid'];
        $rNo = $_POST['rNo'];
        
        $insertFee = "insert into fee(studentId, classId, batchId, fees, rNo, date) values ('$user_id', '$class','$batch','$feepaid','$rNo',NOW())";
        
        $insert_pro = mysqli_query($con, $insertFee);
        
        if($insert_pro) {
            echo "<script>alert('You have added fees')</script>";
            echo "<script>window.open('fee.php')</script>";
        }
    }
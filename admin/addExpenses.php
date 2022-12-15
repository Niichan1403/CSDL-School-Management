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
                    <h3 class="text-center text-white bg-primary">Thêm chi phí</h3><hr>
                

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Chi tiết</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Nhập chi tiết" name="particular"
                                />
                            </div> 
                        </div>  
                        
                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Số tiền </label>
                            <div class="col-sm-10">
                                <input type="text" placeholder="Nhâp số tiền" class="form-control"  name="amt" />
                            </div> 
                        </div> 
                        
                        <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-danger">Ngày </label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control"  name="date" />
                            </div> 
                        </div> 
                        

                        <div class="form-group row">
                                
                            <div class="offset-sm-2 col-sm-10">
                                <button class="btn btn-outline-primary btn-block" name="submit" type="submit">Thêm chi phí</button> 
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
        $particular=$_POST['particular'];
        $date = $_POST['date'];
        $amt = $_POST['amt'];

       
        $insert_expense = "INSERT INTO expenses (particular,date, amt) VALUES ('$particular','$date', '$amt')";
        
        $insert_pro = mysqli_query($con,$insert_expense);

        if($insert_pro) {
            echo "<script>alert('Welcome , You have Added a new Expenses !')</script>";
            echo "<script>window.open('expenses.php','_self')</script>";
        }
    }
?>
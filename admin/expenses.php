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

    $del_query ="DELETE FROM expenses WHERE id = '$del_id'";
    $del_run = mysqli_query($con,$del_query);
    if($del_run) {
        echo "<script> alert('You have Deleted Successfully')</script>";
        echo "<script> window.open('expenses.php', '_self')</script>";
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
                    <h2 class="text-center text-white bg-primary">Chi tiết chi phí</h2>
                    <div align = "right">
                        <a href="addExpenses.php" class="btn btn-outline-primary">Thêm chi phí </a><hr>
                    </div>
                    <table class="table table-border" id="table2excel">
                        <thead class="thead-dark">
                            <tr> 
                                <th>STT</th> 
                                <th>Chi tiết</th> 
                                <th>Ngày</th> 
                                <th>Số tiền</th>
                                <th><i class="fa fa-trash-o"></i></th>
                            </tr> 
                        </thead>
                        <tbody>
                            <?php
                                $expenses = "SELECT * FROM expenses ORDER BY id DESC";
                                $runexpenses = mysqli_query($con,$expenses);
                                $i=0;
                                while($rowexpenses = mysqli_fetch_array($runexpenses)){
                                    $id = $rowexpenses['id'];
                                    $particular = $rowexpenses['particular'];
                                    $amt = $rowexpenses['amt'];
                                    $date = $rowexpenses['date'];
                                    $i++
                                    
                            
                            ?>
                            <tr> 
                                <td><?php echo  $i;?></td>
                                <td><?php echo  $particular;?></td>
                                <td><?php echo  $date;?></td>
                                <td><?php echo  $amt;?></td>
                                <td><a href="expenses.php?del=<?php echo $id;?>" class="btn btn-danger">
                                <i class="fa fa-trash-o"></i></a>
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
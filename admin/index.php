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
                    <h3 class="text-center text-white bg-primary">Statics Overview of Apex Academy</h3>
                </div>

                <div class="col-md-3">
                    <div class="card text-primary border-primary">
                        <div class="card-header bg-primary text-white">Students</div>
                        <div class="card-body">
                            <table class="table table-bordered table-condensed">
                                <tbody>
                                    <tr>
                                        <th class="bg-dark text-white">Class 1</th>
                                        <th>51</th>
                                    </tr>
                                    <tr>
                                        <th class="bg-dark text-white">Class 2</th>
                                        <th>52</th>
                                    </tr>
                                    <tr>
                                        <th class="bg-dark text-white">Class 3</th>
                                        <th>53</th>
                                    </tr>
                                    <tr>
                                        <th class="bg-dark text-white">Class 4</th>
                                        <th>54</th>
                                    </tr>
                                    <tr>
                                        <th class="bg-dark text-white">Class 5</th>
                                        <th>55</th>
                                    </tr>
                                    <tr>
                                        <th class="bg-dark text-white">Class 6</th>
                                        <th>55</th>
                                    </tr>
                                    <tr>
                                        <th class="bg-dark text-white">Class 7</th>
                                        <th>55</th>
                                    </tr>
                                    <tr>
                                        <th class="bg-dark text-white">Class 8</th>
                                        <th>55</th>
                                    </tr>
                                    <tr>
                                        <th class="bg-dark text-white">Class 9</th>
                                        <th>55</th>
                                    </tr>
                                    <tr>
                                        <th class="bg-dark text-white">Class 10</th>
                                        <th>55</th>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-primary border-warning">
                        <div class="card-header bg-warning text-white">Total Fee Collected</div>
                        <div class="card-body">
                            <table class="table table-bordered table-condensed">
                                <tbody>
                                    <tr>
                                        <th class="bg-dark text-white">Total Fee</th>
                                        <th>5000$</th>
                                    </tr>
                                    <tr>
                                        <th class="bg-dark text-white">Collected Fee</th>
                                        <th>4000$</th>
                                    </tr>
                                    <tr>
                                        <th class="bg-danger text-white">Remaining Fee</th>
                                        <th>1000$</th>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card text-primary border-warning">
                        <div class="card-header bg-warning text-white">Balance Cash</div>
                        <div class="card-body">
                            <table class="table table-bordered table-condensed">
                                <tbody>
                                    <tr>
                                        <th class="bg-dark text-white">Collected Fee</th>
                                        <th>4000$</th>
                                    </tr>
                                    <tr>
                                        <th class="bg-dark text-white">Expenses</th>
                                        <th>2000$</th>
                                    </tr>
                                    <tr>
                                        <th class="bg-danger text-white">Remaining Balance</th>
                                        <th>2000$</th>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="col-md-5">
                    <div class="card text-primary border-danger">
                        <div class="card-header bg-danger text-white">Expenses <small>(Last 10 Expenses)</small></div>
                        <div class="card-body">
                            <table class="table table-bordered table-condensed">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Particular</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>1</th>
                                        <th>30/11/2022</th>
                                        <th>1000$</th>
                                        <th>Bill</th>
                                    </tr>
                                    <tr>
                                        <th>1</th>
                                        <th>30/11/2022</th>
                                        <th>1000$</th>
                                        <th>Bill</th>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
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
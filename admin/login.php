<?php
ob_start();
session_start();
require_once('inc/db.php');
if (isset($_POST['submit'])){
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $password = mysqli_real_escape_string($con, $_POST['password']);

  $get_user = "SELECT * FROM user WHERE user_name = '$username' AND user_pass = '$password'";
  $run_user = mysqli_query($con, $get_user);

  $check = mysqli_num_rows($run_user);
  if ($check = 1) {
    $_SESSION['user_name'] = $username;
    echo "<script>window.open('index.php', '_self')</script>";
  } else {
    echo "<script>alert('Username or Password is Incorrect')</script>";
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="images/mylogo.png" rel="icon" type="image/png" />

    <title>Hello, world!</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Raleway:300,400">
    <style>
      body {
        font-family: 'Raleway', sans-serif;
      }
    </style>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" 
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  </head>

  <body>
      <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form method="post" action="">
                    <h2 class="text-danger">Đăng nhập (Admin)</h2>
                    <label for="" class="text-danger">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="USERNAME" required><br>

                    <label for="" class="text-danger">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="PASSWORD" required><br>

                    <button class="btn btn-danger btn-block"  type="submit" name="submit">Đăng nhập</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>   
      </div>
  </body>

  </html>
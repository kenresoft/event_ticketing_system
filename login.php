<?php
include 'dbcon.php';
session_start();
error_reporting(0);

//log out if ?logout=true
if ($_GET["logout"]) {
    $_SESSION["loggedIn"] = false;
    session_destroy();
    header('Location: ' . $_SERVER['SCRIPT_NAME']);
    exit();
}
if ($_GET["status"]) {
    $status = $_GET["status"];
    if ($status == "success") {
        $notice = "User Acccount Created Successfully! <br>";
    }
    if ($status == "failed") {
        $notice = "User Account Not Found! <br>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $sitename; ?> - Login</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/materialdesignicons.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.i.css">
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <div class="m-container">
              <img src="images/header-bg.jpg" alt="login" class="m-img">

              <div class="m-centered blink"><b style="font-size: xx-large;"><?php echo $notice; ?></b></div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="images/logo1.png" alt="logo" class="logo">

              </div>
              <p class="login-card-description">Sign into your account</p>
              <form action="admin/login.php" method="post">
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                  </div>
                  <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Login">
                </form>
                <a href="#!" class="forgot-password-link">Forgot password?</a>
                <p class="login-card-footer-text">Don't have an account? <a href="register.php" class="text-reset">Register here</a></p>
                <nav class="login-card-footer-nav">
                  <a href="#!">Terms of use.</a>
                  <a href="#!">Privacy policy</a>
                </nav>
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>

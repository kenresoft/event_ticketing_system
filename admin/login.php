<?php
include 'dbcon.php';

session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$safe_pass = md5($password);
$salt = "a1Bz20ydqelm8m1wql";
$final_pass = $salt . $safe_pass;

/*a1Bz20ydqelm8m1wql 21232f297a57a5a743894a0e4a801fc3*/

/* admin */
$query = $conn->query("SELECT * FROM users, user_access WHERE user_access.access_id=users.access_id AND email='$email' AND password='$final_pass'");

$row = $query->fetch();
$num_row = $query->rowcount();
if ($num_row > 0) {

    $_SESSION['useraccess'] = $row['email'];
    $_SESSION['access'] = $row['access_type'];

    if ($row['access_type'] == 'Administrator') {?>

            <script>window.location = 'home.php';</script>

           <?php } else {?>

           <script>window.location = '../index.php';</script>

    <?php }} else {?>

           <script>
           //window.alert("User not found...")
           window.location = '../login.php?status=failed';
           </script>

    <?php }?>


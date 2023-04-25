<?php
include 'session.php';

if (isset($_SESSION['useraccess'])) {?>
  <script>window.location = 'home.php';</script>
<?php } else {?>
  <script>window.location = '../login.php';</script>
<?php }

?>
<?php
include 'dbcon.php';
session_start();
error_reporting(0);

if (isset($_POST['survey_submit'])) {
    $question1 = $_POST['question1'];
    $question2 = $_POST['question2'];
    $question3 = $_POST['question3'];
    $question4 = $_POST['question4'];
    $question5 = $_POST['question5'];
    $question6 = $_POST['question6'];
    $question7 = $_POST['question7']; 
    $question8 = $_POST['question8'];
    $question9 = $_POST['question9'];
    $question10 = $_POST['question10'];
    $event_id = $_GET['event_id'];
    $useraccess = $_SESSION['useraccess'];
    $user_query = $conn->query("SELECT * FROM `users` WHERE `email`='$useraccess'") or die(mysql_error());
    $user_row = $user_query->fetch();
    $user_id = $user_row['user_id'];

    $sql = "INSERT INTO `surveys`(`user_id`, `event_id`, `question1`, `question2`, `question3`, `question4`, `question5`, `question6`, `question7`, `question8`, `question9`, `question10`) 
    VALUES ('$user_id','$event_id','$question1','$question2','$question3','$question4','$question5','$question6','$question7','$question8','$question9','$question10')";

    $query = $conn->query($sql);
    $id = $conn->lastInsertId();
    
    if($query){?>
        <script>
        window.alert('Event Survey successfully submitted.');
        window.location='index.php';
        </script>

    <?php 
    } else {?>
        <script>
        window.alert('Event Survey successfully submitted.');
        </script>
    <?php
     } 
}?>

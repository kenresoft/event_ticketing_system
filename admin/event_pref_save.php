<?php include 'session.php';?>

<?php

if (isset($_POST['add_event_pref'])) {
    $event_title = $_POST['event_title'];
    $event_date = $_POST['event_date'];
    $event_time = $_POST['event_time'];
    $event_venue = $_POST['event_venue'];
    $event_description = $_POST['event_description'];
    $event_category = $_POST['event_category'];
    $event_organizer = $_POST['event_organizer'];
    $event_organizer_description = $_POST['event_organizer_description'];
    $event_organizer_email = $_SESSION['useraccess'];

    $imgfile = $_FILES["event_flier"]["name"];
    $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile)); // get the image extension
    $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif"); // allowed extensions

    if ($event_category == '--Select Event Category--') {
        echo "<script>alert('Please select an Event category!'); window.location='event_list.php';</script>";
        return;
    }
    if (!in_array($extension, $allowed_extensions)) {
        echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed'); window.location='event_list.php';</script>";
        return;
    }
    $event_flier = md5($imgfile) . $extension; //rename the image file
    move_uploaded_file($_FILES["event_flier"]["tmp_name"], "../event-fliers/" . $event_flier); // Code for move image into directory

    $sql = "INSERT INTO events(event_title, event_date, event_time, event_venue, event_description, event_category, event_flier)
    VALUES ('$event_title', '$event_date', '$event_time', '$event_venue', '$event_description', '$event_category', '$event_flier')";
    // use exec() because no results are returned
    $conn->exec($sql);
    $id = $conn->lastInsertId();

    $user_query = $conn->query("SELECT * FROM `users` WHERE email = '$event_organizer_email'") or die(mysql_error());
    $user_row = $user_query->fetch();
    $user_id = $user_row['user_id'];
    if ($id > 0) {
        $conn->query("INSERT INTO `organizers`(`user_id`, `organizer_name`, `organizer_description`, `event_id`) VALUES ('$user_id','$event_organizer','$event_organizer_description','$id')");
    } else {
        $conn->query("INSERT INTO `organizers`(`user_id`, `organizer_name`, `organizer_description`, `event_id`) VALUES ('$user_id','$event_organizer','$event_organizer_description','$id')");
    }

    ?>

<script>
window.alert('Event <?php echo $event_title . ' (' . $event_date . ' | ' . $event_venue . ') '; ?> successfully added.');
window.location='event_list.php';
</script>

<?php }?>


<?php

if (isset($_POST['updateEventModal'])) {
    $event_title = $_POST['event_title'];
    $event_date = $_POST['event_date'];
    $event_time = $_POST['event_time'];
    $event_venue = $_POST['event_venue'];
    $event_description = $_POST['event_description'];
    $event_category = $_POST['event_category'];

    if (!file_exists($_FILES['event_flier']['tmp_name']) || !is_uploaded_file($_FILES['event_flier']['tmp_name'])) {
        $event_id = $_POST['event_id'];
        $conn->query("UPDATE events SET event_title='$event_title', event_date='$event_date', event_time='$event_time', event_venue='$event_venue', event_description='$event_description', event_category='$event_category' WHERE event_id='$event_id'");
    } else {
        $imgfile = $_FILES["event_flier"]["name"];
        $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile)); // get the image extension
        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif"); // allowed extensions

        if (!in_array($extension, $allowed_extensions)) {
            echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        } else {
            $event_flier = md5($imgfile) . $extension; //rename the image file
            move_uploaded_file($_FILES["event_flier"]["tmp_name"], "../event-fliers/" . $event_flier); // Code for move image into directory

            $event_id = $_POST['event_id'];
            $conn->query("UPDATE events SET event_title='$event_title', event_date='$event_date', event_time='$event_time', event_venue='$event_venue', event_description='$event_description', event_category='$event_category', event_flier='$event_flier' WHERE event_id='$event_id'");
        }
    }
    ?>

<script>
window.alert('Event <?php echo $event_title . ' (' . $event_date . ' | ' . $event_venue . ') '; ?> successfully updated.');
window.location='event_list.php';
</script>

<?php }?>



<?php

if (isset($_POST['delete_event_pref'])) {
    $event_id = $_POST['event_id'];

    $conn->query("DELETE FROM `events` WHERE `event_id`='$event_id'");
    $conn->query("ALTER TABLE `events` AUTO_INCREMENT = 1");
    $conn->query("ALTER TABLE `organizers` AUTO_INCREMENT = 1");
    $conn->query("ALTER TABLE `seats` AUTO_INCREMENT = 1");
    $conn->query("ALTER TABLE `surveys` AUTO_INCREMENT = 1");
    $conn->query("ALTER TABLE `updates` AUTO_INCREMENT = 1");
    ?>

<script>
window.alert('Event successfully deleted...');
window.location='event_list.php';
</script>

<?php }?>
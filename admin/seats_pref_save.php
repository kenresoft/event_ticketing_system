<?php include 'session.php';?>

<?php

if (isset($_POST['add_seat_pref'])) {
    $event_id = $_POST['event_id'];
    $seat_prefix = $_POST['seat_prefix'];
    $seat_description = $_POST['seat_description'];
    $seat_maximum = $_POST['seat_maximum'];
    $seat_price = $_POST['seat_price'];

    $sql = "INSERT INTO `seats`(`event_id`, `seat_prefix`, `seat_maximum`, `seat_description`, `seat_price`, `seat_counter`) VALUES ('$event_id', '$seat_prefix', '$seat_maximum', '$seat_description', '$seat_price', '0')";
    $conn->exec($sql);
    //$conn->query("UPDATE `events` SET `event_price`='$seat_price' WHERE `event_id`='$event_id'");

    ?>

<script>
window.alert('Seat details <?php echo $seat_prefix . ' (' . $seat_description . ' | Max Seat: ' . $seat_maximum . ')'; ?> successfully added.');
window.location='seats_list.php';
</script>

<?php }?>


<?php

if (isset($_POST['updateSeatModal'])) {
    $prefSeat_id = $_POST['prefSeat_id'];
    $event_id = $_POST['event_id'];
    $seat_prefix = $_POST['seat_prefix'];
    $seat_description = $_POST['seat_description'];
    $seat_maximum = $_POST['seat_maximum'];
    $seat_price = $_POST['seat_price'];

    $conn->query("UPDATE `seats` SET `event_id`='$event_id', `seat_prefix`='$seat_prefix', `seat_maximum`='$seat_maximum', `seat_description`='$seat_description', `seat_price`='$seat_price' WHERE `seat_id`='$prefSeat_id'");
    //$conn->query("UPDATE `events` SET `event_price`='$seat_price' WHERE `event_id`='$event_id'");
    ?>

<script>
window.alert('Seat details <?php echo $seat_prefix . ' (' . $seat_description . ' | Max Seat: ' . $seat_maximum . ')'; ?> successfully updated.');
window.location='seats_list.php';
</script>

<?php }?>



<?php

if (isset($_POST['delete_seat_pref'])) {
    $prefSeat_id = $_POST['seat_id'];

    $conn->query("DELETE FROM `seats` WHERE `seat_id`='$prefSeat_id'");
    $conn->query("ALTER TABLE `seats` AUTO_INCREMENT = 1");
    $conn->query("ALTER TABLE `surveys` AUTO_INCREMENT = 1");
    $conn->query("ALTER TABLE `tickets` AUTO_INCREMENT = 1");
    ?>

<script>
window.alert('Seat details successfully deleted...');
window.location='seats_list.php';
</script>

<?php }?>
<?php 
include 'dbcon.php';
session_start();
error_reporting(0);

//set it to writable location, a place for temp generated PNG files
$PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR;

//html PNG location prefix
$PNG_WEB_DIR = 'temp/';

include "qr-plugin/qrlib.php";

//ofcourse we need rights to create temp dir
if (!file_exists($PNG_TEMP_DIR)) {
    mkdir($PNG_TEMP_DIR);
}

//$filename = $PNG_TEMP_DIR.'test.png';

//processing form input
//remember to sanitize user input in real-life solution !!!
$errorCorrectionLevel = 'H';
if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L', 'M', 'Q', 'H'))) {
    $errorCorrectionLevel = $_REQUEST['level'];
}

$matrixPointSize = 4;
if (isset($_REQUEST['size'])) {
    $matrixPointSize = min(max((int) $_REQUEST['size'], 1), 10);
}

if (isset($_REQUEST['data'])) {?>

<?php } else {
    $filename = "";

//default data
//echo 'You can provide data in GET parameter: <a href="?data=like_that">like that</a><hr/>';
//QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);

}

//it's very important!
if (trim($_REQUEST['data']) == '') {
    die('data cannot be empty! <a href="?">back</a>');
}

$filename = $PNG_TEMP_DIR . $_GET['seat_num'] . '_' . md5($_REQUEST['data'] . '|' . $errorCorrectionLevel . '|' . $matrixPointSize) . '.png';

$qr_image = $PNG_WEB_DIR . basename($filename);
$qr_code = $_POST['data'];
$event_id = $_GET['event_id'];
$seat_id = $_GET['seat_id'];
$ticket_date = date('Y-m-d');
$ticket_time = date('h:i:s A');

$useraccess = $_SESSION['useraccess'];
$user_query = $conn->query("SELECT * FROM `users` WHERE `email`='$useraccess'") or die(mysql_error());
$user_row = $user_query->fetch();
$user_id = $user_row['user_id'];

$soldTickCHK_query = $conn->query("SELECT `qr_code` FROM `tickets` WHERE `qr_code`='$qr_code'") or die(mysql_error());
if ($soldTickCHK_query->rowCount() > 0) {?>

    <script>
    window.alert('Seat <?php echo $qr_code; ?> already taken... Please re-transact client <?php echo $clientLName . ', ' . $clientFName; ?>');
    window.location='event.php?id=<?php echo $event_id ?>';
    </script>

    <?php
    echo "Sorry, This Ticket Has Already Been Taken... Please Try Again!";
    } else {

    $conn->query("INSERT INTO `tickets` (`qr_image`, `qr_code`, `user_id`, `event_id`, `seat_id`, `ticket_date`, `ticket_time`) VALUES ('$qr_image', '$qr_code', '$user_id', '$event_id', '$seat_id', '$ticket_date', '$ticket_time')");
    $ticket_id = $conn->lastInsertId();
    //UPDATE SEAT NUMBER
    $seat_number = $_GET['seat_counter'] + 1;
    $conn->query("UPDATE `seats` SET `seat_counter`='$seat_number' WHERE `seat_id`='$seat_id'");

    //FECT ALL DATA
    $ticket_query = $conn->query("SELECT * FROM `tickets`, `events`, `users`, `seats`, `organizers` WHERE tickets.event_id=events.event_id AND tickets.user_id=users.user_id AND tickets.seat_id=seats.seat_id AND organizers.event_id=events.event_id AND `tickets`.`ticket_id`=$ticket_id AND users.user_id=$user_id");
    $ticket_row = $ticket_query->fetch();

    $data = '
        TICKET DETAILS
    ----------------------
    Event: ' . $ticket_row['event_title'] . '
    Organizer: ' . $ticket_row['organizer_name'] . '
    Seat No: ' . $seat_number . '
    ----------------------
    First Name: ' . $ticket_row['firstname'] . '
    Last Name: ' . $ticket_row['lastname'] . '
    Email: ' . $ticket_row['email'] . '
    Phone: ' . $ticket_row['phone'] . '
    ----------------------
    Date: ' . $ticket_date . '
    Time: ' . $ticket_time . '
    Ticket Code: ' . $qr_code . '/T-' . $ticket_row['ticket_id'] . '/E-' . $ticket_row['event_id'] . '/U-' . $ticket_row['user_id'] . '
    ----------------------
    ';
    QRcode::png($data/* $_REQUEST['data'] */, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
    ?>

<script>

window.open('print_ticket.php?seat_num=<?php echo $_GET['seat_num']; ?>&seat_id=<?php echo $_GET['seat_id']; ?>&event_id=<?php echo $_GET['event_id']; ?>&qr_code=<?php echo $qr_code; ?>', '_blank');
window.location='event.php?id=<?php echo $event_id ?>';

</script>

<?php }?>
<!DOCTYPE html>
<html lang="en">

<?php
include 'dbcon.php';
session_start();
error_reporting(0);

$event_id = $_GET['id'];
if(isset($_GET['id'])){
    $event_query = $conn->query("SELECT * FROM events, categories, organizers, seats WHERE events.event_category=categories.category_id AND organizers.event_id=events.event_id AND events.event_id=$event_id");
    $event_row = $event_query->fetch();
}
?>

<head>
    <title><?php echo $sitename . ' - ' . $event_row["event_title"]; ?></title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="single-event-page">
<header class="site-header">
    <div class="header-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-10 col-lg-2 order-lg-1">
                    <div class="site-branding">
                        <div class="site-title">
                            <a href="."><img src="images/logo1.png" alt="logo"></a>
                        </div><!-- .site-title -->
                    </div><!-- .site-branding -->
                </div><!-- .col -->

                <div class="col-2 col-lg-7 order-3 order-lg-2">
                    <nav class="site-navigation">
                        <div class="hamburger-menu d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div><!-- .hamburger-menu -->

                        <ul>
                            <li><a href=".">Home</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="events.php">Events</a></li>
                            <li><a href="#">News</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="admin/logout.php">Logout</a></li>
                            <?php if(isset($_SESSION['useraccess'])) {?>
                            <small style="color: whitesmoke;">(Signed in as: <span style="color: plum;"><?php echo $_SESSION['useraccess']; ?></span>)</small>
                            <?php } ?>
                        </ul>
                    </nav><!-- .site-navigation -->
                </div><!-- .col -->

                <div class="col-lg-3 d-none d-lg-block order-2 order-lg-3">
                    <div class="buy-tickets">
                        <a class="btn gradient-bg" href="register.php">Create Your Events</a>
                    </div><!-- .buy-tickets -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container-fluid -->
    </div><!-- .header-bar -->

    <div class="page-header single-event-page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="entry-header">
                        <h1 class="entry-title"><?php echo $event_row['event_title']; ?>.</h1>
                    </header>
                </div>
            </div>
        </div>
    </div>
</header><!-- .site-header -->

<div class="container">
    <div class="row">
        <div class="col-12 single-event">
            <div class="event-content-wrap">
                <header class="entry-header flex flex-wrap justify-content-between align-items-end">
                    <div class="single-event-heading">
                        <h2 class="entry-title"><?php echo $event_row['event_title']; ?></h2>

                        <div class="event-location"><a href="#"><?php echo $event_row['event_venue']; ?></a></div>

                    </div>

                    <div class="buy-tickets flex justify-content-center align-items-center">
                        <a class="btn gradient-bg" href="#">Buy Tikets</a>
                    </div>
                </header>

                <figure class="events-thumbnail">
                    <img src="event-fliers/<?php echo $event_row['event_flier']; ?>" alt="" height="450px">
                </figure>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="tabs">
                <ul class="tabs-nav flex">
                    <li class="tab-nav flex justify-content-center align-items-center" data-target="#tab_details"><?php echo $event_row['event_description']; ?></li>
                    <li class="tab-nav flex justify-content-center align-items-center" data-target="#tab_venue"><?php echo $event_row['event_venue']; ?></li>
                    <li class="tab-nav flex justify-content-center align-items-center" data-target="#tab_organizers"><?php echo $event_row['organizer_name']; ?></li>
                </ul>

                <div class="tabs-container">
                    <div id="tab_details" class="tab-content">
                        <div class="flex flex-wrap justify-content-between">
                            <div class="single-event-details">

                                <div class="single-event-details-row">
                                    <label>Date:</label>
                                    <p><?php echo $event_row['event_date']; ?></p>
                                </div>

                                <div class="single-event-details-row">
                                    <label>Time:</label>
                                    <p><?php echo $event_row['event_time']; ?></p>
                                </div>

                                <div class="single-event-details-row">
                                    <label>Price:</label>
                                    <p>$<?php $price_query = $conn->query("SELECT MAX(seat_price) AS price FROM seats WHERE event_id=$event_id") or die(mysql_error());
$price_row = $price_query->fetch();
echo $price_row['price'];?> <span>Sold Out</span></p>
                                </div>

                                <div class="single-event-details-row">
                                    <label>Categories:</label>
                                    <p><?php echo $event_row['category']; ?></p>
                                </div>

                                <div class="single-event-details-row">
                                    <label>Seats:</label>
                                    <p><?php $max_query = $conn->query("SELECT MAX(seat_maximum) AS maximum FROM seats WHERE event_id=$event_id") or die(mysql_error());
$max_row = $max_query->fetch();
echo $max_row['maximum'];?></p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div id="tab_venue" class="tab-content">
                        <div class="single-event-map">
                            <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo $event_row['event_venue']; ?>&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        </div>
                    </div>

                    <div id="tab_organizers" class="tab-content">
                        <p><?php echo $event_row['organizer_description']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="event-tickets">
            <h3 class="purple">TICKET TYPES</h3>
            <?php
$seat_ticket_query = $conn->query("SELECT * FROM seats WHERE event_id=$event_id") or die(mysql_error());
while ($seat_ticket_row = $seat_ticket_query->fetch()) {?>

                <div class="ticket-row flex flex-wrap justify-content-between align-items-center">
                    <div class="ticket-type flex justify-content-between align-items-center">
                        <h3 class="entry-title"><span><?php echo $seat_ticket_row['seat_prefix']; ?></span> <?php echo $seat_ticket_row['seat_description']; ?></h3>

                        <div class="ticket-price">$<?php echo $seat_ticket_row['seat_price']; ?></div>
                    </div>

    <?php
$event_query = $conn->query("SELECT * FROM events WHERE event_id='$seat_ticket_row[event_id]'") or die(mysql_error());
    $event_row = $event_query->fetch();

    $totalRemaining = $seat_ticket_row['seat_maximum'] - $seat_ticket_row['seat_counter'];

//set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR;

//include "qrlib.php";

//ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR)) {
        mkdir($PNG_TEMP_DIR);
    }

    $errorCorrectionLevel = 'H';
    $matrixPointSize = 4;
    ?>

<!-- config form -->
<?php echo '<form class="form-horizontal" action="checkout_ticket_save.php?seat_num=' . (isset($_REQUEST['data']) ? htmlspecialchars($_REQUEST['data']) : $seat_ticket_row['seat_prefix'] . '-' . $seat_ticket_row['seat_counter'] + 1) . '&seat_id=' . $seat_ticket_row['seat_id'] . '&event_id=' . $seat_ticket_row['event_id'] . '&seat_counter=' . $seat_ticket_row['seat_counter'] . '" method="POST">'; ?>

<?php echo '<input style="visibility: hidden;" name="data" value="' . (isset($_REQUEST['data']) ? htmlspecialchars($_REQUEST['data']) : $seat_ticket_row['seat_prefix'] . '-' . $seat_ticket_row['seat_counter'] + 1) . '" class="form-control" readonly="" />

    <select name="level" style="visibility: hidden;"><option value="H"' . (($errorCorrectionLevel == 'H') ? ' selected' : '') . '>H - best</option></select>
<select name="size" style="visibility: hidden;">';

    for ($i = 1; $i <= 10; $i++) {
        echo '<option value="' . $i . '"' . (($matrixPointSize == $i) ? ' selected' : '') . '>' . $i . '</option>';
    }

    echo '</select>'; ?>

                    <div class="flex align-items-center">
                        <input type="submit" class="btn gradient-bg" value="Buy Ticket">
                    </div>

                    <?php echo '</form>'; ?>

                </div>

                    <?php }?>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="upcoming-events">
                <div class="upcoming-events-header">
                    <h4>Upcoming Events</h4>
                </div>

                <div class="upcoming-events-list">

                <?php
$rowCtr = 0;
$event_query = $conn->query("SELECT * FROM events, organizers WHERE organizers.event_id=events.event_id") or die(mysql_error());
while ($event_row = $event_query->fetch()) {

    $rowCtr = $rowCtr + 1;
    $event_id = $event_row['event_id'];

    ?>
                    <div class="upcoming-event-wrap flex flex-wrap justify-content-between align-items-center">
                        <figure class="events-thumbnail">
                        <a href="event.php?id=<?php echo $event_id; ?>"><img src="event-fliers/<?php echo $event_row['event_flier']; ?>" alt="" height="108px"></a>
                        </figure>

                        <div class="entry-meta">
                            <div class="event-date">
                                25<span>February</span>
                            </div>
                        </div>

                        <header class="entry-header">
                            <h3 style="font-size: 28px; line-height: 1.2; font-weight: bold; color: #fff;"><a href="event.php?id=<?php echo $event_id; ?>"><?php echo $event_row['event_title']; ?></a></h3>

                            <div class="event-date-time"><?php echo $event_row['event_date']; ?> @ <?php echo $event_row['event_time']; ?></div>

                            <div class="event-speaker">Organized by: <span style="color: #fff;"><?php echo $event_row['organizer_name']; ?></span></div>
                        </header>

                        <footer class="entry-footer">
                            <a href="event.php?id=<?php echo $event_id; ?>">Buy Tikets</a>
                        </footer>
                    </div>

                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="newsletter-subscribe">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <header class="entry-header">
                    <h2 class="entry-title">Subscribe to our newsletter to get the latest trends & news</h2>
                    <p>Join our database NOW!</p>
                </header>

                <div class="newsletter-form">
                    <form class="flex flex-wrap justify-content-center align-items-center">
                        <div class="col-md-12 col-lg-3">
                            <input type="text" placeholder="Name">
                        </div>

                        <div class="col-md-12 col-lg-6">
                            <input type="email" placeholder="Your e-mail">
                        </div>

                        <div class="col-md-12 col-lg-3">
                            <input class="btn gradient-bg" style="margin-top: 80px;" type="button" value="Subscribe">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php';?>

</body>
</html>
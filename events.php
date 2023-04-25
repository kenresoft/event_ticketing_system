<!DOCTYPE html>
<html lang="en">

<?php
include 'dbcon.php';
session_start();
error_reporting(0);?>
<head>
    <title><?php echo $sitename; ?> - Events</title>

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
<body class="events-list-page">
<?php include 'includes/header.php';?>

<form class="events-search" action="" method="GET">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-3">
                <input type="text" name="event" placeholder="Event">
            </div>

            <div class="col-12 col-md-3">
                <input class="btn gradient-bg" type="submit" placeholder="Search Events">
            </div>
        </div>
    </div>
</form>

<div class="container">
    <div class="row events-list">

    <?php
    $rowCtr = 0;
    $category_id = $_GET['catid'];
    $event = $_GET['event'];

    if(isset($_GET['catid'])){
        $event_query = $conn->query("SELECT * FROM events WHERE events.event_category=$category_id LIMIT 10");
    }
    else if(isset($_GET['event'])){
        $event_query = $conn->query("SELECT * FROM `events` WHERE event_title LIKE '%$event%' LIMIT 10");
    }
    else {
        $event_query = $conn->query("SELECT * FROM events LIMIT 10");
    }

    while ($event_row = $event_query->fetch()) {

        $rowCtr = $rowCtr + 1;
        $event_id = $event_row['event_id'];

    ?>
        <div class="col-12 col-lg-6 single-event">
            <figure class="events-thumbnail">
                <a href="event.php?id=<?php echo $event_id; ?>"><img src="event-fliers/<?php echo $event_row['event_flier']; ?>" alt="" height="250px"></a>
            </figure>

            <div class="event-content-wrap">
                <header class="entry-header flex justify-content-between">
                    <div>
                        <h2 class="entry-title"><a href="event.php?id=<?php echo $event_id; ?>"><?php echo $event_row['event_title']; ?></a></h2>

                        <div class="event-location"><a href="event.php?id=<?php echo $event_id; ?>"><?php echo $event_row['event_venue']; ?></a></div>

                        <div class="event-date"><?php echo $event_row['event_date']; ?> @ <?php echo $event_row['event_time']; ?></div>
                    </div>

                    <div class="event-cost flex justify-content-center align-items-center">
                        from<span>$<?php $price_query = $conn->query("SELECT MAX(seat_price) AS price FROM seats WHERE event_id=$event_id");
    $price_row = $price_query->fetch();
    echo $price_row['price'];?></span>
                    </div>
                </header>

                <footer class="entry-footer">
                    <a href="event.php?id=<?php echo $event_id; ?>">Buy Tikets</a>
                </footer>
            </div>
        </div>

        <?php }?>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="load-more-btn">
                <a class="btn gradient-bg" href="#">Load More</a>
            </div>
        </div>
    </div>
</div>

<div class="upcoming-events-outer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="upcoming-events">
                    <div class="upcoming-events-header">
                        <h4>Upcoming Events</h4>
                    </div>

                        <div class="upcoming-events-list">

                    <?php
                    $rowCtr = 0;
                    $event_query = $conn->query("SELECT * FROM events, organizers WHERE organizers.event_id=events.event_id LIMIT 10") or die(mysql_error());
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
                                <a href="#">Buy Tikets</a>
                            </footer>
                        </div>

                        <?php }?>
                    </div>

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
                            <input class="btn gradient-bg" type="submit" value="Subscribe">
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

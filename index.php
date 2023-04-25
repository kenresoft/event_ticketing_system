<!DOCTYPE html>
<html lang="en">

<?php
include 'dbcon.php';
session_start();
error_reporting(0);?>
<head>
    <title><?php echo $sitename; ?> - Home</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php include 'includes/header.php';?>

<div class="homepage-info-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-5">
                <figure>
                    <img src="images/logo1.png" alt="logo">
                </figure>
            </div>

            <div class="col-12 col-md-8 col-lg-7">
                <header class="entry-header">
                    <h2 class="entry-title">Welcome On Board. Ready to Boost and Market you Events?</h2>
                </header>

                <div class="entry-content">
                    <p>Your Reliable Event System. <br/><br/>
                        Push, advertise and customise all your events for effective and optimal ticket sale and audience growth. Grow constructive engagements and contributions on your events. <br/><br/>
                        Secured, Customized, and Simple..</p>
                </div>

                <footer class="entry-footer">
                    <a href="#" class="btn gradient-bg">Read More</a>
                    <a href="register.php" class="btn dark" id="register">Register Now</a>

                </footer>
            </div>
        </div>
    </div>
</div>

<?php
$sql = "SELECT * FROM events, categories WHERE events.event_category=categories.category_id;";
?>

<div class="homepage-featured-events">
    <div class="container">
        <div class="row">
        <h2 style="color: plum;">CATEGORIES</h2>
            <div class="col-12">
                <div class="featured-events-wrap flex flex-wrap justify-content-between">

                <?php $category_query = $conn->query("SELECT * FROM `categories` LIMIT 11;");
                    while ($category_row = $category_query->fetch()) {?>
                    <div class="event-content-wrap positioning-event-<?php echo $category_row["category_id"];?>">
                        <figure>
                            <a href="event.php?catid=<?php echo $category_row["category_id"]; ?>"><img src="images/smoke.jpg" alt="1"></a>
                        </figure>

                        <header class="entry-header">
                            <h3 class="entry-title"><a href="events.php?catid=<?php echo $category_row["category_id"]; ?>"><b style="color: wheat;"><?php echo $category_row["category"]; ?></b></a></h3>

                            <div class="posted-date">----------</div>
                        </header>
                    </div>

                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="homepage-next-events">
    <div class="container">
        <div class="row">
            <div class="next-events-section-header">
                <h2 class="entry-title" style="color: palegoldenrod;">Recent events</h2>
                <p>Your Reliable Event System. <br/><br/>
                        Push, advertise and customise all your events for effective and optimal ticket sale and audience growth. Grow constructive engagements and contributions on your events. <br/><br/>
                        Secured, Customized, and Simple..</p>
            </div>
        </div>

        <div class="row">
        <?php
        $rowCtr = 0;
        $event_query = $conn->query("SELECT * FROM events LIMIT 10");
        while ($event_row = $event_query->fetch()) {
            $rowCtr = $rowCtr + 1;
            $event_id = $event_row['event_id'];
        ?>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="next-event-wrap">
                    <figure>
                    <a href="event.php?id=<?php echo $event_id; ?>"><img src="event-fliers/<?php echo $event_row['event_flier']; ?>" alt="" height="250px"></a>

                        <div class="event-rating">8.9</div>
                    </figure>

                    <header class="entry-header">
                        <h3 class="entry-title"><a href="event.php?id=<?php echo $event_id; ?>"><?php echo $event_row['event_title']; ?></a></h3>

                        <div class="posted-date"><?php echo $event_row['event_date']; ?> --- <span><?php echo $event_row['event_time']; ?></span>
                    </header>

                    <div class="entry-content">
                        <p><?php echo $event_row['event_description']; ?>.</p>
                    </div>

                    <footer class="entry-footer">
                    <a href="event.php?id=<?php echo $event_id; ?>">Buy Tikets</a>
                    </footer>
                    <br />
                </div>
            </div>
            
            <?php } ?>

        </div>
    </div>
</div>

<div class="homepage-regional-events">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <header class="regional-events-heading entry-header flex flex-wrap justify-content-between align-items-center">
                    <h2 class="entry-title">Featured Event Tickets (Events Seats)</h2>

                    <!-- <div class="select-location">
                        <select>
                            <option>New York</option>
                            <option>California</option>
                            <option>South Carolina</option>
                        </select>
                    </div> -->
                </header>

                <div class="swiper-container homepage-regional-events-slider">
                    <div class="swiper-wrapper">
                    <?php
                    $rowCtr = 0;
                    $seat_query = $conn->query("SELECT * FROM seats, events WHERE seats.event_id=events.event_id");
                    while ($seat_row = $seat_query->fetch()) {
                        $rowCtr = $rowCtr + 1;
                        $prefSeat_id = $seat_row['seat_id'];
                    ?>

                        <div class="swiper-slide">
                            <figure>
                            <img src="event-fliers/<?php echo $seat_row['event_flier']; ?>" alt="<?php echo $seat_row['event_title']; ?>" class="img-thumbnail" style="width:260px; height: 230px;">

                                <a class="event-overlay-link flex justify-content-center align-items-center" href="event.php?id=<?php echo $seat_row['event_id']; ?>"><?php echo $seat_row['seat_description'] . '<br /> ( ' . $seat_row['seat_prefix'] . ' ) '; ?></a>
                            </figure><!-- .hero-image -->

                            <div class="entry-header">
                                <h2 class="entry-title"><?php echo $seat_row['event_title'] . ' <br /> ( ' . $seat_row['event_date'] . ' ) <br /> <small>' . $seat_row['event_venue'] . '</small>'; ?></h2>
                            </div><!--- .entry-header -->

                            <div class="entry-footer">
                                <div class="posted-date"><?php echo $seat_row['seat_maximum'] . ' Seats Maximum ' . '<br />$'. $seat_row['seat_price'] . ' Each '; ?></div>
                            </div><!-- .entry-footer" -->
                        </div><!-- .swiper-slide -->

                        <?php } ?>

                    </div><!-- .swiper-wrapper -->

                    <!-- Add Arrows -->
                    <div class="swiper-button-next flex justify-content-center align-items-center">
                        <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1171 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"/></svg></span>
                    </div>

                    <div class="swiper-button-prev flex justify-content-center align-items-center">
                        <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1203 544q0 13-10 23l-393 393 393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10l-466-466q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23z"/></svg></span>
                    </div>
                </div><!-- .swiper-container -->

                <div class="events-partners">
                    <header class="entry-header">
                        <h2 class="entry-title">Partners</h2>
                    </header>

                    <div class="events-partners-logos flex flex-wrap justify-content-between align-items-center">
                        <div class="event-partner-logo">
                            <a href="#"><img src="images/pixar.png" alt=""></a>
                        </div>

                        <div class="event-partner-logo">
                            <a href="#"><img src="images/the-pirate.png" alt=""></a>
                        </div>

                        <div class="event-partner-logo">
                            <a href="#"><img src="images/himalayas.png" alt=""></a>
                        </div>

                        <div class="event-partner-logo">
                            <a href="#"><img src="images/sa.png" alt=""></a>
                        </div>

                        <div class="event-partner-logo">
                            <a href="#"><img src="images/south-porth.png" alt=""></a>
                        </div>

                        <div class="event-partner-logo">
                            <a href="#"><img src="images/himalayas.png" alt=""></a>
                        </div>

                        <div class="event-partner-logo">
                            <a href="#"><img src="images/sa.png" alt=""></a>
                        </div>

                        <div class="event-partner-logo">
                            <a href="#"><img src="images/south-porth.png" alt=""></a>
                        </div>

                        <div class="event-partner-logo">
                            <a href="#"><img src="images/pixar.png" alt=""></a>
                        </div>

                        <div class="event-partner-logo">
                            <a href="#"><img src="images/the-pirate.png" alt=""></a>
                        </div>
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
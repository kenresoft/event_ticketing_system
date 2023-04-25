
<header class="site-header">
    <div class="header-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-10 col-lg-2 order-lg-1">
                    <div class="site-branding">
                        <div class="site-title">
                            <a href="#"><img src="images/logo1.png" alt="logo"></a>
                        </div><!-- .site-title -->
                    </div><!-- .site-branding -->
                </div><!-- .col -->

                <div class="col-2 col-lg-7 order-3 order-lg-2">
                    <nav class="site-navigation">
                        <div class="hamburger-menu d-lg-none">
                            
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
                        <a class="btn gradient-bg" href="login.php">Create Your Events</a>
                    </div><!-- .buy-tickets -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container-fluid -->
    </div><!-- .header-bar -->

    <div class="swiper-container hero-slider">
        <div class="swiper-wrapper">

<?php
$rowCtr = 0;
$event_query = $conn->query("select * FROM events") or die(mysql_error());
while ($event_row = $event_query->fetch()) {
/* date("Y/m/d", strtotime($event_row['event_date'])) */
    $rowCtr = $rowCtr + 1;
    $event_id = $event_row['event_id'];

    if ($rowCtr == 1) {
        $state = "active";
    } else {
        $state = "";
    }

    ?>
            <div class="swiper-slide" data-date="<?php echo $event_row['event_date']; ?>" style="background: url('event-fliers/<?php echo $event_row['event_flier']; ?>'); background-repeat: no-repeat; background-size: cover;">
                <div class="hero-content">
                    <div class="container">
                        <div class="row">
                            <div class="col flex flex-column justify-content-center">
                                <div class="entry-header">

                                    <h2 class="entry-title">1 <?php echo $event_row['event_title']; ?> <p></p> </h2>
                                    <div class="countdown flex align-items-center">
                                        <div class="countdown-holder flex align-items-baseline">
                                            <span class="dday"></span>
                                            <label>Days</label>
                                        </div><!-- .countdown-holder -->

                                        <div class="countdown-holder flex align-items-baseline">
                                            <span class="dhour"></span>
                                            <label>Hours</label>
                                        </div><!-- .countdown-holder -->

                                        <div class="countdown-holder flex align-items-baseline">
                                            <span class="dmin"></span>
                                            <label>Minutes</label>
                                        </div><!-- .countdown-holder -->

                                        <div class="countdown-holder flex align-items-baseline">
                                            <span class="dsec"></span>
                                            <label>Seconds</label>
                                        </div><!-- .countdown-holder -->
                                    </div><!-- .countdown -->
                                </div><!--- .entry-header -->

                                <div class="entry-footer">
                                    <a class="btn gradient-bg" href="event.php?id=<?php echo $event_id; ?>"> - Buy Ticket - </a>
                                </div><!-- .entry-footer" -->
                            </div><!-- .col -->
                        </div><!-- .container -->
                    </div><!-- .hero-content -->
                </div><!-- .swiper-slide -->
            </div><!-- .swiper-wrapper -->

            <?php }?>

        </div>

        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>

        <!-- Add Arrows -->
        <div class="swiper-button-next flex justify-content-center align-items-center">
            <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1171 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"/></svg></span>
        </div>

        <div class="swiper-button-prev flex justify-content-center align-items-center">
            <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1203 544q0 13-10 23l-393 393 393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10l-466-466q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23z"/></svg></span>
        </div>
    </div><!-- .swiper-container -->
</header><!-- .site-header -->
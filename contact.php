<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $sitename; ?> - Contact</title>

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
<body class="contact-page">
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

    <div class="page-header contact-page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="entry-header">
                        <h1 class="entry-title">Contact.</h1>
                    </header>
                </div>
            </div>
        </div>
    </div>
</header><!-- .site-header -->

<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="contact-location-details">
                <h2 class="entry-title">New York</h2>

                <div class="entry-content">
                    <p>Vestibulum eget lacus at mauris sagittis varius. Etiam ut venenatis dui. Nullam tellus risus, pellentesque at facilisis et.</p>
                </div>

                <footer class="entry-footer">
                    <ul>
                        <li class="contact-address">667889 Madison Avenue, no24-56</li>
                        <li class="contact-number">665 5667 8899 661</li>
                        <li class="contact-email"><a href="#">office@yourbusiness.com</a></li>
                    </ul>
                </footer>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <div class="contact-location-details">
                <h2 class="entry-title">Miami</h2>

                <div class="entry-content">
                    <p>Vestibulum eget lacus at mauris sagittis varius. Etiam ut venenatis dui. Nullam tellus risus, pellentesque at facilisis et.</p>
                </div>

                <footer class="entry-footer">
                    <ul>
                        <li class="contact-address">122344 Island Str, no23</li>
                        <li class="contact-number">665 5667 8899 661</li>
                        <li class="contact-email"><a href="#">office@yourbusiness.com</a></li>
                    </ul>
                </footer>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <div class="contact-location-details">
                <h2 class="entry-title">Los Angeles</h2>

                <div class="entry-content">
                    <p>Vestibulum eget lacus at mauris sagittis varius. Etiam ut venenatis dui. Nullam tellus risus, pellentesque at facilisis et.</p>
                </div>

                <footer class="entry-footer">
                    <ul>
                        <li class="contact-address">667889 Long Avenue, no24-56</li>
                        <li class="contact-number">665 5667 8899 661</li>
                        <li class="contact-email"><a href="#">office@yourbusiness.com</a></li>
                    </ul>
                </footer>
            </div>
        </div>
    </div>
</div>

<div class="contact-page-map">
    <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=university of san francisco&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="contact-form">
                <form class="row">
                    <div class="col-12 col-md-4"><input type="text" placeholder="Name"></div>
                    <div class="col-12 col-md-4"><input type="email" placeholder="E-mail"></div>
                    <div class="col-12 col-md-4"><input type="text" placeholder="Subject"></div>
                    <div class="col-12"><textarea placeholder="Message" rows="8"></textarea></div>
                    <div class="col-12 flex justify-content-center"><input class="btn gradient-bg" type="submit" value="Send Message"></div>
                </form>
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
<!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <!-- Search Box-->
          <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
              <input type="search" placeholder="What are you looking for..." class="form-control">
            </form>
          </div>
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="home.php" class="navbar-brand d-none d-sm-inline-block">
                  <div class="brand-text d-none d-lg-inline-block"><span><strong> Purpyket </strong></span> <span>Event Systems</span></div>
                  <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>PES</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Search-->
                <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="icon-search"></i></a></li>



                <!-- Logout    -->
                <li class="nav-item"><a href="logout.php" class="nav-link logout"> <span class="d-none d-sm-inline">Logout</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
          <?php
$rowCtr = 0;
$event_query = $conn->query("select * FROM events") or die(mysql_error());
while ($event_row = $event_query->fetch()) {

    $rowCtr = $rowCtr + 1;
    $event_id = $event_row['event_id'];

    if ($rowCtr == 1) {
        $state = "active";
    } else {
        $state = "";
    }

    ?>
            <div class="<?php echo "carousel-item " . $state; ?>">
              <!-- <img class="d-block w-100" src="../event-fliers/<php echo $event_row['event_flier']; ?>" class="img-fluid" height="300" alt="First slide"> -->
                <div class="carousel-caption d-none d-md-block">
                  <h5><?php echo $event_row['event_title']; ?></h5>
                  <p>Signed in as: <span style="color: #DCb535;"><?php echo $_SESSION['useraccess']; ?></span></p>
              </div>
            </div>
            <!-- <div class="carousel-item">
              <img class="d-block w-100" src="img/bg.jpg" class="img-fluid" height="500" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="img/bg.jpg" class="img-fluid" height="500" alt="Third slide">
            </div> -->

            <?php }?>

          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </header>

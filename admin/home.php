<!DOCTYPE html>
<html>

<?php include 'header.php';?>

  <body>
    <div class="page">

    <?php include 'top_navbar.php';?>

      <div class="page-content d-flex align-items-stretch">

        <?php include 'side_navbar.php';?>

        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Dashboard</h2>
            </div>
          </header>
          <!-- Dashboard Counts Section-->
          <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">

              <!-- Row 1 -->
              <div class="row bg-white has-shadow">
                <!-- Events Item -->
                <div class="col-xl-6 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-violet"><i class="fa fa-calendar"></i></div>
                    <div class="title"><strong><span>Total<br>Events</span></strong>
                      <div class="progress">
                        <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                      </div>
                    </div>
                    <div class="number"><strong>
                    <?php
                    $event_query = $conn->query("SELECT * FROM events") or die(mysql_error());
                    echo $event_query->rowCount();
                    ?>
                    </strong></div>
                  </div>
                </div>

                <!-- Seats Item -->
                <div class="col-xl-6 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-red"><i class="fa fa-users"></i></div>
                    <div class="title"><strong><span>Total<br>Seats</span></strong>
                      <div class="progress">
                        <div role="progressbar" style="width: 70%; height: 4px;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                      </div>
                    </div>
                    <div class="number"><strong>
                    <?php
                    $seat_query = $conn->query("SELECT * FROM seats") or die(mysql_error());
                    echo $seat_query->rowCount();
                    ?>
                    </strong></div>
                  </div>
                </div>
              </div> <hr class="hr hr-blurry" />

              <!-- Row 2 -->
              <div class="row bg-white has-shadow">
                <!-- Events Item -->
                <div class="col-xl-6 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-violet"><i class="fa fa-calendar"></i></div>
                    <div class="title"><strong><span>Total<br>Tickets</span></strong>
                      <div class="progress">
                        <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                      </div>
                    </div>
                    <div class="number"><strong>
                    <?php
                    $event_query = $conn->query("SELECT * FROM tickets") or die(mysql_error());
                    echo $event_query->rowCount();
                    ?>
                    </strong></div>
                  </div>
                </div>

                <!-- Seats Item -->
                <div class="col-xl-6 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-red"><i class="fa fa-users"></i></div>
                    <div class="title"><strong><span>Total<br> Surveys</span></strong>
                      <div class="progress">
                        <div role="progressbar" style="width: 70%; height: 4px;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                      </div>
                    </div>
                    <div class="number"><strong>
                    <?php
                    $seat_query = $conn->query("SELECT * FROM surveys") or die(mysql_error());
                    echo $seat_query->rowCount();
                    ?>
                    </strong></div>
                  </div>
                </div>
              </div><hr class="hr hr-blurry" />

              <!-- Row 3 -->
              <div class="row bg-white has-shadow">
                <!-- Events Item -->
                <div class="col-xl-6 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-violet"><i class="fa fa-calendar"></i></div>
                    <div class="title"><strong><span>Total<br>Organizers</span></strong>
                      <div class="progress">
                        <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                      </div>
                    </div>
                    <div class="number"><strong>
                    <?php
                    $event_query = $conn->query("SELECT * FROM organizers") or die(mysql_error());
                    echo $event_query->rowCount();
                    ?>
                    </strong></div>
                  </div>
                </div>

                <!-- Seats Item -->
                <div class="col-xl-6 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-red"><i class="fa fa-users"></i></div>
                    <div class="title"><strong><span>Total<br>Users</span></strong>
                      <div class="progress">
                        <div role="progressbar" style="width: 70%; height: 4px;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                      </div>
                    </div>
                    <div class="number"><strong>
                    <?php
                    $seat_query = $conn->query("SELECT * FROM users") or die(mysql_error());
                    echo $seat_query->rowCount();
                    ?>
                    </strong></div>
                  </div>
                </div>
              </div>

          </div>
        </section><hr />

        <!-- Projects Section-->
        <section class="projects no-padding-top">
          <div class="container-fluid">
          <p><strong>Sell Tickets</strong></p>
          <?php

          $seat_query = $conn->query("SELECT * FROM seats") or die(mysql_error());
          while ($seat_row = $seat_query->fetch()) {
              $prefSeat_id = $seat_row['seat_id'];

              $event_query = $conn->query("SELECT * FROM events WHERE event_id='$seat_row[event_id]'") or die(mysql_error());
              $event_row = $event_query->fetch();

              $totalRemaining = $seat_row['seat_maximum'] - $seat_row['seat_counter'];

              ?>

              <!-- Project-->
              <div class="project">
                <div class="row bg-white has-shadow">
                  <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                    <div class="project-title d-flex align-items-center">
                      
                      <div class="image has-shadow">

                      <?php if ($totalRemaining <= 0) {?>
                        <a href="#" class="btn btn-default" style="height: 100%; width: 100%; padding: 0px;"><small>Sold Out</small></a></div>
                      <?php } else {?>
                        <a href="checkout_ticket.php?seat_num=<?php echo $seat_row['seat_prefix'] . '-'; ?><?php echo $seat_row['seat_counter'] + 1; ?>&seat_id=<?php echo $seat_row['seat_id']; ?>&event_id=<?php echo $seat_row['event_id']; ?>&seat_counter=<?php echo $seat_row['seat_counter']; ?>" class="btn btn-info" style="height: 100%; width: 100%; padding: 0px;"><i class="fa fa-shopping-cart"></i><br /><small>Sell</small></a></div>

                      <?php }?>


                      <div class="text">
                        <h3 class="h4"><?php echo $seat_row['seat_prefix']; ?> @ <?php echo $seat_row['seat_price']; ?></h3><small><?php echo $seat_row['seat_description']; ?></small>
                      </div>
                    </div>
                    <div class="project-date"><span class="hidden-sm-down">Last Sold Ticket: <?php echo $seat_row['seat_prefix'] . ' - ' . $seat_row['seat_counter']; ?></span></div>
                  </div>
                  <div class="right-col col-lg-6 d-flex align-items-center">
                    <div class="time"><i class="fa fa-ticket"></i>Total Seats: <?php echo $seat_row['seat_maximum']; ?></div>
                    <div class="comments"><i class="fa fa-dollar"></i>Total Sold: <?php echo $seat_row['seat_counter']; ?></div>
                    <div class="comments"><i class="fa fa-file"></i>Total Remaining: <?php echo $totalRemaining; ?></div>

                  </div>
                </div>
              </div>

            <?php }?>
            </div>
          </section>

          <?php include 'footer.php';?>

        </div>
      </div>
    </div>

    <?php include 'script_files.php';?>
  </body>
</html>
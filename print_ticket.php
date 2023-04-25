<!DOCTYPE html>
<html lang="en">

<?php
include 'dbcon.php';
session_start();
error_reporting(0);

$soldTick_query = $conn->query("SELECT * FROM tickets WHERE qr_code='$_GET[qr_code]'");
$stq_row = $soldTick_query->fetch();

$seat_query = $conn->query("SELECT * FROM seats WHERE seat_id='$_GET[seat_id]'");
$seat_row = $seat_query->fetch();

$event_query = $conn->query("SELECT * FROM events WHERE event_id='$_GET[event_id]'");
$event_row = $event_query->fetch();

?>

<head>
    <title><?php echo strtoupper($event_row['event_title']); ?> - <?php echo $sitename; ?></title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- Styles -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <div class="m-container" style="margin: 35px;">
        <div id="ticket" class="row">
            <div class="col-12 col-md-12 col-lg-8">
                <table cellspacing="0" rules="all" border="1" style="border: 1px dotted darksalmon; width: 100%; height: 10%; background-color: gray;">
                    <tr>
                        <td style="width: 100%; background-color: white;">
                            <center>
                                <img src="<?php echo $stq_row['qr_image']; ?>" width="100%" />
                            </center>
                        </td>

                        <td style="padding: 0px;">
                            <table style="border: 1px dashed darkgoldenrod; width: 320px; height: 100%; background-color: purple;">
                               <tr><td> <br /> </td></tr>
                               <tr>
                                    <td rowspan="1" style="font-size: medium; font-weight: bold; color: white;">
                                    <center>
                                        <h2><?php echo strtoupper($event_row['event_title']); ?><br /></h2>
                                        <p style="font-weight: lighter; color: white;"><?php echo $event_row['event_venue']; ?> &middot; <?php echo $event_row['event_date']; ?></p>
                                    </center>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                    <center>
                                        <img class="img-thumbnail" src="event-fliers/<?php echo $event_row['event_flier']; ?>" width="70%" />
                                    </center>
                                    </td>
                                </tr>

                                <tr><td style="font-size: smaller; color: white;"><center>~ ~ o o O o o ~ ~</center></td></tr>
                                
                                <tr>
                                    <td>
                                        <center>
                                        <b style="font-size: larger; color: yellow;">
                                            <strong><?php echo $seat_row['seat_prefix']; ?> TICKET --- <?php echo $seat_row['seat_price']; ?>.00</strong>
                                        </b> <br />
                                        <p style="color: white;"><?php echo $seat_row['seat_description']; ?></p>
                                        </center>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" style="padding: 5px 0 5px 10px;">
                            <span style="color: whitesmoke;">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | </span><b style="color: purple;">Purpyket Event Systems. </b>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="col-12 col-md-12 col-lg-4">
                <div class="m-container" style="margin-top: 250px;">
                    <center>
                    
                    <!-- Button trigger modal -->
                    <button type="button" class="no-print print-link btn btn-dark" data-mdb-toggle="modal" data-mdb-target="#exampleModal">PROCEED TO PRINT</button>
                    <?php include 'includes/survey.php'; ?>
                    </center>
                </div>
                
            </div>    
            
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/jQuery.print.js"></script>
    <script type='text/javascript'>
    //<![CDATA[
    jQuery(function($) { 'use strict';
        try {
            var original = document.getElementById('canvasExample');
            original.getContext('2d').fillRect(20, 20, 120, 120);
        } catch (err) {
            console.warn(err)
        }
        $("#ticket").find('.print-link').on('click', function() {
            //Print with default options
            $.print("#ticket");
        });
    });
    //]]>
    </script>
    <script type='text/javascript' src='js/mdb.min.js'></script>
</body>
</html>
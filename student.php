<?php
    // establising session with data base.
    session_start();

    if(!isset($_SESSION['username']) || $_SESSION['role']!="student"){
        header("location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>List of companies</title>
    <!-- link for css page -->
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body class="bg-dark">
    <div class="event-container">
        <h3><p align="center">Students page</p></h3>
        <p align="right"><a href="logout.php" class="a">logout</a></p>
        <!-- division is created for details of a company and its date and time. -->
        <h3 class="year">2021</h3>  
       <div class="event">
        <div class="event-left">
          <div class="event-date">
            <div class="date">22</div>
            <div class="month">Jul</div>
          </div>
        </div>

        <div class="event-right">
          <a href="applyform.php" target="_blank"><h3 class="event-title">Coruscate Ventures Pvt. Ltd.</h3></a>

          <div class="event-description">
          Kindly thoroughly go through it and if you want to apply for the same then fill the given Google form by today (22-7-2021) 5:00 P.M. without fail.
          </div>

          <div class="event-timing">
            <img src="images/time.png" alt="" /> 05:00 pm
          </div>
        </div>
      </div>

      <div class="event">
        <div class="event-left">
          <div class="event-date">
            <div class="date">26</div>
            <div class="month">Jul</div>
          </div>
        </div>

        <div class="event-right">
        <a href="applyform.php" target="_blank"><h3 class="event-title">Zujo Tech Private Limited</h3></a>

          <div class="event-description">
          The placement drive for Zujo Tech Private Limited is scheduled on (26/7/2021-Friday). The mode of conduction will be online. Further information will be shared with you soon.
          </div>

          <div class="event-timing">
            <img src="images/time.png" alt="" /> 03:50 pm
          </div>
        </div>
      </div>

      <div class="event">
        <div class="event-left">
          <div class="event-date">
            <div class="date">29</div>
            <div class="month">Jul</div>
          </div>
        </div>

        <div class="event-right">
        <a href="applyform.php" target="_blank"><h3 class="event-title">DhiWise Private Limited </h3></a>
          <div class="event-description">
          The placement drive for DhiWise Private Limited is scheduled on (26/7/2021-Friday). The mode of conduction will be online. Further information will be shared with you soon.
          </div>
          <div class="event-timing">
            <img src="images/time.png" alt="" /> 04:00 pm
          </div>
        </div>
      </div>
      <!-- details over -->
    </div>
  </body>
</html>
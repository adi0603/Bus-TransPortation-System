<?php
session_start();
require 'connect.php';
$error="";
$userid=$_SESSION['userid'];
$result = mysqli_query($con,'select * from user where user_id='.$userid.'');
$fetch=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  	<link rel="shortcut icon" href="image/bus.ico"/>
    <meta charset="utf-8">
    <title> BUS TRANSPORTATION SYSTEM </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="about.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  </head>
  <body>
  	<nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="home.html">BTS</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="user.php"> Home </a></li>
                    <!-- <li class="active"><a href="ucontact.html"> Contact </a></li> -->
                    <li class="active"><a href="takeleave.php">Take Leave</a></li>
                    <li class="active"><a href="changeshift.php">Change Shift</a></li>
                    <li class="active"><a href="selectbus.php">Select Bus </a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="#" ><span class="glyphicon glyphicon-user"> <?php echo $fetch['name'];?> </span></a></li>
                    <li><a href="uchangepassword.html" ><span class="glyphicon glyphicon-cog"></span></a></li>
                    <li><a href="login1.php?action=logout" ><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </div>
        </nav>

  <div class="team-section">
    <div class="inner-width">
      <h1>Meet Our Team</h1>
      <div class="pers">


        <div class="pe">
          <img src="image/team/sachin1.png" alt="">
          <div class="p-name">Mr. Sachin Sharma</div>
          <div class="p-des">Mentor</div>
        </div>

        <div class="pe">
          <img src="image/team/adi.jpg" alt="">
          <div class="p-name">Aditya Pandey</div>
          <div class="p-des">Designer & Developer</div>
        </div>

        <div class="pe">
          <img src="image/team/akarsh.jpg" alt="">
          <div class="p-name">Akarsh Singh Bhadoriya</div>
          <div class="p-des">Data Analyst</div>
        </div>

        <div class="pe">
          <img src="image/team/aparna1.png" alt="">
          <div class="p-name">Aparna Singh</div>
          <div class="p-des">Content Writer</div>
        </div>

        <div class="pe">
          <img src="image/team/aditya.jpg" alt="">
          <div class="p-name">Aditya Trivedi</div>
          <div class="p-des">Data Collection</div>
        </div>
        <div class="pe">
          <img src="image/team/adarsh.jpg" alt="">
          <div class="p-name">Adarsh Saraswat</div>
          <div class="p-des">Manager</div>
        </div>
      </div>

    </div>
  </div>


  </body>
</html>

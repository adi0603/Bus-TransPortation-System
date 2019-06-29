<?php
session_start();
$userid=$_SESSION['userid'];
require 'connect.php';
$result = mysqli_query($con,'select * from user where user_id="'.$userid.'"');
$fetch=mysqli_fetch_array($result);
$error="";
if(isset($_POST['submit']))
{
    $leave= $_POST['leave'];
    $shift= $_POST['shift'];
    $result1 = mysqli_query($con,'select * from user where user_id="'.$userid.'"');
    $fetch1=mysqli_fetch_array($result1);
    $morning= $fetch1['morning'];
    $evening= $fetch1['evening'];

    if(($leave=="1") && ($shift=="3"))
    {    	
    	$result1 = mysqli_query($con,'update user set leave="1" where user_id="'.$userid.'"');
    	$result2 = mysqli_query($con,'update seat set morning="0" where seat_id="'.$morning.'"');
    	$result2 = mysqli_query($con,'update seat set evening="0" where seat_id="'.$evening.'"');
    	$error="Informaton updated Sucessfully.";
    }
    elseif (($leave=="1") && ($shift=="1"))
    {
    	$result2 = mysqli_query($con,'update seat set morning="0" where seat_id="'.$morning.'"');
    	$error="Informaton updated Sucessfully.";
    }
    elseif (($leave=="1") && ($shift=="2")) 
    {
    	$result2 = mysqli_query($con,'update seat set evening="0" where seat_id="'.$evening.'"');
    	$error="Informaton updated Sucessfully.";
    }
    elseif (($leave=="0") && ($shift=="1")) 
    {
    	$result2 = mysqli_query($con,'update seat set morning="'.$userid.'" where seat_id="'.$morning.'"');

    	$error="Informaton updated Sucessfully.";
    }
    elseif (($leave=="0") && ($shift=="2")) 
    {
    	$result2 = mysqli_query($con,'update seat set evening="'.$userid.'" where seat_id="'.$evening.'"');
    	$error="Informaton updated Sucessfully.";
    }
    elseif(($leave=="0") && ($shift=="3"))
    {    	
    	$result1 = mysqli_query($con,'update user set leave="0" where user_id="'.$userid.'"');
    	$result2 = mysqli_query($con,'update seat set morning="'.$userid.'" where seat_id="'.$morning.'"');
    	$result2 = mysqli_query($con,'update seat set evening="'.$userid.'" where seat_id="'.$evening.'"');
    	$error="Informaton updated Sucessfully.";
    }
    else
    {
    	$error="Please enter correct information.";
    }
}
?>
<html>
<head>
    <link rel="shortcut icon" href="image/bus.ico"/>
    <title> BUS TRANSPORTATION SYSTEM </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="takeleave.css">
</head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="home.html">BTS</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="user.php"> Home </a></li>
                    <li class="active"><a href="uabout.php">About Us</a></li>
                    <li class="active"><a href="changeshift.php">Change Shift</a></li>
                    <li class="active"><a href="selectbus.php">Select Bus </a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" ><span class="glyphicon glyphicon-user"> <?php echo $fetch['name'];?> </span></a></li>
                    <li><a href="uchangepassword.php" ><span class="glyphicon glyphicon-cog"></span></a></li>
                    <li><a href="login1.php?action=logout" ><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </div>
        </nav>
        <div class="leave-box">
            <img src="image/leave.png" class="leave">
            <h1>Leave</h1>
            <p><?php echo $error; ?></p>
            <form method="post">
                <p>Select Your Leave</p>
                <select name="leave">
                    <option value="">Select your Option</option>
                    <option value="1">On Leave</option>
                    <option value="0">Off Leave</option>
                </select>
                <br>
                <p>Select Your Shift</p>
                <select name="shift">
                    <option value="">Select your Option</option>
                    <option value="1">Morning</option>
                    <option value="2">Evening</option>
                    <option value="3">Full Day</option>
                </select>
                <br><br>
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
    </body>
</html>
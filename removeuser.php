<?php
session_start();
require 'connect.php';
$userid=$_SESSION['userid'];
$result = mysqli_query($con,'select * from user where user_id='.$userid.'');
$fetch=mysqli_fetch_array($result);
$leave="";
$mor="";
$eve="";
if($fetch['leave']=="1")
{
    $leave="On Leave";
}
else
{
    $leave="Off Leave";
}
$route_id=$fetch['route_id'];
$morning=$fetch['morning'];
$evening=$fetch['evening'];

$result1=mysqli_query($con,"select * from seat where seat_id='".$morning."' and morning='".$userid."'");
if(mysqli_num_rows($result1)==1)
{
    $fetch1=mysqli_fetch_array($result1);
    $bus_id1=$fetch1['bus_id'];
    $result3=mysqli_query($con,"select * from bus where bus_id='".$bus_id1."'");
    $fetch3=mysqli_fetch_array($result3);
    $mor=$fetch1['seat_no']." , ".$fetch3['bus_no'];
}
else
{
    $mor="On Leave";
}

$result2=mysqli_query($con,"select * from seat where seat_id='".$evening."' and evening='".$userid."'");
if(mysqli_num_rows($result2)==1)
{
    $fetch2=mysqli_fetch_array($result2);
    $bus_id2=$fetch2['bus_id'];
    $result4=mysqli_query($con,"select * from bus where bus_id='".$bus_id2."'");
    $fetch4=mysqli_fetch_array($result4);
    $eve=$fetch2['seat_no']." , ".$fetch4['bus_no'];
}
else
{
    $eve="On Leave";
}

$result5=mysqli_query($con,"select * from route where route_id='".$route_id."'");
$fetch5=mysqli_fetch_array($result5);
if(isset($_POST['submit']))
{
    $result = mysqli_query($con,'update seat set evening="0" where seat_id="'.$fetch['evening'].'"');
    $result = mysqli_query($con,'update seat set morning="0" where seat_id="'.$fetch['morning'].'"');
    $result = mysqli_query($con,'delete from user where user_id="'.$userid.'"');
    $result = mysqli_query($con,'delete from forget where id="'.$userid.'"');
	header('Location: userdetail.php');
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
    <link rel="stylesheet" type="text/css" href="usershow.css">
</head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="home.html">BTS</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="admin.php"> Home </a></li>
                    <li class="active"><a href="aabout.html">About Us</a></li>
                    <li class="active"><a href="addroute.php">Add Route</a></li>
                    <li class="active"><a href="addbus.php">Add Bus</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">List<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="users.php">Users</a></li>
                            <li><a href="routes.php">Routes</a></li>
                            <li><a href="buses.php">Buses</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Remove<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="userdetail.php">User</a></li>
                            <li><a href="removeroute.php">Route</a></li>
                            <li><a href="removebus.php">Bus</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" ><span class="glyphicon glyphicon-user"> <?php echo $fetch['name'];?> </span></a></li>
                    <li><a href="achangepassword.php" ><span class="glyphicon glyphicon-cog"></span></a></li>
                    <li><a href="login.php?action=logout" ><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </div>
        </nav>
        <div class="user-box">
            <img src="image/user/user.png" class="user">
            <h1>Profie Detail</h1>
            <form method="post">
                <p>Name : <?php echo $fetch['name'];?></p><br>
                <p>Email Id : <?php echo $fetch['email'];?></p><br>
                <p>Route  : <?php echo $fetch5['route_name'];?></p><br> 
                <p>Morning: <?php echo $mor;?></p><br>
                <p>Evening: <?php echo $eve;?></p><br>
                <input type="submit"  name="submit" value="Remove">
            </form>
        </div>
    </body>
</html>
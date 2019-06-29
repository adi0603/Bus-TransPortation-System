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
    <link rel="stylesheet" type="text/css" href="account.css">
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
                    <li class="active"><a href="uabout.php">About Us</a></li>
                    <li class="active"><a href="takeleave.php">Take Leave</a></li>
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
        <table>
    <tr>
        <td colspan="3">
            <div class="name"><?php echo $fetch['name']; ?></div>
        </td>
    </tr>
    <tr>
        <td class="details-td">
            <div class="label">User ID</div> : <div class="id"><?php echo $fetch['user_id']; ?></div>
            <br><div class="label">Email</div> : <div class="email"><?php echo $fetch['email']; ?></div>
            <br><div class="label">Leave</div> : <div class="email"><?php echo $leave; ?></div>
            <br><div class="label">Route</div> : <div class="email"><?php echo $fetch5['route_name']; ?></div>
            <br><div class="label">Shift</div> : <div class="email"><?php echo $fetch['shift']; ?></div>
            <br><div class="label">Morning</div> : <div class="email"><?php echo $mor; ?></div>
            <br><div class="label">Evening</div> : <div class="email"><?php echo $eve; ?></div>
        </td>
        <td class="description-td">
            <div class="description" spellcheck="false">This is a Short Description of the User</div>
        </td>
    </tr>
</table>
    </body>
</html>
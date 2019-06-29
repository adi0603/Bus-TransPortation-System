<?php
session_start();
$error="";
require 'connect.php';
$userid=$_SESSION['userid'];
$result = mysqli_query($con,'select * from admin where admin_id='.$userid.'');
$fetch=mysqli_fetch_array($result);
if(isset($_POST['submit']))
{
    $oldpassword= $_POST['oldpassword'];
    $newpassword= $_POST['newpassword'];
    $confpassword= $_POST['confpassword'];
    if($newpassword==$confpassword)
    {
    	$result = mysqli_query($con,'select * from admin where admin_id="'.$userid.'" and password="'.$oldpassword.'"');
    	if(mysqli_num_rows($result)==1)
    	{
    		$result1 = mysqli_query($con,'update admin set password="'.$newpassword.'" where admin_id="'.$userid.'"');
    		$error="Password updated Sucessfully";
    	}
    	else
    	{
    		$error="Password is incorrect";
    	}
    }
    else
    {
    	$error="Enter same password as New Passsword";
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
    <link rel="stylesheet" type="text/css" href="changepassword.css">
</head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="home.html">BTS</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="admin.php"> Home </a></li>
                    <!-- <li class="active"><a href="acontact.html"> Contact </a></li> -->
                    <li class="active"><a href="aabout.php">About Us</a></li>
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
        <div class="password-box">
            <img src="image/password.png" class="password">
        <h1>Change Password</h1>
        	<p><?php echo $error; ?></p>
            <form method="post">
            <p>Old Password</p>
            <input type="password" name="oldpassword" placeholder="Old Password" required>
            <p>New Password</p>
            <input type="password" name="newpassword" placeholder="New Password" required>
            <p>Confirm Password</p>
            <input type="password" name="confpassword" placeholder="Confirm Password" required>
            <input type="submit" name="submit" value="Change"> 
            </form>
        
        
        </div>
    
    </body>
</html>
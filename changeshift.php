<?php
session_start();
require_once("dbfunctions.php");
$db_handle=new Dbfunctions();
require 'connect.php';
$error="";
$userid=$_SESSION['userid'];
$result = mysqli_query($con,'select * from user where user_id='.$userid.'');
$fetch=mysqli_fetch_array($result);
$route=$fetch['route_id'];
$result1 = mysqli_query($con,'select * from route where route_id='.$route.'');
$fetch1=mysqli_fetch_array($result1);
if (isset($_POST['submit'])) 
{
	$shift=$_POST['shift'];
	$time=$_POST['time'];
	$busid=$_POST['busid'];
	if($shift!=$fetch['shift'])
	{
		if($time==1)
		{
			$seatid=$fetch['morning'];
			$result2 = mysqli_query($con,'select * from seat where seat_id='.$seatid.'');
			$fetch2=mysqli_fetch_array($result2);
			if($fetch2['morning']==0)
			{
				$_SESSION['busid']=$_POST['busid'];
				$_SESSION['time']=$_POST['time'];
				header('Location: sseat.php');
			}
			else
			{
				$error="Select different Time";
			}
		}
		if($time==2)
		{
			$seatid=$fetch['evening'];
			$result2 = mysqli_query($con,'select * from seat where seat_id='.$seatid.'');
			$fetch2=mysqli_fetch_array($result2);
			if($fetch2['evening']==0)
			{
				$_SESSION['busid']=$_POST['busid'];
				$_SESSION['time']=$_POST['time'];
				header('Location: sseat.php');
			}
			else
			{
				$error="Select different Time";
			}
		}

	}
	else
	{
		$error="Select Different Shift";
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
    <link rel="stylesheet" type="text/css" href="userselect.css">
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
                    <li class="active"><a href="selectbus.php">Select Bus </a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" ><span class="glyphicon glyphicon-user"> <?php echo $fetch['name'];?> </span></a></li>
                    <li><a href="uchangepassword.php" ><span class="glyphicon glyphicon-cog"></span></a></li>
                    <li><a href="login1.php?action=logout" ><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </div>
        </nav>        
        <div class="option-box">
            <img src="image/bus.png" class="bus">
            <h1>Change your Shift</h1>
            <p><?php echo $error; ?></p>
            <form method="POST">
            	<p>Route : <?php echo $fetch1["route_name"];?></p><br>
            	<p>Select Your Shift</p>
                <select name="shift">
                    <option value="">Select your Option</option>
                    <option value="1">Shift 1</option>
                    <option value="2">Shift 2</option>
                </select>
                <p>Select Your Time</p>
                <select name="time">
                    <option value="">Select your Option</option>
                    <option value="1">Morning</option>
                    <option value="2">Evening</option>
                </select>
            	<table border="0" align="center">
            		<tr>
            			<p>Buses</p>
            			<td><select name="busid" id="busid" required>
            			<option value="">Select Bus</option>
            			<?php
            				$query="select * from bus where route_id='".$route."'";
            				$results=$db_handle->runQuery($query);
            				foreach ($results as $busid) {
            				?>
            				<option value="<?php echo $busid["bus_id"];?>"><?php echo $busid["bus_no"];?></option>
            				<?php
            				}
            				?>
            			</select></td>
            		</tr>
            	</table><br><br>
            	<input type="submit" name="submit" value="Submit">
            </form>
        </div>
    </body>
</html>

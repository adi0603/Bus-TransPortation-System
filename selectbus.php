<?php
session_start();
require_once("dbfunctions.php");
$db_handle=new Dbfunctions();
require 'connect.php';
$userid=$_SESSION['userid'];
$result = mysqli_query($con,'select * from user where user_id='.$userid.'');
$fetch=mysqli_fetch_array($result);
$route=$fetch['route_id'];
$result1 = mysqli_query($con,'select * from route where route_id='.$route.'');
$fetch1=mysqli_fetch_array($result1);
if(isset($_POST['submit']))
{
	$busid=$_POST['busid'];
    $shift=$_POST['shift'];
	$_SESSION['busid']= $busid;
    $result = mysqli_query($con,'update user set shift="'.$shift.'" where user_id="'.$userid.'"');
    header('Location: seat.php');
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
                    <li class="active"><a href="changeshift.php">Change Shift</a></li>
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
            <h1>Select Your Bus</h1>
            <form method="POST">
            	<p>Route : <?php echo $fetch1["route_name"];?></p><br>
                <table border="0" align="center">
                    <tr>
                        <p>Shift</p>
                        <td><select name="shift" id="shift" required>
                        <option value="">Select Shift</option>
                        <option value="1">Shift 1</option>
                        <option value="2">Shift 2</option>
                    </select>
                </td>
            </tr>
        </table>
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

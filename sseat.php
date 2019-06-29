<?php
session_start();
require_once("dbfunctions.php");
$db_handle=new Dbfunctions();
require 'connect.php';
$error="";
$busid=$_SESSION['busid'];
$userid=$_SESSION['userid'];
$time=$_SESSION['time'];
$result = mysqli_query($con,'select * from user where user_id='.$userid.'');
$fetch=mysqli_fetch_array($result);
if (isset($_POST['submit'])) 
{
	if(isset($_POST['seat']))
	{
		$seat=$_POST['seat'];
        if($time==1)
        {
            $result = mysqli_query($con,'update user set morning="'.$seat.'" where user_id="'.$userid.'"');
            $result1 = mysqli_query($con,'update seat set morning="'.$userid.'" where seat_id="'.$seat.'"');
            header('Location: user.php');
        }
		elseif($time==2)
        {
            $result = mysqli_query($con,'update user set evening="'.$seat.'" where user_id="'.$userid.'"');
            $result1 = mysqli_query($con,'update seat set evening="'.$userid.'" where seat_id="'.$seat.'"');
            header('Location: user.php');
        }
		
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
    <link rel="stylesheet" type="text/css" href="seat.css">
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
            </div>
        </nav>
        <div class="seat-box">
            <img src="image/seat.png" class="seat">
            <form method="POST">
            	<label>Empty</label><input type="radio" name="allocate" value="" disabled>
            	<label>Selected</label><input type="radio" name="allocate" value="" checked>
                <?php
                            $query='select * from seat where bus_id="'.$busid.'"';
                            $results=$db_handle->runQuery($query);
                            $i=0;
                            foreach ($results as $user) {
                            if($time==1)
                            {
                                $mor=$user["morning"];
                            }
                            else
                            {
                                $mor=$user["evening"];
                            }
                            
                            $disabled="";
							if($mor==0)
							{
								$disabled="";
							}
							else
							{
								$disabled="disabled";
							}

							if($i==0)
							{
                            	?>
                            	<div>
                            	<?php 
                            	$i=1;
                            }
                            if($i<=4)
                            {
                            	
                            	if($i==3)
                            	{
                            		?>
                            		<label>____</label>
                            		<?php
                            	}
                            	?>
                            	<input type="radio" name="seat" value="<?php echo $user['seat_id'];?>" <?php echo $disabled;?>>
                            	<?php
                            	if(($i!=4) && ($i!=2))
                            	{
                            		?>
                            		<label>_</label>
                            		<?php
                            	}
                    			$i=$i+1;
                            }
                            if($i>4)
                            {
                    			?>
                				</div>
                            	<?php
                            	$i=0;
                            }
                        }
                		?>                
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
    </body>
</html>
<?php
session_start();
require_once("dbfunctions.php");
$db_handle=new Dbfunctions();
require 'connect.php';
$userid=$_SESSION['userid'];
$result = mysqli_query($con,'select * from admin where admin_id='.$userid.'');
$fetch=mysqli_fetch_array($result);
$error="";
if(isset($_POST['submit']))
{
    $routeid= $_POST['routeid'];
    $result1 = mysqli_query($con,'select * from route where route_id="'.$routeid.'"');
    if(mysqli_num_rows($result1)==1)
    {
        $result2 = mysqli_query($con,'delete from route where route_id="'.$routeid.'"');
        $error="Route Removed Sucessfully";
    }
    else
        $error="Route not found";
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
    <link rel="stylesheet" type="text/css" href="userdetail.css">
</head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="home.html">BTS</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="admin.php"> Home </a></li>
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
        <div class="detail-box">
            <img src="image/detail.png" class="detail">
            <h1>Select Route</h1>
            <p><?php echo $error; ?></p>
            <form method="post">
            <table border="0" align="center">
                    <tr>
                        <p>Route</p>
                        <td><select name="routeid" id="routeid" required>
                        <option value="">Select Route</option>
                        <?php
                            $query="select * from route";
                            $results=$db_handle->runQuery($query);
                            foreach ($results as $routeid) {
                            ?>
                            <option value="<?php echo $routeid["route_id"];?>"><?php echo $routeid["route_name"];?></option>
                            <?php
                            }
                            ?>
                        </select></td>
                    </tr>
                </table>
            <input type="submit" name="submit" value="Remove">
            </form>
        </div>
    </body>
</html>
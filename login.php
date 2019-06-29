<?php
session_start();
$error="";
if(isset($_POST['submit']))
{
    require 'connect.php';
    $userid= $_POST['adminid'];
    $password= $_POST['password'];
    $result = mysqli_query($con,'select * from admin where admin_id="'.$userid.'" and password="'.$password.'"');
    if(mysqli_num_rows($result)==1)
    {
        $_SESSION['userid']= $userid;
        header('Location: admin.php');
    }
    else
        $error="Invalid ADmin Id or Password";
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
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="home.html">BTS</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="home.html"> Home </a></li>
                    <li class="active"><a href="login1.php"> User </a></li>
                    <!-- <li class="active"><a href="contact.html"> Contact </a></li> -->
                    <li class="active"><a href="about.html">About Us</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="signup.php" ><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                </ul>
            </div>
        </nav>        
    <div class="login-box">
    <img src="image/avatar.png" class="avatar">
        <h1>ADMINISTRATOR LOGIN</h1>
        <p><?php echo $error; ?></p>
            <form method="post">
                <p>Admin ID</p>
                <input type="text" name="adminid" placeholder="Enter Admin ID" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                <p>Password</p>
                <input type="password" name="password" placeholder="Enter Password" required>
                <input type="submit" name="submit" value="Login">
                <a href="login1.php">User Login</a><br>
                <a href="forgot.php">Forget Password</a><br>
            </form>     
        </div>
    </body>
</html>
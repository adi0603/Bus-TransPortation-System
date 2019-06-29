<?php
session_start();
$error="";
if(isset($_POST['submit']))
{
    require 'connect.php';
    $adminid= $_POST['adminid'];
    $name= $_POST['name'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    $result = mysqli_query($con,'select * from admin where admin_id="'.$adminid.'"');
    if(mysqli_num_rows($result)==0)
    {
        $result = mysqli_query($con,"INSERT into admin (admin_id,name,email,password) values ('$adminid','$name','$email','$password')");
        $error="You have sucessfully Registered.";
    }
    else
    {
        $error="Please login.You already have an account.";
    }
}
?>
<head>
    <link rel="shortcut icon" href="image/bus.ico"/>
    <title> BUS TRANSPORTATION SYSTEM </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="signup.css">   
</head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="home.html">BTS</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="home.html"> Home </a></li>
                    <li class="active"><a href="login.php"> Admin </a></li>
                    <li class="active"><a href="login1.php"> User </a></li>
                    <!-- <li class="active"><a href="contact.html"> Contact </a></li> -->
                    <li class="active"><a href="about.html">About Us</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="login.php"  ><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </nav>
    <div class="login-box">
    <img src="image/avatar.png" class="avatar">
        <h1>SIGN UP FOR ADMIN</h1>
            <p><?php echo $error; ?></p>
            <form method="post">
            <p>Name</p>
            <input type="text" name="name" placeholder="Enter Name" required="">
            <p>Admin Id</p>
            <input type="text" name="adminid" placeholder="Enter Admin Id" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
            <p>Email</p>
            <input type="email" name="email" placeholder="Enter Email" required="">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" required="">
            <input type="submit" name="submit" value="Sign Up">
            <a href="signup.php">Signup for User</a>
            </form>
        </div>
    </body>
</html>
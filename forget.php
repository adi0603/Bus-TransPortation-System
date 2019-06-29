<?php
require 'connect.php';
$error="";
$questions = array('1'=>'What is your nick name','2'=>'What is your birth place','3'=>'Who is your best friend','4'=>'Where is your school');
$randomnumber=rand(1,4);
if(isset($_POST['submit']))
{
    $id= $_POST['id'];
    $Q= $_POST['Q'];
    #$result = mysqli_query($con,"INSERT into forget (id,Q1,Q2,Q3,Q4) values ('$id','$Q1','$Q2','$Q3','$Q4')");
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
                    <li class="active"><a href="admin.html"> Admin </a></li>
                    <li class="active"><a href="user.html"> User </a></li>
                    <li class="active"><a href="contact.html"> Contact </a></li>
                    <li class="active"><a href="about.html">About Us</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="signup.html" ><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="admin.html"  ><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </nav>
    <div class="login-box">
    <img src="image/avatar.png" class="avatar">
        <h1>FORGOT PASSWORD</h1>
            <form>
            <p>User ID</p>
            <input type="text" name="id" placeholder="Enter User ID">
            <p><?php echo $questions['$randomnumber'];?></p>
            <input type="text" name="Q" placeholder="Answer">
            <input type="submit" name="submit" value="Submit">
            <a href="login.php">User Login</a><br>
            <a href="login1.php">Administrator Login</a><br>    
            </form>
        </div>
    
    </body>
</html>
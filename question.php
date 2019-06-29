<?php
require 'connect.php';
session_start();
$id=$_SESSION['userid'];
$error="";
$questions = array('1'=>'What is your nick name','2'=>'What is your birth place','3'=>'Who is your best friend','4'=>'Where is your school');
if(isset($_POST['submit']))
{
    $Q1= $_POST['Q1'];
    $Q2= $_POST['Q2'];
    $Q3= $_POST['Q3'];
    $Q4= $_POST['Q4'];
    $result = mysqli_query($con,"INSERT into forget (id,Q1,Q2,Q3,Q4) values ('$id','$Q1','$Q2','$Q3','$Q4')");

        header('Location: home.html');
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
    <link rel="stylesheet" type="text/css" href="question.css">   
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
                    <li class="active"><a href="about.html">About Us</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="signup.php"  ><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="login.php"  ><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </nav>
    <div class="login-box">
    <img src="image/question.jpg" class="avatar">
        <h1>Security Questions</h1>
            <p><?php echo $error; ?></p>
            <form method="post">
            <p><?php echo $questions['1'];?></p>
            <input type="text" name="Q1" placeholder="Enter Answer" required>
            <p><?php echo $questions['2'];?></p>
            <input type="text" name="Q2" placeholder="Enter Answer" required>
            <p><?php echo $questions['3'];?></p>
            <input type="text" name="Q3" placeholder="Enter Answer" required>
            <p><?php echo $questions['4'];?></p>
            <input type="text" name="Q4" placeholder="Enter Answer" required>
            <br>
            <input type="submit" name="submit" value="Submit">
            </form>
        </div>
    </body>
</html>
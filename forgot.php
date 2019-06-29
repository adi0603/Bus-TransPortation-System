<?php
require 'connect.php';
$error="";
$questions = array('1'=>'What is your nick name ?','2'=>'What is your birth place ?','3'=>'Who is your best friend ?','4'=>'Where is your school ?');
$randomnumber=0;
if(isset($_POST['submit']))
{
    $id= $_POST['id'];
    $answer= $_POST['answer'];
    $random= $_POST['ran'];
    $result = mysqli_query($con,"select * from forget where id='".$id."'");
    if(mysqli_num_rows($result)==1)
    {   $Q='Q'.$random;
        $fetch=mysqli_fetch_array($result);
        if($fetch[$Q]==$answer)
        {
            $result = mysqli_query($con,"select * from user where user_id='".$id."'");
            $fetch=mysqli_fetch_array($result);
            $error="Your Password is '' ".$fetch['password']." ''. Please reset your Password after login";
        }
        else
        {
            $error="Wrong answer";
        }
    }
    else
        {
            $error="User ID not Found";
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
                    <li class="active"><a href="login.php"> Admin </a></li>
                    <li class="active"><a href="login1.php"> User </a></li>
                    <li class="active"><a href="about.html">About Us</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="signup.php" ><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="login.php"  ><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </nav>
    <div class="login-box">
    <img src="image/avatar.png" class="avatar">
        <h1>RESET PASSWORD</h1>
        <p><?php echo $error;?></p>
            <form method="POST">
            <p>User ID</p>
            <?php $randomnumber=rand(1,4);?>
            <input type="text" name="id" placeholder="Enter User ID">
            <p><?php echo $questions[$randomnumber];
            $_SESSION['ran']=$randomnumber;
            ?></p>
            <input type="text" name="answer" placeholder="Answer" required>
            <input type="hidden" id="ran" name="ran" value="<?php echo $_SESSION['ran']; ?>">
            <input type="submit" name="submit" value="Submit" required>
            <a href="login.php">User Login</a><br>
            <a href="login1.php">Administrator Login</a><br>    
            </form>
        </div>
    
    </body>
</html>
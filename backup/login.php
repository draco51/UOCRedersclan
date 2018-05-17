<!doctype html>
<html>

<head>
<meta charset="utf-8">
<title>UOC Reader's Clan | Home</title>
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/login.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="wrapper">

  <div id="header_wrapper">
  	<div id="logo">UOC Reader's Clan</div>
  	<img src="img/uoclogo.png" width="66" height="69" alt=""/>
  </div>
  
  <div id="nav_bar"></div>
  <div id="content_wrapper">
  <h1>Login</h1>
  <div id="login_wrapper">
		
		<form action="login.php" method="post">
		<label>Student Email :</label>
		<input type="email" name="stu_email" id="email" required="required" placeholder="Lasitha123@gmail.com"/><br/><br />
		<label>Password :</label>
		<input type="password" name="stu_pw" id="password" required="required" placeholder="Please Enter Your Password"/><br/><br />
		<input type="submit" value="Login" name="submit"/><br><br />
		<a href="registration.php">Register Now</a>
		</form>
  </div>
  </div>
  	
  <div id="footer">
	<div id="copyright"> www.uocreadersclan.org | 2017 | All Right Reserved</div>
  </div>
  
</div>


<?php

include('dblog.php');
session_start();       //<<----------------------------------------- Session

if(isset($_POST["submit"])){

// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
//if ($conn->connect_error) {
//die("Connection failed: " . $conn->connect_error); }

$myusername = mysqli_real_escape_string($conn,$_POST['stu_email']);
$mypassword = mysqli_real_escape_string($conn,$_POST['stu_pw']); 

$sql = " SELECT fname FROM users WHERE email = '$myusername' and password = '$mypassword' " ;
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
//$active = $row['active'];
$count = mysqli_num_rows($result);
	
// If result matched $myusername and $mypassword, table row must be 1 row
		
if($count == 1) {
	//session_register("myusername");
	$_SESSION['login_user'] = $myusername;



         
	header("location: home.php"); // <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Landing page
				}
else {
echo "<br>" . "<h2>Sorry! Your Login Name or Password is invalid</h2>";
echo "<script type= 'text/javascript'>alert('Sorry! Your Login Name or Password is invalid');</script>";
}      

$conn->close();
}
?>
</body>
</html>

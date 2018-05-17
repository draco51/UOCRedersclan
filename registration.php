<!doctype html>
<html>

<head>
<meta charset="utf-8">
<title>UOC Reader's Clan | Home</title>
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/registration.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="wrapper">

  <div id="header_wrapper">
  	<div id="logo">UOC Reader's Clan</div>
  	<img src="img/uoclogo.png" width="66" height="69" alt=""/>
  </div>
  
  <div id="nav_bar">
    <ul>
      <li><a href="home.php">Home</a></li>
      <li><a href="addbook.php">Add Books</a></li>
      <li><a href="about_us.php">About Us</a></li>
      <li><a href="#">FAQ </a></li>
      <li><a href="registration.php">Register </a></li>
    </ul>
  
  </div>
  <div id="content_wrapper">
  <h1>Register as a new user</h1>
	<div id="registration">
	<form action="" method="post">
<label>First Name :</label>
<input type="text" name="f_name" id="fname" required="required" placeholder="Please Enter First Name"/><br /><br />
<label>Last Name :</label>
<input type="text" name="l_name" id="lname" placeholder="Please Enter Last Name"/><br /><br />
<label>Email :</label>
<input type="email" name="email" id="email" required="required" placeholder="lasitha123@gmail.com"/><br/><br />
<label>Password :</label>
<input type="password" name="pw" id="password" required="required" placeholder="*********"/><br/><br />
<label>Address :</label>
<input type="text" name="adrs" id="adrs" required="required" placeholder="Please Enter Your Address"/><br/><br />
<label>Mobile No :</label>
<input type="text" name="num" id="num" required="required" placeholder="Please Enter Your Mobile num"/><br/><br />
<label>Facebook Link :</label>
<input type="text" name="fbLink" id="fb" required="required" placeholder="Please Enter Your facbook URL"/><br/><br />

<input type="submit" value=" Submit " name="submit"/><br><br />

<a href="home.php">Return Home</a>
</form></div>
  </div>
  	
  <div id="footer">
	<div id="copyright"> www.uocreadersclan.org | 2017 | All Right Reserved</div>
  </div>
  
</div>

<?php


include('dblog.php');

if(isset($_POST["submit"])){



$fname = $_POST['f_name'];
$lname = $_POST["l_name"];
$adrs = $_POST["adrs"];
$num = $_POST["num"];
$email = $_POST["email"];
$pw = $_POST["pw"];
$fb=$_POST["fbLink"];


// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO users (fname, lname, email, address, m_number,password,fbLink)
VALUES ('$fname','$lname', '$email', '$adrs', '$num', '$pw','$fb')";

if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
	echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
  header("location:login.php");

} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
}
$conn->close();
}
?>
</body>

</html>

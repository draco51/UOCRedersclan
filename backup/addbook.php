<!doctype html>
<html>
<?php
   include('session.php');
   include('dblog.php');
?>
<head>

<title>UOC Reader's Clan | Home</title>
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/addbook.css" rel="stylesheet" type="text/css">
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
      <li><a href="#">Add Books</a></li>
      <li><a href="about_us.php">About Us</a></li>
      <li><a href="#">FAQ </a></li>
      <li><a href="edit.php">Edit </a></li>

    </ul>
    <p>logged in as   <?php echo "{$_SESSION['fname']}  <a href = 'logout.php'>Logout</a> "   ?> <P>
  </div>
  <div id="content_wrapper">
  <h1>Add a Book to Clan</h1>
	<div id="addbook">
	  <form action="addbook.php" method="POST">
    <label for="bname">Book Name</label>
    <input type="text" id="bname" name="bookName" placeholder="Type Book name..">

    <label for="aname">Author Name</label>
    <input type="text" id="aname" name="authorName" placeholder="Type Author name..">




    <label for="email">Email</label>
    <?php echo "<input type='text' id='email' name='email' value='{$_SESSION['login_user']}'>";
      ?>
    <label for="bookcategory">Book Category</label>
    <select id="bookcategory" name="bookcategory">
      <option value="novel">Novel</option>
      <option value="shortstory">Short Story</option>
      <option value="magazine">magazine</option>
    </select>

    <label for="booktype">Book Type</label>
    <select id="booktype" name="booktype">
      <option value="romantic">Romantic</option>
      <option value="adventure">Adventure</option>
      <option value="Religious">religious</option>
    </select>

    <label for="review">Review</label>
    <input type="text" id="review" name="review" placeholder="Type Your Review..">

    <input type="submit" name='submit' value="Submit">

  </form></div>
  </div>

 
  <div id="footer">
	<div id="copyright"> www.uocreadersclan.org | 2017 | All Right Reserved</div>
  </div>
  
</div>


 <?php

include('dblog.php');


if(isset($_POST["submit"])){


$bkName = $_POST['bookName'];
$bkAuthor = $_POST["authorName"];
$bkCat = $_POST["bookcategory"];
$bkType = $_POST["booktype"];
$bkReview = $_POST["review"];
$email = $_POST["email"];

echo "<script type= 'text/javascript'>alert('wada yakooo!!!! <3');</script>";

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO books (bkName, bkAuthor, bkCat, bkType, bkReview, email)
VALUES ('$bkName','$bkAuthor', '$bkCat', '$bkType', '$bkReview', '$email')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
} else {
  echo "NOOOOOOOO";
  echo "Error: " . $sql . "<br>" . $conn->error();
  echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
}
$conn->close();
}
?>



</body>

</html>

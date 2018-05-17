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
      <li><a href="addbook.php">Add Books</a></li>
      <li><a href="about_us.php">About Us</a></li>
      <li><a href="#">FAQ </a></li>
      <li><a href="edit.php">Edit </a></li>
    </ul>
    <p>logged in as   <?php echo "{$_SESSION['fname']}  <a href = 'logout.php'>Logout</a> "   ?> <P>
  </div>
  <div id="content_wrapper">
  <h1>Update Your book</h1>
	<div id="addbook">





  <?php 
include('dblog.php');

$aa = $_GET['link'];

$auto_fill_detail_query = "SELECT * FROM books WHERE bkID = '$aa' ";
$result5 = mysqli_query($conn,$auto_fill_detail_query);
$roww=mysqli_fetch_array($result5);



    echo "
	  <form action='' method='POST' >
    <label for='bname'>Book Name</label>
    <input type='text' id='bname' name='bookName' placeholder='Book Name' value='{$roww['bkName']}' >

    <label for='aname'>Author Name</label>
    <input type='text' id='aname' name='authorName' placeholder='Type Author name..' value='{$roww['bkAuthor']}'>




    <label for='email'>Email</label>
     echo <input type='text' id='email' name='email' value='{$_SESSION['login_user']}'>

    <label for='bookcategory'>Book Category</label>
    <select id='bookcategory' name='bookcategory' value='{$roww['bkCat']}'>
      <option value='novel'>Novel</option>
      <option value='shortstory'>Short Story</option>
      <option value='magazine'>magazine</option>
    </select>

    <label for='booktype'>Book Type</label>
    <select id='booktype' name='booktype' value='{$roww['bkType']}'>
      <option value='romantic'>Romantic</option>
      <option value='adventure'>Adventure</option>
      <option value='Religious'>Religious</option>
      <option value='Religious'>Psychology</option>
      <option value='Religious'>Mystery</option>
      <option value='Religious'>Satire</option>
      <option value='Religious'>Horror</option>
    </select>

    
    <br>
    <label for='review'>Review</label>
    <input type='text' id='review' name='review' placeholder='Type Your Review..' value='{$roww['bkReview']}'>

    <input type='submit' name='submit' value='Submit'>

  </form>"
  ?>
  </div>
  </div>

 
  <div id="footer">
	<div id="copyright"> www.uocreadersclan.org | 2017 | All Right Reserved</div>
  </div>
  
</div>


 <?php


include ('dblog.php');
if(isset($_POST["submit"])){

$aa = $_GET['link'];

$bkName = $_POST['bookName'];
$bkAuthor = $_POST["authorName"];
$bkCat = $_POST["bookcategory"];
$bkType = $_POST["booktype"];
$bkReview = $_POST["review"];
$email = $_POST["email"];

// image insertion
// $bkImage=$_FILES['bookImage']['name'];
// $bkImage_tmp=$_FILES['bookImage']['tmp_name'];

// move_uploaded_file($bkImage_tmp,"bookImages/$bkImage");




// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

// $sql = "INSERT INTO books (bkName, bkAuthor, bkCat, bkType,cbkReview, email)
// VALUES ('$bkName','$bkAuthor', '$bkCat', '$bkType','$bkReview', '$email')";

$sql = "UPDATE books SET bkName='$bkName', bkAuthor='$bkAuthor', bkCat='$bkCat',bkType='$bkType', bkReview='$bkReview', email='$email'  WHERE bkID = '$aa' ";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  echo "<script type= 'text/javascript'>alert('Book record successfully updated');</script>";
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

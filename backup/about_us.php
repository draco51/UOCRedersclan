<!doctype html>
<?php
   include('session.php');
   include('dblog.php');
?>
<html>

<head>
<meta charset="utf-8">
<title>UOC Reader's Clan | Home</title>
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/home.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="wrapper">

  <div id="header_wrapper">
    <div id="logo">UOC Reader's Clan</div>
    <img src="img/uoclogo.png" width="66" height="69" alt=""/>
  </div>
  
  <div id="nav_bar">
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="addbook.php">Add Books</a></li>
      <li><a href="about_us.php">About Us</a></li>
      <li><a href="#">FAQ </a></li>
      <li><a href="edit.php">Edit </a></li>
      
      
    </ul>
    <p>logged in as   <?php echo "{$_SESSION['fname']}  <a href = 'logout.php'>Logout</a> "   ?> <P>
  </div>

  <div id="content_wrapper">

  </div>
    
  <div id="footer">
  <div id="copyright"> www.uocreadersclan.org | 2017 | All Right Reserved</div>
  </div>
  
</div>
</body>

</html>

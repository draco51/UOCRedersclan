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
      <li><a href="home.php">Home</a></li>
      <li><a href="addbook.php">Add Books</a></li>
      <li><a href="about_us.php">About Us</a></li>
      <li><a href="#">FAQ </a></li>
      
      <li><a href="edit.php">Edit </a></li>
    </ul>
    <p>logged in as   <?php echo "{$_SESSION['fname']}  <a href = 'logout.php'>Logout</a> "   ?> <P>

  </div>

  <div id="content_wrapper">

<?php
  if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//$result = mysqli_query($conn,"SELECT * FROM books");

$result1 = mysqli_query($conn,"SELECT * FROM books");

while($row = mysqli_fetch_array($result1))
{
  $result2 = mysqli_query($conn,"SELECT fname,fbLink FROM users WHERE email = '{$row['email']}' ");
  $row2 = mysqli_fetch_array($result2);
echo "<div class='book_add'> ";
echo "<table width='200' height='250' cellpadding='5' cellspacing='0'>";
  echo"<tbody>";
    echo"<tr>";
      echo"<td align='center' height='15'>{$row['bkName']}</td>";
    echo"</tr>";
    echo"<tr>";
      echo"<td align='center' height='15'>By : {$row['bkAuthor']}</td>";
    echo"</tr>";
    echo"<tr>";
      echo"<td align='center' height='80'><img src='img/bookcover.png' width='80' height='120' alt=''/></td>";
    echo"</tr>";
    echo"<tr>";
      echo"<td align='center' height='10'>Owner: <a href='{$row2['fbLink']}'>{$row2['fname']}</a></td>";;
    echo"</tr>";
    echo"<tr>";
    
      echo "<form action='' method='POST'>";
      echo " <input type='hidden' name='id' value = '{$row['bkID']}' >";

      echo "<input type='submit' name ='del' value='Delete'>";
      
      echo "</form>";
    echo"</tr>";
    

//echo "{$row['bkAuthor']}";
  echo"</tbody>";
echo"</table>";
echo "</div>";


}
//mysqli_close($conn);
?>


<?php
if(isset($_POST['del'])) {
//$id = $_POST['id'];
$id = $_POST['id'];
$delete = mysqli_query($conn,"DELETE FROM books WHERE bkID = '$id' ");
}
?>




  </div>
    
  <div id="footer">
  <div id="copyright"> www.uocreadersclan.org | 2017 | All Right Reserved</div>
  </div>
  
</div>
</body>

</html>

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


<!-- search bar -->
    <form action="" method="post">
<input type="text" id="search" name="search" placeholder="enter seach keywords..." size="30" maxlength="30">
<input type="submit" id="search_btn" value="Search" name="submit">
</form>
</body>
<?php
include('dblog.php');
//$select_query="SELECT * FROM keyword";
//$result=mysqli_query($dbcon,$select_query);

if(isset($_POST['submit'])){
  $input_keywords=$_POST['search'];
  $keyword_array=explode(" " , $input_keywords);

  foreach($keyword_array as $keyword1){
    $keyword1=mysqli_real_escape_string($conn,trim($keyword1));
    $search_query= "SELECT * FROM books WHERE keyword LIKE '%$keyword1%'";
    $result=mysqli_query($conn,$search_query);
    $row2=mysqli_fetch_assoc($result);
    echo "{$row2['bkName']}";
    
  }
  
}

?>


<!-- logo image -->
  	<img src="img/uoclogo.png" width="66" height="69" alt=""/>
  </div>
  
  <div id="nav_bar">
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="addbook.php">Add Books</a></li>
      <li><a href="about_us.php">About Us</a></li>
      <li><a href="#">FAQ </a></li>
      <li><a href="edit.php">Edit </a></li>

      <?php
      if($_SESSION['login_user'] == 'admin@gmail.com'){

      echo "<li><a href='registration.php'>Register Users</a></li>";}
      ?>

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



//$result = mysqli_query($conn,"SELECT books.*, users.* FROM books,users WHERE books.email=users.email");
 

//Show sections of books

while($row = mysqli_fetch_array($result1))
{
  $result2 = mysqli_query($conn,"SELECT fname,fbLink FROM users WHERE email = '{$row['email']}' ");
  $row2 = mysqli_fetch_array($result2);
  
echo "<div class='book_add'> ";
echo "<table width='200' height='250' cellpadding='5' cellspacing='0'>";
  echo"<tbody>";
    echo"<tr>";
      echo"<td align='center' height='15'> <b>{$row['bkName']} </b></td>";
    echo"</tr>";
    echo"<tr>";
      echo"<td align='center' height='15'>By : {$row['bkAuthor']}</td>";
    echo"</tr>";
    echo"<tr>";

      echo"<td align='center' height='155'>
      <a class='tooltip' href=''>
      <img src='bookImages/{$row['bkImage']}' width='95' height='145' alt='No image'/>
      <span class='classic'>{$row['bkReview']}</span></a> 
      </td>";

    echo"</tr>";
    echo"<tr>";
      echo"<td align='center' height='15'>Owner: <a href='{$row2['fbLink']}'>{$row2['fname']}</a></td>";
    echo"</tr>";

    //Only admin users can see
    if($_SESSION['login_user'] == 'admin@gmail.com'){
          echo"<tr>";
            echo "<form action='' method='POST'>";
            echo " <input type='hidden' name='id' value = '{$row['bkID']}' >";
            echo "<td align='center'><input type='submit' class = 'button' name ='del' value='Delete'></td>";
            echo "</form>";
          echo"</tr>";
        }

  echo"</tbody>";
echo"</table>";
echo "</div>";

}

?>
  <div class="book_add"><bb href="#">See More..</b></div>
  
 
  </div>


<!-- Delete books -->
<?php
if(isset($_POST['del'])) {
//$id = $_POST['id'];
$id = $_POST['id'];
$delete = mysqli_query($conn,"DELETE FROM books WHERE bkID = '$id' ");
}

?>



  <div id="footer">
	<div id="copyright"> www.uocreadersclan.org | 2017 | All Right Reserved</div>
  </div>
  
</div>
</body>

</html>

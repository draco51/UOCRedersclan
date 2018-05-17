<html>

<head>
<meta charset="utf-8">
<title> UOC Reader's Clan | Home</title>
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/index.css" rel="stylesheet" type="text/css">
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
      <li><a href="#">All Books</a></li>
      <li><a href="#">About Us</a></li>
      <li><a href="#">FAQ </a></li>
    </ul>
	</div>
  
  <div id="content_wrapper">
    
    <form action = "login.php" method="post">
    <table width="300" cellpadding="10">
  <tbody>
    <tr>
      <td><label for="email">Email:</label></td>
      <td><input type="email" name="stu_email" id="email" required="required" placeholder="john123@gmail.com"/></td>
    </tr>
    <tr>
      <td><label for="password">Password:</label></td>
      <td><input type="password" name="stu_pw" id="password" required="required" placeholder="Enter Your Password"/></td>
    </tr>
    <tr>
      <td colspan="2"><a href="registration.php">Register Now</a>        
        <input type="submit" value="Login" name="submit"/>
      </td>
    </tr>
  </tbody>
</table>
</form>

  </div>

  <div id="footer">
	<div id="copyright"> www.uocreadersclan.org | 2017 | All Right Reserved</div>
  </div>
</div>
</body>

</html>

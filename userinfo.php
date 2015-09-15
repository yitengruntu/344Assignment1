<html>
<head>
<title>New Star Public School Online Shop System</title>
<style>

	.infoform{
		line-height:20px;
		background-color:#F8F8F8;
		height:600px;
		width:500px;
		float:centre;
		margin: 12px;
		padding:1px 25px 10px 25px;
		opacity: 0.9;
	}
</style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="jquery/jquery-1.11.3.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<img src="logo.jpg" style="float:left;width:180px;height:100px;">
<p align="right"><br>COMP344 Assignment 1 2015<br>
Song Zhang<br>
43121241<br><br>
</p>
<nav class="navbar navbar-default">
    <div>
      <ul class="nav navbar-nav">
	  <li class="active"><a href="homepage.php">Home</a></li>
	  <?php
	  session_start();
	  if(isset($_SESSION['username']) && isset($_SESSION['CHECK'])){           
		echo '<li class="dropdown">';
		echo '<a class="dropdown-toggle" data-toggle="dropdown" href="#">Product <span class="caret"></span></a>';
		echo '<ul class="dropdown-menu">';
		echo '<li><a href="allitem.php">All</a></li>';
		echo '<li><a href="lunch.php">Lunch</a></li>';
		echo '<li><a href="uniform.php">Uniform</a></li></ul></li></ul>';
		echo '<ul class="nav navbar-nav navbar-right">';
		echo '<li><a> Welcome, '.$_SESSION['username'].'.</a></li>';
		echo '<li><a href="userinfo.php"><span class="glyphicon glyphicon-user"></span> User Information</a></li>';
		echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>';
		echo '<li><a> </a></li>';
	  }
	  ?>
      </ul>
    </div>
</nav>
<div class="container">
<div class="infoform">
<h3>User Information:</h3>
<?php 

	include("dbconnect.php"); 

	$usercon=$conn;
	$username=$_SESSION['username'];
	

    $logincheck = oci_parse($usercon, "select * from USERS where username='$username'");

	oci_execute($logincheck); 
	while ($row = oci_fetch_array($logincheck))
	{
		echo "<b>Username:</b><br>".$row['USERNAME'];
		echo "<br><br><b>Full name:</b><br>".$row['FULLNAME'];
		echo "<br><br><b>Address:</b><br>".$row['STREETNUMBER']." ".$row['STREETNAME'];
		echo "<br>".$row['SUBURBCITY']." ".$row['STATE']." ".$row['POSTCODE'];
		echo "<br><br><b>Email:</b><br>".$row['EMAIL'];
		echo "<br><br><b>Student's name:</b><br>".$row['STUDENTNAME'];
		echo "<br><br><b>Class:</b><br>".$row['CLASS'];
		echo "<br><br><b>Credit Card Number:</b><br>".$row['CREDITCARDNO'];
		echo "<br><br><b>Expiry Date:</b><br>".$row['EXPIRYDATEMONTH']."/".$row['EXPIRYDATEYEAR'];
	}
	$homepagelink="'homepage.php'";
	echo '<br><br><button type="button" onclick="window.location.href='.$homepagelink.'">HomePage</button>'; 
	oci_free_statement($logincheck);
	oci_close($usercon);
?>
</div>
</div>
</body>
</html>






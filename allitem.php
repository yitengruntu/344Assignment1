<html>
<head>
<style>
	.texts {
		background-color:#FFFFFF;	
		width:220px;		
		margin:12px;
		padding:20px;
		float:left;

	}
</style>
  <title>New Star Public School Online Shop System</title>
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
		echo '<li><a href="uniform.php">Uniform</a></li></ul>';
		echo '</li></ul>';
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

<?php
include("dbconnect.php"); 


	$itemcon=$conn;

    $itempick = oci_parse($itemcon, "select * from PRODUCT");

	oci_execute($itempick); 
	if(isset($_SESSION['username']) && isset($_SESSION['CHECK'])){ 
	while ($row = oci_fetch_array($itempick))
	{
		echo '<div class="texts">';
		if($row['CATEGORY']=='LUNCH')
		echo '<img src="image/'.$row['PICTURE'].'" style="width:180px;height:100px;">';
		else echo '<img src="image/'.$row['PICTURE'].'" style="width:100px;height:100px;">';
		echo '<br>'.$row['PRODUCTNAME'].'<br>';
		echo 'Price: '.$row['PRODUCTPRICE'];
		echo '</div>';
	}
	}else{
		echo 'Without login, product information cannot be displayed. Please click "Home" to log in.';
	}
	oci_free_statement($itempick);
	oci_close($itemcon);

?>

</div>

</body>

</html>


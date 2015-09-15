<html>
<head>
<style>

	.login{
		line-height:20px;
		background-color:#F8F8F8;
		height:220px;
		width:220px;
		float:right;
		margin: 12px;
		padding:1px 25px 10px 25px;
		opacity: 0.9;
	}
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

<?php
$registerlink="'registration.html'";
$userinfolink="'userinfo.php'";


if(!isset($_SESSION['username'])){
	echo '<div class="login">';
	echo '<h3>LOGIN</h3>';
	echo '<form method="post" action="login.php" style="float:right">';
	echo 'Username:<br>';
	echo '<input type="text" name="username"><br>';
	echo 'Password:<br>';
	echo '<input type="password" name="password"><br><br>';
	echo '<center><input type="submit" value="Login">';
	echo '<button type="button" onclick="window.location.href='.$registerlink.'">Register</button>'; 
	echo '</center></form></div> ';	
}else if(!isset($_SESSION['CHECK'])){
	echo '<div class="login">';
	echo '<h3>LOGIN</h3>';
	echo '<form method="post" action="login.php" style="float:right">';
	echo 'Username:<br>';
	echo '<input type="text" name="username"><br>';
	echo 'Password:<br>';
	echo '<input type="password" name="password"><br>';
	echo '<font color="red">Invaild LOGIN Information</font><br>';
	echo '<center><input type="submit" value="Login">';
	echo '<button type="button" onclick="window.location.href='.$registerlink.'">Register</button>'; 
	echo '</center></form></div> ';	
}
?>
<?php
include("dbconnect.php"); 


	$itemcon=$conn;
	$itemid1=rand(1,10);	
	$itemid2=rand(1,10);
	while($itemid2==$itemid1)
		$itemid2=rand(1,10);
	$itemid3=rand(1,10);
	while($itemid3==$itemid1||$itemid3==$itemid2)
		$itemid3=rand(1,10);

    $itempick = oci_parse($itemcon, "select * from PRODUCT where PRODUCTID='$itemid1' or PRODUCTID='$itemid2' or PRODUCTID='$itemid3'");

	oci_execute($itempick); 
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

	oci_free_statement($itempick);
	oci_close($itemcon);

?>

</div>

</body>

</html>


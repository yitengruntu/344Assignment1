<?php 

	include("dbconnect.php"); 
	session_start();

	$usercon=$conn;
	$username=$_POST["username"];
	$password=$_POST["password"];
	

    $logincheck = oci_parse($usercon, "select password from USERS where username='$username'");

	oci_execute($logincheck); 
	while ($row = oci_fetch_array($logincheck))
	{
		if($password==$row['PASSWORD']){
			$_SESSION['username']=$username;
			$_SESSION['CHECK']=1;
		}else{
			$_SESSION['username']="1";
		}
	}
	if(!isset($_SESSION['CHECK']))
		$_SESSION['username']="1";
	header('Location: homepage.php');
	oci_free_statement($logincheck);
	oci_close($usercon);



?>







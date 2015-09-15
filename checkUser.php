<?php 

	include("dbconnect.php"); 


	$usercon=$conn;
	$username=$_GET["username"];

    $usercheck = oci_parse($usercon, "select * from USERS where username='$username'");

	oci_execute($usercheck); 
	$response="";
	while ($row = oci_fetch_array($usercheck))
	{
		$response="The username has existed.";
		echo $response;
	}
	

	oci_free_statement($usercheck);
	oci_close($usercon);



?>







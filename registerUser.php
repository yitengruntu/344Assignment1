<?php 

include("dbconnect.php"); 


$username=$_POST["username"];
$password=$_POST["password"];
$fullname=$_POST["fullname"];
$streetno=$_POST["streetno"];
$streetname=$_POST["streetname"];
$state=$_POST["state"];
$suburbcity=$_POST["suburbcity"];
$postcode=$_POST["postcode"];
$email=$_POST["email"];
$studentname=$_POST["studentname"];
$classname=$_POST["classname"];
$creditcardno=$_POST["creditcardno"];
$expirydatemonth=$_POST["purchase_creditCardExpirationMonth"];
$expirydateyear=$_POST["purchase_creditCardExpirationYear"];

  $personcon=$conn;
  
  
  $bbsSQL = "INSERT INTO USERS (USERNAME, PASSWORD, FULLNAME, STREETNUMBER, STREETNAME, STATE, SUBURBCITY, POSTCODE, EMAIL, STUDENTNAME, CLASS, CREDITCARDNO, EXPIRYDATEMONTH,EXPIRYDATEYEAR) VALUES ('$username', '$password', '$fullname', '$streetno', '$streetname', '$state', '$suburbcity', '$postcode', '$email', '$studentname', '$classname', '$creditcardno', '$expirydatemonth', '$expirydateyear')"; 
  

  $personinfo=oci_parse($personcon,$bbsSQL); 
  oci_execute($personinfo); 


  oci_free_statement($personinfo);
  oci_close($personcon);
  function spamcheck($field)
{
  //filter_var() sanitizes the e-mail
  //address using FILTER_SANITIZE_EMAIL
  $field = filter_var($field, FILTER_SANITIZE_EMAIL);

  //filter_var() validates the e-mail
  //address using FILTER_VALIDATE_EMAIL
  if(filter_var($field, FILTER_VALIDATE_EMAIL))
    return TRUE;
  else
    return FALSE;
}

$from = "song.zhang1@students.mq.edu.au";

$subject = "Registration Notification";
$message = "You have successfully registered. Thank you.";
$headers = "From: " . $from;

$mailcheck = spamcheck($email);
if ($mailcheck == FALSE)
  echo "Invalid receiver's email address.";
else if (spamcheck($from) == FALSE)
  echo "Invalid sender's email address.";
else
{
  mail($email, $subject, $message, $headers);
  echo "<p>Hi, $username</p>";
  echo "<p>The email has been sent to $email</p>";
  echo "<p>Thank you for registration</p>";
}
header('Location: homepage.php');  

  
 



?>







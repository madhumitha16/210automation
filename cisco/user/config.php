<?php

if($_SERVER['HTTP_HOST']=='localhost')
{
$base = 'cisco';
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	
	
}
else
{
$base = 'batechnol_cisco';
	$host = 'localhost';
	$user = 'batechnol_cisco';
	$pass = 'T?awz@d^6Y2)';
	
}

$conn = mysqli_connect($host,$user,$pass,$base);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
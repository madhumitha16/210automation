<?php
  include('../config.php');
  
  // Approve Users

if(isset($_POST['addnewusername'])) {
	$uname = $_POST['addnewusername'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$pass = md5($_POST['password']);
	
	$qryins = mysqli_query($conn, "Insert into user (uname, lastname, email, password, status) values('".$uname."', '".$lastname."','".$email."', '".$pass."','notactive')");
	if($qryins){
	echo "<div class='alert alert-success alert-dismissible' role='alert'>
                          <button class='close' type='button' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><i class='alert-ico fa fa-fw fa-check'></i><strong>Success!&thinsp;</strong>Your details are submitted successfully. Your account will be activated soon.</div>";
	} else {
	echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                          <button class='close' type='button' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><i class='alert-ico fa fa-fw fa-check'></i><strong>Oops!&thinsp;</strong>Your details is not submitted. Please try some other time.</div>";
}
}


	include('../footer.php');
	
?>
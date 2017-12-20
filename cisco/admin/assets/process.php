<?php
  include('../config.php');
  
  // Approve Users

if(isset($_POST['accid'])) {
	$id = $_POST['accid'];
	$uname = $_POST['username'];
	$email = $_POST['email'];
	$qryacc = mysqli_query($conn, "UPDATE user Set status = 'active' where uname = '$uname' and id = '$id'");
  if($qryacc) {
		$to = $email;
		$subject = 'Cisco Account Activated';
		$from = 'batech@sbprint.in';
 
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
		// Create email headers
		$headers .= 'From: '.$from."\r\n".
   		 'Reply-To: '.$from."\r\n" .
   		 'X-Mailer: PHP/' . phpversion();
 
		// Compose a simple HTML email message
		$message = '<html><body>';
		$message .= '<h1 style="color:#ab47bc;">Hi ' . $uname . '!</h1>';
		$message .= '<h3 style="color:#000;">Username: ' . $uname . '</h3>';
		$message .= '<p style="color:#080;font-size:18px;">Your Account is Activated Now. Please Login and Enjoy...</p>';
		$message .= '</body></html>';
 
		// Sending email
		mail($to, $subject, $message, $headers);
		echo "Account Activated Successfully";
	}
	else {
		echo "Something went wrong";
	}
}
  //Deactivate User
  if(isset($_POST['rejid'])) {
	$id = $_POST['rejid'];

	$qrydel = mysqli_query($conn, "UPDATE user Set status = 'deactive' where id = '$id'");
		
	if($qrydel) {
		echo "Account Deactivated Successfully";
	}
	else {
		echo "Something went wrong";
	}
}
  
  ?>
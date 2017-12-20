<?php session_start(); 
include('config.php'); 
ob_start(); 
if(isset($_SESSION['uname']) != '') {
	header('Location: profile.php');
	exit;
} 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 

<!-- Mirrored from webthemez.com/demo/target-free-responsive-bootstrap-admin-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Nov 2017 06:25:26 GMT -->
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from demo.adminbootstrap.com/just/1.0.0/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Dec 2017 06:08:04 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <title>White Dove Protien - App Admin</title>
    <link rel="icon" type="image/png" href="img/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="img/apple-touch-favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet" type="text/css">
    <link href="libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="libs/font-awesome/css/font-awesome.min.css" rel="stylesheet"><!-- Common Libs CSS -->
    <link href="css/libs.common.min.css" rel="stylesheet"><!-- Page Libs CSS -->
    <link href="libs/datatables/css/dataTables.bootstrap.css" rel="stylesheet"><!-- Just Bootstrap Theme -->
    <link href="css/just.css" rel="stylesheet"><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  
  <script type="text/javascript">	
		function popup()
		{
			document.getElementById('more_info').style.display='block';
		}
		function close_more_info()
		{
			document.getElementById('more_info').style.display='none';
		}
		</script>
		<script type="text/javascript">
		function val_forgot()
		{
			if(document.forgot.email.value=="Email...")
			{
				alert("Email Address is missing...");
				document.forgot.email.focus();
				return false;
			}
			var str=document.forgot.email.value;
			var filter = /^([a-zA-Z0-9\.])+\@(([a-zA-Z0-9])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if (!filter.test(str))
			{	
				alert("Enter a valid email address!")
				document.forgot.email.focus();
				return false;	
			}	
		}
		function val_login()
		{
			if(document.login.email.value=="Email...")
			{
				alert("Email Address is missing...");
				document.login.email.focus();
				return false;
			}
			var str=document.login.email.value;
			var filter = /^([a-zA-Z0-9\.])+\@(([a-zA-Z0-9])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if (!filter.test(str))
			{	
				alert("Enter a valid email address!")
				document.login.email.focus();
				return false;	
			}
			if(document.login.pass.value=="Password")
			{
				alert("Password is missing...");
				document.login.pass.focus();
				return false;
			}		
		}
		</script>
  
</head>

  <body class="sidebar-collapsible sidebar-open">
    <div class="st-wrapper">
		<div class="container-fluid">
            <div class="row">
			<div class="login-logo">
							<h3><b>Cisco</b> Admin</h3>
						</div>
                <div class="st-panel">
                  <div class="st-panel__cont">
					<div class="col-lg-12">
						
						<!-- /.login-logo -->
						<div class="login-box-body">
						<p class="login-box-msg">Sign in to start your session</p>
<?php
	if(isset($_SESSION['response'])) {
		echo "<div class='alert alert-danger alert-dismissible'>".$_SESSION['response']."</div>";
		unset($_SESSION['response']);
	}
	?>
    <form method="post" name="login">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" id="username" value="Username..." onFocus="if(this.value=='Username...'){value=''}" onBlur="if(this.value==''){value='Username...'}">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="pass" id="loginPass" value="Password" onFocus="if(this.value=='Password'){value=''}" onBlur="if(this.value==''){value='Password'}">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" value="Sign In" name="login" class="btn btn-primary btn-block btn-flat">
        </div>
		<div class="col-xs-4">
				  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                I Forget My Password
              </button>
		</div>
        <!-- /.col -->
      </div>
    </form>

     <br>

  </div>
		<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Forget Password</h4>
              </div>
              <div class="modal-body">
                <div style="margin-top:10px; height:auto;" id="info_div" >
                <form method="post" name="forgot" onSubmit="return val_forgot()">
				<input type="text" class="form-control" name="email" id="loginEmail" value="Email..." onFocus="if(this.value=='Email...'){value=''}" onBlur="if(this.value==''){value='Email...'}">	
                <br>
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> &nbsp;&nbsp;
                <input type="submit" class="btn btn-primary" value="Send Password" name="forgot">	
                </form>
            </div>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?php
		if(isset($_POST['login']))
		{
			$username	=	$_POST['username'];
			$pass	=	$_POST['pass'];
			$pass	=	md5($_POST['pass']);
			
			$sql	=	mysqli_query($conn, "select * from admin where uname='$username' and password='$pass'");
			$check	=	mysqli_num_rows($sql);
			
			while($row = mysqli_fetch_array($sql))
				{	
					$email = $row['email'];
					$uname = $row['uname'];
					$pwd = $row['password'];
					$adminid = $row['id'];
				}
			if($check==0)
			{
				$_SESSION['response'] = "Wrong Credentials";
			}
			else
			{
				$_SESSION['email']	=	$email;
				$_SESSION['uname']	= $uname;
				$_SESSION['pwd']	= $pwd;
				$_SESSION['adminid']	= $adminid;
				header('location: profile.php');
			}
		}
		if(isset($_POST['forgot']))
		{
			$email	=	$_POST['email'];
			
			$sql_forget	=	mysqli_query($conn, "select * from admin where email='$email' and status=0");
			$check	=	mysqli_num_rows($sql_forget);
			if($check==0)
			{
				echo "<div class='msg'>Sorry! Not available...</div>";
			}
			else
			{			
				$data	=	mysqli_fetch_array($sql_forget);
				
				$email	=	$data['email'];
				$pass	=	$data['password'];
				
				$to		  =	"sakthisnet@gmail.com";
				$subject  = 'Email/Password';
				$headers  = "From: Tradersindia... \r\n";
				$headers .= "CC: \r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				$message  = '<html><body>';
				$message .= '<h2 align="center">Forgot Email/Pass...</h2>';
				$message .= '<table rules="all" cellpadding="10" border="0" align="center">';
				$message .= "<tr><td><strong>Email </strong> </td><td>" . $email . "</td></tr>";
				$message .= "<tr><td><strong>Password </strong> </td><td>" . $pass . "</td></tr>";
				$message .= "</table>";
				$message .= "</body></html>";
				#echo $message;
				
				//mail starts here 
				$mail	  =	@mail($to, $subject, $message, $headers);
				if($mail)
				{
					header("location: index.php");
				}
			}
		}
		?>
<!-- jQuery 3 <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>-->
		
			</div>
			</div>
			</div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/libs.common.min.js"></script><!-- Common App Modules -->
    <!-- jQuery Js -->

 <style>
 body {
    font-family: 'Open Sans', sans-serif;
    background: #d3d4d6;
}
.st-panel {
    width: 47%;
    margin: auto;
}
.st-panel .st-panel__cont {
    background: #fff;
    float: left;
    width: 100%;
    padding: 5%;
}
.login-logo {
    text-align: center;
    margin-top: 10%;
}
form input {
    width: 100% !important;
}
form input.btn.btn-primary {
    width: 100% !important;
}
footer {
    text-align: center;
    width: 100%;
    margin-top: 10%;
    float: left;
}
.login-box .login-logo a {
    font-size: 22px;
    text-decoration: none;
    color: #505254;
}
 </style>
<footer><p>All right reserved. Developed by: <a href="http://batechnology.org/">batechnology.org</a></p>
				
        
				</footer>
</body>

</html>

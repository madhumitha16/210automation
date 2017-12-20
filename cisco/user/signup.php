<?php session_start(); 
include('config.php'); 
ob_start(); 
if(isset($_SESSION['username']) != '') {
	header('Location: profile.php');
	exit;
} 
?>

<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from demo.adminbootstrap.com/just/1.0.0/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Dec 2017 06:08:04 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <title>Cisco - User</title>
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
    
</head>

  <body class="sidebar-collapsible sidebar-open">
    <div class="st-wrapper">
		<div class="container-fluid">
            <div class="row">
			<div class="login-logo">
							<h3><b>Cisco</b> User Signup</h3>
						</div>
                <div class="st-panel">
                  <div class="st-panel__cont">
					<div class="col-lg-12">
						
						<!-- /.login-logo -->
						<div class="login-box-body">
						<p class="login-box-msg">Sign up to start your session</p>
			<div id="respon"></div>
		<form method="post" name="signup">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" id="username" placeholder="User Name">
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
      </div>
	  <div class="form-group has-feedback">
        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number">
      </div>
	  <div class="form-group has-feedback">
        <input type="password" class="form-control" name="pass" id="password" placeholder="Password">
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" value="Sign Up" name="signup" class="btn btn-primary btn-block btn-flat adduser">
        </div>
		<div class="col-xs-4">
				  <a href="index.php" class="btn btn-default">
                Already User
              </a>
		</div>
        <!-- /.col -->
      </div>
    </form>

     <br>

  </div>

  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<!-- jQuery 3 -->
		
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
<footer>
	<p>All right reserved. Developed by: <a href="http://batechnology.org/">batechnology.org</a></p>
</footer>
<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
			<script>
	$(document).on('click', 'input.adduser', function(e) {
		e.preventDefault();
		var username = $(this).closest('form').find('#username').val();
		var email = $(this).closest('form').find('#email').val();
		var phone = $(this).closest('form').find('#phone').val();
		var password = $(this).closest('form').find('#password').val();
		if (username == '') {
			alert("Username is Required...");
			return false
		} else if (email == '') {
			alert("Email is Required...");
			return false
		} else if (phone == '') {
			alert("Phone Number is Required...");
			return false
		} else if (password == '') {
			alert("password is Required...");
			return false
		} else {
		$.ajax({
			url : 'assets/process.php',
			type : "POST",
			async :true,
			data : { 'addnewusername' :username , 'email' :email , 'phone' :phone, 'password' : password },
			success : function(re) {
				$("#respon").html(re);
			}
		});
		}
	});
	</script>
</body>

</html>

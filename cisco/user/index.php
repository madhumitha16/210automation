<?php session_start(); 
include('config.php'); 
ob_start(); 
if(isset($_SESSION['username']) != '') {
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
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/style1.css">
  
</head>

  <body class="sidebar-collapsible sidebar-open">
      <a href="index.php">
	<img src="images/logo.png" alt="logo" class="logo" data-wow-delay="0.5s">
	</a>
      <div class="form">
	  <div id="respon"></div>
	  <?php
	if(isset($_SESSION['response'])) {
		echo "<div class='alert alert-danger alert-dismissible'>".$_SESSION['response']."</div>";
		unset($_SESSION['response']);
	}
	?>
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
         
          <form method="post" name="signup">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" name="username" id="username" placeholder="First Name" required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text" name="lastname" id="lastname" placeholder="Last Name" required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="email" id="email" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password" name="pass" id="password" required autocomplete="off"/>
          </div>
          
          <input type="submit" value="Get Started" name="signup" type="submit" class="button button-block adduser"/>
          
          </form>

        </div>
        
        <div id="login">   
         
          <form method="post" name="login">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="email" id="email" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="pass" id="loginPass" required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="#" data-toggle="modal" data-target="#modal-default">Forgot Password?</a></p>
          
          <input type="submit" name="login" value="Login" class="button button-block"/>
          
          </form>

        </div>
        
      </div><!-- tab-content -->

      
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
                <form method="post" name="forgot" id="forget">
				<input type="text" class="form-control" name="email" id="loginEmail" value="Email..." onFocus="if(this.value=='Email...'){value=''}" onBlur="if(this.value==''){value='Email...'}">	
                <br>
				<div class="col-xs-4">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> &nbsp;&nbsp;
				</div>
				<div class="col-xs-4">
					<input type="submit" class="btn btn-primary" value="Send Password" name="forgot">
				</div>				
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
			$email	=	$_POST['email'];
			$pass	=	$_POST['pass'];
			$pass	=	md5($_POST['pass']);
			
			$sql	=	mysqli_query($conn, "select * from user where email='$email' and password='$pass'");
			$check	=	mysqli_num_rows($sql);
						
			if($check==0)
			{
				$_SESSION['response'] = "Wrong Credentials";
			}
			else if($check == 1)
			{
				$rows = mysqli_fetch_array($sql);
				$status = $rows['status'];
				if ($status == 'notactive') {
					$_SESSION['response'] = "Your Account is not activated.";
					header('Location: ../user/index.php');
					exit;
				} else if ($status == 'deactive') {
					$_SESSION['response'] = "Your Account is Deactivated.";
					header('Location: ../user/index.php');
					exit;
				} else if ($status == 'active'){
					$_SESSION['email']	= $rows['email'];
					$_SESSION['username']	= $rows['uname'];
					$_SESSION['password']	= $rows['password'];;
					$_SESSION['userid']	= $rows['id'];
					header('location: profile.php');
				}
			}
		}
		if(isset($_POST['forgot']))
		{
			$email	=	$_POST['email'];
			
			$sql_forget	=	mysqli_query($conn, "select * from user where email='$email' and status=0");
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
				
				$to		  =	$email;
				$subject  = 'Email/Password';
				$headers  = "From: Cisco... \r\n";
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

    <!-- JS Scripts-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/libs.common.min.js"></script><!-- Common App Modules -->
    <!-- jQuery Js -->
	  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/index.js"></script>
    <script>
	$(document).on('click', 'input.adduser', function(e) {
		e.preventDefault();
		var username = $(this).closest('form').find('#username').val();
		var lastname = $(this).closest('form').find('#lastname').val();
		var email = $(this).closest('form').find('#email').val();
		var password = $(this).closest('form').find('#password').val();
		if (username == '') {
			alert("First Name is Required...");
			return false
		} else if (email == '') {
			alert("Email is Required...");
			return false
		} else if (password == '') {
			alert("password is Required...");
			return false
		} else {
		$.ajax({
			url : 'assets/process.php',
			type : "POST",
			async :true,
			data : { 'addnewusername' :username , 'lastname': lastname, 'email' :email , 'password' : password },
			success : function(re) {
				$("#respon").html(re);
			}
		});
		}
	});
	</script>
 <style>
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
form#forget {
    float: left;
    width: 100%;
    padding: 4%;
}
.modal-content {
    float: left;
    width: 100%;
}
div#signinbtn {
    margin-bottom: 2%;
}
body {
    font-family: 'Open Sans', sans-serif;
    background: url(../user/images/bg-3.jpg) !important;
    font-family: 'Titillium Web', sans-serif;
}
 </style>
<footer><p>All right reserved. Developed by: <a href="http://batechnology.org/">batechnology.org</a></p>
				
        
				</footer>
</body>

</html>

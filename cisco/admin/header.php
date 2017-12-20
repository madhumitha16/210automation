<?php session_start(); 
include('config.php'); 
ob_start(); 
if(isset($_SESSION['uname']) == '') {
	header('Location: index.php');
	exit;
} 
?><!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from demo.adminbootstrap.com/just/1.0.0/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Dec 2017 06:08:04 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <title>Cisco - Admin</title>
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
     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="sidebar-collapsible sidebar-open">
    <div class="st-wrapper">
      <div class="st-sidebar">
        <div class="st-sidebar__header"><a class="st-sidebar__logo" href="">Cisco Admin</a>
          <div class="st-sidebar__mico st-sidebar__toggle"><i class="fa fa-bars"></i></div>
        </div>
        <div class="st-sidebar__cont">
          <div class="st-sidebar__scroll scrollbar">
            <div class="st-sidebar__nav">
              <ul>
                <li><a href="profile.php">
                    <div class="fluid-cols">
                      <div class="min-col"><i class="fa fa-star st-sidebar__ico"></i></div>
                      <div class="expand-col text-ellipsis"><span class="st-sidebar__title">Profile</span></div>
                    </div></a></li>
				<li><a href="changepass.php">
                    <div class="fluid-cols">
                      <div class="min-col"><i class="fa fa-star st-sidebar__ico"></i></div>
                      <div class="expand-col text-ellipsis"><span class="st-sidebar__title">Change Password</span></div>
                    </div></a></li>
                <li><a href="add_new_users.php">
                    <div class="fluid-cols">
                      <div class="min-col"><i class="fa fa-star st-sidebar__ico"></i></div>
                      <div class="expand-col text-ellipsis"><span class="st-sidebar__title">Add New Users</span></div>
                    </div></a>
                </li>
				<li><a href="manageuser.php">
                    <div class="fluid-cols">
                      <div class="min-col"><i class="fa fa-star st-sidebar__ico"></i></div>
                      <div class="expand-col text-ellipsis"><span class="st-sidebar__title">Manage Users</span></div>
                    </div></a>
                </li>
				<li><a href="filemanage.php">
                    <div class="fluid-cols">
                      <div class="min-col"><i class="fa fa-star st-sidebar__ico"></i></div>
                      <div class="expand-col text-ellipsis"><span class="st-sidebar__title">File Management</span></div>
                    </div></a></li>
              </ul>
            </div>
          </div>
          <div class="st-sidebar__popup"></div>
        </div>
      </div>
	  <div class="st-main">
	  <div class="st-header">
          <div class="fluid-cols">
            <div class="min-col">
              <div class="st-header__menu">
                <button class="btn st-sidebar__toggle"><i class="fa fa-bars"></i></button>
              </div>
            </div>
            <div class="expand-col text-ellipsis">
              <div class="st-header__title"><span>Welcome, <?php echo $_SESSION['uname']; ?></span>
              </div>
            </div>
            <div class="min-col">
              <ul class="st-header__actions text-nowrap">
                <li class="st-header__act st-header__user" data-toggle="popup" data-target="#user-popup"><i class="fa fa-user"></i>
                  <div class="st-popup st-userpopup" id="user-popup">
                    <div class="st-userpopup__cont">
                      
                      <ul class="st-userpopup__menu">
                       
                        <li data-toggle="popup" data-target="#user-popup" data-method="hide"><a href="profile.php">
                            <div class="fluid-cols">
                              <div class="expand-col text-ellipsis"><span>Profile</span></div>
                              <div class="min-col"><i class="fa fa-user"></i></div>
                            </div></a></li>
                        <li><a href="logout.php">
                            <div class="fluid-cols">
                              <div class="expand-col text-ellipsis"><span>Log Out</span></div>
                              <div class="min-col"><i class="fa fa-sign-out"></i></div>
                            </div></a></li>
                      </ul>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
		</div>
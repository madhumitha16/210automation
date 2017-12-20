<?php
  include('../config.php');

  //Admin details Update
     if(isset($_POST['adminname'])){
         $id = $_POST["id"];
         $email = $_POST["email"];
		$name = $_POST["adminname"];
		$phone = $_POST["phone"];
		
		$sqlup = mysqli_query($conn, "update admin set uname = '".$name."', email = '".$email."', phone = '".$phone."' where id = '".$id."'");
		if($sqlup){
                echo "<div class='alert alert-success alert-dismissible' role='alert'>
                          <button class='close' type='button' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><i class='alert-ico fa fa-fw fa-check'></i><strong>Success!&thinsp;</strong>Your data has been changed successfully.</div>";
			
		} else {
		    echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                          <button class='close' type='button' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><i class='alert-ico fa fa-fw fa-check'></i><strong>Oops!&thinsp;</strong>Your data has not been changed </div>";
				
		}
     }
     
     //admin password change
    if(isset($_POST['oldpassword'])){
         $id = $_POST["id"];
        $oldpassword = md5($_POST["oldpassword"]);
		$newpassword = md5($_POST["newpassword"]);
		$confpassword = md5($_POST["confpassword"]);
		
		$qry1 = mysqli_query($conn, "select password from admin where id = '".$id."'");
		$fet1 = mysqli_fetch_array($qry1);
		$oldrealpwd = $fet1['password'];
		
		if($newpassword == $confpassword) {
		if( $oldrealpwd == $oldpassword ) {
		$sqlpass = mysqli_query($conn, "update admin set password = '".$newpassword."' where id = '".$id."'");
		if($sqlpass){
                echo "<div class='alert alert-success alert-dismissible' role='alert'>
                          <button class='close' type='button' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><i class='alert-ico fa fa-fw fa-check'></i><strong>Success!&thinsp;</strong>Password has been changed successfully.</div>";
			
			} else {
		    echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                          <button class='close' type='button' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><i class='alert-ico fa fa-fw fa-check'></i><strong>Oops!&thinsp;</strong>Password has not been changed </div>";
				
			}
		} else {
		 echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                          <button class='close' type='button' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><i class='alert-ico fa fa-fw fa-check'></i><strong>Oops!&thinsp;</strong> Wrong Old password ..!</div>";
		}
		} else {
			echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                          <button class='close' type='button' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><i class='alert-ico fa fa-fw fa-check'></i><strong>Oops!&thinsp;</strong> New password and Confirm password should same..!</div>";
		}
	}
	
	  //Add New User details Update
     if(isset($_POST['addnewuname'])){
         $id = $_POST["id"];
         $email = $_POST["email"];
		$name = $_POST["addnewuname"];
		$phone = $_POST["phone"];
		$pass = md5($_POST["password"]);
		
		$sqladduser = mysqli_query($conn, "Insert into user (uname, email , phone, password) values('".$name."','".$email."','".$phone."','".$pass."')");
		if($sqladduser){
                echo "<div class='alert alert-success alert-dismissible' role='alert'>
                          <button class='close' type='button' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><i class='alert-ico fa fa-fw fa-check'></i><strong>Success!&thinsp;</strong>User data has been added successfully.</div>";
			
		} else {
		    echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                          <button class='close' type='button' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><i class='alert-ico fa fa-fw fa-check'></i><strong>Oops!&thinsp;</strong>User data has not been added </div>";
				
		}
     }
     
  //User details Update
     if(isset($_POST['username'])){
         $id = $_POST["id"];
         $email = $_POST["email"];
		$name = $_POST["username"];
		$phone = $_POST["phone"];
		
		$sqluser = mysqli_query($conn, "update user set uname = '".$name."', email = '".$email."', phone = '".$phone."' where id = '".$id."'");
		if($sqluser){
                echo "<div class='alert alert-success alert-dismissible' role='alert'>
                          <button class='close' type='button' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><i class='alert-ico fa fa-fw fa-check'></i><strong>Success!&thinsp;</strong>User data has been changed successfully.</div>";
			
		} else {
		    echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                          <button class='close' type='button' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><i class='alert-ico fa fa-fw fa-check'></i><strong>Oops!&thinsp;</strong>User data has not been changed </div>";
				
		}
     }
	 
	   //User Delete
     if(isset($_POST['userid'])){
         $userid = $_POST["userid"];
		
		$sqluser = mysqli_query($conn, "delete from user where id = '".$userid."'");
		if($sqluser){
                echo "<div class='alert alert-success alert-dismissible' role='alert'>
                          <button class='close' type='button' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><i class='alert-ico fa fa-fw fa-check'></i><strong>Success!&thinsp;</strong>User has been Deleted successfully.</div>";
			
		} else {
		    echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                          <button class='close' type='button' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><i class='alert-ico fa fa-fw fa-check'></i><strong>Oops!&thinsp;</strong>User has not been Deleted </div>";
				
		}
     }
	 
	  //User password change
    if(isset($_POST['newuserpassword'])){
         $id = $_POST["id"];
		$newuserpassword = md5($_POST["newuserpassword"]);
		$confpassword = md5($_POST["confpass"]);
		
		
		if($newuserpassword == $confpassword) {
		$sqlpass = mysqli_query($conn, "update user set password = '".$newuserpassword."' where id = '".$id."'");
		if($sqlpass){
                echo "<div class='alert alert-success alert-dismissible' role='alert'>
                          <button class='close' type='button' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><i class='alert-ico fa fa-fw fa-check'></i><strong>Success!&thinsp;</strong>Password has been changed successfully.</div>";
			
			} else {
		    echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                          <button class='close' type='button' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><i class='alert-ico fa fa-fw fa-check'></i><strong>Oops!&thinsp;</strong>Password has not been changed </div>";
				
			}
		} else {
		 echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                          <button class='close' type='button' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><i class='alert-ico fa fa-fw fa-check'></i><strong>Oops!&thinsp;</strong> New password and Confirm password should same..!</div>";
		}
	}
     
     include('../footer.php');
     
     ?>
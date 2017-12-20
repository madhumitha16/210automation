<?php include('header.php');?>
<div class="st-main">
<div class="st-crumbs">
          <div class="fluid-cols">
            <div class="expand-col text-ellipsis">
              <ul>
                <li><a href="">Home</a></li>
                <li><span>Add Users</span></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="st-content">
          <div class="container-fluid">
            <div class="row">
              <div class="st-panel st-panel--border">
					<div class="st-panel__cont">
						<div class="st-panel__header">
						<div class="fluid-cols">
							<div class="expand-col text-ellipsis">
							<span class="st-panel__title">
								<span>Add User</span>
							</span>
							</div>
						</div>
						</div>
						<?php 
                           if(isset($_GET['mode']) && $_GET['mode'] == 'edit'){
                        
                           $sql_ct = mysqli_query($conn,"SELECT * FROM user WHERE id ='".$_GET['uid']."' LIMIT 1");
                           if(mysqli_num_rows($sql_ct) == 0) {
                           header("location: user.php");
                           exit;
                           }
                           $rowct = mysqli_fetch_array($sql_ct);
						   $id = $rowct['id'];
						   $uname = $rowct['uname'];
						   $email = $rowct['email'];
						   $phone = $rowct['phone'];
                           
                           ?>
                           <div class="st-panel__content">
						    <div class="response" id="respon">
						
						</div>
						<div class="st-panel">
                  <div class="st-panel__cont">
                    <div class="st-panel__header">
                      <div class="fluid-cols">
                        <div class="expand-col text-ellipsis"><span class="st-panel__title"><span>Update User Details</span></span></div>
                      </div>
                    </div>
                    <div class="st-panel__content">
                      <div class="form" id="fish-update">
					  <form id="chicken" method="post" autocomplete="off">
					      <input class="form-control" type="hidden" name="id" id="id" value="<?php echo $id;?>">
						<div class="form-group">
                          <label class="control-label">Username</label>
                          <input class="form-control" type="text" name="uname" id="uname" value="<?php echo $uname;?>" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                          <label class="control-label">User Email</label>
                          <input class="form-control" type="email" name="email" id="email" value="<?php echo $email;?>" placeholder="Email" required>
                        </div>
						<div class="form-group">
                          <label class="control-label">User Phone</label>
                          <input class="form-control" type="text" name="phone" id="phone" value="<?php echo $phone;?>" placeholder="Phone" required>
                        </div>
                        <div class="form-group clearfix">
                          <div class="pull-right">
                            <input class="btn btn-default" type="reset" value="Cancel">
                            <input class="btn btn-info updateuser" name="updateuser" type="submit" value="Submit">
                          </div>
                        </div>
						</form>
                      </div>
                    </div>
                  </div>
                </div>
						</div>
						
						<?php } else if(isset($_GET['mode']) && $_GET['mode'] == 'editpass'){
                        
                           $sql_ct = mysqli_query($conn,"SELECT * FROM user WHERE id ='".$_GET['uid']."' LIMIT 1");
                           if(mysqli_num_rows($sql_ct) == 0) {
                           header("location: user.php");
                           exit;
                           }
                           $rowct = mysqli_fetch_array($sql_ct);
						   $id = $rowct['id'];
						   $uname = $rowct['uname'];
						   $email = $rowct['email'];
						   $phone = $rowct['phone'];
                           
                           ?>
                           <div class="st-panel__content">
						    <div class="response" id="respon">
						
						</div>
						<div class="st-panel">
                  <div class="st-panel__cont">
                    <div class="st-panel__header">
                      <div class="fluid-cols">
                        <div class="expand-col text-ellipsis"><span class="st-panel__title"><span>Update User Password</span></span></div>
                      </div>
                    </div>
                    <div class="st-panel__content">
                      <div class="form" id="fish-update">
					  <form id="userpass" method="post" autocomplete="off">
					      <input class="form-control" type="hidden" name="id" id="id" value="<?php echo $id;?>">
						<div class="form-group">
                          <label class="control-label">New Password</label>
                          <input class="form-control" type="text" name="newpass" id="newpass" value="" placeholder="*******" required>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Confirm Password</label>
                          <input class="form-control" type="text" name="confpass" id="confpass" value="" placeholder="*******" required>
                        </div>
                        <div class="form-group clearfix">
                          <div class="pull-right">
                            <input class="btn btn-default" type="reset" value="Cancel">
                            <input class="btn btn-info updateuserpass" name="updateuserpass" type="submit" value="Submit">
                          </div>
                        </div>
						</form>
                      </div>
                    </div>
                  </div>
                </div>
						</div>
						   <?php } else { ?>
						<div class="st-panel__content">
						    <div class="response">
						<?php
						if(isset($_SESSION['presponse'])) {
							echo "<div class='alert alert-success alert-dismissible' role='alert'>
                          <button class='close' type='button' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><i class='alert-ico fa fa-fw fa-check'></i><strong>Success!&thinsp;</strong>".$_SESSION['presponse'].
                        "</div>";
							unset($_SESSION['presponse']);
						} else if(isset($_SESSION['nresponse'])) {
							echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                          <button class='close' type='button' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><i class='alert-ico fa fa-fw fa-check'></i><strong>Oops!&thinsp;</strong>".$_SESSION['nresponse'].
                        "</div>";
							unset($_SESSION['nresponse']);
						}
						?>
						</div>
						<div class="st-panel">
                  <div class="st-panel__cont">
                    <div class="st-panel__header">
                      <div class="fluid-cols">
                        <div class="expand-col text-ellipsis"><span class="st-panel__title"><span>Add New User</span></span></div>
                      </div>
                    </div>
                    <div class="st-panel__content">
                      <div class="form" id="contact-form">
					  <form id="user" method="post">
						<div class="form-group">
                          <label class="control-label">User Name</label>
                          <input class="form-control" type="text" name="uname" id="uname" placeholder="Username">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Email</label>
                          <input class="form-control" type="email" name="email" id="email" placeholder="Email">
                        </div>
						<div class="form-group">
                          <label class="control-label">Phone</label>
                          <input class="form-control" type="text" name="phone" id="phone" placeholder="Phone">
                        </div>
						<div class="form-group">
                          <label class="control-label">Password</label>
                          <input class="form-control" type="password" name="pass" id="pass" placeholder="Password">
                        </div>
                        <div class="form-group clearfix">
                          <div class="pull-right">
                            <input class="btn btn-default" type="reset" value="Cancel">
                            <input class="btn btn-info adduser" type="submit" value="Submit">
                          </div>
                        </div>
						</form>
                      </div>
                    </div>
                  </div>
                </div>
						</div>
						<?php } ?>
					</div>
				</div>
              <!--Table-->
						<div class="st-panel">
                  <div class="st-panel__cont">
                    <div class="st-panel__header">
                      <div class="fluid-cols">
                        <div class="expand-col text-ellipsis"><span class="st-panel__title"><span>User</span><small>Details</small></span></div>
                        
                      </div>
                    </div>
                    <div class="st-panel__content">
                      <div class="table-responsive" style="margin-bottom: 0;">
                        <table id="example" class="table table-striped table-bordered" style="margin-bottom: 0;">
                          <thead>
                            <tr>
                              <th class="text-nowrap">ID</th>
                              <th class="text-nowrap">User Name</th>
                              <th class="">Email</th>
                              <th class="">Phone</th>
                              <th class="content-width">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php 
                                $sql_ch = mysqli_query($conn, "select * from user Order by id");
                                while($row_ch = mysqli_fetch_array($sql_ch)){
                                ?>
                            <tr>
                                <input type="hidden" value="<?php echo $id; ?>" class="usid">
                              <td><?php echo $row_ch['id'];?></td>
                              <td><?php echo $row_ch['uname'];?></td>
                              <td><?php echo $row_ch['email'];?></td>
                              <td><?php echo $row_ch['phone'];?></td>
                              <td><div class="btn-group">
                                  <button class="btn btn-success btn-sm" type="button">Action</button>
                                  <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown" data-container="body"><i class="caret"></i></button>
                                  <ul class="dropdown-menu dropdown-menu-right">
                                   <li><a href="add_new_users.php?uid=<?php echo $row_ch['id'];?>&mode=edit" title="Edit" class="showPopup"><i class="ace-icon fa fa-pencil bigger-120"></i>Edit</a></li>
                                    <li><a href="add_new_users.php?uid=<?php echo $row_ch['id'];?>&mode=editpass" title="Editpass" class="showPopup"><i class="ace-icon fa fa-pencil bigger-120"></i>Change Password</a></li>
                                    <li><a class="data-delete" href="add_new_users.php?uid=<?php echo $row_ch['id'];?>&mode=delete" title="delete" class="showPopup"><i class="ace-icon fa fa-pencil bigger-120"></i>Delete</a></li>
                                 </ul>
                                </div></td>
                            </tr>
                                <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="st-panel__footer">
                      <div class="fluid-cols">
                        <div class="expand-col text-ellipsis"><span id="tw-info"></span></div>
                        <div class="min-col">
                          <div id="tw-pagination"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
        
    </div>
	<?php include('footer.php');?>
	<style>
	.table-responsive {
    overflow-x: visible;
    margin-bottom: 42px !important;
}
	</style>
			<script>
	$(document).on('click', 'input.adduser', function(e) {
		e.preventDefault();
		var id = $(this).closest('form').find('#id').val();
		var username = $(this).closest('form').find('#uname').val();
		var email = $(this).closest('form').find('#email').val();
		var phone = $(this).closest('form').find('#phone').val();
		var password = $(this).closest('form').find('#pass').val();
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
			url : 'assets/ajax.php',
			type : "POST",
			async :true,
			data : { 'id':id, 'addnewuname' :username , 'email' :email , 'phone' :phone, 'password' : password },
			success : function(re) {
				$("#respon").html(re);
				setTimeout(function(){
					location.reload();
				}, 2000);
			}
		});
		}
	});
			
	    $(document).on('click', 'input.updateuser', function(e) {
		e.preventDefault();
		var id = $(this).closest('form').find('#id').val();
		var username = $(this).closest('form').find('#uname').val();
		var email = $(this).closest('form').find('#email').val();
		var phone = $(this).closest('form').find('#phone').val();
		if (username == '') {
			alert("Username is Required...");
			return false
		} else if (email == '') {
			alert("Email is Required...");
			return false
		} else if (phone == '') {
			alert("Phone Number is Required...");
			return false
		} else {
		$.ajax({
			url : 'assets/ajax.php',
			type : "POST",
			async :true,
			data : { 'id':id, 'username' :username , 'email' :email , 'phone' :phone },
			success : function(re) {
				$("#respon").html(re);
				setTimeout(function(){
					location.reload();
				}, 2000);
			}
		});
		}
	});
	
		$(document).on('click', 'input.updateuserpass', function(e) {
		e.preventDefault();
		var id = $(this).closest('form').find('#id').val();
		var newpass = $(this).closest('form').find('#newpass').val();
		var confpass = $(this).closest('form').find('#confpass').val();
		if (newpass == '') {
			alert("New password is Required...");
			return false
		} else if (confpass == '') {
			alert("confirm password is Required...");
			return false
		} else {
		$.ajax({
			url : 'assets/ajax.php',
			type : "POST",
			async :true,
			data : { 'id':id, 'newuserpassword' :newpass , 'confpass' :confpass },
			success : function(re) {
				$("#respon").html(re);
				setTimeout(function(){
					location.reload();
				}, 2000);
			}
		});
		}
	});
	
		$(document).on('click', 'a.data-delete', function(e) {
		var userid = $(this).closest('tr').find('.usid').val();
		if (confirm("Are you sure to delete the User?")) {
			$.ajax({
				url : 'assets/ajax.php',
				type : "POST",
				async :true,
				data : { 'userid' : userid },
				success : function(re) {
					alert(re);
					location.reload();
				}
			});
		}
		return false;
	});
	
</script>
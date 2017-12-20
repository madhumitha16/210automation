<?php include('header.php');?>
<div class="st-main">
<div class="st-crumbs">
          <div class="fluid-cols">
            <div class="expand-col text-ellipsis">
              <ul>
                <li><a href="">Home</a></li>
                <li><span>Profile</span></li>
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
								<span>Profile</span>
								<small>Details</small>
							</span>
							</div>
						</div>
						</div>
						<?php 
                                                  
                           $sql_ch = mysqli_query($conn,"SELECT * FROM user WHERE id ='".$_SESSION['userid']."' LIMIT 1");
                           
                           $rowch = mysqli_fetch_array($sql_ch);
						   $id = $rowch['id'];
						   $uname = $rowch['uname'];
						   $email = $rowch['email'];
						   $phone = $rowch['phone'];
                           
                           ?>
                           <div class="st-panel__content">
						    <div class="response" id="respon">
						
						</div>
						<div class="st-panel">
                  <div class="st-panel__cont">
                    <div class="st-panel__header">
                      <div class="fluid-cols">
                        <div class="expand-col text-ellipsis"><span class="st-panel__title"><span>Change Password</span></span></div>
                      </div>
                    </div>
                    <div class="st-panel__content">
                      <div class="form" id="fish-update">
					  <form id="chicken" method="post" autocomplete="off">
					      <input class="form-control" type="hidden" name="id" id="id" value="<?php echo $id;?>">
						<div class="form-group">
                          <label class="control-label">Old Password</label>
                          <input class="form-control" type="password" name="oldpassword" id="oldpassword" value="" placeholder="******" required>
                        </div>
                        <div class="form-group">
                          <label class="control-label">New Password</label>
                          <input class="form-control" type="password" name="newpassword" id="newpassword" value="" placeholder="******" required>
                        </div>
						<div class="form-group">
                          <label class="control-label">Confirm New Password</label>
                          <input class="form-control" type="password" name="confpassword" id="confpassword" value="" placeholder="******" required>
                        </div>
                        <div class="form-group clearfix">
                          <div class="pull-right">
                            <input class="btn btn-default" type="reset" value="Cancel">
                            <input class="btn btn-info updatedata" name="updatedata" type="submit" value="Submit">
                          </div>
                        </div>
						</form>
                      </div>
                    </div>
                  </div>
                </div>
						</div>
						
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
	<?php include('footer.php');?>
	
		<script>
	    $(document).on('click', 'input.updatedata', function(e) {
		e.preventDefault();
		var id = $(this).closest('form').find('#id').val();
		var oldpassword = $(this).closest('form').find('#oldpassword').val();
		var newpassword = $(this).closest('form').find('#newpassword').val();
		var confpassword = $(this).closest('form').find('#confpassword').val();
		if (oldpassword == '') {
			alert("Old password is Required...");
			return false
		} else if (newpassword == '') {
			alert("New password is Required...");
			return false
		} else if (confpassword == '') {
			alert("confirm password is Required...");
			return false
		} else {
		$.ajax({
			url : 'assets/ajax.php',
			type : "POST",
			async :true,
			data : { 'id':id, 'oldpassword' :oldpassword , 'newpassword' :newpassword , 'confpassword' :confpassword },
			success : function(re) {
				$("#respon").html(re);
				setTimeout(function(){
					location.reload();
				}, 2000);
			}
		});
		}
	});
	
</script>
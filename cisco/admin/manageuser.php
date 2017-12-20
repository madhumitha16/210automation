<?php include('header.php');?>
<?php
			if(isset($_GET['mode']) && $_GET['mode'] == 'delete'){
   
			mysqli_query($conn,"DELETE FROM fish WHERE id = '".$_GET['uid']."'");
			$_SESSION["nresponse"] = "Product deleted successfully";
			header("location: fish.php");
			exit;
	
			}
			?>
<div class="st-main">
<div class="st-crumbs">
          <div class="fluid-cols">
            <div class="expand-col text-ellipsis">
              <ul>
                <li><a href="">Home</a></li>
                <li><span>Manage User</span></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="st-content">
          <div class="container-fluid">
            <div class="row">
				<div class="st-panel">
                  <div class="st-panel__cont">
                    <div class="st-panel__header">
                      <div class="fluid-cols">
                        <div class="expand-col text-ellipsis"><span class="st-panel__title"><span>New User Requests</span><small>All Accounts which is not approved yet will be displayed here.</small></span></div>
                        
                      </div>
                    </div>
                    <div class="st-panel__content">
                      <div class="table-responsive" style="margin-bottom: 0;">
                        <table id="example" class="table table-striped table-bordered" style="margin-bottom: 0;">
                          <thead>
                            <tr>
                              <th>S.no</th>
                              <th>User ID</th>
                              <th>User Name</th>
                              <th>Email</th>
                              <th>Mobile</th>
                              <th>Accept</th>
                              <th>Reject</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php 
							  $sno = 1;
                                $sqlna = mysqli_query($conn, "select * from user where status = 'notactive' Order by id");
                                while($row_na = mysqli_fetch_array($sqlna)){
                                ?>
                            <tr>
							<input type="hidden" value="<?php echo $row_na['id']; ?>" class="id">
                              <td><?php echo $sno;?></td>
                              <td><?php echo $row_na['id'];?></td>
                              <td class="uname"><?php echo $row_na['uname'];?></td>
                              <td class="umail"><?php echo $row_na['email'];?></td>
                              <td><?php echo $row_na['phone'];?></td>
                              <td class="c"><input type="button" value="Accept" class="accept"></td>
								<td class="c"><input type="button" value="Reject" class="reject"></td>
                            </tr>
                                <?php $sno++; } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              <!--Table-->
						<div class="st-panel">
                  <div class="st-panel__cont">
                    <div class="st-panel__header">
                      <div class="fluid-cols">
                        <div class="expand-col text-ellipsis"><span class="st-panel__title"><span>Existing Users</span><small>All Accounts which is approved &amp; rejected will be displayed here.</small></span></div>
                        
                      </div>
                    </div>
                    <div class="st-panel__content">
                      <div class="table-responsive" style="margin-bottom: 0;">
                        <table id="example1" class="table table-striped table-bordered" style="margin-bottom: 0;">
                          <thead>
                            <tr>
                              <th>S.no</th>
                              <th>User ID</th>
                              <th>User Name</th>
                              <th>Email</th>
                              <th>Mobile</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php 
							  $sino = 1;
                                $sql_act = mysqli_query($conn, "select * from user where status != 'notactive' Order by id");
                                while($row_act = mysqli_fetch_array($sql_act)){
									$status = $row_act['status'];
                                ?>
                            <tr>
                                <input type="hidden" value="<?php echo $row_act['id']; ?>" class="id">
                              <td><?php echo $sino;?></td>
                              <td><?php echo $row_act['id'];?></td>
                              <td class="uname"><?php echo $row_act['uname'];?></td>
                              <td class="umail"><?php echo $row_act['email'];?></td>
                              <td><?php echo $row_act['phone'];?></td>
                              <td class="c stats"><?php if ($status == 'active') { ?><span class="active">Active</span><?php } else { ?><span class="deactive">Deactive</span><?php } ?></td>
							<td class="c adsts"><?php if ($status == 'active') { ?><input type="button" value="Deactivate" class="reject"><?php } else { ?><input type="button" value="Activate" class="accept"><?php } ?></td>
                            </tr>
                                <?php $sino++; } ?>
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
	
	<script>
		$(document).on('click', '.accept', function() {
			var id = $(this).closest("tr").find('.id').val();
			var username = $(this).closest('tr').find('td.uname').text();
			var email = $(this).closest('tr').find('td.umail').text();
			$.ajax({
				url : 'assets/process.php',
				async: true,
				type: "POST",
				data : { 'username' : username, 'accid' : id, 'email': email },
				success: function(re) {
					alert(re);
					location.reload(true);
				}
			});
		});
		
		$(document).on('click', '.reject', function() {
			var id = $(this).closest("tr").find('.id').val();
			if (confirm("Are you sure to deactivate the account?")) {
			$.ajax({
				url : 'assets/process.php',
				async: true,
				type: "POST",
				data : { 'rejid' : id },
				success: function(re) {
					alert(re);
					location.reload(true);
				}
			});
			}
			return false;
		});
</script>
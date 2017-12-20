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
                        <div class="expand-col text-ellipsis"><span class="st-panel__title"><span>File</span><small>Details</small></span></div>
                        
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
                              <th>Name</th>
                              <th>Description</th>
                              <th>File name</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php 
							  $sno = 1;
                                $sqlfile = mysqli_query($conn, "select * from file Order by id");
                                while($row_file = mysqli_fetch_array($sqlfile)){
									$userid = $row_file['userid'];
									$file = $row_file['filename'];
									$name = $row_file['name'];
									$desc = $row_file['description'];
									
									$sqluser = mysqli_query($conn, "select * from user where id = '".$userid."'");
									$row_usr = mysqli_fetch_array($sqluser);
									$username = $row_usr['uname'];
                                ?>
                            <tr>
							<input type="hidden" value="<?php echo $row_na['id']; ?>" class="id">
                              <td><?php echo $sno;?></td>
                              <td><?php echo $userid;?></td>
                              <td><?php echo $username;?></td>
                              <td><?php echo $name;?></td>
                              <td><?php echo $desc;?></td>
                              <td><?php echo $file;?></td>
                              <td class="c"><a href="download.php?file=<?php echo urlencode($file);?>" class="btn btn-default">Deploy</a></td>
                            </tr>
                                <?php $sno++; } ?>
                          </tbody>
                        </table>
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
			var username = $(this).closest('tr').find('td.aduname').text();
			var email = $(this).closest('tr').find('td.admail').text();
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
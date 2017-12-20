<?php include('header.php');?>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
 
<div class="st-main">
<div class="st-crumbs">
          <div class="fluid-cols">
            <div class="expand-col text-ellipsis">
              <ul>
                <li><a href="">Home</a></li>
                <li><span>File Upload</span></li>
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
								<span>File Upload</span>
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
                        <div class="expand-col text-ellipsis"><span class="st-panel__title"><span>File Upload</span></span></div>
                      </div>
                    </div>
                    <div class="st-panel__content">
                      <div class="form" id="fish-update">
					  <form id="fileupload" method="post" action="assets/insert.php" enctype="multipart/form-data" autocomplete="off">
					      <input class="form-control" type="hidden" name="id" id="id" value="<?php echo $id;?>">
					      <div class="form-group">
                          <label class="control-label">Name</label>
                          <input class="form-control" type="text" name="filename" placeholder="File Name" required>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Description</label>
                          <input class="form-control" type="text" name="desc" placeholder="Description" required>
                        </div>
						<div class="form-group">
                          <label class="control-label">Attach Image</label>
                          <div>
                            <div class="fileinput fileinput-new fileinput-buttons" data-provides="fileinput">
                              <div class="btn-group">
                                <button class="btn btn-default btn-file"><span class="fileinput-new">Select File</span><span class="fileinput-exists">Change</span>
                                  <input type="file" id="fileova" name="fileova" required>
                                </button>
                                <button class="btn btn-default fileinput-exists" data-dismiss="fileinput"><i class="fa fa-remove"></i></button>
                              </div><span class="fileinput-filename"></span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group clearfix">
                          <div class="pull-right">
                            <input class="btn btn-default" type="reset" value="Cancel">
                            <input class="btn btn-info" name="fileupload" type="submit" value="Submit">
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
                    <!-- table -->
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
                              <th>Name</th>
                              <th>Description</th>
                              <th>File Name</th>
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
							    ?>
                            <tr>
							<input type="hidden" value="<?php echo $row_na['id']; ?>" class="id">
                              <td><?php echo $sno;?></td>
                              <td><?php echo $name;?></td>
                              <td><?php echo $desc;?></td>
                              <td><?php echo $file;?></td>
                              <td class="c"><a href="../admin/download.php?file=<?php echo urlencode($file);?>" class="btn btn-default">Deploy</a></td>
                            </tr>
                                <?php $sno++; } ?>
                          </tbody>
                        </table>
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
		var uname = $(this).closest('form').find('#uname').val();
		var email = $(this).closest('form').find('#email').val();
		var phone = $(this).closest('form').find('#phone').val();
		if (uname == '') {
			alert("Name id is Required...");
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
			data : { 'id':id,'username' :uname , 'email' :email , 'phone' :phone },
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
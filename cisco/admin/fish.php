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
                <li><a href="">Products</a></li>
                <li><span>Fish</span></li>
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
								<span>Fish</span>
								<small>Details</small>
							</span>
							</div>
						</div>
						</div>
						<?php 
                           if(isset($_GET['mode']) && $_GET['mode'] == 'edit'){
                        
                           $sql_fs = mysqli_query($conn,"SELECT * FROM fish WHERE id ='".$_GET['uid']."' LIMIT 1");
                           if(mysqli_num_rows($sql_fs) == 0) {
                           header("location: fish.php");
                           exit;
                           }
                           $rowfs = mysqli_fetch_array($sql_fs);
						   $id = $rowfs['id'];
						   $product_id = $rowfs['product_id'];
						   $product_name = $rowfs['product_name'];
						   $product_price = $rowfs['product_price'];
						   $image = $rowfs['image'];
                           
                           ?>
                           <div class="st-panel__content">
						    <div class="response" id="respon">
						
						</div>
						<div class="st-panel">
                  <div class="st-panel__cont">
                    <div class="st-panel__header">
                      <div class="fluid-cols">
                        <div class="expand-col text-ellipsis"><span class="st-panel__title"><span>Update Fish Details</span></span></div>
                      </div>
                    </div>
                    <div class="st-panel__content">
                      <div class="form" id="fish-update">
					  <form id="chicken" method="post" autocomplete="off">
					      <input class="form-control" type="hidden" name="id" id="id" value="<?php echo $id;?>">
						<div class="form-group">
                          <label class="control-label">Product ID</label>
                          <input class="form-control" type="text" name="prodid" id="prodid" value="<?php echo $product_id;?>" placeholder="product ID" required>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Product Name</label>
                          <input class="form-control" type="text" name="prodname" id="prodname" value="<?php echo $product_name;?>" placeholder="product name" required>
                        </div>
						<div class="form-group">
                          <label class="control-label">Product Price</label>
                          <input class="form-control" type="text" name="prodprice" id="prodprice" value="<?php echo $product_price;?>" placeholder="product Price" required>
                        </div>
                        <div class="form-group clearfix">
                          <div class="pull-right">
                            <input class="btn btn-default" type="reset" value="Cancel">
                            <input class="btn btn-info updatefishdata" name="updatefishdata" type="submit" value="Submit">
                          </div>
                        </div>
						</form>
                      </div>
                    </div>
                  </div>
                </div>
						</div>
						<?php } else if(isset($_GET['mode']) && $_GET['mode'] == 'editphoto'){ 
						$sql_img = mysqli_query($conn,"SELECT * FROM fish WHERE id ='".$_GET['uid']."' LIMIT 1");
                           if(mysqli_num_rows($sql_img) == 0) {
                           header("location: fish.php");
                           exit;
                           }
                           $rowimg = mysqli_fetch_array($sql_img);
						   $id = $rowimg['id'];
						
						?>
						
						<div class="st-panel__content">
						    <div class="response" id="respon">
					
						</div>
						<div class="st-panel">
                  <div class="st-panel__cont">
                    <div class="st-panel__header">
                      <div class="fluid-cols">
                        <div class="expand-col text-ellipsis"><span class="st-panel__title"><span>Update Fish Image</span></span></div>
                      </div>
                    </div>
                    <div class="st-panel__content">
                      <div class="form" id="contact-form">
					  <form id="uploadForm" method="post" action="assets/update.php" enctype="multipart/form-data" autocomplete="off">
                        <div class="form-group">
                            <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>">
                          <label class="control-label">Attach Image</label>
                          <div>
                            <div class="fileinput fileinput-new fileinput-buttons" data-provides="fileinput">
                              <div class="btn-group">
                                <button class="btn btn-default btn-file"><span class="fileinput-new">Select File</span><span class="fileinput-exists">Change</span>
                                  <input type="file" id="updatefish" name="updatefish" required>
                                </button>
                                <button class="btn btn-default fileinput-exists" data-dismiss="fileinput"><i class="fa fa-remove"></i></button>
                              </div><span class="fileinput-filename"></span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group clearfix">
                          <div class="pull-right">
                            <input class="btn btn-default" type="reset" value="Cancel">
                            <input class="btn btn-info updatefish" type="submit" value="Submit">
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
                        <div class="expand-col text-ellipsis"><span class="st-panel__title"><span>Add Fish Details</span></span></div>
                      </div>
                    </div>
                    <div class="st-panel__content">
                      <div class="form" id="contact-form">
					  <form id="chicken" method="post" action="assets/insert.php" enctype="multipart/form-data" autocomplete="off">
						<div class="form-group">
                          <label class="control-label">Product ID</label>
                          <input class="form-control" type="text" name="prodid" placeholder="product ID" required>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Product Name</label>
                          <input class="form-control" type="text" name="prodname" placeholder="product name" required>
                        </div>
						<div class="form-group">
                          <label class="control-label">Product Price</label>
                          <input class="form-control" type="text" name="prodprice" placeholder="product Price" required>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Attach Image</label>
                          <div>
                            <div class="fileinput fileinput-new fileinput-buttons" data-provides="fileinput">
                              <div class="btn-group">
                                <button class="btn btn-default btn-file"><span class="fileinput-new">Select File</span><span class="fileinput-exists">Change</span>
                                  <input type="file" name="prodfish" required>
                                </button>
                                <button class="btn btn-default fileinput-exists" data-dismiss="fileinput"><i class="fa fa-remove"></i></button>
                              </div><span class="fileinput-filename"></span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group clearfix">
                          <div class="pull-right">
                            <input class="btn btn-default" type="reset" value="Cancel">
                            <input class="btn btn-info" type="submit" value="Submit">
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
                        <div class="expand-col text-ellipsis"><span class="st-panel__title"><span>Fish</span><small>Details</small></span></div>
                        <div class="min-col">
                          <div class="st-panel__form">
                            <div class="st-inputbar">
                              <div class="st-inputbar-input hidden-xs">
                                <input class="form-control input-sm" id="tw-search" type="text" placeholder="Search" style="width: 200px;">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="st-panel__content">
                      <div class="table-responsive" style="margin-bottom: 0;">
                        <table class="table table-bordered table-hover table-filled table-select" id="tw-table" style="margin-bottom: 0;">
                          <thead>
                            <tr>
                              <th class="text-nowrap">ID</th>
                              <th class="text-nowrap">Product Name</th>
                              <th class="">Product Price</th>
                              <th class="">Image</th>
                              <th class="content-width">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php 
                                $sql_ch = mysqli_query($conn, "select * from fish Order by id");
                                while($row_ch = mysqli_fetch_array($sql_ch)){
                                ?>
                            <tr>
                                
                              <td><?php echo $row_ch['id'];?></td>
                              <td><?php echo $row_ch['product_name'];?></td>
                              <td><?php echo $row_ch['product_price'];?></td>
                              <td><?php echo $row_ch['image'];?></td>
                              <td><div class="btn-group">
                                  <button class="btn btn-success btn-sm" type="button">Action</button>
                                  <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown" data-container="body"><i class="caret"></i></button>
                                  <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="fish.php?uid=<?php echo $row_ch['id'];?>&mode=edit" title="Edit" class="showPopup"><i class="ace-icon fa fa-pencil bigger-120"></i>Edit</a></li>
                                    <li><a href="fish.php?uid=<?php echo $row_ch['id'];?>&mode=editphoto" title="Editphoto" class="showPopup"><i class="ace-icon fa fa-pencil bigger-120"></i>Update Image</a></li>
                                    <li><a href="fish.php?uid=<?php echo $row_ch['id'];?>&mode=delete" title="delete" class="showPopup"><i class="ace-icon fa fa-pencil bigger-120"></i>Delete</a></li>
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
	
	<script>
	    $(document).on('click', 'input.updatefishdata', function(e) {
		e.preventDefault();
		var id = $(this).closest('form').find('#id').val();
		var prodid = $(this).closest('form').find('#prodid').val();
		var prodname = $(this).closest('form').find('#prodname').val();
		var prodprice = $(this).closest('form').find('#prodprice').val();
		if (prodid == '') {
			alert("Product id is Required...");
			return false
		} else if (prodname == '') {
			alert("Product name is Required...");
			return false
		} else if (prodprice == '') {
			alert("Product price is Required...");
			return false
		} else {
		$.ajax({
			url : 'assets/ajax.php',
			type : "POST",
			async :true,
			data : { 'id':id,'prodiddata' :prodid , 'prodname' :prodname , 'prodprice' :prodprice },
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
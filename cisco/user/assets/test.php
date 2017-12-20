<?php include('../header.php');?>
<div class="st-main">
<div class="st-crumbs">
          <div class="fluid-cols">
            <div class="expand-col text-ellipsis">
              <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Products</a></li>
                <li><span>Chicken</span></li>
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
								<span>Chicken</span>
								<small>Details</small>
							</span>
							</div>
						</div>
						</div>
						<div class="st-panel__content">
						<div class="st-panel">
                  <div class="st-panel__cont">
                    <div class="st-panel__header">
                      <div class="fluid-cols">
                        <div class="expand-col text-ellipsis"><span class="st-panel__title"><span>Add Chicken Details</span></span></div>
                      </div>
                    </div>
                    <div class="st-panel__content">
                      <div class="form" id="contact-form">
					  <form id="chicken" method="post" action="assets/insert.php" enctype="multipart/form-data">
						<div class="form-group">
                          <label class="control-label">Product ID</label>
                          <input class="form-control" type="text" name="prodid" placeholder="product ID">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Product Name</label>
                          <input class="form-control" type="text" name="prodname" placeholder="product name">
                        </div>
						<div class="form-group">
                          <label class="control-label">Product Price</label>
                          <input class="form-control" type="text" name="prodprice" placeholder="product Price">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Attach Image</label>
                          <div>
                            <div class="fileinput fileinput-new fileinput-buttons" data-provides="fileinput">
                              <div class="btn-group">
                                <button class="btn btn-default btn-file"><span class="fileinput-new">Select File</span><span class="fileinput-exists">Change</span>
                                  <input type="file" name="prodimg">
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
						<div class="st-panel__footer">
						<div class="fluid-cols">
							<div class="expand-col">
							<span>The Footer Text</span>
							</div>
							<div class="min-col">
							<span class="text-nowrap">Right Text</span>
							</div>
						</div>
						</div>
					</div>
				</div>
              
            </div>
          </div>
        </div>
        
    </div>
	<?php include('../footer.php');?>
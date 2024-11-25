<?php include "includes/head-logo.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/sidebar.php"; ?>

<section role="main" class="content-body">
					<header class="page-header">
						<h2>Client Certificate</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span> Client Certificate</span></li>
								<li><span>Add</span></li>
                            </ol>
                            <span>&nbsp&nbsp</span>
						</div>
					</header>
					<div class="row">
						<div class="col-12">
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Client Certificate</h2>

									<!-- <p class="panel-subtitle">
										This is an example of form with multiple block columns.
									</p> -->
								</header>
								<div class="panel-body">
									<form class="row form-group" action="candidate_code.php" method="post">
                                        <div class="col-lg-4 col-sm-12 col-md-6">
                                            <label class="control-label">First Name</label>
											<input type="text" name="fname" class="form-control">
                                        </div>
                                        <div class="col-lg-4 col-sm-12 col-md-6">
                                            <label class="control-label">Last Name</label>
											<input type="text" name="lname" class="form-control">
                                        </div>
                                       <div class="col-lg-4 col-sm-12 col-md-6">
                                            <label class="control-label">Sign Upload</label>
											<input type="file" name="img" class="form-control fileupload">
                                        </div>
										<div class="col-lg-4 col-sm-12 col-md-6">
                                            <label class="control-label">Logo Upload</label>
											<input type="file" name="img" class="form-control fileupload">
                                        </div>
										<div style="margin-top: 10px;" class="col-lg-4 col-sm-12 col-md-6">
											<input role="button" value="Submit" type="Submit" name="Submit" class="btn btn-primary ">
											<button class="btn btn-secondary">Cancel</button>
                                        </div>
                                    </form>
								</div>
								<!-- <footer class="panel-footer">
                                    
                                        <button class="btn btn-primary">Submit</button>
                                        <button class="btn btn-secondary">Cancel</button>
                                    
								</footer> -->
							</section>
						</div>
					</div>
</section>

<?php include "includes/footer.php"; ?>
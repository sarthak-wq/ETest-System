<?php include "includes/head-logo.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/sidebar.php"; ?>

<section role="main" class="content-body">
					<header class="page-header">
						<h2>Add Candidate</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Candidate</span></li>
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

									<h2 class="panel-title">Add Candidate</h2>

									<!-- <p class="panel-subtitle">
										This is an example of form with multiple block columns.
									</p> -->
								</header>
								<div class="panel-body">
									<form class="row form-group" action="classes/candidate_code.php" enctype="multipart/form-data" method="post">
                                        <div class="col-lg-4 col-sm-12 col-md-6">
                                            <label class="control-label">First Name</label>
											<input type="text" name="fname" class="form-control">
                                        </div>
                                        <div class="col-lg-4 col-sm-12 col-md-6">
                                            <label class="control-label">Last Name</label>
											<input type="text" name="lname" class="form-control">
                                        </div>
                                        <div class="col-lg-4 col-sm-12 col-md-6">
                                            <label class="control-label">Date of Birth</label>
											<input type="date" name="d_o_b" class="form-control">
                                        </div>
                                        <div class="col-lg-4 col-sm-12 col-md-6">
                                            <label class="control-label">Contact Number</label>
											<input type="number" name="mobile" class="form-control">
                                        </div>
                                        <div class="col-lg-4 col-sm-12 col-md-6">
                                            <label class="control-label">E-mail</label>
											<input type="text" name="email" class="form-control">
                                        </div>
										<div class="col-lg-4 col-sm-12 col-md-6">
                                            <label class="control-label">User ID</label>
											<input type="email" name="userid" class="form-control fileupload">
                                        </div>
                                        <div class="col-lg-4 col-sm-12 col-md-6 ">
                                            <label class="control-label">Gender</label>
											<div class="form-control">
												<label class="radio-inline"><input type="radio" name="gender" value="male" checked>Male</label>
												<label class="radio-inline"><input type="radio" name="gender" value="female" >Female</label>
												<label class="radio-inline"><input type="radio" name="gender" value="others" >Others</label>
											</div>
                                        </div>
                                        <div class="col-lg-4 col-sm-12 col-md-6">
                                            <label class="control-label">Country</label>
											<input type="text" name="country" class="form-control">
                                        </div>
                                        <div class="col-lg-4 col-sm-12 col-md-6">
                                            <label class="control-label">State</label>
											<input type="text" name="state" class="form-control">
                                        </div>
                                        <div class="col-lg-4 col-sm-12 col-md-6">
                                            <label class="control-label">city</label>
											<input type="text" name="city" class="form-control">
                                        </div>
                                        <div class="col-lg-4 col-sm-12 col-md-6">
                                            <label class="control-label">Address Line 1</label>
											<input type="text" name="address" class="form-control">
                                        </div>
										<div class="col-lg-4 col-sm-12 col-md-6">
                                            <label class="control-label">Image</label>
											<input type="file" name="img" class="form-control fileupload">
                                        </div>
										<div class="col-lg-4 col-sm-12 col-md-6">
                                            <label class="control-label">Password</label>
											<input type="password" name="password" class="form-control fileupload">
                                        </div>
										<div class="col-lg-4 col-sm-12 col-md-6">
                                            <label class="control-label">Confirm password</label>
											<input type="password" name="cnfpassword" class="form-control fileupload">
                                        </div>
										
										<footer class="panel-footer">
                                    
											<div style="margin-top: 20px;" class="col-lg-4 col-sm-12 col-md-6">
												<input role="button" value="Submit" type="Submit" name="Submit" class="btn btn-primary ">
												<span>&nbsp;</span>
												<button class="btn btn-secondary">Cancel</button>
											</div>
                                    
										</footer>
										<!-- <div style="margin-top: 20px;" class="col-lg-4 col-sm-12 col-md-6">
											<input role="button" value="Submit" type="Submit" name="Submit" class="btn btn-primary ">
											<span>&nbsp;</span>
											<button class="btn btn-secondary">Cancel</button>
                                        </div> -->
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
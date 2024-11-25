<?php include "includes/head-logo.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/sidebar.php"; ?>

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Add User</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
								<li><span>Add User</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"></a>
						</div>
					</header>

					
					<form class="row form-group" action="classes/user-code.php"  method="post" enctype="multipart/form-data">
					<div class="col-md-6" style="width: 100%;">
							<section class="panel">
								<header class="panel-heading">
									

									<h2 class="panel-title">User Registration</h2>

									<p class="panel-subtitle">
										
									</p>
								</header>
								
								<div class="panel-body">

									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">First Name</label>
												<input type="text" name="firstname" class="form-control">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">Last Name</label>
												<input type="text" name="lastname" class="form-control">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
											<label class="control-label">Gender</label>
											<div class="form-control">
												<label class="radio-inline"><input type="radio" name="gender" value="male" checked>Male</label>
												<label class="radio-inline"><input type="radio" name="gender" value="female" >Female</label>
												<label class="radio-inline"><input type="radio" name="gender" value="others" >Others</label>
											</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">Email</label>
												<input type="email" name="email" class="form-control">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">Date of Birth</label>
												<input type="date" name="d_o_b" class="form-control">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">Role</label>
												<input type="text" name="role" class="form-control">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">Director Name</label>
												<input type="text" name="director" class="form-control">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">Mobile number</label>
												<input type="number" name="mobile" class="form-control">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">Designation</label>
												<input type="text" name="designation" class="form-control">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">Address</label>
												<input type="text" name="address" class="form-control">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">City</label>
												<input type="text" name="city" class="form-control">
											</div>
										</div><div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">Position</label>
												<input type="text" name="position" class="form-control">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">Image</label>
												<input type="file" name="image" class="form-control">
											</div>
										</div>
										<div class="col-sm-6">
                                            <label class="control-label">Password</label>
											<input type="password" name="password" class="form-control fileupload">
                                        </div>
									</div>
								</div>
								<footer class="panel-footer">
									<button type="submit" name="Submit" class="btn btn-primary">Submit</button>
								</footer>
							
							</section>
						</div>
					</div>
					</form>

					<!-- end: page -->
				</section>
			</div>

<?php include "includes/footer.php"; ?>
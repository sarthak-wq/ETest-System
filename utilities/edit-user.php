<?php
//error_reporting(0);
include_once("classes/etsystem.php");
$crud = new Etstysem();
$userId = $crud->escape_string($_GET['id']);
if(!empty($userId))
{
	$query = "SELECT * FROM  tbl_user_registration WHERE id = $userId";
	
	$results = $crud->getData($query);
	foreach ($results as $key => $row) {
	$firstname = $row['first_name']; 
    $lastname = $row['last_name']; 
    $email = $row['email'];
	$mobile = $row['mobile'];
	$logo = $row['image'];
	$gender = $row['gender'];
	}
}
?>
<?php include "includes/head-logo.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/sidebar.php"; ?>

<section role="main" class="content-body">
					<header class="page-header">
						<h2>Edit Client</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Client</span></li>
								<li><span>Edit</span></li>
                            </ol>
                            <span>&nbsp&nbsp</span>
						</div>
					</header>
					<div class="col-md-6" style="width: 100%;">
							<section class="panel">
								<header class="panel-heading">
									

									<h2 class="panel-title">Client Registration</h2>

									<p class="panel-subtitle">
										
									</p>
								</header>
								<div class="panel-body">
									<form action="classes/user-code.php" method="POST" enctype="multipart/form-data">
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">First Name</label>
												<input type="text" name="firstname" value="<?php echo $firstname; ?>" class="form-control">
												<input type="hidden" name="userId" value="<?php echo $userId; ?>" class="form-control">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">Last Name</label>
												<input type="text" name="lastname" value="<?php echo $lastname; ?>" class="form-control">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">Gender</label>
												<?php if ($gender == 'male'){ ?>
												<div class="form-control">
													<label class="radio-inline"><input type="radio" name="gender" value="male" checked>Male</label>
													<label class="radio-inline"><input type="radio" name="gender" value="female" >Female</label>
													<label class="radio-inline"><input type="radio" name="gender" value="others" >Others</label>
												</div>
												<?php } ?>
												<?php if ($gender == 'female'){ ?>
												<div class="form-control">
													<label class="radio-inline"><input type="radio" name="gender" value="male">Male</label>
													<label class="radio-inline"><input type="radio" name="gender" value="female" checked>Female</label>
													<label class="radio-inline"><input type="radio" name="gender" value="others" >Others</label>
												</div>
												<?php } ?>
												<?php if ($gender == 'others'){ ?>
												<div class="form-control">
													<label class="radio-inline"><input type="radio" name="gender" value="male">Male</label>
													<label class="radio-inline"><input type="radio" name="gender" value="female">Female</label>
													<label class="radio-inline"><input type="radio" name="gender" value="others" checked>Others</label>
												</div>
												<?php } ?>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">Email</label>
												<input type="email" name="email" value="<?php echo $email; ?>" class="form-control">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">Date Of Birth</label>
												<input type="date" name="dob" value="<?php echo $dob; ?>" class="form-control">
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
												<label class="control-label">Mobile Number</label>
												<input type="number" name="mobile" value="<?php echo $mobile; ?>" class="form-control">
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
												<img src="photo/<?php echo $row['image']; ?>" width="80" height = "80">
											</div>
										</div>
										<div class="col-sm-6">
                                            <label class="control-label">Password</label>
											<input type="password" value="<?php echo $password; ?>" name="password" class="form-control fileupload">
											<input class="form-control mb-md" name="preimg" type="hidden" value="<?php echo $logo; ?>">
                                        </div>
										<div class="col-sm-6">
											<div class="form-group">
												<input type="hidden" name="previmage" value="<?php echo $logo; ?>" class="form-control">
											</div>
										</div>
									</div>
									<br>
									<footer class="panel-footer">
									<input type="Submit" name="Update" value="Update" class="btn btn-primary">
								</footer>
							</form>
								</div>
								

							</section>
						</div>
					</div>
</section>

<?php include "includes/footer.php"; ?>
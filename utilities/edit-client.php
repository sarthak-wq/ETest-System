<?php
    error_reporting(0);
	include_once 'includes/DbConfig.php';
    include_once("classes/etsystem.php");
$crud = new Etstysem();
$clientId = $crud->escape_string($_GET['id']);
if(!empty($clientId))
{
	$query = "SELECT * FROM  tbl_client_registration WHERE id = $clientId";
	$results = $crud->getData($query);
	foreach ($results as $key => $row) {
		$firstname = $row['first_name'];
		$lastname = $row['last_name'];
		$email = $row['email'];
		$mobile = $row['mobile'];
		$dob = $row['d_o_b'];
		$logo = $row['logo'];
		$gender = $row['gender'];
		$address = $row['address'];
		$role = $row['role'];
		$position = $row['position'];
		$director = $row['director_name'];
		$country = $row['country'];
		$city = $row['city'];
		$state = $row['state'];
    	//$designation = $row['designation']; 

		# code...
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
									<form action="classes/client-code.php" method="POST">
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">First Name</label>
												<input type="text" name="firstname" value="<?php echo $firstname; ?>" class="form-control">
												<input type="hidden" name="clientId" value="<?php echo $clientId; ?>" class="form-control">
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
												<input type="text" name="role" value="<?php echo $role; ?>" class="form-control">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">Director Name</label>
												<input type="text" name="director" value="<?php echo $director; ?>" class="form-control">
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
												<label class="control-label">Address</label>
												<input type="text" name="address" value="<?php echo $address; ?>" class="form-control">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">Country</label>
												<input type="text" name="country" value="<?php echo $country; ?>" class="form-control">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">State</label>
												<input type="text" name="state" value="<?php echo $state; ?>" class="form-control">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">City</label>
												<input type="text" name="city" value="<?php echo $city; ?>" class="form-control">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">Position</label>
												<input type="text" name="position" value="<?php echo $position; ?>" class="form-control">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group" >
												<label class="control-label">Upload Logo</label>
												<input type="file" name="sign" class="form-control"> 		
												<img src="photo/<?php echo $logo; ?>" width="80" height = "80">                                               
											</div>
										</div>
									</div>
									<footer class="panel-footer">
									<button type="Submit" name="Update" value="Update" class="btn btn-primary">Update</button>
								</footer>
							</form>
								</div>
								

							</section>
						</div>
					</div>
</section>

<?php include "includes/footer.php"; ?>

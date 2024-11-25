<?php 
	
	// error_reporting(0);
    include_once("classes/etsystem.php");
    $crud = new Etstysem();
	

   if(!empty($_GET['id'])) {
	
	$id = $_GET['id'];
	$query = "SELECT * FROM   tbl_candidate_registration WHERE id = $id ";
	$results = $crud->getData($query);
	 
	foreach( $results as $key => $row)
	{
		$fname = $row['first_name'];
		$lname = $row['last_name'];
		$candidate_id = $row['id'];
		$gender = $row['gender'];
		$dob = $row['d_o_b'];
		$address = $row['address'];
		$mobile = $row['mobile'];
		$email = $row['email'];
		$img = $row['avatar'];
		$country = $row['country'];
		$state = $row['state'];
		$city = $row['city'];
		$candid = $row['candidate_id'];
	}
    
   }

?>

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
											<input type="text" name="fname" value="<?php echo $fname; ?>" class="form-control">
                                        </div>
                                        <div class="col-lg-4 col-sm-12 col-md-6">
                                            <label class="control-label">Last Name</label>
											<input type="text" name="lname" value="<?php echo $lname; ?>" class="form-control">
                                        </div>
                                        <div class="col-lg-4 col-sm-12 col-md-6">
                                            <label class="control-label">Date of Birth</label>
											<input type="date" name="d_o_b" value="<?php echo $dob; ?>" class="form-control">
                                        </div>
                                        <div class="col-lg-4 col-sm-12 col-md-6">
                                            <label class="control-label">Contact Number</label>
											<input type="number" name="mobile" value="<?php echo $mobile; ?>" class="form-control">
                                        </div>
                                        <div class="col-lg-4 col-sm-12 col-md-6">
                                            <label class="control-label">E-mail</label>
											<input type="text" name="email" value="<?php echo $email; ?>" class="form-control">
                                        </div>
                                        <div style="margin: auto;" class="col-lg-4 col-sm-12 col-md-6 ">
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
                                        <div class="col-lg-4 col-sm-12 col-md-6">
                                            <label class="control-label">Country</label>
											<input type="text" name="country" value="<?php echo $country; ?>" class="form-control">
                                        </div>
                                        <div class="col-lg-4 col-sm-12 col-md-6">
                                            <label class="control-label">State</label>
											<input type="text" name="state" value="<?php echo $state; ?>" class="form-control">
                                        </div>
                                        <div class="col-lg-4 col-sm-12 col-md-6">
                                            <label class="control-label">city</label>
											<input type="text" name="city" value="<?php echo $city; ?>" class="form-control">
                                        </div>
                                        <div class="col-lg-4 col-sm-12 col-md-6">
                                            <label class="control-label">Address Line </label>
											<input type="text" name="address" value="<?php echo $address; ?>" class="form-control">
                                        </div>
										<div class="col-lg-4 col-sm-12 col-md-6">
                                            <label class="control-label">Image</label>
											<input type="file" name="img" value="<?php echo $img; ?>" class="form-control fileupload">
                                        </div>
										<div class="col-lg-4 col-sm-12 col-md-6">
											<input type="hidden" name="candidate_id" value="<?php echo $candidate_id; ?>" class="form-control">
                                        </div>
										<div class="col-lg-4 col-sm-12 col-md-6">
                                            <label class="control-label">Password</label>
											<input type="password" value="<?php echo $pass; ?>" name="password" class="form-control fileupload">
                                        </div>
										<div class="col-lg-4 col-sm-12 col-md-6">
                                            <label class="control-label">User ID</label>
											<input type="email" name="userid" value="<?php echo $candid; ?>" class="form-control fileupload">
                                        </div>
										<div class="col-lg-4 col-sm-12 col-md-6">
											<input type="hidden" name="previmg" value="<?php echo $img; ?>" class="form-control fileupload">
                                        </div>
										<footer class="panel-footer">
                                    
											<div style="margin-top: 20px;" class="col-lg-4 col-sm-12 col-md-6">
												<input role="button" value="Update" type="Submit" name="Update" class="btn btn-primary ">
												<span>&nbsp;</span>
												<button class="btn btn-secondary">Cancel</button>
											</div>
                                    
										</footer>
                                    </form>
								</div>
							</section>
						</div>
					</div>
</section>

<?php include "includes/footer.php"; ?>
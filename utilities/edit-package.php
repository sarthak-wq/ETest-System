<?php
    error_reporting(0);
	include_once 'includes/DbConfig.php';
    include_once("classes/etsystem.php");
$crud = new Etstysem();
$packageId = $crud->escape_string($_GET['id']);
if(!empty($packageId))
{
	$query = "SELECT * FROM  tbl_candidate_package WHERE id = $packageId";
	$results = $crud->getData($query);
	foreach ($results as $key => $row) {
		$package_name = $row['package_name'];
		$package_from = $row['package_from'];
		$package_to = $row['package_to'];
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
						<h2>Add Package</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
								<li><span>Add Package</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					
					<form  action="classes/candidate_package_code.php"  method="post" enctype="multipart/form-data">
					<div class="col-md-6" style="width: 100%;">
							<section class="panel">
								<header class="panel-heading">
									

									<h2 class="panel-title">Package Registration</h2>

									<p class="panel-subtitle">
										
									</p>
								</header>
								
								<div class="panel-body">									
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">Candidate Name</label>
												<input type="text" name="candidate_name" class="form-control">
												<input type="hidden" name="packageId" value="<?php echo $packageId; ?>" class="form-control">
											</div>
											
											<div class="form-group">
												<label class="control-label">Package From</label>
												<input type="date" name="package_from" value="<?php echo $package_from; ?>" class="form-control">
											</div>
										
										</div>
										<div class="col-sm-6">											
											<div class="form-group">
												<label class="control-label">Package Name</label>
											<?php if ($package_name == 'Beginner'){ ?>
											<div class="form-control">
												<label class="radio-inline"><input type="radio" name="package_name" value="male" checked>Beginner</label>
												<label class="radio-inline"><input type="radio" name="package_name" value="female" >Expert</label>
												<label class="radio-inline"><input type="radio" name="package_name" value="others" >Master</label>
											</div>
											<?php } ?>
											<?php if ($package_name == 'Expert'){ ?>
											<div class="form-control">
												<label class="radio-inline"><input type="radio" name="package_name" value="Beginner">Beginner</label>
												<label class="radio-inline"><input type="radio" name="package_name" value="Expert" checked>Expert</label>
												<label class="radio-inline"><input type="radio" name="package_name" value="Master" >Master</label>
											</div>
											<?php } ?>
											<?php if ($package_name == 'Master'){ ?>
											<div class="form-control">
												<label class="radio-inline"><input type="radio" name="package_name" value="Beginner">Beginner</label>
												<label class="radio-inline"><input type="radio" name="package_name" value="Expert">Expert</label>
												<label class="radio-inline"><input type="radio" name="package_name" value="Master" checked>Master</label>
											</div>
											<?php } ?>
											</div>
											<div class="form-group">
												<label class="control-label">Package To</label>
												<input type="date" name="package_to" value="<?php echo $package_to; ?>" class="form-control">
											</div>
										</div>							
								</div>
								<footer class="panel-footer">
									<button type="submit" name="Update" value="Update" class="btn btn-primary">Update</button>									
								</footer>
							</form>

							</section>
						</div>
					</div>


			
					<!-- end: page -->
				</section>
			</div>

			<aside id="sidebar-right" class="sidebar-right">
				<div class="nano">
					<div class="nano-content">
						<a href="#" class="mobile-close visible-xs">
							Collapse <i class="fa fa-chevron-right"></i>
						</a>
			
						<div class="sidebar-right-wrapper">
			
							<div class="sidebar-widget widget-calendar">
								<h6>Upcoming Tasks</h6>
								<div data-plugin-datepicker data-plugin-skin="dark" ></div>
			
								<ul>
									<li>
										<time datetime="2014-04-19T00:00+00:00">04/19/2014</time>
										<span>Company Meeting</span>
									</li>
								</ul>
							</div>
			
							<div class="sidebar-widget widget-friends">
								<h6>Friends</h6>
								<ul>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
								</ul>
							</div>
			
						</div>
					</div>
				</div>
			</aside>
		</section>

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>

	</body>
</html>
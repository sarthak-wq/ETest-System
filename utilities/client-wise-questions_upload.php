<?php
	//error_reporting(0);
    include_once("classes/etsystem.php");
    $crud = new Etstysem();
	$query = "SELECT * FROM  tbl_subjects ORDER BY id DESC";
	$results = $crud->getData($query);

	$queryClient = "SELECT * FROM  tbl_client_registration ORDER BY id DESC";
	$resultsClient = $crud->getData($queryClient);
?>
<?php
	include "includes/head-logo.php";
	include "includes/header.php"; 
	include "includes/sidebar.php";  
?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Clients Excel Question File Upload</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Forms</span></li>
								<li><span>Questions</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					
					<div class="row">

						<div class="col-lg-12">
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Clients Excel Question File Upload</h2>

								</header>
								<div class="panel-body">
									<div class="row">
										<div class="col-sm-12">
											
												<div class="form-group">
												<label class="control-label">Client Name</label>
												<select name="client_id" id="client_id" class="form-control">
												<?php  foreach ($resultsClient as $key => $rows) { ?>
													<option value="<?php echo $rows['client_id']; ?>"><?php echo $rows['first_name']; ?> <?php echo $rows['last_name']; ?></option>
												<?php } ?>
												</select>
											</div>
											
										</div>
										<div class="col-sm-12">
											
													<div class="form-group">
												<label class="control-label">Subject Name</label>
												<select name="subject_id" id="subject_id" class="form-control">
												<?php  foreach ($results as $key => $row) { ?>
													<option value="<?php echo $row['subject_id']; ?>"><?php echo $row['subject_name']; ?></option>
												<?php } ?>
												</select>
											</div>
											
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label class="control-label">Add Excel File</label>
												<input type="file" id="myFile" name="filename">
												
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
										
											
										</div>
									</div>
									<footer  style="padding-top: 30px;">
										<button class="btn btn-primary" style="float: right;">Submit</button>
										<div style="padding-right: 80px;" >
											<button type="reset" class="btn btn-default" style="float: right; ">Reset</button>
										</div>
									</footer>
								</div>
							
								<!--<footer class="panel-footer">
										<button class="btn btn-primary" style="float: right;">Submit</button>
										<div style="padding-right: 80px;" >
											<button type="reset" class="btn btn-default" style="float: right; ">Reset</button>
										</div>
								</footer>-->
								
							</section>
						</div>
					</div>
					<!-- end: page -->
				</section>
			</div>

	
		</section>
<?php include "includes/footer.php"; ?>
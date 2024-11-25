<?php
error_reporting(0);
include_once'includes/DbConfig.php';
include_once("classes/etsystem.php");
$crud = new Etstysem();
$subject_id = $crud->escape_string($_GET['id']);
if(!empty($subject_id))
{
	$query = "SELECT * FROM  tbl_subjects WHERE id = $subject_id";
	$results = $crud->getData($query);
	foreach ($results as $key => $row) {
		$subject_name = $row['subject_name'];

		# code...
	}
}
?>
<?php include "includes/head-logo.php"; ?>
<?php include "includes/header.php"; ?>
<?php //include "includes/sidebar.php"; ?>


<section role="main" class="content-body">
					<header class="page-header">
						<h2>Update Subject</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Subject</span></li>
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

									<h2 class="panel-title">Add Subject</h2>

									<!-- <p class="panel-subtitle">
										This is an example of form with multiple block columns.
									</p> -->
								</header>
								<div class="panel-body">
									<form class="row form-group" action="subject-code.php" method="post">
													<div class="form-group mt-lg">
														<label class="col-md-5 control-label" for="inputSuccess">Select Department<span class="required">*</span></label>
												<div class="col-md-10">
													<select class="form-control mb-md">
														<option>----Select----</option>
														<option>Option 1</option>
														<option>Option 2</option>
														<option>Option 3</option>
													</select>
												</div>
													</div>
													<div class="form-group mt-lg">
														<label class="col-md-5 control-label" for="inputSuccess">Select Category<span class="required">*</span></label>
												<div class="col-md-10">
													<select class="form-control mb-md">
														<option>----Select----</option>
														<option>Option 1</option>
														<option>Option 2</option>
														<option>Option 3</option>
													</select>

												</div>
												<div class="form-group mt-lg">
												<label class="col-md-5 control-label" for="inputSuccess">Subject Name<span class="required">*</span>

												</label>
											<div class="col-md-10">
												<input type="text" name="subject_name" value="<?php echo $subject_name; ?>" class="form-control mb-md">
												<input type="hidden" name="subject_id" value="<?php echo $subject_id; ?>" class="form-control mb-md">
											</div>

											</div>
												<input type="hidden" value="<?php echo $subject_id;?>" name="subject_id">
												<input type="submit" name="update" style="margin-left: 15px" class="btn btn-primary" > 
									         </div>
													
							</form>
								</div>
								

							</section>
						</div>
					</div>
</section>

<?php include "includes/footer.php"; ?>
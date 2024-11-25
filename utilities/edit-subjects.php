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
		$department_id = $row['department_id'];
		$category_id = $row['category_id'];

		# code...
	}
}
$query = "SELECT * FROM  tbl_department ORDER BY id DESC";
	$result = $crud->getData($query);
	$query1 = "SELECT * FROM  tbl_category ORDER BY id DESC";
	$results = $crud->getData($query1);

?>
<?php include "includes/head-logo.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/sidebar.php"; ?>


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

									<h2 class="panel-title">Edit Subject</h2>

									<!-- <p class="panel-subtitle">
										This is an example of form with multiple block columns.
									</p> -->
								</header>
								<div class="panel-body">
									<form class="form-group" action="classes/subject-code.php" method="post">
									<div class="col-md-6">
									<label>Select Department<span class="required">*</span></label>
										
												<select id="company" name="dept" class="form-control" required>
													<option value="" >--Select--</option>
													<?php foreach ($result as $key => $rows) { ?>
													<option value="<?php echo $rows['department_id']; ?>" <?php if($rows['department_id']=='$department_id') {echo "selected"; }?>><?php echo $rows['department_name']; ?></option>
													<?php } ?>
												</select>
											</div>
											<div class="col-md-6">
											<label>Select Category<span class="required">*</span></label>
										
												<select id="company" name="cat" class="form-control" required>
													<option value="" >--Select--</option>
													<?php foreach ($results as $key => $rows) { ?>
													<option value="<?php echo $rows['category_id']; ?>" ><?php echo $rows['category_name']; ?></option>
													<?php } ?>
												</select>
											</div>
											<div class="col-md-6">
											<label>Subject Name<span class="required">*</span></label>
											
												<input type="text" name="subject_name" value="<?php echo $subject_name; ?>" class="form-control mb-md">
												<input type="hidden" name="subject_id" value="<?php echo $subject_id; ?>" class="form-control mb-md">
											</div>
										<div class="col-md-6">
											<div>&nbsp;</div>
											<input type="submit" name="update" style="margin-left: 15px" class="btn btn-primary" > 
											<button class="btn btn-secondary">Cancel</button>
									</div>
													
							</form>
								</div>
								

							</section>
						</div>
					</div>
</section>

<?php include "includes/footer.php"; ?>
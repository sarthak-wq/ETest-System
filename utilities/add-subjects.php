<?php
	include_once("classes/etsystem.php");
	$crud = new Etstysem();
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
						<h2>Add Subjects</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Subjects</span></li>
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

									<h2 class="panel-title">Add Subjects</h2>

									<!-- <p class="panel-subtitle">
										This is an example of form with multiple block columns.
									</p> -->
								</header>
								<div class="panel-body">
									<form class="row form-group" action="classes/subject-code.php" method="post">
										
											<label class="col-md-2 control-label" for="inputSuccess">Select Department<span class="required">*</span></label>
											<div class="col-md-9">
												<select id="company" name="dept" class="form-control" required>
													<option value="" >--Select--</option>
													<?php foreach ($result as $key => $rows) { ?>
													<option value="<?php echo $rows['department_id']; ?>" name="dept"><?php echo $rows['department_name']; ?></option>
													<?php } ?>
												</select>
											</div>
											<label class="col-md-2 control-label" for="inputSuccess">Select Category<span class="required">*</span></label>
											<div class="col-md-9">
												<select id="company" name="cat" class="form-control" required>
													<option value="" >--Select--</option>
													<?php foreach ($results as $key => $rows) { ?>
													<option value="<?php echo $rows['category_id']; ?>" name="cat"><?php echo $rows['category_name']; ?></option>
													<?php } ?>
												</select>
											</div>
											<label class="col-md-2 control-label" for="inputSuccess">Subject Name<span class="required">*</span></label>
											<div class="col-md-9">
												<input type="text" name="subject_name" class="form-control mb-md">
												<!-- <input type="hidden" name="subject_id" class="form-control mb-md"> -->
											</div>
										<footer class="panel-footer">
											<input type="submit" name="Submit" style="margin-left: 15px" class="btn btn-primary" > 
											<button class="btn btn-secondary">Cancel</button>
										</footer>
											
									</form>
								</div>
							</section>
						</div>
					</div>
</section>

<?php include "includes/footer.php"; ?>

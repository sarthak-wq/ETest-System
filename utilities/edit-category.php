<?php
	include_once 'C:/xampp/htdocs/ETEST_SYSTEMS-main/category/includes/DbConfig.php';
    include_once("classes/etsystem.php");
$crud = new Etstysem();
$category_id = $crud->escape_string($_GET['id']);
if(!empty($category_id))
{
	$query = "SELECT * FROM  tbl_category WHERE id = $category_id";
	$results = $crud->getData($query);
	foreach ($results as $key => $row) {
		$categoryname = $row['category_name'];
		$departmentname = $row['department_name'];

		# code...
	}
}
?>
<?php include "includes/head-logo.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/sidebar.php"; ?>

<section role="main" class="content-body">
					<header class="page-header">
						<h2>Edit Categories</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Categories</span></li>
								<li><span>Edit</span></li>
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

									<h2 class="panel-title">Edit Categories</h2>

									<!-- <p class="panel-subtitle">
										This is an example of form with multiple block columns.
									</p> -->
								</header>
								<div class="panel-body">
									<form class="row form-group" action="classes/category_code.php" method="POST">
                                      <div class="form-group mt-lg">
														<label class="col-sm-3 control-label">Category Name<span class="required">*</span></label>
														<div class="col-sm-9">
														<input type="text" name="categoryname" value="<?php echo $categoryname; ?>" class="form-control">
														<input type="hidden" name="category_id" value="<?php echo $category_id; ?>" class="form-control">
														</div>
													</div>
													<div class="form-group mt-lg">
														<label class="col-sm-3 control-label">Select Department<span class="required">*</span></label>
														<div class="col-sm-9">
															<select name="departmentname" id="category_id" required>
  																<option value="">1</option>
  																<option value="">2</option>
  																<option value="">3</option>
  																<option value="">4</option>
															</select>
														</div>
													</div>
										<div style="margin-top: 10px;" class="col-md-12 text-right">
											<input role="button" value="Submit" type="Submit" name="Update" class="btn btn-primary ">
											<button class="btn btn-secondary">Cancel</button>
                                        </div>
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
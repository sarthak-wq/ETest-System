<?php 
	
	// error_reporting(0);
    include_once("classes/etsystem.php");
    $crud = new Etstysem();
	

   if(!empty($_GET['id'])) {
	
    $id = $_GET['id'];
    
	$query = "SELECT * FROM  tbl_department WHERE id = $id ";
    $results = $crud->getData($query);
    
	 
	foreach( $results as $key => $row)
	{
        $name = $row['department_name'];
	}
    
   }

?>

<?php 
    include "includes/head-logo.php";
    include "includes/header.php"; 
    include "includes/sidebar.php"; 
?>

<section role="main" class="content-body">
					<header class="page-header">
						<h2>Edit Department</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Department</span></li>
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

									<h2 class="panel-title">Edit Department</h2>

									<!-- <p class="panel-subtitle">
										This is an example of form with multiple block columns.
									</p> -->
								</header>
								<div class="panel-body">
									<form class="row form-group" action="classes/department_code.php" method="post">
													
										<div class="mt-lg col-sm-12">
												<label class="col-md-5 control-label" for="inputSuccess">Department Name<span class="required">*</span></label>
											<div class="col-md-10 col-sm-12">
												<input class="form-control mb-md" name="dept_name" type="text" value="<?php echo $name; ?>">
											</div>
                                            <input class="form-control mb-md" name="id" type="hidden" value="<?php echo $id; ?>">
										</div>
										<div style="margin-top: 10px;" class="col-md-12 text-right">
											<input role="button" value="Update" type="Submit" name="update" class="btn btn-primary ">
											<button class="btn btn-secondary">Cancel</button>
                                        </div>
									</form>
								</div>
								
							</section>
						</div>
					</div>
</section>

<?php include "includes/footer.php"; ?>
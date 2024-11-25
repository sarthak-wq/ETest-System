<?php
    //error_reporting(0);
	include_once 'includes/DbConfig.php';
    include_once("classes/etsystem.php");
$crud = new Etstysem();
$advertisementId = $crud->escape_string($_GET['id']);
if(!empty($advertisementId))
{
	$query = "SELECT * FROM  tbl_advertisement WHERE id = $advertisementId";
	$results = $crud->getData($query);
	foreach ($results as $key => $row) {
		$advertisement_name = $row['advertisement_name'];
		$advertisement_valid_from = $row['advertisement_valid_from'];
		$advertisement_valid_to = $row['advertisement_valid_to'];
		$advertisement_description = $row['advertisement_description'];
		$advertisementimage = $row['advertisement_image'];
		
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
						<h2>Add Advertisement</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
								<li><span>Add Advertisement</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					
					<form  action="classes/advertisement-code.php"  method="post" enctype="multipart/form-data">
					<div class="col-md-6" style="width: 100%;">
							<section class="panel">
								<header class="panel-heading">
									

									<h2 class="panel-title">Advertisement Registration</h2>

									<p class="panel-subtitle">
										
									</p>
								</header>
								
								<div class="panel-body">

									
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">Advertisement Name</label>
												<input type="text" name="advertisement_name" value="<?php echo $advertisement_name; ?>" class="form-control">
												<input type="hidden" name="advertisementId" value="<?php echo $advertisementId; ?>" class="form-control">
											</div>
										
											<div class="form-group">
												<label class="control-label">Advertisement Valid From</label>
												<input type="date" name="advertisement_valid_from" value="<?php echo $advertisement_valid_from; ?>" class="form-control">
											</div>
										
											<div class="form-group">
												<label class="control-label">Advertisement Valid To</label>
												<input type="date" name="advertisement_valid_to" value="<?php echo $advertisement_valid_to; ?>" class="form-control">
											</div>
									
											<div class="form-group">
												<label class="control-label">Description</label>
												<textarea name="advertisement_description" value="<?php echo $advertisement_description; ?>" cols="60" rows="10" required="required">
                                                </textarea>
											</div>
										
										
											<div class="form-group">
												<label class="control-label">Image</label>
												<input type="file" name="advertisement_image" class="form-control">
												<img src="photo/<?php echo $advertisementimage; ?>" width="80" height = "80">
											</div>
										</div>
									
								</div>
								<footer class="panel-footer">
									<button type="submit" name="Update" value="Update" class="btn btn-primary">Update</button>
								</footer>
							
							</section>
						</div>
					</div>
					</form>


			
					<!-- end: page -->
				</section>
			</div>

			
		</section>

<?php include "includes/footer.php"; ?>
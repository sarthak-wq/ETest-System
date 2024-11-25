<?php
error_reporting(0);
include_once'includes/DbConfig.php';
include_once("classes/etsystem.php");
$crud = new Etstysem();
$client_name='';
$client_id = $crud->escape_string($_GET['id']);
if(!empty($client_id))
{
	$query = "SELECT * FROM  tbl_client_logo WHERE id = $client_id";
	$results = $crud->getData($query);
	foreach ($results as $key => $row) {
		$client_name = $row['client_name'];
		$client_logo=$row['client_logo'];

		# code...
	}
}
?>
<?php include "includes/head-logo.php"; ?>
<?php include "includes/header.php"; ?>
<?php //include "includes/sidebar.php"; ?>


<section role="main" class="content-body">
					<header class="page-header">
						<h2>Update Client Logo</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Client Logo</span></li>
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

									<h2 class="panel-title">Add Client Logo</h2>

									<!-- <p class="panel-subtitle">
										This is an example of form with multiple block columns.
									</p> -->
								</header>
								<div class="panel-body">
									<form class="row form-group" action="clientlogo-code.php" method="post" enctype="multipart/form-data" >
											<div class="form-group mt-lg">
												<label class="col-md-5 control-label" for="inputSuccess">Client Name<span class="required">*</span></label>
											    <div class="col-md-10">
						                        <input class="form-control mb-md" name="client_name" type="text" placeholder="Enter client name" value="<?php echo $client_name; ?>">
						                        </div>
											</div>
										
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">Upload Logo</label>
												<input type="file" name="sign" class="form-control">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<input type="hidden" name="client_id" value="<?php echo $client_id; ?>" class="form-control">
											</div>
										</div>

										<div style="margin-top: 10px;" class="col-md-12 text-left">
											<input role="button" value="update" type="Submit" name="update" class="btn btn-primary ">
											<button class="btn btn-secondary">Cancel</button>
                                        </div>
									</form>
								</div>
								

							</section>
						</div>
					</div>
</section>

<?php include "includes/footer.php"; ?>
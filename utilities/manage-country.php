<?php
	error_reporting(0);
    include_once("classes/etsystem.php");
    $crud = new Etstysem();
	$query = "SELECT * FROM  tbl_country ORDER BY con_id DESC";
	$results = $crud->getData($query);

	if(!empty($_GET['conid '])) {
      $conId = $crud->escape_string($_GET['conid ']);
    
      $result = $crud->delete($conId, 'tbl_country');
       
     header("location:manage-country.php");
   }

   $conId = $crud->escape_string($_GET['editid']);
	if(!empty($conId))
	{
		$query = "SELECT * FROM  tbl_country WHERE con_id = $conId";
		$results = $crud->getData($query);
		foreach ($results as $key => $row) {
			$subject_name = $row['con_name'];
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
						<h2>Manage Country </h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
								<li><span>Country</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					<form method="post" action="classes/subject_code.php">
						<input type="hidden" name="subject_id" class="form-control" value="<?php echo $subeditId; ?>" />
                      <div class="row">
                      	<div class="form-group">
						<label class="col-sm-3 control-label">Country Name<span class="required">*</span></label>
						<div class="col-sm-6">
							<input type="text" name="subject_name" class="form-control" placeholder="..." required value="<?php echo $subject_name; ?>" />
						</div>
						<div class="col-sm-3">
						<?php if(empty($subeditId)) { ?>
							<input type="Submit" name="Submit" class="btn btn-primary" value="Submit" />
						<?php } else { ?>
                           <input type="Submit" name="Update" class="btn btn-primary" value="Update" />
                        <?php } ?>
						</div>
					</div>
					<div class="form-group"> &nbsp;</div>
				</div>
				</form>
					<!-- start: page -->
                    <section class="panel">

                    	

							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>
								</div>
						
								<h2 class="panel-title">Country List</h2>
							</header>
							<div class="panel-body">
                            <div class="col-sm-6">
							<!-- ---- -->
							<!-- ----- -->
							
			</div>				
				<div class="col-sm-12 col-md-6">
						
				</div>
                   

								
								<table class="table table-bordered table-striped mb-none" id="datatable-editable">
									<thead>
										<tr>
											<th>Sr. No.</th>
											<th>Country Id</th>
											<th>Country Name</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php  $i =1; foreach ($results as $key => $row) { ?>
											
										<tr class="gradeX">
											<td><?php echo $i++; ?></td>
											<td><?php echo $row['con_id']; ?></td>
											<td><?php echo $row['con_name']; ?></td>
                                           
											<td class="actions">
											<a href="manage-country.php?editid=<?php echo $row['id']; ?>" class="btn btn-success btn-sm btn-custom rounded-0"><i class="fa fa-pencil" title="Edit" alt="Edit" style="color: white"></i></a>&nbsp;

		                                    <a href="manage-country.php?conid=<?php echo $row['id']; ?>"  class="btn btn-danger btn-sm rounded-0 btm-custom" onclick="return confirm('do you want to delete this Record?');"><i class="fa fa-trash-o"  title="Delete" alt="Delete" style="color: white"></i></a>
											</td>
										</tr>
										<?php } ?>
										
									</tbody>
								</table>
							</div>
						</section>
					<!-- end: page -->
				</section>
			</div>

		</section>

		<div id="modalMD" class="modal-block mfp-hide">
			<section class="panel">
				<header class="panel-heading">
					<h2 class="panel-title">Are you sure?</h2>
				</header>
				<div class="panel-body">
					<div class="modal-wrapper">
						<div class="modal-text">
							<p>Are you sure that you want to delete this row?</p>
						</div>
					</div>
				</div>
				<footer class="panel-footer">
					<div class="row">
						<div class="col-md-12 text-right">
							<button id="dialogConfirm" class="btn btn-success">Yes</button>
							<button id="dialogCancel" class="btn btn-danger">No</button>
						</div>
					</div>
				</footer>
			</section>
		</div>

<?php include "includes/footer.php"; ?>
     	
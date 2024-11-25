<?php
	error_reporting(0);
    include_once("classes/etsystem.php");
    $crud = new Etstysem();
	$query = "SELECT * FROM  tbl_state ORDER BY id DESC";
	$results = $crud->getData($query);

	$queryCountry = "SELECT * FROM  tbl_country ORDER BY con_name ASC";
	$resultCountry = $crud->getData($queryCountry);
?>
<?php
	include "includes/head-logo.php";
	include "includes/header.php"; 
	include "includes/sidebar.php";  
?>

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Manage State </h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
								<li><span>State</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					<form method="post" action="state_code.php">
                      <div class="row">
                      	<div class="form-group">
						<label class="col-sm-2 control-label">Country Name<span class="required">*</span></label>
						<div class="col-sm-3">
							  

							<select name="con_name" id="con_name" class="form-control">
							<?php  foreach ($resultCountry as $key => $row) { ?>
								<option value="<?php echo $row['con_id']; ?>"><?php echo $row['con_name']; ?></option>
							<?php } ?>
							</select>
							
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">State Name<span class="required">*</span></label>
						<div class="col-sm-3">
							<input type="text" name="state_name" class="form-control" placeholder="..." required/>
						</div>
						<div class="col-sm-2">
							<input type="Submit" name="Submit" class="btn btn-primary" value="Submit" />
						</div>
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
						
								<h2 class="panel-title">State List</h2>
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
											<th>Country Name</th>
											<th>State Name</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php $i =1; foreach ($results as $key => $row) { ?>
											
										<tr class="gradeX">
											<td><?php echo $i++; ?></td>
											<td><?php echo $row['con_id']; ?></td>
											<td><?php echo $row['state_name']; ?></td>
                                           
											<td class="actions">
												  <a href="manage-state.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm btn-custom rounded-0"><i class="fa fa-pencil" title="Edit" alt="Edit" style="color: white"></i></a>&nbsp;

												<a href="manage-state.php?id=<?php echo $row['id']; ?>"  class="btn btn-danger btn-sm rounded-0 btm-custom" onclick="return confirm('do you want to delete this Record?');"><i class="fa fa-trash-o"  title="Delete" alt="Delete" style="color: white"></i></a>
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
							<button id="dialogConfirm" class="btn btn-primary">Confirm</button>
							<button id="dialogCancel" class="btn btn-default">Cancel</button>
						</div>
					</div>
				</footer>
			</section>
		</div>

<?php include "includes/footer.php"; ?>
     	
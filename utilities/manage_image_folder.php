	<?php 
		// error_reporting(0);
		include_once("classes/etsystem.php");
		$crud = new Etstysem();
		$query = "SELECT * FROM 	tbl_subimages_folder ORDER BY id DESC";
		$results = $crud->getData($query);	 
	?>
<?php
	include "includes/head-logo.php";
	include "includes/header.php"; 
	include "includes/sidebar.php";  
?>

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Manage  Image Folder</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
								<li><span> Image Folder</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					<?php if(!empty($_GET['id']) && $_GET['edit']=="Update") { ?>
					<form method="post" action="classes/image_folder_code.php">
                      <div class="row">
                      	<div class="form-group">
                                               <div class="col-sm-4">
                                                   <label>Select Subject <span class="required">*</span></label>
						
							   <label>Select Subject <span class="required">*</span></label>
						
							<select id="subject_id" name="subject_id" class="form-control" required>
														<option value="" >--Select--</option>
														<?php 
															$query = "SELECT * FROM  tbl_subjects ORDER BY id DESC";
															$result = $crud->getData($query);
															foreach ($result as $key => $rows) {
														?>
														<option value="<?php echo $rows['subject_id']; ?>"><?php echo $rows['subject_name']; ?></option>
														<?php } ?>
													</select>
							<input type="hidden" name="category_id" value="<?php echo $id ?>">
						</div>
                                         <div class="col-sm-4">
						<label>Folder Name<span class="required">*</span></label>
						
							
							<input type="text" name="folder_name" class="form-control"  placeholder="..." required/>
							
							
						</div>
						<div class="col-sm-4">
							<input type="Submit" name="Submit" class="btn btn-primary" value="Submit" />
						</div>
					</div>
					<div class="form-group"> &nbsp;</div>
					</div>
					</form>
					<?php } ?>
					<?php if(!(!empty($_GET['id']) && $_GET['edit']=="Update")) {?>
						<form method="post" action="classes/image_folder_code.php">
                      <div class="row">
                      	<div class="form-group">
						 <div class="col-sm-4">
                                                   <label>Select Subject <span class="required">*</span></label>
						
							<select id="subject_id" name="subject_id" class="form-control" required>
														<option value="" >--Select--</option>
														<?php 
															$query = "SELECT * FROM  tbl_subjects ORDER BY id DESC";
															$result = $crud->getData($query);
															foreach ($result as $key => $rows) {
														?>
														<option value="<?php echo $rows['subject_id']; ?>"><?php echo $rows['subject_name']; ?></option>
														<?php } ?>
													</select>
							<input type="hidden" name="folder_id" value="<?php echo $id ?>">
						</div>
                                         <div class="col-sm-4">
						<label>Folder Name<span class="required">*</span></label>
						
							<input type="text" name="folder_name" class="form-control" value="<?php echo $folder_name; ?>" placeholder="..." required/>
							
						</div>
						<div class="col-sm-4">
							<input type="Submit" name="Submit" class="btn btn-primary" value="Submit" />
						</div>
					</div>
					<div class="form-group"> &nbsp;</div>
					</div>
					</form>
					<?php } ?>
					<!-- start: page -->
                    <section class="panel">

                    	

							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>
								</div>
						
								<h2 class="panel-title">Image Folder List</h2>
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
											<th>Subject Name</th>
											<th>Folder Name</th>
											<th>Create Date</th>
											<th>Status</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php $i =1; foreach ($results as $key => $row) { ?>
											
										<tr class="gradeX">
											<td><?php echo $i++; ?></td>
											<td><?php echo $row['subject_id']; ?></td>
											<td><?php echo $row['folder_name']; ?></td>
                                            <td><?php echo date('d-m-Y',strtotime($row['created_date']));?></td>
                                            <td>
												
													<?php if($row['currentStatus']=='y'){ ?>
														<form action="manage_image_folder.php" method="post">
															<button type="button" data-status="active" name="act" class="btn btn-success btn-sm btn-custom rounded-0" data-toggle="modal" data-target="#exampleModalCenter" data-id="<?php echo $row['id']; ?>">Active</button>
														</form>
														
													
													<?php } ?>
													<?php if($row['currentStatus']=='n'){ ?>
													<form action="manage_image_folder.php" method="post">
														<button type="button" class="btn btn-danger btn-sm btn-custom rounded-0" name="inact" data-status="inactive" data-toggle="modal" data-target="#exampleModalCenter" data-id="<?php echo $row['id']; ?>">Inactive</button>
													</form>
														
													
													<?php } ?>
												</td>
											<td class="actions">
												<a href="manage_image_folder.php?id=<?php echo $row['id']; ?>&edit=Update"class="btn btn-success btn-sm btn-custom rounded-0"><i class="fa fa-pencil" title="Edit" alt="Edit" style="color: white"></i></a>
												<a href="manage_image_folder.php?id=<?php echo $row['id']; ?>&delete=Delete" onclick="return confirm('do you want to delete this Record?');"  class="btn btn-danger btn-sm btn-custom rounded-0"  title="View"  style="color: white"><i class="fa fa-trash-o"></i></a>
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
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title mx-auto" id="exampleModalLongTitle"><b>Do you really want to change status</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="classes/image_folder_code.php" class="mx-auto" method="post">
			<input type="hidden" name="hiddenValue" id="hiddenValue" value="" />
			<input type="hidden" name="status" id="status" value="" /><br>
			<input type="submit" name="active" value="Yes" class="btn btn-success"/>
			<input type="submit" value="No" class="btn btn-default" data-dismiss="modal"/>
		</form>
			
      </div>
    </div>
  </div>
</div>

<?php include "includes/footer.php"; ?>

<script type="text/javascript">
    $(document).on("click", ".exampleModal", function () {
     var myBookId = $(this).data('id');
	 var stat = $(this).data('status');
     $(".modal-body #hiddenValue").val( myBookId );
	 $(".modal-body #status").val( stat );
});
</script> 
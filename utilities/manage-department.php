<?php
	error_reporting(0);
    include_once("classes/etsystem.php");
	$crud = new Etstysem();
	$id = $_GET['id'];
	$query = "SELECT * FROM  tbl_department ORDER BY id DESC";
	$results = $crud->getData($query);
	if(!empty($_GET['id']) && $_GET['delete']=="Delete") {

		$noticeId = $crud->escape_string($_GET['id']);

		$result = $crud->delete($noticeId, 'tbl_department');
		 
	   header("location:manage-department.php");
		# code...
	 }
	 if(!empty($_GET['id']) && $_GET['edit']=="Update") {

		$id = $crud->escape_string($_GET['id']);
		 
		$query = "SELECT * FROM  tbl_department WHERE id='$id'";
		$result = $crud->getData($query);
		foreach( $result as $key => $rows)
		{
			$cname = $rows['department_name'];
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
						<h2>Manage Department </h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
								<li><span>Department</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

				<?php if(!empty($_GET['id']) && $_GET['edit']=="Update") { ?>
					<form method="post" action="classes/department_code.php">
                      <div class="row">
                      	<div class="form-group">
						<label class="col-sm-3 control-label">Department Name<span class="required">*</span></label>
						<div class="col-sm-6">
							<input type="text" name="dept_name" class="form-control" value="<?php echo $cname; ?>" placeholder="..." required/>
							<input type="hidden" name="id" value="<?php echo $id ?>">
						</div>
						<div class="col-sm-3">
							<input type="Submit" name="Update" class="btn btn-primary" value="Update" />
						</div>
					</div>
					<div class="form-group"> &nbsp;</div>
					</div>
					</form>
					<?php } ?>
					<?php if(!(!empty($_GET['id']) && $_GET['edit']=="Update")) {?>
						<form method="post" action="classes/department_code.php">
                      <div class="row">
                      	<div class="form-group">
						<label class="col-sm-3 control-label">Department Name<span class="required">*</span></label>
						<div class="col-sm-6">
							<input type="text" name="department_name" class="form-control" value="" placeholder="..." required/>
						</div>
						<div class="col-sm-3">
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
							<!-- &nbsp;&nbsp; -->
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>
								</div>
						
								<h2 class="panel-title">Department List</h2>
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
											<th>Department Id</th>
											<th>Department Name</th>
											<th>Create Date</th>
											<th>Status</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php $i =1; foreach ($results as $key => $row) { ?>
											
										<tr class="gradeX">
											<td><?php echo $i++; ?></td>
											<td><?php echo $row['department_id']; ?></td>
											<td><?php echo $row['department_name']; ?></td>
                                            <td><?php echo date('d-m-Y',strtotime($row['created_date']));?></td>
                                            <td>
												
													<?php if($row['currentStatus']=='y'){ ?>
														<form action="manage-department.php" method="post">
															<button type="button" data-status="active" name="act" class="btn btn-success btn-sm btn-custom rounded-0" data-toggle="modal" data-target="#exampleModalCenter" data-id="<?php echo $row['id']; ?>">Active</button>
														</form>
														
													
													<?php } ?>
													<?php if($row['currentStatus']=='n'){ ?>
													<form action="manage-department.php" method="post">
														<button type="button" class="btn btn-danger btn-sm rounded-0 btm-custom" name="inact" data-status="inactive" data-toggle="modal" data-target="#exampleModalCenter" data-id="<?php echo $row['id']; ?>">Inactive</button>
													</form>
														
													
													<?php } ?>
												</td>
											<td class="actions">
												<a href="manage-department.php?id=<?php echo $row['id']; ?>&edit=Update" class="btn btn-success btn-sm btn-custom rounded-0" title="Edit" alt="Edit" style="color: white"><i class="fa fa-pencil"></i></a>
												<a href="manage-department.php?id=<?php echo $row['id']; ?>&delete=Delete" onclick="return confirm('do you want to delete this Record?');" class="btn btn-danger btn-sm rounded-0 btm-custom" title="View" alt="View" style="color: white"><i class="fa fa-trash-o"></i></a>
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
		<form action="classes/department_code.php" class="mx-auto" method="post">
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
     	
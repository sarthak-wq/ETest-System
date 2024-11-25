<?php 
	// error_reporting(0);
    include_once("classes/etsystem.php");
    $crud = new Etstysem();
	$query = "SELECT * FROM  tbl_user_registration ORDER BY id DESC";
	$results = $crud->getData($query);

   if(!empty($_GET['id'])) {

      //getting id of the data from url
      $noticeId = $crud->escape_string($_GET['id']);
       
      //deleting the row from table
      //$result = $crud->execute("DELETE FROM users WHERE id=$id");
      $result = $crud->delete($noticeId, 'tbl_user_registration');
       
     header("location:manage-user.php");
      # code...
   }

?>

<?php 
	include "includes/head-logo.php"; 
	include "includes/header.php"; 
	include "includes/sidebar.php"; 
?>

<section role="main" class="content-body">
					<header class="page-header">
						<h2>Manage User List</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
								<li><span>User List</span></li>
								<span>&nbsp</span>
							</ol>
					
							<!-- <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a> -->
						</div>
					</header>

					<!-- start: page -->
						<section class="panel">
							<header class="panel-heading">
								
   								<div class="row">
								   <h2 class="panel-title" style="display: inline-block;">User List</h2>
									<a type="button" style="float: right; margin-right: 25px;" class="btn btn-primary align-right" href="add-user.php">Add <i class="fa fa-plus"></i></a>
								</div>
							</header>
							<div class="panel-body">
								<!-- <div class="row">
									<div class="col-sm-6 col-md-9 d-inline">
										<div class="mb-md">
                                             <button id="addToTable" class="btn btn-primary">Add <i class="fa fa-plus"></i></button> 
                                            <
   										</div> -->
                                            
								<table class="table table-bordered table-striped mb-none" id="datatable-editable">
									<thead>
										<tr>
											<th>Sr. No </th>
											<th>User ID</th>
											<th>User Name</th>
                                            <th>Mobile No.</th>
											<th>Email</th>
                                            <th>Image</th>
                                            <th>Created date</th>
											<th>Status</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php $i =1; foreach ($results as $key => $row) { ?>
											<tr class="gradeX">
												<td><?php echo $i++; ?></td>
												<td><?php echo $row['user_id']; ?></td>
												<td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
												
												<td><?php echo $row['mobile']; ?></td>
												<td><?php echo $row['email']; ?></td>
												<td> <img src="photo/<?php echo $row['image']; ?>" width="50" height = "50"></td>
												<td><?php $created_date = $row['created_date'];
												echo date('d-m-Y',strtotime($created_date));										
												?></td>
												<td>
												
												<?php if($row['currentStatus']=='y'){ ?>
													<form action="manage-candidate.php" method="post">
														<button type="button" data-status="active" name="act" class="btn btn-success btn-sm rounded-0 btm-custom" data-toggle="modal" data-target="#exampleModalCenter" data-id="<?php echo $row['id']; ?>">Active</button>
													</form>
													
												
												<?php } ?>
												<?php if($row['currentStatus']=='n'){ ?>
												<form action="manage-candidate.php" method="post">
													<button type="button" class="btn btn-danger btn-sm rounded-0 btm-custom" name="inact" data-status="inactive" data-toggle="modal" data-target="#exampleModalCenter" data-id="<?php echo $row['id']; ?>">Inactive</button>
												</form>
													
												
												<?php } ?>
											</td>
												<td class="actions">
													<a href="edit-user.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm btn-custom rounded-0" title="Edit" alt="Edit" style="color: white"><i class="fa fa-pencil"></i></a>
													<a href="manage-user.php?id=<?php echo $row['id']; ?>" onclick="return confirm('do you want to delete this Record?');" class="btn btn-danger btn-sm rounded-0 btm-custom" title="View" alt="View" style="color: white"><i class="fa fa-trash-o"></i></a>
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
		<form action="classes/user-code.php" class="mx-auto" method="post">
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
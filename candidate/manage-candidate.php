<?php 
	
	//error_reporting(0);
    include_once 'includes/DbConfig.php';
    include_once("classes/etsystem.php");
    $crud = new Etstysem();
	$query = "SELECT * FROM  tbl_candidate_registration ORDER BY id DESC";
	$results = $crud->getData($query);

   if(!empty($_GET['id'])) {

      //getting id of the data from url
      $noticeId = $crud->escape_string($_GET['id']);
       
      //deleting the row from table
      //$result = $crud->execute("DELETE FROM users WHERE id=$id");
      $result = $crud->delete($noticeId, 'tbl_candidate_registration');
       
     header("location:manage-candidate.php");
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
						<h2>Candidate List</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Table</span></li>
								<li><span>Canidate</span></li>
								<span>&nbsp&nbsp</span>
							</ol>
					
							<!-- <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a> -->
						</div>
					</header>

					<!-- start: page -->
						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>
								</div>
   								<div class="row">
								   <h2 class="panel-title" style="display: inline-block;">Candidate Table</h2>
									<a type="button" style="float: right; margin-right: 80px;" class="btn btn-primary align-right"  href="add-candidate.php" >Add <i class="fa fa-plus"></i></a>
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
											<th>Candidate ID</th>
											<th>Candidate Name</th>
                                            <th>Date of Birth</th>
                                            <th>Gender</th>
                                            <th>Mobile No.</th>
											<th>Image</th>
											<th>Create Date</th>
											<th>Status</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php $i =1; foreach ($results as $key => $row) { ?>
											<tr class="gradeX">
												<td><?php echo $i++; ?></td>
												<td><?php echo $row['candidate_id']; ?></td>
												<td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
												<td><?php echo $row['d_o_b']; ?></td>
												<td><?php echo $row['gender']; ?></td>
												<td><?php echo $row['mobile']; ?></td>
												<td> <img src="avatar/<?php echo $row['avatar']; ?>" width="80" height = "80"></td>
												<td><?php echo date('d-m-Y',strtotime($row['created_date']));?></td>
												<td>
												
													<?php if($row['currentStatus']=='y'){ ?>
														<form action="manage-candidate.php" method="post">
															<button type="button" data-status="active" name="act" class="btn btn-success exampleModal" data-toggle="modal" data-target="#exampleModalCenter" data-id="<?php echo $row['id']; ?>">Active</button>
														</form>
														
													
													<?php } ?>
													<?php if($row['currentStatus']=='n'){ ?>
													<form action="manage-candidate.php" method="post">
														<button type="button" class="btn btn-danger exampleModal" name="inact" data-status="inactive" data-toggle="modal" data-target="#exampleModalCenter" data-id="<?php echo $row['id']; ?>">Inactive</button>
													</form>
														
													
													<?php } ?>
												</td>
												<td class="actions">
													<a href="edit-candidate.php?id=<?php echo $row['id']; ?>" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
													<a href="manage-candidate.php?id=<?php echo $row['id']; ?>" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
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
		<form action="classes/candidate_code.php" class="mx-auto" method="post">
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
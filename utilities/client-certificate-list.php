<?php 
	
	// error_reporting(0);
    include_once("classes/etsystem.php");
    $crud = new Etstysem();
	$query = "SELECT * FROM    tbl_client_registration ORDER BY id DESC";
	$results = $crud->getData($query);

   if(!empty($_GET['id'])) {

      //getting id of the data from url
      $noticeId = $crud->escape_string($_GET['id']);
       
      //deleting the row from table
      //$result = $crud->execute("DELETE FROM users WHERE id=$id");
      $result = $crud->delete($noticeId, 'tbl_notice');
       
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
						<h2>Manage  Clients Certificate </h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashbord</span></li>
								<li><span>Clients List</span></li>
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
								   <h2 class="panel-title" style="display: inline-block;"> Client Certificate List</h2>
									<a type="button" style="float: right; margin-right: 80px;" class="btn btn-primary align-right"  href="add-client-certificate.php">Add <i class="fa fa-plus"></i></a>
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
											<th>Clients Name</th>
                                            <th>Gender</th>
                                            <th>Mobile No.</th>
                                            <th>Create Date</th>                                           
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php $i =1; foreach ($results as $key => $row) { ?>
											<tr class="gradeX">
												<td><?php echo $i++; ?></td>
												<td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
												<td><?php echo $row['gender']; ?></td>
												<td><?php echo $row['mobile']; ?></td>
												<td><?php echo $row['created_date']; ?></td>
												
												<td>
													<?php if($row['currentStatus']=='y'){ ?>
													<a class="mb-xs mt-xs mr-xs modal-basic " href="#modalCenter"><input type="button" name="name" class="btn btn-success" value="Active" /></a>
													<?php } ?>
													<?php if($row['currentStatus']=='n'){ ?>
													<a class="mb-xs mt-xs mr-xs modal-basic " href="#modalCenter"><input type="button" name="name" class="btn btn-danger"  value="Inactive" /></a>
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

			<div id="modalCenter" class="modal-block mfp-hide">
				<section class="panel">
					<div class="panel-body">
						<div class="modal-wrapper">
							<div class="modal-text text-center">
								<p>Are you sure that you want to Change Status?</p>
								<button class="btn btn-primary modal-confirm">Confirm</button>
								<button class="btn btn-default modal-dismiss">Cancel</button>
							</div>
						</div>
					</div>
				</section>						
			</div>							

		</section>

		<div id="dialog" class="modal-block mfp-hide">
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
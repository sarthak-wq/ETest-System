<?php 
	// error_reporting(0);
    include_once'includes/DbConfig.php';
    include_once("classes/etsystem.php");
    $crud = new Etstysem();
	$query = "SELECT * FROM tbl_client_logo ORDER BY id DESC";
	$results = $crud->getData($query);

   if(!empty($_GET['id'])) {

      //getting id of the data from url
      $noticeId = $crud->escape_string($_GET['id']);

       
      //deleting the row from table
      //$result = $crud->execute("DELETE FROM users WHERE id=$id");
      $result = $crud->delete($noticeId, 'tbl_client_logo');
       
     header("location:manage-clientlogo.php");
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
						<h2>Client Logo Table</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Table</span></li>
								<li><span>Client Logo</span></li>
							</ol>
					
							<!-- <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a> -->
						</div>
					</header>

					<!-- start: page -->
						<!-- <section class="panel">
							<form method="post" action="clientlogo-code.php">
			                      <div class="row">
			                      	<div class="form-group">
									<label class="col-sm-3 control-label">Client Name<span class="required">*</span></label>
									<div class="col-sm-6">
										<input type="text" name="client_name" class="form-control" placeholder="..." required/>
									</div>
									<div class="col-sm-3">
										<input type="Submit" name="Submit" class="btn btn-primary" value="Submit" />
									</div>
								</div>
								<div class="form-group"> &nbsp;</div>
								</div> -->
							</form>
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>
								</div>
   								<div class="row">
								   <h2 class="panel-title" style="display: inline-block;">Client Logo</h2>
									<a type="button" style="float: right; margin-right: 80px;" class="btn btn-primary align-right"  href="add-clientlogo.php" >Add <i class="fa fa-plus"></i></a>
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
											<th>Client ID</th>
											<th>Client Name</th>
											<th>Logo</th>
                                            <th>Modified By</th>
                                            <th>Created By</th>
                                            <th>Status</th>
											<th>Actions</th>
										</tr>
										
									</thead>
									<tbody>
										<?php $i =1;
										if (is_array($results) || is_object($results))  {


										 foreach ($results as $key => $row) { ?>
											<tr class="gradeX">
												<td><?php echo $i++; ?></td>
												<td><?php echo $row['client_id']; ?></td>
												<td><?php echo $row['client_name']; ?></td>
											    <td> <img src="signature/<?php echo $row['client_logo']; ?>" width="80" height = "80"></td>
												<td><?php echo $row['modified_by']; ?></td>
												<td><?php echo $row['created_by']; ?></td>
												
											<td>

											<?php if($row['currentStatus']=='Y'){ ?>
														<form action="manage-clientlogo.php" method="post">
															<button type="button" data-button="btnActive" name="act" class="btn btn-success exampleModal" data-toggle="modal" data-target="#exampleModalCenter" data-id="<?php echo $row['id']; ?>">Active</button>
														</form>
														
													
													<?php } ?>
													<?php if($row['currentStatus']=='N'){ ?>
													<form action="manage-clientlogo.php" method="post">
														<button type="button" class="btn btn-danger exampleModal" name="inact" data-button="btnInactive" data-toggle="modal" data-target="#exampleModalCenter" data-id="<?php echo $row['id']; ?>">Inactive</button>
													</form>
														
													
													<?php } ?>
                                            </td>
												<td class="actions">
													<a href="edit-clientlogo.php?id=<?php echo $row['id']; ?>" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
													<a href="manage-clientlogo.php?id=<?php echo $row['id']; ?>" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
												</td>
											</tr>
										<?php }} ?>
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

			<aside id="sidebar-right" class="sidebar-right">
				<div class="nano">
					<div class="nano-content">
						<a href="#" class="mobile-close visible-xs">
							Collapse <i class="fa fa-chevron-right"></i>
						</a>
			
						<div class="sidebar-right-wrapper">
			
							<div class="sidebar-widget widget-calendar">
								<h6>Upcoming Tasks</h6>
								<div data-plugin-datepicker data-plugin-skin="dark" ></div>
			
								<ul>
									<li>
										<time datetime="2014-04-19T00:00+00:00">04/19/2014</time>
										<span>Company Meeting</span>
									</li>
								</ul>
							</div>
			
							<div class="sidebar-widget widget-friends">
								<h6>Friends</h6>
								<ul>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
								</ul>
							</div>
			
						</div>
					</div>
				</div>
			</aside>
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
		<form action="clientlogo-code.php" class="mx-auto" method="post">
			<input type="hidden" name="hiddenValue" id="hiddenValue" value="" />
			<input type="submit" id="btnact" name="active" value="Active" class="btn btn-success"/>
			<input type="submit"id="btninact" name="inactive" value="Inactive" class="btn btn-danger"/>
		</form>
      </div>
    </div>
  </div>
</div>

<?php include "includes/footer.php"; ?>

<script type="text/javascript">
    $(document).on("click", ".exampleModal", function () {
     var myBookId = $(this).data('id');
	 
     $(".modal-body #hiddenValue").val( myBookId );
	   
});
</script> 
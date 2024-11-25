<?php
	//error_reporting(0);
    include_once("classes/etsystem.php");
    $crud = new Etstysem();
	$query = "SELECT * FROM  tbl_advertisement ORDER BY id DESC";
	$results = $crud->getData($query);
?>
<?php
	include "includes/head-logo.php";
	include "includes/header.php"; 
	include "includes/sidebar.php";  
?>

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Manage Advertise </h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
								<li><span>Advertise</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					<!--<form method="post" action="">
                      <div class="row">
                      	<div class="form-group">
						<label class="col-sm-2 control-label">Advertise Name<span class="required">*</span></label>
						<div class="col-sm-6">
							<input type="text" name="name" class="form-control" placeholder="..." required/>
						</div>
						<div class="col-sm-2">
							<input type="file" name="file" class="form-control" placeholder="..." required/>
						</div>
						<div class="col-sm-2">
							<input type="Submit" name="name" class="btn btn-primary" />
						</div>
					</div>
					<div class="form-group"> &nbsp;</div>
				</div>
				</form>-->
					<!-- start: page -->
                    <section class="panel">

                    	

							<header class="panel-heading">					
								<div class="row">
								   <h2 class="panel-title" style="display: inline-block;">Advertisement List</h2>
									<a type="button" style="float: right; margin-right: 25px;" class="btn btn-primary align-right"  href="add-advertisement.php" >Add <i class="fa fa-plus"></i></a>
								</div>
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
											<th>Advertise Id</th>
											<th>Advertise Name</th>
											<th>Images</th>
											<th>Valid from</th>
											<th>Valid till</th>
											<th>Status</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($results as $key => $row) { ?>
											
										<tr class="gradeX">
											<td><?php echo $row['advertisement_id']; ?></td>
											<td><?php echo $row['advertisement_name']; ?></td>
											<td> <img src = "photo/<?php echo $row['advertisement_image']; ?>" width ="80">  </td>
                                            <td><?php echo $row['advertisement_valid_from']; ?></td>
                                            <td><?php echo $row['advertisement_valid_to']; ?></td>

                                           <td>
												
													<?php if($row['currentStatus']=='y'){ ?>
														<form action="manage-advertisement.php" method="post">
															<button type="button" data-button="btnActive" name="act" class="btn btn-success exampleModal" data-toggle="modal" data-target="#exampleModalCenter" data-id="<?php echo $row['id']; ?>">Active</button>
														</form>
														
													
													<?php } ?>
													<?php if($row['currentStatus']=='n'){ ?>
													<form action="manage-advertisement.php" method="post">
														<button type="button" class="btn btn-danger exampleModal" name="inact" data-button="btnInactive" data-toggle="modal" data-target="#exampleModalCenter" data-id="<?php echo $row['id']; ?>">Inactive</button>
													</form>
														
													
													<?php } ?>
												</td>

											<td class="actions">
													<a href="edit-advertisement.php?id=<?php echo $row['id']; ?>" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
													<a href="manage-advertisement.php?id=<?php echo $row['id']; ?>" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
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
		<form action="classes/advertisement-code.php" class="mx-auto" method="post">
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
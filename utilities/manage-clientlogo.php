<?php 
	// error_reporting(0);
    include_once("classes/etsystem.php");
    $crud = new Etstysem();
	$query = "SELECT * FROM tbl_client_logo ORDER BY id DESC";
	$results = $crud->getData($query);

   if(!empty($_GET['id'])) {

      $clientId = $crud->escape_string($_GET['id']);

      $result = $crud->delete($clientId, 'tbl_client_logo');
       
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
						<h2>Manage Client Logo </h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
								<li><span>Client Logo</span></li>
							</ol>
						<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
							
						</div>
					</header>

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
								
								<table class="table table-bordered table-striped mb-none" id="datatable-editable">
									<thead>
										<tr>
											<th>Sr. No </th>
											
											<th>Client Name</th>
											<th>Logo</th>
                                            <th>Created Date</th>
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
												
												<td><?php echo $row['client_name']; ?></td>
											    <td> <img src="photo/<?php echo $row['client_logo']; ?>" width="50" height = "50"></td>
												
												<td><?php $created_date = $row['created_date'];
												echo date('d-m-Y',strtotime($created_date));			
												 ?></td>
												<td>
													<?php if($row['currentStatus']=='Y'){ ?>
														<form action="manage-clientlogo.php" method="post">
															<button type="button" data-status="active" name="act" class="btn btn-success btn-sm btn-custom rounded-0" data-toggle="modal" data-target="#exampleModalCenter" data-id="<?php echo $row['id']; ?>">Active</button>
														</form>
														
													
													<?php } ?>
													<?php if($row['currentStatus']=='N'){ ?>
													<form action="manage-clientlogo.php" method="post">
														<button type="button" class="btn btn-danger exampleModal" name="inact" data-status="inactive" data-toggle="modal" data-target="#exampleModalCenter" data-id="<?php echo $row['id']; ?>">Inactive</button>
													</form>
														
													
													<?php } ?>
												</td>
												<td class="actions">
													<a href="edit-clientlogo.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm btn-custom rounded-0"><i class="fa fa-pencil" title="Edit"  style="color: white"></i></a>
													<a href="manage-clientlogo.php?id=<?php echo $row['id']; ?>" onclick="return confirm('do you want to delete this Record?');" class="btn btn-danger btn-sm btn-custom rounded-0"><i class="fa fa-trash-o" title="Edit"  style="color: white"></i></a>
												</td>
											</tr>
										<?php }} ?>
									</tbody>
								</table>
							</div>
						</section>

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
		<form action="classes/clientlogo-code.php" class="mx-auto" method="post">
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
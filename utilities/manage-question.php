<?php
	//error_reporting(0);
    include_once("classes/etsystem.php");
    $crud = new Etstysem();
	$query = "SELECT * FROM  tbl_questions ORDER BY id DESC";
	$results = $crud->getData($query);
    if(!empty($_GET['quesid'])) {
      $quesId = $crud->escape_string($_GET['quesid']);
      $result = $crud->execute("DELETE FROM tbl_questions WHERE id=$id");
      $result = $crud->delete($quesId, 'tbl_questions');
       
     header("location:manage-question.php");
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
						<h2>Manage Question </h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
								<li><span>Question</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
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
								   <h2 class="panel-title" style="display: inline-block;">Questions List</h2>
									<a type="button" style="float: right; margin-right: 80px;" class="btn btn-primary align-right"  href="add-question.php" >Add <i class="fa fa-plus"></i></a>
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
											<th>Sr. No.</th>
											<th>Questions Id</th>
											<th>Subjects Name</th>
											<th> Questions</th>
											
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php  $i =1; foreach ($results as $key => $row) { ?>
											
										<tr class="gradeX">
											<td><?php echo $i++; ?></td>
											<td><?php echo $row['question_id']; ?></td>
											<td><?php echo $row['subject_id']; ?></td>
											<td><?php echo $row['question_text']; ?></td>
                                          
                                           
											<td class="actions" style="width: 15%">
											<a href="view_question.php?quesid=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm btn-custom rounded-0"><i class="fa fa-eye" title="View" alt="View" style="color: white"></i></a> <a href="edit_question.php?quesid=<?php echo $row['id']; ?>"  class="btn btn-success btn-sm btn-custom rounded-0"><i class="fa fa-pencil" title="Edit" alt="Edit" style="color: white"></i></a>
<a href="manage-question.php?quesid=<?php echo $row['id']; ?>&delete=Delete" onclick="return confirm('do you want to delete this Record?');" class="btn btn-danger btn-sm btn-custom rounded-0" title="View" style="color: white"><i class="fa fa-trash-o"></i></a></td>
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
     	
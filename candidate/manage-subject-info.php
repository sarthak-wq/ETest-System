<?php
	//error_reporting(0);
    include_once("classes/etsystem.php");
    $crud = new Etstysem();
	$query = "SELECT * FROM  tbl_subject_info ORDER BY id DESC";
	$results = $crud->getData($query);
	if(!empty($_GET['id'])) {

		//getting id of the data from url
		$noticeId = $crud->escape_string($_GET['id']);
		 
		//deleting the row from table
		//$result = $crud->execute("DELETE FROM users WHERE id=$id");
		$result = $crud->delete($noticeId, 'tbl_subject_info');
		
	   header("location:manage-subject-info.php");
		
	 }
?>
<?php
	include "includes/head-logo.php";
	include "includes/header.php"; 
	include "includes/sidebar.php";  
?>
 <!-- Modal -->
                                        		<div id="modallg" class="modal-block modal-block-LG mfp-hide ">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Add New</h2>
											</header>
											<div class="panel-body">
												<div class="modal-wrapper">
													



											
										<form class="form-horizontal form-bordered" method="post" action="subjectinfo_code.php">
											
						
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-2 col-lg-2 col-md-5 control-label"name="dropdown">Select Subject</label>
											<div class="col-sm-7">
                                              
												<select id="company" class="form-control" required>
													<option value="">--Select--</option>
													<option value="apple">option1</option>
													<option value="google">option2</option>
													<option value="microsoft">option3</option>
													<option value="yahoo">option4</option>
												</select>
											</div>
                                        </div>
                                    </div>
                                    <label class="col-sm-2 col-lg-2 col-md-9 control-label">Subject Description</label>
										<div class="panel-body">
                                         <form class="form-horizontal form-bordered">
                                            <div class="form-group">
												<div class="col-md-9 col-sm-3 col-lg-9">
                                                 <textarea name="subject_info" data-plugin-markdown-editor rows="9">.....</textarea>
                                                </div>
											</div>
                                                    <br>
                                                    <br>
                                                    <br>
                                		</div>
                             </form>
                          <br>
                                <div class="input-group mb-3" style="margin:0 30px;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                     </div>
                                        <div class="custom-file">
                                        <input type="file" name="img" class="custom-file-input" id="inputGroupFile01">
                                 </div>
                                        </div>		
									<footer class="panel">
												<div class="row">
													<div class="col-md-12 text-right">
														<button class="btn btn-primary modal-confirm" style="margin-right:15px;">Submit</button>
														<button class="btn btn-default modal-dismiss">Close</button>
													</div>
												</div>
											</footer>
                                                </div>
                                            </div>
                                            </div>
                                            <!-- end modal -->
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>History</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
								<li><span>History Info </span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
				
					<!-- start: page -->
                    <section class="panel">

                    					

							<header class="panel-heading">
								<div class="panel-actions">
									 <button class="mb-xs mt-xs mr-xs modal-sizes btn btn-primary" href="#modalLG">Add<i class="fa fa-plus"></i></button>

									<div id="modalLG" class="modal-block modal-block-lg mfp-hide">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Are you sure?</h2>
											</header>
											<div class="panel-body">
												<div class="modal-wrapper">
													<div class="modal-text">
														<form class="form-group" action="classes/subjectinfo_code.php" enctype="multipart/form-data"  method="post">
												<label class="col-sm-12 col-md-3 control-label">Select Subject</label>
												<div class="col-sm-12 col-md-9">
													<select id="company" class="form-control" required>
														<option value="" name="abcd">--Select--</option>
														<option value="apple" name="abcd">option1</option>
														<option value="google" name="abcd">option2</option>
														<option value="microsoft" name="abcd">option3</option>
														<option value="yahoo" name="abcd">option4</option>
													</select>
												</div>
												<label class="col-sm-12 col-md-3 control-label">Subject Description</label>
															
												<div class="col-md-9 col-sm-12 ">
                                                    
													<textarea name="subject_info" data-plugin-markdown-editor rows="9">....</textarea>
                                                    </div>
													<div class="my-3" ><br></div>
													<div class="form-group justify-content-around">
													<label class="col-sm-12 col-md-3 control-label">Upload</label>							
													<div class="custom-file">
														<input type="file" class="custom-file-input" name="upload" id="inputGroupFile01">
													</div>
												<div class="col-md-9 col-sm-12 "><input type="submit" role="button" name="submit" value="submit" class="btn btn-primary col-3"><button class="btn btn-default modal-dismiss col-3">Cancel</button>
												</div>
												</div>
											</form>
													</div>
												</div>
											</div>
										</section>
									</div>  
																				
                                           
                                            <!-- end modal -->
									<span>&nbsp&nbsp</span>
									<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>
								</div>
						
								<h2 class="panel-title">History</h2>
							</header>
							<div class="panel-body">
                            <div class="col-sm-6">

							<!-- ---- -->
							<!-- ----- -->

							
			</div>				
			
				<div class="col-sm-12 col-md-6"style="text-align:right;">
						<label>
							<input type="search" class="form-control" placeholder="Search" aria-controls="datatable-editable">
							</label>
				</div>
                   

								
								<table class="table table-bordered table-striped mb-none" id="datatable-editable">
									<thead>
										<tr>
											<th>Sr. No</th>
											<th>Subject Info Id</th>
											<th>Subjects Id</th>
											<th>Subjects Info</th>
											<th>Image</th>
											<th>Create Date</th>
											<th>Status</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1; foreach ($results as $key => $row) { ?>
											
										<tr class="gradeX">
											<td><?php echo $i++; ?></td>
											<td><?php echo $row['subject_info_id']; ?></td>
											<td><?php echo $row['subject_id']; ?></td>
											<td><?php echo $row['subject_info']; ?></td>
											<td><img src="../subject-info-images/<?php echo $row['subject_image']; ?>"width="80" height = "80" /></td>
                                            <td><?php echo $row['created_date']; ?></td>
                                            <td>
												
													<?php if($row['currentStatus']=='y'){ ?>
														<form action="manage-subject-info.php" method="post">
															<button type="button" data-status="active" name="act" class="btn btn-success exampleModal" data-toggle="modal" data-target="#exampleModalCenter" data-id="<?php echo $row['id']; ?>">Active</button>
														</form>
														
													
													<?php } ?>
													<?php if($row['currentStatus']=='n'){ ?>
													<form action="manage-subject-info.php" method="post">
														<button type="button" class="btn btn-danger exampleModal" name="inact" data-status="inactive" data-toggle="modal" data-target="#exampleModalCenter" data-id="<?php echo $row['id']; ?>">Inactive</button>
													</form>
														
													
													<?php } ?>
												</td>
											<td class="actions">
												<a href="edit-subject-info.php?id=<?php echo $row['id']; ?>"><i class="fa fa-pencil"></i></a>
												<a href="manage-subject-info.php?id=<?php echo $row['id']; ?>" class="on-default"><i class="fa fa-trash-o"></i></a>
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
		<form action="classes/subjectinfo_code.php" class="mx-auto" method="post">
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
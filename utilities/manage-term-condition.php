<?php
	//error_reporting(0);
    include_once("classes/etsystem.php");
    $crud = new Etstysem();
	$query = "SELECT * FROM  tbl_term_condition ORDER BY id DESC";
	$results = $crud->getData($query);
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
												<h2 class="panel-title">Add Terms & Conditions</h2>
											</header>
											<div class="panel-body">
												<div class="modal-wrapper">
													



											
										<form class="form-horizontal form-bordered" method="get">
											
						
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-2 col-lg-2 col-md-5 control-label">Title</label>
											<div class="col-sm-7">
                                              <input type="text" name="title"  class="form-control">
											</div>
                                        </div>
                                    </div>
                                    <label class="col-sm-2 col-lg-2 col-md-9 control-label"> Description</label>
												<div class="panel-body">
                                                     
												
														<div class="form-group">
															
												<div class="col-md-9 col-sm-3 col-lg-9">
                                                    
													<textarea name="content" data-plugin-markdown-editor rows="9"></textarea>
                                                    </div>

                                                   

                                    </div>
                                                    <br>
                                                    <br>
                                                    <br>
                                </div>
                            
                          <br>
                               	
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
						<h2>Manage Terms & Conditions </h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard.php">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
								<li><span>Terms & Conditions </span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
				
					<!-- start: page -->
                    <section class="panel">

                    					

							<header class="panel-heading">
								<div class="panel-actions">
									   <button type="button" class="btn btn-primary" data-toggle="modal" on-click="#modallg" data-target="#exampleModalCenter">Add <i class="fa fa-plus"></i></button>
									<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>
								</div>
						
								<h2 class="panel-title">Terms & Conditions List</h2>
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
											<th> Id</th>
											<th>Title</th>
											<th>Description</th>
											<th>Create Date</th>
											<th>Status</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($results as $key => $row) { ?>
											
										<tr class="gradeX">
											<td><?php echo $row['tearmco_id']; ?></td>
											<td><?php echo $row['title']; ?></td>
                                            <td><?php echo $row['description']; ?></td>
                                            <td><?php if($row['currentStatus']=='y'){ ?>
		                                      <a href="#modalMD"  class="btn btn-success btn-sm btn-custom rounded-0">Active</a>
		                                    <?php } ?>
		                                    <?php if($row['currentStatus']=='n'){ ?>
		                                        <a href="#modalMD" class="btn btn-danger btn-sm rounded-0 btm-custom">Inactive</a>
		                                    <?php } ?>
                                            </td>
											<td class="actions">
												<a href="view-term-condition.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm btn-custom rounded-0"><i class="fa fa-eye" title="Edit" alt="Edit" style="color: white"></i></a>&nbsp;	
												<a href="edit-term-condition.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm btn-custom rounded-0"><i class="fa fa-pencil" title="Edit" alt="Edit" style="color: white"></i></a>&nbsp;

												<a href="manage-term-condition.php?id=<?php echo $row['id']; ?>"  class="btn btn-danger btn-sm rounded-0 btm-custom" onclick="return confirm('do you want to delete this Record?');"><i class="fa fa-trash-o"  title="Delete" alt="Delete" style="color: white"></i></a>
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
     	
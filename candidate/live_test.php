<?php 
	include "includes/head-logo.php"; 
	include "includes/header.php"; 
	include "includes/sidebar.php"; 
?>
<section role="main" class="content-body">
					<header class="page-header">
						<h2>Live Test</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Test</span></li>
								<li><span>Live</span></li>
							</ol>
					
							<!-- <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a> -->
						</div>
					</header>

					<!-- start: page -->

					<!-- default / right -->
					
							<div class="tabs">
								<ul class="nav nav-tabs">
									<li class="active">
										<a href="#livetest" data-toggle="tab">Live Test</a>
									</li>
									
								</ul>
								<div class="tab-content">
									<div id="livetest" class="tab-pane active">
										<p>
										<table class="table table-bordered table-striped mb-none" id="datatable-editable">
									<thead>
										<tr>
											<th>Sr. No </th>
											<th>Test Date</th>
											<th>Test Name</th>
                                            <th>Subject Name</th>
                                            <th>Deadline</th>
                                            <th>Test ID</th>
                                            <th>Test Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $i =1; foreach ($results as $key => $row) { ?>
											<tr class="gradeX">
												<td><?php echo $i++; ?></td>
												<td><?php echo $row['client_id']; ?></td>
												<td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
												
												<td><?php $dob = $row['d_o_b'];
												echo date('d-m-Y',strtotime($dob));?></td>
												<td><?php echo $row['gender']; ?></td>
												<td><?php echo $row['mobile']; ?></td>
												<td> <img src="photo/<?php echo $row['logo']; ?>" width="80" height = "80"></td>
												<td><?php $created_date = $row['created_date'];
												echo date('d-m-Y',strtotime($created_date));										

												 ?></td>

												
												<td>
												
													<?php if($row['currentStatus']=='y'){ ?>
														<form action="manage-client.php" method="post">
															<button type="button" data-button="btnActive" name="act" class="btn btn-success exampleModal" data-toggle="modal" data-target="#exampleModalCenter" data-id="<?php echo $row['id']; ?>">Active</button>
														</form>
														
													
													<?php } ?>
													<?php if($row['currentStatus']=='n'){ ?>
													<form action="manage-client.php" method="post">
														<button type="button" class="btn btn-danger exampleModal" name="inact" data-button="btnInactive" data-toggle="modal" data-target="#exampleModalCenter" data-id="<?php echo $row['id']; ?>">Inactive</button>
													</form>
														
													
													<?php } ?>
												</td>
												<td class="actions">
													<a href="edit-client.php?id=<?php echo $row['id']; ?>" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
													<a href="manage-client.php?id=<?php echo $row['id']; ?>" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
									</p>

										
				</div>




	

</section>


<?php include "includes/footer.php"; ?>
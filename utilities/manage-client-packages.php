<?php
	//error_reporting(0);
    include_once("classes/etsystem.php");
    $crud = new Etstysem();
	$query = "SELECT * FROM  tbl_client_package ORDER BY id DESC";
	$results = $crud->getData($query);
?>
<?php
	include "includes/head-logo.php";
	include "includes/header.php"; 
	include "includes/sidebar.php";  
?>
      <section class="body">
      <section role="main" class="content-body">
         <header class="page-header">
            <h2>Manage Clients Packages</h2>
            <div class="right-wrapper pull-right">
               <ol class="breadcrumbs">
                  <li>
                     <a href="dashboard.php">
                     <i class="fa fa-home"></i>
                     </a>
                  </li>
                  <li><span>Dashboard</span></li>
                  <li><span>Packages</span></li>
               </ol>
               <span>&nbsp</span>
               <span>&nbsp</span>
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
                   <h2 class="panel-title" style="display: inline-block;">Clients Packages List</h2>
                 <a class="mb-xs mt-xs mr-xs modal-sizes btn btn-primary" href="#modallg">Add<i class="fa fa-plus"></i></a>
                </div>
              </header>

            <div class="panel-body">
            
              	<table class="table table-bordered table-striped mb-none" id="datatable-editable">
                           <thead>
                              <tr>
                                 <th>Packages Id</th>
                                 <th>Packages Name</th>
                                 <th>Packages Price</th>
                                 <th>Package Duration</th>
                                 <th>Status</th>
                                 <th>Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach ($results as $key => $row) { ?>
                                 
                              <tr class="gradeX">
                                 <td><?php echo $row['packages_id']; ?></td>
                                 <td><?php echo $row['packages_name']; ?></td>
                                 <td><?php echo $row['packages_price']; ?></td>
                                 <td><?php echo $row['package_duration']; ?></td>
                                 <td><?php echo $row['created_date']; ?></td>
                                 <td><?php if($row['currentStatus']=='y'){ ?>
                                   <a href="#modalMD"  class="btn btn-success btn-sm btn-custom rounded-0">Active</a>
                                 <?php } ?>
                                 <?php if($row['currentStatus']=='n'){ ?>
                                     <a href="#modalMD" class="btn btn-danger btn-sm rounded-0 btm-custom">Inactive</a>
                                 <?php } ?>
                                </td>
                                 <td class="actions">
                                 <a href="view-client-packages.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm btn-custom rounded-0"><i class="fa fa-eye" title="Edit" alt="Edit" style="color: white"></i></a>&nbsp; 
                                 <a href="edit-client-packages.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm btn-custom rounded-0"><i class="fa fa-pencil" title="Edit" alt="Edit" style="color: white"></i></a>&nbsp;

                                 <a href="manage-client-packages.php?id=<?php echo $row['id']; ?>"  class="btn btn-danger btn-sm rounded-0 btm-custom" onclick="return confirm('do you want to delete this Record?');"><i class="fa fa-trash-o"  title="Delete" alt="Delete" style="color: white"></i></a>
                                 </td>
                              </tr>
                              <?php } ?>
                              
                           </tbody>
                        </table>
               <!-- </div> -->
            </div>
            </section>
            <!-- end: page -->
         </section>
         <!-- end: page -->
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
      <!-- Vendor -->
     <?php include "includes/footer.php"; ?>
     	
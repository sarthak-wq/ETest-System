<?php
	//error_reporting(0);
    include_once("classes/etsystem.php");
    $crud = new Etstysem();
	$query = "SELECT * FROM  tbl_notice ORDER BY id DESC";
	$results = $crud->getData($query);

   if(!empty($_GET['id'])) {

      //getting id of the data from url
      $noticeId = $crud->escape_string($_GET['id']);
       
      //deleting the row from table
      //$result = $crud->execute("DELETE FROM users WHERE id=$id");
      $result = $crud->delete($noticeId, 'tbl_notice');
       
     header("location:manage-notice.php");
      # code...
   }
?>
<?php
	include "includes/head-logo.php";
	include "includes/header.php"; 
	include "includes/sidebar.php";  
?>
      <section class="body">
      <section role="main" class="content-body">
         <header class="page-header">
            <h2>Manage Notice</h2>
            <div class="right-wrapper pull-right">
               <ol class="breadcrumbs">
                  <li>
                     <a href="dashboard.php">
                     <i class="fa fa-home"></i>
                     </a>
                  </li>
                  <li><span>Dashboard</span></li>
                  <li><span>Notice</span></li>
               </ol>
               <span>&nbsp</span>
               <span>&nbsp</span>
            </div>
         </header>
         <!-- start: page -->
         <section class="panel">
            <header class="panel-heading">
              <div class="row">
                  <div class="col-md-9"> <h2 class="panel-title my-4">Notice List </h2></div> 
                  <div class="col-sm-6 col-md-3 float-right">  
                           <a class="mb-xs mt-xs mr-xs modal-sizes btn btn-primary" href="#modalLG">Add<i class="fa fa-plus"></i> </a> 
                  </div>
               </div>
            </header>
                                    <div class="panel-body">
                                       <div class="row">
                                          <div class="col-sm-6 col-md-9 d-inline">
                                             <div class="mb-md">
                                                    <!-- Modal -->
                                                <div id="modalLG" class="modal-block modal-block-lg mfp-hide ">
                                                   <section class="panel">
                                                         <header class="panel-heading"><h2 class="panel-title">Add Notice <button type="button" class="close  modal-dismiss" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></h2> </header>
                                                      <div class="panel-body">
                                                         <form method="post" action="classes/notice_code.php">
                                                            <div class="form-group">
                                                               <div class="col-sm-12">
                                                                  <label>Notice Title</label>
                                                                  <input type="text" class="form-control"  name="notice_title" id="notice_title" required="required">
                                                               </div>
                                                            </div>
                                                            <div class="form-group">
                                                               <div class="col-md-12 col-sm-12 col-lg-12">
                                                                  <label class="col control-label">Notice Description</label>
                                                                  <textarea name="notice_description" data-plugin-markdown-editor rows="10" required="required"></textarea>                                
                                                               </div>
                                                            </div>
                                                            
                                                            <div class="row ">
                                                               <div class="col-md-12 text-right">
                                                                  <button type="Submit" name="Submit" class="btn btn-primary" style="margin-right:15px;">Submit</button>
                                                                  <button class="btn btn-default modal-dismiss">Close</button>
                                                               </div>
                                                            </div>
                                                         </form>          
                                                      </div>
                                                   </section>
                                                </div>
                                                       <!-- end modal -->
                                             </div>
                                          </div>
                                       </div>
              	                                                            <table class="table table-bordered table-striped mb-none" id="datatable-editable">
                                                                           <thead>
                                                                           <tr>
                                                                           <th>Sr. No.</th>
                                                                           <th>Notice Id</th>
                                                                           <th>Notice Title</th>
                                                                           <th>Notice Description</th>
                                                                           <th>Created Date</th>
                                                                           <th>Current Status</th>
                                                                           <th>Actions</th>
                                                                           </tr>
                                                                           </thead>
                                                                           <tbody>
                                                                           <?php $i =1; foreach ($results as $key => $row) { ?>
                                                                           
                                                                                             <tr class="gradeX">
                                                                                                <td><?php echo $i++; ?></td>
                                                                                                <td><?php echo $row['notice_id']; ?></td>
                                                                                                <td><?php echo $row['notice_title']; ?></td>
                                                                                                <td><?php echo $row['notice_description']; ?></td>
                                                                                                           <td><?php echo $row['created_date']; ?></td>
                                                                                                           <td>

                                                                                                      <?php if($row['currentStatus']=='y'){ ?>
                                                                                                         <form action="manage-candidate.php" method="post">
                                                                                                            <button type="button" data-button="btnActive" name="act" class="btn btn-success exampleModal" data-toggle="modal" data-target="#exampleModalCenter" data-id="<?php echo $row['id']; ?>">Active</button>
                                                                                                         </form>

                                                                                                      
                                                                                                      <?php } ?>
                                                                                                      <?php if($row['currentStatus']=='n'){ ?>
                                                                                                      <form action="manage-candidate.php" method="post">
                                                                                                         <button type="button" class="btn btn-danger exampleModal" name="inact" data-button="btnInactive" data-toggle="modal" data-target="#exampleModalCenter" data-id="<?php echo $row['id']; ?>">Inactive</button>
                                                                                                      </form>

                                                                                                      
                                                                                                      <?php } ?>
                                                                                                   </td>
                                                                                                <td class="actions">
                                                                                                   <a href="edit-notice.php?id=<?php echo $row['id']; ?>" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                                                                                   <a href="manage-notice.php?id=<?php echo $row['id']; ?>" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                                                                                                </td>
                                                                                             </tr>
                                                                                             <?php } ?>
                                                                                                      
                                                                                                      
                                                                         </tbody>
                                                                            </table>
                                    </div>
          
            
            
         </section>
         <!-- end: page -->
      
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title mx-auto" id="exampleModalLongTitle"><b>Do you really want to change status</b><button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h5>
        
      </div>
      <div class="modal-body">
		<form action="classes/notice_code.php" class="mx-auto" method="post">
			<input type="hidden" name="hiddenValue" id="hiddenValue" value="" />
			<input type="submit" id="btnact" name="active" value="Active" class="btn btn-success"/>
			<input type="submit"id="btninact" name="inactive" value="Inactive" class="btn btn-danger"/>
		</form>
      </div>
    </div>
  </div>
</div>
      <!-- Vendor -->
     <?php include "includes/footer.php"; ?>
     <script type="text/javascript">
    $(document).on("click", ".exampleModal", function () {
     var myBookId = $(this).data('id');
	 
     $(".modal-body #hiddenValue").val( myBookId );
	   
});
</script>
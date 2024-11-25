<?php 
	
	// error_reporting(0);
    include_once("classes/etsystem.php");
    $crud = new Etstysem();
	

   if(!empty($_GET['id'])) {
	
    $id = $_GET['id'];
    
	$query = "SELECT * FROM  tbl_notice WHERE id = $id ";
    $results = $crud->getData($query);
    
	 
	foreach( $results as $key => $row)
	{
        $title = $row['notice_title'];
        $desp = $row['notice_description'];
       
	}
    
   }

?>

<?php 
    include "includes/head-logo.php";
    include "includes/header.php"; 
    include "includes/sidebar.php"; 
?>

<section role="main" class="content-body">
					<header class="page-header">
						<h2>Edit Notice</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Notice</span></li>
								<li><span>Edit</span></li>
                            </ol>
                            <span>&nbsp&nbsp</span>
						</div>
					</header>
					<div class="row">
						<div class="col-12">
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Edit Notice</h2>

									<!-- <p class="panel-subtitle">
										This is an example of form with multiple block columns.
									</p> -->
								</header>
								<div class="panel-body">
                                <form class="form-horizontal form-bordered" method="post" action="classes/notice_code.php">
                                    <div class="panel-body">
                                       <div class="form-group">
                                          <div class="col-sm-12">
                                             <label>Notice Title</label>
                                             <input type="text" class="form-control"  name="not_title"  value="<?php echo $title; ?>" required="required">
                                          </div>
                                       </div>
                                       <input class="form-control mb-md" name="id" type="hidden" value="<?php echo $id; ?>">
                                    </div>
                                    <div class="panel-body">
                                       <div class="form-group">
                                          <div class="col-md-12 col-sm-12 col-lg-12">
                                             <label >Notice Description</label>
                                             <textarea name="not_description"  data-plugin-markdown-editor rows="9" type="text" value="<?php echo $desp; ?>" required="required"><?php echo $desp; ?></textarea>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="panel-body">
                                       <div class="form-group">
                                         
                                          <div class="col-md-12 text-right">
                                          <input role="button" value="Update" type="Submit" name="update" class="btn btn-primary "  style="margin-right:15px;">
                                             
                                             <a href="manage-notice.php" class=" btn btn-default  ">Cancel</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                        </div>
                        </form>
								</div>
								
							</section>
						</div>
					</div>
</section>

<?php include "includes/footer.php"; ?>
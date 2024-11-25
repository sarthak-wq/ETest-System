<?php
// error_reporting(0);
include_once("classes/etsystem.php");
$crud = new Etstysem();
$id = $_GET['id'];
if(!empty($id))
{
	$query = "SELECT * FROM  tbl_notice WHERE id = $id";
	$results = $crud->getData($query);
	foreach ($results as $key => $row) {
		$notice_title = $row['notice_title'];
        $notice_description = $row['notice_description'];
		# code...
	}
}
$query = "SELECT * FROM  tbl_department ORDER BY id DESC";
	$result = $crud->getData($query);
	$query1 = "SELECT * FROM  tbl_category ORDER BY id DESC";
	$results = $crud->getData($query1);

?>
<?php include "includes/head-logo.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/sidebar.php"; ?>


<section role="main" class="content-body">
					<header class="page-header">
						<h2>Update Subject</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Subject</span></li>
								<li><span>Add</span></li>
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
									<h2 class="panel-title">Add Subject</h2>
								</header>
								<div class="panel-body">
                                <form method="post" action="classes/notice_code.php">
                                                            <div class="form-group">
                                                               <div class="col-sm-12">
                                                                  <label>Notice Title</label>
                                                                  <input type="text" class="form-control" value="<?php echo $notice_title; ?>"  name="notice_title" id="notice_title" required="required">
                                                               </div>
                                                            </div>
                                                            <div class="form-group">
                                                               <div class="col-md-12 col-sm-12 col-lg-12">
                                                                  <label class="col control-label">Notice Description</label>
                                                                  <textarea name="notice_description" data-plugin-markdown-editor rows="10" required="required"> <?php echo $notice_description; ?></textarea>      
                                                                  <input type="hidden" name="id" value="<?php echo $id; ?>">                          
                                                               </div>
                                                            </div>
                                                            
                                                            <div class="row ">
                                                               <div class="col-md-12 text-right">
                                                                  <button type="Submit" name="update" class="btn btn-primary" style="margin-right:15px;">Submit</button>
                                                                  <a href="manage-notice.php" class="btn btn-default">Close</a>
                                                               </div>
                                                            </div>
                                                         </form>      
								</div>
								

							</section>
						</div>
					</div>
</section>

<?php include "includes/footer.php"; ?>
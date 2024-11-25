<?php 
	
	 error_reporting(0);
    include_once("classes/etsystem.php");
    $crud = new Etstysem();
	

   if(!empty($_GET['id'])) {
	
    $id = $_GET['id'];
    
	$query = "SELECT * FROM  tbl_subject_info WHERE id = $id ";
    $results = $crud->getData($query);
    
	 
	foreach( $results as $key => $row)
	{
		$name = $row['subject_id'];
		$info = $row['subject_info'];
		$subid = $row['subject_info_id'];
		$img = $row['subject_image'];								
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
						<h2>Add Subject Info</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Subject Information</span></li>
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

									<h2 class="panel-title">Add Subject Info</h2>

									<!-- <p class="panel-subtitle">
										This is an example of form with multiple block columns.
									</p> -->
								</header>
								<div class="panel-body">
									<form class="row form-group" action="classes/subjectinfo_code.php" method="post" enctype="multipart/form-data" >
													
										<div class="mt-lg col-sm-12">
                                            <label class="col-sm-12 col-md-3 control-label">Select Subject</label>
												<div class="col-sm-12 col-md-9">
												<select id="company" name="abcd" class="form-control" required>
														<option value="" >--Select--</option>
														<?php 
															$query = "SELECT * FROM  tbl_subjects ORDER BY id DESC";
															$result = $crud->getData($query);
															foreach ($result as $key => $rows) {
														?>
														<option value="<?php echo $rows['subject_id']; ?>" name="abcd"><?php echo $rows['subject_name']; ?></option>
														<?php } ?>
													</select>
                                                    <br>
                                                </div>
                                                
											<label class="col-sm-12 col-md-3 control-label" for="inputSuccess">Subject Info<span class="required">*</span></label>
											<div class="col-md-9 col-sm-12">
                                                <!-- <input class="form-control mb-md" name="dept_name" type="text" value="<?php echo $name; ?>"> -->
                                                <textarea name="dept_name" data-plugin-markdown-editor rows="9" type="text" value="<?php echo $name; ?>"><?php echo $info; ?></textarea>
                                                <br>
                                                <br>

                                            </div>
                                            <label class="col-sm-12 col-md-3 control-label">Upload</label>							
											<div class="custom-file col-md-9 col-sm-12">
												<span><input type="file" class="custom-file-input" value="<?php echo $img?>" name="upload" id="inputGroupFile01" style="display: inline;"></span>
												<span><img src="./photo/<?php echo $img; ?>"width="80" height = "80" /></span>
											</div>
                                            <input class="form-control mb-md" name="id" type="hidden" value="<?php echo $id; ?>">
											<input class="form-control mb-md" name="preimg" type="hidden" value="<?php echo $img; ?>">
										</div>
										<div style="margin-top: 10px;" class="col-md-12 text-right">
                                            <!-- <input role="button" value="Update" type="Submit" name="update" class="btn btn-primary ">
                                            <span>&nbsp&nbsp</span> -->
                                            <!-- <button class="btn btn-secondary">Cancel</button> -->
                                            <button id="submit" name="submit" class="btn btn-primary" value="1">Submit</button>
                                             <!-- <span>&nbsp&nbsp</span> -->
                                           <a href="manage-subject-info.php" id="cancel" name="cancel" style="text-decoration:none"><button class="btn btn-secondary">Cancel</a></button>
                                          <!-- <button class="btn btn-default" id="btnCancel">Cancel</button> -->
                                        </div>
									</form>
								</div>
								
							</section>
						</div>
					</div>
</section>

<?php include "includes/footer.php"; ?>
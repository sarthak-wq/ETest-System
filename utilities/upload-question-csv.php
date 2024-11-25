<?php
error_reporting(0);
include_once("classes/etsystem.php");
$crud = new Etstysem();

if (isset($_POST["upload"])) {
    
    // Get file extension
    $file_extension = pathinfo($_FILES["file-input"]["name"], PATHINFO_EXTENSION);
    // Validate file input to check if is not empty
    if (! file_exists($_FILES["file-input"]["tmp_name"])) {
        $response = array(
            "type" => "error",
            "message" => "File input should not be empty."
        );
    } // Validate file input to check if is with valid extension
    else if ($file_extension != "csv") {
            $response = array(
                "type" => "error",
                "message" => "Invalid CSV: File must have .csv extension."
            );
            echo $result;
        } // Validate file size
    else if (($_FILES["file-input"]["size"] > 2000000)) {
            $response = array(
                "type" => "error",
                "message" => "Invalid CSV: File size is too large."
            );
        } // Validate if all the records have same number of fields
    else {
        $lengthArray = array();
        
        $row = 1;
        if (($fp = fopen($_FILES["file-input"]["tmp_name"], "r")) !== FALSE) {
            while (($data = fgetcsv($fp, 1000, ",")) !== FALSE) {
                $lengthArray[] = count($data);
                $row ++;
            }
            fclose($fp);
        }
            
        $lengthArray = array_unique($lengthArray);
        
        if (count($lengthArray) == 1) {
            $response = array(
                "type" => "success",
                "message" => "File Validation Success."
            );
        } else {
            $response = array(
                "type" => "error",
                "message" => "Invalid CSV: Count mismatch."
            );
        }
    }
}
?>

<?php include "includes/head-logo.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/sidebar.php"; ?>

	<section role="main" class="content-body">
					<header class="page-header">
						<h2>Upload Question CSV</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard.php.">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
								<li><span>Upload Question CSV</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					
					<div class="row">

						<div class="col-lg-12">
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Upload Question CSV</h2>

								</header>
								<form method="post" action="classes/upload_question_csvcode.php">
								<div class="panel-body">
									<div class="row" style="line-height: 35px;">
										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">Subject Name</label>
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
											</div>
										</div>

									<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">Client Name</label>
												<select id="company" name="abcd" class="form-control" required>
														<option value="" >--Select--</option>
														<?php 
															$query = "SELECT * FROM  tbl_client_registration ORDER BY id DESC";
															$result = $crud->getData($query);
															foreach ($result as $key => $rows) {
														?>
														<option value="<?php echo $rows['client_id']; ?>" name="abcd"><?php echo $rows['first_name']; ?></option>
														<?php } ?>
													</select>
											</div>
										</div>

										<div class="col-sm-6">
											<div class="form-group">
												<label class="control-label">CSV File Upload</label>
												  <input type="file" class="file-input" name="fileupload"  class="form-control">
											</div>
										</div>
										<div class="col-sm-6" align="center" style="padding-right: 300px;">
											<div class="form-group" >
												<br>
												<button type="submit" class="btn btn-primary" style="float: right;">Create CSV</button>
											</div>
										</div>
									</div>
								<br>	
								
								
								</div>
							</form>
							
								
							</section>
						</div>
					</div>
					<!-- end: page -->
				</section>
			
	

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>

	</body>
</html>
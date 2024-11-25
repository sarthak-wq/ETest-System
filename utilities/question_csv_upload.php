<?php
include_once("classes/etsystem.php");
$crud = new Etstysem();
$query = "SELECT * FROM   tbl_subjects ORDER BY id DESC";
$result = $crud->getData($query);

$queryClient = "SELECT * FROM   tbl_client_registration ORDER BY id DESC";
$resultClients = $crud->getData($queryClient);

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
						<h2> CSV Question Upload</h2>
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
								<li><span> CSV Question Upload</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>





<!--upload file start-->


				<form id="frm-upload" action="upload_question_csv.php" method="post" enctype="multipart/form-data">
                      	<div class="row">
                      		<div class="form-group">
								<label class="col-sm-2 control-label">Select Subject</span></label>
								<div class="col-sm-4 col-md-3">
									<select id="subject_id" name="subject_id" class="form-control" required>
										<option value="" >--Select--</option>
										<?php foreach ($result as $key => $rows) { ?>
										<option value="<?php echo $rows['id']; ?>"><?php echo $rows['subject_name']; ?></option>
										<?php } ?>
									</select>
								</div>
								<label class="col-sm-2 control-label">Select Client</span></label>
								<div class="col-sm-4 col-md-3">
									<select id="client_id" name="client_id" class="form-control" required>
										<option value="" >--Select--</option>
										<?php foreach ($resultClients as $key => $rowes) { ?>
										<option value="<?php echo $rows['id']; ?>"><?php echo $rowes['first_name'].' '.$rowes['last_name']; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">CSV File Upload</span></label>
								<div class="col-sm-4 col-md-3">
									  <input type="file" class="file-input" name="file-input"  class="form-control">
								</div>
								<div class="col-sm-2">
					                 <input type="submit" id="btn-submit" name="upload" value="Upload">
								</div>
							</div>
							<div class="form-group"> &nbsp;</div>
						</div>
				</form>
				<?php if(!empty($response)) { ?>
				<div class="response <?php echo $response["type"]; ?>
				    ">
				    <?php echo $response["message"]; ?>
				</div>
				<?php }?>

<!--upioad file end-->




<!--page start-->

					
				
					
				</section>
<!--page end-->


			<aside id="sidebar-right" class="sidebar-right">
				<div class="nano">
					<div class="nano-content">
						<a href="#" class="mobile-close visible-xs">
							Collapse <i class="fa fa-chevron-right"></i>
						</a>
			
						<div class="sidebar-right-wrapper">
			
							<div class="sidebar-widget widget-calendar">
								<h6>Upcoming Tasks</h6>
								<div data-plugin-datepicker data-plugin-skin="dark" ></div>
			
								<ul>
									<li>
										<time datetime="2014-04-19T00:00+00:00">04/19/2014</time>
										<span>Company Meeting</span>
									</li>
								</ul>
							</div>
			
							<div class="sidebar-widget widget-friends">
								<h6>Friends</h6>
								<ul>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
								</ul>
							</div>
			
						</div>
					</div>
				</div>
			</aside>
	

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
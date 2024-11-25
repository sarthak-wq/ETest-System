<?php include "includes/head-logo.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/sidebar.php"; ?>

	<section role="main" class="content-body">
					<header class="page-header">
						<h2>Add Question</h2>
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
								<li><span>Add Question</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>





<!--upload file start-->


				<form method="post" action="">
                      	<div class="row">
                      		<div class="form-group">
								<label class="col-sm-2 control-label">Add Excel File</span></label>
								<div class="col-sm-2">
									<input type="file" name="file" class="form-control" placeholder="..."  required="">
								</div>
								<div class="col-sm-2">
									<input type="Submit" name="Submit1" class="btn btn-primary" />
								</div>
							</div>
							<div class="form-group"> &nbsp;</div>
						</div>
				</form>

<!--upioad file end-->




<!--page start-->

					
					<form class="row form-group" action="classes/question-code.php"  method="post" enctype="multipart/form-data">
					<div class="col-md-6" style="width: 100%;">
							<section class="panel">
								<header class="panel-heading">
									

									<h2 class="panel-title">Add Question</h2>

									<p class="panel-subtitle">
										
									</p>
								</header>
								
								<div class="panel-body">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label class="control-label">Question</label>
												<input type="text" name="question_text" class="form-control">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label class="control-label">Answer</label>
												<input type="text" name="answer" class="form-control">
											</div>
										</div>
										
											<div class="form-group">

												<table>
														<tr >
															<th class="col-sm-1">Option No.</th>
															<th  class="col-sm-10">Option</th>
															<th  class="col-sm-1">Answer</th>
														</tr>
														<tr>
															<td class="col-sm-2">1</td>
															<td class="col-sm-8">Option 1
																<input type="text" name="option1" placeholder="Enter Option 1" class="form-control"  required="">
															</td>
															<td class="col-sm-2"><input type="radio" name="option"></td>
														</tr>
														<tr >
															<td class="col-sm-2">2</td>
															<td class="col-sm-8">Option 2 
																<input type="text" name="option2"  placeholder="Enter Option 2" class="form-control" required="">
															</td>
															<td class="col-sm-2" ><input type="radio" name="option"></td>
														</tr>
														<tr >
															<td class="col-sm-2">3</td>
															<td class="col-sm-8">Option 3
																<input type="text" name="option3" placeholder="Enter Option 3" class="form-control" required="">
															</td>
															<td class="col-sm-2" ><input type="radio" name="option"></td>
														</tr>
														<tr>
															<td class="col-sm-2">4</td>
															<td class="col-sm-8">Option 4
																<input type="text" name="option4" placeholder="Enter Option 4"  class="form-control" required="">
															</td>
															<td class="col-sm-2" ><input type="radio" name="option"></td>
														</tr>
														<tr >
															<td class="col-sm-2">5</td>
															<td class="col-sm-8">Option 5
																<input type="text" name="option5"  placeholder="Enter Option 5" class="form-control">
															</td>
															<td class="col-sm-2" ><input type="radio" name="option"></td>
														</tr>
														<tr >
															<td class="col-sm-2">6</td>
															<td class="col-sm-8">Option 6
																<input type="text" name="option6"  placeholder="Enter Option 6" class="form-control"></td>
															<td class="col-sm-2" ><input type="radio" name="option"></td>
														</tr>
														<tr >
															<td class="col-sm-2">7</td>
															<td class="col-sm-8">Option 7
																<input type="text" name="option7"  placeholder="Enter Option 7" class="form-control"></td>	
															<td class="col-sm-2"  ><input type="radio" name="option"></td>
														</tr>
												</table>		
										</div>
										
									</div>
									<div>
										<footer  style="padding-top: 30px;">
										<input type="submit" name="Submit" value="Submit" class="btn btn-primary" style="float: right;">
										<!--<button class="btn btn-primary" style="float: right;">Submit</button>-->
										<div style="padding-right: 80px;" >
											<button type="reset" class="btn btn-default" style="float: right; ">Reset</button>
										</div>
									</footer>
									</div>
								</div>
							
							
							</section>
						</div>
					</div>
					</form>
					
					
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
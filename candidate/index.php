<?php 
	include "includes/head-logo.php"; 
	error_reporting(0);
?>

<body>
		<section class="body-sign">
			<div class="center-sign">
				<a href="/" class="logo pull-left">
					<img style="width: 100px; height:80px;" src="assets/images/logo.jpg" height="54" alt="Porto Admin" />
				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
					</div>
					<div class="panel-body">
					<div class="text-danger">
						<?php 
							if($_GET['msg']=='error') {
								echo "Invalid Credentials";
							}
						?>
					</div>
						<form style="padding-bottom: 50px" action="classes/login_code.php" method="post">
							<div class="form-group mb-lg">
								<label>Username</label>
								<div class="input-group">
									<input id="username" type="text" class="form-control input-lg" name="username" required placeholder="Email">
									<span class="input-group-addon text-primary"><i class="fa fa-user"></i></span>
								</div>
							</div>

							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left">Password</label>
									<a href="recover-password.php" class="pull-right">Lost Password?</a>
								</div>
								
								<div class="input-group">
									<input name="password" id="myInput" required type="password" class="form-control input-lg">
									<span type="button" role="button" onclick="myFunction()" class="input-group-addon text-primary"><i id="icon" class="fa fa-eye-slash"></i></span>
								</div>

								<!-- <div class="input-group input-group-icon">
									<input name="pwd" id="myInput" type="password" class="form-control input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-eye"></i>
										</span>
									</span>
								</div> -->
							</div>

							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<input id="RememberMe" name="rememberme" type="checkbox"/>
										<label for="RememberMe">Remember Me</label>
									</div>
								</div>
								<div class="col-sm-4 text-right">
									<button type="submit" class="btn btn-primary hidden-xs">Sign In</button>
									<button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign In</button>
								</div>
							</div>
						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-md mb-md">&copy; Copyright 2018. All rights reserved. <a href="http://www.kavinindia.com/" target="_blank"> Kavin India Pvt Ltd </a>.</p>
			</div>
		</section>
		
		<script src="assets/javascript/apps.js"></script>

        <?php include "includes/footer.php"; ?>
<script type="text/javascript"> 
    function myFunction() {
	var x = document.getElementById("myInput");
	var icon = document.getElementById("icon");
    if (x.type === "password") {
	  x.type = "text";
	  icon.className="fa fa-eye";
    } else {
	  x.type = "password";
	  icon.className="fa fa-eye-slash";
    }
  } 
</script> 
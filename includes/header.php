<?php 
	include "classes/check_session.php";
	include_once("classes/etsystem.php");
	// $userId = $_SESSION['etsoftId'];
	$name = $_SESSION['name'];
	$role = $_SESSION['role'];
	$photo = $_SESSION['logo'];
?> 


<header class="header">
				<div class="logo-container">
					<a href="dashboard.php" class="logo">
						<img class="ml-5" style="width: 100px;" src="assets/images/logo.jpg" height="35" alt="An Online Exam Portal" />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">

			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="photo/<?php echo $photo;?>" alt="<?php echo ucwords($name); ?>" class="img-circle" data-lock-picture="photo/<?php echo $photo;?>" />
							</figure>
							<div class="profile-info" data-lock-name="<?php echo ucwords($name); ?>" data-lock-email="<?php echo ucwords($role); ?>">
								<span class="name"><b><?php echo ucwords($name); ?></b></span>
								<span class="role"><?php echo ucwords($role); ?></span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fa fa-user"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="classes/logout-code.php"><i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
					<span >&nbsp</span>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->
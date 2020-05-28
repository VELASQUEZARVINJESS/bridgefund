<nav class="main-header navbar navbar-expand navbar-dark navbar-gray-dark border-bottom-0">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
		</li>
	</ul>

	<ul class="navbar-nav ml-auto">
		<!-- <li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#">
				<i class="far fa-comments"></i>
				<span class="badge badge-danger navbar-badge">3</span>
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<a href="#" class="dropdown-item">
					<div class="media">
						<img src="<?php echo PATH_IMG;?>user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
						<div class="media-body">
							<h3 class="dropdown-item-title">
								Brad Diesel
								<span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
							</h3>
							<p class="text-sm">Call me whenever you can...</p>
							<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
						</div>
					</div>
				</a>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">
					<div class="media">
						<img src="<?php echo PATH_IMG;?>user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
						<div class="media-body">
							<h3 class="dropdown-item-title">
								John Pierce
								<span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
							</h3>
							<p class="text-sm">I got your message bro</p>
							<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
						</div>
					</div>
				</a>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">
					<div class="media">
						<img src="<?php echo PATH_IMG;?>user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
						<div class="media-body">
							<h3 class="dropdown-item-title">
								Nora Silvester
								<span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
							</h3>
							<p class="text-sm">The subject goes here</p>
							<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
						</div>
					</div>
				</a>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
			</div>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#">
				<i class="far fa-bell"></i>
				<span class="badge badge-warning navbar-badge">15</span>
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<span class="dropdown-item dropdown-header">15 Notifications</span>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">
					<i class="fas fa-envelope mr-2"></i> 4 new messages
					<span class="float-right text-muted text-sm">3 mins</span>
				</a>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">
					<i class="fas fa-users mr-2"></i> 8 friend requests
					<span class="float-right text-muted text-sm">12 hours</span>
				</a>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">
					<i class="fas fa-file mr-2"></i> 3 new reports
					<span class="float-right text-muted text-sm">2 days</span>
				</a>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
			</div>
		</li> -->
		<li class="nav-item dropdown">
			<a class="nav-link addExpense" data-toggle="dropdown" href="#">
				<i class="fa fa-plus"></i> Expenses
			</a>
		</li>
		<li class="nav-item dropdown user user-menu">
			<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
				<img src="<?php echo PATH_IMG?>profile-def.png" class="user-image img-circle elevation-2 alt="User Image">
				<span class="hidden-xs"><?php echo $_SESSION['app']['name'];?></span>
			</a>
			<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<li class="user-header bg-primary">
					<img src="<?php echo PATH_IMG?>profile-def.png" class="img-circle elevation-2" alt="User Image">
					<p><?php echo $_SESSION['app']['name'];?></p>
				</li>
				<!-- <li class="user-body">
					<div class="row">
						<div class="col-4 text-center">
							<a href="#">Followers</a>
						</div>
						<div class="col-4 text-center">
							<a href="#">Sales</a>
						</div>
						<div class="col-4 text-center">
							<a href="#">Friends</a>
						</div>
					</div>
				</li> -->
				<li class="user-footer">
					<div class="row">
						<div class="col-6">
							<a href="#" class="btn btn-default btn-flat changepass">Change Password</a>
						</div>
						<div class="col-6">
							<a href="<?php echo PATH_URL.Q.PAGE;?>logout" class="btn btn-default btn-flat">Sign out</a>
						</div>
					</div>
				</li>
			</ul>
		</li>
	</ul>
</nav>
<?php include_once 'modal_expense.php';?>
<?php include_once 'modal_change_password.php';?>
<style>
.navbar-nav > .user-menu {
	content:none;
}
.navbar-nav > .user-menu .dropdown-menu {
	padding: 0;
	border-top-width: 0;
	width: 280px;
}
.navbar-nav > .user-menu .dropdown-menu a{
	display: block;
	font-size: 12px;
}
.navbar-nav > .user-menu .dropdown-menu li.user-header{
	height: 175px;
	padding: 10px;
	text-align: center;
}
.navbar-nav > .user-menu .dropdown-menu li.user-header img{
	z-index: 5;
	height: 90px;
	width: 90px;
	border: 3px solid;
	border-color: transparent;
	border-color: rgba(255, 255, 255, 0.2);
}
.navbar-nav > .user-menu .dropdown-menu li.user-header p{
	z-index: 5;
	color: #fff;
	color: rgba(255, 255, 255, 0.8);
	font-size: 17px;
	/* text-shadow: 2px 2px 3px #333333; */
	margin-top: 10px;
}
.navbar-nav > .user-menu .dropdown-menu li.user-header p small{
	display: block;
	font-size: 12px;
}
.navbar-nav > .user-menu .dropdown-menu .user-body{
	padding: 15px;
	border-bottom: 1px solid #f4f4f4;
	border-top: 1px solid #dddddd;
}
.navbar-nav > .user-menu .dropdown-menu .user-body a{
	color: #444 !important;
}
.navbar-nav > .user-menu .dropdown-menu .user-footer{
	background-color: #f9f9f9;
	padding: 10px;
}
.navbar-nav > .user-menu .dropdown-menu .user-footer .btn-default{
	color: #666666;
}
.navbar-nav > .user-menu .user-image{
	float: left;
	width: 25px;
	height: 25px;
	border-radius: 50%;
	margin-right: 10px;
	margin-top: -2px;
}
</style>
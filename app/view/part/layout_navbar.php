<nav class="main-header navbar navbar-expand navbar-dark navbar-gray-dark border-bottom-0">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
		</li>
	</ul>

	<ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown">
			<a class="nav-link deposit" data-toggle="dropdown" href="#">
				<i class="fa fa-piggy-bank"></i> Deposit
			</a>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link addExpense" data-toggle="dropdown" href="#">
				<i class="fa fa-wallet"></i> Expenses
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
<?php include_once 'modal_deposit.php';?>
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
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="#" class="brand-link">
		<img src="<?php echo PATH_IMG;?>logo.png"
				 alt="AdminLTE Logo"
				 class="brand-image img-circle elevation-3"
				 style="opacity: .8">
		<span class="brand-text font-weight-light"><?php echo BFSL_TTL ?></span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
						 with font-awesome or any other icon font library -->
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-copy"></i>
						<p>
							Borrower
							<i class="fas fa-angle-left right"></i>
							<span class="badge badge-info right">6</span>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo Q.DIR.'borrower'.A.PAGE;?>new" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>New</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo Q.DIR.'borrower'.A.PAGE;?>list" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>List</p>
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
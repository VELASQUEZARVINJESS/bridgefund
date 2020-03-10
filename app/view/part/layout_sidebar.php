<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<a href="<?php echo PATH_URL;?>" class="brand-link">
		<img src="<?php echo PATH_IMG;?>logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light"><?php echo BFSL_TTL ?></span>
	</a>

	<div class="sidebar">
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item"><a href="<?php echo PATH_URL;?>" class="nav-link"><i class="nav-icon fas fa-chart-pie"></i><p>Statistics</p></a></li>
				<li class="nav-item"><a href="<?php echo Q.DIR.'application'.A.PAGE;?>list" class="nav-link"><i class="nav-icon fas fa-briefcase"></i><p>Applications</p></a></li>
				<li class="nav-item"><a href="<?php echo Q.DIR.'loan'.A.PAGE;?>loan_list" class="nav-link"><i class="nav-icon fas fa-money-check"></i><p>Loans</p></a></li>
				<li class="nav-item"><a href="<?php echo Q.DIR.'borrower'.A.PAGE;?>list" class="nav-link"><i class="nav-icon fas fa-user"></i><p>Borrowers</p></a></li>
				<li class="nav-item"><a href="<?php echo Q.DIR.'reports'.A.PAGE;?>list" class="nav-link"><i class="nav-icon fas fa-chart-line"></i><p>Reports</p></a></li>
				<li class="nav-item has-treeview">
					<a href="<?php echo Q.DIR.'reports'.A.PAGE;?>list" class="nav-link"><i class="nav-icon fas fa-cogs"></i><p>Admin</p></a>
					<ul class="nav nav-treeview">
						<li class="nav-item"><a href="<?php echo Q.DIR.'admin'.A.PAGE;?>sublink" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Sub link</p></a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</aside>
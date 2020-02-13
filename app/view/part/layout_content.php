<div class="wrapper">
	<?php include_once 'layout_navbar.php'; ?>
	<?php include_once 'layout_sidebar.php'; ?>
	<div class="content-wrapper">
		<?php include_once 'layout_breadcrumb.php'; ?>
		<section class="content">
		<?php 
			function loadPath($path){
				$page=scandir($path); 
				unset($page[0],$page[1]);
				$dir=(in_array(@$_GET['page'].'.php', $page)) ? $path.@$_GET['page'].'.php' : PATH_PGE.'404.php';
				$dir=(in_array('admin_panel', explode('/', pathinfo($dir)['dirname']))) ? ($_SESSION['carex']['level'] <= 3 ? $dir : PATH_PGE.'404.php' ) : $dir ;
				$fil=pathinfo($dir)['filename'];
				$jav=str_replace(PATH_PGE,PATH_JAV,$dir);
				$jav=str_replace($fil,$fil.'.java',$jav);
				$req=str_replace(PATH_PGE,PATH_REQ,$dir);
				$req=str_replace($fil, $fil.'.req',$req);
				include $dir;
				if(file_exists($jav)){include_once $jav;}
			}
			include_once PATH_JAV.'general.java.php';
			if(isset($_GET['page']) && isset($_GET['f'])){
				loadPath(PATH_PGE.(str_replace('-','/',$_GET['f'])).'/');
			}else if(isset($_GET['page'])){
				if($_GET['page']=='login'){
					include PATH_PGE.'error_404.php';
				}else{
					loadPath(PATH_PGE);
				}
			}else{
				// header('Location: '.Q.DIR.'reports'.A.PAGE.'daily_business_report');
				// include_once PATH_PGE.'dashboard.php';
			}
		?>
		</section>
		<div class="clearfix"></div>
	</div>
	<?php include_once 'layout_footer.php'; ?>

	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Control sidebar content goes here -->
	</aside>
	<!-- /.control-sidebar -->
</div>
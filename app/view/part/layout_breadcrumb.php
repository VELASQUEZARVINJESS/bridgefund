<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>
				<?php
					if (@$_GET['page'] == 'dashboard') { $p = 'dashboard'; } 
					else { $p = (!isset($_GET['f'])) ? '' : str_replace('_',' ',@$_GET['page']); }
					echo trim(strtoupper($p));
				?>
				</h1>
			</div>
			<?php if ($p != '') { ?>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<?php if (isset($_GET['f'])) {
						$f = explode('-', $_GET['f']);
						for ($i=0; $i < count($f); $i++) { 
							echo '<li class="breadcrumb-item"><a href="#">' . ucwords(str_replace('_', ' ', $f[$i])) . '</a></li>';
						}
					} ?>
					<li class="breadcrumb-item active"><?php echo ucwords($p);?></li>
				</ol>
			</div>
			<?php } ?>
		</div>
	</div><!-- /.container-fluid -->
</section>
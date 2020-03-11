<?php unset($_SESSION['app']); ?>
<script type="text/javascript">
	sessionStorage.clear();
	window.location.href="<?php echo PROTOCOL.$_SERVER["HTTP_HOST"].FOLDER; ?>";
</script>
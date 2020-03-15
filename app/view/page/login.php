<?php $error = false;
	if (isset($_POST['user-login']) && isset($_POST['username']) && isset($_POST['password'])){
		$uname = sanitize($_POST['username']);
		$upass = userencrypt($_POST['password']);
		if (!empty($uname) && !empty($upass)) {
			$data = userInfo($mysqli,$uname,$upass);
			if (isset($data['id'])) {
				$_SESSION['app']['id'] = $data['id'];
				$_SESSION['app']['user'] = $data['user'];
				$_SESSION['app']['name'] = $data['name'];
				$_SESSION['app']['level'] = $data['level'];
				$_SESSION['app']['logid'] = userLoginLog($mysqli);
				echo '<script>sessionStorage.clear();</script>';
				header('Location: '.PATH_URL); exit();
			} else {
				$error = true;
			}
		}
	}
?>
<div class="login-box">
	<div class="login-logo"><img class="img-fluid" src="<?php echo PATH_IMG;?>2logo.png" alt="Chania"></div>
	<div class="card">
		<div class="card-body login-card-body">
			<p class="login-box-msg">Sign in to start your session</p>

			<form action="<?php echo PATH_URL.Q.PAGE;?>login" method="post" autocomplete="off">
				<div class="input-group mb-3">
					<input type="text" class="form-control" name="username" placeholder="Username" autofocus required />
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-user"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="password" class="form-control" name="password" placeholder="Password" required />
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-4">
						<button type="submit" name="user-login" class="btn btn-primary btn-block">Sign In</button>
					</div>
					<div class="col-8 text-right">
						<a href="forgot-password.html">I forgot my password</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
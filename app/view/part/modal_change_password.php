<div class="modal fade" id="changepassword" data-backdrop="static">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">CHANGE PASSWORD</h4>
			</div>
			<form method="post" id="changepass">
				<div class="modal-body">
						<div class="form-group has-feedback">
							<input type="password" name="curpass" class="form-control" placeholder="Current Password" autofocus required>
							<span class="glyphicon glyphicon-lock form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback">
							<input type="password" name="newpass" class="form-control" placeholder="New Password" required>
							<span class="glyphicon glyphicon-lock form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback conpass">
							<input type="password" name="conpass" class="form-control" placeholder="Confirm Password" required>
							<span class="glyphicon glyphicon-lock form-control-feedback"></span>
							<span class="help-block"></span>
						</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-md btn-primary print"><i class="fa fa-refresh"></i> UPDATE</button>
					<button type="button" class="btn btn-md btn-default cancel" data-dismiss="modal"><i class="fa fa-times"></i> CANCEL</button>
				</div>
			</form>
		</div>
	</div>
</div>
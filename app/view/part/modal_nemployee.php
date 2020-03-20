<div id="addEmployee" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-gradient-secondary">
				<h5 class="modal-title">Register Employee</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
			</div>
			<form  method="POST" name="addEmployee" id="addNewEmployee">
				<div class="modal-body">
					<div class="form-group">
						<label for="fname">Name</label>
						<input class="form-control" type="text" name="fname" id="fname">
					</div>

					<div class="form-group">
						<label for="fname">user</label>
						<input class="form-control" type="text" name="xname" id="xname">
					</div>

					<div class="form-group">
						<label for="fname">Username</label>
						<input class="form-control" type="text" name="uname" id="uname">
					</div>

					<div class="form-group">
						<label for="fname">Password</label>
						<input class="form-control" type="password" name="pass" id="pass">
					</div>
					<div class="form-group">
						<label for="fname">Lavel</label>
							<select class="form-control" name="level" id="level">
								<option value="0">Secretary</option>
								<option value="1">Administrator</option>
							</select>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary btn-md" data-dismiss="modal" type="button">Cancel</button>
					<button class="btn btn-success btn-md" type="submit"> <i class="fa fa-save"></i> Register</button>
			</div>
			</form>
		</div>
	</div>
</div>
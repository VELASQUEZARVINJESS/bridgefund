<div class="borrower-edit">
	<form method="post" id="eborrower" name="eborrower">
		<div class="col-lg-8 offset-lg-2">
			<div class="card card-primary">
				<!-- <div class="card-header"><strong>PERSONAL INFORMATION</strong></div> -->
				<div class="card-body">
					<div class="row info-header">Borrower's Identity</div><br>
					<div class="row">
						<div class="col-sm">
							<div class="form-group">
								<label for="fname">First Name *</label>
								<input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required>
							</div>
						</div>
						<div class="col-sm">
							<div class="form-group">
								<label for="lname">Last Name *</label>
								<input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required>
							</div>
						</div>
						<div class="col-sm">
							<div class="form-group">
								<label for="lname">Middle Name *</label>
								<input type="text" class="form-control" id="mname" name="mname" placeholder="Middle Name" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm">
							<div class="form-group">
								<label>Gender *</label>
								<select class="form-control select2bs4" id="gender" name="gender" data-placeholder="-- Gender --" required>
									<option value="" hidden></option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
						</div>
						<div class="col-sm">
							<div class="form-group">
								<label>Marital Status *</label>
								<select class="form-control select2bs4" id="civil" name="marital" data-placeholder="-- Marital Status --" required>
									<option value="" hidden></option>
									<option value="Single">Single</option>
									<option value="Married">Married</option>
									<option value="Divorced">Divorced</option>
									<option value="Separated">Separated</option>
									<option value="Widowed">Widowed</option>
								</select>
							</div>
						</div>
						<div class="col-sm">
							<div class="form-group">
								<label>Birthdate *</label>
								<div class="input-group" name="bdate">
									<input type="text" class="form-control datetimepicker" id="bdate" name="bdate" required>
								</div>
							</div>
						</div>
					</div>

					<br/><div class="row info-header">Address Details</div><br>
					<div class="row">
						<div class="col-sm">
							<div class="form-group">
								<label for="street">House Number & Street *</label>
								<input type="text" class="form-control" id="street" name="street" required>
							</div>
						</div>
						<div class="col-sm">
							<div class="form-group">
								<label for="subbuild">Subdivision/Building</label>
								<input type="text" class="form-control" id="subbuild" name="subbuild">
							</div>
						</div>
						<div class="col-sm">
							<div class="form-group">
								<label for="barangay">Barangay *</label>
								<input type="text" class="form-control" id="barangay" name="barangay" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm">
							<div class="form-group">
								<label for="province">Province *</label>
								<select class="form-control select2bs4" id="province" name="province" data-placeholder="-- Province --" required></select>
							</div>
						</div>
						<div class="col-sm">
							<div class="form-group">
								<label for="city">City / Town *</label>
								<select class="form-control select2bs4" id="city" name="city" data-placeholder="-- City --" required></select>
							</div>
						</div>
						<div class="col-sm">
							<div class="form-group">
								<label for="zipcode">Zipcode *</label>
								<input type="text" class="form-control" id="zipcode" name="zipcode" required>
							</div>
						</div>
					</div>

					<br/><div class="row info-header">Contacts</div><br>
					<div class="row">
						<div class="col-sm">
							<div class="form-group">
								<label for="mobile">Mobile *</label>
								<input type="text" class="form-control" id="mobile" name="mobile" required>
							</div>
						</div>
						<div class="col-sm">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="email" name="email">
							</div>
						</div>
						<div class="col-sm">
							<div class="form-group">
								<label for="landline">Landline</label>
								<input type="text" class="form-control" id="landline" name="landline">
							</div>
						</div>
					</div>

					<br/><div class="row info-header">Employment</div><br>
					<div class="row">
						<div class="col-sm">
							<div class="form-group">
								<label for="position">Position</label>
								<input type="text" class="form-control" id="position" name="position">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm">
							<div class="form-group">
								<label for="smonthly">Monthly Salary</label>
								<input type="number" class="form-control" id="smonthly" name="smonthly">
							</div>
						</div>
						<div class="col-sm">
							<div class="form-group">
								<label for="stakehome">Take Home Pay</label>
								<input type="number" class="form-control" id="stakehome" name="stakehome">
							</div>
						</div>
						<div class="col-sm">
							<div class="form-group">
								<label for="sannual">Annual Salary</label>
								<input type="number" class="form-control" id="sannual" name="sannual">
							</div>
						</div>
					</div>

					<br/><div class="row info-header">Employer</div><br>
					<div class="row">
						<div class="col-sm">
							<div class="form-group">
								<label for="employer">Company Name</label>
								<input type="text" class="form-control" id="employer" name="employer">
							</div>
						</div>
						<div class="col-sm">
							<div class="form-group">
								<label for="eaddress">Address</label>
								<input type="text" class="form-control" id="eaddress" name="eaddress">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm">
							<div class="form-group">
								<label for="emanager">HR Manager</label>
								<input type="text" class="form-control" id="emanager" name="emanager">
							</div>
						</div>
						<div class="col-sm">
							<div class="form-group">
								<label for="econtact">Contact Number</label>
								<input type="text" class="form-control" id="econtact" name="econtact">
							</div>
						</div>
						<div class="col-sm">
							<div class="form-group">
								<label for="eemail">Email</label>
								<input type="email" class="form-control" id="eemail" name="eemail">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm">
							<button type="submit" name="new-borrower" class="btn btn-success"><i class="fa fa-save"></i> UPDATE</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<style type="text/css">
	div.info-header { background: blue; padding: 0.4em; font-weight: bold; color: white;}
	select.select2bs4 {width: 100%;}
	/*label.col-form-label-sm { margin-bottom: 0; }*/
</style>
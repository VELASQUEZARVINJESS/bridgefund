<div class="borrower-new">
	<form method="post" id="nborrower" name="nborrower">
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
								<select class="form-control select2bs4" name="gender" data-placeholder="-- Gender --" required>
									<option value="" hidden></option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
						</div>
						<div class="col-sm">
							<div class="form-group">
								<label>Marital Status *</label>
								<select class="form-control select2bs4" name="marital" data-placeholder="-- Marital Status --" required>
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
									<input type="text" class="form-control datetimepicker" name="bdate" required>
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
								<select class="form-control select2bs4" name="province" data-placeholder="-- Province --" required></select>
							</div>
						</div>
						<div class="col-sm">
							<div class="form-group">
								<label for="city">City / Town *</label>
								<select class="form-control select2bs4" name="city" data-placeholder="-- City --" required></select>
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
							<button type="submit" name="new-borrower" class="btn btn-success">ADD NEW BORROWER</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- <div class="col-lg-8 offset-lg-2">
			<div class="card card-primary">
				<div class="card-header"><strong>EMPLOYMENT INFORMATION</strong></div>
				<div class="card-body">
					<div class="row">
						<div class="col-sm">
							<div class="form-group">
								<label for="cname">Compnany Name</label>
								<input type="text" class="form-control" id="cname">
							</div>
						</div>
						<div class="col-sm">
							<div class="form-group">
								<label>Employment Type</label>
								<select class="form-control">
									<option>-- Type --</option>
									<option value="Male">Regular</option>
									<option value="Female">Term</option>
									<option value="Female">Project</option>
									<option value="Female">Seasonal</option>
									<option value="Female">Casual</option>
								</select>
							</div>
						</div>
						<div class="col-sm">
							<div class="form-group">
								<label for="caddress">Comapany Address</label>
								<input type="text" class="form-control" id="caddress">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm">
							<div class="form-group">
							<label>HR Manager</label>
								<input type="text" class="form-control" id="hmanager">
							</div>
						</div>
						<div class="col-sm">
							<div class="form-group">
							<label>HR Contact Number</label>
								<input type="text" class="form-control" id="hcontact">
							</div>
						</div>
						<div class="col-sm">
							<div class="form-group">
							<label>HR Email</label>
								<input type="text" class="form-control" id="hemail">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->
		
	</form>
	<!-- <div class="row">
		<div class="col-5 col-sm-3">
			<div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
				<a class="nav-link active" id="vert-tabs-personal-tab" data-toggle="pill" href="#vert-tabs-personal" role="tab" aria-controls="vert-tabs-personal" aria-selected="true">Personal</a>
				<a class="nav-link" id="vert-tabs-contact-tab" data-toggle="pill" href="#vert-tabs-contact" role="tab" aria-controls="vert-tabs-contact" aria-selected="false">Contacts</a>
				<a class="nav-link" id="vert-tabs-address-tab" data-toggle="pill" href="#vert-tabs-address" role="tab" aria-controls="vert-tabs-address" aria-selected="false">Addresses</a>
				<a class="nav-link" id="vert-tabs-banking-tab" data-toggle="pill" href="#vert-tabs-banking" role="tab" aria-controls="vert-tabs-banking" aria-selected="false">Banking</a>
			</div>
		</div>
		<div class="col-7 col-sm-9">
			<div class="tab-content" id="vert-tabs-tabContent">
				<div class="tab-pane text-left fade show active" id="vert-tabs-personal" role="tabpanel" aria-labelledby="vert-tabs-personal-tab">
					
				</div>
				<div class="tab-pane fade" id="vert-tabs-contact" role="tabpanel" aria-labelledby="vert-tabs-contact-tab">
					 Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam. 
				</div>
				<div class="tab-pane fade" id="vert-tabs-address" role="tabpanel" aria-labelledby="vert-tabs-address-tab">
					 Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna. 
				</div>
				<div class="tab-pane fade" id="vert-tabs-banking" role="tabpanel" aria-labelledby="vert-tabs-banking-tab">
					 Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis. 
				</div>
			</div>
		</div>
	</div> -->
</div>
<style type="text/css">
	div.info-header { background: blue; padding: 0.4em; font-weight: bold; color: white;}
	select.select2bs4 {width: 100%;}
	/*label.col-form-label-sm { margin-bottom: 0; }*/
</style>
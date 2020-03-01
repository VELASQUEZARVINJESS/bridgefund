<div class="application-list">
	<div class="card card-primary">
		<div class="card-body">
			<div class="col-lg-8 offset-lg-2">
				<div class="form-group row">
					<div class="col-md-6 offset-md-3" style="position: relative;">
						<video id="video" width="400" height="300" style="border:1px dashed"></video>
						<div id="frame" style="border: 2px dashed #000; width: 300px; height: 300px;position: absolute;top: 0;left: 50px;"></div>
						<img id="photo" style="margin-left:3em;display:none;margin-bottom:0.3em;">
						<canvas id="canvas" width="300" height="300" style="display: none;"></canvas>
					</div>
					<div class="col-md-4 offset-md-4" style="position: relative;">
						<button id="takephoto" class="btn btn-primary"><i class="fa fa-camera"></i> Take Photo</button>
						<button id="capture" class="btn btn-primary" style="display:none;margin-top:0.3em;"><i class="fa fa-camera"></i> Capture</button>
					</div>
				</div>
			</div>
			<form class="form-horizontal applyloan col-lg-8 offset-lg-2" method="post" action="#">
				<input type="hidden" name="photo" id="photo">
				<div class="form-group row">
					<label for="applicant" class="col-sm-4 col-md-4 col-form-label">Borrower</label>
					<div class="col-sm-8 col-md-4">
						<select class="form-control select2bs4" id="applicant" name="applicant" data-placeholder="-- Borrower --" required>
							<option value="" hidden></option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="loanpurpose" class="col-sm-4 col-md-4 col-form-label">Loan Purpose</label>
					<div class="col-sm-8 col-md-4">
						<select class="form-control select2bs4" id="loanpurpose" name="loanpurpose" data-placeholder="-- Purpose --" required>
							<option value="Personal Loan">Personal Loan</option>
							<option value="Business Loan">Business Loan</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="applicant" class="col-sm-4 col-md-4 col-form-label">Co-Borrower</label>
					<div class="col-sm-8 col-md-4">
						<select class="form-control select2bs4" id="coborrower" name="coborrower" data-placeholder="-- Co-Borrower --" required>
							<option value="" hidden></option>
						</select>
					</div>
				</div>
				<div class="divider">Loan Terms</div>
				<div class="form-group row">
					<label for="amount" class="col-sm-4 col-md-4 col-form-label">Principal Amount</label>
					<div class="col-sm-8 col-md-4">
						<input type="number" name="amount" id="amount" class="form-control" placeholder="Loan Amount" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="interest" class="col-sm-4 col-md-4 col-form-label">Interest Rate</label>
					<div class="col-sm-8 col-md-4">
						<input type="number" name="interest" id="interest" class="form-control" placeholder="Monthly Interest Rate" step=0.01 value="5.6" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="duration" class="col-sm-4 col-md-4 col-form-label">Tenure</label>
					<div class="col-sm-8 col-md-4">
						<select class="form-control select2bs4" name="duration" id="duration" data-placeholder="-- Months --" required>
							<option value="" hidden></option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="repaymentcycle" class="col-sm-4 col-md-4 col-form-label">Repayment Cycle</label>
					<div class="col-sm-8 col-md-4">
						<select class="form-control select2bs4" name="repaymentcycle" id="repaymentcycle" data-placeholder="-- Repayment Cycle --" required>
							<option value="Bimonthly" selected>Bimonthly</option>
							<option value="Monthly">Monthly</option>
						</select>
					</div>
				</div>
				<div class="divider">Loan Fees</div>
				<div class="form-group row">
					<label for="processingfee" class="col-sm-4 col-md-4 col-form-label">Processing Fee</label>
					<div class="col-sm-8 col-md-4">
						<input type="number" name="processingfee" id="processingfee" class="form-control" placeholder="Loan Amount" value="150" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="notaryfee" class="col-sm-4 col-md-4 col-form-label">Notarial Fee</label>
					<div class="col-sm-8 col-md-4">
						<input type="number" name="notaryfee" id="notaryfee" class="form-control" placeholder="Notarial Fee" value="100" required>
					</div>
				</div>
				<div class="divider">Bank Details</div>
				<div class="form-group row">
					<label for="bankname" class="col-sm-4 col-md-4 col-form-label">Bank Name</label>
					<div class="col-sm-8 col-md-4">
						<input type="text" name="bankname" id="bankname" class="form-control" placeholder="Bank Name" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="bankbranch" class="col-sm-4 col-md-4 col-form-label">Branch</label>
					<div class="col-sm-8 col-md-4">
						<input type="text" name="bankbranch" id="bankbranch" class="form-control" placeholder="Branch" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="bankaccount" class="col-sm-4 col-md-4 col-form-label">Account Number</label>
					<div class="col-sm-8 col-md-4">
						<input type="text" name="bankaccount" id="bankaccount" class="form-control" placeholder="Account Number" required>
					</div>
				</div>
				<!-- <div class="divider">Documents</div>
				<div class="form-group row">
					<label for="requirement" class="col-sm-4 col-md-4 col-form-label"></label>
					<div class="col-sm-8 col-md-4">
						<select class="form-control select2bs4" id="requirement" data-placeholder="-- Select to upload --" required>
							<option value="BankStatement">Bank Statement</option>
							<option value="BusinessLicense">Business License</option>
							<option value="SignedLoanAgreement">Signed Loan Agreement</option>
							<option value="MapofResidence">Map of Residence</option>
							<option value="PaySlip">Pay Slip</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="offset-sm-4 offset-md-4 col-sm-8 col-md-4">
						<ul class="list-unstyled">
							<li><a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a></li>
							<li><a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a></li>
							<li><a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a></li>
							<li><a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a></li>
							<li><a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a></li>
						</ul>
					</div>
				</div> -->
				<div class="row">
					<div class="col-sm-4 col-md-4"></div>
					<div class="col-sm-8 col-md-3">
						<button type="submit" name="newapply" class="btn btn-block btn-success"><i class="fa fa-save"></i> SUBMIT</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<style type="text/css">
	.application-list .form-group > label {
		text-align: right;
	}
	select.select2bs4 { width: 100%; }
	div.divider { background: blue; padding: 0.4em; margin-bottom: 1em; font-weight: bold; color: #FFF; text-align: center;}
</style>
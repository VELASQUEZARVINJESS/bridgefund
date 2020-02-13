<div class="application-list">
	<form class="form-horizontal applyloan" method="post">
		<div class="card card-primary">
			<div class="card-body">
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
							<option value="" hidden></option>
							<option value="Personal Loan">Personal Loan</option>
							<option value="Business Loan">Business Loan</option>
							<option value="Insurance Loan">Insurance Loan</option>
							<option value="Calamity Loan">Calamity Loan</option>
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
						<input type="number" name="interest" id="interest" class="form-control" placeholder="Monthly Interest Rate" step=0.01 required>
					</div>
				</div>
				<div class="form-group row">
					<label for="duration" class="col-sm-4 col-md-4 col-form-label">Loan Duration</label>
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
							<option value="Daily">Daily</option>
							<option value="Weekly">Weekly</option>
							<option value="Biweekly">Biweekly</option>
							<option value="Monthly" selected>Monthly</option>
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
				<div class="divider">Documents</div>
				<div class="form-group row">
					<label for="requirement" class="col-sm-4 col-md-4 col-form-label">Requirements</label>
					<div class="col-sm-8 col-md-4">
						<select class="form-control select2bs4" id="requirement" data-placeholder="-- Select to upload --" required>
							<option value="Photo">Photo</option>
							<option value="BankStatement">Bank Statement</option>
							<option value="BusinessLicense">Business License</option>
							<option value="SignedLoanAgreement">Signed Loan Agreement</option>
							<option value="MapofResidence">Map of Residence</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 col-md-4">
						<button type="submit" name="newapply" class="btn btn-success">APPLY</button>
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
	div.divider { background: red; padding: 0.4em; margin-bottom: 1em; font-weight: bold; color: #FFF; text-align: center;}
</style>
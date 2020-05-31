<div class="loan-details">
	<?php include_once 'details/borrower.php'; ?>
	<div class="card card-primary">
		<div class="card-body">
			<table class="table table-striped table-sm text-sm loan-info">
				<thead>
					<th>LOAN ID</th>
					<th>RELEASED</th>
					<th>MATURITY</th>
					<th>REPAYMENT</th>
					<th>PAYABLE</th>
					<th>PENALTY</th>
					<th>DUE</th>
					<th>PAID</th>
					<th>BALANCE</th>
					<th>STATUS</th>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
	<div class="card card-primary">
		<div class="card-body">
			<div class="card card-primary card-outline card-outline-tabs">
				<div class="card-header p-0 border-bottom-0">
					<ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link" id="custom-tabs-repayment-tab" data-toggle="pill" href="#custom-tabs-repayment" role="tab" aria-controls="custom-tabs-repayment" aria-selected="true">Repayment</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="custom-tabs-loanterm-tab" data-toggle="pill" href="#custom-tabs-loanterm" role="tab" aria-controls="custom-tabs-loanterm" aria-selected="false">Loan Terms</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Loan Files</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Loan Comments</a>
						</li>
					</ul>
				</div>
				<div class="card-body pl-0 pr-0">
					<div class="tab-content" id="custom-tabs-three-tabContent">
						<div class="tab-pane fade" id="custom-tabs-repayment" role="tabpanel" aria-labelledby="custom-tabs-repayment-tab">
							<?php include 'details/repayment.php'; ?>
						</div>
						<div class="tab-pane fade" id="custom-tabs-loanterm" role="tabpanel" aria-labelledby="custom-tabs-loanterm-tab">
							<?php include 'details/loan_terms.php'; ?>
						</div>
						<div class="tab-pane fade show active" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
							<form id="uploadFile" method="post" class="row">
								<div class="col-md-3 col-sm-4" style="padding-left:1em;">
									<input type="hidden" name="part" value="upload" />
									<input type="hidden" name="loanid" value="<?php echo @$_GET['id']; ?>" />
									<div class="form-group">
										<select name="docname" class="form-control">
											<option value="payslip">Pay Slip</option>
											<option value="frontid">Front ID</option>
											<option value="backid">Back ID</option>
										</select>
									</div>
									<div class="form-group">
										<input name="docfile" type="file" accept="image/png,image/jpg,image/jpeg"/>
									</div>
									<button class="btn btn-success" type="submit">UPLOAD</button>
								</div>
								<div class="col-md-9 col-sm-8 loandocs" style="padding-right:1em;">
									<!-- <img src="http://localhost/bridgefund/docs/L000000006/L000000006_payslip.png" alt="Random image" /> -->
								</div>
							</form>
						</div>
						<div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
							<div class="card card-widget">
								<div class="card-body">
									<input type="text" class="form-control form-control-sm addnotes" placeholder="Press enter to post comment">
								</div>
								<div class="card-footer card-comments"></div>
							</div>
						</div>
					</div>
				</div>
				<!-- /.card -->
			</div>
		</div>
	</div>
</div>
<?php include_once PATH_PRT.'modal_payment.php'; ?>
<?php include_once PATH_PRT.'modal_edit_payment.php'; ?>
<style type="text/css">
	.loan-details table.loan-info th, .loan-details table.loan-info td { text-align: center; }
	.loan-details table.loan-info td{ vertical-align: middle; }
	.loan-details table.table-sched th, .loan-details table.table-sched td{ text-align: center; }
	div.info > div { display: inline-block; }
	/*div.info > div { margin-bottom: 1em; }*/
</style>
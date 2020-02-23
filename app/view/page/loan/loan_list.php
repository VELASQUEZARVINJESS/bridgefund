<div class="loan-list">
	<div class="card card-primary">
		<div class="card-body">
			<div class="row">
				<div class="col-6">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Loan ID or Borrower Name" />
						<div class="input-group-append">
							<button class="btn btn-primary">
								<i class="fas fa-search"></i>
							</button>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="btn-group">
						<!-- <button class="btn btn-success newborrower">APPLY LOAN</button> -->
						<!-- <button class="btn btn-success">BORROWER</button> -->
					</div>
				</div>
			</div><br>
			<table class="table table-striped table-sm text-sm">
				<thead>
					<th>NAME</th> <!-- NAME & ID -->
					<th>RELEASED</th>
					<th>MATURITY</th> <!-- END DATE -->
					<th>REPAYMENT</th> <!-- MONTHLY -->
					<th>PAYABLE</th>  <!-- PRINCIPAL W/ INTEREST -->
					<th>PENALTY</th>
					<th>DUE</th>
					<th>PAID</th>
					<th>BALANCE</th>
					<th>ACTION</th>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once PATH_PRT.'modal_payment.php'; ?>
<style type="text/css">
	.loan-list table th, .loan-list table td { text-align: center; }
	.loan-list table td{ vertical-align: middle; }
</style>
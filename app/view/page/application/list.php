<div class="application-list">
	<div class="card card-primary">
		<div class="card-body">
			<div class="row d-print-none">
				<!-- <div class="col-6">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Loan ID or Borrower Name" />
						<div class="input-group-append">
							<button class="btn btn-primary">
								<i class="fas fa-search"></i>
							</button>
						</div>
					</div>
				</div> -->
				<div class="col-6">
					<div class="btn-group">
						<button class="btn btn-success newborrower">APPLY LOAN</button>
						<!-- <button class="btn btn-success">BORROWER</button> -->
					</div>
				</div>
			</div><br>
			<table class="table table-striped table-sm text-sm table-dark">
				<thead>
					<th>DATE APPLY</th>
					<th>LOAN ID</th>
					<th>BORROWER</th>
					<th>PRINCIPAL</th>
					<th>REPAYMENT CYCLE</th>
					<th>LOAN DURATION</th>
					<th>STATUS</th>
					<th class="d-print-none">ACTION</th>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once PATH_PRT.'modal_release.php'; ?>
<style type="text/css">
	.application-list table td:last-of-type{width: 9em;}
	.application-list table td:nth-child(2){font-weight: bold;}
	table > thead th, table > tbody td{text-align:center;vertical-align: middle !important;}
	@media print {
		.borrower-list table td:last-of-type,.borrower-list table th:last-of-type{display: none;}
	}
</style>
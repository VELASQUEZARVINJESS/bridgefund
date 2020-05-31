<div class="application-report">
	<div class="card card-primary">
		<div class="card-body">
			<div class="row mb-2 d-print-none">
				<div class="col-md-4">
					<div class="input-group">
						<input type="text" class="form-control colsearch">
						<span class="input-group-append">
							<button type="button" class="btn btn-primary btn-flat btn-search"><i class="fas fa-search"></i></button>
						</span>
					</div>
				</div>
			</div>
			<div class="row">
				<h3 class="d-none d-print-block">Application Report</h3>
				<table class="table table-sm report ml-2 lr-2">
					<thead>
						<th>Date</th>
						<th>Name</th>
						<th>Loan #</th>
						<th>Amount</th>
						<th>Term</th>
						<th>Status</th>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</div>
	<style>
		div.application-report table th, div.application-report table td  { text-align: center;}
		table.total .cost {text-align: right;}
		@media print { div.application-report *{color: #000;} }
	</style>
</div>
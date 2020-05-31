<div class="collection">
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
				<h3 class="d-none d-print-block">Collection Report</h3>
				<table class="table table-sm report ml-2 lr-2">
					<thead>
						<th>Date</th>
						<th>Name</th>
						<th>Loan #</th>
						<th>Payment Type</th>
						<th>Collection</th>
						<th>Penalty</th>
						<th>Term</th>
					</thead>
					<tbody></tbody>
				</table>

				<table class="table table-sm ml-2 total" style="width:15em;page-break-inside: avoid;">
					<thead><th colspan=2 style="text-align: right;">TOTAL</th></thead>
					<tbody>
						<tr><td>Payment</td><td class="payment">0.00</td></tr>
						<tr><td>Penalty</td><td class="penalty">0.00</td></tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<style>
		div.collection table th, div.collection table td  { text-align: center;}
		table.total .cost {text-align: right;}
		@media print { div.collection *{color: #000;} }
	</style>
</div>
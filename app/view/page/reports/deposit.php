<div class="deposit-report">
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
				<h3 class="d-none d-print-block">Deposit Report <small class="d-none d-print-block daterange"></small></h3>
				<table class="table table-sm report ml-2 lr-2">
					<thead>
						<th>Date</th>
						<th>Edit By</th>
						<th>Reference</th>
						<th>Amount</th>
					</thead>
					<tbody></tbody>
                    <tfoot>
                        <tr>
                            <td colspan=3 style="text-align: right;">Total</td>
                            <td>0.00</td>
                        </tr>
                    </tfoot>
				</table>

			</div>
		</div>
	</div>
	<style>
		div.deposit-report table th, div.deposit-report table td  { text-align: center;}
		@media print { div.deposit-report *{color: #000;} }
	</style>
</div>
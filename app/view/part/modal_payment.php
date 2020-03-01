<div class="modal fade" id="loan_payment" tabindex="-1" role="dialog" aria-labelledby="loanpaymentModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="loanpaymentModalLabel">Repayment<span></span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-4"><label>Name</label></div>
					<div class="col borrower">###</div>
				</div>
				<div class="row">
					<div class="col-4"><label>Loan ID</label></div>
					<div class="col loanid">##</div>
				</div>
				<div class="row">
					<div class="col-4 mt-1"><label>Date Paid</label></div>
					<div class="col">
						<div class="form-group">
							<input type="text" class="form-control datepicker due_date" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-4 mt-1"><label>Payment Method</label></div>
					<div class="col">
						<div class="form-group">
							<input type="text" class="form-control payment_method" value="Cash"/>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-4 mt-1"><label>Amount to Pay</label></div>
					<div class="col">
						<div class="form-group">
							<input type="number" class="form-control amount_due" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-4 mt-1"><label>Penalty</label></div>
					<div class="col">
						<div class="form-group">
							<input type="number" class="form-control penalty" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-4"></div>
					<div class="col"><button class="btn btn-success btn-block paynow">Pay Now</button></div>
				</div><br>
			</div>
			<!-- <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div> -->
		</div>
	</div>
</div>
<style type="text/css">

</style>
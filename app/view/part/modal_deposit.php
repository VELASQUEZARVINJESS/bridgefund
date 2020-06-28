<div class="modal fade" id="deposit" tabindex="-1" role="dialog" aria-labelledby="depositModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="depositModalLabel">Add Deposit<span></span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Date</label>
					<input type="text" name="date" class="form-control exdatepicker date"/>
				</div>
				<div class="form-group">
					<label>Amount</label>
					<input type="number" name="amount" class="form-control amount"/>
				</div>
				<div class="form-group">
					<label>Reference</label>
					<input type="text" name="ref" class="form-control ref"/>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary addDeposit">Submit</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
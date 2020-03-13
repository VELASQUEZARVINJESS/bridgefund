<div class="modal fade" id="expense" tabindex="-1" role="dialog" aria-labelledby="expenseModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-sm">
			<div class="modal-header">
				<h5 class="modal-title" id="expenseModalLabel">Add Expense<span></span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Purpose</label>
					<input type="text" name="purpose" id="purpose" class="form-control"/>
				</div>
				<div class="form-group">
					<label>Amount</label>
					<input type="number" name="amount" id="amount" class="form-control"/>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary addExpense">Submit</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="release" tabindex="-1" role="dialog" aria-labelledby="releaseModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="releaseModalLabel">Loan ID: <span></span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-4"><label>Amount Loan</label></div>
					<div class="col amount">###</div>
				</div>
				<div class="row">
					<div class="col-4"><label>Interest Rate</label></div>
					<div class="col interest">5%</div>
				</div>
				<div class="row">
					<div class="col-4"><label>Terms</label></div>
					<div class="col duration">#</div>
				</div>
				<div class="row">
					<div class="col-4"><label>Repayment Cycle</label></div>
					<div class="col cycle">###</div>
				</div>
				<div class="row">
					<div class="col-4 mt-1"><label>Release Date</label></div>
					<div class="col">
						<div class="form-group">
							<input type="text" class="form-control appdatetimepicker releasedate" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-4 mt-1"><label>Check No.</label></div>
					<div class="col">
						<div class="form-group">
							<input type="text" class="form-control checkno" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-4 mt-1"><label>First Payment Date</label></div>
					<div class="col">
						<div class="form-group">
							<input type="text" class="form-control appdatetimepicker firstdate" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-4"></div>
					<div class="col"><button class="btn btn-success btn-block generate">Generate</button></div>
					<div class="col"><button class="btn btn-success btn-block savesched disabled">Save Schedule</button></div>
				</div><br>
				<table class="table table-sm table-dark table-striped loanTable">
					<thead>
						<th>DUE DATE</th>
						<th>AMOUNT DUE</th>
						<th>BALANCE</th>
					</thead>
					<tbody></tbody>
				</table>
			</div>
			<!-- <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div> -->
		</div>
	</div>
</div>
<style type="text/css">

</style>
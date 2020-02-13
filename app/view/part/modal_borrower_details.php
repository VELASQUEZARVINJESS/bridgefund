<div class="modal fade" id="borrower-details" tabindex="-1" role="dialog" aria-labelledby="borrower-detailsModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="borrower-detailsModalLabel">Borrower's Detail</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row justify-content-center">
					<div class="col-4">
						<img src="<?php echo PATH_IMG;?>user3-128x128.jpg">
					</div>
				</div><br>
				<table class="table table-sm">
					<tbody>
						<tr class="divider"><td colspan="2">Personal Info</td></tr>
						<tr><td>Name</td><td></td></tr>
						<tr><td>Gender</td><td>Male</td></tr>
						<tr><td>Marital Status</td><td></td></tr>
						<tr><td>Birthdate</td><td></td></tr>
						<tr><td>Address</td><td></td></tr>
						<tr class="divider"><td colspan="2">Contacts</td></tr>
						<tr><td>Mobile</td><td></td></tr>
						<tr><td>Email</td><td></td></tr>
						<tr><td>Landline</td><td></td></tr>
						<tr class="divider"><td colspan="2">Employment</td></tr>
						<tr><td>Position</td><td></td></tr>
						<tr><td>Monthly Salary</td><td></td></tr>
						<tr><td>Annual Salary</td><td></td></tr>
						<tr><td>Take Home Pay</td><td></td></tr>
						<tr><td>Employer</td><td></td></tr>
						<tr><td>Employer Address</td><td></td></tr>
						<tr><td>HR Manager</td><td></td></tr>
						<tr><td>HR Contact #</td><td></td></tr>
						<tr><td>HR Email</td><td></td></tr>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
	.modal#borrower-details table tr:not(.divider) > td:nth-child(1) {text-align: right; width: 10em;}
	.modal#borrower-details table tr:not(.divider) > td:nth-child(2) {text-align: left;padding-left: 2em; font-weight: bold; }
	.modal#borrower-details table tr.divider {background-color: blue; color: #FFF; font-weight: bold; text-transform: uppercase;}
</style>
<script type="text/javascript">
	var payment = {
		loanid: '',
		due_amount : 0,
		due_date: '',
		loadModal: function(loanid) {
			var t = this;
			this.init();
			$('div.modal#loan_payment').modal('show');
			// $('div.modal#loan_payment #loanpaymentModalLabel > span').text(this.loanid);
			let data = { loanid: loanid }
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				url: '<?php echo PATH_REQ; ?>general.req/modal_payment.req.php',
				data: { part: 'getLoanPayment', data: data},
				success: function(d) {
					$('div.modal#loan_payment input.amount_due').val(d.amount_due);
					$('div.modal#loan_payment input.due_date').val(d.due_date);
					$('div.modal#loan_payment div.loanid').text(d.loanid);
					$('div.modal#loan_payment div.borrower').text(d.borrower);
					t.loanid = d.loanid;
					// console.log(d);
				},
				error: function(x) {
					console.log(x.responseText);
				}
			});
		},
		pay: function() {
			let data = {
				loanid: this.loanid,
				term: this.term,
				amount_due: $('div.modal#loan_payment input.amount_due').val(),
				due_date: $('div.modal#loan_payment input.due_date').val()
			}
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				url: '<?php echo PATH_REQ; ?>general.req/modal_payment.req.php',
				data: { part: 'addLoanPayment', data: data},
				success: function(d) {
					console.log(d);
				},
				error: function(x) {
					console.log(x.responseText);
				}
			})
		},
		init: function() {
			this.loanid = '';
			this.due_amount = '';
			this.due_date = '';
		}
	}
</script>
<script type="text/javascript">
	$(() => {
		$('input.datepicker.due_date').datetimepicker({
			keepOpen: false,
			format: 'YYYY-MM-DD',
			minDate: moment().subtract(7, 'days'),
			maxDate: moment()
		});		
	});
	var payment = {
		loanid: '',
		due_amount : 0,
		due_date: '',
		term: 0,
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
					t.due_amount = d.amount_due;
					t.loanid = d.loanid;
					t.term = d.term;
					// console.log(d);
				},
				error: function(x) {
					console.log(x.responseText);
				}
			});
		},
		pay: function(callback) {
			$('div.modal#loan_payment button.paynow').click(function(e) {
				e.stopPropagation();e.stopImmediatePropagation();alert('clicked');
				let data = {
					loanid: payment.loanid,
					term: payment.term,
					due: payment.due_amount,
					amount_due: $('div.modal#loan_payment input.amount_due').val(),
					penalty: $('div.modal#loan_payment input.penalty').val(),
					due_date: $('div.modal#loan_payment input.due_date').val()
				}
				$.ajax({
					type: 'POST',
					dataType: 'JSON',
					url: '<?php echo PATH_REQ; ?>general.req/modal_payment.req.php',
					data: { part: 'addLoanPayment', data: data},
					success: function(d) {
						if (typeof d.success !== 'undefined') {
							$('div.modal#loan_payment').modal('hide');
							$('div.modal#loan_payment input.amount_due').val(0);
							$('div.modal#loan_payment input.due_date').val('');
							$('div.modal#loan_payment div.loanid').text('');
							$('div.modal#loan_payment div.borrower').text('');
							if (typeof callback === 'function') {
								callback();
							}
						} else if(typeof d.error !== 'undefined') {
							alert(d.error.join(' / '));
						}
					},
					error: function(x) {
						console.log(x.responseText);
					}
				});
			});
		},
		init: function() {
			this.loanid = '';
			this.due_amount = '';
			this.due_date = '';
			this.term = 0;
		}
	}


</script>
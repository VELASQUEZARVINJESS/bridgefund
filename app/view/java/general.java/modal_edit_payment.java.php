<?php if (isset($_GET['f']) && @$_GET['f']=='loan') { ?>
<script>
    $(() => {
		$('#edit_payment input.datepicker.due_date').datetimepicker({
			keepOpen: false,
			format: 'MMM DD, YYYY',
			minDate: moment().subtract(7, 'days'),
			maxDate: moment()
		});	
	});
	var editpay = {
		loanid: '',
		due_amount : 0,
		due_date: '',
		term: 0,
		loadModal: function(loanid) {
			var t = this;
			$('div.modal#edit_payment').modal('show');
			let data = { loanid: loanid, term: t.term }
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				url: '<?php echo PATH_REQ; ?>general.req/modal_edit_payment.req.php',
				data: { part: 'getLoanPaymentInfo', data: data},
				success: function(d) {console.log(d);
					$('div.modal#edit_payment input.amount_due').val(d.amount_due);
					$('div.modal#edit_payment input.due_date').val(d.due_date);
					$('div.modal#edit_payment div.loanid').text(d.loanid);
					$('div.modal#edit_payment div.borrower').text(d.borrower);
					$('div.modal#edit_payment input.payment_method').val(d.paytype);
					$('div.modal#edit_payment input.penalty').val(d.penalty);
					t.due_amount = d.amount_due;
					t.loanid = d.loanid;
				},
				error: function(x) { console.log(x.responseText); }
			});
		},
		update: function(callback) {
			$('div.modal#edit_payment button.updatePayment').click(function(e) {
				e.stopPropagation(); e.stopImmediatePropagation();
				let c = confirm("Are you sure that you want to proceed?");
				if (c) {
					let data = {
						loanid: editpay.loanid,
						term: editpay.term,
						due: editpay.due_amount,
						amount_due: $('div.modal#edit_payment input.amount_due').val(),
						penalty: $('div.modal#edit_payment input.penalty').val(),
						due_date: $('div.modal#edit_payment input.due_date').val(),
						pay_method: $('div.modal#edit_payment input.payment_method').val()
					}
					$.ajax({
						type: 'POST',
						dataType: 'JSON',
						url: '<?php echo PATH_REQ; ?>general.req/modal_edit_payment.req.php',
						data: { part: 'updateLoanPayment', data: data},
						success: function(d) {
							if (typeof d.success !== 'undefined') {
								$('div.modal#edit_payment').modal('hide');
								$('div.modal#edit_payment input.amount_due').val(0);
								$('div.modal#edit_payment input.due_date').val('');
								$('div.modal#edit_payment div.loanid').text('');
								$('div.modal#edit_payment div.borrower').text('');
								$('div.modal#edit_payment input.payment_method').val('Cash');
								if (typeof callback === 'function') {
									callback();
								}
							} else if(typeof d.error !== 'undefined') {
								alert(d.error.join(' / '));
							}
						},
						error: function(x) { console.log(x.responseText); }
					});	
				}
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
<?php } ?>
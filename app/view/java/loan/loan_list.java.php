<script type="text/javascript">
	$(function(){
		pageTitle('Loan List');
		let table = $('.loan-list table');
		function loadLoanList() {
			table.find('tbody').html('');
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				url: '<?php echo $req; ?>',
				data: { part: 'getLoanList'},
				success: function(d) {
					if (typeof d.error == 'undefined' && typeof d == 'object') {
						d.forEach(v => {
							let bal = parseFloat(v.payable) - parseFloat(v.paid);
							table.find('tbody').append($('<tr/>').data('loanid',v.loanid)
								.append($('<td/>').html(v.name+'<br/>'+v.loanid))
								.append($('<td/>').text(formatDate(v.released)))
								.append($('<td/>').text(formatDate(v.maturity)))
								.append($('<td/>').text(v.repayment))
								.append($('<td/>').html(formatCurrency(v.payable) + '<br/>' + v.interest + '%'))
								.append($('<td/>').text(formatCurrency(v.penalty)))
								.append($('<td/>').html(formatDate(v.sched) + '<br/>' + formatCurrency(v.due)))
								.append($('<td/>').text(formatCurrency(v.paid)))
								.append($('<td/>').text(formatCurrency(bal)))
								.append($('<td/>').addClass('d-print-none')
									.append($('<div/>').addClass('btn-group')
										.append($('<button/>')
											.attr({'type':'button','title':'Loan Details'})
											.addClass('btn btn-primary details')
											.append($('<i/>')
												.addClass('fas fa-eye')
											)
										)
										.append($('<button/>')
											.attr({'type':'button','title':'Pay'})
											.addClass('btn btn-success payment')
											.append($('<i/>')
												.addClass('fas fa-file-invoice')
											)
										)
									)
								)
							);
							if (bal == 0) {
								table.find('tbody > tr:last > td button.payment').remove();
								table.find('tbody > tr:last > td:nth-child(7)').text('');
							}
						});
						buttonAction();
					}
				},
				error: function(x) { console.log(x.responseText); }
			});
		}

		let buttonAction = () => {
			table.find('tr > td button.payment').click(function(e) {
				e.stopPropagation(); e.stopImmediatePropagation();
				payment.loadModal($(this).closest('tr').data('loanid'));
				payment.pay(function(){
					loadLoanList();
				});
			});
			table.find('tr > td button.details').click(function(e) {
				e.stopPropagation(); e.stopImmediatePropagation();
				location.href = '<?php echo Q.DIR.'loan'.A.PAGE.'details'.A.ID;?>' + ($(this).closest('tr').data('loanid'));
			});
		}
		loadLoanList();
	});
</script>
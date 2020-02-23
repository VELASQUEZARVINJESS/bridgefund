<script type="text/javascript">
	$(function(){
		pageTitle('Loan List');
		$(()=>{
			$('.content-wrapper').css('background','#000');
			$('div.card-body').css('background','#111');
			$('table').addClass('table-dark');
			$('h1.pageTitle').css('color','#FFF');
			$('footer.main-footer').css({'color':'#FFF','background':'#131313','border':0});
			$('input').css({'color':'#FFF','background':'#242424','border':0});
			$('div.modal-content').css({'background':'#111','color':'#FFF'});
			$('div.modal-content > div').css({'border-bottom-color':'#242424'});
		});
		let table = $('.loan-list table');
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
							.append($('<td/>')
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
						)
					});
					buttonAction();
				}
			},
			error: function(x) {
				console.log(x.responseText);
			}
		});

		let buttonAction = () => {
			table.find('tr > td button.payment').click(function(e) {
				e.stopPropagation();
				payment.loadModal($(this).closest('tr').data('loanid'));
				// release.modalButton();
			});
		}
	});
</script>
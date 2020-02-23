<script type="text/javascript">
	pageTitle('Loan Application List');
	$(()=>{
		$('.content-wrapper').css('background','#000');
		$('div.card-body').css('background','#111');
		$('h1.pageTitle').css('color','#FFF');
		$('footer.main-footer').css({'color':'#FFF','background':'#131313','border':0});
		$('input').css({'color':'#FFF','background':'#242424','border':0});
		$('div.modal-content').css({'background':'#111','color':'#FFF'});
		$('div.modal-content > div').css({'border-bottom-color':'#242424'});
	});
	$('button.newborrower').click(() => {
		location.href = '<?php echo Q.DIR.'application'.A.PAGE; ?>new';
	});
	function loanApplications (p) {
		if (typeof p !== 'undefined') {}
		let table = $('.application-list table > tbody');
		let filter = new Array();
		let list = new Array();
		let url = "<?php echo $req; ?>";

		let queryList = () => {
			$.ajax({
				type: "POST",
				url: url,
				data: {"part": 'applicationList', "filter": filter},
				dataType: "JSON",
				success: d => {
					list = d;
					loadListOnTable();
				},
				error: x => {
					console.log(x.responseText);
				}
			});
		}

		let loadListOnTable = () => {
			table.html(''); 
			list.forEach(el => {
				let status = '';
				switch(el.loan_status) {
					case 'PENDING':
						status = '<span class="badge badge-warning">PENDING</span>';
						break;
					case 'APPROVE':
						status = '<span class="badge badge-success">APPROVED</span>';
						break;
					case 'DECLINE':
						status = '<span class="badge badge-danger">DECLINED</span>';
						break;
				}
				table.append($('<tr/>').data('id',el.loan_id)
					.append($('<td/>').text(el.date_apply))
					.append($('<td/>').text(el.loan_id))
					.append($('<td/>').text(el.borrower))
					.append($('<td/>').text(formatCurrency(el.loan_amount)))
					.append($('<td/>').text(el.repayment_cycle))
					.append($('<td/>').text(el.loan_duration))
					.append($('<td/>').text(''))
					.append($('<td/>').html(status))
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
								.attr({'type':'button','title':'Approve Loan'})
								.addClass('btn btn-success approve')
								.append($('<i/>')
									.addClass('fas fa-thumbs-up')
								)
							)
							.append($('<button/>')
								.attr({'type':'button','title':'Decline Loan'})
								.addClass('btn btn-danger decline')
								.append($('<i/>')
									.addClass('fas fa-thumbs-down')
								)
							)
							.append($('<button/>')
								.attr({'type':'button','title':'Release Fund'})
								.addClass('btn btn-success release')
								.append($('<i/>')
									.addClass('fas fa-calendar-alt')
								)
							)
						)
					)
				);
				if (el.loan_status == 'PENDING') {
					table.find('tr:last td button.release').remove();
				} else if(el.loan_status == 'APPROVE') {
					table.find('tr:last td button.approve').remove();
					table.find('tr:last td button.decline').remove();
				}
			});
			buttonActions();
		}

		let buttonActions = () => {
			table.find('tr > td button.release').click(function(e) {
				e.stopPropagation();
				release.loadModal($(this).closest('tr').data('id'));
				release.modalButton();
			});
			table.find('tr > td button.approve').click(function(e) {
				e.stopPropagation();
				let con = confirm("Are you sure that you want to approve this application?");
				if (con) {
					let data = {
						loanid: $(this).closest('tr').data('id')
					}
					$.ajax({
						type: 'POST',
						dataType: 'JSON',
						url: '<?php echo $req; ?>',
						data: {part: 'approveloan', data: data},
						success: function(d) {
							if (typeof d.success != 'undefined') {
								alert(d.success);
								loanApplications();
							} else if (typeof d.error != 'undefined') {
								alert(d.error.join('<br/>'));
							}
						},
						error: function(x) {
							console.log(x.responseText);
						}
					});
				}
			});
			table.find('tr > td button.decline').click(function(e) {
				e.stopPropagation();
				let con = confirm("Are you sure that you want to decline this application?");
				if (con) {
					let data = {
						loanid: $(this).closest('tr').data('id')
					}
					$.ajax({
						type: 'POST',
						dataType: 'JSON',
						url: '<?php echo $req; ?>',
						data: {part: 'declineloan', data: data},
						success: function(d) {
							if (typeof d.success != 'undefined') {
								alert(d.success);
								loanApplications();
							} else if (typeof d.error != 'undefined') {
								alert(d.error.join('<br/>'));
							}
						},
						error: function(x) {
							console.log(x.responseText);
						}
					});
				}
			});
		}

		this.getList = () => {
			return list;
		}

		this.loadList = () => {console.log(list);
			loadListOnTable();
		}

		queryList();
	}

	$(() => {
		new loanApplications();
	});
</script>
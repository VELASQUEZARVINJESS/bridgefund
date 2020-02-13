<script type="text/javascript">
	pageTitle('Loan Application List');
	$(()=>{
		$('.content-wrapper').css('background','#000');
		$('div.card-body').css('background','#111');
		$('h1.pageTitle').css('color','#FFF');
		$('footer.main-footer').css({'color':'#FFF','background':'#131313','border':0});
		$('input').css({'color':'#FFF','background':'#242424','border':0});
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
					case 'pending':
						status = '<span class="badge badge-warning">PENDING</span>';
						break;
					case 'approve':
						status = '<span class="badge badge-success">APPROVED</span>';
						break;
					case 'decline':
						status = '<span class="badge badge-danger">DECLINED</span>';
						break;
				}
				table.append($('<tr/>').data('id',el.loan_id)
					.append($('<td/>').text(el.date_apply))
					.append($('<td/>').text(el.loan_id))
					.append($('<td/>').text(el.borrower))
					.append($('<td/>').text(el.loan_amount))
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
				if (el.loan_status == 'pending') {
					table.find('tr:last td button.release').remove();
				} else if(el.loan_status == 'approve') {
					table.find('tr:last td button.approve').remove();
					table.find('tr:last td button.decline').remove();
				}
			});
			buttonActions();
		}

		let buttonActions = () => {
			table.find('tr > td button.release').click(function() {
				console.log($(this).html());
				$('div.modal#release').modal('show');
				// $('div.modal#release .modal-content').data('loanid',$(this).closest('tr').data('id'));
				$('div.modal#release #releaseModalLabel').text($(this).closest('tr').data('id'));
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
		var lList =  new loanApplications();
		// bList.loadList();
	});
</script>
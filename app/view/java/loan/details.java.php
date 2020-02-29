<script type="text/javascript">
	pageTitle('Loan Details');
	$(()=>{
		$('.content-wrapper').css('background','#000');
		$('div.card-body').css('background','#111');
		$('h1.pageTitle').css('color','#FFF');
		$('footer.main-footer').css({'color':'#FFF','background':'#131313','border':0});
		$('input').css({'color':'#FFF','background':'#242424','border':0});
		$('div.modal-content').css({'background':'#111','color':'#FFF'});
		$('div.modal-content > div').css({'border-bottom-color':'#242424'});
		$('table').addClass('table-dark');
		$('div.card').css({'color':'white'});
		$('div.card .card-header').css({'background-color':'#000'});
		$('body').css({'background':'black'});
	});

	// client details
	function loadClientInfo(id) {
		let data = { 'id': id }
		$.ajax({
			type: 'POST',
			dataType: 'JSON',
			url: '<?php echo $req; ?>',
			data: {part: 'getClientDetails', data: data},
			success: function(d) {
				if (typeof d == 'object') {
					$('.loan-details div.id').text(d.id);
					$('.loan-details div.name').text(d.client);
					$('.loan-details div.gender').text(d.gender);
					$('.loan-details div.city').text(d.city);
					$('.loan-details div.province').text(d.province);
					$('.loan-details div.zipcode').text(d.zipcode);
					$('.loan-details div.mobile').text(d.mobile);
					$('.loan-details div.email').text(d.email);
					$('.loan-details div.landline').text(d.landline);
				}
			},
			error: function(x) {
				console.log(x.responseText);
			}
		});
	}
	loadClientInfo('<?php echo $_GET['id']; ?>');

	// loan history
	function loadLoanInfo(id) {
		let table = $('table.loan-info');
		let data = { 'id': id };
		table.find('tbody').html('');
		$.ajax({
			type: 'POST',
			dataType: 'JSON',
			url: '<?php echo $req; ?>',
			data: { part: 'getLoanInfo', data: data},
			success: function(d) {
				if (typeof d.error == 'undefined' && typeof d == 'object') {
					d.forEach(v => {
						let bal = parseFloat(v.payable) - parseFloat(v.paid);
						let status = '';
						switch(v.status) {
							case 'PENDING':
								status = '<span class="badge badge-warning">PENDING</span>';
								break;
							case 'APPROVE':
								status = '<span class="badge badge-success">APPROVED</span>';
								break;
							case 'DECLINE':
								status = '<span class="badge badge-danger">DECLINED</span>';
								break;
							case 'ONGOING':
								status = '<span class="badge badge-success">ONGOING</span>';
								break;
						}
						table.find('tbody').append($('<tr/>').data('loanid',v.loanid)
							.append($('<td/>').html(v.loanid))
							.append($('<td/>').text(formatDate(v.released)))
							.append($('<td/>').text(formatDate(v.maturity)))
							.append($('<td/>').text(v.repayment))
							.append($('<td/>').html(formatCurrency(v.payable) + '<br/>' + v.interest + '%'))
							.append($('<td/>').text(formatCurrency(v.penalty)))
							.append($('<td/>').html(formatDate(v.sched) + '<br/>' + formatCurrency(v.due)))
							.append($('<td/>').text(formatCurrency(v.paid)))
							.append($('<td/>').text(formatCurrency(bal)))
							.append($('<td/>').html(status))
						);
						if (bal == 0) {
							table.find('tbody > tr:last > td:nth-child(7)').text('');
						}
					});
				}
			},
			error: function(x) {
				console.log(x.responseText);
			}
		});
	}

	loadLoanInfo('<?php echo $_GET['id']; ?>');

	// loan sched
	function loadLoanSched(id) {
		let table = $('table.table-sched');
		let data = { 'id': id };
		table.find('tbody').html('');
		$.ajax({
			type: 'POST',
			dataType: 'JSON',
			url: '<?php echo $req; ?>',
			data: { part: 'getLoanSched', data: data},
			success: function(d) {
				if (typeof d.error == 'undefined' && typeof d == 'object') {
					let cntr = 1;
					d.forEach(v => {
						let bal = parseFloat(v.payable) - parseFloat(v.paid);
						let status = '';
						switch(v.status) {
							case 'paid':
								status = '<span class="badge badge-success">PAID</span>';
								break;
							case 'scheduled':
								status = '<span class="badge badge-primary">SCHEDULED</span>';
								break;
						}
						table.find('tbody').append($('<tr/>').data('loanid',v.loanid)
							.append($('<td/>').text(cntr++))
							.append($('<td/>').text(data.id))
							.append($('<td/>').text(v.method))
							.append($('<td/>').text(formatDate(v.date)))
							.append($('<td/>').html(formatCurrency(v.amount)))
							.append($('<td/>').text(formatCurrency(v.penalty)))
							.append($('<td/>').html(status))
						);
					});
				}
			},
			error: function(x) {
				console.log(x.responseText);
			}
		});
	}

	$('button.repayment').click(function(e) {
		e.preventDefault();
		payment.loadModal('<?php echo $_GET['id'];?>');
		payment.pay(function(){
			loadLoanSched('<?php echo $_GET['id'];?>');
			loadLoanInfo('<?php echo $_GET['id']; ?>');
		});
	});

	loadLoanSched('<?php echo $_GET['id'];?>');
</script>
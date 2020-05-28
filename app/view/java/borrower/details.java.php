<script type="text/javascript">
	// $(() => {
		pageTitle('Borrower Details');
		/* $('.content-wrapper').css('background','#000');
		$('div.card-body').css('background','#111');
		$('h1.pageTitle').css('color','#FFF');
		$('footer.main-footer').css({'color':'#FFF','background':'#131313','border':0});
		$('input').css({'color':'#FFF','background':'#242424','border':0});
		$('div.modal-content').css({'background':'#111','color':'#FFF'});
		$('div.modal-content > div').css({'border-bottom-color':'#242424'});
		$('table').addClass('table-dark');
		$('div.card').css({'color':'white'});
		$('div.card .card-header').css({'background-color':'#000'});
		$('body').css({'background':'black'}); */
		function borrowerDetails(id) {
			let url = "<?php echo $req; ?>";
			let data = { 'id': id };
			$.ajax({
				type: "POST",
				url: url,
				data: {"part": 'borrowerWithEmployment',data: data},
				dataType: "JSON",
				success: d => {
					borrower = d;
					$(document).trigger('loadDetails',{data: d});
				},
				error: x => {
					console.log(x.responseText);
				}
			});
		}

		borrowerDetails('<?php echo $_GET['id']; ?>');
		$(document).on('loadDetails',(e, data) => {
			let b = data.data;
			let address = '';
			if (b.street != '') { address += b.street + ', ';}
			if (b.subdivision != '') { address += b.subdivision + ', '; }
			if (b.photo == '') {
				$('.borrower-details img.photo').attr('src','<?php echo PATH_IMG;?>user.png');
			} else {
				$('.borrower-details img.photo').attr('src','<?php echo PATH_URL;?>docs/'+b.photo);
			}
			$('.borrower-details div.id').text(b.borrower_no);
			$('.borrower-details div.name').text(b.borrower);
			$('.borrower-details div.mobile').text(b.mobile);
			$('.borrower-details div.email').text(b.email);
			$('.borrower-details div.landline').text(b.landline);
			$('.borrower-details div.sex').text(b.gender);
			$('.borrower-details div.bdate').text(b.birthdate);
			$('.borrower-details div.address').text(address + b.address);
			$('.borrower-details div.position').text(b.position);
			$('.borrower-details div.employer').text(b.employer);
			$('.borrower-details div.smonthly').text(b.smonthly);
			$('.borrower-details div.sannual').text(b.sannual);
			$('.borrower-details div.takehomepay').text(b.takehomepay);
			$('.borrower-details div.hmanager').text(b.hmanager);
			$('.borrower-details div.hcontact').text(b.hcontact);
			$('.borrower-details div.hemail').text(b.hemail);
		});

		// loan history
		let table = $('#loanhistory table');
		function loadLoanHistory(id) {
			let data = { 'id': id };
			table.find('tbody').html('');
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				url: '<?php echo $req; ?>',
				data: { part: 'getLoanHistory', data: data},
				success: function(d) {
					if (typeof d.error == 'undefined' && typeof d == 'object') {
						d.forEach(v => {
							switch(v.status) {
								case 'PENDING' : status = '<span class="badge badge-warning">PENDING</span>'; break;
								case 'APPROVE' : status = '<span class="badge badge-success">APPROVED</span>'; break;
								case 'DECLINE' : status = '<span class="badge badge-danger">DECLINED</span>'; break;
								case 'ONGOING' : status = '<span class="badge badge-primary">ONGOING</span>'; break;
								case 'PAID UP' : status = '<span class="badge badge-sucess">PAID UP</span>'; break;
							}
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
									)
								)
							);
							if (bal == 0) {
								table.find('tbody > tr:last > td:nth-child(7)').text('');
								// table.find('tbody > tr:last > td:nth-child(9)').text('PAID');
							}
						});
						buttonAction();
					}
				},
				error: function(x) {
					console.log(x.responseText);
				}
			});
		}

		let buttonAction = () => {
			table.find('tr > td button.details').click(function(e) {
				e.stopPropagation(); e.stopImmediatePropagation();
				location.href = '<?php echo Q.DIR.'loan'.A.PAGE.'details'.A.ID;?>' + ($(this).closest('tr').data('loanid'));
			});
		}

		loadLoanHistory('<?php echo $_GET['id']; ?>');
		getComment('borrower','<?php echo @$_GET['id']?>');
		$('input.addnotes').keypress(function(e){
			let key = e.which;
			e.stopPropagation();
			if (key == 13) {
				setComment('borrower','<?php echo @$_GET['id']?>',$(this).val());
				return false;
			}
		}); 
	// });
</script>
<script>

	pageTitle('Borrower Lists');
	// $(()=>{
	// 	$('.content-wrapper').css('background','#000');
	// 	$('div.card-body').css('background','#111');
	// 	$('h1.pageTitle').css('color','#FFF');
	// 	$('footer.main-footer').css({'color':'#FFF','background':'#131313','border':0});
	// 	$('input').css({'color':'#FFF','background':'#242424','border':0});
	// 	$('table').addClass('table-dark');
	// });

	$('button.newborrower').click(() => {
		location.href = '<?php echo Q.DIR.'borrower'.A.PAGE; ?>new';
	});
	
	function borrowers (p) {
		if (typeof p !== 'undefined') {}
		let table = $('.borrower-list table > tbody');
		let list = new Array();
		let url = "<?php echo $req; ?>";
		let bsearch = $('button.bsearch');

		let queryList = (dt) => {
			let data = new Array();
			if (typeof dt !== 'undifined') { data = dt; }
			$.ajax({
				type: "POST",
				url: url,
				data: {"part": 'borrowerList', "data": data},
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
				table.append($('<tr/>').data('id',el.borrower_no)
					.append($('<td/>').text(el.borrower_no))
					.append($('<td/>').text(el.borrower))
					.append($('<td/>').text(el.gender))
					.append($('<td/>').text(el.email))
					.append($('<td/>').text(el.mobile))
					.append($('<td/>').addClass('d-print-none')
						.append($('<div/>').addClass('btn-group')
							.append($('<button/>')
								.attr({'type':'button','title':'View Profile'})
								.addClass('btn btn-primary view')
								.append($('<i/>')
									.addClass('fas fa-eye')
								)
							)
							.append($('<button/>')
								.attr({'type':'button','title':'Edit Profile'})
								.addClass('btn btn-primary edit')
								.append($('<i/>')
									.addClass('fas fa-edit')
								)
							)
						)
					)
				);
			});
			buttonActions();
		}

		let buttonActions = () => {
			table.find('tr > td button.view').click(e => {
				location.href = '<?php echo Q.DIR.'borrower'.A.PAGE.'details'.A; ?>id='+$(e.currentTarget).closest('tr').data('id');
			});
			table.find('tr > td button.edit').click(e => {
				location.href = '<?php echo Q.DIR.'borrower'.A.PAGE.'edit'.A; ?>id='+$(e.currentTarget).closest('tr').data('id');
			});
		}

		this.getList = () => {
			return list;
		}

		this.loadList = () => {console.log(list);
			loadListOnTable();
		}

		queryList();

		bsearch.click(function(e) {
			let data = {'filter': $('input.isearch').val() }
			queryList(data);
		});

		$('input.isearch').keypress(function(e) {
			let data = {'filter': $(this).val() }
			let key = e.which;
			if (key == 13) {
				queryList(data);			
			}
		});
	}

	$(() => {
		var bList =  new borrowers();
		// bList.loadList();
	});
</script>
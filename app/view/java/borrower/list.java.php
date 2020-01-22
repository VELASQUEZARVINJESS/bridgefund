<script>
	function borrowers (p) {
		if (typeof p !== 'undefined') {
			
		}
		let table = $('.borrower-list table > tbody');
		let filter = new Array();
		let list = new Array();

		let queryList = function () {
			$.ajax({
				type: "POST",
				url: "<?php echo $req; ?>",
				data: {"part": 'borrowerList', "filter":filter},
				dataType: "JSON",
				success: function (d) {
					list = d;
					loadListOnTable();
				},
				error: function (x) {
					console.log(x.responseText);
				}
			});
		}

		let loadListOnTable = function () {
			table.html(''); 
			list.forEach(el => {
				table.append($('<tr/>')
					.append($('<td/>'))
					.append($('<td/>').text(el.borrower))
					.append($('<td/>').text(el.email))
					.append($('<td/>').text(el.phone_no))
					.append($('<td/>')
						.append($('<button/>')
							.addClass('btn btn-success btn-block btn-sm')
							.text('View Details')
						)
					)
				);
			});
		}

		this.getList = function () {
			return list;
		}

		this.loadList = function() {console.log(list);
			loadListOnTable();
		}

		queryList();
	}

	var bList =  new borrowers();
	// bList.loadList();
</script>
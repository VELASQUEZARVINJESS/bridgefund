<script>

	function listEmployee (p){
		if (typeof p !== 'undefined') {}
		let table = $('userEmployee table > tbody');
		let filder = new Array();
		let list = new Array();
		let url = "<?php echo $req;?>";

		let queryList = () => {
			$.ajax({
				type: "POST",
				url : url,
				data: {"part": 'employeeList', "filter": filter},
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
			list.forEach(el =>{
				table.append($('<tr/>').data('id', u.users)
					.append($('<tr/>').text(u.id))
					.append($('<tr/>').text(u.name))
					.append($('<tr/>').text(u.username))
					.append($('<div/>').addClass('d-prent-none')
						.append($('<button/>')
							.attr({'type':'button','title':'Delete'})
							.addClass('btn btn-primary view')
							.append($('<i/>')
								.addClass('fas fa-eye')
							)
						)
					)

					.append($('<div/>').addClass('d-prent-none')
						.append($('<button/>')
							.attr({'type':'button','title':'Edit'})
							.addClass('btn btn-primary view')
							.append($('<i/>')
								.addClass('fas fa-eye')
							)
						)
					)
				)
			});
			buttonActions();

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
		var bList =  new listEmployee();

	});
</script>

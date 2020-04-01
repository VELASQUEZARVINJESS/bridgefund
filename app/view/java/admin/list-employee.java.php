<script>

	function listEmployee (p){
		if (typeof p !== 'undefined') {}
		let table = $('.userEmployee table > tbody');
		let filter = new Array();
		let list = new Array();
		let url = '<?php echo PATH_REQ;?>admin/list.employee.req.php';

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
				table.append($('<tr/>').data('id', el.users)
					.append($('<td/>').addClass('text-center').text(el.id))
					.append($('<td/>').text(el.name))
					.append($('<td/>').text(el.username))
					.append($('<td/>').text(el.level))
					.append($('<div/>').addClass('d-prent-none')
						.append($('<button/>')
							.attr({'type':'button','title':'Delete'})
							.addClass('btn btn-primary view')
							.append($('<i/>')
								.addClass('fas fa-eye')
							)
						)
					)

/* 					.append($('<div/>').addClass('d-prent-none')
						.append($('<button/>')
							.attr({'type':'button','title':'Edit'})
							.addClass('btn btn-primary view')
							.append($('<i/>')
								.addClass('fas fa-eye')
							)
						)
					) */
				)
			});
			/* buttonActions(); */

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

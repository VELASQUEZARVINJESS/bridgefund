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
				error: x => { console.log(x.responseText); }
			});
		}

		let loadListOnTable = () => { //LOAD DATA TO DATABASE 
			table.html('');
			list.forEach(el =>{
				table.append($('<tr/>').data('id', el.users)
					.append($('<td/>').text(el.name))
					.append($('<td/>').text(el.username))
					.append($('<td/>').text(el.level))
					.append($('<td/>').text(el.action)
						.append($('<div/>').addClass('text-center d-prent-none')
							.append($("<div/>").addClass('btn-group')
								.append($('<button/>')
									.attr({'type':'button', 'title': 'Edit'})
									.addClass('btn btn-sm btn-outline-danger delete')
										.text('DELETE')	
								)
							)		
						) 
					)
				)
			});
			buttonActions(); 
		}
		
		let buttonActions = () =>{ //DELETE USER EMPLOYEE
			table.find('tr > td button.delete').click(function(e){
				e.stopPropagation();
				let con = confirm("Are you sure that you want delete this employee");
				if(con){
					users_id: $(this).closest('tr').data('id')
				}
				$.ajax({
					type: 'POST',
					dataType: 'JSON',
					url: '<?php echo PATH_REQ;?>admin/delete.employee.req.php',
					data: {part: 'deleteEmployee', data: 'data'},
					success: function(d){
						if(typeof d.success != 'undefined'){
							alert(d.success);
						} 
					},
					error: function(x) { console.log(x.responseText); }
				})
			});
		}

		this.loadList = () => {console.log(list);
			loadListOnTable();
		}

		queryList();
	}
	$(() => {
		var eList =  new listEmployee();
	});

</script>

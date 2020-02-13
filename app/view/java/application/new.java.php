<script type="text/javascript">
	pageTitle('Application List');
	$(() => {
		for (let i = 1; i <= 30; i++) {
			$('select#duration').append($('<option/>').val(i).text(i));
		}
		$.ajax({
			type: 'POST',
			dataType: 'JSON',
			url: '<?php echo PATH_REQ; ?>general.req/borrower_details.req.php',
			data: {part: 'borrowerSelect'},
			success: d => {
				if (typeof d === 'object') {
					d.forEach((data) => {
						$('form.applyloan select#applicant').append($('<option/>').val(data.borrower_no).text(data.borrower_no + ' - ' + data.borrower));
					});
				}
			}
		})

		$('form.applyloan').submit(function(e) {
			e.preventDefault();
			let f = $(this).serializeArray();
			console.log(f);
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				data: {part: 'applyloan', data: f},
				url: '<?php echo $req; ?>',
				success: d => {
					if (typeof d.success !== 'undefined') {
						alert(d.success);
					} else if (typeof d.error != 'undefined') {
						alert(d.error);
						location.href = '<?php echo Q.DIR.'application'.A.PAGE;?>list';
					}
				}
			});
		});
	});
</script>
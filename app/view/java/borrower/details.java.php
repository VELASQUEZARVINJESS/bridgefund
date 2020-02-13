<script type="text/javascript">
	// $(() => {
		function borrowerDetails(id) {
			let url = "<?php echo PATH_REQ; ?>general.req/borrower_details.req.php";
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
			let b = data.data;console.log(b);
			let address = '';
			if (b.street != '') { address += b.street + ', ';}
			if (b.subdivision != '') { address += b.subdivision + ', '; }
			$('.borrower-details div.id').text(b.id);
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
	// });
</script>
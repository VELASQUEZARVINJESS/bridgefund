<?php if (in_array(@$_GET['page'], array('details'))) { ?>
<script type="text/javascript">
	// $(() => {
		function BorrowerDetails(p) {
			let url = "<?php echo PATH_REQ; ?>general.req/borrower_details.req.php";
			let b = { id: '' };
			if (typeof p !== 'undefined') {
				if (typeof p.bid !== 'undefined') { b.id = p.bid; }
			}

			this.getDetails = (state) => {
				if (state == 'withEmployment') {
					$.ajax({
						type: "POST",
						url: url,
						data: {"part": 'borrowerWithEmployment',data: data},
						dataType: "JSON",
						success: d => {
							borrower = d;
							return borrower;
						},
						error: x => {
							console.log(x.responseText);
						}
					});
				}
			}

		}
		/*function BorrowerDetails(p) {
			if (typeof p !== 'undefined') {}
			let url = "<?php echo PATH_REQ; ?>general.req/borrower_details.req.php";
			let borrower = new Array();

			this.getDetails = (id) => {
				let data = { 'id': id };
				return {
					"withEmployment" : () => {
						$.ajax({
							type: "POST",
							url: url,
							data: {"part": 'borrowerWithEmployment',data: data},
							dataType: "JSON",
							success: d => {
								borrower = d;
								$(document).trigger('loadOnTable', {b: d});
							},
							error: x => {
								console.log(x.responseText);
							}
						});
					}
				}
				// this.withEmployment = () => {
				// }
			}

			$(document).on('loadOnTable', (e, b) => {
				console.log(b.b);
			});

		}
*/

	// });
</script>
<?php } ?>
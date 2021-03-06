<script>
	$(()=>{

		$('input.colsearch').daterangepicker({
			timePicker: false,
			minDate: new Date('<?php echo RELEASE_DATE;?>'),
			maxDate: moment(),
			locale: { format: 'MMM DD, YYYY' },
			autoApply: true
		});
		$('button.btn-search').click(function() {
			getExpenses();
		});
	});
	pageTitle('Expense Report');

	function getExpenses() {
		let data = {
			sdate: formatDate(new Date($('input.colsearch').data('daterangepicker').startDate)),
			edate: formatDate(new Date($('input.colsearch').data('daterangepicker').endDate))
		}
		let tbl = $('div.expense-report table.report');
		$('small.daterange').text(data.sdate + ' to ' + data.edate);
		tbl.find('tbody').html('');
		$.ajax({
			type: 'POST',
			dataType: 'JSON',
			url: '<?php echo $req;?>',
			data: { part: 'getExpenses', data: data},
			success: function(d) {
				if (typeof d == 'object') {
					let amount = 0;
					d.forEach(function(v) {
						let count = v.duration;
						if (d.cycle == 'Bimonthly') {
							count = parseInt(count) + 2;
						}
						tbl.find('tbody').append($('<tr/>')
							.append($('<td/>').text(v.date))
							.append($('<td/>').text(v.name))
							.append($('<td/>').text(v.purpose))
							.append($('<td/>').text(formatCurrency(v.amount)))
						);
                        amount += parseFloat(v.amount);
					});
					tbl.find('tfoot td:last').text(formatCurrency(amount));
				}
			},
			error: function(x) { console.log(x.reponseText); }
		});
	}
</script>
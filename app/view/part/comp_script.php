<script src="<?php echo PATH_PLG;?>jquery/jquery.min.js"></script>
<script src="<?php echo PATH_PLG;?>bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo PATH_PLG;?>select2/js/select2.min.js"></script>
<script src="<?php echo PATH_PLG;?>moment/moment.min.js"></script>
<script src="<?php echo PATH_PLG;?>daterangepicker/daterangepicker.js"></script>
<script src="<?php echo PATH_PLG;?>bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo PATH_PLG;?>sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo PATH_JSC;?>adminlte.min.js"></script>
<!-- <script src="<?php echo PATH_JSC;?>demo.js"></script> -->
<script type="text/javascript">
	$(function() {
		$('select.select2bs4').select2({minimumResultsForSearch:10,theme: 'bootstrap4'});
		$('input.datetimepicker').datetimepicker({
			keepOpen: true,
			format: 'YYYY-MM-DD',
			minDate: moment().subtract(70, 'years'),
			maxDate: moment().subtract(18, 'years')
		});
		$('li.nav-item a.addExpense').click(function() {console.log('expsense');
			$('div.modal#expense').modal('show');
		});
	});
	function formatCurrency(amount,peso = false) {
		amount = (isNaN(amount) || amount == null) ? 0 : parseFloat(amount) ;
		let neg = false; if (amount < 0) { neg = true; amount = Math.abs(amount); } let p = '₱ ';if (!peso) { p = ''; }
		return (neg?"(" + p : p) + parseFloat(amount, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString() + (neg?")" : '');
	}
	function formatDate(date) {
		if (date !== null) {
			let month = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
			date = new Date(date);
			return month[date.getMonth()] + ' ' + date.getDate() + ', ' + date.getFullYear();
		}
	}
</script>
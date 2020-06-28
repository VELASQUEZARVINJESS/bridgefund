<?php 
	include_once 'general.java/province.java.php';
	include_once 'general.java/borrower_details.java.php';
	include_once 'general.java/modal_release.java.php';
	include_once 'general.java/modal_payment.java.php';
	include_once 'general.java/modal_edit_payment.java.php';
	include_once 'general.java/modal_deposit.java.php';
	include_once 'general.java/modal_expense.java.php';
	include_once 'general.java/modal_change_password.java.php';
	include_once 'general.java/modal_nemployee.java.php';
	include_once 'general.java/getComment.java.php';
	include_once 'admin/list-employee.java.php';
?>
<script type="text/javascript">
	function pageTitle(text) {
		$('.content-header h1.pageTitle').text(text);
	}
	var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
	function dateFormat(date) {
		date = new Date(date);
		let days = moment().diff(date, 'days');
		if (days < 1) {
			let hours = moment().diff(moment(date), 'hours');
			if (hours < 1) {
				let minutes = moment().diff(moment(date), 'minutes');
				if (minutes > 1) {
					return minutes + ' minutes ago';
				} else {
					return minutes + ' minute ago';
				}
			} else if(hours == 1) {
				return hours + ' hour ago';
			} else {
				return hours + ' hours ago';
			}
		} else {
			return months[date.getMonth()]+' '+("0"+date.getDate()).slice(-2)+', '+date.getFullYear();
		}
	}
</script>
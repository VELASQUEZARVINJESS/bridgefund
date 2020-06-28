<script>
    function addDeposit() {
        let data = {
            amount: $('div.modal#deposit input.amount').val(),
            date: $('div.modal#deposit input.date').val(),
            ref: $('div.modal#deposit input.ref').val()
        }
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: '<?php echo PATH_REQ;?>general.req/modal_deposit.req.php',
            data: { part: 'addDeposit', data: data },
            success: function(d) {
                console.log(d);
                if (typeof d.success !== 'undefined') {
                    alert(d.success);
                    $('div.modal#deposit').modal('hide');
                } else if(d.error !== 'undefined') {
                    alert(d.error);
                }
            },
            error: function(x) { console.log(x.responseText); }
        });
    }


    $(() => {
        $('div.modal#deposit button.addDeposit').click(function() {
            addDeposit();
        });
        $('li.nav-item a.deposit').click(function() {
            $('div.modal#deposit').modal('show');
        });
        $('input.exdatepicker').datetimepicker({
			keepOpen: true,
			format: 'YYYY-MM-DD',
			minDate: moment().subtract(7, 'days'),
			maxDate: moment()
		});
    });
</script>
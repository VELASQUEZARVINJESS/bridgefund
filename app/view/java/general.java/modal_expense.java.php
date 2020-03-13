<script>
    function addExpense() {
        let data = {
            amount: $('div.modal#expense input#amount').val(),
            purpose: $('div.modal#expense input#purpose').val()
        }
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: '<?php echo PATH_REQ;?>general.req/modal_expense.req.php',
            data: { part: 'addExpense', data: data },
            success: function(d) {
                console.log(d);
                if (typeof d.success !== 'undefined') {
                    alert(d.success);
                } else if(d.error !== 'undefined') {
                    alert(d.error);
                }
            },
            error: function(x) {
                console.log(x.responseText);
            }
        });
    }

    $('div.modal#expense button.addExpense').click(function() {
        addExpense();
    });
</script>
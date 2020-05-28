<script>
    function account_balance(accnt) {
        let bal = 0;

        let getbal = () => {
            let data = {accnt: accnt}
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: '<?php echo PATH_REQ; ?>general.req/account_balance.php',
                data: {part: 'getbal', data: data},
                success: function(d) {
                    console.log(d);
                }, error: function(x) {
                    console.log(x.responseText);
                }
            });
        }
    }
</script>
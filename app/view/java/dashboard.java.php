<script>
    function bank() {
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: '<?php echo $req;?>',
            data: {part: 'bank'},
            success: function(d){
                console.log(d);
                $('h5.account_balance').text(formatCurrency(d.amount));
            }
        });
    }
    function loan_status() {
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: '<?php echo $req;?>',
            data: {part: 'loanStatus'},
            success: function(d){
                console.log(d);
                if (typeof d === 'object') {
                    $('small.pending').text(d.pending);
                    $('small.approve').text(d.approve);
                    $('small.decline').text(d.decline);
                }
            }
        });
    }
    function totalBorrowers() {
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: '<?php echo $req;?>',
            data: {part: 'totalBorrowers'},
            success: function(d){
                console.log(d);
                if (typeof d === 'object') {
                    $('h5.borrowers').text(d.count);
                }
            }
        });
    }
    function activeLoans() {
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: '<?php echo $req;?>',
            data: {part: 'activeLoans'},
            success: function(d){
                console.log(d);
                if (typeof d === 'object') {
                    $('h5.loans').text(d.count);
                }
            }
        });
    }
    bank();
    loan_status();
    totalBorrowers();
    activeLoans();
</script>
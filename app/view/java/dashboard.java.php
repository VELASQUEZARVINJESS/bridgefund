<script>
    function bank() {
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: '<?php echo $req;?>',
            data: {part: 'bank'},
            success: function(d) {
                $('span.account_balance').text(formatCurrency(d.amount));
            }
        });
    }
    function loan_status() {
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: '<?php echo $req;?>',
            data: {part: 'loanStatus'},
            success: function(d) {
                if (typeof d === 'object') {
                    $('span.pending').text(d.pending);
                    $('span.approve').text(d.approve);
                    $('span.decline').text(d.decline);
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
            success: function(d) {
                if (typeof d === 'object') {
                    $('span.borrowers').text(d.count);
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
            success: function(d) { 
                if (typeof d === 'object') {
                    $('span.loans').text(d.count);
                }
            }
        });
    }

    function recentTrans() {
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: '<?php echo $req;?>',
            data: {part: 'recentTrans'},
            success: function(d) { 
                console.log(d);
                if (typeof d === 'object') {
                    d.forEach(function(v) {
                        let img = '';
                        let desc = '';
                        let title = '';
                        let badge = '';
                        if (v.t == 'Deposit') {
                            img = 'deposit';
                            desc = v.u.toUpperCase();
                            title = v.t;
                            badge = 'badge-success';
                        } else if (v.t == 'Expense') {
                            img = 'expense';
                            desc = v.u.toUpperCase();
                            title = v.t;
                            badge = 'badge-danger';
                        } else if (v.t == 'Release') {
                            img = 'release';
                            desc = v.u.toUpperCase();
                            title = v.t + ' ' + v.r;
                            badge = 'badge-danger';
                        } else if (v.t == 'Payment') {
                            img = 'payment';
                            desc = v.u.toUpperCase();
                            title = v.t + ' ' + v.r;
                            badge = 'badge-success';
                        }
                        $('div.card.recentTrans ul.products-list')
                            .append('<li class="item">'+
                                    '<div class="product-img">'+
                                        '<img src="<?php echo PATH_IMG;?>'+img+'.png" alt="Product Image" class="img-size-50">'+
                                    '</div>'+
                                    '<div class="product-info">'+
                                        '<a href="javascript:void(0)" class="product-title">'+title+'<span class="badge '+badge+' float-right">'+formatCurrency(v.a)+'</span></a>'+
                                        '<span class="product-description">'+desc+'</span>'+
                                    '</div>'+
                                '</li>');
                    });
                }
            }
        });
    }
    bank();
    loan_status();
    totalBorrowers();
    activeLoans();
    recentTrans();
</script>
<script>
    pageTitle('New Borrower');
    $('select.select2bs4 > option[value=""]').attr('disabled',true).css('display','none');
    $('form[name="nborrower"]').submit(function(e){
        e.preventDefault();
        let frmVal = $(this).serializeArray();
        $.ajax({
            type: "POST",
            url: "<?php echo $req; ?>",
            data: {"part": "addBorrower", "frm": frmVal},
            dataType: "JSON",
            success: function (d) {
                console.log(d);
                if (typeof d.success != 'undefined') {
                    alert(d.success);
                    $('form[name="nborrower"]').trigger('reset');
                } else {
                    alert(d.error.join('<br/>'))
                }
            }
        });
    });
</script>
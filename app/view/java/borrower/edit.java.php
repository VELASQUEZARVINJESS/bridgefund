<script>
    function loadClientInfo(id) {
        let data = { id: id }
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: '<?php echo $req; ?>',
            data: { part: 'getClientInfo', data: data },
            success: function(d) {
                // console.log(d);
                if (typeof d == 'object') {
                    let prob = new ProvinceCity({prob:$('div.borrower-edit #province'),city:$('div.borrower-edit #city'),probval:d.province,cityval:d.city});
                    $('div.borrower-edit #fname').val(d.first_name);
                    $('div.borrower-edit #mname').val(d.middle_name);
                    $('div.borrower-edit #lname').val(d.last_name);
                    $('div.borrower-edit #gender').val(d.gender).select2();
                    $('div.borrower-edit #civil').val(d.civil_status).select2();
                    $('div.borrower-edit #bdate').val(d.birthdate);
                    $('div.borrower-edit #street').val(d.street);
                    $('div.borrower-edit #subbuild').val(d.subdivision);
                    $('div.borrower-edit #barangay').val(d.barangay);
                    // $('div.borrower-edit #province').val(d.province);
                    // $('div.borrower-edit #city').val(d.city);
                    $('div.borrower-edit #zipcode').val(d.zipcode);
                    $('div.borrower-edit #mobile').val(d.mobile);
                    $('div.borrower-edit #email').val(d.email);
                    $('div.borrower-edit #landline').val(d.landline);
                    $('div.borrower-edit #position').val(d.position);
                    $('div.borrower-edit #smonthly').val(d.smonthly);
                    $('div.borrower-edit #stakehome').val(d.stakehome);
                    $('div.borrower-edit #sannual').val(d.sannual);
                    $('div.borrower-edit #employer').val(d.employer);
                    $('div.borrower-edit #eaddress').val(d.eaddress);
                    $('div.borrower-edit #emanager').val(d.emanager);
                    $('div.borrower-edit #econtact').val(d.econtact);
                    $('div.borrower-edit #eemail').val(d.eemail);
                }
            }
        });

        $('form#eborrower').submit(function(e) {
            e.preventDefault();
            let frm = $(this).serializeArray();
            console.log(frm);
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: '<?php echo $req; ?>',
                data: { part: 'updateClientInfo', data: frm, id: '<?php echo $_GET['id']; ?>'},
                success: function(d) {
                    console.log(d);
                    if (typeof d.success !== 'undefined') {
                        alert(d.success);
                        location.href = '<?php echo Q.DIR.'borrower'.A.PAGE;?>list';
                    } else if (typeof error !== 'undefiled') {
                        alert(d.error.join(' | '));
                    }
                }
            });
        });
    }

    loadClientInfo('<?php echo $_GET['id']; ?>');
</script>
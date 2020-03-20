<script>
    function newEmployee(){
        let data = {
            fname: $('div.modal#addEmployee input#fname'),
            uname: $('div.modal#addEmployee input#uname'),
            xname: $('div.modal#addEmployee input#xname'),
            pass: $('div.modal#addEmployee  input#pass'),
            level: $('div.modal#addEmployee select#level') 
        }
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: '<?php echo PATH_REQ;?>general.req/modal_nemployee.req.php',
            data: { part: 'addEmployee', data: data},
            success: function(d){
                console.log(d);
                    if (typeof d.success !=='undefined'){
                        alert(d.success);
                    } else if (d.error !== 'undefined'){
                        alert(d.error);
                    }
            },
                error: function(x) {
                    console.log(x.responseText);
                }
        });
    };

    $('form#addEmployee').submit(function(e) {
        e.preventDefault(); e.stopPropagation();
        newEmployee();
    });

</script>
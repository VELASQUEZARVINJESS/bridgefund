<script>
    $(() => {
        function newEmployee(){
            let data = {
                fname: $('div.modal#addEmployee input#fname').val(),
                uname: $('div.modal#addEmployee input#uname').val(),
                xname: $('div.modal#addEmployee input#xname').val(),
                pass: $('div.modal#addEmployee  input#pass').val(),
                level: $('div.modal#addEmployee select#level').val()
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
                            $('div.modal#expense').modal('hide');
                        } else if (d.error !== 'undefined'){
                            alert(d.error);
                        }
                },
                    error: function(x) {
                        console.log(x.responseText);
                    }
            });
        };

        



        $(() => {
            $('#addEmployee form#addNewEmployee').submit(function(e) {
           /*  e.preventDefault(); e.stopPropagation(); */
            newEmployee();
        });
        });






    });
</script>
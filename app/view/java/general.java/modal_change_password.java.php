<script>
    $('form#changepass').submit(function(e){
		e.preventDefault();
		let data = {
			curpass : $(this).find('input[name="curpass"]').val(),
			newpass : $(this).find('input[name="newpass"]').val(),
			conpass : $(this).find('input[name="conpass"]').val()
		}
		if (data.newpass == data.conpass) {
			$(this).find('div.conpass span.help-block').text('');
			$.ajax({
				dataType: 'JSON',type:'POST',
				url: '<?php echo PATH_REQ;?>general.req/modal_change_password.req.php',
				data: { part: 'changepass', data: data},
				success: function(d) {
					if (typeof d.success !== 'undefined') {
					    alert(d.success);
						$('.modal#changepassword').modal('hide');
					}else if(typeof d.error !== 'undefined') {
                        alert(d.error.join('\n'));
					}
				}
			});
		}else{
			$(this).find('div.conpass span.help-block').text('Password Mismatch');
		}
	});
</script>
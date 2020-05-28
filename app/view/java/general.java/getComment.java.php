<script>
    function getComment(page,id) {
        let data = {
            id: id,
            page: page
        }
        if (data.id !== '') {
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: '<?php echo PATH_REQ;?>general.req/getComment.req.php',
                data: {part: 'getcomment', data: data},
                success: function(d) {
                    if (typeof d === 'object') {
                        d.forEach(function(com) {
                            $('.card-footer.card-comments')
                                .append('<div class="card-comment">'+
									'<img class="img-circle img-sm" src="<?php echo PATH_IMG;?>profile-def.png" alt="User Image">'+
                                    '<div class="comment-text">'+
                                        '<span class="username">'+
											com.added_by+
                                            '<span class="text-muted float-right">'+dateFormat(com.date_created)+'</span>'+
                                        '</span>'+com.note+
                                    '</div>'+
                                '</div>');
                        });
                    }
                },
				error: function(x) {
					console.log(x.reposnseText);
				}
            });
        }
    }
	function setComment(page, id, note) {
		let data = {
			id: id,
			page: page,
			note: note
		}
		if (data.note !== '') {
			$.ajax({
				type: 'POST',
                dataType: 'JSON',
                url: '<?php echo PATH_REQ;?>general.req/getComment.req.php',
                data: {part: 'setcomment', data: data},
                success: function(d) {
                    if (typeof d.success !== 'undefined') {
						$('.card-footer.card-comments')
                                .prepend('<div class="card-comment">'+
									'<img class="img-circle img-sm" src="<?php echo PATH_IMG;?>profile-def.png" alt="User Image">'+
                                    '<div class="comment-text">'+
                                        '<span class="username">'+
											'<?php echo $_SESSION['app']['name'];?>'+
                                            '<span class="text-muted float-right"></span>'+
                                        '</span>'+data.note+
                                    '</div>'+
                                '</div>');
						$('input.addnotes').val('');
					}
                }
			});
		}
	}
</script>
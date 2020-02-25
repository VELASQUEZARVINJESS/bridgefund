<script type="text/javascript">
	pageTitle('Application List');
	$(() => {
		for (let i = 1; i <= 6; i++) {
			$('select#duration').append($('<option/>').val(i).text(i + ' months'));
		}
		$.ajax({
			type: 'POST',
			dataType: 'JSON',
			url: '<?php echo PATH_REQ; ?>general.req/borrower_details.req.php',
			data: {part: 'borrowerSelect'},
			success: d => {
				if (typeof d === 'object') {
					d.forEach((data) => {
						$('form.applyloan select#applicant').append($('<option/>').val(data.borrower_no).text(data.borrower_no + ' - ' + data.borrower));
					});
				}
			}
		})

		$('form.applyloan').submit(function(e) {
			e.preventDefault();
			let f = $(this).serializeArray();
			console.log(f);
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				data: {part: 'applyloan', data: f},
				url: '<?php echo $req; ?>',
				success: d => {
					if (typeof d.success !== 'undefined') {
						alert(d.success);
					} else if (typeof d.error != 'undefined') {
						alert(d.error);
						location.href = '<?php echo Q.DIR.'application'.A.PAGE;?>list';
					}
				}
			});
		});

		var video = document.getElementById('video');
		var context = canvas.getContext('2d');
		var photo = document.getElementById('photo');
		var vendorURL = window.URL || window.webkitURL;
		navigator.getMedia  = 	navigator.getUserMedia ||
								navigator.webkitGetUserMedia ||
								navigator.mozGetUserMedia ||
								navigator.msGetUserMedia;

		navigator.getMedia( {
			video: true,
			audio: false
		}, function( stream ) {
			video.srcObject = stream;
			// video.src = vendorURL.createObjectURL(stream);
			video.play();
			document.getElementById('capture').addEventListener('click', function(e) {
				e.preventDefault();
				this.style.display = 'none';
				context.drawImage( video, -50, 0, 400, 300);
				photo.setAttribute('src', canvas.toDataURL('image/png'));
				video.style.display = 'none';
				video.pause(); video.src = '';
				stream.getTracks().forEach( function( track ) {
					track.stop();
				});
				document.getElementById('frame').style.display = 'none';
				$('input[name="photo"]').val(photo.getAttribute('src'));
			});
			/*document.getElementById('save').addEventListener('click', function() {
				let data = { name: 'test.png', image: photo.getAttribute('src')};
				$.ajax({
					type: 'POST',
					dataType: 'JSON',
					url: '<?php echo PATH_REQ; ?>general.req/image_capture.req.php',
					data: { part: 'imageCapture', data: data }
				});
			});*/
		}, function( error ) {
			console.log(error);
		} );
	});
</script>
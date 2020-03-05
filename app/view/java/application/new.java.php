<script type="text/javascript">
	pageTitle('New Loan Application');
	$(() => {
		var capture = '';
		for (let i = 1; i <= 6; i++) {
			$('select#duration').append($('<option/>').val(i).text(i + ' months'));
		}
		$.ajax({
			type: 'POST',
			dataType: 'JSON',
			url: '<?php echo PATH_REQ; ?>borrower/details.req.php',
			data: {part: 'borrowerSelect'},
			success: d => {
				if (typeof d === 'object') {
					d.forEach((data) => {
						$('form.applyloan select#applicant').append($('<option/>').val(data.borrower_no).text(data.borrower_no + ' - ' + data.borrower));
						$('form.applyloan select#coborrower').append($('<option/>').val(data.borrower_no).text(data.borrower_no + ' - ' + data.borrower));
					});
				}
			}
		})

		$('form.applyloan').submit(function(e) {
			e.preventDefault();
			let f = $(this).serializeArray();
			if ($('form.applyloan select#applicant').val() == $('form.applyloan select#coborrower').val()) {
				alert("Borrower and Co-Borrower must not be the same!");
			} else {
				$.ajax({
					type: 'POST',
					dataType: 'JSON',
					data: {part: 'applyloan', data: f, capture: capture},
					url: '<?php echo $req; ?>',
					success: d => {
						if (typeof d.success !== 'undefined') {
							alert(d.success);
							location.href = '<?php echo Q.DIR.'application'.A.PAGE;?>list';
						} else if (typeof d.error != 'undefined') {
							alert(d.error);
						}
					}
				});
			}
		});

		function takePhoto() {
			var video = document.getElementById('video');
			var context = canvas.getContext('2d');
			var photo = document.getElementById('photo');
			var vendorURL = window.URL || window.webkitURL;
			navigator.getMedia  = 	navigator.getUserMedia ||
									navigator.webkitGetUserMedia ||
									navigator.mozGetUserMedia ||
									navigator.msGetUserMedia;

			document.getElementById('frame').style.display = 'block';
			document.getElementById('capture').style.display = 'block';
			document.getElementById('takephoto').style.display = 'none';
			video.style.display = 'block';
			photo.style.display = 'none';
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
					photo.style.display = 'block';
					video.style.display = 'none';
					video.pause(); video.src = '';
					stream.getTracks().forEach( function( track ) {
						track.stop();
					});
					document.getElementById('takephoto').style.display = 'block';
					document.getElementById('frame').style.display = 'none';
					// document.getElementById('photo').value = photo.getAttribute('src');
					capture = photo.getAttribute('src');
				});
			}, function( error ) {
				console.log(error);
			} );
		}

		document.getElementById('takephoto').addEventListener('click', function(e) {
			takePhoto();
		});
	});
</script>
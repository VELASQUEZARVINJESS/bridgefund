<script type="text/javascript">
	pageTitle('Edit Loan Application');
	$(() => {
		var capture = '';
		for (let i = 1; i <= 6; i++) {
			$('select#duration').append($('<option/>').val(i).text(i + ' months'));
        }
        // function getBorrowerId() {
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: '<?php echo PATH_REQ; ?>borrower/details.req.php',
                data: {part: 'borrowerSelect'},
                success: d => {
                    if (typeof d === 'object') {
                        d.forEach((data) => {
                            // $('form.applyloan select#applicant').append($('<option/>').val(data.borrower_no).text(data.borrower_no + ' - ' + data.borrower));
                            $('form.applyloan select#coborrower').append($('<option/>').val(data.borrower_no).text(data.borrower_no + ' - ' + data.borrower));
                        });
                    }
                }
            });
        // }
        
        function loadLoanInfo(d) {
            $('.edit-application img#photo').attr('src','<?php echo PATH_URL;?>docs/'+d.photo);
            $('.edit-application input#client').val(d.borrower_no + ' - ' + d.client);
            $('.edit-application input#applicant').val(d.borrower_no);
            $('.edit-application select#coborrower').val(d.coborrower).select2();
            $('.edit-application select#loanpurpose').val(d.loan_purpose);
            $('.edit-application input#amount').val(d.loan_amount);
            $('.edit-application input#interest').val(d.loan_interest);
            $('.edit-application select#duration').val(d.loan_duration).select2();
            $('.edit-application input#repaymentcycle').val(d.repyment_cycle);
            $('.edit-application input#processingfee').val(d.process_fee);
            $('.edit-application input#notaryfee').val(d.notary_fee);
            $('.edit-application input#bankname').val(d.bank_name);
            $('.edit-application input#bankaccount').val(d.bank_account);
            $('.edit-application input#bankbranch').val(d.bank_branch);
        }

        function getLoanInfo(id) {
            let data = { id: id}
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: '<?php echo $req;?>',
                data: {part: 'getLoanInfo', data: data},
                success: function(d) {
                    loadLoanInfo(d);
                },
                error: function(x) {
                    console.log(x.responseText);
                }
            });
        }

		$('form.applyloan').submit(function(e) {
			e.preventDefault();
			let f = $(this).serializeArray();
			if ($('form.applyloan select#applicant').val() == $('form.applyloan select#coborrower').val()) {
				alert("Borrower and Co-Borrower must not be the same!");
			} else {
				$.ajax({
					type: 'POST',
					dataType: 'JSON',
					data: {part: 'updateloan', data: f, capture: capture, id: '<?php echo $_GET['id'];?>'},
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
		}

		document.getElementById('takephoto').addEventListener('click', function(e) {
			takePhoto();
        });
        
        getLoanInfo('<?php echo $_GET['id']?>');
	});
</script>
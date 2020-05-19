<script type="text/javascript">
	var release = {
		loanid : '',
		amount : 0,
		repayment : 0,
		payable : 0,
		interest : 0,
		duration : 0,
		paycount : 0,
		cycle : 'Bimonthly',
		date : '',
		start_date : '',
		end_date : '',
		data : new Array(),
		generate : function() {
			this.payable = parseFloat(this.amount) + (parseFloat(this.duration) * (parseFloat(this.amount) * (parseFloat(this.interest) / 100)));
			this.data = new Array(); 
			let balance = this.payable;
			/*if (this.cycle == 'Weekly') {
				let paycount = this.diffWeek(this.date, this.addMonths(this.date, this.duration));
				this.repayment = (parseFloat(this.payable) / parseFloat(paycount));
				this.data.push({date: this.formatDate(this.skipDates(this.start_date)), due: this.repayment, balance: balance});
				balance -= this.repayment;
				for (var i = 1; i < paycount; i++) {
					this.data.push({date: this.formatDate(this.addWeeks(this.start_date, i)), due: this.repayment, balance: balance});
					balance -= this.repayment;
				}
			} else */
			if (this.cycle == 'Bimonthly') {
				let sdate = new Date(this.start_date);
				let paycount = parseInt(this.duration) * 2;
				this.repayment = Math.ceil((parseFloat(this.payable) / parseFloat(this.duration)) / 2);
				this.data.push({date: this.formatDate(this.skipDates(this.start_date)), due: this.repayment, balance: balance});
				balance -= this.repayment;
				let ldate = this.start_date;
				for (var i = 1; i <= paycount - 1; i++) {
					ldate = this.skipDates(this.addBiMonth(ldate));
					this.data.push({date: this.formatDate(ldate), due: this.repayment, balance: balance});
					balance -= this.repayment;
				}
				release.end_date = ldate;
			} else if (this.cycle == 'Monthly') {
				this.repayment = Math.ceil(parseFloat(this.payable) / parseFloat(this.duration));
				this.data.push({date: this.formatDate(this.skipDates(this.start_date)), due: this.repayment, balance: balance});
				balance -= this.repayment;
				for (var i = 1; i <= this.duration - 1; i++) {
					this.data.push({date: this.formatDate(this.skipDates(this.addMonths(this.start_date, i))), due: this.repayment, balance: balance});
					balance -= this.repayment;
				}
			}
			
		},
		addDays : function(date, day) {
			let res = new Date(date);
			return new Date(res.setDate(res.getDate() + day));
		},
		addWeeks : function(date, week) {
			let res = new Date(date);
			return new Date(res.setDate(res.getDate() + (parseInt(week) * 7)));
		},
		addBiMonth : function(date) {
			let res = new Date(date);
			let rgetDate = res.getDate();
			if (rgetDate >= 1 && rgetDate <= 5) {
				res = new Date(res.setDate(res.getDate() + 15));
			} else if (rgetDate > 5 && rgetDate <= 10) {
				res = new Date(res.setDate(res.getDate() + 15));
			} else if (rgetDate > 10 && rgetDate <= 15) {
				let holder = this.addMonths(res, 1);
				res = new Date(holder.getFullYear(), holder.getMonth(), 1);
				res = new Date(res.setDate(res.getDate() - 1));
			} else if (rgetDate > 15 && rgetDate <= 20) {
				let holder = this.addMonths(res, 1);
				res = new Date(holder.getFullYear(), holder.getMonth(), 5);
			} else if (rgetDate > 20 && rgetDate <= 25) {
				let holder = this.addMonths(res, 1);
				res = new Date(holder.getFullYear(), holder.getMonth(), 10);
			} else if(rgetDate > 25) {
				let holder = new Date(this.addMonths(res, 1));
				holder = new Date(this.addDays(holder, -1));
				res = new Date(holder.getFullYear(), holder.getMonth(), 15);
			}
			return res;
		},
		addMonths : function(date, month) {
			let res = new Date(date);
			return new Date(res.setMonth(res.getMonth() + month));
		},
		formatDate : function(date) {
			let month = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
			date = new Date(date);
			return month[date.getMonth()] + ' ' + date.getDate() + ' ' + date.getFullYear();
		},
		diffDays : function(d1, d2) {
			d1 = new Date(d1);
			d2 = new Date(d2);
			let diff = Math.abs(d2.getTime() - d1.getTime());
			return Math.floor(diff / (1000 * 3600 * 24));
		},
		diffWeek : function(d1, d2) {
			d1 = new Date(d1);
			d2 = new Date(d2);
			let diff = Math.abs(d2.getTime() - d1.getTime());
			return Math.floor(diff / (1000 * 3600 * 24 * 7));
		},
		skipDates : function(date) {
			let res = new Date(date);
			if (res.getDay() == 0) {
				return new Date(res.setDate(res.getDate() - 2));
			} else if (res.getDay() == 6) {
				return new Date(res.setDate(res.getDate() - 1));
			}
			return res;
		},
		init : function() {
			this.loanid = '';
			this.amount = 0;
			this.repayment = 0;
			this.payable = 0;
			this.interest = 5.6;
			this.duration = 0;
			this.cycle = '';
			this.date = '';
			this.start_date = '';
			this.end_date = '';
			this.data = new Array();
		},
		loadOnTable : function() {
			// let t = table.find('tbody'); t.html('');
			let table = $('.modal#release table.loanTable > tbody');
			table.html('');
			for (var i = 0; i < this.data.length; i++) {
				table.append($('<tr/>')
					.append($('<td/>')
						.append($('<input/>').attr('type','text').addClass('form-control').val(release.data[i].date))
					)	
					.append($('<td/>').text(formatCurrency(release.data[i].due)).data('due',release.data[i].due))
					.append($('<td/>').text(formatCurrency(release.data[i].balance)))
				);
			}
			// table.find('input').css({'color':'#FFF','background':'transparent','border':0,'text-align':'center'});
			// table.find('tbody > tr > td:first').css('width','33%');
			table.find('input').css({'color':'#FFF','background':'transparent','border':0,'text-align':'center'});
			table.find('tr > td:first').css('width','33%');
		},
		loadModal : function(loanid) {
			var t = this;
			this.init();
			this.loanid = loanid;
			$('div.modal#release').modal('show');
			$('.modal#release table.loanTable > tbody').html('');
			$('div.modal#release #releaseModalLabel > span').text(this.loanid);
			let data = { loanid: this.loanid }
			$.ajax({
				type : 'POST',
				dataType : 'JSON',
				url : '<?php echo PATH_REQ; ?>general.req/modal_release.req.php',
				data : { part: 'borrowerLoan', data: data },
				success : function(d) {
					if (typeof d.error === 'undefined') {
						t.cycle = d.repayment_cycle;
						t.amount = d.loan_amount;
						t.interest = d.loan_interest;
						t.duration = d.loan_duration;
						$('.modal#release .amount').text(formatCurrency(t.amount));
						$('.modal#release .interest').text(t.interest + '%');
						$('.modal#release .duration').text(t.duration + ' months');
						$('.modal#release .cycle').text(t.cycle);
					}
				}
			});
		},
		modalButton: function() {
			let t = this;
			let tblModal = $('.modal#release table.loanTable');
			$('button.generate').click(function(e) {
				e.stopPropagation();
				let firstdate = $('.modal#release input.firstdate').val();
				if (firstdate != '') {
					t.start_date = new Date(firstdate);
					t.generate();
					t.loadOnTable();
					// $(this).addClass('disabled');
					$('.modal#release button.savesched').removeClass('disabled');
				}
			});
			$('button.savesched').click(function() {
				let con = confirm("Are you sure that you want to save this payment schedule?");
				if (con) {
					let data = {
						loanid : t.loanid,
						payable : t.payable,
						releasedate : $('.modal#release input.releasedate').val(),
						checkno : $('.modal#release input.checkno').val(),
						firstdate : formatDate(t.start_date),
						lastdate : formatDate(t.end_date),
						table : new Array()
					}
					tblModal.children('tbody').children().each(function() {
						data.table.push({
							date: $(this).find('input').val(),
							repayment: $(this).children().eq(1).data('due')
						});
					}).promise().done(function() {
						if (data.checkno != '') {
							$.ajax({
								type: 'POST',
								dataType: 'JSON',
								url: '<?php echo PATH_REQ; ?>general.req/modal_release.req.php',
								data: { part: 'setSched', data: data},
								success: function(d) {
									if (typeof d.success !== 'undefined') {
										alert(d.success);
										$('div.modal#release').modal('hide');
										loanApplications();
									} else if (typeof d.error !== 'undefined') {
										alert(d.error.join('<br>'));
									}
								},
								error: function(x) {
									console.log(x.responseText);
								}
							});
						} else {
							alert('Please provide the check number');
						}
					});
				}
			});
			$('.modal#release input.firstdate').change(function() { console.log('test');
				$('.modal#release button.generate').removeClass('disabled');
				$('.modal#release button.savesched').addClass('disabled');
			});
		}
	}

	$(function() {
		$('input.appdatetimepicker.releasedate').datetimepicker({
			keepOpen: true,
			format: 'YYYY-MM-DD',
			minDate: moment().subtract(1, 'months'),
			maxDate: moment()
		});
		$('input.appdatetimepicker.firstdate').datetimepicker({
			keepOpen: true,
			format: 'YYYY-MM-DD',
			minDate: moment().subtract(1, 'months'),
			maxDate: moment().add(1, 'months')
		});
	});
</script>
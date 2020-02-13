<script type="text/javascript">
	var release = {
		loanid : 'L000000001',
		amount : 30000,
		amount_due : 30000,
		payable : 0,
		interest : 5,
		duration : 6,
		cycle : 'Bimonthly',
		date : new Date('2020-02-10'),
		start_date : new Date('2020-02-20'),
		data : new Array(),
		generate : function() {
			this.payable = parseFloat(this.amount) + (parseFloat(this.duration) * (parseFloat(this.amount) * (parseFloat(this.interest) / 100)));
			this.data = new Array(); 
			let balance = this.payable;
			if (this.cycle == 'Weekly') {
				let diff = this.diffWeek(this.date, this.addMonths(this.date, this.duration));
				this.amount_due = (parseFloat(this.payable) / parseFloat(diff));
				this.data.push({date: this.formatDate(this.skipDates(this.start_date)), due: this.amount_due, balance: balance});
				balance -= this.amount_due;
				for (var i = 1; i < diff; i++) {
					this.data.push({date: this.formatDate(this.addWeeks(this.start_date, i)), due: this.amount_due, balance: balance});
					balance -= this.amount_due;
				}
			} else if (this.cycle == 'Bimonthly') {
				let sdate = new Date(this.start_date);
				let diff = parseInt(this.duration) * 2;
				this.amount_due = (parseFloat(this.payable) / parseFloat(this.duration)) / 2;
				this.data.push({date: this.formatDate(this.skipDates(this.start_date)), due: this.amount_due, balance: balance});
				balance -= this.amount_due;
				let ldate = this.start_date;
				for (var i = 1; i <= diff - 1; i++) {
					ldate = this.addBiMonth(ldate);
					this.data.push({date: this.formatDate(this.skipDates(ldate)), due: this.amount_due, balance: balance});
					balance -= this.amount_due;
				}
			} else if (this.cycle == 'Monthly') {
				this.amount_due = parseFloat(this.payable) / parseFloat(this.duration);
				this.data.push({date: this.formatDate(this.skipDates(this.start_date)), due: this.amount_due, balance: balance});
				balance -= this.amount_due;
				for (var i = 1; i <= this.duration - 1; i++) {
					this.data.push({date: this.formatDate(this.skipDates(this.addMonths(this.start_date, i))), due: this.amount_due, balance: balance});
					balance -= this.amount_due;
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
			if ($.inArray(res.getDate(), [5,10]) != -1) {
				res = new Date(res.setDate(res.getDate() + 15));
			} else if (res.getDate() == 15) {
				let holder = this.addMonths(res, 1);
				res = new Date(holder.getFullYear(), holder.getMonth(), 1);
				res = new Date(res.setDate(res.getDate() - 1));
			} else if (res.getDate() == 20) {
				let holder = this.addMonths(res, 1);
				res = new Date(holder.getFullYear(), holder.getMonth(), 5);
			} else if (res.getDate() == 25) {
				let holder = this.addMonths(res, 1);
				res = new Date(holder.getFullYear(), holder.getMonth(), 10);
			} else {
				let holder = this.addMonths(res, 1);
				res = new Date(holder.getFullYear(), holder.getMonth(), 15);
			}
			console.log(res);
			return res;
		},
		addMonths : function(date, month) {
			let res = new Date(date);
			res = new Date(res.setMonth(res.getMonth() + month));
			if (res.getDay() == 0) {
				return new Date(res.setDate(res.getDate() + 1));
			}
			return res;
		},
		formatDate : function(date) {
			let month = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
			date = new Date(date);
			return month[date.getMonth()] + ' ' + date.getDate() + ' ' + date.getFullYear()
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
		}
	}
</script>
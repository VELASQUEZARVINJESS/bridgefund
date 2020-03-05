<script type="text/javascript">
	function ProvinceCity(param) {
		let provinceList = new Array();
		let cityList = new Array();
		let prov = param.prob;
		let city = param.city;
		let loadProvince = function() {
			let curprob = '';
			prov.html('');
			prov.append($('<option/>').text('-- Province --').val('').hide());
			provinceList.forEach(val => {
				let sel = false;
				if(typeof param.probval !== 'undefined' && param.probval == val.province) {
					sel = true;
					curprob = val.id;
				} else {
					sel = false;
				}
				prov.append($('<option/>').text(val.province).val(val.province).data('id',val.id).attr('selected',sel));
			});
			prov.change(function() {
				loadCity($(this).find('option:selected').data('id'));
			});
			if (typeof param.cityval !== 'undefined') {
				loadCity(curprob);
			}
		}
		
		let loadCity = function(id) {
			city.html('');
			city.append($('<option/>').text('-- City --').val('').hide());
			cityList.forEach(val => {
				if (id == val.provinceid) {
					let sel = (typeof param.probval !== 'undefined' && param.cityval == val.city) ? true : false;
					city.append($('<option/>').text(val.city).val(val.city).attr('selected',sel));
				}
			});
		}

		let getProvinces = function(){
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				url: '<?php echo PATH_REQ;?>general.req/province.req.php',
				data: {'part':'provinceList'},
				success: function(d) {
					provinceList = d;
					loadProvince();
				},
				error: function(x) {
					console.log(x.reponseText);
				}
			});
		}
		let getCities = function(){
			$.ajax({
				type: 'POST',
				dataType: 'JSON',
				url: '<?php echo PATH_REQ;?>general.req/province.req.php',
				data: {'part':'cityList'},
				success: function(d) {
					cityList = d;
				},
				error: function(x) {
					console.log(x.reponseText);
				}
			});
		}

		getCities();
		getProvinces();
	}
</script>
<script type="text/javascript">
	function ProvinceCity(prov,city) {
		let provinceList = new Array();
		let cityList = new Array();
		
		let loadProvince = function() {
			prov.html('');
			prov.append($('<option/>').text('-- Province --').val('').hide());
			provinceList.forEach(val => {
				prov.append($('<option/>').text(val.province).val(val.province).data('id',val.id));
			});
			prov.change(function() {
				loadCity($(this).find('option:selected').data('id'));
			});
		}
		
		let loadCity = function(id) {
			city.html('');
			city.append($('<option/>').text('-- City --').val('').hide());
			cityList.forEach(val => {
				if (id == val.provinceid) {
					city.append($('<option/>').text(val.city).val(val.city));
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

		getProvinces();
		getCities();

		
	}
</script>
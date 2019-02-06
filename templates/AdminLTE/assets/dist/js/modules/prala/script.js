$(document).ready(function(){
	var data;
	var districts;
	console.log(_ID);
	// if(_ID==undefined)
	// {
	// 	var _ID=0;
	// }

	function set_option(select,data)
	{
		while (select[0].options.length) {
    	select[0].remove(0);
    }
		var selectbox = select[0].options;
		for(var i = 0, l = data.length; i < l; i++){
		  var option = data[i];
		  select[0].options.add( new Option(option.text, option.value, option.selected) );
		}
	}

	$('select[name="provinsi"]').on('change', function(){
		var a = $(this).val();
		var select = $('select[name="kabupaten"]');
		if(data[a] == undefined){
			var tmp = [{'text':'Pilih Kabupaten','value':'','selected':'true'}];
		}else{
			var option = data[a];
			var tmp = [{'text':'Pilih Kabupaten','value':'','selected':'true'}];
			for(var i =0; i< option.length;i++){
				tmp[i+1] = [];
				tmp[i+1].text = option[i].name;
				tmp[i+1].value = option[i].id;
			}
		}
		set_option(select, tmp);
	});
	$.ajax({
		type:'post',
		data: {id:_ID},
    url: _URL+'home/prala/regencies',
    success:function(result){
    	result = JSON.parse(result);
    	console.log(result);
    	if(result.status)
    	{
    		var a = $('select[name="provinsi"]').val();
    		data = result.data;
    		var select = $('select[name="kabupaten"]');
				if(data[a] == undefined){
					var tmp = [{'text':'Pilih Kabupaten','value':'','selected':'true'}];
				}else{
					var option = data[a];
					var tmp = [{'text':'Pilih Kabupaten','value':'','selected':'true'}];
					for(var i =0; i< option.length;i++){
						tmp[i+1] = [];
						tmp[i+1].text = option[i].name;
						tmp[i+1].value = option[i].id;
					}
				}
				set_option(select, tmp);
    	}else{
    		alert('data not found');
    	}
    }
  });

	$('select[name="kabupaten"]').on('change', function(){
		var a = $(this).val();
		var select = $('select[name="kecamatan"]');
		if(districts[a] == undefined){
			var tmp = [{'text':'Pilih Kecamatan','value':'','selected':'true'}];
		}else{
			var option = districts[a];
			var tmp = [{'text':'Pilih Kecamatan','value':'','selected':'true'}];
			for(var i =0; i< option.length;i++){
				tmp[i+1] = [];
				tmp[i+1].text = option[i].name;
				tmp[i+1].value = option[i].id;
			}
		}
		set_option(select, tmp);
	});
  $.ajax({
		type:'post',
		data: {id:_ID},
    url: _URL+'home/prala/districts',
    success:function(result){
    	result = JSON.parse(result);
    	console.log(result);
    	if(result.status)
    	{
    		var a = $('select[name="kabupaten"]').val();
    		districts = result.data;
    		var select = $('select[name="kecamatan"]');
				if(districts[a] == undefined){
					var tmp = [{'text':'Pilih Kecamatan','value':'','selected':'true'}];
				}else{
					var option = districts[a];
					var tmp = [{'text':'Pilih Kecamatan','value':'','selected':'true'}];
					for(var i =0; i< option.length;i++){
						tmp[i+1] = [];
						tmp[i+1].text = option[i].name;
						tmp[i+1].value = option[i].id;
					}
				}
				set_option(select, tmp);
    	}else{
    		alert('data not found');
    	}
    }
  });


  $('select[name="provinsi_sekolah"]').on('change', function(){
		var a = $(this).val();
		var select = $('select[name="kabupaten_sekolah"]');
		if(data[a] == undefined){
			var tmp = [{'text':'Pilih Kabupaten','value':'','selected':'true'}];
		}else{
			var option = data[a];
			var tmp = [{'text':'Pilih Kabupaten','value':'','selected':'true'}];
			for(var i =0; i< option.length;i++){
				tmp[i+1] = [];
				tmp[i+1].text = option[i].name;
				tmp[i+1].value = option[i].id;
			}
		}
		set_option(select, tmp);
	});
	$.ajax({
		type:'post',
		data: {id:_ID},
    url: _URL+'home/prala/regencies',
    success:function(result){
    	result = JSON.parse(result);
    	console.log(result);
    	if(result.status)
    	{
    		var a = $('select[name="provinsi_sekolah"]').val();
    		data = result.data;
    		var select = $('select[name="kabupaten_sekolah"]');
				if(data[a] == undefined){
					var tmp = [{'text':'Pilih Kabupaten','value':'','selected':'true'}];
				}else{
					var option = data[a];
					var tmp = [{'text':'Pilih Kabupaten','value':'','selected':'true'}];
					for(var i =0; i< option.length;i++){
						tmp[i+1] = [];
						tmp[i+1].text = option[i].name;
						tmp[i+1].value = option[i].id;
					}
				}
				set_option(select, tmp);
    	}else{
    		alert('data not found');
    	}
    }
  });

	$('select[name="kabupaten_sekolah"]').on('change', function(){
		var a = $(this).val();
		var select = $('select[name="kecamatan_sekolah"]');
		if(districts[a] == undefined){
			var tmp = [{'text':'Pilih Kecamatan','value':'','selected':'true'}];
		}else{
			var option = districts[a];
			var tmp = [{'text':'Pilih Kecamatan','value':'','selected':'true'}];
			for(var i =0; i< option.length;i++){
				tmp[i+1] = [];
				tmp[i+1].text = option[i].name;
				tmp[i+1].value = option[i].id;
			}
		}
		set_option(select, tmp);
	});
  $.ajax({
		type:'post',
		data: {id:_ID},
    url: _URL+'home/prala/districts',
    success:function(result){
    	result = JSON.parse(result);
    	console.log(result);
    	if(result.status)
    	{
    		var a = $('select[name="kabupaten_sekolah"]').val();
    		districts = result.data;
    		var select = $('select[name="kecamatan_sekolah"]');
				if(districts[a] == undefined){
					var tmp = [{'text':'Pilih Kecamatan','value':'','selected':'true'}];
				}else{
					var option = districts[a];
					var tmp = [{'text':'Pilih Kecamatan','value':'','selected':'true'}];
					for(var i =0; i< option.length;i++){
						tmp[i+1] = [];
						tmp[i+1].text = option[i].name;
						tmp[i+1].value = option[i].id;
					}
				}
				set_option(select, tmp);
    	}else{
    		alert('data not found');
    	}
    }
  });
});
function baseurl(){
	var base = window.location;

	if(base.host=='localhost'){
		return "https://" + base.host + "/plumbertools/";
	}else if(base.host=='diyesh.com'){
		return "https://" + base.host + "/plumbertools/";
	}else{
		return "https://" + base.host + "/";
		/* //test to be revert on migration 
		return "https://" + base.host + "/";
		*/
	}
}


function datatables(selector, options={}){
	$(selector).DataTable({
		"searching"		: (options.search && options.search=='0') ? false : true,
		"lengthChange"	: (options.length && options.length=='0') ? false : true
	});
}

function ajaxdatatables(selector, options={}){
	if(options.destroy && options.destroy==1){
		$(selector).DataTable().destroy();
	}
	
	var order = (options.order) ? options.order : [[0, 'asc']];
	
	var columndefs 		= [];
	
	var columndefsobj 	= {};
	if(options.target) 	columndefsobj['targets'] 	= options.target;
	if(options.sort) 	columndefsobj['orderable'] 	= (options.sort=='1') ? true : false;
	columndefs.push(columndefsobj);
	
	var columndefsobj1 	= {};
	if(options.target1) 	columndefsobj1['targets'] 	= options.target1;
	if(options.visible1) 	columndefsobj1['visible'] 	= (options.visible1=='1') ? true : false;
	if(options.target1 && options.visible1) columndefs.push(columndefsobj1);
	
	var optiondata = {
		'processing'	: 	true,
		'serverSide'	: 	true,
		'ajax'			: 	{
								'url' 		: 	options.url,
								'data'		: 	(options.data) ? options.data : {},
								'dataType'	: 	'json',
								'type'		: 	(options.method) ? options.method : 'post',
								'complete'	: 	function(){
													tooltip();
												}
								
							},
		'columns'		: 	options.columns,
		'order'			: 	order,
		'columnDefs'	: 	columndefs,
		'searching'		: 	(options.search && options.search=='0') ? false : true,
		'lengthMenu'	: 	(options.lengthmenu && options.lengthmenu.length > 0) ? options.lengthmenu : [10, 25, 50, 100]
	};
	
	if(options.createdrow){
		optiondata.createdRow = options.createdrow
	}
	
	$(selector).DataTable(optiondata);
}


/** Jquery Validation **/

function validation(selector, rules, messages, extras=[])
{
	$.validator.addMethod("lettersonly", function(value, element) {
	  return this.optional(element) || /^[a-z \s]+$/i.test(value);
	}, "Please Enter Letters Only.");

	// $.validator.addMethod("pwcheck", function(value, element) {
	//   return this.optional(element) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,16}$/i.test(value);
	// }, "Please Enter Letters Only.");
	
	$.validator.addMethod("lettersandhypen", function(value, element) {
	  return this.optional(element) || /^[a-z0-9#-\s]+$/i.test(value);
	}, "Please Enter Letters, Number, Asterisk and Hypens Only.");
	
	$.validator.addMethod("noSpace", function(value, element) { 
		return value.indexOf(" ") < 0 && value != ""; 
	}, "No space please and don't leave it empty");
	
	var validation = {};
	
	validation['rules'] 			= 	rules;
	validation['messages'] 			=	messages;
	validation['errorElement'] 		= 	(extras['errorElement']) ? extras['errorElement'] : 'p';
	validation['errorClass'] 		= 	(extras['errorClass']) ? extras['errorClass'] : 'error_class_1';
	validation['ignore'] 			= 	(extras['ignore']) ? extras['ignore'] : ':hidden';
	validation['errorPlacement']	= 	function(error, element) {
											if(element.attr('data-date') == 'datepicker'){
												$(element).parent().parent().append(error);
											}else if(element.attr('data-checkbox') == 'checkbox1'){
												$(element).parent().append(error);
											}else if(element.attr('data-radio') == 'radio1'){
												$(element).parent().append(error);
											}else if(element.attr('data-select') == 'select2'){
												$(element).parent().append(error);
											}else if(element.attr('data-textbox') == 'textbox1'){
												$(element).parent().append(error);
											}else if(element.attr('data-editor') == 'editor'){
												$(element).parent().append(error);
											}else{
												error.insertAfter(element);
											}
										}
	var validator = $(selector).validate(validation);						
	if(extras['callback']){
		return validator;
	}
}

function select2(selector){
	$(selector).select2();
}

function tooltip(){
	$('[data-toggle="tooltip"]').tooltip(); 
}

function sweetalert(action, data){
	Swal.fire({
		title: 'Are you sure?',
		text: "You want to proceed?",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes',
		cancelButtonText:'No'
	}).then((result) => {
		if (result.value) {
			formsubmit(action, data)
		}
	})
}

function sweetalertautoclose(title, html='', timer=''){
	let timerInterval;
	Swal.fire({
		title: title,
		timer: (timer=='') ? 1000 : timer,
		timerProgressBar: true,
		onBeforeOpen: () => {
			Swal.showLoading();
		},
		onClose: () => {
			clearInterval(timerInterval);
		}
	}).then((result) => {})
}

function datepicker(selector, extras=[], custom={}){
	var options = {};	
	options['format'] = 'dd-mm-yyyy';
	options['autoclose'] = true;
	if($.inArray('currentdate', extras) != -1) options['startDate'] = new Date();
	if($.inArray('enddate', extras) != -1) options['endDate'] = new Date();
	if($.inArray('pastfivedate', extras) != -1){
		var pastfivedate = new Date();
		pastfivedate.setDate(pastfivedate.getDate() - 4)
		options['startDate'] = pastfivedate;
	}
	if(custom.customstartdate) options['startDate'] = new Date(custom.customstartdate);

	$(selector).datepicker(options).on('keypress paste', function(e){
		e.preventDefault();
		return false;
	});
}

function formsubmit(action, data){
	$('<form action="'+action+'" method="post">'+data+'</form>').appendTo('body').submit();
}

function ajax(url, data, method, extras=[]){
	var options = {};
	
	options['url'] 			= 	url;
	options['type'] 		=	(extras['type']) ? extras['type'] : 'post';
	options['data'] 		=	data;
	options['dataType'] 	=	(extras['datatype']) ? extras['datatype'] : 'json';
	
	if(extras['contenttype']) 	options['contentType'] 	=	false;
	if(extras['processdata']) 	options['processData'] 	=	false;
	if(extras['asynchronous']) 	options['async'] 		=	false;
	if(extras['beforesend'])	options['beforeSend'] 	=	extras['beforesend'];
	if(extras['complete']) 		options['complete'] 	=	extras['complete'];
	
	if(extras['success']){
 		options['success'] 		=	extras['success'];
	}else{
		options['success'] 		=	function(data){ 
										method(data);
									}
	}	
	
	$.ajax(options);
}

function formatdate(date, type){
	var date = new Date(date)
	if(type==1)				return ('0' + date.getDate()).slice(-2)+"-"+('0' + (date.getMonth()+1)).slice(-2)+ "-" +date.getFullYear();
	else if(type==2)		return date.getFullYear()+"/"+('0' + (date.getMonth()+1)).slice(-2)+ "/" +('0' + date.getDate()).slice(-2);
	else if(type==3)		return ('0' + date.getDate()).slice(-2)+"-"+('0' + (date.getMonth()+1)).slice(-2)+ "-" +date.getFullYear()+' '+('0' + date.getHours()).slice(-2)+':'+('0' + date.getMinutes()).slice(-2)+':'+('0' + date.getSeconds()).slice(-2);
}

function numberonly(selector){
	$(selector).keyup(function(){
		if (/\D/g.test(this.value))
		{
			this.value = this.value.replace(/\D/g, '');
		}
	})
}

function inputmask(selector, type=''){
	
	if(type==1) $(selector).inputmask("(999) 999-9999")
}

function editor(selector, validation='', height=300){
	tinymce.init({
		selector	: 	selector,
		height		: 	height,
		menubar		:	false,
		statusbar	: 	false,
		plugins		: 	'hr textcolor table code preview',
		toolbar1	: 	'formatselect | bold italic underline strikethrough superscript subscript hr | forecolor backcolor | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | table | preview code',
		content_css	: 	[
							'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
							'//www.tinymce.com/css/codepen.min.css'
						],
		setup		: 	function(editor){
							
						}
	});
}

function rating(selector, field, values=0){
	$(selector).rating({
		"half":true,
		"click":function(e){
			$(document).find(field).val(e.stars);
		},
		"value": values
	});
}

function fileupload(data1=[], data2=[], multiple='', customfunction=''){
	var ajaxurl 	= baseurl()+"ajax/index/ajaxfileupload";
	var loader 		= baseurl()+"icons/ajax-loader.gif";
	
	var selector 	= data1[0];
	var extension 	= data1[2] ? data1[2] : ['jpg','jpeg','png'];
	
	$(document).on('change', selector, function(){
		var name 		= $(this).val();
		var ext 		= name.split('.').pop().toLowerCase();
		
		if($.inArray(ext, extension) !== -1){
			var form_data 	= new FormData();
			form_data.append("file", $(selector)[0].files[0]);
			form_data.append("path", data1[1]);
			form_data.append("type", extension.join('|'));
			
			var datasrc = (data2[1]) ? $(document).find(data2[1]).attr('src') : '';
			if(multiple!=''){
				var mutiplesection = $(document).find(data2[1]).parent().find('div:first');
				var defaultimg = mutiplesection.find('img').attr('src');
			}
			
			ajax(ajaxurl, form_data, fileappend, {
				contenttype : 1, 
				processdata : 1,
				beforesend : function(){
					if(multiple!=''){
						mutiplesection.show();
						mutiplesection.find('img').attr('src', loader);
					}else if(datasrc!=''){
						$(document).find(data2[1]).attr('src', loader);
					}
				},
				complete : function(){
					if(multiple!=''){
						var mutiplesection = $(document).find(data2[1]).parent().find('div:first');
						mutiplesection.hide();
						mutiplesection.find('img').attr('src', defaultimg);
					}
				}
			});
		}else{
			$(selector).val('');
			alert('Supported file format are '+extension.join(','));
		}
	})
	
	function fileappend(data){
		if(typeof data !== 'object'){
			alert(data);
		}
		
		if((data.file_name && data2.length) || (data.file_name && customfunction!='')){
			var file 		= data.file_name;
			
			if(customfunction!=''){
				customfunction(file);
			}else{
				if(data2[1] && data2[2]){
					var ext = data.file_name.split('.').pop().toLowerCase();
					
					if(ext=='jpg' || ext=='jpeg' || ext=='png' || ext=='tif' || ext=='tiff'){
						var filesrc = data2[2]+'/'+file;
					}else if(ext=='pdf'){
						var filesrc = data2[3];
					}
				}
				
				if(multiple==''){
					$(data2[0]).val(file);
					
					if(filesrc){
						$(data2[1]).attr('src', filesrc);
					}				
				}else{
					if(filesrc){
						$(data2[1]).append('<p><div class="multipleupload"><input type="hidden" value="'+file+'" name="'+data2[0]+'"><img src="'+filesrc+'" width="100"><i class="fa fa-times"></i></div></p>');
					}
				}
			}
		}
		
		$(selector).val('');
		if (typeof installationdefaultimage !== 'undefined' && $.isFunction(installationdefaultimage)) installationdefaultimage();
	}
	
	$(document).on('click', '.multipleupload i', function(){
		$(this).parent().remove();
		if (typeof installationdefaultimage !== 'undefined' && $.isFunction(installationdefaultimage)) installationdefaultimage();
	})
}

function localstorage(type, name, value){
	if(type=='set'){
		localStorage.setItem(name, value);
	}else if(type=='get'){
		return localStorage.getItem(name);
	}else if(type=='remove'){
		localStorage.removeItem(name);
	}
}

function scrolltobottom(id){
	var div = document.getElementById(id);
	$('#' + id).animate({
		scrollTop: div.scrollHeight - div.clientHeight
	}, 500);
}

function knobchart(){
	$('[data-plugin="knob"]').knob();
}

function piechart(selector, options){
	var myChart = echarts.init(document.getElementById(selector));
	
	option = {
		tooltip : {
			trigger: 'item',
			formatter: "{a} <br/>{b} : {c} ({d}%)"
		},
		legend: {
			orient 	: 'vertical',
			x 		: 'left',
			data	: options['xaxis']
		},
		calculable : true,
		series : [
			{
				name		: 	options['name'],
				type		: 	'pie',
				radius 		: 	'55%',
				center		: 	['50%', '60%'],
				data		: 	options['yaxis'],
				itemStyle 	: 	{
									normal : {
										label : {
											formatter : function (params) {    
												return params.name+'\n'+(params.percent - 0).toFixed(0) + '%'
											}
										}
									}
								}
			}
		],
		color: options['colors']
	};
	
	myChart.setOption(option, true), $(function() {
		function resize() {
			setTimeout(function() {
				myChart.resize()
			}, 100)
		}
		$(window).on("resize", resize), $(".icon-menu").on("click", resize)
	});
}

function barchart(selector, options){
	var myChart = echarts.init(document.getElementById(selector));
	
	var series = [];
	$(options['series']).each(function(i, v){
		series.push({
			name		: 	v.name,
			type		: 	'bar',
			barMaxWidth	: 	60,
			itemStyle	: 	{
								normal: {
									color: function(params) {
										return (v.colors) ? v.colors[params.dataIndex] : v.color
									},
									label : {
										show: true, 
										position: 'top'
									}
								}
							},
			data		: 	v.yaxis
		})
	})
	
	option = {
		tooltip : {
			trigger: 'item'
		},
		calculable : true,
		grid: {
			borderWidth: 0
		},
		xAxis : [
			{
				type : 'category',
				data : 	options['xaxis'],
				splitLine: { show: false },
				axisLine: {show: false},	
				axisTick : {show: false},		
				axisLabel:{interval:0}			
			}
		],
		yAxis : [
			{
				type : 'value',
				axisLine: {show: false}
			}
		],
		series : series
	};
                    

	myChart.setOption(option, true), $(function() {
		function resize() {
			setTimeout(function() {
				myChart.resize()
			}, 100)
		}
		$(window).on("resize", resize), $(".icon-menu").on("click", resize)
	});
}

function barchart2(selector, options){
	var myChart = echarts.init(document.getElementById(selector));
	
	var series = [];
	$(options['series']).each(function(i, v){
		series.push({
			name		: 	v.name,
			type		: 	'bar',
			barMaxWidth	: 	60,
			itemStyle	: 	{
								normal: {
									color: function(params) {
										return (v.colors) ? v.colors[params.dataIndex] : v.color
									},
									label : {
										show: true, 
										position: 'top'
									}
								}
							},
			data		: 	v.yaxis
		})
	})
	
	option = {
		tooltip : {
			trigger: 'item'
		},
		calculable : true,
		grid: {
			borderWidth: 0,
			height :200,
			width:170
		},
		xAxis : [
			{
				type : 'category',
				data : 	options['xaxis'],
				splitLine: { show: false },
				axisLine: {show: false},	
				axisTick : {show: false},		
				axisLabel:{interval:0,rotate:-70}			
			}
		],
		yAxis : [
			{
				show: false
			}
		],
		series : series
	};
                    

	myChart.setOption(option, true), $(function() {
		function resize() {
			setTimeout(function() {
				myChart.resize()
			}, 100)
		}
		$(window).on("resize", resize), $(".icon-menu").on("click", resize)
	});
}

function linechart(selector, options){
	var linechart = echarts.init(document.getElementById(selector));
	
	var series = [];
	$(options['series']).each(function(i, v){
		var seriesoption = {
			name		:	v.name,
			type		:	'line',
			smooth		:	true,
			data		:	v.yaxis,
			symbolSize	:	v.symbol
		};
		
		if(i!=0) seriesoption['itemStyle'] = {normal: {areaStyle: {color: v.color, type: 'default'}}};
		
		series.push(seriesoption)
	})
	
	option = {	   
		tooltip : {
			trigger: 'item'
		},
		color: options['colors'],
		calculable : true,
		grid: {
			borderWidth: 0
		},	
		xAxis : [
			{
				type : 'category',
				boundaryGap : false,
				splitLine: { show: false },
				axisLine: {show: false},	
				axisTick : {show: false},		
				axisLabel:{interval:0},
				data : options['xaxis']
			}
		],
		yAxis : [
			{
				type : 'value',
				axisLine: {show: false}
			}
		],
		series : series 
	};

	if (option && typeof option === "object") {
		linechart.setOption(option, true), $(function() {
			function resize() {
				setTimeout(function() {
					linechart.resize()
				}, 100)
			}
			
			$(window).on("resize", resize), $(".icon-menu").on("click", resize)
		});
	}

}

function gaugechart(selector, options){
	var gaugeChart = echarts.init(document.getElementById(selector));

	option = {
		tooltip : {
			formatter: "{a} <br/>{b} : {c}%"
		},
		series : [
			{
				name		: options.name,
				type		:'gauge',
				detail 		: {formatter:'{value}'},
				data		: options.data,
				axisLine	: {            
								lineStyle: {       
									color: options.colors 
									
								}
							  }
				
			}
		]
	};
		   
	gaugeChart.setOption(option, true), $(function() {
		function resize() {
			setTimeout(function(){
				gaugeChart.resize()
			}, 100)
		}
		$(window).on("resize", resize), $(".icon-menu").on("click", resize)
	});
}


function meterchart(selector, value){
	
	var options = {
		type: "gauge",
		'scale-r': {
			aperture:200,
			values: "0:100:25",
			center: {
				size:5,
				'background-color': "#009efb #f62d51",
				'border-color': "none"
			},
			ring: {
				size:10,
				rules: [
					{
						rule: "%v >= 0 && %v <= 25",
						'background-color': "red"
					},
					{
						rule: "%v >= 25 && %v <= 50",
						'background-color': "orange"
					},
					{
						rule: "%v >= 50 && %v <= 75",
						'background-color': "black"
					},
					{
						rule: "%v >= 75 && %v <= 100",
						'background-color': "green"
					}
				]
			},
			guide: { 
				'background-color': "#009efb #f62d51",
				alpha:0.2
			}
		},
		plot: {
			csize: "5%",
			size: "100%",
			'background-color': "#000000"
		},
		series: [
			{ values: [value]}
		]
	};
	
	zingchart.render({
		id		: selector,
		data	: options
	});
}


function removelastchr(number){
	return parseFloat(number).toFixed(3).slice(0,-1);
}

function currencyconvertor(currency){
	var amount 	= (Math.floor(currency*100)/100).toFixed(2);
	var lastchr	= amount[amount.length-1];
	
	if(lastchr < 5){
		amount = amount.substring(0, amount.length - 1)+'0';
	}else{
		amount = amount.substring(0, amount.length - 1)+'5';
	}
	
	return amount;
}

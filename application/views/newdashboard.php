<?php
$searchtype = isset($searchtype) ? $searchtype : '';

$week1 = isset($weeksgraph[0]) ? $weeksgraph[0]['count'] : 0;
$week2 = isset($weeksgraph[1]) ? $weeksgraph[1]['count'] : 0;
$week3 = isset($weeksgraph[2]) ? $weeksgraph[2]['count'] : 0;
$week4 = isset($weeksgraph[3]) ? $weeksgraph[3]['count'] : 0;

// echo $searchtype;die;
?>
<style type="text/css">
	.a_sale_graph{		
	    position: absolute;
	    left: 50%;
	    top: 200px;
	}
</style>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 dash-summ">
				<div class="card">
					<div class="header">
						<h4 class="title">Advert Summary</h4>
						<?php 
						if ($userdetails['warehouse_staff'] =='0') { ?>
						<a href="<?php echo base_url().'admincontrol/dashboard'; ?>">
							<button type="button" class="btn btn-success btn-fill pull-right">Old Dashboard</button>
						</a>
						<?php }?>
						<p class="category"></p>
						</br></br>
						Selected Date: <?php echo date("m/d/Y", strtotime($fromdateA)); ?> to <?php echo date("m/d/Y", strtotime($todateA)); ?>
						</br>
						<select name="daterange1" id="daterange1">
							<option value="0" <?php if($daterangevalueA == 0) { ?> selected <?php } ?>>Date Range</option>
							<option value="1" <?php if($daterangevalueA == 1) { ?> selected <?php } ?>>Today</option>
							<option value="2" <?php if($daterangevalueA == 2) { ?> selected <?php } ?>>yesterday</option>
							<option value="3" <?php if($daterangevalueA == 3) { ?> selected <?php } ?>>Last 7 days</option>
							<option value="4" <?php if($daterangevalueA == 4) { ?> selected <?php } ?>>Last 30 days</option>
							<option value="5" <?php if($daterangevalueA == 5) { ?> selected <?php } ?>>This Month</option>
							<option value="6" <?php if($daterangevalueA == 6) { ?> selected <?php } ?>>Last Month</option>					
						</select>
						<input type="text" name="fromdate1" id="fromdate1" value="<?php echo date("m/d/Y", strtotime($fromdateA)); ?>"> 
						<input type="text" name="todate1" id="todate1" value="<?php echo date("m/d/Y", strtotime($todateA)); ?>">
						<button type="button" id="searchclick1" class="btn btn-info btn-fill searchclick">Search</button>
						<button type="button" id="download1" class="btn btn-info btn-fill pull-right"><i class="fa fa-download"></i> Download</button>
						</br></br>
						<input type="hidden" id="activestatus" name="activestatus" value="<?php echo $activestatus; ?>">
						<!-- <button type="button" activevalue="1" class="btn btn-success btn-fill pull-left active">Active</button>
						<button type="button" activevalue="2" class="btn btn-warning btn-fill pull-left active">Inactive</button> -->
						</br></br>
					</div>
					<div class="content table-responsive table-full-width">
						<table class="table table-hover table-striped" id="bannersummary_table">
							<thead>
								<th>S.No</th>
								<th>Banner ID</th>								
								<th>Client</th>
								<th>Description</th>
								<th>Impressions</th>
								<th>Clicks</th>
								<th>Section</th>
								<th>Created Date</th>
								<th>Inactive Date</th>
								<th>Active</th>
							</thead>
							<tbody>
						<?php 
							$i=1;
							foreach($getdata as $row){								
						?>
								 <tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row['bannerid']; ?></td>									
									<td><?php echo $row['client_name']; ?></td>
									<td><?php echo $row['description']; ?></td>
									<td><?php echo $row['impressionscount']; ?></td>
									<td><?php echo $row['clickscount']; ?></td>	
									<td><?php echo $row['pagename']; ?></td>								
									<td><?php if($row['created_at'] !='') echo date('d-m-Y', strtotime($row['created_at'])); else echo "-"; ?></td>
									<td><?php if($row['inactive_date'] !='') echo date('d-m-Y', strtotime($row['inactive_date'])); else echo "-"; ?></td>
									<td><?php if($row['campaign_status']==1){ ?>True<?php } else { ?>False<?php } ?></td>
								</tr>
						<?php 
							$i++;
							}
						?>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="col-md-12 dash-summ">
				<div class="card">				
					<div class="header">						
						<h4 class="title">Engagements Graph last 6 months</h4>
					</div>
					<div class="row">
						<div class="col-md-2">
							<p class="a_sale_graph"><span style="background:#4472C4;padding:0 7px;margin-right: 4px;"></span><span>Engagements</span></p>
						</div>
						<div class="col-md-10">
							<div id="sixmonthchart" style="width:100%; height:400px;"></div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-12 dash-summ">
				<div class="card">				
					<div class="header">						
						<h4 class="title">Current Month Engagements</h4>
					</div>
					<div class="row">						
						<div class="col-md-12">
							<div id="weekschart" style="width:100%; height:400px;"></div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-12 dash-summ">
				<div class="card">				
					<div class="header">						
						<h4 class="title">Usage Summary</h4>
						<p class="category"></p>
						</br></br>
						Selected Date: <?php echo date("m/d/Y", strtotime($fromdate)); ?> to <?php echo date("m/d/Y", strtotime($todate)); ?>
						</br>
						<select name="daterange" id="daterange">
							<option value="0" <?php if($daterangevalue == 0) { ?> selected <?php } ?>>Date Range</option>
							<option value="1" <?php if($daterangevalue == 1) { ?> selected <?php } ?>>Today</option>
							<option value="2" <?php if($daterangevalue == 2) { ?> selected <?php } ?>>yesterday</option>
							<option value="3" <?php if($daterangevalue == 3) { ?> selected <?php } ?>>Last 7 days</option>
							<option value="4" <?php if($daterangevalue == 4) { ?> selected <?php } ?>>Last 30 days</option>
							<option value="5" <?php if($daterangevalue == 5) { ?> selected <?php } ?>>This Month</option>
							<option value="6" <?php if($daterangevalue == 6) { ?> selected <?php } ?>>Last Month</option>							
						</select>
						<input type="text" name="fromdate" id="fromdate" value="<?php echo date("m/d/Y", strtotime($fromdate)); ?>"> 
						<input type="text" name="todate" id="todate" value="<?php echo date("m/d/Y", strtotime($todate)); ?>">
						<button type="button"id="searchclick" class="btn btn-info btn-fill searchclick">Search</button>
						<button type="button" id="download" class="btn btn-info btn-fill pull-right"><i class="fa fa-download"></i> Download</button>
						</br></br>
					</div>					
					<div class="content table-responsive table-full-width">
						<table class="table table-hover table-striped" id="pagesummary_table">
							<thead>
								<th>S.No</th>
								<th>Page ID</th>
								<th>Page Name</th>
								<th>Views</th>
							</thead>
							<tbody>
						<?php 
							$i=1;
							foreach($getdata2 as $row){
						?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row['id']; ?></td>
									<td><?php echo $row['title']; ?></td>
									<td><?php echo $row['totalcount']; ?></td>									
								</tr>
						<?php 
							$i++;
							}
						?>
							</tbody>
						</table>
					</div>
				</div>
			</div>						
		</div>				
	</div>
</div>

<!--  Charts Plugin -->
<script src="<?php echo base_url(); ?>assets/plugins/knob/jquery.knob.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/echarts/echarts-all.js"></script>

<script type="text/javascript">
    	$(document).ready(function(){
    		var searchtype = '<?php echo $searchtype; ?>';
    		if (searchtype!='') {
    			if (searchtype ==='bannersearch') {
    				var scrollPos =  $("#bannersummary_table").offset().top;
 					$(window).scrollTop(scrollPos);
    			}else if(searchtype ==='pagesearch'){
    				var scrollPos =  $("#pagesummary_table").offset().top;
 					$(window).scrollTop(scrollPos);
    			}
    		}

			/*$('.active').click(function(){
				var activeval = $(this).attr('activevalue'); 
				var fromdateA = $('#fromdate1').val();
				var todateA = $('#todate1').val();	
				var daterangevalueA=$('#daterange1').val();			
				var url = '<?php// echo base_url().'admincontrol/dashboard'; ?>';
				$('<form method="post" action="'+url+'"><input type="hidden" name="activeval" value="'+activeval+'"><input type="hidden" name="fromdateA" value="'+fromdateA+'"><input type="hidden" name="todateA" value="'+todateA+'"><input type="hidden" name="daterangevalueA" value="'+daterangevalueA+'"></form>').appendTo('body').submit();
			});*/
			
			var today = new Date();
			$('#fromdate').datepicker();
			$('#todate').datepicker();
									
			$('#daterange').change(function(){
				var daterangevalue=$('#daterange').val();				
				var today = new Date(); 				
				if(daterangevalue == 0){ 
					var firstDay = new Date(today.getFullYear(), today.getMonth(), 1);
					var lastDay = new Date(today.getFullYear(), today.getMonth() + 1, 0);					
					$('#fromdate').datepicker('setDate', firstDay);
					$('#todate').datepicker('setDate', lastDay);
				}
				if(daterangevalue == 1){	
					$('#fromdate').datepicker('setDate', 'today');
					$('#todate').datepicker('setDate', 'today');
				}
				if(daterangevalue == 2){ 
					$('#fromdate').datepicker('setDate', 'yesterday');
					$('#todate').datepicker('setDate', 'yesterday');
				}
				if(daterangevalue == 3){ 
					var lastWeek = new Date(today.getFullYear(), today.getMonth(), today.getDate() - 7);
					$('#fromdate').datepicker('setDate', lastWeek);
					$('#todate').datepicker('setDate', 'today');					
				}
				if(daterangevalue == 4){
					var lastWeek = new Date(today.getFullYear(), today.getMonth(), today.getDate() - 30);
					$('#fromdate').datepicker('setDate', lastWeek);
					$('#todate').datepicker('setDate', 'today');
				}
				if(daterangevalue == 5){ 
					var firstDay = new Date(today.getFullYear(), today.getMonth(), 1);
					var lastDay = new Date(today.getFullYear(), today.getMonth() + 1, 0);					
					$('#fromdate').datepicker('setDate', firstDay);
					$('#todate').datepicker('setDate', lastDay);
				}
				if(daterangevalue == 6){ 
					var firstDay = new Date(today.getFullYear(), today.getMonth() - 1, 1);
					var lastDay = new Date(today.getFullYear(), today.getMonth(), 0);					
					$('#fromdate').datepicker('setDate', firstDay);
					$('#todate').datepicker('setDate', lastDay);
				}				
			});
			
			$('#searchclick').click(function(){				
				var daterangevalue=$('#daterange').val();
				var fromdate = $('#fromdate').val();
				var todate = $('#todate').val();
				var url = '<?php echo base_url().'admincontrol/newdashboard'; ?>';
				$('<form method="post" action="'+url+'"><input type="hidden" name="daterangevalue" value="'+daterangevalue+'"><input type="hidden" name="fromdate" value="'+fromdate+'"><input type="hidden" name="todate" value="'+todate+'"><input type="hidden" name="searchtype" value="pagesearch"></form>').appendTo('body').submit();
			});

			$('#download').click(function(){	
				var	warehouse_staff = '<?php echo $warehouse_staff; ?>';
				var daterangevalue=$('#daterange').val();
				var fromdate = $('#fromdate').val();
				var todate = $('#todate').val();

				// var filename = 'Usage_Summary';

				// var url = '<?php//  echo base_url().'assets/uploads/dashboardreport/'; ?>'+filename+''+'.csv'+'';
				$.ajax({					
					data: {fromdate: fromdate, todate: todate, warehouse_staff: warehouse_staff},
			        type: 'POST',
			        url: '<?php echo base_url().'common/index/download_pages'; ?>',
			        dataType: "text",  
         			cache:false,	            
		            success:function(data)
			        {
			        	url = '<?php  echo base_url().'assets/uploads/dashboardreport/'; ?>'+data+''+'.csv'+'';
			        	window.location.href = url;			        	
					 	console.log(data);
			        }
				});	
			});

			$('#fromdate1').datepicker();
			$('#todate1').datepicker();
						
			$('#daterange1').change(function(){
				var daterangevalue=$('#daterange1').val();				
				var today = new Date(); 				
				if(daterangevalue == 0){ 
					var firstDay = new Date(today.getFullYear(), today.getMonth(), 1);
					var lastDay = new Date(today.getFullYear(), today.getMonth() + 1, 0);					
					$('#fromdate1').datepicker('setDate', firstDay);
					$('#todate1').datepicker('setDate', lastDay);
				}
				if(daterangevalue == 1){	
					$('#fromdate1').datepicker('setDate', 'today');
					$('#todate1').datepicker('setDate', 'today');
				}
				if(daterangevalue == 2){ 
					$('#fromdate1').datepicker('setDate', 'yesterday');
					$('#todate1').datepicker('setDate', 'yesterday');
				}
				if(daterangevalue == 3){ 
					var lastWeek = new Date(today.getFullYear(), today.getMonth(), today.getDate() - 7);
					$('#fromdate1').datepicker('setDate', lastWeek);
					$('#todate1').datepicker('setDate', 'today');					
				}
				if(daterangevalue == 4){
					var lastWeek = new Date(today.getFullYear(), today.getMonth(), today.getDate() - 30);
					$('#fromdate1').datepicker('setDate', lastWeek);
					$('#todate1').datepicker('setDate', 'today');
				}
				if(daterangevalue == 5){ 
					var firstDay = new Date(today.getFullYear(), today.getMonth(), 1);
					var lastDay = new Date(today.getFullYear(), today.getMonth() + 1, 0);					
					$('#fromdate1').datepicker('setDate', firstDay);
					$('#todate1').datepicker('setDate', lastDay);
				}
				if(daterangevalue == 6){ 
					var firstDay = new Date(today.getFullYear(), today.getMonth() - 1, 1);
					var lastDay = new Date(today.getFullYear(), today.getMonth(), 0);					
					$('#fromdate1').datepicker('setDate', firstDay);
					$('#todate1').datepicker('setDate', lastDay);
				}				
			});

			$('#searchclick1').click(function(){				
				var daterangevalue 	= $('#daterange1').val();
				var fromdate 		= $('#fromdate1').val();
				var todate 			= $('#todate1').val();

				var url = '<?php echo base_url().'admincontrol/newdashboard'; ?>';
				$('<form method="post" action="'+url+'"><input type="hidden" name="daterangevalueA" value="'+daterangevalue+'"><input type="hidden" name="fromdateA" value="'+fromdate+'"><input type="hidden" name="todateA" value="'+todate+'"><input type="hidden" name="searchtype" value="bannersearch"></form>').appendTo('body').submit();
			});
			
						
			$('#download1').click(function(){

				var	warehouse_staff = '<?php echo $warehouse_staff; ?>';
				var daterangevalue=$('#daterange1').val();
				var fromdate = $('#fromdate1').val();
				var todate = $('#todate1').val();
				// var activestatus = $('#activestatus').val();
				var activestatus = '0';

				// var filename = 'Advert_Summary';

				// var url = '<?php//  echo base_url().'assets/uploads/dashboardreport/'; ?>'+filename+''+'.csv'+'';
				$.ajax({					
					data: {fromdate: fromdate, todate: todate, activestatus: activestatus, warehouse_staff: warehouse_staff},
			        type: 'POST',
			        url: '<?php echo base_url().'common/index/download_newbanner'; ?>',
			        dataType: "text",  
         			cache:false,	            
		            success:function(data)
			        {
			        	url = '<?php  echo base_url().'assets/uploads/dashboardreport/'; ?>'+data+''+'.csv'+'';
			        	window.location.href = url;			        	
					 	console.log(data);
			        }
				});	
			});

		});


			var sixmonthgraph = $.parseJSON('<?php echo json_encode($sixmonthgraph); ?>');
			console.log(sixmonthgraph);			
		
			$(function(){
				knobchart();
				
				var xaxis = [], yaxis1 = [], yaxis2 = [];
				$(sixmonthgraph).each(function(i,v){
					$(v).each(function(ii,vv){
						xaxis.push(vv.month);
						yaxis1.push(vv.Engagements);					
					})
				})
				
				barchart(
					'sixmonthchart',
					{
						xaxis : xaxis,
						series : [
							{
								name : 'Engagements',
								yaxis : yaxis1,
								color : '#4472C4'
							}
						]
					}
				);

				var week1   = '<?php echo $week1; ?>';
			    var week2   = '<?php echo $week2; ?>';
			    var week3   = '<?php echo $week3; ?>';
			    var week4   = '<?php echo $week4; ?>';
			    console.log(week1+' '+week2+' '+week3+' '+week4);

				piechart(
					'weekschart',
					{
						name : 'weekschart',
						xaxis : [
							'Week 1',
							'Week 2',
							'Week 3',
							'Week 4'
						],
						yaxis : [
							{value : week1, name : 'Week 1'},
							{value : week2, name : 'Week 2'},
							{value : week3, name : 'Week 3'},
							{value : week4, name : 'Week 4'}
						],
						colors : ['#ff7f27','#b97a57','#3f48cc','#22b14c']				
					}
				);					
	    	});
		
</script>
<?php 
$mainsettings_id 					= isset($mainsettings['id']) ? $mainsettings['id'] : '';
$numberpost 						= isset($mainsettings['no_post']) ? $mainsettings['no_post'] : '';
$votes 								= isset($mainsettings['no_votes']) ? $mainsettings['no_votes'] : '';
$monthpost 							= isset($mainsettings['months_granted']) ? $mainsettings['months_granted'] : '';

?>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">Rate My Work Settings</h4>
						<p class="advertise_address"></p><br>
					</div>
					<div class="content">
						<form method="post" class="form1" enctype="multipart/form-data">
							<p class="subheading">Main Page Settings</p><br>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Number of posts to load at a time (Max 25 allowed):</label>								
										<input id="numberpost" name="numberpost" type="text" min="1" class="form-control" placeholder="Number of posts to load at a time" value="<?php echo $numberpost; ?>">
									</div>
								</div>
							</div>
							<p class="subheading">Hall of Fame qualification Settings</p><br>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Minimum number of votes required:</label>								
										<input id="votes" name="votes" type="text" class="form-control" min="1" placeholder="Minimum number of votes required" value="<?php echo $votes; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Months granted for posts to reach requirement:</label>								
										<input id="monthpost" name="monthpost" type="text" min="1" class="form-control" placeholder="Months granted for posts to reach requirement" value="<?php echo $monthpost; ?>">
									</div>
								</div>
							</div>
							<input id="mainsettings_id" name="mainsettings_id" type="hidden" class="form-control" value="<?php echo $mainsettings_id;  ?>">
							<input id="formtype" name="formtype" type="hidden" class="form-control" value="ratemyworksettings">
						</form>

						<p class="subheading">Tag Settings</p><br>

						<div class="content table-responsive table-full-width">						
							<table class="table table-hover table-striped">
								<thead>
									<th>S.No</th>
									<th>Tag Name</th>
									<th>Actions</th>
								</thead>
								<tbody>
							<?php 
								$i=1;
								foreach($tagdata as $row){
							?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row['tag_name']; ?></td>
										<!-- <td><?php// echo $this->config->item('enabledisable')[$row['status']]; ?></td> -->
										<?php if (isset($permission) && ($permission =='1')) { ?>
										<?php if($row['status']=='0'){ ?>
											<td><a href="javascript:void(0)" data-id ="<?php echo $row['id']; ?>" data-status ="1" class="tagstatus">Enable</a></td>
										<?php }else{ ?>
											<td><a href="javascript:void(0)" data-id ="<?php echo $row['id']; ?>" data-status ="0" class="tagstatus">Disable</a></td>
										<?php } ?>			
										<?php }else{ ?>
											<td></td>
										<?php } ?>			
										
									</tr>
							<?php 
								$i++;
								}
							?>
								</tbody>
							</table>
					</div>

						<form method="post" class="form2" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Tag Name</label>								
										<input id="tagname" name="tagname" type="text" class="form-control" placeholder="Tag Name">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<?php if (isset($permission) && ($permission =='1')) { ?>
										<button type="button" id="addtag-btn" class="btn btn-info btn-fill pull-left">Add Tag</button>
									<?php } ?>
								</div>
							</div>
						</form>

						<p class="subheading">Report Settings</p><br>

						<div class="content table-responsive table-full-width">						
							<table class="table table-hover table-striped">
								<thead>
									<th>S.No</th>
									<th>Report Reason</th>
									<th>Actions</th>
								</thead>
								<tbody>
							<?php 
								$i=1;
								foreach($reportdata as $row1){
							?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row1['report_name']; ?></td>
										<!-- <td><?php// echo $this->config->item('enabledisable')[$row['status']]; ?></td> -->
										<?php if (isset($permission) && ($permission =='1')) { ?>
										<?php if($row1['status']=='0'){ ?>
											<td><a href="javascript:void(0)" data-id ="<?php echo $row1['id']; ?>" data-status ="1" class="reasonstatus">Enable</a></td>
										<?php }else{ ?>
											<td><a href="javascript:void(0)" data-id ="<?php echo $row1['id']; ?>" data-status ="0" class="reasonstatus">Disable</a></td>
										<?php } ?>
										<?php }else{ ?>
											<td></td>
										<?php } ?>							
										
									</tr>
							<?php 
								$i++;
								}
							?>
								</tbody>
							</table>
					</div>

						<form method="post" class="form3" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Report Reason</label>								
										<input id="reportname" name="reportname" type="text" class="form-control" placeholder="Report Name">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<?php if (isset($permission) && ($permission =='1')) { ?>
									<button type="button" id="addreport-btn" class="btn btn-info btn-fill pull-left">Add Reason</button>
									<?php } ?>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>			
		</div>
	</div>
</div>

<script type="text/javascript">
    $(function(){
    	validation(
			'.form1',
			{				
				numberpost : {
					required	: true,
					min 		: 1,
					max 		: 24
				},
				votes : {
					required	: true,
					min 		: 1
				},
				monthpost : {
					required	: true,
					min 		: 1
				},
			},
			{
				numberpost 	: {
					required	: "Number of posts to load at a time is required.",
					min			: "Please enter a value greater than or equal to 1.",
					max			: "Please enter a value less than or equal to 25.",
				},
				votes 	: {
					required	: "Minimum number of votes is required.",
					min			: "Please enter a value greater than or equal to 1.",
				},
				monthpost : {
					required	: "Months granted for posts to reach requirement is required.",
					min			: "Please enter a value greater than or equal to 1.",
				},		
			},
			[],'1'
		);

		validation(
			'.form2',
			{				
				tagname : {
					required	: true,
					maxlength	: 25,
				},
			},
			{
				tagname 	: {
					required	: "Tag name is required.",
					maxlength	: "Please enter less than 25 characters.",
				},
			},
			[],'1'
		);

		validation(
			'.form3',
			{				
				reportname : {
					required	: true,
					maxlength	: 25,
				},
			},
			{
				reportname 	: {
					required	: "Report name is required.",
					maxlength	: "Please enter less than 25 characters.",
				},
			},
			[],'1'
		);

		numberonly('#numberpost, #votes, #monthpost');


		$('#numberpost, #votes, #monthpost').keyup(function(){
			$('.form1').valid();
			if ($('.form1').valid()==true) {
				var form_data = new FormData();
				form_data.append("mainsettingsid", $('#mainsettings_id').val());
		        form_data.append("numberpost", $('#numberpost').val());
		        form_data.append("votes", $('#votes').val());
		        form_data.append("monthpost", $('#monthpost').val());

		        $.ajax({
		      	data: form_data,
		        type: 'POST',
		        url: '<?php echo base_url().'ajax/index/settingsAction'; ?>',
		        contentType: false,  
	            cache: false,  
	            processData:false,
	            beforeSend:function(){
	            	$('.modalloader').removeClass('displaynone');
		          	$('.modalloader').html('<img src="<?php echo base_url().'icons/ajax-loader.gif'; ?>"/>');
		        },
	            success:function(data)
		        {
		        	$('.modalloader').addClass('displaynone');
		        	if (data =='1') {
		        		sweetalertautoclose('Rate my work saved successfully.');
		        		location.reload();
		        	}else{
		        		sweetalertautoclose('Something went wrong please try again!');
		        	}
				 	console.log(data);
		        }
		      });
			}
		})

		$('#addtag-btn').click(function(){
			$('.form2').valid();
			if ($('.form2').valid()==true) {
				var form_data = new FormData();
				form_data.append("tagname", $('#tagname').val());

		        $.ajax({
		      	data: form_data,
		        type: 'POST',
		        url: '<?php echo base_url().'ajax/index/tagAction'; ?>',
		        contentType: false,  
	            cache: false,  
	            processData:false,
	            beforeSend:function(){
	            	$('.modalloader').removeClass('displaynone');
		          	$('.modalloader').html('<img src="<?php echo base_url().'icons/ajax-loader.gif'; ?>"/>');
		        },
	            success:function(data)
		        {
		        	$('.modalloader').addClass('displaynone');
		        	if (data =='1') {
		        		sweetalertautoclose('Tag saved successfully.');
		        		location.reload();
		        	}else{
		        		sweetalertautoclose('Something went wrong please try again!');
		        	}
				 	console.log(data);
		        }
		      });
			}
		});


		$('.tagstatus').click(function(){
			
			var tagid 	= $(this).attr('data-id');
			var status 	= $(this).attr('data-status');
			// alert(status);
			if (status =='1') {
				var msg = 'enable';
			}else{
				var msg = 'disable';
			}
			if(confirm("Are you sure You want to "+msg)){
				var form_data = new FormData();
				form_data.append("tagid", tagid);
				form_data.append("status", status);

				$.ajax({
		      	data: form_data,
		        type: 'POST',
		        url: '<?php echo base_url().'ajax/index/tagchangeStatus'; ?>',
		        contentType: false,  
	            cache: false,  
	            processData:false,
	            beforeSend:function(){
	            	$('.modalloader').removeClass('displaynone');
		          	$('.modalloader').html('<img src="<?php echo base_url().'icons/ajax-loader.gif'; ?>"/>');
		        },
	            success:function(data)
		        {
		        	$('.modalloader').addClass('displaynone');
		        	if (data =='1') {
		        		sweetalertautoclose('Tag '+msg+'d successfully.');
		        		location.reload();
		        	}else{
		        		sweetalertautoclose('Something went wrong please try again!');
		        	}
				 	console.log(data);
		        }
		      });
				
			}
		});

		$('#addreport-btn').click(function(){
			$('.form3').valid();
			if ($('.form3').valid()==true) {
				var form_data = new FormData();
				form_data.append("reportname", $('#reportname').val());

		        $.ajax({
		      	data: form_data,
		        type: 'POST',
		        url: '<?php echo base_url().'ajax/index/reportAction'; ?>',
		        contentType: false,  
	            cache: false,  
	            processData:false,
	            beforeSend:function(){
	            	$('.modalloader').removeClass('displaynone');
		          	$('.modalloader').html('<img src="<?php echo base_url().'icons/ajax-loader.gif'; ?>"/>');
		        },
	            success:function(data)
		        {
		        	$('.modalloader').addClass('displaynone');
		        	if (data =='1') {
		        		sweetalertautoclose('Report saved successfully.');
		        		location.reload();
		        	}else{
		        		sweetalertautoclose('Something went wrong please try again!');
		        	}
				 	console.log(data);
		        }
		      });
			}
		});


		$('.reasonstatus').click(function(){
			
			var reportid 	= $(this).attr('data-id');
			var status 		= $(this).attr('data-status');
			// alert(status);
			if (status =='1') {
				var msg = 'enable';
			}else{
				var msg = 'disable';
			}
			if(confirm("Are you sure You want to "+msg)){
				var form_data = new FormData();
				form_data.append("reportid", reportid);
				form_data.append("status", status);

				$.ajax({
		      	data: form_data,
		        type: 'POST',
		        url: '<?php echo base_url().'ajax/index/reportchangeStatus'; ?>',
		        contentType: false,  
	            cache: false,  
	            processData:false,
	            beforeSend:function(){
	            	$('.modalloader').removeClass('displaynone');
		          	$('.modalloader').html('<img src="<?php echo base_url().'icons/ajax-loader.gif'; ?>"/>');
		        },
	            success:function(data)
		        {
		        	$('.modalloader').addClass('displaynone');
		        	if (data =='1') {
		        		sweetalertautoclose('Report '+msg+'d successfully.');
		        		location.reload();
		        	}else{
		        		sweetalertautoclose('Something went wrong please try again!');
		        	}
				 	console.log(data);
		        }
		      });
				
			}
		});

    });
</script>
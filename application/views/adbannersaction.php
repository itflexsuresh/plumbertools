<?php
// echo "<pre>"; print_r($pagesdata); die();
if (isset($getdata) && $getdata) {
    $id                = $getdata['id'];
    $campaign_status   = (set_value('campaign_status')) ? set_value('campaign_status') : $getdata['campaign_status'];
    $reason            = (set_value('reason')) ? set_value('reason') : $getdata['reason'];
    $start_date        = (set_value('start_date')) ? set_value('start_date') : date("m/d/Y", strtotime($getdata['start_date']));
    $end_date          = (set_value('end_date')) ? set_value('end_date') : date("m/d/Y", strtotime($getdata['end_date']));
    $advert_type       = (set_value('advert_type')) ? set_value('advert_type') : $getdata['advert_type'];
    $level             = (set_value('level')) ? set_value('level') : $getdata['level'];
    $page_id           = (set_value('page_id')) ? set_value('page_id') : $getdata['page_id'];
    $client_name       = (set_value('client_name')) ? set_value('client_name') : $getdata['client_name'];
    $description       = (set_value('description')) ? set_value('description') : $getdata['description'];
    $impressions       = (set_value('impressions')) ? set_value('impressions') : $getdata['impressions'];
    $impressions_count = (set_value('impressions_count')) ? set_value('impressions_count') : $getdata['count_impressions'];
    $clicks            = (set_value('clicks')) ? set_value('clicks') : $getdata['clicks'];
    $url               = (set_value('url')) ? set_value('url') : $getdata['url'];
    $file_type         = (set_value('file_type')) ? set_value('file_type') : $getdata['file_type'];
    $autoplay_video    = (set_value('autoplay_video')) ? set_value('autoplay_video') : $getdata['autoplay_video'];
    $client_id 		   = (set_value('client_id')) ? set_value('client_id') : $getdata['client_id'];

    $heading = 'Update';
    $btnvlue = 'Update';
    $readonly = true;
} else {
    $id                = '';
    $campaign_status   = 1;
    $reason            = set_value('reason');
    $start_date        = date("m/d/Y", strtotime($fromdate));
    $end_date          = date("m/d/Y", strtotime($todate));
    $advert_type       = 0;
    $level             = 'Level 1';
    $page_id           = 1;
    $client_name       = set_value('client_name');
    $description       = set_value('description');
    $impressions       = 0;
    $impressions_count = 0;
    $clicks            = 0;
    $url               = set_value('url');
    $file_type         = 'Video';
    $autoplay_video    = 0;
    $client_id = '';

    $heading = 'Add New';
    $btnvlue = 'Save';
    $readonly = false;
}

if($campaign_status != 2){
	$reason = '' ;
}
		 	
if($advert_type == 2){
	$level = '';
}else{
	$page_id = 1;
}

$filepath  = base_url() . 'images/';
$pdfimg    = base_url() . 'images/pdf.png';
$videoimg  = base_url() . 'images/video.png';
$uploadimg = base_url() . 'icons/upload.png';

$detailsidD_video  = $detailsidD_image  = $uploadimg;
$detailsurlD_video = $detailsurlD_image = 'javascript:void(0)';
$details_media_url = isset($getdata['file']) ? $getdata['file'] : '';
$details_media     = (isset($getdata['file']) && $getdata['file'] != '') ? $filepath . $getdata['file'] : $uploadimg;

if ($file_type == 'Video') {
    if ($details_media_url != '') {
        $explodefileD      = explode('.', $details_media_url);
        $extfileD          = array_pop($explodefileD);
        $detailsidD_video  = (in_array($extfileD, ['mp4'])) ? $videoimg : $details_media;
        $detailsurlD_video = $details_media;
    } else {
        $detailsidD_video  = $uploadimg;
        $detailsurlD_video = 'javascript:void(0)';
    }
} elseif ($file_type == 'Image') {
    if ($details_media_url != '') {
        $explodefileD      = explode('.', $details_media_url);
        $extfileD          = array_pop($explodefileD);
        $detailsidD_image  = (in_array($extfileD, ['pdf', 'tiff'])) ? $pdfimg : $details_media;
        $detailsurlD_image = $details_media;
    } else {
        $detailsidD_image  = $uploadimg;
        $detailsurlD_image = 'javascript:void(0)';
    }
}

// echo $autoplay_video; die();
?>
<link href="<?php echo base_url();?>assets/plugins/select2/select2.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<style type="text/css">
	label.choose_file {
		background-color: #019cde;
		padding: 4px 14px 4px 14px;
		color: #fff;
		font-size: 14px;
		border-radius: 5px;
		cursor: pointer; 
		margin-top: 10px;
	}
	input#file_image, input#file_2, input#file_audio, input#file_video {
    	display: none;
	}
</style>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title"><?php echo $heading; ?> Advertisement</h4>						
					</div>
					<div class="content">
						<form method="post" name="form1" class="form1" enctype="multipart/form-data">
							<p class="subheading">Campaign Status</p>
							<div class="row">
								<div class="col-md-6 rdo--btns">
									<div class="form-group">
										<label>Active</label>
										<input name="c_status" type="radio" id="Active-radio" class="custom-control-input selecttype" placeholder="Active" <?php if($campaign_status == 1){ echo "checked='checked'"; } ?> value="1">
									</div>									
									<div class="form-group">
										<label>Inactive</label>
										<input name="c_status" type="radio" id="Inactive-radio" class="custom-control-input selecttype" placeholder="Inactive" <?php if($campaign_status == 0){ echo "checked='checked'"; } ?> value="0">
									</div>
									<div class="form-group">
										<label>Suspend</label>
										<input name="c_status" type="radio" id="Suspend-radio" class="custom-control-input selecttype" placeholder="Suspend" <?php if($campaign_status == 2){ echo "checked='checked'"; } ?> value="2">
									</div>
								</div>
							</div>

							<div class="row" id="reasonhide">								
								<div class="col-md-6">
									<div class="form-group">
										<label>Reason for Suspension</label>										
										<input name="reason" id="reason" type="text" class="form-control" placeholder="Reason for Suspension" value="<?php echo $reason; ?>">										
									</div>
								</div>
							</div>
							
							<p class="subheading">Advert Type</p>
							<div class="row">
								<?php
								if($readonly){
								?>
								<input type="hidden" name="advert_type" value="<?php echo $advert_type; ?>">
								<?php
								}
								?>
								<div class="col-md-6 rdo--btns">
									<div class="form-group">
										<label>Header Advert</label>
										<input name="advert_type" type="radio" id="Header-radio" class="custom-control-input selecttype1" placeholder="Header" <?php if($advert_type == 0){ echo "checked='checked'"; } ?> value="0" <?php if($readonly){ echo "disabled='disabled'"; } ?>>
									</div>									
									<div class="form-group">
										<label>Article Advert</label>
										<input name="advert_type" type="radio" id="Advert-radio" class="custom-control-input selecttype1" placeholder="Advert" <?php if($advert_type == 1){ echo "checked='checked'"; } ?> value="1" <?php if($readonly){ echo "disabled='disabled'"; } ?>>
									</div>
									<div class="form-group">
										<label>Banner</label>
										<input name="advert_type" type="radio" id="Banner-radio" class="custom-control-input selecttype1" placeholder="Banner" <?php if($advert_type == 2){ echo "checked='checked'"; } ?> value="2" <?php if($readonly){ echo "disabled='disabled'"; } ?>>
									</div>
								</div>
							</div>

							<div class="row" id="hidetobanner">
								<div class="col-md-6">
									<div class="form-group">
										<label>Level</label>&emsp;
										<select name="level" id="level">											
											<option value="Level 1" <?php if($level == 'Level 1') { ?> selected <?php } ?>>Level 1</option>
											<option value="Level 2" <?php if($level == 'Level 2') { ?> selected <?php } ?>>Level 2</option>
										</select>				
									</div>
								</div>
							</div>

							<div class="row" id="showtobanner">
								<div class="col-md-6">
									<div class="form-group">
										<label>Page</label>&emsp;
										<select name="pages" id="pages">											
											<?php foreach($pagesdata as $row1){
												?>
												<option value="<?php echo $row1['id']; ?>" <?php if($row1['id'] == $page_id) { ?> selected <?php } ?>><?php echo $row1['title']; ?></option>
											<?php } ?>
										</select>			
									</div>
								</div>
							</div>							

							<div class="row">
								<div class="col-md-12 rdo--btns">
									<input type="hidden" name="TodayDate" id="TodayDate" class="TodayDate" value="<?php echo date('m/d/Y', strtotime("-1 days")); ?>">
									<div class="form-group">
										<label>Start Date of Campaign</label>
										<input type="text" name="fromdate" id="fromdate" placeholder="mm/dd/yyyy" value="<?php echo $start_date ?>">
									</div>
									<div class="form-group">
										<label>End Date of Campaign</label>										
										<input type="text" name="todate" id="todate" placeholder="mm/dd/yyyy" value="<?php echo $end_date; ?>">										
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Client Name</label>
										<select name="client_name" id="client_name" class="form-control client_name">	
											<?php foreach($client_name_list as $row2){?>
												<option value="<?php echo $row2['id']; ?>" <?php if($row2['id'] == $client_id) { ?> selected <?php } ?>><?php echo $row2['client_name']; ?></option>
											<?php } ?>
										</select>											
									</div>								
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<br>
										<a href="<?php echo base_url().'admincontrol/clients'; ?>" target="_blank">
											<button type="button" class="btn btn-info btn-fill">Add New Client</button>
										</a>
									</div>										
								</div>
							</div>

							<div class="row">								
								<div class="col-md-6">
									<div class="form-group">
										<label>Campaign Name / Description</label>										
										<input name="description" id="description" type="text" class="form-control" placeholder="Campaign Name / Description" value="<?php echo $description; ?>">	
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Total Impression Count</label>
										<input type="number" class="form-control" name="totalimpression" id="totalimpression" placeholder="Total Impression Count" value="<?php echo $impressions_count; ?>" disabled>
									</div>									
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">									
									<div class="form-group">
										<label>Impressions</label>										
										<input type="number" class="form-control" name="impression" id="impression" placeholder="Impressions" value="<?php echo $impressions; ?>" step=100>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>URL</label>
										<input name="url" id="url" type="text" class="form-control" placeholder="https://www.pirb.co.za/" value="<?php echo $url; ?>">
									</div>
									<small>(Example URL format - https://www.pirb.co.za/)</small>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6 rdo--btns">
									<div class="form-group">
										<label>Video</label>
										<input name="media" type="radio" id="video-radio" class="custom-control-input selecttype2" placeholder="Video" <?php if($file_type == 'Video'){ echo "checked='checked'"; } ?> value="1" checked>
									</div>
									<div class="form-group">
										<label>Image</label>
										<input name="media" type="radio" id="image-radio" class="custom-control-input selecttype2" placeholder="Image" <?php if($file_type == 'Image'){ echo "checked='checked'"; } ?> value="2">
									</div>
								</div>
							</div>

							<div class="row" id="videoshow">
								<div class="col-md-4 add_top_value">
									<label>Video</label>																		
									<div class="form-group">
										<div>
											<a href="<?php echo $detailsurlD_video; ?>" target="_blank"><img src="<?php echo $detailsidD_video; ?>" class="document_image2" width="100"></a>
										</div>
										<input type="file" id="file_video" class="document_file2">								
										<label for="file_video" class="choose_file">Choose File</label>										
										<input type="hidden" name="video" class="document2 percentageslide" value="<?php echo $details_media_url; ?>">
										<small>(Supported file format is mp4)</small>
									</div>
									<small>(Video should not be longer than 10 sec)</small>
									<label>Auto play Video</label>										
									<input name="autoplay_video" id="autoplay_video" class="autoplay_video" type="checkbox" <?php if($autoplay_video == 1){ echo "checked='checked'"; } ?>>
								</div>
							</div>
							
							<div class="row" id="imageshow">
								<div class="col-md-4 add_top_value">
									<label>Image</label>
									<div class="form-group">
										<div>
											<a href="<?php echo $detailsurlD_image; ?>" target="_blank"><img src="<?php echo $detailsidD_image; ?>" class="document_image1" width="100"></a>
										</div>
										<input type="file" id="file_image" class="document_file1">
										<small>(Supported file format are jpg, gif, jpeg, png, tiff)</small>
										<label for="file_image" class="choose_file">Choose File</label>										
										<input type="hidden" name="image" class="document1 percentageslide" value="<?php echo $details_media_url; ?>">
									</div>									
								</div>
							</div>

							<br>
							<div>
								<?php if (isset($permission) && ($permission =='1')) { ?>								
								<input name="id" type="hidden" value="<?php echo $id; ?>">
								<button type="submit" id="store" class="btn btn-info btn-fill pull-left"><?php echo $btnvlue; ?></button>
								<?php } ?>
							</div>
							
							<a href="<?php echo base_url();?>admincontrol/adbanners"><button type="button" class="btn btn-warning btn-fill pull-left">Back</button></a>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url();?>assets/plugins/select2/select2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript">
		 $(function () {
		 	select2('#client_name');		
		 	var campaign_status = '<?php echo $campaign_status; ?>';

		 	if(campaign_status == 2){
		 		$('#reasonhide').show(); 
		 	}else{
		 		$('#reasonhide').hide(); 
		 	}

		 	var advert_type 	= '<?php echo $advert_type; ?>';
		 	
		 	if(advert_type == 2){
		 		$('#hidetobanner').hide();
				$('#showtobanner').show();		 		
		 	}else{
		 		$('#hidetobanner').show();
				$('#showtobanner').hide();
		 	}

		 	var file_type = '<?php echo $file_type; ?>';			

			if(file_type == 'Video'){				
				$('#videoshow').show();
				$('#imageshow').hide();
			}else if(file_type == 'Image'){				
				$('#videoshow').hide();
				$('#imageshow').show();
			}
		 			 	
			var filepath 	= '<?php echo $filepath; ?>';
			var pdfimg		= '<?php echo $pdfimg; ?>';			
			var videoimg	= '<?php echo $videoimg; ?>';	
			var videosec	= 10;									

			fileupload([".document_file1", "./images/", ['jpg','gif','jpeg','png','tiff']], ['.document1', '.document_image1', filepath, pdfimg]);

	    	// fileupload([".document_file2", "./images/", ['mp4']], ['.document2', '.document_image2', filepath, videoimg]);
	    	fileuploadvideo([".document_file2", "./images/", ['mp4'], videosec], ['.document2', '.document_image2', filepath, videoimg]);

		 	var date = new Date();
		 	var fromdate = '<?php echo $start_date; ?>';
		 	var todate = '<?php echo $end_date; ?>';
		 	
		 	// $('#todate').datepicker('setStartDate', fromdate);	 	 		

			$("#fromdate").datepicker({
		        startDate: date,
		    }).on('changeDate', function (selected) {
		        var minDate = new Date(selected.date.valueOf());
		        $('#todate').datepicker('setStartDate', minDate);
		    });
		    
		    $("#todate").datepicker({
		        startDate: date,
		    }).on('changeDate', function (selected) {
				var minDate = new Date(selected.date.valueOf());
				$('#fromdate').datepicker('setEndDate', minDate);
			});

			$("#client_name").autocomplete({
		        source: "<?php echo base_url().'admincontrol/autocomplete_clients'; ?>",
		        /*select: function( event, ui ) {
		            event.preventDefault();
		            $("#client_name").val(ui.item.value);
		            $("#client_hide").val(ui.item.id);
		        }*/
		        change: function(event, ui) {		        	
			        if (ui.item == null) {
			          	$(this).val("");
                		return false;
			        }else{
			        	$("#client_name").val(ui.item.value);
		            	$("#client_hide").val(ui.item.id);
			        }
			    }
		    });

		    $('#Suspend-radio').click(function(){
				$('#reasonhide').show();					
			});

			$('#Active-radio').click(function(){
				$('#reasonhide').hide();
				/*var newdate= (date.getMonth() + 1) + '/' + date.getDate() + '/' +  date.getFullYear();
				var enddate = $('#todate').val();
				console.log(enddate+ ', '+newdate);
				if(enddate > date){
					console.log('true');
				}else{
					console.log('false');
					$("#Inactive-radio").attr('checked', 'checked');
				}*/
			});

			$('#Inactive-radio').click(function(){
				$('#reasonhide').hide();
			});


			$('#Header-radio').click(function(){
				$('#hidetobanner').show();
				$('#showtobanner').hide();			
			});

			$('#Advert-radio').click(function(){
				$('#hidetobanner').show();
				$('#showtobanner').hide();
			});

			$('#Banner-radio').click(function(){
				$('#hidetobanner').hide();
				$('#showtobanner').show();
			});


			$('#video-radio').click(function(){				
				$('#videoshow').show();
				$('#imageshow').hide();
			});

			$('#image-radio').click(function(){				
				$('#videoshow').hide();
				$('#imageshow').show();
			});

			jQuery.validator.addMethod("greaterThan", 
			function(value, element, params) {
				
			    if (!/Invalid|NaN/.test(new Date(value))) {
			        return new Date(value) > new Date($(params).val());
			    }

			    return isNaN(value) && isNaN($(params).val()) 
			        || (Number(value) > Number($(params).val())); 
			},'Must be greater than or equal to current date.'); 

			validation(
				'.form1',
				{				
					reason : {
						required	: '.selecttype[value="2"]:checked',				
					},
					client_name : {
						required	: true,					
					},
					description : {
						required	: true,					
					},
					url : {
						required	: true,
						url 		: true,
					},
					image : {
						required	: '.selecttype2[value="2"]:checked', //Image						
					},
					video : {
						required	: '.selecttype2[value="1"]:checked', //Video
					},					
					todate : {						
						greaterThan: "#TodayDate",
					},					
				},
				{
					reason 	: {
						required	: "Reason is required.",
					},
					client_name 	: {
						required	: "Client Name is required.",
					},
					description 	: {
						required	: "Campaign Name / Description is required.",
					},	
					url 	: {
						required	: "URL is required.",
					},											
					image 	: {
						required	: "Image is required.",
					},
					video 	: {
						required	: "Video is required.",
					},
				},						
				{					
					ignore: "input[type='text']:hidden",
				}		
			);	


		 });

</script>
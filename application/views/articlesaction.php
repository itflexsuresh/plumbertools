<?php
if (isset($getdata) && $getdata) {
    $id = $getdata['id'];
    if (!empty($getdata['end_date']) && $getdata['end_date'] != null) {
        $end_date = (set_value('end_date')) ? set_value('end_date') : date("m/d/Y", strtotime($getdata['end_date']));
    } else {
        $end_date = null;
    }
    $published         = (set_value('published')) ? set_value('published') : $getdata['published'];
    $start_date        = (set_value('start_date')) ? set_value('start_date') : date("m/d/Y", strtotime($getdata['start_date']));
    $title             = (set_value('title')) ? set_value('title') : $getdata['title'];
    $description       = (set_value('description')) ? set_value('description') : $getdata['description'];
    $position          = (set_value('position')) ? set_value('position') : $getdata['position'];
    $details_level1    = (set_value('details_level1')) ? set_value('details_level1') : $getdata['details_level1'];
    $details_level2    = (set_value('details_level2')) ? set_value('details_level2') : $getdata['details_level2'];
    $sections_headersD = (set_value('sections_headers')) ? set_value('sections_headers') : $getdata['sections_headers'];
    $tags              = (set_value('tags')) ? set_value('tags') : $getdata['tags'];
    $detail_file_type  = (set_value('detail_file_type')) ? set_value('detail_file_type') : $getdata['detail_file_type'];
    $writers_name      = (set_value('writers_name')) ? set_value('writers_name') : $getdata['writers_name'];    
    $as_per_front_audioimg  = (set_value('as_per_front_audioimg')) ? set_value('as_per_front_audioimg') : $getdata['as_per_front_audioimg'];

    $heading = 'Update';
    $btnvlue = 'Update';
} else {
    $id                = '';
    $published         = 1;
    $start_date        = date("m/d/Y", strtotime($fromdate));
    $end_date          = null;
    $title             = set_value('title');
    $description       = set_value('description');
    $position          = 1;
    $details_level1    = set_value('details_level1');
    $details_level2    = set_value('details_level2');
    $sections_headersD = set_value('sections_headers');
    $tags              = set_value('tags');
    $writers_name      = set_value('writers_name');    
    $detail_file_type  = 'Audio';
    $as_per_front_audioimg = 1;

    $heading = 'Add New';
    $btnvlue = 'Save';
}

$last_position = $last_pos;
if ($last_position == 0) {
	$last_position = 1;
}

$sections_headersD = explode(",", $sections_headersD);

$file = isset($getdata['file']) ? $getdata['file'] : '';
$file_thumb = isset($getdata['file_thumb']) ? $getdata['file_thumb'] : '';

$filepath  = base_url() . 'images/';
$filepath1 = (isset($getdata['file']) && $getdata['file'] != '') ? $filepath . $getdata['file'] : base_url() . 'icons/upload.png';

$pdfimg    = base_url() . 'images/pdf.png';
$audioimg  = base_url() . 'images/audio.png';
$videoimg  = base_url() . 'images/video.png';
$uploadimg = base_url() . 'icons/upload.png';

if ($file != '') {
    $explodefile2 = explode('.', $file);
    $extfile2     = array_pop($explodefile2);
    $photoidimg   = (in_array($extfile2, ['pdf', 'tiff'])) ? $pdfimg : $filepath1;
    $photoidurl   = $filepath1;
} else {
    $photoidimg = $uploadimg;
    $photoidurl = 'javascript:void(0)';
}

$detailsidD_audio  = $detailsidD_video  = $detailsidD_image  = $detailsidD_audioimage = $uploadimg;
$detailsurlD_audio = $detailsurlD_video = $detailsurlD_image = $detailsurlD_audioimage = 'javascript:void(0)';
$details_media_url = isset($getdata['detail_file']) ? $getdata['detail_file'] : '';
$details_media     = (isset($getdata['detail_file']) && $getdata['detail_file'] != '') ? $filepath . $getdata['detail_file'] : $uploadimg;

$as_per_front_img = 1;

if ($detail_file_type == 'Audio') {    
    if ($details_media_url != '') {
        $explodefileD      = explode('.', $details_media_url);
        $extfileD          = array_pop($explodefileD);
        $detailsidD_audio  = (in_array($extfileD, ['mp3'])) ? $audioimg : $details_media;
        $detailsurlD_audio = $details_media;
    } else {
        $detailsidD_audio  = $uploadimg;
        $detailsurlD_audio = 'javascript:void(0)';
    }

    $details_audioimageurl = isset($getdata['audio_image']) ? $getdata['audio_image'] : '';
	$details_audioimage    = (isset($getdata['audio_image']) && $getdata['audio_image'] != '') ? $filepath . $getdata['audio_image'] : $uploadimg;
    
    if($as_per_front_audioimg == 0){		
	    if ($details_audioimageurl != '') {
	        $explodefileimg      = explode('.', $details_audioimageurl);
	        $extfileimg        = array_pop($explodefileimg);
	        $detailsidD_audioimage  = (in_array($extfileimg, ['pdf', 'tiff'])) ? $pdfimg : $details_audioimage;
	        $detailsurlD_audioimage = $details_audioimage;
	    } else {
	        $detailsidD_audioimage  = $uploadimg;
	        $detailsurlD_audioimage = 'javascript:void(0)';
	    }
	}elseif($as_per_front_audioimg == 1){
		$details_audioimageurl = '';
		$detailsidD_audioimage  = $uploadimg;
		$detailsurlD_audioimage = 'javascript:void(0)';
	}	
} elseif ($detail_file_type == 'Video') {    
    if ($details_media_url != '') {
        $explodefileD      = explode('.', $details_media_url);
        $extfileD          = array_pop($explodefileD);
        $detailsidD_video  = (in_array($extfileD, ['mp4'])) ? $videoimg : $details_media;
        $detailsurlD_video = $details_media;
    } else {
        $detailsidD_video  = $uploadimg;
        $detailsurlD_video = 'javascript:void(0)';
    }    
} elseif ($detail_file_type == 'Image') {
	$as_per_front_img  = (set_value('as_per_front_img')) ? set_value('as_per_front_img') : $getdata['as_per_front_img'];
	if($as_per_front_img == 0){		
	    if ($details_media_url != '') {
	        $explodefileD      = explode('.', $details_media_url);
	        $extfileD          = array_pop($explodefileD);
	        $detailsidD_image  = (in_array($extfileD, ['pdf', 'tiff'])) ? $pdfimg : $details_media;
	        $detailsurlD_image = $details_media;
	    } else {
	        $detailsidD_image  = $uploadimg;
	        $detailsurlD_image = 'javascript:void(0)';
	    }
	}elseif($as_per_front_img == 1){
		$details_media_url = '';
		$detailsidD_image  = $uploadimg;
		$detailsurlD_image = 'javascript:void(0)';
	}       
}

?>
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
	input#file_image, input#file_2, input#file_audio, input#file_video, input#file_audioimage {
    	display: none;
	}
</style>
<link href="<?php echo base_url(); ?>assets/plugins/tagmanager/amsify.suggestags.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/tagmanager/jquery.amsify.suggestags.js"></script>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title"><?php echo $heading; ?> Article</h4>						
					</div>
					<div class="content">
						<form method="post" name="form1" class="form1" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Published</label>										
										<input name="publishid" id="publishid" class="published" type="checkbox"
										<?php if($published == 1) echo 'checked="checked"'; ?>>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 rdo--btns">
									<input type="hidden" name="TodayDate" id="TodayDate" class="TodayDate" value="<?php echo date('m/d/Y', strtotime("-1 days")); ?>">
									<div class="form-group">
										<label>Publish Start Date</label>
										<input type="text" name="fromdate" id="fromdate" placeholder="mm/dd/yyyy" value="<?php echo $start_date ?>">
									</div>
									<div class="form-group">
										<label>Publish End Date</label>										
										<input type="text" name="todate" id="todate" placeholder="mm/dd/yyyy" value="<?php echo $end_date; ?>">										
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Title</label>
										<input name="title" id="title" type="text" class="form-control" placeholder="Title" value="<?php echo $title; ?>">				
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Description</label>										
										<input name="description" id="description" type="text" class="form-control" placeholder="Description" value="<?php echo $description; ?>">										
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 add_top_value">
									<label>Image</label>									
									<div class="form-group">
										<div>
											<a href="<?php echo $photoidurl; ?>" target="_blank"><img src="<?php echo $photoidimg; ?>" class="document_image" width="100"></a>
										</div>
										<input type="file" id="file_2" class="document_file">	
										<small>(Supported file format are jpg, gif, jpeg, png, tiff)</small>
										<label for="file_2" class="choose_file">Choose File</label>									
										<input type="hidden" id="image1" name="image1" class="document percentageslide" value="<?php echo $file; ?>">	
										<input type="hidden" id="image1thumb" name="image1thumb" class="documentthumb percentageslide" value="<?php echo $file_thumb; ?>">
									</div>									
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Position</label>										
										<input name="position" id="position" type="number" class="form-control" placeholder="Position" min="1" max="<?php echo $last_position; ?>" value="<?php echo $position; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Writers Name</label>
										<input type="hidden" id="writers_hide" name="writers_hide">
										<input name="writers_name" id="writers_name" type="text" class="form-control" placeholder="Type the Writers Name here" value="<?php echo $writers_name; ?>">				
									</div>									
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<br>
										<a href="<?php echo base_url().'admincontrol/writers'; ?>" target="_blank">
											<button type="button" class="btn btn-info btn-fill">Add New Writers</button>
										</a>
									</div>
								</div>
							</div>

							<br><p class="subheading">Article Details</p>
							<div class="row">
								<div class="col-md-6 rdo--btns">
									<div class="form-group">
										<label>Audio</label>
										<input name="selecttype" type="radio" id="audio-radio" class="custom-control-input selecttype" placeholder="Audio" <?php if($detail_file_type == 'Audio'){ echo "checked='checked'"; } ?> value="1">
									</div>									
									<div class="form-group">
										<label>Video</label>
										<input name="selecttype" type="radio" id="video-radio" class="custom-control-input selecttype" placeholder="Video" <?php if($detail_file_type == 'Video'){ echo "checked='checked'"; } ?> value="2">
									</div>
									<div class="form-group">
										<label>Image</label>
										<input name="selecttype" type="radio" id="image-radio" class="custom-control-input selecttype" placeholder="Image" <?php if($detail_file_type == 'Image'){ echo "checked='checked'"; } ?> value="3">
									</div>
								</div>
							</div>
							
							<div id="audioshow">
								<div class="row">
									<div class="col-md-4 add_top_value">
										<label>Audio</label>									
										<div class="form-group">
											<div>
												<a href="<?php echo $detailsurlD_audio; ?>" target="_blank"><img src="<?php echo $detailsidD_audio; ?>" class="document_image3" width="100"></a>
											</div>
											<input type="file" id="file_audio" class="document_file3">						
											<small>(Supported file format is mp3)</small><br>	
											<label for="file_audio" class="choose_file">Choose File</label>										
											<input type="hidden" name="image4" class="document3 percentageslide" value="<?php echo $details_media_url; ?>">											
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-4 add_top_value">
										<label>Image</label>
										<div class="form-group" id="frontaudioimgshow">
											<div>
												<a href="<?php echo $detailsurlD_audioimage; ?>" target="_blank"><img src="<?php echo $detailsidD_audioimage; ?>" class="document_image4" width="100"></a>
											</div>
											<input type="file" id="file_audioimage" class="document_file4">	
											<small>(Supported file format are jpg, gif, jpeg, png, tiff)</small>		
											<label for="file_audioimage" class="choose_file">Choose File</label>										
											<input type="hidden" name="audio_image" class="document4 percentageslide" value="<?php echo $details_audioimageurl; ?>">
										</div><br>
										<label>As per front image</label>										
										<input name="audiofrontimg" id="audiofrontimg" class="audiofrontimg" type="checkbox"
										<?php if($as_per_front_audioimg == 1) echo 'checked="checked"'; ?>>	
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
										<input type="hidden" name="image3" class="document2 percentageslide" value="<?php echo $details_media_url; ?>">										
										<small>(Supported file format is mp4)</small>
									</div>
								</div>
							</div>
							
							<div class="row" id="imageshow">
								<div class="col-md-4 add_top_value">
									<label>Image</label>
									<div class="form-group" id="frontimgshow">
										<div>
											<a href="<?php echo $detailsurlD_image; ?>" target="_blank"><img src="<?php echo $detailsidD_image; ?>" class="document_image1" width="100"></a>
										</div>
										<input type="file" id="file_image" class="document_file1">
										<small>(Supported file format are jpg, gif, jpeg, png, tiff)</small>
										<label for="file_image" class="choose_file">Choose File</label>										
										<input type="hidden" name="image2" class="document1 percentageslide" value="<?php echo $details_media_url; ?>">										
									</div><br>
									<label>As per front image</label>										
									<input name="frontimg" id="frontimg" class="frontimg" type="checkbox" 
									<?php if($as_per_front_img == 1) echo 'checked="checked"'; ?>>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Detail - Level 1</label>										
										<textarea id="level1" name="level1" rows="5" class="form-control" placeholder="Detail - Level 1">
											<?php echo $details_level1; ?>
										</textarea>										
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Detail - Level 2</label>										
										<textarea id="level2" name="level2" rows="5" class="form-control" placeholder="Detail - Level 2">
											<?php echo $details_level2; ?>
										</textarea>										
									</div>
								</div>
							</div>

							<br><p class="subheading">Sections Headers</p>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<?php
										foreach($sections_headers as $key => $value){?>
											<div class="col-md-3">
												<div class="custom-control custom-checkbox">
													<input type="checkbox" id="<?php echo $key.'-'.$value['header_id']; ?>" class="custom-control-input sections_headers" name="sections_headers[]" value="<?php echo $value['header_id']; ?>" <?php echo (in_array($value['header_id'], $sections_headersD)) ? 'checked="checked"' : '';
														if(($btnvlue == 'Save') && ($value['header_id'] == 1)) echo 'checked="checked"';
													 ?>>
													<label class="custom-control-label" for="<?php echo $key.'-'.$value['header_id']; ?>"><?php echo $value['header']; ?></label>
												</div>
											</div>
										<?php } ?>										
									</div>
								</div>
							</div>

							<br><p class="subheading">Add Tags</p>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Add Tags</label><br/>										
										<input type="text" id="tags" name="tags" class="form-control" value="<?php echo $tags; ?>" />
									</div>
								</div>
							</div>
							
							<div>
								<?php if (isset($permission) && ($permission =='1')) { ?>								
								<input name="id" type="hidden" value="<?php echo $id; ?>">
								<button type="submit" id="store" class="btn btn-info btn-fill pull-left"><?php echo $btnvlue; ?></button>
								<?php } ?>
							</div>
							
							<a href="<?php echo base_url();?>admincontrol/articles"><button type="button" class="btn btn-warning btn-fill pull-left">Back</button></a>
							<div class="clearfix"></div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js?ver=3"></script>
<script type="text/javascript">
		 $(function () {		 
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

			$("#writers_name").autocomplete({
		        source: "<?php echo base_url().'admincontrol/autocomplete_writers'; ?>",		        
		        change: function(event, ui) {
			        if (ui.item == null) {
			          	$(this).val("");
                		return false;
			        }else{
			        	$("#writers_name").val(ui.item.value);
		            	$("#writers_hide").val(ui.item.id);
			        }
			    }
		    });
		 });

		$(document).ready(function(){ 			
			var filepath 	= '<?php echo $filepath; ?>';
			var pdfimg		= '<?php echo $pdfimg; ?>';
			var audioimg	= '<?php echo $audioimg; ?>';
			var videoimg	= '<?php echo $videoimg; ?>';						

			fileupload2([".document_file", "./images/", ['jpg','gif','jpeg','png','tiff']], ['.document', '.document_image', filepath, pdfimg, '.documentthumb']);
			// fileupload([".document_file", "./images/", ['jpg','gif','jpeg','png','tiff']], ['.document', '.document_image', filepath, pdfimg]);
	    	
	    	fileupload([".document_file1", "./images/", ['jpg','gif','jpeg','png','tiff']], ['.document1', '.document_image1', filepath, pdfimg]);

	    	fileupload([".document_file2", "./images/", ['mp4']], ['.document2', '.document_image2', filepath, videoimg]);

	    	fileupload([".document_file3", "./images/", ['mp3']], ['.document3', '.document_image3', filepath, audioimg]);

	    	fileupload([".document_file4", "./images/", ['jpg','gif','jpeg','png','tiff']], ['.document4', '.document_image4', filepath, pdfimg]);	

	    	jQuery.validator.addMethod("greaterThan", 
			function(value, element, params) {		        		        
		        if (value != '') {
		        	var target = $(params).val();
			        var isValueNumeric = !isNaN(parseFloat(value)) && isFinite(value);
			        var isTargetNumeric = !isNaN(parseFloat(target)) && isFinite(target);
			        if (isValueNumeric && isTargetNumeric) {
			            return Number(value) > Number(target);
			        }

			        if (!/Invalid|NaN/.test(new Date(value))) {
			            return new Date(value) > new Date(target);
			        }
			    }else{
			    	return true;
			    }

		        return false;
		    },'Must be greater than or equal to current date.');    	
	    	
	    	validation(
				'.form1',
				{				
					title : {
						required	: true,					
					},
					description : {
						required	: true,					
					},
					position : {
						required	: true,					
					},					
					writers_name : {
						required	: true,
					},
					image1 : {
						required	: true,
					},
					image2 : {
						// required	: '.selecttype[value="3"]:checked', //Image
						required: function(){							
							if((!$('#frontimg').is(":checked")) && ($('#image-radio').is(":checked"))){
								var show = true;
							}else {
								var show = false;
							}

							return show
	                  	}
					},
					audio_image : {						
						required: function(){							
							if((!$('#audiofrontimg').is(":checked")) && ($('#audio-radio').is(":checked"))){
								var show = true;
							}else {
								var show = false;
							}

							return show
	                  	}
					},
					todate : {					
						greaterThan: "#TodayDate",
					},
					image3 : {
						required	: '.selecttype[value="2"]:checked', //Video
					},
					image4 : {
						required	: '.selecttype[value="1"]:checked', //Audio
					},
					details : {
						required	: true,
					},
					level1 : {
						required	: true,
					},
					level2 : {
						required	: true,
					},									
					'sections_headers[]' : {
						required : true,
					},
				},
				{
					title 	: {
						required	: "Title is required.",
					},
					description 	: {
						required	: "Description is required.",
					},	
					position 	: {
						required	: "Position is required.",
					},											
					writers_name 	: {
						required	: "Writers is required.",
					},
					image1 	: {
						required	: "Image is required.",
					},
					image2 	: {
						required	: "Image is required.",
					},
					audio_image 	: {
						required	: "Image is required.",
					},
					todate 	: {
						required	: "Publish End Date must be greater than or equal to current date.",
					},
					image3 	: {
						required	: "Video is required.",
					},
					image4	: {
						required	: "Audio is required.",
					},
					details 	: {
						required	: "Article Details is required.",
					},
					level1 	: {
						required	: "Detail - Level 1 is required.",
					},
					level2 	: {
						required	: "Detail - Level 2 is required.",
					},									
					'sections_headers[]' : {
						required : "Sections Headers is required",
					},
				},
				{					
					ignore: "input[type='text']:hidden:not(#tags)"
				}
			);	    				

			var detail_file_type = '<?php echo $detail_file_type; ?>';			

			if(detail_file_type == 'Audio'){
				$('#audioshow').show();
				$('#videoshow').hide();
				$('#imageshow').hide();
			}else if(detail_file_type == 'Video'){
				$('#audioshow').hide();
				$('#videoshow').show();
				$('#imageshow').hide();
			}else if(detail_file_type == 'Image'){
				$('#audioshow').hide();
				$('#videoshow').hide();
				$('#imageshow').show();
			}

			var as_per_front_img	= '<?php echo $as_per_front_img; ?>';

			if (as_per_front_img == 1) {
				$('#frontimgshow').hide();
			}else if (as_per_front_img == 0) {
				$('#frontimgshow').show();
			}

			var as_per_front_audioimg	= '<?php echo $as_per_front_audioimg; ?>';

			if (as_per_front_audioimg == 1) {
				$('#frontaudioimgshow').hide();
			}else if (as_per_front_audioimg == 0) {
				$('#frontaudioimgshow').show();
			}
			
		});

		CKEDITOR.replace( 'level1', {
			// width: 450,
			height: 300,
			resize_dir: 'both',
			resize_minWidth: 200,
			resize_minHeight: 300,
			resize_maxWidth: 800,
			resize_enabled: 'false'
		});		

		CKEDITOR.replace( 'level2', {
			// width: 450,
			height: 300,
			resize_dir: 'both',
			resize_minWidth: 200,
			resize_minHeight: 300,
			resize_maxWidth: 800,
			resize_enabled: 'false'
		});		

		$('#audio-radio').click(function(){
			$('#audioshow').show();
			$('#videoshow').hide();
			$('#imageshow').hide();
		});

		$('#video-radio').click(function(){
			$('#audioshow').hide();
			$('#videoshow').show();
			$('#imageshow').hide();
		});

		$('#image-radio').click(function(){
			$('#audioshow').hide();
			$('#videoshow').hide();
			$('#imageshow').show();
		});

		$('#frontimg').click(function(){
			if($(this).prop("checked") == true){
                $('#frontimgshow').hide();
            }else if($(this).prop("checked") == false){
                $('#frontimgshow').show();
            }
		});

		$('#audiofrontimg').click(function(){
			if($(this).prop("checked") == true){
                $('#frontaudioimgshow').hide();
            }else if($(this).prop("checked") == false){
                $('#frontaudioimgshow').show();
            }            
		});
		 
		$('input[name="tags"]').amsifySuggestags({
			type : 'bootstrap',		
			suggestions: <?php echo $taggs; ?>,			
			whiteList: true
		});		

		$('#store').click(function(){				
			if ($('.form1').valid()==true) {
				$('#store').attr('disabled', true);
				$('.form1').submit();
			}
		});			
</script>
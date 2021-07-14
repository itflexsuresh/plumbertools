<?php
if (isset($getdata) && $getdata) {
    $id = $getdata['id'];
    
    $published         	= (set_value('published')) ? set_value('published') : $getdata['published'];
    $title             	= (set_value('title')) ? set_value('title') : $getdata['content'];
    $position          	= (set_value('position')) ? set_value('position') : $getdata['position'];
    $details_level1    	= (set_value('details_level1')) ? set_value('details_level1') : $getdata['details'];

    $heading 			= 'Update';
    $btnvlue 			= 'Update';
} else {
    $id                = '';
    $published         = 1;
    $title             = set_value('title');
    $position          = 1;
    $details_level1    = set_value('details_level1');
    $as_per_front_audioimg = 1;

    $heading = 'Add New';
    $btnvlue = 'Save';
}

$file = isset($getdata['file']) ? $getdata['file'] : '';

$filepath  = base_url() . 'images/';
$filepath1 = (isset($getdata['file']) && $getdata['file'] != '') ? $filepath . $getdata['file'] : base_url() . 'icons/upload.png';

$videoimg  = base_url() . 'images/video.png';
$uploadimg = base_url() . 'icons/upload.png';

if ($file != '') {
    $explodefile2 = explode('.', $file);
    $extfile2     = array_pop($explodefile2);
    $videoidimg   = (in_array($extfile2, ['mp4'])) ? $videoimg : $filepath1;
    $videourl   	= $filepath1;
} else {
    $videoidimg = $uploadimg;
    $videourl 	= 'javascript:void(0)';
}

?>
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
						<form method="post" class="form1" action="<?php echo base_url().'admincontrol/videosection2action'; ?>" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Published</label>										
										<input name="publishid" id="publishid" class="published" type="checkbox" value="1"
										<?php if($published == 1) echo 'checked="checked"'; ?>>
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
										<label>Position</label>										
										<input name="position" id="position" type="number" class="form-control" placeholder="Position" min="1" value="<?php echo $position; ?>">
									</div>
								</div>
							</div>
							<div class="row" id="videoshow">
								<div class="col-md-4 add_top_value">
									<label>Video</label>
									<div class="form-group">
										<div>
											<a href="<?php echo $videourl; ?>" target="_blank"><img src="<?php echo $videoidimg; ?>" class="document_image2" width="100"></a>
										</div>
										<input type="file" id="file_video" class="document_file2">								
										<label for="file_video" class="choose_file">Choose File</label>										
										<input type="hidden" name="image3" class="document2" value="<?php echo $file; ?>">										
										<small>(Supported file format is mp4)</small>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Detail - Level 1</label>										
										<textarea class="form-control" id="level1" name="level1" placeholder="Detail - Level 1"><?php echo $details_level1; ?></textarea>										
									</div>
								</div>
							</div>
							<input type="hidden" name="videosectionid" value="<?php echo $videosectionid; ?>">
							<input type="hidden" name="videosection1id" value="<?php echo $videosection1id; ?>">
							<div>
								<?php if (isset($permission) && ($permission =='1')) { ?>								
								<input name="id" type="hidden" value="<?php echo $id; ?>">
								<button type="submit" id="store" class="btn btn-info btn-fill pull-left"><?php echo $btnvlue; ?></button>
								<?php } ?>
							</div>
							
							<a href="<?php echo base_url();?>admincontrol/videosection2list/<?php echo $videosectionid; ?>/<?php echo $videosection1id; ?>"><button type="button" class="btn btn-warning btn-fill pull-left">Back</button></a>
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
		 //$(function () {	

		 		 
		 	
		 //});

		 $(document).ready(function(){
		 	var filepath 	= '<?php echo $filepath; ?>';
			var videoimg	= '<?php echo $videoimg; ?>';

	    	fileupload([".document_file2", "./images/", ['mp4']], ['.document2', '.document_image2', filepath, videoimg]);
	    		
	    	
	    	validation(
				'.form1',
				{				
					title : {
						required	: true,					
					},
					position : {
						required	: true,
						remote		: 	{
									url		: 	"<?php echo base_url().'ajax/index/positionValidator'; ?>",
									type	: 	"post",
									async	: 	false,
									data: {
											position: function() {
												return $( "#position" ).val();
											},
											id: function() {
												return '<?php echo $id; ?>';
											},
											tablename: function() {
												return 'help_video_section2';
											}
										}
								}
					},
					image3 : {
						required	: true, //Video
					},
					/*level1 : {
						required	: true,
					},*/
				},
				{
					title 	: {
						required	: "Title is required.",
					},
					position 	: {
						required	: "Position is required.",
					},
					image3 	: {
						required	: "Video is required.",
					},
					/*level1 	: {
						required	: "Detail - Level 1 is required.",
					},*/
				},
				{					
					ignore: []
				}
			);
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


		$('#store').click(function(){				
			if ($('.form1').valid()) {
				$('#store').attr('disabled', true);
				$('.form1').submit();
			}
		});			
</script>
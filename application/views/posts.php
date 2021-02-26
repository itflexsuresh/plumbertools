<?php 
// $mainsettings_id 					= isset($mainsettings['id']) ? $mainsettings['id'] : '';
// $numberpost 						= isset($mainsettings['no_post']) ? $mainsettings['no_post'] : '';
// $votes 								= isset($mainsettings['no_votes']) ? $mainsettings['no_votes'] : '';
// $monthpost 							= isset($mainsettings['months_granted']) ? $mainsettings['months_granted'] : '';
$posttaggs 	= isset($result['post_taggs']) ? explode(',', $result['post_taggs']) : [];
$usertype 	= isset($userdetails['type']) ? $userdetails['type'] : '';

$filepath 				= base_url().'images/';
$pdfimg 				= base_url().'images/pdf.png';
$profileimg 			= base_url().'icons/profile.jpg';
$uploadimg 				= base_url().'icons/upload.png';

?>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">Manage Post</h4>
						<p class="advertise_address"></p><br>
					</div>
					<div class="content">
						<form method="post" class="form1" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Post Title</label>								
										<input id="posttitle" name="posttitle" type="text" class="form-control" placeholder="Post title" value="">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 add_top_value">
									<h4 class="card-title add_top_value">Add Images</h4>
									<div class="form-group">
										<div class="post_default_image">
											<img src="<?php echo $uploadimg; ?>" width="100">
										</div>
										<div class="file2append">
											<input type="file" id="file2_file" class="file2_file">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="scrolldiv">
									<div class="col-md-6">

										<label>Select Taggs</label>
										<div class="form-group">
											
											<?php
											foreach($tagdata as $key => $value){ ?>
												<div class="col-md-6">
													<div class="custom-control custom-checkbox">
														<input type="checkbox" id="<?php echo $key.'-'.$value['id']; ?>" class="custom-control-input taggs" name="taggs[]" value="<?php echo $value['id']; ?>" <?php echo (in_array($value['id'], $posttaggs)) ? 'checked="checked"' : ''; ?>>
														<label class="custom-control-label" for="<?php echo $key.'-'.$value['id']; ?>"><?php echo $value['tag_name']; ?></label>
													</div>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="posttext">Post Text</label>
										<textarea class="form-control" id="posttext" placeholder="Enter post text" name="posttext"></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<input id="userid" name="userid" type="hidden" class="form-control" value="<?php echo $userid; ?>">
									<input id="userid" name="user_type" type="hidden" class="form-control" value="<?php echo $usertype; ?>">
									<input id="id" name="id" type="hidden" class="form-control" value="">
									<button type="submit" id="createpost" class="btn btn-info btn-fill pull-left">Create Post</button>
									<a href="<?php echo base_url().'admincontrol/posts';?>"><button type="button" class="btn btn-warning btn-fill pull-right">Back</button></a>
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
    	var filepath 	= '<?php echo $filepath; ?>';
		var pdfimg		= '<?php echo $pdfimg; ?>';
    	fileupload([".file2_file", "./images/", ['jpg','gif','jpeg','png','tiff']], ['file2[]', '.file2append', filepath, pdfimg], 'multiple');

    	validation(
			'.form1',
			{				
				posttitle : {
					required	: true,
					maxlength	: 149,
				},
				posttext : {
					// required	: true,
					maxlength	: 2999,
				},
			},
			{
				posttitle 	: {
					required	: "Post title is required.",
				},
				// posttext 	: {
				// 	required	: "Post text is required.",
				// },	
			},
			[],'1'
		);

		$('#createpost').click(function(){
			if ($('.form1').valid()==true) {
				$('#createpost').attr('disabled', true);
				$('.form1').submit();
			}
		});

		$('.file2_file').click(function(e){
			if($(document).find('.file2append .multipleupload').length >= 5){
				$(this).val('');
				sweetalertautoclose('Reached maxmium limit.');
				return false;
			}
		})

    });
</script>
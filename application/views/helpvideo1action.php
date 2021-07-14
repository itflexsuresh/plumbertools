<?php 
if (isset($getdata['image'])) {
	$extension = explode('.', $getdata['image']);

	if ($extension[1] == 'pdf') {
		$file = base_url().'./images/pdf.png';
	}else{
		$file = base_url().'./images/'.$getdata['image'].'';
	}
}

if (isset($getdata['pdf']) && $getdata['pdf'] =='1') {
	$pdf = '1';
}else{
	$pdf = '0';
}

$display 						= isset($getdata['display']) ? $getdata['display'] : '';
$display_content 				= isset($getdata['display_content']) ? $getdata['display_content'] : '';

?>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="header">
					<?php if ($action == "new") { ?>
						<h4 class="title"><?php echo $videosectionname['content']; ?> Content Manager</h4>
					<?php } if ($action == "edit") { ?>
						<h4 class="title"><?php echo $videosectionname['content']; ?> Update Content Manager</h4>
					<?php } ?>
					</div>
					<div class="content">
						<form method="post" class="form" action="<?php echo base_url();?>admincontrol/videosection1action/<?php echo $videosectionid; ?>"  enctype="multipart/form-data">							
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">	
										<input name="videosectionid" type="hidden" class="form-control" placeholder="Video section" value="<?php echo $videosectionid; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Content</label>
									<?php if ($action == "new") { ?>										
										<input name="content" type="text" class="form-control" placeholder="Content" value="<?php echo set_value('content'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="content" type="text" class="form-control" placeholder="Content" value="<?php echo set_value('content',$getdata['content']); ?>">
									<?php } ?>
										<span style='color: red'><?php echo form_error('content'); ?></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
										<div class="form-group">
											<label>Display</label>
											<input id="rcheckboxs1" class="display-box" type="checkbox" name="display" value="1" <?php if($display == '1'){ echo "checked='checked'"; } ?>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
										<div class="form-group">
											<label>Display content Title</label>
											<input id="rcheckboxs2" class="display-box" type="checkbox" name="display_content" value="1" <?php if($display_content == '1'){ echo "checked='checked'"; } ?>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Image / PDF</label>
									<?php if ($action == "new") { ?>
										<input name="imagefile" type="file" class="form-control" placeholder="Image" value="<?php echo set_value('imagefile'); ?>">
									<?php } if ($action == "edit") { ?>
										<?php if(isset($file)){ ?><img src="<?php echo $file;?>" height="50" width="50"> <?php } ?>
										<input name="imagefile" type="file" class="form-control" placeholder="Image" value="<?php echo set_value('imagefile',$getdata['image']); ?>">
									<?php } ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Position</label>
									<?php if ($action == "new") { ?>
										<input name="position" id="position" type="text" class="form-control" placeholder="Position" value="<?php echo set_value('position'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="position" type="text" id="position" class="form-control" placeholder="Position" value="<?php echo set_value('position',$getdata['position']);?>">
									<?php } ?>
									<span style='color: red'><?php echo form_error('position'); ?></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Published</label>
									<?php if ($action == "new") { ?>
										<select name="publishid" id="publishid">
											<option value="1" <?php echo set_select('publishid', '1'); ?>>True</option>
											<option value="0" <?php echo set_select('publishid', '0'); ?>>False</option>
										</select>
									<?php } if ($action == "edit") { ?>
										<select name="publishid" id="publishid">											
											<option value="1" <?php echo set_select('publishid', '1'); if($getdata['published'] == "1"){ ?> selected <?php } ?> >True</option>											
											<option value="0" <?php echo set_select('publishid', '0'); if($getdata['published'] == "0"){ ?> selected<?php } ?> >False</option>											
										</select>
									<?php } ?>
									</div>
								</div>
							</div>
						<?php if (isset($permission) && ($permission =='1')) { ?>
						<?php if ($action == "new") { ?>
							<input name="insert" type="hidden" value="1">
							<button type="submit" class="btn btn-info btn-fill pull-left">Save</button>						
						<?php } if ($action == "edit") { ?>
							<input name="update" type="hidden" value="1">
							<input name="updateid" type="hidden" value="<?php echo $getdata['id']; ?>">
							<input name="pdf" type="hidden" value="<?php echo $pdf; ?>">
							<button type="submit" class="btn btn-info btn-fill pull-left">Update</button>
						<?php } ?>
						<?php } ?>
							
							<a href="<?php echo base_url();?>admincontrol/videosection1list/<?php echo $videosectionid; ?>"><button type="button" class="btn btn-warning btn-fill pull-left">Back</button></a>
							<div class="clearfix"></div>
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
			'.form',
			{				
				position : {
					remote		: 	{
									url		: 	"<?php echo base_url().'ajax/index/positionValidator'; ?>",
									type	: 	"post",
									async	: 	false,
									data: {
											position: function() {
												return $( "#position" ).val();
											},
											id: function() {
												return '<?php echo isset($getdata['id']) ? $getdata['id'] : '' ?>';
											},
											tablename: function() {
												return 'help_video_section1';
											}
										}
								}
				},
				
			},
			{
				position 	: {
					remote 		: "Position has already been used!",
				},
				
			},
			
		);
	});
</script>

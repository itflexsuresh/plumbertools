
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="header">
					<?php if ($action == "new") { ?>
						<h4 class="title">Content Manager</h4>
					<?php } if ($action == "edit") { ?>
						<h4 class="title">Update Content Manager</h4>
					<?php } ?>
					</div>
					<div class="content">
						<form method="post" class="form" action="<?php echo base_url();?>admincontrol/toolboxtalksaction"  enctype="multipart/form-data">
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
										<label>Background Color code</label>
									<?php if ($action == "new") { ?>
										<input name="bgcolorcode" type="text" class="form-control" placeholder="Background Color" value="<?php echo set_value('bgcolorcode'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="bgcolorcode" type="text" class="form-control" placeholder="Background Color" value="<?php echo set_value('bgcolorcode',$getdata['bgcolorcode']);?>">
									<?php } ?>
									<span style='color: red'><?php echo form_error('bgcolorcode'); ?></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Image</label>
									<?php if ($action == "new") { ?>
										<input name="imagefile" type="file" class="form-control" placeholder="Image" value="<?php echo set_value('imagefile'); ?>">
									<?php } if ($action == "edit") { 
										if ($getdata['image'] !=''){
											?>
										<div class="edit-img-sec">
											<img src="<?php echo base_url();?>./images/<?php echo $getdata['image'];?>" height="50" width="50">
											<a id="delete-img-tag" href="javascript:void(0)"><img style="margin-top: -53px;display: inline-block !important;" id="delete-img" src="<?php echo base_url();?>./assets/img/delete.jpg" height="15" width="15"></a> 
										</div>
									<?php }?>
										<input name="imagefile" type="file" class="form-control" id="filechooser" placeholder="Image" value="<?php echo set_value('imagefile',$getdata['image']); ?>">
										<input type="hidden" id="imgselector" name="imgselector" value="<?php if($getdata['image'] !=''){ echo "1"; }else{ echo "2"; } ?>">
									<?php } ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Position</label>
									<?php if ($action == "new") { ?>
										<input name="position" type="text" class="form-control" placeholder="Position" value="<?php echo set_value('position'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="position" type="text" class="form-control" placeholder="Position" value="<?php echo set_value('position',$getdata['position']);?>">
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
							
						<?php if ($action == "new") { ?>
							<input name="insert" type="hidden" value="1">
							<button type="submit" class="btn btn-info btn-fill pull-left" id="save-btn">Save</button>						
						<?php } if ($action == "edit") { ?>
							<input name="update" type="hidden" value="1">
							<input name="updateid" type="hidden" value="<?php echo $getdata['id']; ?>">
							<button type="submit" class="btn btn-info btn-fill pull-left" id="update-btn">Update</button>
						<?php } ?>
							
							<a href="<?php echo base_url();?>admincontrol/toolboxtalksaction"><button type="button" class="btn btn-warning btn-fill pull-left" id="back-btn">Back</button></a>
							
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('#delete-img-tag').click(function(){
			$(this).parent().remove();
			$('#filechooser').removeAttr('value');
			$('#imgselector').val('0');
		});
		$('#save-btn').click(function(){
			$('#save-btn').prop("disabled", true);
			$( ".form" ).submit();
			$('#back-btn').prop("disabled", true);
			// $('#update-btn').prop("disabled", true);
		});
		$('#back-btn').click(function(){
			$('#save-btn').prop("disabled", true);
			$('#update-btn').prop("disabled", true);
			$('#back-btn').prop("disabled", true);
		});
		$('#update-btn').click(function(){
			// $('#save-btn').prop("disabled", true);
			$('#back-btn').prop("disabled", true);
			$('#update-btn').prop("disabled", true);
			$( ".form" ).submit();
		});
	});
</script>

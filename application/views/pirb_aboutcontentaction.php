
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="header">
					<?php if ($action == "new") { ?>
						<h4 class="title">About the PIRB</h4>
					<?php } if ($action == "edit") { ?>
						<h4 class="title">Update About the PIRB</h4>
					<?php } ?>
					</div>
					<div class="content">
						<form method="post" action="<?php echo base_url();?>admincontrol/pirb_aboutcontentaction"  enctype="multipart/form-data">
							
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Content-1</label>
									<?php if ($action == "new") { ?>										
										<textarea rows="10" cols="50" name="content1" type="text" class="form-control ckeditor" placeholder="Content-1" value=""><?php echo set_value('content1'); ?></textarea>
									<?php } if ($action == "edit") { ?>
										<textarea rows="10" cols="50" name="content1" type="text" class="form-control ckeditor" placeholder="Content-1" value=""><?php echo set_value('content1',$getdata['content1']); ?></textarea>
									<?php } ?>
										<span style='color: red'><?php echo form_error('content1'); ?></span>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Content-2</label>
									<?php if ($action == "new") { ?>										
										<textarea rows="10" cols="50" rows="10" cols="50" name="content2" type="text" class="form-control ckeditor" placeholder="Content-2" value=""><?php echo set_value('content2'); ?></textarea>
									<?php } if ($action == "edit") { ?>
										<textarea rows="10" cols="50" name="content2" type="text" class="form-control ckeditor" placeholder="Content-2" value=""><?php echo set_value('content2',$getdata['content2']); ?></textarea>
									<?php } ?>
										<span style='color: red'><?php echo form_error('content2'); ?></span>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Content-3</label>
									<?php if ($action == "new") { ?>										
										<textarea rows="10" cols="50" name="content3" type="text" class="form-control ckeditor" placeholder="Content-3" value=""><?php echo set_value('content3'); ?></textarea>
									<?php } if ($action == "edit") { ?>
										<textarea rows="10" cols="50" name="content3" type="text" class="form-control ckeditor" placeholder="Content-3" value=""><?php echo set_value('content3',$getdata['content3']); ?></textarea>
									<?php } ?>
										<span style='color: red'><?php echo form_error('content3'); ?></span>
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
							<button type="submit" class="btn btn-info btn-fill pull-left">Update</button>
						<?php } ?>
						<?php } ?>
							
							<a href="<?php echo base_url();?>admincontrol/pirb_aboutcontentaction"><button type="button" class="btn btn-warning btn-fill pull-left">Back</button></a>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

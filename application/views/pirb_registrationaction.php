
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="header">
					<?php if ($action == "new") { ?>
						<h4 class="title">PIRB Registration Content Manager</h4>
					<?php } if ($action == "edit") { ?>
						<h4 class="title">Update PIRB Registration Content Manager</h4>
					<?php } ?>
					</div>
					<div class="content">
						<form method="post" action="<?php echo base_url();?>admincontrol/pirb_registrationaction"  enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Content</label>
									<?php if ($action == "new") { ?>										
										<textarea cols="50" rows="10" name="registration" type="text" class="form-control" placeholder="Content" ><?php echo set_value('registration'); ?></textarea>

									<?php } if ($action == "edit") { ?>
										<textarea cols="50" rows="10" name="registration" type="text" class="form-control" placeholder="Content" ><?php echo set_value('registration',$getdata['registration']); ?></textarea>

									<?php } ?>
										<span style='color: red'><?php echo form_error('registration'); ?></span>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Register Online Link</label>
									<?php if ($action == "new") { ?>										
										<input name="registeronline_link" type="text" class="form-control" placeholder="Register Online Link" value="<?php echo set_value('registeronline_link'); ?>">

									<?php } if ($action == "edit") { ?>
										<input name="registeronline_link" type="text" class="form-control" placeholder="Register Online Link" value="<?php echo set_value('registeronline_link',$getdata['registeronline_link']); ?>">
										
									<?php } ?>
										<span style='color: red'><?php echo form_error('registeronline_link'); ?></span>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Register Manual</label>
									<?php if ($action == "new") { ?>										
										<textarea cols="50" rows="10" name="registermanual" type="text" class="form-control" placeholder="Register Manual" ><?php echo set_value('registermanual'); ?></textarea>

									<?php } if ($action == "edit") { ?>
										<textarea cols="50" rows="10" name="registermanual" type="text" class="form-control" placeholder="Register Manual" ><?php echo set_value('registermanual',$getdata['registermanual']); ?></textarea>
										
									<?php } ?>
										<span style='color: red'><?php echo form_error('registermanual'); ?></span>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Download Link</label>
									<?php if ($action == "new") { ?>										
										<input name="downloadlink" type="text" class="form-control" placeholder="Download Link" value="<?php echo set_value('downloadlink'); ?>">

									<?php } if ($action == "edit") { ?>
										<input name="downloadlink" type="text" class="form-control" placeholder="Download Link" value="<?php echo set_value('downloadlink',$getdata['downloadlink']); ?>">
										
									<?php } ?>
										<span style='color: red'><?php echo form_error('downloadlink'); ?></span>
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
							
							<a href="<?php echo base_url();?>admincontrol/pirb_registrationaction"><button type="button" class="btn btn-warning btn-fill pull-left">Back</button></a>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

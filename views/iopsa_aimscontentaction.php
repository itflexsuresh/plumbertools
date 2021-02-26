
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="header">
					<?php if ($action == "new") { ?>
						<h4 class="title">IOPSA Aims and Objectives Manager</h4>
					<?php } if ($action == "edit") { ?>
						<h4 class="title">Update IOPSA Aims and Objectives Manager</h4>
					<?php } ?>
					</div>
					<div class="content">
						<form method="post" action="<?php echo base_url();?>admincontrol/iopsa_aimscontentaction"  enctype="multipart/form-data">
							
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Content</label>
									<?php if ($action == "new") { ?>										
										<textarea rows="10" cols="50" name="content" type="text" class="form-control ckeditor" placeholder="Content" value=""><?php echo set_value('content'); ?></textarea>
									<?php } if ($action == "edit") { ?>
										<textarea rows="10" cols="50" name="content" type="text" class="form-control ckeditor" placeholder="aimscontent" value=""><?php echo set_value('content',$getdata['content']); ?></textarea>
									<?php } ?>
										<span style='color: red'><?php echo form_error('content'); ?></span>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Vision</label>
									<?php if ($action == "new") { ?>										
										<textarea rows="10" cols="50" rows="10" cols="50" name="vision" type="text" class="form-control ckeditor" placeholder="Vision" value=""><?php echo set_value('vision'); ?></textarea>
									<?php } if ($action == "edit") { ?>
										<textarea rows="10" cols="50" name="vision" type="text" class="form-control ckeditor" placeholder="aimscontent" value=""><?php echo set_value('vision',$getdata['vision']); ?></textarea>
									<?php } ?>
										<span style='color: red'><?php echo form_error('vision'); ?></span>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Mission</label>
									<?php if ($action == "new") { ?>										
										<textarea rows="10" cols="50" name="mission" type="text" class="form-control ckeditor" placeholder="Mission" value=""><?php echo set_value('mission'); ?></textarea>
									<?php } if ($action == "edit") { ?>
										<textarea rows="10" cols="50" name="mission" type="text" class="form-control ckeditor" placeholder="aimscontent" value=""><?php echo set_value('mission',$getdata['mission']); ?></textarea>
									<?php } ?>
										<span style='color: red'><?php echo form_error('mission'); ?></span>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Objectives</label>
									<?php if ($action == "new") { ?>										
										<textarea rows="10" cols="50" name="objectives" type="text" class="form-control ckeditor" onkeypress="actionpress('txt1')" placeholder="Objectives" value=""><?php echo set_value('objectives'); ?></textarea>
									<?php } if ($action == "edit") { ?>
										<textarea rows="10" cols="50" name="objectives" id="txt1" type="text" class="form-control ckeditor" onkeypress="actionpress('.txt1')" placeholder="aimscontent" value=""><?php echo set_value('objectives',$getdata['objectives']); ?></textarea>
									<?php } ?>
										<span style='color: red'><?php echo form_error('objectives'); ?></span>
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
							
							<a href="<?php echo base_url();?>admincontrol/iopsa_aimscontentaction"><button type="button" class="btn btn-warning btn-fill pull-left">Back</button></a>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
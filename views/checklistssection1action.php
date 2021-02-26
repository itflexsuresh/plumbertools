
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="header">
					<?php if ($action == "new") { ?>
						<h4 class="title"><?php echo $checklistsname['name']; ?> Content Manager</h4>
					<?php } if ($action == "edit") { ?>
						<h4 class="title"><?php echo $checklistsname['name']; ?> Update Content Manager</h4>
					<?php } ?>
					</div>
					<div class="content">
						<form method="post" action="<?php echo base_url();?>admincontrol/checklistssection1action/<?php echo $checklistsid; ?>"  enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Name</label>
									<?php if ($action == "new") { ?>										
										<input name="cname" type="text" class="form-control" placeholder="Name" value="<?php echo set_value('cname'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="cname" type="text" class="form-control" placeholder="Name" value="<?php echo set_value('cname',$getdata['name']); ?>">
									<?php } ?>
										<span style='color: red'><?php echo form_error('cname'); ?></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Information</label>
									<?php if ($action == "new") { ?>
										<textarea name="information" rows="5" class="form-control" placeholder="Information" value=""><?php echo set_value('information'); ?></textarea>
									<?php } if ($action == "edit") { ?>
										<textarea name="information" rows="5" class="form-control" placeholder="Information"><?php echo set_value('information',$getdata['information']); ?></textarea>
									<?php } ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Active</label>
									<?php if ($action == "new") { ?>
										<select name="active" id="active">
											<option value="1" <?php echo set_select('active', '1'); ?>>True</option>
											<option value="0" <?php echo set_select('active', '0'); ?>>False</option>
										</select>
									<?php } if ($action == "edit") { ?>
										<select name="active" id="active">											
											<option value="1" <?php echo set_select('active', '1'); if($getdata['active'] == "1"){ ?> selected <?php } ?> >True</option>											
											<option value="0" <?php echo set_select('active', '0'); if($getdata['active'] == "0"){ ?> selected<?php } ?> >False</option>											
										</select>
									<?php } ?>
									</div>
								</div>
							</div>
							
						<?php if ($action == "new") { ?>
							<input name="insert" type="hidden" value="1">
							<button type="submit" class="btn btn-info btn-fill pull-left">Save</button>						
						<?php } if ($action == "edit") { ?>
							<input name="update" type="hidden" value="1">
							<input name="updateid" type="hidden" value="<?php echo $getdata['id']; ?>">
							<button type="submit" class="btn btn-info btn-fill pull-left">Update</button>
						<?php } ?>
							
							<a href="<?php echo base_url();?>admincontrol/checklistssection1action/<?php echo $checklistsid; ?>"><button type="button" class="btn btn-warning btn-fill pull-left">Back</button></a>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

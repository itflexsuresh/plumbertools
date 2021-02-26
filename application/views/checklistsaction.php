
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="header">
					<?php if ($action == "new") { ?>
						<h4 class="title">Checklist Details</h4>
					<?php } if ($action == "edit") { ?>
						<h4 class="title">Update Checklist Details</h4>
					<?php } ?>
					</div>
					<div class="content">
						<form method="post" action="<?php echo base_url();?>admincontrol/checklistsaction"  enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Checklist Name</label>
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
										<label>Checklist Information</label>
									<?php if ($action == "new") { ?>
										<textarea name="information" rows="5" class="form-control" placeholder="Information" value=""><?php echo set_value('information'); ?></textarea>
									<?php } if ($action == "edit") { ?>
										<textarea name="information" rows="5" class="form-control" placeholder="Information"><?php echo set_value('information',$getdata['information']); ?></textarea>
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
							
							<a href="<?php echo base_url();?>admincontrol/checklistsaction"><button type="button" class="btn btn-warning btn-fill pull-left">Back</button></a>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

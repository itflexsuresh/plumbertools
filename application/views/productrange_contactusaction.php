
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="header">
					<?php if ($action == "new") { ?>
						<h4 class="title">Advanced Valves Contact Us Manager</h4>
					<?php } if ($action == "edit") { ?>
						<h4 class="title">Update Advanced Valves Contact Us Manager</h4>
					<?php } ?>
					</div>
					<div class="content">
						<form method="post" action="<?php echo base_url();?>admincontrol/advancecontactaction"  enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Name</label>
									<?php if ($action == "new") { ?>										
										<input name="name" type="text" class="form-control" placeholder="Name" value="<?php echo set_value('name'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="name" type="text" class="form-control" placeholder="Name" value="<?php echo set_value('name',$getdata['name']); ?>">
									<?php } if ($action == "view") { ?>
										<input name="name" type="text" class="form-control" placeholder="Name" value="<?php echo set_value('name',$getdata['name']); ?>" readonly="true">
									<?php } ?>
										<span style='color: red'><?php echo form_error('name'); ?></span>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Email</label>
									<?php if ($action == "new") { ?>										
										<input name="email" type="email" class="form-control" placeholder="Email" value="<?php echo set_value('email'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="email" type="email" class="form-control" placeholder="Email" value="<?php echo set_value('email',$getdata['email']); ?>">
									<?php } if ($action == "view") { ?>
										<input name="email" type="email" class="form-control" placeholder="Email" value="<?php echo set_value('email',$getdata['email']); ?>" readonly="true">
									<?php } ?>
										<span style='color: red'><?php echo form_error('email'); ?></span>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Message</label>
									<?php if ($action == "new") { ?>										
										<textarea rows="10" cols="50" name="message" type="text" class="form-control" placeholder="Message" value=""><?php echo set_value('message'); ?></textarea>
									<?php } if ($action == "edit") { ?>
										<textarea rows="10" cols="50" name="message" type="text" class="form-control" placeholder="Message" value=""><?php echo set_value('message',$getdata['message']); ?></textarea>
									<?php } if ($action == "view") { ?>
										<textarea rows="10" cols="50" name="message" type="text" class="form-control" placeholder="Message" value=""  readonly="true"><?php echo set_value('message',$getdata['message']); ?></textarea>
									<?php } ?>
										<span style='color: red'><?php echo form_error('message'); ?></span>
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
							
							<a href="<?php echo base_url();?>admincontrol/advancedcontactus"><button type="button" class="btn btn-warning btn-fill pull-left">Back</button></a>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

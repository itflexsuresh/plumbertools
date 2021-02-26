
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="header">
					<?php if ($action == "new") { ?>
						<h4 class="title">PIRB Physical Address Manager</h4>
					<?php } if ($action == "edit") { ?>
						<h4 class="title">Update PIRB Physical Address Manager</h4>
					<?php } ?>
					</div>
					<div class="content">
						<form method="post" action="<?php echo base_url();?>admincontrol/pirb_addressaction"  enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Telephone</label>
									<?php if ($action == "new") { ?>										
										<input name="telephone" type="text" class="form-control" placeholder="Telephone" value="<?php echo set_value('telephone'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="telephone" type="text" class="form-control" placeholder="Telephone" value="<?php echo set_value('telephone',$getdata['telephone']); ?>">
									<?php } ?>
										<span style='color: red'><?php echo form_error('telephone'); ?></span>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>FAX</label>
									<?php if ($action == "new") { ?>										
										<input name="fax" type="text" class="form-control" placeholder="Tax" value="<?php echo set_value('fax'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="fax" type="text" class="form-control" placeholder="Tax" value="<?php echo set_value('fax',$getdata['fax']); ?>">
									<?php } ?>
										<span style='color: red'><?php echo form_error('fax'); ?></span>
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
									<?php } ?>
										<span style='color: red'><?php echo form_error('email'); ?></span>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Address</label>
									<?php if ($action == "new") { ?>										
										<textarea rows="10" cols="50" name="address" type="text" class="form-control" placeholder="Address" value=""><?php echo set_value('address'); ?></textarea>
									<?php } if ($action == "edit") { ?>
										<textarea rows="10" cols="50" name="address" type="text" class="form-control" placeholder="Address" value=""><?php echo set_value('address',$getdata['address']); ?></textarea>
									<?php } ?>
										<span style='color: red'><?php echo form_error('address'); ?></span>
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
							
							<a href="<?php echo base_url();?>admincontrol/pirb_addressaction"><button type="button" class="btn btn-warning btn-fill pull-left">Back</button></a>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

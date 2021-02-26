
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="header">
					<?php if ($action == "new") { ?>
						<h4 class="title">Company Membership</h4>
					<?php } if ($action == "edit") { ?>
						<h4 class="title">Update Company Membership</h4>
					<?php } ?>
					</div>
					<div class="content">
						<form method="post" action="<?php echo base_url();?>admincontrol/membershipaction"  enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Company</label>
									<?php if ($action == "new") { ?>										
										<input name="company" type="text" class="form-control" placeholder="Company" value="<?php echo set_value('company'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="company" type="text" class="form-control" placeholder="Company" value="<?php echo set_value('company',$getdata['company']); ?>">
									<?php } ?>
										<span style='color: red'><?php echo form_error('company'); ?></span>
									</div>
								</div>
							</div>							
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Membership Number</label>
									<?php if ($action == "new") { ?>
										<input name="membershipno" type="text" class="form-control" placeholder="Membership Number" value="<?php echo set_value('membershipno'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="membershipno" type="text" class="form-control" placeholder="Membership Number" value="<?php echo set_value('membershipno',$getdata['membershipno']);?>">
									<?php } ?>
									<span style='color: red'><?php echo form_error('membershipno'); ?></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Email Address</label>
									<?php if ($action == "new") { ?>
										<input name="email" type="text" class="form-control" placeholder="Email Address" value="<?php echo set_value('email'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="email" type="text" class="form-control" placeholder="Email Address" value="<?php echo set_value('email',$getdata['email']);?>">
									<?php } ?>
									<span style='color: red'><?php echo form_error('email'); ?></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Suspended</label>
									<?php if ($action == "new") { ?>
										<select name="suspended" id="suspended">
											<option value="1" <?php echo set_select('suspended', '1'); ?>>True</option>
											<option value="0" <?php echo set_select('suspended', '0'); ?>>False</option>
										</select>
									<?php } if ($action == "edit") { ?>
										<select name="suspended" id="suspended">											
											<option value="1" <?php echo set_select('suspended', '1'); if($getdata['suspended'] == "1"){ ?> selected <?php } ?> >True</option>											
											<option value="0" <?php echo set_select('suspended', '0'); if($getdata['suspended'] == "0"){ ?> selected<?php } ?> >False</option>											
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
							
							<a href="<?php echo base_url();?>admincontrol/membershipaction"><button type="button" class="btn btn-warning btn-fill pull-left">Back</button></a>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

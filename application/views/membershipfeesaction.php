<?php //print_r($getdata); ?>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="header">
					<?php if ($action == "new") { ?>
						<h4 class="title">Membership Fees</h4>
					<?php } if ($action == "edit") { ?>
						<h4 class="title">Update Membership Fees</h4>
					<?php } ?>
					</div>
					<div class="content">
						<form method="post" action="<?php echo base_url();?>admincontrol/membershipfeesaction"  enctype="multipart/form-data">	
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Image</label>
									<?php if ($action == "new") { ?>
										<!-- <input name="imagefile" type="file" class="form-control" placeholder="Image" value="<?php //echo set_value('imagefile'); ?>"> -->
									<?php } if ($action == "edit") { ?>
										<img src="<?php echo base_url();?>./images/<?php echo $getdata['image'];?>" height="50" width="50">
										<input name="imagefile" type="file" class="form-control" placeholder="Image" value="<?php echo set_value('imagefile',$getdata['image']); ?>">
									<?php } ?>
									<span style='color: red'><?php echo form_error('imagefile'); ?></span>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Download Link</label>
									<?php if ($action == "new") { ?>
										<!-- <input name="downloadlink" type="file" class="form-control" placeholder="downloadlink" value="<?php //echo set_value('downloadlink'); ?>"> -->
									<?php } if ($action == "edit") { ?>
										<input name="downloadlink" type="text" class="form-control" placeholder="downloadlink" value="<?php echo set_value('downloadlink',$getdata['downloadlink']); ?>">
									<?php } ?>
									<span style='color: red'><?php echo form_error('downloadlink'); ?></span>
									</div>
								</div>
							</div>

							<div class="row">
								<h5 class="title col-md-12">Associate Member</h5>
								<div class="col-md-12">
									<div class="form-group">
									<?php if ($action == "new") { ?>										
										<!-- <input name="associate_annual" type="text" class="form-control" placeholder="associate_annual" value="<?php //echo set_value('associate_annual'); ?>"> -->
									<?php } if ($action == "edit") { ?>
										<div class="col-md-4">
											<label>Annual</label>
											<input name="associate_annual" type="number" class="form-control" placeholder="associate_annual" value="<?php echo set_value('associate_annual',$getdata['associate_annual']); ?>">
											<span style='color: red'><?php echo form_error('associate_annual'); ?></span>
										</div>
										
										<div class="col-md-4">
											<label>Monthly</label>
											<input name="associate_monthly" type="number" class="form-control" placeholder="associate_monthly" value="<?php echo set_value('associate_monthly',$getdata['associate_monthly']); ?>">
											<span style='color: red'><?php echo form_error('associate_monthly'); ?></span>
										</div>
									<?php } ?>
										
									</div>
								</div>
							</div>

							<div class="row">
								<h5 class="title col-md-12">Plumbing Contractor</h5>
								<div class="col-md-12">
									<div class="form-group">
									<?php if ($action == "new") { ?>										
										<!-- <input name="plumbing_reg_annual" type="number" class="form-control" placeholder="plumbing_reg_annual" value="<?php //echo set_value('plumbing_reg_annual'); ?>"> -->
									<?php } if ($action == "edit") { ?>
										<div class="col-md-4">
											<label>Regional Annual</label>
											<input name="plumbing_reg_annual" type="number" class="form-control" placeholder="plumbing_reg_annual" value="<?php echo set_value('plumbing_reg_annual',$getdata['plumbing_reg_annual']); ?>">
											<span style='color: red'><?php echo form_error('plumbing_reg_annual'); ?></span>
										</div>
										
										<div class="col-md-4">
											<label>Regional Monthly</label>
											<input name="plumbing_reg_monthly" type="number" class="form-control" placeholder="plumbing_reg_monthly" value="<?php echo set_value('plumbing_reg_monthly',$getdata['plumbing_reg_monthly']); ?>">
											<span style='color: red'><?php echo form_error('plumbing_reg_monthly'); ?></span>
										</div>
										
										<div class="col-md-4">
											<label>National Annual</label>
											<input name="plumbing_nat_annual" type="number" class="form-control" placeholder="plumbing_nat_annual" value="<?php echo set_value('plumbing_nat_annual',$getdata['plumbing_nat_annual']); ?>">
											<span style='color: red'><?php echo form_error('plumbing_nat_annual'); ?></span>
										</div>
									<?php } ?>
										
									</div>
								</div>
							</div>

							<div class="row">
								<h5 class="title col-md-12">Merchant Member</h5>
								<div class="col-md-12">
									<div class="form-group">
									<?php if ($action == "new") { ?>										
										<!-- <input name="merchant_reg_annual" type="number" class="form-control" placeholder="merchant_reg_annual" value="<?php //echo set_value('merchant_reg_annual'); ?>"> -->
									<?php } if ($action == "edit") { ?>
										<div class="col-md-4">
											<label>Regional Annual</label>
											<input name="merchant_reg_annual" type="number" class="form-control" placeholder="merchant_reg_annual" value="<?php echo set_value('merchant_reg_annual',$getdata['merchant_reg_annual']); ?>">
											<span style='color: red'><?php echo form_error('merchant_reg_annual'); ?></span>
										</div>
										
										<div class="col-md-4">
											<label>Regional Monthly</label>
											<input name="merchant_reg_monthly" type="number" class="form-control" placeholder="merchant_reg_monthly" value="<?php echo set_value('merchant_reg_monthly',$getdata['merchant_reg_monthly']); ?>">
											<span style='color: red'><?php echo form_error('merchant_reg_monthly'); ?></span>
										</div>
										
										<div class="col-md-4">
											<label>National Annual</label>
											<input name="merchant_nat_annual" type="number" class="form-control" placeholder="merchant_nat_annual" value="<?php echo set_value('merchant_nat_annual',$getdata['merchant_nat_annual']); ?>">
											<span style='color: red'><?php echo form_error('merchant_nat_annual'); ?></span>
										</div>
									<?php } ?>
										
									</div>
								</div>
							</div>

							<div class="row">
								<h5 class="title col-md-12">Manufacturer Member</h5>
								<div class="col-md-12">
									<div class="form-group">
									<?php if ($action == "new") { ?>										
										<!-- <input name="manufacturer_reg_annual" type="number" class="form-control" placeholder="manufacturer_reg_annual" value="<?php //echo set_value('manufacturer_reg_annual'); ?>"> -->
									<?php } if ($action == "edit") { ?>
										<div class="col-md-4">
											<label>Regional Annual</label>
											<input name="manufacturer_reg_annual" type="number" class="form-control" placeholder="manufacturer_reg_annual" value="<?php echo set_value('manufacturer_reg_annual',$getdata['manufacturer_reg_annual']); ?>">
											<span style='color: red'><?php echo form_error('manufacturer_reg_annual'); ?></span>
										</div>
										
										<div class="col-md-4">
											<label>Regional Monthly</label>
											<input name="manufacturer_reg_monthly" type="number" class="form-control" placeholder="manufacturer_reg_monthly" value="<?php echo set_value('manufacturer_reg_monthly',$getdata['manufacturer_reg_monthly']); ?>">
											<span style='color: red'><?php echo form_error('manufacturer_reg_monthly'); ?></span>
										</div>
										
										<div class="col-md-4">
											<label>National Annual</label>
											<input name="manufacturer_nat_annual" type="number" class="form-control" placeholder="manufacturer_nat_annual" value="<?php echo set_value('manufacturer_nat_annual',$getdata['manufacturer_nat_annual']); ?>">
											<span style='color: red'><?php echo form_error('manufacturer_nat_annual'); ?></span>
										</div>
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
							
							<a href="<?php echo base_url();?>admincontrol/membershipfeesaction"><button type="button" class="btn btn-warning btn-fill pull-left">Back</button></a>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

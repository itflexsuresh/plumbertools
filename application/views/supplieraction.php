
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="header">
					<?php if ($action == "new") { ?>
						<h4 class="title">Supplier Manager</h4>
					<?php } if ($action == "edit") { ?>
						<h4 class="title">Update Supplier Manager</h4>
					<?php } ?>
					</div>
					<div class="content">
						<form method="post" action="<?php echo base_url();?>admincontrol/supplieraction"  enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Company Name</label>
									<?php if ($action == "new") { ?>										
										<input name="companyname" type="text" class="form-control" placeholder="Company Name" value="<?php echo set_value('companyname'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="companyname" type="text" class="form-control" placeholder="Company Name" value="<?php echo set_value('companyname',$getdata['companyname']); ?>">
									<?php } ?>
										<span style='color: red'><?php echo form_error('companyname'); ?></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Contact Name</label>
									<?php if ($action == "new") { ?>
										<input name="contactname" type="text" class="form-control" placeholder="Contact Name" value="<?php echo set_value('contactname'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="contactname" type="text" class="form-control" placeholder="Contact Name" value="<?php echo set_value('contactname',$getdata['contactname']); ?>">
									<?php } ?>
										<span style='color: red'><?php echo form_error('contactname'); ?></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Address</label>
									<?php if ($action == "new") { ?>
										<textarea name="address" rows="5" class="form-control" placeholder="Address" value=""><?php echo set_value('address'); ?></textarea>
									<?php } if ($action == "edit") { ?>
										<textarea name="address" rows="5" class="form-control" placeholder="Address"><?php echo set_value('address',$getdata['address']); ?></textarea>
									<?php } ?>
									</div>
								</div>
							</div>							
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Tel Number</label>
									<?php if ($action == "new") { ?>
										<input name="telnumber" type="text" class="form-control" placeholder="Tel Number" value="<?php echo set_value('telnumber'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="telnumber" type="text" class="form-control" placeholder="Tel Number" value="<?php echo set_value('telnumber',$getdata['telnumber']);?>">
									<?php } ?>
									<span style='color: red'><?php echo form_error('telnumber'); ?></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Email Address</label>
									<?php if ($action == "new") { ?>
										<input name="emailaddress" type="text" class="form-control" placeholder="Email Address" value="<?php echo set_value('telnumber'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="emailaddress" type="text" class="form-control" placeholder="Email Address" value="<?php echo set_value('emailaddress',$getdata['email']);?>">
									<?php } ?>
									<span style='color: red'><?php echo form_error('emailaddress'); ?></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Categories</label><br>
									<?php if ($action == "new") { ?>
<input name="categories[]" type="checkbox" class="" value="hotandcold" <?php echo set_checkbox('categories', 'hotandcold'); ?>>HOT AND COLD WATER SYSTEMS<br>
<input name="categories[]" type="checkbox" class="" value="rainwater" <?php echo set_checkbox('categories', 'rainwater'); ?>>RAINWATER DISPOSAL<br>
<input name="categories[]" type="checkbox" class="" value="sanitary" <?php echo set_checkbox('categories', 'sanitary'); ?>>SANITARY FITTINGS<br>
<input name="categories[]" type="checkbox" class="" value="terminal" <?php echo set_checkbox('categories', 'terminal'); ?>>TERMINAL FITTINGS AND VALVES<br>
<input name="categories[]" type="checkbox" class="" value="drainge" <?php echo set_checkbox('categories', 'drainge'); ?>>DRAINAGE-SOIL/WASTE/STORMWATER<br>
<input name="categories[]" type="checkbox" class="" value="solar" <?php echo set_checkbox('categories', 'solar'); ?>>SOLAR AND HEAT PUMPS<br>
<input name="categories[]" type="checkbox" class="" value="sundries" <?php echo set_checkbox('categories', 'sundries'); ?>>SUNDRIES<br>
									<?php } if ($action == "edit") {  
										$categories=explode(",",$getdata['categories']);
										?>
<input name="categories[]" type="checkbox" class="" value="hotandcold" <?php echo set_checkbox('categories', 'hotandcold'); if(in_array("hotandcold",$categories)){?> checked <?php } ?>>HOT AND COLD WATER SYSTEMS<br>
<input name="categories[]" type="checkbox" class="" value="rainwater" <?php echo set_checkbox('categories', 'rainwater'); if(in_array("rainwater",$categories)){?> checked <?php } ?>>RAINWATER DISPOSAL<br>
<input name="categories[]" type="checkbox" class="" value="sanitary" <?php echo set_checkbox('categories', 'sanitary'); if(in_array("sanitary",$categories)){?> checked <?php } ?>>SANITARY FITTINGS<br>
<input name="categories[]" type="checkbox" class="" value="terminal" <?php echo set_checkbox('categories', 'terminal'); if(in_array("terminal",$categories)){?> checked <?php } ?>>TERMINAL FITTINGS AND VALVES<br>
<input name="categories[]" type="checkbox" class="" value="drainge" <?php echo set_checkbox('categories', 'drainge'); if(in_array("drainge",$categories)){?> checked <?php } ?>>DRAINAGE-SOIL/WASTE/STORMWATER<br>
<input name="categories[]" type="checkbox" class="" value="solar" <?php echo set_checkbox('categories', 'solar'); if(in_array("solar",$categories)){?> checked <?php } ?>>SOLAR AND HEAT PUMPS<br>
<input name="categories[]" type="checkbox" class="" value="sundries" <?php echo set_checkbox('categories', 'sundries'); if(in_array("sundries",$categories)){?> checked <?php } ?>>SUNDRIES<br>
									<?php } ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Active</label>
									<?php if ($action == "new") { ?>
										<select name="active" id="activeid">
											<option value="1" <?php echo set_select('active', '1'); ?>>True</option>
											<option value="0" <?php echo set_select('active', '0'); ?>>False</option>
										</select>
									<?php } if ($action == "edit") { ?>
										<select name="active" id="activeid">											
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
							
							<a href="<?php echo base_url();?>admincontrol/supplieraction"><button type="button" class="btn btn-warning btn-fill pull-left">Back</button></a>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

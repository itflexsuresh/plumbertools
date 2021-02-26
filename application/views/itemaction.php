<?php 
$imgarray = isset($getdata['image']) ? explode(',', $getdata['image']) : '';
if ($imgarray !='') {
	$imgcount = count($imgarray);
}else{
	$imgcount = '';
}

?>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="header">
					<?php if ($action == "new") { ?>
						<h4 class="title">Items Manager</h4>
					<?php } if ($action == "edit") { ?>
						<h4 class="title">Update Items Manager</h4>
					<?php } ?>
					</div>
					<div class="content">
						<form method="post" action="<?php echo base_url();?>admincontrol/itemaction"  enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Category</label>
									<?php if ($action == "new") { ?>
										<select name="categoryid" id="categoryid">
											<option value="">Select</option>
											<?php foreach($categorydata as $row1){?>
												<option value="<?php echo $row1['id']; ?>" <?php echo set_select('categoryid', $row1['id']); ?>><?php echo $row1['category']; ?></option>
											<?php } ?>
										</select>
									<?php } if ($action == "edit") { ?>
										<select name="categoryid" id="categoryid">
											<option value="">Select</option>
											<?php foreach($categorydata as $row1){?><option value="<?php echo $row1['id'];?>" 
												<?php echo set_select('categoryid', $row1['id']); if($row1['id']==$getdata['categoryid']){ ?> selected <?php } ?>><?php echo $row1['category']; ?></option>
											<?php } ?>
										</select>
									<?php } ?>
										<span style='color: red'><?php echo form_error('categoryid'); ?></span>
									</div>
								</div>
							</div>							
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Location</label>
									<?php if ($action == "new") { ?>
										<select name="locationid" id="locationid">
											<option value="">Select</option>
											<?php foreach($locationdata as $row1){?>
												<option value="<?php echo $row1['id']; ?>" <?php echo set_select('locationid', $row1['id']); ?>><?php echo $row1['location']; ?></option>
											<?php } ?>
										</select>
									<?php } if ($action == "edit") { ?>
										<select name="locationid" id="locationid">
											<option value="">Select</option>
											<?php foreach($locationdata as $row1){?><option value="<?php echo $row1['id'];?>" 
												<?php echo set_select('locationid', $row1['id']); if($row1['id']==$getdata['locationid']){ ?> selected <?php } ?>><?php echo $row1['location']; ?></option>
											<?php } ?>
										</select>
									<?php } ?>
										<span style='color: red'><?php echo form_error('locationid'); ?></span>
									</div>
								</div>
							</div>							
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
										<label>Image</label>
									<?php if ($action == "new") { ?>
										<input name="imagefile[]" type="file" class="form-control" placeholder="Image" multiple>
									<?php } if ($action == "edit") { 
										if ($imgcount > '1') {
											foreach ($imgarray as $key => $value) { ?>
												<a href="<?php echo base_url();?>./images/<?php echo $value;?>" target="_blank"><img src="<?php echo base_url();?>./images/<?php echo $value;?>" height="50" width="50"></a>
											<?php }
										}else{ ?>
												<a href="<?php echo base_url();?>./images/<?php echo $getdata['image'];?>" target="_blank"><img src="<?php echo base_url();?>./images/<?php echo $getdata['image'];?>" height="50" width="50"></a>
										<?php }
										?>
										
										<input name="imagefile[]" type="file" class="form-control" placeholder="Image" multiple >
										<input type="hidden" name="itemimghidden" value="<?php echo $getdata['image']; ?>">
									<?php } ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Description</label>
									<?php if ($action == "new") { ?>
										<textarea name="description" rows="5" class="form-control" placeholder="Description" value=""><?php echo set_value('description'); ?></textarea>
									<?php } if ($action == "edit") { ?>
										<textarea name="description" rows="5" class="form-control" placeholder="Description"><?php echo set_value('description',$getdata['description']); ?></textarea>
									<?php } ?>
									</div>
								</div>
							</div>
							<!-- <div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Manufacturer Brand</label>
									<?php // if ($action == "new") { ?>
										<input name="manufacturerbrand" type="text" class="form-control" placeholder="Manufacturer Brand" value="<?php // echo set_value('manufacturerbrand'); ?>">
									<?php // } // if ($action == "edit") { ?>
										<input name="manufacturerbrand" type="text" class="form-control" placeholder="Manufacturer Brand" value="<?php // echo set_value('manufacturerbrand',$getdata['manufacturerbrand']);?>">
									<?php // } ?>
									</div>
								</div>
							</div> -->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Price</label>
									<?php if ($action == "new") { ?>
										<input name="price" type="text" class="form-control" placeholder="Price" value="<?php echo set_value('price'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="price" type="text" class="form-control" placeholder="Price" value="<?php echo set_value('price',$getdata['price']);?>">
									<?php } ?>
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
										<label>Cell Phone</label>
									<?php if ($action == "new") { ?>
										<input name="cellphone" type="text" class="form-control" placeholder="Cell Phone" value="<?php echo set_value('cellphone'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="cellphone" type="text" class="form-control" placeholder="Cell Phone" value="<?php echo set_value('cellphone',$getdata['cellphone']);?>">
									<?php } ?>
									<span style='color: red'><?php echo form_error('cellphone'); ?></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Email</label>
									<?php if ($action == "new") { ?>
										<input name="email" type="text" class="form-control" placeholder="Email" value="<?php echo set_value('email'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="email" type="text" class="form-control" placeholder="Email" value="<?php echo set_value('email',$getdata['email']);?>">
									<?php } ?>
									<span style='color: red'><?php echo form_error('email'); ?></span>
									</div>
								</div>
							</div>							
							<!-- <div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Address</label>
									<?php //if ($action == "new") { ?>
										<textarea name="address" rows="5" class="form-control" placeholder="Address" value=""><?php //echo set_value('address'); ?></textarea>
									<?php // } if ($action == "edit") { ?>
										<textarea name="address" rows="5" class="form-control" placeholder="Address"><?php //echo set_value('address',$getdata['address']); ?></textarea>
									<?php  // } ?>
									</div>
								</div>
							</div> -->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Approve</label>
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
							
						<?php if (isset($permission) && ($permission =='1')) { ?>
						<?php if ($action == "new") { ?>
							<input name="insert" type="hidden" value="1">
							<button type="submit" class="btn btn-info btn-fill pull-left">Save</button>						
						<?php } if ($action == "edit") { ?>
							<input name="update" type="hidden" value="1">
							<input name="updateid" type="hidden" value="<?php echo $getdata['id']; ?>">
							<input name="udid" type="hidden" value="<?php echo $getdata['uid']; ?>">
							<button type="submit" class="btn btn-info btn-fill pull-left">Update</button>
						<?php } ?>
						<?php } ?>
							
							<a href="<?php echo base_url();?>admincontrol/itemaction"><button type="button" class="btn btn-warning btn-fill pull-left">Back</button></a>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

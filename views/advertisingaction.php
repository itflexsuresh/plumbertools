
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="header">
					<?php if ($action == "new") { ?>
						<h4 class="title">Advert Manager</h4>
					<?php } if ($action == "edit") { ?>
						<h4 class="title">Update Advert Manager</h4>
					<?php } ?>
					</div>
					<div class="content">
						<form method="post" action="<?php echo base_url();?>admincontrol/advertisingaction"  enctype="multipart/form-data">
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
										<label>Client</label>
									<?php if ($action == "new") { ?>
										<input name="client" type="text" class="form-control" placeholder="Client" value="<?php echo set_value('client'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="client" type="text" class="form-control" placeholder="Client" value="<?php echo set_value('client',$getdata['client']); ?>">
									<?php } ?>
										<span style='color: red'><?php echo form_error('client'); ?></span>
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
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Image</label>
									<?php if ($action == "new") { ?>
										<input name="imagefile" type="file" class="form-control" placeholder="Image" value="<?php echo set_value('imagefile'); ?>">
									<?php } if ($action == "edit") { ?>
										<img src="<?php echo base_url();?>./images/<?php echo $getdata['image'];?>" height="50" width="50">
										<input name="imagefile" type="file" class="form-control" placeholder="Image" value="<?php echo set_value('imagefile',$getdata['image']); ?>">
									<?php } ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>URL</label>
									<?php if ($action == "new") { ?>
										<input name="url" type="text" class="form-control" placeholder="URL" value="<?php echo set_value('url'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="url" type="text" class="form-control" placeholder="URL" value="<?php echo set_value('url',$getdata['url']);?>">
									<?php } ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Page Name</label>
									<?php if ($action == "new") { ?>
										<select name="pagenameid" id="pagenameid">
											<option value="">Select</option>
											<?php foreach($pagenamedata as $row1){?>
												<option value="<?php echo $row1['id']; ?>" <?php echo set_select('pagenameid', $row1['id']); ?>><?php echo $row1['name']; ?></option>
											<?php } ?>
										</select>
									<?php } if ($action == "edit") { ?>
										<select name="pagenameid" id="pagenameid">
											<option value="">Select</option>
											<?php foreach($pagenamedata as $row1){?><option value="<?php echo $row1['id'];?>" 
												<?php echo set_select('pagenameid', $row1['id']); if($row1['id']==$getdata['pagenameid']){ ?> selected <?php } ?>><?php echo $row1['name']; ?></option>
											<?php } ?>
										</select>
									<?php } ?>
										<span style='color: red'><?php echo form_error('pagenameid'); ?></span>
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
							
						<?php if ($action == "new") { ?>
							<input name="insert" type="hidden" value="1">
							<button type="submit" class="btn btn-info btn-fill pull-left">Save</button>						
						<?php } if ($action == "edit") { ?>
							<input name="update" type="hidden" value="1">
							<input name="updateid" type="hidden" value="<?php echo $getdata['id']; ?>">
							<button type="submit" class="btn btn-info btn-fill pull-left">Update</button>
						<?php } ?>
							
							<a href="<?php echo base_url();?>admincontrol/advertisingaction"><button type="button" class="btn btn-warning btn-fill pull-left">Back</button></a>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

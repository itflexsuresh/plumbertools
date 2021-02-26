

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="header">
					<?php if ($action == "new") { ?>
						<h4 class="title">PIRB Cost Manager</h4>
					<?php } if ($action == "edit") { ?>
						<h4 class="title">Update PIRB Cost Manager</h4>
					<?php } ?>
					</div>

					<div class="content">
						<form method="post" action="<?php echo base_url();?>admincontrol/pirb_costaction"  enctype="multipart/form-data">

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Category</label>
									<?php if ($action == "new") { ?>
										<select name="categoryid" id="categoryid" class="form-control" >
											<option value="">Select</option>
											<?php foreach($categorydata as $row1){?>
												<option value="<?php echo $row1['id']; ?>" <?php echo set_select('categoryid', $row1['id']); ?>><?php echo $row1['category']; ?></option>
											<?php } ?>
										</select>
									<?php } if ($action == "edit") { ?>
										<select name="categoryid" id="categoryid" class="form-control" >
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
										<label>Name</label>
									<?php if ($action == "new") { ?>										
										<input name="name" type="text" class="form-control" placeholder="Name" value="<?php echo set_value('name'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="name" type="text" class="form-control" placeholder="Name" value="<?php echo set_value('name',$getdata['name']); ?>">
									<?php } ?>
										<span style='color: red'><?php echo form_error('name'); ?></span>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Cost</label>
									<?php if ($action == "new") { ?>										
										<input name="cost" type="text" class="form-control" placeholder="Cost" value="<?php echo set_value('cost'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="cost" type="text" class="form-control" placeholder="Cost" value="<?php echo set_value('cost',$getdata['cost']); ?>">
									<?php } ?>
										<span style='color: red'><?php echo form_error('cost'); ?></span>
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
							
							<a href="<?php echo base_url();?>admincontrol/pirb_costaction"><button type="button" class="btn btn-warning btn-fill pull-left">Back</button></a>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="header">
					<?php if ($action == "new") { ?>
						<h4 class="title">IOPSA Province Manager</h4>
					<?php } if ($action == "edit") { ?>
						<h4 class="title">Update IOPSA Province Manager</h4>
					<?php } ?>
					</div>
					<div class="content">
						<form method="post" action="<?php echo base_url();?>admincontrol/iopsa_provinceaction"  enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Province</label>
									<?php if ($action == "new") { ?>										
										<input name="province" type="text" class="form-control" placeholder="province" value="<?php echo set_value('province'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="province" type="text" class="form-control" placeholder="province" value="<?php echo set_value('province',$getdata['province']); ?>">
									<?php } ?>
										<span style='color: red'><?php echo form_error('province'); ?></span>
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
							
							<a href="<?php echo base_url();?>admincontrol/iopsa_provinceaction"><button type="button" class="btn btn-warning btn-fill pull-left">Back</button></a>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="header">
					<?php if ($action == "new") { ?>
						<h4 class="title">Content Manager</h4>
					<?php } if ($action == "edit") { ?>
						<h4 class="title">Update Content Manager</h4>
					<?php } ?>
					</div>
					<div class="content">
						<form method="post" action="<?php echo base_url();?>admincontrol/popupnotificationaction"  enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Heading</label>
									<?php if ($action == "new") { ?>										
										<input name="heading" type="text" class="form-control" placeholder="Heading" value="<?php echo set_value('heading'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="heading" type="text" class="form-control" placeholder="Heading" value="<?php echo set_value('heading',$getdata['heading']); ?>">
									<?php } ?>
										<span style='color: red'><?php echo form_error('heading'); ?></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Text</label>
									<?php if ($action == "new") { ?>										
										<input name="text" type="text" class="form-control" placeholder="Text" value="<?php echo set_value('text'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="text" type="text" class="form-control" placeholder="Text" value="<?php echo set_value('text',$getdata['text']); ?>">
									<?php } ?>
										<span style='color: red'><?php echo form_error('text'); ?></span>
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
										<input name="url" type="text" class="form-control" placeholder="URL" value="<?php echo set_value('url',$getdata['url']); ?>">
									<?php } ?>
										<span style='color: red'><?php echo form_error('url'); ?></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>URL Text</label>
									<?php if ($action == "new") { ?>										
										<input name="urltext" type="text" class="form-control" placeholder="URL Text" value="<?php echo set_value('urltext'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="urltext" type="text" class="form-control" placeholder="URL Text" value="<?php echo set_value('urltext',$getdata['urltext']); ?>">
									<?php } ?>
										<span style='color: red'><?php echo form_error('urltext'); ?></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class='input-group date' id='datetimepicker1'>
										<label>Active Date</label>
									<?php if ($action == "new") { ?>
										<input name="activedate" type='text' class="form-control" placeholder="Active Date" value="<?php echo set_value('activedate'); ?>"/> 
										<span class="input-group-addon" style="display:block; background-color:red; width:100px;"> <span class="pe-7s-calculator"></span> </span>
									<?php } if ($action == "edit") { ?>
										<input name="activedate" type='text' class="form-control" placeholder="Active Date" value="<?php echo set_value('activedate',date("m/d/Y", strtotime($getdata['activedate']))); ?>"/> 
										<span class="input-group-addon" style="display:block; background-color:red; width:100px;"> <span class="pe-7s-calculator"></span> </span>	
									<?php } ?>
										<span style='color: red'><?php echo form_error('activedate'); ?></span>
									</div> 									
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="input-group date" id="datetimepicker2">
										<label>Inactive Date</label>
									<?php if ($action == "new") { ?>										
										<input name="inactivedate" type="text" class="form-control" placeholder="Inactive Date" value="<?php echo set_value('inactivedate'); ?>">
										<span class="input-group-addon" style="display:block; background-color:red; width:100px;"> <span class="pe-7s-calculator"></span> </span>
									<?php } if ($action == "edit") { ?>
										<input name="inactivedate" type="text" class="form-control" placeholder="Inactive Date" value="<?php echo set_value('inactivedate',date("m/d/Y", strtotime($getdata['inactivedate']))); ?>">
										<span class="input-group-addon" style="display:block; background-color:red; width:100px;"> <span class="pe-7s-calculator"></span> </span>
									<?php } ?>
										<span style='color: red'><?php echo form_error('inactivedate'); ?></span>
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
							
							
						<?php if ($action == "new") { ?>
							<input name="insert" type="hidden" value="1">
							<button type="submit" class="btn btn-info btn-fill pull-left">Save</button>						
						<?php } if ($action == "edit") { ?>
							<input name="update" type="hidden" value="1">
							<input name="updateid" type="hidden" value="<?php echo $getdata['id']; ?>">
							<button type="submit" class="btn btn-info btn-fill pull-left">Update</button>
						<?php } ?>
							
							<a href="<?php echo base_url();?>admincontrol/popupnotificationaction"><button type="button" class="btn btn-warning btn-fill pull-left">Back</button></a>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(function(){
	$('#datetimepicker1').datepicker();
	$('#datetimepicker2').datepicker();
})
 </script>
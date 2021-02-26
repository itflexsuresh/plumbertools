
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
						<form method="post" action="<?php echo base_url();?>admincontrol/radioaction"  enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Title</label>
									<?php if ($action == "new") { ?>										
										<input name="title" type="text" class="form-control" placeholder="Title" value="<?php echo set_value('title'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="title" type="text" class="form-control" placeholder="Title" value="<?php echo set_value('title',$getdata['title']); ?>">
									<?php } ?>
										<span style='color: red'><?php echo form_error('title'); ?></span>
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
										<label>Link</label>
									<?php if ($action == "new") { ?>
										<input name="link" type="text" class="form-control" placeholder="Link" value="<?php echo set_value('link'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="link" type="text" class="form-control" placeholder="Link" value="<?php echo set_value('link',$getdata['link']);?>">
									<?php } ?>
									<span style='color: red'><?php echo form_error('link'); ?></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
									<?php if ($action == "new") { ?>										
										<input name="livestreamlink" type="checkbox" class="" value="1" <?php echo set_checkbox('livestreamlink', '1'); ?>> Live Stream Link<br>										
									<?php } if ($action == "edit") { ?>
										<input name="livestreamlink" type="checkbox" class="" value="1" <?php echo set_checkbox('livestreamlink', '1'); if($getdata['livestreamlink'] == '1'){?> checked <?php } ?>> Live Stream Link<br>
									<?php } ?>
									<span style='color: red'><?php echo form_error('livestreamlink'); ?></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class='input-group date' id='datetimepicker1'>
										<label>Date</label>
									<?php if ($action == "new") { ?>
										<input name="date" type='text' class="form-control" placeholder="Date" value="<?php echo set_value('date'); ?>"/> 
										<span class="input-group-addon" style="display:block; background-color:red; width:100px;"> <span class="pe-7s-calculator"></span> </span>
									<?php } if ($action == "edit") { ?>
										<input name="date" type='text' class="form-control" placeholder="Date" value="<?php echo set_value('date',date("m/d/Y", strtotime($getdata['date']))); ?>"/> 
										<span class="input-group-addon" style="display:block; background-color:red; width:100px;"> <span class="pe-7s-calculator"></span> </span>	
									<?php } ?>
										<span style='color: red'><?php echo form_error('date'); ?></span>
									</div>
									
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-6">
									<div class='input-group date'>
										<label>Time</label>
									<?php if ($action == "new") { ?>
										<input name="time" id='datetimepicker2' type='text' class="form-control" placeholder="Time" value="<?php echo set_value('time'); ?>"/> 
										<!--<span class="input-group-addon" style="display:block; background-color:red; width:100px;"> <span class="pe-7s-calculator"></span> </span>-->
									<?php } if ($action == "edit") { ?>
										<input name="time" id='datetimepicker2' type="text" class="form-control" placeholder="Time" value="<?php echo set_value('time',$getdata['time']);?>">
										<!--<span class="input-group-addon" style="display:block; background-color:red; width:100px;"> <span class="pe-7s-calculator"></span> </span>-->
									<?php } ?>
										<span style='color: red'><?php echo form_error('time'); ?></span>
									</div>
									
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Duration</label>
									<?php if ($action == "new") { ?>
										<input name="duration" type="text" class="form-control" placeholder="Duration" value="<?php echo set_value('duration'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="duration" type="text" class="form-control" placeholder="Duration" value="<?php echo set_value('duration',$getdata['duration']);?>">
									<?php } ?>
									<span style='color: red'><?php echo form_error('duration'); ?></span>
									</div>
								</div>
							</div>							
							<div class="row">
								<div class="col-md-6">
									<div class='input-group date' id='datetimepicker3'>
										<label>Inactive Date</label>
									<?php if ($action == "new") { ?>
										<input name="inactivedate" type='text' class="form-control" placeholder="Inactive date" value="<?php echo set_value('inactivedate'); ?>"/> 
										<span class="input-group-addon" style="display:block; background-color:red; width:100px;"> <span class="pe-7s-calculator"></span> </span>
									<?php } if ($action == "edit") { ?>
										<input name="inactivedate" type='text' class="form-control" placeholder="Inactivedate" value="<?php echo set_value('inactivedate',date("m/d/Y", strtotime($getdata['inactivedate']))); ?>"/> 
										<span class="input-group-addon" style="display:block; background-color:red; width:100px;"> <span class="pe-7s-calculator"></span> </span>
									<?php } ?>
										<span style='color: red'><?php echo form_error('inactivedate'); ?></span>
									</div>
									
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Active</label>
									<?php if ($action == "new") { ?>
										<select name="activeid" id="activeid">
											<option value="1" <?php echo set_select('activeid', '1'); ?>>True</option>
											<option value="0" <?php echo set_select('activeid', '0'); ?>>False</option>
										</select>
									<?php } if ($action == "edit") { ?>
										<select name="activeid" id="activeid">											
											<option value="1" <?php echo set_select('activeid', '1'); if($getdata['active'] == "1"){ ?> selected <?php } ?> >True</option>											
											<option value="0" <?php echo set_select('activeid', '0'); if($getdata['active'] == "0"){ ?> selected<?php } ?> >False</option>											
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
							
							<a href="<?php echo base_url();?>admincontrol/radioaction"><button type="button" class="btn btn-warning btn-fill pull-left">Back</button></a>
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
	$('#datetimepicker3').datepicker();
	
	$('#datetimepicker2').timepicker({ 'scrollDefault': 'now','timeFormat': 'H:i' });
	
	
})
 </script>
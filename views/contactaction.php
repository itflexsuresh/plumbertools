<style>
#errmsg
{
color: red;
}
</style>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="header">
					<?php if ($action == "new") { ?>
						<h4 class="title">Contact Us Manager</h4>
					<?php } if ($action == "edit") { ?>
						<h4 class="title">Update Contact Us Manager</h4>
					<?php } ?>
					</div>
					<div class="content">
						<form method="post" action="<?php echo base_url();?>admincontrol/contactaction"  enctype="multipart/form-data">
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
										<label>Mobile</label>
									<?php if ($action == "new") { ?>										
										<input name="mobile" id="mobile" type="text" class="form-control" placeholder="Mobile" value="<?php echo set_value('mobile'); ?>">
										<span id="errmsg"></span>
									<?php } if ($action == "edit") { ?>
										<input name="mobile" id="mobile" type="text" class="form-control" placeholder="Mobile" value="<?php echo set_value('mobile',$getdata['mobile']); ?>">
										<span id="errmsg"></span>
									<?php } ?>
										<span style='color: red'><?php echo form_error('mobile'); ?></span>
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
										<label>Message</label>
									<?php if ($action == "new") { ?>
										<textarea name="message" rows="5" class="form-control" placeholder="Message" value=""><?php echo set_value('message'); ?></textarea>
									<?php } if ($action == "edit") { ?>
										<textarea name="message" rows="5" class="form-control" placeholder="Message"><?php echo set_value('message',$getdata['message']); ?></textarea>
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
							
							<a href="<?php echo base_url();?>admincontrol/contactaction"><button type="button" class="btn btn-warning btn-fill pull-left">Back</button></a>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#mobile").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
 </script>
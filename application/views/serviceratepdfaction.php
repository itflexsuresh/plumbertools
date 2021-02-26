
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
						<form method="post" action="<?php echo base_url();?>admincontrol/serviceratepdfaction"  enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Content</label>
									<?php if ($action == "new") { ?>										
										<input name="content" type="text" class="form-control" placeholder="Content" value="<?php echo set_value('content'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="content" type="text" class="form-control" placeholder="Content" value="<?php echo set_value('content',$getdata['content']); ?>">
									<?php } ?>
										<span style='color: red'><?php echo form_error('content'); ?></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Image</label>
									<?php if ($action == "new") { ?>
										<input name="imagefile" type="file" class="form-control" placeholder="Image" value="<?php echo set_value('imagefile'); ?>">
									<?php } if ($action == "edit") { 
										$documenttype= pathinfo($getdata['document'], PATHINFO_EXTENSION);
										if($documenttype == "pdf")
											$document="pdf.png";
										else
											$document=$getdata['document'];
										
									?>
										<img src="<?php echo base_url();?>./images/<?php echo $document;?>" height="50" width="50">
										<input name="imagefile" type="file" class="form-control" placeholder="Image" value="<?php echo set_value('imagefile',$getdata['document']); ?>">
									<?php } ?>
									<span style='color: red'><?php echo form_error('imagefile'); ?></span>
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
							
							<a href="<?php echo base_url();?>admincontrol/serviceratepdfaction"><button type="button" class="btn btn-warning btn-fill pull-left">Back</button></a>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="header">
					<?php if ($action == "new") { ?>
						<h4 class="title">Magazine Manager</h4>
					<?php } if ($action == "edit") { ?>
						<h4 class="title">Update Magazine Manager</h4>
					<?php } ?>
					</div>
					<div class="content">
						<form method="post" action="<?php echo base_url();?>admincontrol/newsaction"  enctype="multipart/form-data">
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
										<label>Detail</label>
									<?php if ($action == "new") { ?>
										<textarea name="detail" rows="5" class="form-control ckeditor" placeholder="Detail" value=""><?php echo set_value('detail'); ?></textarea>
									<?php } if ($action == "edit") { ?>
										<textarea name="detail" rows="5" class="form-control ckeditor" placeholder="Detail"><?php echo set_value('detail',$getdata['detail']); ?></textarea>
									<?php } ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Description</label>
									<?php if ($action == "new") { ?>
										<textarea name="description" rows="5" class="form-control ckeditor" placeholder="Description" value=""><?php echo set_value('description'); ?></textarea>
									<?php } if ($action == "edit") { ?>
										<textarea name="description" rows="5" class="form-control ckeditor" placeholder="Description"><?php echo set_value('description',$getdata['description']); ?></textarea>
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
							
						<?php if ($action == "new") { ?>
							<input name="insert" type="hidden" value="1">
							<button type="submit" class="btn btn-info btn-fill pull-left">Save</button>						
						<?php } if ($action == "edit") { ?>
							<input name="update" type="hidden" value="1">
							<input name="updateid" type="hidden" value="<?php echo $getdata['id']; ?>">
							<button type="submit" class="btn btn-info btn-fill pull-left">Update</button>
						<?php } ?>
							
							<a href="<?php echo base_url();?>admincontrol/newsaction"><button type="button" class="btn btn-warning btn-fill pull-left">Back</button></a>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

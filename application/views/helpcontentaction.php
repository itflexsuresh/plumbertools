
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
						<form method="post" action="<?php echo base_url();?>admincontrol/helpcontentaction"  enctype="multipart/form-data">
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
										<label>Body</label>
									<?php if ($action == "new") { ?>
										<textarea id="basic-example" name="body" rows="5" class="form-control ckeditor" placeholder="Body" value=""><?php echo set_value('body'); ?></textarea>
									<?php } if ($action == "edit") { ?>
										<textarea name="body" rows="5" class="form-control ckeditor" placeholder="Body"><?php echo set_value('body',$getdata['body']); ?></textarea>
									<?php } ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Section</label>
									<?php if ($action == "new") { ?>
										<select name="sectionid" id="sectionid">
											<option value="">Select</option>
											<?php foreach($sectiondata as $row1){?>
												<option value="<?php echo $row1['id']; ?>" <?php echo set_select('sectionid', $row1['id']); ?>><?php echo $row1['name']; ?></option>
											<?php } ?>
										</select>
									<?php } if ($action == "edit") { ?>
										<select name="sectionid" id="sectionid">
											<option value="">Select</option>
											<?php foreach($sectiondata as $row1){?><option value="<?php echo $row1['id'];?>" 
												<?php echo set_select('sectionid', $row1['id']); if($row1['id']==$getdata['sectionid']){ ?> selected <?php } ?>><?php echo $row1['name']; ?></option>
											<?php } ?>
										</select>
									<?php } ?>
										<span style='color: red'><?php echo form_error('sectionid'); ?></span>
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
							
							<a href="<?php echo base_url();?>admincontrol/helpcontentaction"><button type="button" class="btn btn-warning btn-fill pull-left">Back</button></a>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

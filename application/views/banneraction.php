
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="header">
					<?php if ($action == "new") { ?>
						<h4 class="title">Banner Manager</h4>
					<?php } if ($action == "edit") { ?>
						<h4 class="title">Update Banner Manager</h4>
					<?php } ?>
					</div>
					<div class="content">
						<form method="post" action="<?php echo base_url();?>admincontrol/banneraction"  enctype="multipart/form-data">
							
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
									<span style='color: red'><?php echo form_error('imagefile'); ?></span>
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
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Active</label>
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
							
							
						<!--<label>TopBottom</label>-->
						<?php if ($action == "new") { ?>										
							<input name="topbottom" type="hidden" class="form-control" placeholder="TopBottom" value="<?php echo set_value('topbottom',$topbottom); ?>">
						<?php } if ($action == "edit") { ?>
							<input name="topbottom" type="hidden" class="form-control" placeholder="TopBottom" value="<?php echo set_value('topbottom',$getdata['topbottom']); ?>">
						<?php } ?>
							
							<!--<label>Pagesid</label>-->
						<?php if ($action == "new") { ?>										
							<input id="pagesid" name="pagesid" type="hidden" class="form-control" placeholder="Pagesid" value="<?php echo set_value('pagesid',$pagesid); ?>">
						<?php } if ($action == "edit") { ?>
							<input id="pagesid" name="pagesid" type="hidden" class="form-control" placeholder="Pagesid" value="<?php echo set_value('pagesid',$getdata['pagesid']); ?>">
						<?php } ?>										
						
						<?php if (isset($permission) && ($permission =='1')) { ?>
						<?php if ($action == "new") { ?>							
							<input name="insert" type="hidden" value="1">
							<button type="submit" class="btn btn-info btn-fill pull-left">Save</button>						
						<?php } if ($action == "edit") { ?>
							<input name="update" type="hidden" value="1">
							<input name="updateid" type="hidden" value="<?php echo $getdata['id']; ?>">
							<button type="submit" class="btn btn-info btn-fill pull-left">Update</button>
						<?php } ?>
						<?php } ?>
							
							<button id="backbutton" type="button" class="btn btn-warning btn-fill pull-left">Back</button>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#backbutton').click(function(){
		var pagesid = $('#pagesid').val();
		var url = '<?php echo base_url().'admincontrol/banneraction'; ?>';
		$('<form method="post" action="'+url+'"><input type="hidden" name="pagesid" value="'+pagesid+'"></form>').appendTo('body').submit();		
	});
</script>
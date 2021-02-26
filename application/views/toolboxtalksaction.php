
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
						<form method="post" class="form" action="<?php echo base_url();?>admincontrol/toolboxtalksaction"  enctype="multipart/form-data">

							<div class="row">
								<div class="col-md-12 rdo--btns">
									<div class="form-group">
										<label>PDF</label>
										<input name="selecttype" type="radio" id="pdf-radio" class="custom-control-input" placeholder="PDF" <?php echo set_radio('selecttype', '2'); if(isset($getdata['type']) && $getdata['type'] =='2'){ echo "checked='checked'"; } ?> value="2">
									</div>
									<div class="form-group">
										<label>Image/Text</label>
										<input name="selecttype" type="radio" id="text-radio" class="custom-control-input" placeholder="Image/Text" <?php echo set_radio('selecttype', '1'); if(isset($getdata['type']) && $getdata['type'] =='1'){ echo "checked='checked'"; }?> value="1">
									</div>
								</div>
							</div>

							<div class="pdfdiv hiddentrue">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Content</label>
										<?php if ($action == "new") { ?>										
											<input name="pdfcontent" type="text" class="form-control" placeholder="Content" value="<?php echo set_value('pdfcontent'); ?>">
										<?php } if ($action == "edit") { ?>
											<input name="pdfcontent" type="text" class="form-control" placeholder="Content" value="<?php echo set_value('pdfcontent',$getdata['content']); ?>">
										<?php } ?>
											<span style='color: red'><?php echo form_error('pdfcontent'); ?></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>PDF</label>
										<?php if ($action == "new") { ?>
											<input name="pdffile" type="file" class="form-control pdfupload" placeholder="PDF" value="<?php echo set_value('pdffile'); ?>">
										<?php } if ($action == "edit") {
										if( $getdata['file'] !=''){ ?>
											<a href="<?php echo base_url();?>./images/<?php echo $getdata['file'];?>" target="_blank"><img src="<?php echo base_url();?>./images/pdf.png" height="50" width="50"></a>
										<?php } ?>
											<input name="pdffile" type="file" class="form-control pdfupload" placeholder="PDF" value="<?php echo set_value('pdffile',$getdata['file']); ?>">
										<?php } ?>
										</div>
										<span style='color: red'><?php echo form_error('pdffile'); ?></span>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Feature Image</label>
										<?php if ($action == "new") { ?>
											<input name="featfile" type="file" class="form-control featupload" placeholder="Feature Image" value="<?php echo set_value('featfile'); ?>">
										<?php } if ($action == "edit") {
										if($getdata['type'] =='2' && $getdata['feat_file'] !=''){ ?>
											<a href="<?php echo base_url();?>./images/<?php echo $getdata['feat_file'];?>" target="_blank"><img src='<?php echo base_url();?>./images/<?php echo $getdata['feat_file'];?>' height="50" width="50"></a>
										<?php } ?>
											<input name="featfile" type="file" class="form-control featupload" placeholder="Feature Image" value="<?php echo set_value('featfile',$getdata['feat_file']); ?>">
										<?php } ?>
										</div>
										<span style='color: red'><?php echo form_error('featfile'); ?></span>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Position</label>
										<?php if ($action == "new") { ?>
											<input name="pdfposition" type="text" class="form-control" placeholder="Position" value="<?php echo set_value('pdfposition'); ?>">
										<?php } if ($action == "edit") { ?>
											<input name="pdfposition" type="text" class="form-control" placeholder="Position" value="<?php echo set_value('pdfposition',$getdata['position']);?>">
										<?php } ?>
										<span style='color: red'><?php echo form_error('pdfposition'); ?></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Published</label>
										<?php if ($action == "new") { ?>
											<select name="pdfpublishid" id="pdfpublishid">
												<option value="1" <?php echo set_select('pdfpublishid', '1'); ?>>True</option>
												<option value="0" <?php echo set_select('pdfpublishid', '0'); ?>>False</option>
											</select>
										<?php } if ($action == "edit") { ?>
											<select name="pdfpublishid" id="pdfpublishid">											
												<option value="1" <?php echo set_select('pdfpublishid', '1'); if($getdata['published'] == "1"){ ?> selected <?php } ?> >True</option>											
												<option value="0" <?php echo set_select('pdfpublishid', '0'); if($getdata['published'] == "0"){ ?> selected<?php } ?> >False</option>
											</select>
										<?php } ?>
										</div>
									</div>
								</div>
							</div>

							<div class="textimage hiddentrue">
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
											<label>Background Color code</label>
										<?php if ($action == "new") { ?>
											<input name="bgcolorcode" type="text" class="form-control" placeholder="Background Color" value="<?php echo set_value('bgcolorcode'); ?>">
										<?php } if ($action == "edit") { ?>
											<input name="bgcolorcode" type="text" class="form-control" placeholder="Background Color" value="<?php echo set_value('bgcolorcode',$getdata['bgcolorcode']);?>">
										<?php } ?>
										<span style='color: red'><?php echo form_error('bgcolorcode'); ?></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Description</label>
										<?php if ($action == "new") { ?>
											<textarea id="basic-example" name="description" rows="5" class="form-control descriptioncls" placeholder="Description" value=""><?php echo set_value('description'); ?></textarea>
										<?php } if ($action == "edit") { ?>
											<textarea name="description" rows="5" class="form-control descriptioncls" placeholder="Description"><?php echo set_value('escription',$getdata['description']); ?></textarea>
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
										<?php } if ($action == "edit") { 
											if ($getdata['image'] !=''){
												?>
											<div class="edit-img-sec">
												<img src="<?php echo base_url();?>./images/<?php echo $getdata['image'];?>" height="50" width="50">
												<a id="delete-img-tag" href="javascript:void(0)"><img style="margin-top: -53px;display: inline-block !important;" id="delete-img" src="<?php echo base_url();?>./assets/img/delete.jpg" height="15" width="15"></a> 
											</div>
										<?php }?>
											<input name="imagefile" type="file" class="form-control" id="filechooser" placeholder="Image" value="<?php echo set_value('imagefile',$getdata['image']); ?>">
											<input type="hidden" id="imgselector" name="imgselector" value="<?php if($getdata['image'] !=''){ echo "1"; }else{ echo "2"; } ?>">
										<?php } ?>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Position</label>
										<?php if ($action == "new") { ?>
											<input name="position" type="text" class="form-control" placeholder="Position" value="<?php echo set_value('position'); ?>">
										<?php } if ($action == "edit") { ?>
											<input name="position" type="text" class="form-control" placeholder="Position" value="<?php echo set_value('position',$getdata['position']);?>">
										<?php } ?>
										<span style='color: red'><?php echo form_error('position'); ?></span>
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
							</div>

						<div class="btndiv hiddentrue">	
							<?php if (isset($permission) && ($permission =='1')) { ?>
							<?php if ($action == "new") { ?>
								<input name="insert" type="hidden" value="1">
								<button type="submit" class="btn btn-info btn-fill pull-left" id="save-btn">Save</button>						
							<?php } if ($action == "edit") { ?>
								<input name="update" type="hidden" value="1">
								<input name="updateid" type="hidden" value="<?php echo $getdata['id']; ?>">
								<button type="submit" class="btn btn-info btn-fill pull-left" id="update-btn">Update</button>
							<?php } ?>
							<?php } ?>
						</div>
							
							<a href="<?php echo base_url();?>admincontrol/toolboxtalksaction"><button type="button" class="btn btn-warning btn-fill pull-left" id="back-btn">Back</button></a>
							
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js?ver=2"></script>
<script type="text/javascript">
	CKEDITOR.replace( 'description', {
	width: 450,
    height: 300,
    resize_dir: 'both',
    resize_minWidth: 200,
    resize_minHeight: 300,
    resize_maxWidth: 800,
    resize_enabled: 'false',
  height: 300,
  filebrowserUploadUrl: "<?php echo base_url().'common/index/ckeeditorimageupload' ?>"

 });
	$(document).ready(function() {
		$('#delete-img-tag').click(function(){
			$(this).parent().remove();
			$('#filechooser').removeAttr('value');
			$('#imgselector').val('0');
		});
		$('#save-btn').click(function(){
			$('#save-btn').prop("disabled", true);
			$( ".form" ).submit();
			$('#back-btn').prop("disabled", true);
			// $('#update-btn').prop("disabled", true);
		});
		$('#back-btn').click(function(){
			$('#save-btn').prop("disabled", true);
			$('#update-btn').prop("disabled", true);
			$('#back-btn').prop("disabled", true);
		});
		$('#update-btn').click(function(){
			// $('#save-btn').prop("disabled", true);
			$('#back-btn').prop("disabled", true);
			$('#update-btn').prop("disabled", true);
			$( ".form" ).submit();
		});


		$('.pdfdiv').hide();
		$('.textimage').hide();
		$('.btndiv').hide();

		$('#pdf-radio').click(function(){
		// alert('pdf');
		$('.pdfdiv').show();
		$('.textimage').hide();
		$('.btndiv').show();
		});
		$('#text-radio').click(function(){
			// alert('text');
			$('.pdfdiv').hide();
			$('.textimage').show();
			$('.btndiv').show();
			
		});

		if ($('#pdf-radio').is(":checked")) {
			$('.pdfdiv').show();
			$('.textimage').hide();
			$('.btndiv').show();

		}
		else if ($('#text-radio').is(":checked")) {
			$('.pdfdiv').hide();
			$('.textimage').show();
			$('.btndiv').show();
			
		}
		else{
			$('.pdfdiv').hide();
			$('.textimage').hide();
			$('.btndiv').hide();
		}

		$('.pdfupload').on('change', function(){

	 		if($('.pdfupload').val().split('.').pop() !=='pdf'){
	 			$(".pdfupload").val('');
	 			alert('Only PDF file is allowed');
	 			return false;
	 		}
	 	});
		$('.imageupload').on('change', function(){

	 		if($('.imageupload').val().split('.').pop() ==='pdf' || $('.imageupload').val().split('.').pop() ==='gif'){
	 			$(".imageupload").val('');
	 			alert('Only Image file is allowed');
	 			return false;
	 		}
	 	});
	 	$('.featupload').on('change', function(){

	 		if($('.featupload').val().split('.').pop() ==='pdf' || $('.imageupload').val().split('.').pop() ==='gif'){
	 			$(".featupload").val('');
	 			alert('Only Image file is allowed');
	 			return false;
	 		}
	 	});
	});
</script>


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

							<div class="textimage hiddentrue">
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
											<textarea name="detail" rows="5" class="form-control" placeholder="Detail" value=""><?php echo set_value('detail'); ?></textarea>
										<?php } if ($action == "edit") { ?>
											<textarea name="detail" rows="5" class="form-control" placeholder="Detail"><?php echo set_value('detail',$getdata['detail']); ?></textarea>
										<?php } ?>
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
											<label>Front page ICON</label>
										<?php if ($action == "new") { ?>
											<input name="imagefile" type="file" class="form-control imageupload" placeholder="Image" value="<?php echo set_value('pdffile'); ?>">
										<?php } if ($action == "edit") { ?>
											<a href="<?php echo base_url();?>./images/<?php echo $getdata['file'];?>" target="_blank"><img src="<?php echo base_url();?>./images/<?php echo $getdata['file'];?>" height="50" width="50"></a>
											<input name="imagefile" type="file" class="form-control imageupload" placeholder="Image" value="<?php echo set_value('imagefile',$getdata['file']); ?>">
										<?php } ?>
										</div>
										<span style='color: red'><?php echo form_error('imagefile'); ?></span>
									</div>
								</div>
							</div>

							<div class="pdfdiv hiddentrue">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Title</label>
										<?php if ($action == "new") { ?>										
											<input name="pdftitle" type="text" class="form-control" placeholder="Title" value="<?php echo set_value('pdftitle'); ?>">
										<?php } if ($action == "edit") { ?>
											<input name="pdftitle" type="text" class="form-control" placeholder="Title" value="<?php echo set_value('pdftitle',$getdata['title']); ?>">
										<?php } ?>
											<span style='color: red'><?php echo form_error('pdftitle'); ?></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Detail</label>
										<?php if ($action == "new") { ?>
											<textarea name="pdfdetail" rows="5" class="form-control" placeholder="Detail" value=""><?php echo set_value('pdfdetail'); ?></textarea>
										<?php } if ($action == "edit") { ?>
											<textarea name="pdfdetail" rows="5" class="form-control" placeholder="Detail"><?php echo set_value('pdfdetail',$getdata['detail']); ?></textarea>
										<?php } ?>
										</div>
										<span style='color: red'><?php echo form_error('pdfdetail'); ?></span>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>PDF</label>
										<?php if ($action == "new") { ?>
											<input name="pdffile" type="file" class="form-control pdfupload" placeholder="PDF" value="<?php echo set_value('pdffile'); ?>">
										<?php } if ($action == "edit") {
										if($getdata['type'] =='2'){ ?>
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
						<div class="btndiv hiddentrue">	
							<?php if (isset($permission) && ($permission =='1')) { ?>
							<?php if ($action == "new") { ?>
								<input name="insert" type="hidden" value="1">
								<button type="submit" class="btn btn-info btn-fill pull-left">Save</button>						
							<?php } if ($action == "edit") { ?>
								<input name="update" type="hidden" value="1">
								<input name="updateid" type="hidden" value="<?php echo $getdata['id']; ?>">
								<input name="feat_file" type="hidden" value="<?php echo $getdata['feat_file']; ?>">
								<input name="files" type="hidden" value="<?php echo $getdata['file']; ?>">
								<button type="submit" class="btn btn-info btn-fill pull-left">Update</button>
							<?php } ?>
							<?php } ?>
						</div>
								
							<a href="<?php echo base_url();?>admincontrol/newsaction"><button type="button" class="btn btn-warning btn-fill pull-left">Back</button></a>
							<div class="clearfix"></div>
						
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js?ver=3"></script>
<script type="text/javascript">

CKEDITOR.replace( 'detail', {
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
CKEDITOR.replace( 'pdfdetail', {
	width: 450,
      height: 300,
      resize_dir: 'both',
      resize_minWidth: 200,
      resize_minHeight: 300,
      resize_maxWidth: 800,
      resize_enabled: 'false',

 });
// CKEDITOR.replace( 'pdfdetail');

	$(function(){
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

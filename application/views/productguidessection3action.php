
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="header">
					<?php if ($action == "new") { ?>
						<h4 class="title"><?php echo $productguidesname['content']; ?> - <?php echo $productguidessection1name['content']; ?> - <?php echo $productguidessection2name['content']; ?> -Content</h4>
					<?php } if ($action == "edit") { ?>
						<h4 class="title"><?php echo $productguidesname['content']; ?> - <?php echo $productguidessection1name['content']; ?> - <?php echo $productguidessection2name['content']; ?> -Update Content</h4>
					<?php } ?>
					</div>
					<div class="content">
						<form method="post" action="<?php echo base_url();?>admincontrol/productguidessection3action/<?php echo $productguidesid; ?>/<?php echo $productguidessection1id; ?>/<?php echo $productguidessection2id; ?>"  enctype="multipart/form-data">

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
											<input name="pdfposition" type="text" class="form-control" placeholder="Position" value="<?php echo set_value('position'); ?>">
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
											<input name="productguidesid" type="hidden" class="form-control" placeholder="Product Guides" value="<?php echo $productguidesid; ?>">
										</div>
									</div>
								</div>
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
											<label>Body</label>
										<?php if ($action == "new") { ?>
											<textarea id="basic-example" name="body" rows="5" class="form-control" placeholder="Body" value=""><?php echo set_value('body'); ?></textarea>
										<?php } if ($action == "edit") { ?>
											<textarea name="body" rows="5" class="form-control ckeditor" placeholder="Body"><?php echo set_value('body',$getdata['body']); ?></textarea>
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
							<?php if ($action == "new") { ?>
								<input name="insert" type="hidden" value="1">
								<button type="submit" class="btn btn-info btn-fill pull-left">Save</button>						
							<?php } if ($action == "edit") { ?>
								<input name="update" type="hidden" value="1">
								<input name="updateid" type="hidden" value="<?php echo $getdata['id']; ?>">
								<button type="submit" class="btn btn-info btn-fill pull-left">Update</button>
							<?php } ?>
						</div>
							
							<a href="<?php echo base_url();?>admincontrol/productguidessection3action/<?php echo $productguidesid; ?>/<?php echo $productguidessection1id; ?>/<?php echo $productguidessection2id; ?>"><button type="button" class="btn btn-warning btn-fill pull-left">Back</button></a>
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

CKEDITOR.replace( 'body', {
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

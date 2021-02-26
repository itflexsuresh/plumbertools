
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
						<form method="post" action="<?php echo base_url();?>admincontrol/custompageaction"  enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Page Name</label>
									<?php if ($action == "new") { ?>										
										<input name="pagename" type="text" class="form-control" placeholder="Page Name" value="<?php echo set_value('pagename'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="pagename" type="text" class="form-control" placeholder="Page Name" value="<?php echo set_value('pagename',$getdata['pagename']); ?>">
									<?php } ?>
										<span style='color: red'><?php echo form_error('pagename'); ?></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>NFC Tag Number</label>
									<?php if ($action == "new") { ?>										
										<input name="tagnumber" type="text" class="form-control" placeholder="NFC Tag Number" value="<?php echo set_value('tagnumber'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="tagnumber" type="text" class="form-control" placeholder="NFC Tag Number" value="<?php echo set_value('tagnumber',$getdata['tagnumber']); ?>">
									<?php } ?>
										<span style='color: red'><?php echo form_error('tagnumber'); ?></span>
									</div>
								</div>
							</div>
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
										<textarea id="full-featured" name="body" rows="5" class="form-control ckeditor" placeholder="Body" value=""><?php echo set_value('body'); ?></textarea>
									<?php } if ($action == "edit") { ?>
										<textarea name="body" rows="5" class="form-control ckeditor" placeholder="Body"><?php echo set_value('body',$getdata['body']); ?></textarea>
									<?php } ?>
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
							
							<a href="<?php echo base_url();?>admincontrol/custompageaction"><button type="button" class="btn btn-warning btn-fill pull-left">Back</button></a>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	tinymce.init({
	  selector: 'textarea#full-featured',
	  plugins: 'print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount tinymcespellchecker a11ychecker imagetools textpattern help formatpainter permanentpen pageembed tinycomments mentions linkchecker',
	  toolbar: 'formatselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter | link image media pageembed | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | removeformat | addcomment',
	  image_advtab: true,
	  content_css: [
		'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
		'//www.tiny.cloud/css/codepen.min.css'
	  ],
	  link_list: [
		{ title: 'My page 1', value: 'http://www.tinymce.com' },
		{ title: 'My page 2', value: 'http://www.moxiecode.com' }
	  ],
	  image_list: [
		{ title: 'My page 1', value: 'http://www.tinymce.com' },
		{ title: 'My page 2', value: 'http://www.moxiecode.com' }
	  ],
	  image_class_list: [
		{ title: 'None', value: '' },
		{ title: 'Some class', value: 'class-name' }
	  ],
	  importcss_append: true,
	  height: 400,
	  file_picker_callback: function (callback, value, meta) {
		/* Provide file and text for the link dialog */
		if (meta.filetype === 'file') {
		  callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
		}

		/* Provide image and alt text for the image dialog */
		if (meta.filetype === 'image') {
		  callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
		}

		/* Provide alternative source and posted for the media dialog */
		if (meta.filetype === 'media') {
		  callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
		}
	  },
	  templates: [
		{ title: 'Some title 1', description: 'Some desc 1', content: 'My content' },
		{ title: 'Some title 2', description: 'Some desc 2', content: '<div class="mceTmpl"><span class="cdate">cdate</span><span class="mdate">mdate</span>My content2</div>' }
	  ],
	  template_cdate_format: '[CDATE: %m/%d/%Y : %H:%M:%S]',
	  template_mdate_format: '[MDATE: %m/%d/%Y : %H:%M:%S]',
	  image_caption: true,
	  spellchecker_dialog: true,
	  spellchecker_whitelist: ['Ephox', 'Moxiecode'],
	  tinycomments_mode: 'embedded',
	  mentions_fetch: mentionsFetchFunction,
	  content_style: '.mce-annotation { background: #fff0b7; } .tc-active-annotation {background: #ffe168; color: black; }'
	});
</script>

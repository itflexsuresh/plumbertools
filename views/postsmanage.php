<?php 
// echo "<pre>";print_r($postdata);die;
$postimages 			= isset($postdata['post_images']) ? explode(',', $postdata['post_images']) : [];
$postreports 			= isset($postdata['post_reports']) ? explode(',', $postdata['post_reports']) : [];
$postid  				= isset($postdata['id']) ? $postdata['id'] : '';
$status 				= isset($postdata['status']) ? $postdata['status'] : '1';
$reportcount 			= count(array_filter(explode(",", $postdata['post_reports'])));
$adminreport 			= isset($postdata['admin_report']) ? $postdata['admin_report'] : '';

if ($status == '1') {
	$heading 	= 'Disable';
	$datastaus 	= '0'; 
}elseif($status == '0'){
	$heading 	= 'Enable';
	$datastaus 	= '1'; 
}

array_unshift($reportdata, "dummyindex");
unset($reportdata[0]);


$filepath 				= base_url().'images/';
$pdfimg 				= base_url().'images/pdf.png';
$profileimg 			= base_url().'icons/profile.jpg';
$uploadimg 				= base_url().'icons/upload.png';

?>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">Manage Post</h4>
						<p class="advertise_address"></p><br>
					</div>
					<div class="content">
						<form method="post" class="form1" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<p class="letter-bold"><?php echo $postdata['post_title']; ?></p>
									</div>
								</div>
							</div>
							<?php if (count(array_filter($postimages)) >= 1 || !empty($postdata['post_text'])) { ?>
							<div class="row">
								<div class="content-boder">
									<div class="row">
										<div class="col-md-6">
											<?php if (count(array_filter($postimages)) >= 1) {
												foreach ($postimages as $postimageskey => $postimagesvalue) { ?>
													<a href="<?php echo base_url().'images/'.$postimagesvalue; ?>" target="_blank"><p><img src="<?php echo base_url().'images/'.$postimagesvalue; ?>" class="postimages" width="100"></p></a>&nbsp;
												<?php }
												} ?>
										</div>
									</div>
									<p><?php echo $postdata['post_text']; ?></p>
								</div>
							</div>
							<?php } ?>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<p class="letter-bold">User Name</p>
										<?php 
										echo $postdata['username'];
										/*foreach ($tagdata as $tagdatakey => $tagdatavalue) {
											
										}*/ ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<p class="letter-bold">Date Created</p>
										<p class=""><?php echo date('d-m-Y', strtotime($postdata['created_at'])); ?></p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<p class="letter-bold">Tags</p>										
										<?php if (count(array_filter($posttaggs)) >= 1) {
											foreach ($posttaggs as $posttaggskey => $posttaggsvalue) { ?>
											<p class=""><?php echo $posttaggsvalue['tag_name'];	?></p>
										<?php }
										}else{?>											
											<p class=""><?php echo "-";	?></p>
										<?php } ?>										
									</div>
								</div>
							</div>
							<div class="row">
								<div class="content-boder">
									<p class="letter-bold">Reports</p>
									<?php 
									foreach ($reportdata as $reportdatakey => $reportdatavalue) {
										$postreportcount = array_count_values($postreports);
										if (isset($postreportcount[$reportdatakey])) {
											$count = $postreportcount[$reportdatakey];
										}else{
											$count = '0';
										}
										?>
										<p><?php echo $reportdatavalue['report_name'].' - '.$count; ?></p>
									<?php } ?>
									
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<!-- <input id="userid" name="userid" type="hidden" class="form-control" value="<?php // echo $userid; ?>"> -->
									<input id="id" name="id" type="hidden" class="form-control" value="">
									<!-- <button type="submit" class="btn btn-info btn-fill pull-left">Create Post</button>	 -->
								</div>
							</div>
							
						</form>
						<form method="post" class="form2" enctype="multipart/form-data">
							<?php if ($reportcount > 0) { ?>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Disable Post</label>

											<?php
											echo form_dropdown('reasons', $reportlists, $adminreport,['id' => 'reasons', 'class'=>'form-control']);
										?>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<?php if (isset($permission) && ($permission =='1')) { ?>
										<button type="button" id="enabledisable" data-id="<?php echo $postid; ?>" data-status="<?php echo $datastaus; ?>" class="btn btn-info btn-fill pull-left"><?php echo $heading; ?></button>
										<?php } ?>	
									</div>
								</div>
							<?php } ?>
							
						</form>

						<div class="row diarylist">
								<div class="col-md-12">
									<div class="form-group">
										<label for="diary">Admin comments and Diary</label>
										<div class="diarycontent">
											<?php 
											if (isset($diarylist)) {
											
											foreach ($diarylist as $diarylistkey => $diarylistvalue) { ?>
												<p><?php echo date('d-m-Y H:i:s', strtotime($diarylistvalue['datetime'])); 
												$diaryreason = isset($diarylistvalue['reason']) ? $diarylistvalue['reason'] : '';
												?><?php if ($diarylistvalue['adminid'] > 0) { ?> - <?php echo $userDetails['name']; }else{?><?php }?> - <?php echo $postdata['username']; ?></p>
												<p><?php echo $this->config->item('diary')[$diarylistvalue['action']].' '.$diaryreason; ?></p>
											<?php } } ?>
										</div>
									</div>
								</div>
							</div>
							<form method="post" class="form3" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="reason">Add a comment</label>

											<textarea class="form-control" id="comment" placeholder="Enter comment" name="comment"></textarea>
										</div>
									</div>
								</div>
								<?php if (isset($permission) && ($permission =='1')) { ?>
								<div class="btndiv hiddentrue">	
									<button type="button" id="commentbtn" data-id="<?php echo $postid; ?>" class="btn btn-info btn-fill pull-left">Update</button>									
								</div>
								<?php } ?>	
								<a href="<?php echo base_url();?>admincontrol/posts"><button type="button" class="btn btn-warning btn-fill pull-left" id="back-btn">Back</button></a>

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
    	var filepath 	= '<?php echo $filepath; ?>';
		var pdfimg		= '<?php echo $pdfimg; ?>';
    	fileupload([".file2_file", "./images/", ['jpg','gif','jpeg','png','tiff']], ['file2[]', '.file2append', filepath, pdfimg], 'multiple');

    	validation(
			'.form2',
			{				
				reasons : {
					required	: true,
					maxlength	: 24,
				},
			},
			{
				reasons 	: {
					required	: "Reason is required.",
				},
			},
			[],'1'
		);

		validation(
			'.form3',
			{				
				comment : {
					required	: true,
				},
			},
			{
				reasons 	: {
					required	: "Comment is required.",
				},
			},
			[],'1'
		);

		$('#enabledisable').click(function(e){
			var poststatus 	= '<?php echo $status; ?>';
			var id 			= $(this).attr('data-id');
			var status 		= $(this).attr('data-status');
			if (poststatus =='1') {
				var msg = 'disabled';
				if($('.form2').valid() ==true){
					var reason = $('#reasons').val();
					postAjaxcall(id, reason, status, msg);
				}else{
					return false;
				}
			}else{
				var msg = 'enbled';
				var reason = '';
				postAjaxcall(id, reason, status, msg);
			}
			
		})

		$('#commentbtn').click(function(e){
			var id 			= $(this).attr('data-id');
			var comment 	= $('#comment').val();

			if($('.form3').valid() ==true){
				var form_data = new FormData();
			    form_data.append("id", id);
			    form_data.append("comment", comment);
			    form_data.append("pagetype", 'admincomments');
		    	$.ajax({
			      	data: form_data,
			        type: 'POST',
			        url: '<?php echo base_url().'admincontrol/manageposts'; ?>',
			        contentType: false,
				    cache : false,
				    processData: false,
				    async: false,
		            success:function(data)
			        {
			         	sweetalertautoclose('Post comment added successfully.');
			         	location.reload();
			        }
			    });
			}else{
				return false;
			}
			
		})

    });

    function postAjaxcall(postid, reason, status, msg){
    	var form_data = new FormData();
	    form_data.append("id", postid);
	    form_data.append("status", status);
	    form_data.append("reason", reason);
	    form_data.append("pagetype", 'post_status');
    	$.ajax({
	      	data: form_data,
	        type: 'POST',
	        url: '<?php echo base_url().'admincontrol/manageposts'; ?>',
	        contentType: false,
		    cache : false,
		    processData: false,
		    async: false,
            success:function(data)
	        {
	         	sweetalertautoclose('Post '+msg+' successfully.');
	         	location.reload();
	        }
	    });
    }
</script>
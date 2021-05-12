<?php 

/* Recommit */
// echo "<pre>";print_r($diarylist); die;

$id 					= isset($getdata['id']) ? $getdata['id'] : '';
$name 					= isset($getdata['name']) ? $getdata['name'] : '';
$contact 				= isset($getdata['contact']) ? $getdata['contact'] : '';
$email 					= isset($getdata['email']) ? $getdata['email'] : '';
$mailstatus 			= isset($getdata['mailstatus']) ? $getdata['mailstatus'] : '';
$is_ban 				= isset($getdata['is_ban']) ? $getdata['is_ban'] : '';
$userdetailid 			= isset($getdata['userdetailid']) ? $getdata['userdetailid'] : '';
$image 					= isset($getdata['profile']) ? $getdata['profile'] : '';

$btn 					= isset($getdata['id']) ? "Update" : 'Save';
$resn 					= isset($getdata['id']) ? "Updating" : 'Adding';
$heading 				= isset($getdata['id']) ? "Manage" : 'Add';

$profileimg 			= base_url().'icons/profile.jpg';
$filepath 				= base_url().'images/';
$filepath1				= (isset($getdata['profile']) && $getdata['profile']!='') ? $filepath.$getdata['profile'] : base_url().'icons/profile.jpg';
$pdfimg 				= base_url().'images/pdf.png';

	if($image!=''){
		$explodefile2 	= explode('.', $image);
		$extfile2 		= array_pop($explodefile2);
		$photoidimg 	= (in_array($extfile2, ['pdf', 'tiff'])) ? $pdfimg : $filepath1;
	}else{
		$photoidimg 	= $profileimg;
	}

?>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="header">
						<h4 class="title"><?php echo $heading; ?> User</h4>
					</div>
					<div class="content">
						<form method="post" class="form" id="myform" action="<?php echo base_url();?>admincontrol/useraction"  enctype="form-data">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Name</label>								
										<input id="name" name="name" type="text" class="form-control" placeholder="Name" value="<?php echo $name; ?>">
									</div>
								</div>
							</div>							
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Company</label>
										<input id="contact" name="contact" type="text" class="form-control" placeholder="Company" value="<?php echo $contact; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Email Address</label>
										<input id="email" name="email" type="text" class="form-control" placeholder="Email Address" value="<?php echo $email; ?>">
									</div>
								</div>
							</div>
							<?php if (isset($permission) && ($permission =='1')) { ?>
							<?php if ($id !='') { ?>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<button type="button" id="emailverification" class="btn btn-info btn-fill pull-left">Verify Email Address</button>	
										</div>
									</div>
									<div class="modelloader displaynone"></div>
									<div class="col-md-6">
										<div class="form-group">
											<button type="button" id="passwordrest" class="btn btn-info btn-fill pull-right">Password Reset OTP</button>	
										</div>
									</div>
								</div>
							<?php } ?>
							<?php } ?>


							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<div>
											<a href="<?php echo $photoidimg; ?>" target="_blank"><img src="<?php echo $photoidimg; ?>" class="profile_image" width="100"></a>
										</div>
										<input type="file" id="file" class="profile_file">
										<input type="hidden" id="profile" name="profile" class="profile" value="<?php echo $image; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label for="is_ban">Ban / Unban</label>
									<?php echo form_dropdown('is_ban', $banunban, $is_ban, ['id' => 'is_ban', 'class' => 'form-control']); ?>					
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label for="is_ban">E-mail verified / E-mail not verified</label>
									<?php echo form_dropdown('mailstatus', $mail_status, $mailstatus, ['id' => 'mailstatus', 'class' => 'form-control']); ?>					
								</div>
							</div>

							<div class="row diarylist">
								<div class="col-md-12">
									<div class="form-group">
										<label for="diary">Admin comments / Diary</label>
										<div class="diarycontent">
											<?php 
											if (isset($diarylist)) {
											
											foreach ($diarylist as $diarylistkey => $diarylistvalue) { ?>
												<p><?php echo date('d-m-Y H:i:s', strtotime($diarylistvalue['datetime'])); 
												$diaryreason = isset($diarylistvalue['reason']) ? $diarylistvalue['reason'] : '';
												?><?php if ($diarylistvalue['adminid'] > 0) { ?> - <?php echo $userDetails['name']; }?></p>
												<p><?php echo $this->config->item('diary')[$diarylistvalue['action']].' '.$diaryreason; ?></p>
											<?php } } ?>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="reason">Reason for <?php echo $resn; ?></label>
										<textarea class="form-control" id="reason" placeholder="Enter Reason" name="reason"></textarea>
									</div>
								</div>
							</div>
							<?php if (isset($permission) && ($permission =='1')) { ?>
							<button type="button" id="submit-action" class="btn btn-info btn-fill pull-left"><?php echo $btn; ?></button>	
							<?php } ?>
							<button type="submit" id="submit-form" class="displaynone" style="display: none;"><?php echo "submit form"; ?></
							<input id="id" name="id" type="hidden" value="<?php echo $id; ?>">
							<input id="userdetailid" name="userdetailid" type="hidden" value="<?php echo $userdetailid; ?>">
							<input id="device_type" name="device_type" type="hidden" value="1">
							
							<a href="<?php echo base_url();?>admincontrol/useraction"><button type="button" class="btn btn-warning btn-fill pull-left">Back</button></a>
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

		fileupload([".profile_file", "./images", ['jpg','gif','jpeg','png','pdf','tiff','tif']], ['.profile', '.profile_image', filepath, pdfimg]);

		validation(
			'.form',
			{				
				name : {
					required	: true,
					remote		: 	{
									url		: 	"<?php echo base_url().'admincontrol/usernameValidation'; ?>",
									type	: 	"post",
									async	: 	false,
									data: {
											name: function() {
												return $( "#name" ).val();
											},
											id: function() {
												return $( "#id" ).val();
											}
										}
								}
				},
				email : {
					required	: true,
					email		: true,
					remote		: 	{
									url		: 	"<?php echo base_url().'admincontrol/emailValidation'; ?>",
									type	: 	"post",
									async	: 	false,
									data: {
											email: function() {
												return $( "#email" ).val();
											},
											id: function() {
												return $( "#id" ).val();
											}
										}
								}
				},
				// contact : {
				// 	required	: true,
				// },
				reason : {
					required:  	function() {
								return $('#id').val() != "";
							}
				},
			},
			{
				name 	: {
					required	: "Name is required.",
					remote 		: "Name has already been taken!",
				},
				email 	: {
					required	: "Email is required.",
					remote 		: "Email has already been used! Try logging in.",
				},
				// contact : {
				// 	required	: "Company name is required.",
				// },
				reason : {
					required	: "Reason is required.",
				},			
			},
			[],'1'
		);

		$('#submit-action').click(function(){
			if ($(".form").valid()) {
				$('#submit-action').prop('disabled', true);
				$("#submit-form").click();
	        } else {
	            $('#submit-action').prop('disabled', false); 
	        }
		});

		$('#emailverification').click(function(){
			$(this).attr('disabled', true);
			var form_data = new FormData();
	        form_data.append("id", '<?php echo $id; ?>');
	        form_data.append("email", '<?php echo $email; ?>');
	        $.ajax({
		      	data: form_data,
		        type: 'POST',
		        url: '<?php echo base_url().'ajax/index/emailVerification'; ?>',
		        contentType: false,  
	            cache: false,  
	            processData:false,
	            beforeSend:function(){
	            	$('.modalloader').removeClass('displaynone');
		          	$('.modalloader').html('<img src="<?php echo base_url().'icons/ajax-loader.gif'; ?>"/>');
		        },
	            success:function(data)
		        {
		        	$('#emailverification').attr('disabled', false);
		        	$('.modalloader').addClass('displaynone');
		        	if (data =='1') {
		        		sweetalertautoclose('Verification Email sent successfully.');
		        		// alert('Verification Email sent successfully.');
		        	}else{
		        		sweetalertautoclose('Something went wrong please try again!');
		        		// alert('Something went wrong please try again!');
		        	}
				 	console.log(data);
		        }
		      });
		});

		$('#passwordrest').click(function(){
			$(this).attr('disabled', true);
			var form_data = new FormData();
	        form_data.append("id", '<?php echo $id; ?>');
	        form_data.append("email", '<?php echo $email; ?>');
	        $.ajax({
		      	data: form_data,
		        type: 'POST',
		        url: '<?php echo base_url().'ajax/index/requestOTP'; ?>',
		        contentType: false,  
	            cache: false,  
	            processData:false,
	            beforeSend:function(){
	            	$('.modalloader').removeClass('displaynone');
		          	$('.modalloader').html('<img src="<?php echo base_url().'icons/ajax-loader.gif'; ?>"/>');
		        },
	            success:function(data)
		        {
		        	$('#passwordrest').attr('disabled', false);
		        	$('.modalloader').addClass('displaynone');
		        	if (data =='1') {
		        		sweetalertautoclose('OTP sent successfully.');
		        		// alert('OTP sent successfully.');
		        	}else{
		        		sweetalertautoclose('Something went wrong please try again!');
		        		// alert('Something went wrong please try again!');
		        	}
				 	console.log(data);
		        }
		      });
		});
		
	});
	
</script>

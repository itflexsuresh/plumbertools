<?php 
// echo "<pre>";print_r($getdata); die;

$id 					= isset($getdata['id']) ? $getdata['id'] : '';
$name 					= isset($getdata['name']) ? $getdata['name'] : '';
$email 					= isset($getdata['email']) ? $getdata['email'] : '';
$password 				= isset($getdata['password_raw']) ? $getdata['password_raw'] : '';
$comments 				= isset($getdata['comments']) ? $getdata['comments'] : '';
$commentsid 			= isset($getdata['commentsid']) ? $getdata['commentsid'] : '';
$userdetailid 			= isset($getdata['userdetailid']) ? $getdata['userdetailid'] : '';
$btn 					= isset($getdata['id']) ? "Update" : 'Save';
$resn 					= isset($getdata['id']) ? "Updating" : 'Adding';
$heading 				= isset($getdata['id']) ? "Manage" : 'Add';
$read 		    		= isset($getdata['read_permission']) ? $getdata['read_permission'] : '';
$write 		    		= isset($getdata['write_permission']) ? $getdata['write_permission'] : '';
$warehouse 				= isset($getdata['warehouse_staff']) ? $getdata['warehouse_staff'] : '';
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
						<form method="post" class="form" action="<?php echo base_url();?>admincontrol/addsystemuser"  enctype="multipart/form-data">
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
										<label>Email Address</label>
										<input id="email" name="email" type="text" class="form-control" placeholder="Email Address" value="<?php echo $email; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Password</label>
										<input id="password" name="password" type="text" class="form-control" placeholder="Password" value="<?php echo $password; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Comments</label>
										<textarea name="comments" rows="5" class="form-control" placeholder="Comments" value=""><?php echo $comments; ?></textarea>
									</div>
								</div>
							</div>
							<!-- <div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Warehouse Staff</label>
										<input id="rcheckboxs1" class="warehouse-box" type="checkbox" name="warehouse" value="1" <?php// if($warehouse == '1'){ echo "checked='checked'"; } ?> >
									</div>
								</div>
							</div> -->
							<table class="table-bordered table-striped fullwidth permissiontable">
								<thead>
									<tr>
										<th>Permissions</th>
										<th>Read <input type="checkbox" id="select_read_all" /></th>
										<th>Write <input type="checkbox" id="select_both_all" /></th>
									</tr>
								</thead>
								<?php 
								if(count($permission_list) > 0)
								{
									foreach($permission_list as $key=>$val)
									{  
										$read_key=str_replace(' ', '', $key);
										$read_permission = explode(',', $read);
										$write_permission = explode(',', $write);
								?>
										<tbody>
											<tr>
												<td><?php echo $val['name'];?></td>
												<?php if(in_array($val['id'],$read_permission)){ ?>
												<td><input id="rcheckboxs" data-id="<?php echo $read_key.'_read';?>" class="<?php echo $read_key.'_read';?> read_key"  checked="checked" type="checkbox" name="read[]" value="<?php echo $val['id'];?>"></td>	
											<?php }else{ ?>
												<td><input id="rcheckboxs" class="<?php echo $read_key.'_read';?> read_key" type="checkbox" name="read[]" value="<?php echo $val['id'];?>"></td>
											<?php } ?>
											
											<?php if(in_array($val['id'],$write_permission)){ ?>							
												<td><input id="wcheckboxs" data-id="<?php echo $read_key;?>" class="<?php echo $read_key;?> write_key" checked="checked" type="checkbox" name="write[]" value="<?php echo $val['id'];?>"></td>
											<?php }else{ ?>
												<td><input id="wcheckboxs" data-id="<?php echo $read_key;?>" class="<?php echo $read_key;?> write_key" type="checkbox" name="write[]" value="<?php echo $val['id'];?>"></td>
											<?php } ?>
											</tr>
										</tbody>
								<?php 
									} 
								} 
								?>
							</table>
							<br>
							<?php if (isset($permission) && ($permission =='1')) { ?>
								<button type="submit" class="btn btn-info btn-fill pull-left"><?php echo $btn; ?></button>	
							<?php }?>
							<input id="id" name="id" type="hidden" value="<?php echo $id; ?>">
							<input id="userdetailid" name="userdetailid" type="hidden" value="<?php echo $userdetailid; ?>">
							<input id="commentsid" name="commentsid" type="hidden" value="<?php echo $commentsid; ?>">
							
							<a href="<?php echo base_url();?>admincontrol/systemusers"><button type="button" class="btn btn-warning btn-fill pull-left">Back</button></a>
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

		$('.warehouse-box').click(function (){
			if($('.warehouse-box').is(':checked')){
				$('.permissiontable').hide();
			}else{
				$('.permissiontable').show();
			}
		});

		if($('.warehouse-box').is(':checked')){
			$('.permissiontable').hide();
		}else{
			$('.permissiontable').show();
		}


		validation(
			'.form',
			{				
				name : {
					required	: true,
					remote		: 	{
									url		: 	"<?php echo base_url().'admincontrol/usernameValidation1'; ?>",
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
				password : {
					required	: true,
					minlength	: 8,
					maxlength	: 24,
					noSpace		: true
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
				password : {
					required	: "Password field is required.",
					minlength	: "Password must be minium 8 character..",
					maxlength	: "Password must be maximum 24 character..",
				},	
			},
			[],'1'
		);
		$(".write_key").click(function(){		
			if($(this).is(':checked')){
				if(!$(this).parent().parent().find('.read_key').is(':checked')) $(this).parent().parent().find('.read_key').prop("checked", true)
			}
			
			keycheck($(this).attr('data-id'), 2);			
		});

		$('.read_key').click(function(){
			keycheck($(this).attr('data-id'), 1);
		})
	
});	
	function keycheck(dataid, type){		
		var parentcheck1 = 0;
		
		var dataid1 = (type==1) ? dataid : dataid+'_read';
		var dataid2 = dataid;
		
		$('.'+dataid1+'.read_key').each(function(i,v){
			if($(this).is(':checked')){
				parentcheck1 = 1;
			}
		})
		
		if(parentcheck1==1) $('.checkbox3.'+dataid1).prop('checked', true);
		else $('.checkbox3.'+dataid1).prop('checked', false);
		
		var parentcheck2 = 0;
			
		$('.'+dataid2+'.write_key').each(function(i,v){
			if($(this).is(':checked')){
				parentcheck2 = 1;
			}
		})
		
		if(parentcheck2==1) $('.checkbox4.'+dataid2).prop('checked', true);
		else $('.checkbox4.'+dataid2).prop('checked', false);
	}

	//select all checkboxes
	$("#select_read_all").change(function() {
		$(".read_key").prop('checked', $(this).prop("checked"));
	});

	$("#select_both_all").change(function() { 
		$(".write_key").prop('checked', $(this).prop("checked")); 
		$(".read_key").prop('checked', $(this).prop("checked"));
	});
	
</script>

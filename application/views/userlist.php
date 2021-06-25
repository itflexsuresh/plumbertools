
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">Company user</h4>
						<p class="category"></p><br>
					</div>
					</br></br>
					<button type="button" activevalue="1" class="btn btn-success btn-fill pull-left active">Active</button>
					<button type="button" activevalue="2" class="btn btn-warning btn-fill pull-left active">Inactive</button>
					
					<?php if (isset($permission) && ($permission =='1')) { ?>
					<a href="<?php echo base_url();?>admincontrol/newuser"><button type="button" class="btn btn-info btn-fill pull-right">Add New</button></a><br><br>	
					<?php } ?>
					
					<div class="content table-responsive table-full-width">						
						<table class="table table-hover table-striped">
							<thead>
								<th>S.No</th>
								<th>Username</th>
								<th>Company Name</th>
								<th>Email Address</th>
								<th>Email Verified</th>
								<th>Date</th>
								<th>Generated OTP</th>
								<th>OTP generate time</th>
								<th>Action</th>
							</thead>
							<tbody>
						<?php 
							$i=1;
							foreach($getdata as $row){
						?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row['name']; ?></td>
									<td><?php echo $row['contact']; ?></td>
									<td><?php echo $row['email']; ?></td>
									<td><?php echo $this->config->item('mailstatus')[$row['mailstatus']]; ?></td>
									<td><?php echo date("d-m-Y h:i:s", strtotime($row['createddate'])); ?></td>
									<td><?php if($row['otpcode'] !=''){ echo $row['otpcode']; }else{ echo "OTP not generated"; } ?></td>
									<td><?php if($row['created_at'] !=''){ echo date("d-m-Y h:i:s", strtotime($row['created_at'])); }else{ echo "OTP not generated"; } ?></td>									
									<td>
										<?php if ($condition == 1) { ?>
												<a href="<?php echo base_url();?>admincontrol/edituser/<?php echo $row['id'] ; ?>">Edit</a> <?php if (isset($permission) && ($permission =='1')) { ?>/ <a href="javascript:void(0)" deleteid="<?php echo $row['id']; ?>" uddeleteid="<?php echo $row['userdetailid']; ?>" class="delete">Delete</a>
											<?php } ?>
										<?php } ?>
										
									</td>									
								</tr>
						<?php 
							$i++;
							}
						?>
							</tbody>
						</table>
					</div>
				</div>
			</div>			
		</div>
	</div>
</div>

<script type="text/javascript">
    	$(document).ready(function(){ 

    		$('.active').click(function(){
				var activeval = $(this).attr('activevalue');
				var url = '<?php echo base_url().'admincontrol/userlist'; ?>';
				$('<form method="post" action="'+url+'"><input type="hidden" name="activeval" value="'+activeval+'"></form>').appendTo('body').submit();
			});
						
			$(document).on('click', '.delete', function(){
				var action 	= 	'<?php echo base_url().'admincontrol/deleteuser'; ?>';
				var data	= 	'\
				<input type="hidden" value="'+$(this).attr('deleteid')+'" name="id">\
				<input type="hidden" value="'+$(this).attr('uddeleteid')+'" name="userdetailid">\
				<input type="hidden" value="2" name="status">\
				';

				sweetalert(action, data);
			})
			
    	});
</script>

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">System user</h4>
						<p class="category"></p><br>
					</div>
					
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<?php if ($this->session->has_userdata('success')) {?>
						<div class="alert alert-success alert-dismissible alert2" style="background-color: green;">
							<button type="button" class="close" data-dismiss="alert" style="background-color: transparent;">&times;</button>
							<?php echo $this->session->userdata('success'); ?>
						</div>
						<?php } elseif ($this->session->has_userdata('error')) {?>
						<div class="alert alert-danger alert-dismissible alert2" style="background-color: red;">
							<button type="button" class="close" data-dismiss="alert" style="background-color: transparent;">&times;</button>
							<?php echo $this->session->userdata('error'); ?>
						</div>
						<?php }?>
					</div>
					
					<?php if (isset($permission) && ($permission =='1')) { ?>
					<a href="<?php echo base_url();?>admincontrol/addsystemuser"><button type="button" class="btn btn-info btn-fill pull-right">Add New</button></a><br><br>
					<?php } ?>	
					
					<div class="content table-responsive table-full-width">						
						<table class="table table-hover table-striped">
							<thead>
								<th>S.No</th>
								<th>Username</th>
								<th>Email Address</th>
								<th>Date</th>
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
									<td><?php echo $row['email']; ?></td>
									<td><?php echo date("d-m-Y h:i:s", strtotime($row['createddate'])); ?></td>
									<td>
										<a href="<?php echo base_url();?>admincontrol/managesystemuser/<?php echo $row['id'] ; ?>">Edit</a>
										<?php if (isset($permission) && ($permission =='1')) { ?> / <a href="javascript:void(0)" data-id="<?php echo $row['id']; ?>" class="delete">Delete</a>
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
						
			$(document).on('click', '.delete', function(){
				var action 	= 	'<?php echo base_url().'admincontrol/deletesystem_user'; ?>';
				var data	= 	'\
				<input type="hidden" value="'+$(this).attr('data-id')+'" name="id">\
				<input type="hidden" value="2" name="status">\
				';

				sweetalert(action, data);
			})
			
    	});
</script>
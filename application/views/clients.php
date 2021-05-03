<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">Clients</h4>
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
					
					<div class="content">
						<form method="post" action="<?php echo base_url();?>admincontrol/clients"  enctype="multipart/form-data">
							<div class="row">								
								<div class="col-md-6">
									<div class="form-group">
										<label>Client Name</label>
										<?php if ($action == "new") { ?>
										<input name="client_name" type="text" class="form-control" placeholder="Client Name" value="<?php echo set_value('client_name'); ?>" required>
										<?php } if ($action == "edit") { ?>
										<input name="client_name" type="text" class="form-control" placeholder="Client Name" value="<?php echo set_value('client_name',$data[0]['client_name']); ?>" required>
										<?php } ?>
										<span style='color: red'><?php echo form_error('client_name'); ?></span>
									</div>

									<div class="form-group">
										<label>Contact Person</label>
										<?php if ($action == "new") { ?>
										<input name="contact_person" type="text" class="form-control" placeholder="Contact Person" value="<?php echo set_value('contact_person'); ?>" required>
										<?php } if ($action == "edit") { ?>
										<input name="contact_person" type="text" class="form-control" placeholder="Contact Person" value="<?php echo set_value('contact_person',$data[0]['contact_person']); ?>" required>
										<?php } ?>
										<span style='color: red'><?php echo form_error('contact_person'); ?></span>
									</div>								

									<div class="form-group">
										<label>Contact Number</label>
										<?php if ($action == "new") { ?>
										<input name="contact_number" type="text" class="form-control" placeholder="Contact Number" value="<?php echo set_value('contact_number'); ?>" required>
										<?php } if ($action == "edit") { ?>
										<input name="contact_number" type="text" class="form-control" placeholder="Contact Number" value="<?php echo set_value('contact_number',$data[0]['contact_number']); ?>" required>
										<?php } ?>
										<span style='color: red'><?php echo form_error('contact_number'); ?></span>
									</div>

									<div class="form-group">
										<label>Email Address</label>
										<?php if ($action == "new") { ?>
										<input name="email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" placeholder="Email Address" value="<?php echo set_value('email'); ?>" required>
										<?php } if ($action == "edit") { ?>
										<input name="email" type="email" class="form-control" placeholder="Email Address" value="<?php echo set_value('email',$data[0]['email']); ?>" required>
										<?php } ?>
										<span style='color: red'><?php echo form_error('email'); ?></span>
									</div>

									<div class="form-group">
										<label>Login Password</label>
										<?php if ($action == "new") { ?>
										<input name="login" type="password" class="form-control" placeholder="Login Password" value="<?php echo set_value('login'); ?>" required>
										<?php } if ($action == "edit") { ?>
										<input name="login" type="password" class="form-control" placeholder="Login Password" value="<?php echo set_value('login',$data[0]['login']); ?>" required>
										<?php } ?>
										<span style='color: red'><?php echo form_error('login'); ?></span>
									</div>

									<div class="form-group">
										<?php if (isset($permission) && ($permission =='1')) { ?>
										<?php if ($action == "new") { ?>										
										<button type="submit" class="btn btn-info btn-fill pull-right">Add</button>
										<?php } if ($action == "edit") { ?>
										<input name="id" type="hidden" value="<?php echo $data[0]['id']; ?>">
										<button type="submit" class="btn btn-info btn-fill pull-right">Update</button>
										<?php } ?>
										<?php } ?>
									</div>	
								</div>
							</div>																									
						</form>
					</div>				
					
					<div class="content table-responsive table-full-width">						
						<table class="table table-hover table-striped">
							<thead>
								<th>S.No</th>
								<th>Client Name</th>
								<th>Contact Person</th>
								<th>Contact Number</th>
								<th>Login Email</th>								
								<th>Action</th>
							</thead>
							<tbody>
							<?php 
								$i=1;
								foreach($getdata as $row){
							?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php  echo $row['client_name']; ?></td>
										<td><?php  echo $row['contact_person']; ?></td>
										<td><?php  echo $row['contact_number']; ?></td>
										<td><?php  echo $row['email']; ?></td>
										<td>
											<a href="<?php echo base_url();?>admincontrol/clients/<?php echo $row['id'] ; ?>">Edit</a> <?php if (isset($permission) && ($permission =='1')) { ?> / <a href="javascript:void(0)" deleteid="<?php echo $row['id']; ?>" class="delete">Delete</a>
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
			
			$('.delete').click(function(){				
				if(confirm("Are you sure to delete this record ?")){
					var deleteid = $(this).attr('deleteid');
					var url = '<?php echo base_url().'admincontrol/deleteclients'; ?>';
					$('<form method="post" action="'+url+'"><input type="hidden" name="deleteid" value="'+deleteid+'"></form>').appendTo('body').submit();
				}
			});
			
    	});
</script>
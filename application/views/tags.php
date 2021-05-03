<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">Tags</h4>
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
						<form method="post" action="<?php echo base_url();?>admincontrol/tags"  enctype="multipart/form-data">
							<div class="row">								
								<div class="col-md-6">
									<div class="form-group">
										<label>Tag Name</label>
										<?php if ($action == "new") { ?>
										<input name="tag_name" type="text" class="form-control" placeholder="Tag Name" value="<?php echo set_value('tag_name'); ?>" required>
										<?php } if ($action == "edit") { ?>
										<input name="tag_name" type="text" class="form-control" placeholder="Tag Name" value="<?php echo set_value('tag_name',$data[0]['tag_name']); ?>" required>
										<?php } ?>
										<span style='color: red'><?php echo form_error('tag_name'); ?></span>
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
								<th>Tag Name</th>								
								<th>Number OF Articles Tag</th>								
								<th>Action</th>
							</thead>
							<tbody>
						<?php 
							$i=1;
							foreach($getdata as $row){
						?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php  echo $row['tag_name']; ?></td>
									<td><?php  echo $row['tag_count']; ?></td>
									<td>
										<a href="<?php echo base_url();?>admincontrol/tags/<?php echo $row['id'] ; ?>">Edit</a> <?php if (isset($permission) && ($permission =='1')) { ?> / <a href="javascript:void(0)" deleteid="<?php echo $row['id']; ?>" class="delete">Delete</a>
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
					var url = '<?php echo base_url().'admincontrol/deletetags'; ?>';
					$('<form method="post" action="'+url+'"><input type="hidden" name="deleteid" value="'+deleteid+'"></form>').appendTo('body').submit();
				}
			});
			
    	});
</script>
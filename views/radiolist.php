<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">Content</h4>
						<p class="category"></p><br>
					</div>
					
					<button type="button" activevalue="1" class="btn btn-success btn-fill pull-left active">Active</button>
					<button type="button" activevalue="2" class="btn btn-warning btn-fill pull-left active">Inactive</button>
					<a href="<?php echo base_url();?>admincontrol/newradio"><button type="button" class="btn btn-info btn-fill pull-right">Add New</button></a><br><br>	
					
					<div class="content table-responsive table-full-width">						
						<table class="table table-hover table-striped">
							<thead>
								<th>S.No</th>
								<th>Title</th>
								<th>Image</th>
								<th>Date</th>
								<th>Time</th>
								<th>Duration</th>
								<th>Active</th>
								<th>Action</th>
							</thead>
							<tbody>
						<?php 
							$i=1;
							foreach($getdata as $row){
						?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row['title']; ?></td>
									<td><img src="<?php echo base_url();?>./images/<?php echo $row['image'];?>" height="50" width="100"></td>
									<td><?php echo date("m/d/Y", strtotime($row['date'])); ?></td>
									<td><?php echo $row['time']; ?></td>
									<td><?php echo $row['duration']; ?></td>
									<td><?php if($row['active']==1){ ?>True<?php } else { ?>False<?php } ?></td>
									<td><a href="<?php echo base_url();?>admincontrol/editradio/<?php echo $row['id'] ; ?>">Edit</a> / <a href="#" deleteid="<?php echo $row['id']; ?>" class="delete">Delete</a></td>
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
				var url = '<?php echo base_url().'admincontrol/radiolist'; ?>';
				$('<form method="post" action="'+url+'"><input type="hidden" name="activeval" value="'+activeval+'"></form>').appendTo('body').submit();
			});	
			
			$('.delete').click(function(){				
				if(confirm("Are you sure to delete this record ?")){
					var deleteid = $(this).attr('deleteid');
					var url = '<?php echo base_url().'admincontrol/deleteradio'; ?>';
					$('<form method="post" action="'+url+'"><input type="hidden" name="deleteid" value="'+deleteid+'"></form>').appendTo('body').submit();
				}
			});
			
    	});
</script>
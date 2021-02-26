<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">Content</h4>
						<p class="category"></p><br>
					</div>
										
					<a href="<?php echo base_url();?>admincontrol/newpopupnotification"><button type="button" class="btn btn-info btn-fill pull-right">Add New</button></a><br><br>	
					
					<div class="content table-responsive table-full-width">						
						<table class="table table-hover table-striped">
							<thead>
								<th>S.No</th>
								<th>Heading</th>
								<th>Message</th>
								<th>Active Date</th>
								<th>Inactive Date</th>
								<th>Url</th>
								<th>Action</th>
							</thead>
							<tbody>
						<?php 
							$i=1;
							foreach($getdata as $row){
						?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row['heading']; ?></td>
									<td><?php echo $row['text']; ?></td>
									<td><?php echo date("m/d/Y", strtotime($row['activedate'])); ?></td>
									<td><?php echo date("m/d/Y", strtotime($row['inactivedate'])); ?></td>
									<td><?php echo $row['url']; ?></td>
									<td><a href="<?php echo base_url();?>admincontrol/editpopupnotification/<?php echo $row['id'] ; ?>">Edit</a> / <a href="#" deleteid="<?php echo $row['id']; ?>" class="delete">Delete</a></td>
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
					var url = '<?php echo base_url().'admincontrol/deletepopupnotification'; ?>';
					$('<form method="post" action="'+url+'"><input type="hidden" name="deleteid" value="'+deleteid+'"></form>').appendTo('body').submit();
				}
			});
			
    	});
</script>
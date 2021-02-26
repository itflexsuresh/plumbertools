<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">IOPSA Membership Category</h4>
						<p class="iopsa_category"></p><br>
					</div>
					
					<button type="button" activevalue="1" class="btn btn-success btn-fill pull-left active">Active</button>
					<button type="button" activevalue="2" class="btn btn-warning btn-fill pull-left active">Inactive</button>

					<?php if (isset($permission) && ($permission =='1')) { ?>
						<a href="<?php echo base_url();?>admincontrol/newiopsa_category"><button type="button" class="btn btn-info btn-fill pull-right">Add New</button></a><br><br>	
					<?php } ?>
					
					<div class="content table-responsive table-full-width">						
						<table class="table table-hover table-striped">
							<thead>
								<th>S.No</th>
								<th>Category</th>
								<th>Published</th>
								<th>Action</th>
							</thead>
							<tbody>
						<?php 
							$i=1;
							foreach($getdata as $row){
						?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row['category']; ?></td>
									<td><?php if($row['published']==1){ ?>True<?php } else { ?>False<?php } ?></td>
									<?php if (isset($permission) && ($permission =='1')) { ?>
									<td><a href="<?php echo base_url();?>admincontrol/editiopsa_category/<?php echo $row['id'] ; ?>">Edit</a> / <a href="#" deleteid="<?php echo $row['id']; ?>" class="delete">Delete</a></td>
									<?php }else{ ?>
										<td></td>
									<?php } ?>
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
				var url = '<?php echo base_url().'admincontrol/iopsa_categorylist'; ?>';
				$('<form method="post" action="'+url+'"><input type="hidden" name="activeval" value="'+activeval+'"></form>').appendTo('body').submit();
			});	
			
			$('.delete').click(function(){				
				if(confirm("Are you sure to delete this record ?")){
					var deleteid = $(this).attr('deleteid');
					var url = '<?php echo base_url().'admincontrol/deleteiopsa_category'; ?>';
					$('<form method="post" action="'+url+'"><input type="hidden" name="deleteid" value="'+deleteid+'"></form>').appendTo('body').submit();
				}
			});
			
    	});
</script>
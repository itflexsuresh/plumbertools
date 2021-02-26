<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">Plumbing Africa</h4>
						<p class="category"></p><br>
					</div>
										
					<?php if (isset($permission) && ($permission =='1')) { ?>
					<!-- <a href="<?php // echo base_url();?>admincontrol/newplumbingafrica"><button type="button" class="btn btn-info btn-fill pull-right">Add New</button></a><br><br>	 -->
					<?php } ?>
					
					<div class="content table-responsive table-full-width">						
						<table class="table table-hover table-striped">
							<thead>
								<th>S.No</th>
								<th>Image</th>
								<th>Action</th>
							</thead>
							<tbody>
						<?php 
							$i=1;
							foreach($getdata as $row){
						?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><img src="<?php echo base_url();?>./images/<?php echo $row['image'];?>" height="50" width="100"></td>
									<?php if (isset($permission) && ($permission =='1')) { ?>
										<td><a href="<?php echo base_url();?>admincontrol/editplumbingafrica/<?php echo $row['id'] ; ?>">Edit</a>
									<?php }else{ ?>
										<td></td>
									<?php } ?><!--  / <a href="#" deleteid="<?php // echo $row['id']; ?>" class="delete">Delete</a> --></td>
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
					var url = '<?php echo base_url().'admincontrol/deleteplumbingafrica'; ?>';
					$('<form method="post" action="'+url+'"><input type="hidden" name="deleteid" value="'+deleteid+'"></form>').appendTo('body').submit();
				}
			});
			
    	});
</script>
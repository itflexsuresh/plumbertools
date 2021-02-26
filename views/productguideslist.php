<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">Content</h4>
						<p class="category"></p><br>
					</div>
					
					<!--<button type="button" activevalue="1" class="btn btn-success btn-fill pull-left active">Active</button>
					<button type="button" activevalue="2" class="btn btn-warning btn-fill pull-left active">Inactive</button>-->
					<?php if (isset($permission) && ($permission =='1')) { ?>
						<a href="<?php echo base_url();?>admincontrol/newproductguides"><button type="button" class="btn btn-info btn-fill pull-right">Add New</button></a><br><br>	
					<?php } ?>
					
					<div class="content table-responsive table-full-width">						
						<table class="table table-hover table-striped">
							<thead>
								<th>S.No</th>
								<th>Content</th>
								<th>Position</th>
								<th>Published</th>
								<th>Action</th>
							</thead>
							<tbody>
						<?php 
							$i=1;
							foreach($getdata as $row){
								if ($row['content'] =='') {
									$content = '-';
								}else{
									$content = $row['content'];
								}
						?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $content; ?></td>
									<td><?php echo $row['position']; ?></td>
									<td><?php if($row['published']==1){ ?>True<?php } else { ?>False<?php } ?></td>
									<td>
										<a href="<?php echo base_url();?>admincontrol/editproductguides/<?php echo $row['id'] ; ?>">Edit</a>
										<?php if (isset($permission) && ($permission =='1')) { ?> / <a href="#" deleteid="<?php echo $row['id']; ?>" class="delete">Delete</a> <?php } ?>
										  <?php if($row['pdf'] =='0'){ ?>/ <a href="<?php echo base_url();?>admincontrol/productguidessection1list/<?php echo $row['id'] ; ?>">Edit Sections</a>
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
				var url = '<?php echo base_url().'admincontrol/productguideslist'; ?>';
				$('<form method="post" action="'+url+'"><input type="hidden" name="activeval" value="'+activeval+'"></form>').appendTo('body').submit();
			});	
			
			$('.delete').click(function(){				
				if(confirm("Are you sure to delete this record ?")){
					var deleteid = $(this).attr('deleteid');
					var url = '<?php echo base_url().'admincontrol/deleteproductguides'; ?>';
					$('<form method="post" action="'+url+'"><input type="hidden" name="deleteid" value="'+deleteid+'"></form>').appendTo('body').submit();
				}
			});
			
    	});
</script>
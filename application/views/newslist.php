<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">MAGAZINE</h4>
						<p class="category"></p><br>
					</div>
										
					<?php if (isset($permission) && ($permission =='1')) { ?>
						<a href="<?php echo base_url();?>admincontrol/newnews"><button type="button" class="btn btn-info btn-fill pull-right">Add New</button></a><br><br>
					<?php } ?>	
					
					<div class="content table-responsive table-full-width">						
						<table class="table table-hover table-striped">
							<thead>
								<th>S.No</th>
								<th>Title</th>
								<!-- <th>Detail</th> -->
								<th>Description</th>
								<th>Position</th>
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
										<td><?php  echo $row['title']; ?></td>
									<!-- <td><?php // echo $row['detail']; ?></td> -->
									<?php if($row['type'] =='2'){ ?>
										<td>PDF Document</td>
									<?php }else{ ?>
										<td>Magazine Article</td>
									<?php } ?>		
									<td><?php echo $row['position']; ?></td>
									<td><?php if($row['published']==1){ ?>True<?php } else { ?>False<?php } ?></td>						
									<td>
										<a href="<?php echo base_url();?>admincontrol/editnews/<?php echo $row['id'] ; ?>">Edit</a> <?php if (isset($permission) && ($permission =='1')) { ?> / <a href="#" deleteid="<?php echo $row['id']; ?>" class="delete">Delete</a>
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
					var url = '<?php echo base_url().'admincontrol/deletenews'; ?>';
					$('<form method="post" action="'+url+'"><input type="hidden" name="deleteid" value="'+deleteid+'"></form>').appendTo('body').submit();
				}
			});
			
    	});
</script>
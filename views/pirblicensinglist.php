<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">PIRB Licensing System</h4>
						<p class="category"></p><br>
					</div>
										
					<?php if (isset($permission) && ($permission =='1')) { ?>
						<a href="<?php echo base_url();?>admincontrol/newpirblicensing"><button type="button" class="btn btn-info btn-fill pull-right">Add New</button></a><br><br>	
					<?php } ?>
					
					<div class="content table-responsive table-full-width">						
						<table class="table table-hover table-striped">
							<thead>
								<th>S.No</th>
								<th>Title</th>
								<th>Description</th>
								<th>Publish</th>
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
									<?php if($row['type'] == '2'){ ?>
										<!-- <td><?php // echo $row['content']; ?></td> -->
										<td>PDF</td>
									<?php }else{ ?>
										<!-- <td><a href="<?php // echo base_url().'images/'.$row['file'].''; ?>" target = "_blank"><img src="<?php // echo base_url().'images/pdf.png'; ?>" height="50" width="50"></a></td> -->
										<td>Article</td>
									<?php } ?>
									
									<td><?php echo $this->config->item('truefalse')[$row['published']]; ?></td>
									<td>
										<a href="<?php echo base_url();?>admincontrol/editpirblicensing/<?php echo $row['id'] ; ?>">Edit</a> 
										<?php if (isset($permission) && ($permission =='1')) { ?>/ <a href="#" deleteid="<?php echo $row['id']; ?>" class="delete">Delete</a>
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
					var url = '<?php echo base_url().'admincontrol/deletepirblicensing'; ?>';
					$('<form method="post" action="'+url+'"><input type="hidden" name="deleteid" value="'+deleteid+'"></form>').appendTo('body').submit();
				}
			});
			
    	});
</script>
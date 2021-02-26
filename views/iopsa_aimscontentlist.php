<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">IOPSA Aims and Objectives</h4>
						<p class="iopsa_aimscontent"></p><br>
					</div>
					
					<button type="button" activevalue="1" class="btn btn-success btn-fill pull-left active">Active</button>
					<button type="button" activevalue="2" class="btn btn-warning btn-fill pull-left active">Inactive</button>
					<?php if (isset($permission) && ($permission =='1')) { ?>
					<!-- <a href="<?php //echo base_url();?>admincontrol/newiopsa_aimscontent"><button type="button" class="btn btn-info btn-fill pull-right">Add New</button></a><br><br>	 -->
					<?php } ?>
					
					<div class="content table-responsive table-full-width">						
						<table class="table table-hover table-striped">
							<thead>
								<th>S.No</th>
								<th>Aims and Objectives</th>
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
									<td><?php echo $row['content']; ?></td>
									<td><?php if($row['published']==1){ ?>True<?php } else { ?>False<?php } ?></td>
									
									<td>
										<a href="<?php echo base_url();?>admincontrol/editiopsa_aimscontent/<?php echo $row['id'] ; ?>">Edit</a> 
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
			$('.active').click(function(){
				var activeval = $(this).attr('activevalue'); 				
				var url = '<?php echo base_url().'admincontrol/iopsa_aimscontentlist'; ?>';
				$('<form method="post" action="'+url+'"><input type="hidden" name="activeval" value="'+activeval+'"></form>').appendTo('body').submit();
			});	
			
			$('.delete').click(function(){				
				if(confirm("Are you sure to delete this record ?")){
					var deleteid = $(this).attr('deleteid');
					var url = '<?php echo base_url().'admincontrol/deleteiopsa_aimscontent'; ?>';
					$('<form method="post" action="'+url+'"><input type="hidden" name="deleteid" value="'+deleteid+'"></form>').appendTo('body').submit();
				}
			});
			
    	});
</script>
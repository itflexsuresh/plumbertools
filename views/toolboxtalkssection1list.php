
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">						
						<h4 class="title">
<a href="<?php echo base_url();?>admincontrol/toolboxtalksaction"><?php echo $toolboxtalksname['content']; ?></a>
						</h4>
						<p class="category"></p><br>
					</div>

					<div class="add--and--new">
					<div class="back-btn" style="display: inline-block;width: 89%;">
						<a href="<?php echo base_url().'admincontrol/toolboxtalkslist'; ?>"><button type="button" class="btn btn-warning btn-fill pull-right">Back</button></a>
					</div>
					<?php if (isset($permission) && ($permission =='1')) { ?>
					<div class="addnew-btn" style="float: right;">				
						<a href="<?php echo base_url();?>admincontrol/newtoolboxtalkssection1/<?php echo $toolboxtalksid; ?>"><button id="addnew" type="button" class="btn btn-info btn-fill pull-right">Add New</button></a><br><br>	
					</div>
					<?php } ?>
					</div>
										
					
					
					<div class="content table-responsive table-full-width">						
						<table class="table table-hover table-striped">
							<thead>
								<th>S.No</th>
								<th>Content</th>
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
									<td><?php echo $row['content']; ?></td>
									<!-- <td><?php // echo $row['description']; ?></td> -->
									<?php if($row['type'] =='2'){ ?>
										<!-- <td><a href="<?php //echo base_url();?>./images/<?php //echo $row['file'];?>" target="_blank"><img src="<?php //echo base_url();?>./images/pdf.png" height="50" width="50"></a></td> -->
										<td>PDF Document</td>
									<?php }else{ ?>
										<!-- <td><?php // echo $row['description']; ?></td> -->
										<td>Magazine Article</td>
									<?php } ?>
									<td><?php echo $row['position']; ?></td>
									<td><?php if($row['published']==1){ ?>True<?php } else { ?>False<?php } ?></td>
									<td><a href="<?php echo base_url();?>admincontrol/edittoolboxtalkssection1/<?php echo $toolboxtalksid; ?>/<?php echo $row['id'] ; ?>">Edit</a> 
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
				var url = '<?php echo base_url().'admincontrol/toolboxtalkssection1list'; ?>';
				$('<form method="post" action="'+url+'"><input type="hidden" name="activeval" value="'+activeval+'"></form>').appendTo('body').submit();
			});	
			
			$('.delete').click(function(){				
				if(confirm("Are you sure to delete this record ?")){
					var deleteid = $(this).attr('deleteid');
					var url = '<?php echo base_url().'admincontrol/deletetoolboxtalkssection1/'.$toolboxtalksid; ?>';
					$('<form method="post" action="'+url+'"><input type="hidden" name="deleteid" value="'+deleteid+'"></form>').appendTo('body').submit();
				}
			});
			
			
    	});
</script>
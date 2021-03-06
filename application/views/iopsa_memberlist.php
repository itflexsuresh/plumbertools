 
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">IOPSA Become a Member</h4>
						<p class="iopsa_member"></p><br>
					</div>
					
					<button type="button" activevalue="1" class="btn btn-success btn-fill pull-left active">Completed</button>
					<button type="button" activevalue="2" class="btn btn-warning btn-fill pull-left active">Pending</button>
					<?php if (isset($permission) && ($permission =='1')) { ?>
					<!-- <a href="<?php //echo base_url();?>admincontrol/newiopsa_member"><button type="button" class="btn btn-info btn-fill pull-right">Add New</button></a><br><br>	 -->
					<?php } ?>
					
					<div class="content table-responsive table-full-width">						
						<table class="table table-hover table-striped">
							<thead>
								<th>S.No</th>
								<th>Name</th>
								<th>Email</th>
								<th>CellPhone</th>
								<th>Action</th>
							</thead>
							<tbody>
						<?php 
							$i=1;
							foreach($getdata as $row){
						?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row['name']; ?></td>
									<td><?php echo $row['email']; ?></td>
									<td><?php echo $row['cellphone']; ?></td>	
								
									<td><a href="<?php echo base_url();?>admincontrol/editiopsa_member/<?php echo $row['id'] ; ?>">Edit</a></td>									
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
				var url = '<?php echo base_url().'admincontrol/iopsa_memberlist'; ?>';
				$('<form method="post" action="'+url+'"><input type="hidden" name="activeval" value="'+activeval+'"></form>').appendTo('body').submit();
			});	
			
			$('.delete').click(function(){				
				if(confirm("Are you sure to delete this record ?")){
					var deleteid = $(this).attr('deleteid');
					var url = '<?php echo base_url().'admincontrol/deleteiopsa_member'; ?>';
					$('<form method="post" action="'+url+'"><input type="hidden" name="deleteid" value="'+deleteid+'"></form>').appendTo('body').submit();
				}
			});
			
    	});
</script>

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">
<a href="<?php echo base_url();?>admincontrol/newtoolboxtalkslist"><?php echo $toolboxname['content']; ?></a>
						</h4>
						<p class="category"></p><br>
					</div>
					<div class="add--and--new">
					<div class="back-btn" style="display: inline-block;width: 89%;">
						<a href="<?php echo base_url().'admincontrol/newtoolboxtalkslist'; ?>"><button type="button" class="btn btn-warning btn-fill pull-right">Back</button></a>
					</div>
					<?php if (isset($permission) && ($permission =='1')) { ?>
					<div class="addnew-btn" style="float: right;">				
						<a href="<?php echo base_url();?>admincontrol/addnewtoolboxtalks1/<?php echo $toolboxid; ?>"><button id="addnew" type="button" class="btn btn-info btn-fill pull-right">Add New</button></a><br><br>	
					</div>
					<?php } ?>
					</div>
					
					<div class="content table-responsive table-full-width">						
						<table class="table table-hover table-striped">
							<thead>
								<th>S.No</th>
								<th>Content</th>
								<th>Position</th>
								<th>Impressions</th>
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
									<td></td>
									<td><?php if($row['published']==1){ ?>True<?php } else { ?>False<?php } ?></td>
									<td><a href="<?php echo base_url();?>admincontrol/editnewtoolboxtalks1/<?php echo $toolboxid; ?>/<?php echo $row['id'] ; ?>">Edit</a> 
										<?php if (isset($permission) && ($permission =='1')) { ?> / <a href="javascript:void(0)" deleteid="<?php echo $row['id']; ?>" class="delete">Delete</a> 
										<?php } ?>
										<?php if($row['pdf'] =='0'){ ?> / <a href="<?php echo base_url();?>admincontrol/newtoolboxtalks2list/<?php echo $toolboxid; ?>/<?php echo $row['id'] ; ?>">Edit Sections</a> <?php } ?></td>
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
				var url = '<?php echo base_url().'admincontrol/productguidessection1list'; ?>';
				$('<form method="post" action="'+url+'"><input type="hidden" name="activeval" value="'+activeval+'"></form>').appendTo('body').submit();
			});	
			
			$('.delete').click(function(){				
				if(confirm("Are you sure to delete this record ?")){
					var deleteid = $(this).attr('deleteid');
					var toolboxid = '<?php echo $toolboxid; ?>';
					var url = '<?php echo base_url().'admincontrol/deletenewtoolboxtalks1/'; ?>';
					$('<form method="post" action="'+url+'"><input type="hidden" name="deleteid" value="'+deleteid+'"><input type="hidden" name="toolboxid" value="'+toolboxid+'"></form>').appendTo('body').submit();
				}
			});
			
			
    	});
</script>
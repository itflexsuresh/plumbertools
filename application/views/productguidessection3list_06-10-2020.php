
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">
<a href="<?php echo base_url();?>admincontrol/productguidesaction"><?php echo $productguidesname['content']; ?></a> - 
<a href="<?php echo base_url();?>admincontrol/productguidessection1action/<?php echo $productguidesid; ?>"><?php echo $productguidessection1name['content']; ?></a> - 
<a href="<?php echo base_url();?>admincontrol/productguidessection2action/<?php echo $productguidesid; ?>/<?php echo $productguidessection1id; ?>"><?php echo $productguidessection2name['content']; ?></a>
						</h4>
						<p class="category"></p><br>
					</div>
										
					<a href="<?php echo base_url();?>admincontrol/newproductguidessection3/<?php echo $productguidesid; ?>/<?php echo $productguidessection1id; ?>/<?php echo $productguidessection2id; ?>"><button id="addnew" type="button" class="btn btn-info btn-fill pull-right">Add New</button></a><br><br>	
					
					<div class="content table-responsive table-full-width">						
						<table class="table table-hover table-striped">
							<thead>
								<th>S.No</th>
								<th>Title</th>
								<th>Body</th>
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
									<td><?php echo $row['body']; ?></td>
									<td><?php echo $row['position']; ?></td>									
									<td><?php if($row['published']==1){ ?>True<?php } else { ?>False<?php } ?></td>
									<td><a href="<?php echo base_url();?>admincontrol/editproductguidessection3/<?php echo $productguidesid; ?>/<?php echo $productguidessection1id; ?>/<?php echo $productguidessection2id; ?>/<?php echo $row['id'] ; ?>">Edit</a> / <a href="#" deleteid="<?php echo $row['id']; ?>" class="delete">Delete</a></td>
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
				var url = '<?php echo base_url().'admincontrol/productguidessection2list'; ?>';
				$('<form method="post" action="'+url+'"><input type="hidden" name="activeval" value="'+activeval+'"></form>').appendTo('body').submit();
			});	
			
			$('.delete').click(function(){				
				if(confirm("Are you sure to delete this record ?")){
					var deleteid = $(this).attr('deleteid');
					var url = '<?php echo base_url().'admincontrol/deleteproductguidessection3/'.$productguidesid.'/'.$productguidessection1id.'/'.$productguidessection2id; ?>';
					$('<form method="post" action="'+url+'"><input type="hidden" name="deleteid" value="'+deleteid+'"></form>').appendTo('body').submit();
				}
			});
			
			
    	});
</script>
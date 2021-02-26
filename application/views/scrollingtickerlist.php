<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<!--<h4 class="title">scrollingticker</h4>
						<p class="category"></p><br> -->
					</div>
					
					<div class="header hideid">
						<h4 class="title">Scrolling Ticker</h4>
						<?php if (isset($permission) && ($permission =='1')) { ?>
							<button id="newscrollingticker" type="button" class="btn btn-info btn-fill pull-right">Add New</button><br><br>
						<?php } ?>
					</div>
					
					<div class="content table-responsive table-full-width hideid">						
						<table class="table table-hover table-striped">
							<thead>
								<th>S.No</th>								
								<th>Scrolling Ticker</th>
								<th>Action</th>
							</thead>
							<tbody>
						<?php 
							$i=1;
							foreach($getdata as $row){
						?>
								<tr>
									<td><?php echo $i; ?></td>									
									<td><?php echo $row['scrollingticker']; ?></td>
									<?php if (isset($permission) && ($permission =='1')) { ?>
										<td><a href="<?php echo base_url();?>admincontrol/editscrollingticker/<?php echo $row['id'] ; ?>">Edit</a> / <a href="#" deleteid="<?php echo $row['id']; ?>" class="delete">Delete</a></td>
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
			
			$('#pagesid').change(function(){ 				
				var pagesidvalue=$('#pagesid').val();				
				var url = '<?php echo base_url().'admincontrol/scrollingtickerlist'; ?>';
				$('<form method="post" action="'+url+'"><input type="hidden" name="pagesid" value="'+pagesidvalue+'"></form>').appendTo('body').submit();
			});
			
			$('#newscrollingticker').click(function(){
				var pagesidvalue=$('#pagesid').val();
				if(pagesidvalue <= 0){
					alert("Please select the Pages");
				}
				else{					
					var url = '<?php echo base_url().'admincontrol/newscrollingticker'; ?>';
					$('<form method="post" action="'+url+'"><input type="hidden" name="pagesid" value="'+pagesidvalue+'"></form>').appendTo('body').submit();
				}				
			});
			
			$('.delete').click(function(){				
				if(confirm("Are you sure to delete this record ?")){
					var deleteid = $(this).attr('deleteid');
					var url = '<?php echo base_url().'admincontrol/deletescrollingticker'; ?>';
					$('<form method="post" action="'+url+'"><input type="hidden" name="deleteid" value="'+deleteid+'"></form>').appendTo('body').submit();
				}
			});
			
    	});
</script>
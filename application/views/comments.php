<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">Manage Comments</h4>
						<p class="category"></p><br>
					</div>
					
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<?php if ($this->session->has_userdata('success')) {?>
							<div class="alert alert-success alert-dismissible alert2" style="background-color: green;">
								<button type="button" class="close" data-dismiss="alert" style="background-color: transparent;">&times;</button>
								<?php echo $this->session->userdata('success'); ?>
							</div>
							<?php } elseif ($this->session->has_userdata('error')) {?>
							<div class="alert alert-danger alert-dismissible alert2" style="background-color: red;">
								<button type="button" class="close" data-dismiss="alert" style="background-color: transparent;">&times;</button>
								<?php echo $this->session->userdata('error'); ?>
							</div>
							<?php }?>
						</div>
					</div>
												
					<div class="content table-responsive table-full-width">						
						<table class="table table-hover table-striped">
							<thead>
								<th>S.No</th>
								<th>Comment Date</th>
								<th>Posted By</th>
								<th>Posted On Article</th>
								<th>Comment</th>
								<th>Number of  Likes</th>
								<th>Number of Dislikes</th>
								<th>Reports</th>
								<th>Published</th>
								<th>Action</th>
							</thead>
							<tbody>
						<?php 
							$i=1;
							foreach($getdata as $row){
								if($row['published']==1){
									$checked = 'checked="checked"';
									$checkboxvalue = 0;
								}else{
									$checked = '';
									$checkboxvalue = 1;
								}
							?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php  echo date('d-m-Y', strtotime($row['comment_date'])); ?></td>
									<td><?php echo $row['user_name']; ?></td>
									<td><?php echo $row['article_name']; ?></td>
									<td><?php echo $row['comment']; ?></td>
									<td><?php echo $row['likes']; ?></td>
									<td><?php echo $row['dislikes']; ?></td>
									<td><?php echo $row['reports']; ?></td>
									<td>
										<input class="published" id="<?php echo $row['id']; ?>" <?php echo $checked; ?> type="checkbox" value="<?php echo $checkboxvalue; ?>">
									</td>	
									<td>
										<?php if (isset($permission) && ($permission =='1')) { 
											if($row['published']==0){
											?>
											<a href="#" deleteid="<?php echo $row['id']; ?>" class="delete">Delete</a>
										<?php } } ?>
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
					var url = '<?php echo base_url().'admincontrol/deletecomments'; ?>';
					$('<form method="post" action="'+url+'"><input type="hidden" name="deleteid" value="'+deleteid+'"></form>').appendTo('body').submit();
				}
			});

			$('.published').click(function(){		
				var value = $(this).attr('value');	
				var id = $(this).attr('id');	

				var url = '<?php echo base_url().'admincontrol/comments'; ?>';
					$('<form method="post" action="'+url+'"><input type="hidden" name="value" value="'+value+'"><input type="hidden" name="id" value="'+id+'"></form>').appendTo('body').submit();				
			});
			
    	});
</script>
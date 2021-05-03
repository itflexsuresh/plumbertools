<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">Advertisement</h4>
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
										
					<?php if (isset($permission) && ($permission =='1')) { ?> 	
					<div class="pull-right" style="padding-right: 1%;">					
						<button type="button" id="download" class="btn btn-info btn-fill"><i class="fa fa-download"></i> Download</button>
						<a href="<?php echo base_url();?>admincontrol/newadbanners"><button type="button" class="btn btn-info btn-fill">Add New</button></a>		
					</div><br><br>				
					<?php } ?>	
					
					<div class="content table-responsive table-full-width">						
						<table class="table table-hover table-striped">
							<thead>
								<th>S.No</th>
								<th>banner id</th>
								<th>Advert Type</th>
								<th>Advert Level</th>
								<th>Start Date of Campaign</th>
								<th>End Date of Campaign</th>
								<th>Page Name</th>
								<th>Client Name</th>
								<th>Campaign Name / Description</th>
								<th>Impressions Start Number</th>
								<th>Total Impression Count To Date</th>
								<th>Clicks</th>
								<th>Status</th>
								<th>Action</th>
							</thead>
							<tbody> 
							<?php 
								$i=1;
								foreach($getdata as $row){
									if($row['advert_type'] == 0){
										$advert_type = 'Header';
									}elseif($row['advert_type'] == 1){
										$advert_type = 'Article';
									}elseif($row['advert_type'] == 2){
										$advert_type = 'Banner';
									}

									if($row['campaign_status'] == 0){
										$status = 'Inactive';
									}elseif($row['campaign_status'] == 1){
										$status = 'Active';
									}elseif($row['campaign_status'] == 2){
										$status = 'Suspend';
									}

									if($advert_type == 'Banner'){
										$pagename = $row['pagename'];
									}else{
										$pagename = '-';
									}
							?>
								<tr>
									<td><?php echo $i; ?></td>									
									<td><?php echo $row['id']; ?></td>
									<td><?php echo $advert_type; ?></td>
									<td><?php echo $row['level']; ?></td>
									<td><?php echo date('d-m-Y', strtotime($row['start_date'])); ?></td>		
									<td><?php echo date('d-m-Y', strtotime($row['end_date'])); ?></td>
									<td><?php echo $pagename; ?></td>
									<td><?php echo $row['client_name']; ?></td>
									<td><?php echo $row['description']; ?></td>
									<td><?php echo $row['impressions']; ?></td>
									<td><?php echo $row['count_impressions']; ?></td>
									<td><?php echo $row['count_clicks']; ?></td>
									<td><?php echo $status; ?></td>
									<td>
										<a href="<?php echo base_url();?>admincontrol/editadbanners/<?php echo $row['id'] ; ?>">Edit</a> <?php if (isset($permission) && ($permission =='1')) { ?> / <a href="javascript:void(0)" deleteid="<?php echo $row['id']; ?>" class="delete">Delete</a>
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
			
			$(document).on('click', '.delete', function(){
				if(confirm("Are you sure to delete this record ?")){
					var deleteid = $(this).attr('deleteid');
					var url = '<?php echo base_url().'admincontrol/deleteadbanners'; ?>';
					$('<form method="post" action="'+url+'"><input type="hidden" name="deleteid" value="'+deleteid+'"></form>').appendTo('body').submit();
				}
			});
					
			$('#download').click(function(){
				$.ajax({					
					data: {advertisement: 'advertisement'},
			        type: 'POST',
			        url: '<?php echo base_url().'common/index/download_adbanners'; ?>',
			        dataType: "text",  
         			cache:false,	            
		            success:function(data)
			        {
			        	url = '<?php  echo base_url().'assets/uploads/articlesreport/'; ?>'+data+''+'.csv'+'';
			        	window.location.href = url;			        	
					 	console.log(data);
			        }
				});	
			});
			
    	});
</script>
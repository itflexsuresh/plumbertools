<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">ARTICLES</h4>
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
						<button type="button" id="download1" class="btn btn-info btn-fill"><i class="fa fa-download"></i> Download</button>
						<a href="<?php echo base_url();?>admincontrol/newarticles"><button type="button" class="btn btn-info btn-fill">Add New</button></a>		
					</div><br><br>				
					<?php } ?>	
					
					<div class="content table-responsive table-full-width">						
						<table class="table table-hover table-striped" id="datatables">
							<thead>
								<th>S.No</th>
								<th>Start Date</th>
								<th>Title</th>
								<th>Description</th>
								<th>Position</th>
								<th>Number of Impressions</th>								
								<th>Number of Comments</th>
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
									<td><?php echo date('d-m-Y', strtotime($row['start_date'])); ?></td>
									<td><?php echo $row['title']; ?></td>
									<td><?php echo $row['description']; ?></td>									
									<!-- <td><?php echo $row['position']; ?></td> -->
									<td data-sort="<?php echo $row['position']; ?>"><input id="<?php echo $row['id']; ?>" type="Number" min=1 max="<?php echo $last_pos; ?>" class="position" name="position" value="<?php echo $row['position']; ?>" style="width: 90%;" /></td>
									<td><?php echo $row['no_of_impressions']; ?></td>									
									<td><?php echo $row['commentcount']; ?></td>									
									<td>
										<input class="published" id="<?php echo $row['id']; ?>" <?php echo $checked; ?> type="checkbox" value="<?php echo $checkboxvalue; ?>">
									</td>						
									<td>
										<a href="<?php echo base_url();?>admincontrol/editarticles/<?php echo $row['id'] ; ?>">Edit</a> <?php if (isset($permission) && ($permission =='1')) { ?> / <a href="javascript:void(0)" deleteid="<?php echo $row['id']; ?>" class="delete">Delete</a>
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
					var url = '<?php echo base_url().'admincontrol/deletearticles'; ?>';
					$('<form method="post" action="'+url+'"><input type="hidden" name="deleteid" value="'+deleteid+'"></form>').appendTo('body').submit();
				}
			});

			$('.published').click(function(){		
				var value = $(this).attr('value');	
				var id = $(this).attr('id');	

				var url = '<?php echo base_url().'admincontrol/articles'; ?>';
					$('<form method="post" action="'+url+'"><input type="hidden" name="published" value="published"><input type="hidden" name="value" value="'+value+'"><input type="hidden" name="id" value="'+id+'"></form>').appendTo('body').submit();				
			});

			$('#download1').click(function(){
				$.ajax({					
					data: {articles: 'articles'},
			        type: 'POST',
			        url: '<?php echo base_url().'common/index/download_articles'; ?>',
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

			$(".position").change(function(){				
				var last_pos = '<?php echo $last_pos; ?>';					
				var value = $(this).val();			
				var id = $(this).attr('id');		
				if(isNumeric(value)){					
					var url = '<?php echo base_url().'admincontrol/positionchange'; ?>';
					$('<form method="post" action="'+url+'"><input type="hidden" name="position" value="'+value+'"><input type="hidden" name="id" value="'+id+'"></form>').appendTo('body').submit();	
				}else{
					alert('Please enter a value between 1 and '+last_pos+'.')
				}
			});

			function isNumeric(value) {
		        return /^-?\d+$/.test(value);
		    }
			
    	});
</script>
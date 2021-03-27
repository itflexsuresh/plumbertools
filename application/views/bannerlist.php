<?php 
// echo "<pre>";print_r($userdetails);die;
?>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<!--<h4 class="title">Banner</h4>
						<p class="category"></p><br> -->
					</div>
					
					<!-- <?php// if ($userdetails['warehouse_staff'] =='0') { ?>
						<div class="header">
							<label> Pages</label>
							<select name="pagesid" id="pagesid">
								<option value="">Select</option>
								<?php// foreach($pagesdata as $row1){?>
									<option value="<?php// echo $row1['id']; ?>" <?php// if($row1['id'] == $pagesid) { ?> selected <?php// } ?>><?php// echo $row1['title']; ?></option>
								<?php// } ?>
							</select>
						</div>
					<?php// }else{ ?> -->
						<div class="header">
							<label> Pages</label>
							<select name="pagesid" id="pagesid">
								<option value="">Select</option>
								<?php foreach($pagesdata as $row1){?>
									<option value="<?php echo $row1['id']; ?>" <?php if($row1['id'] == $pagesid) { ?> selected <?php } ?>><?php echo $row1['title']; ?></option>
								<?php } ?>
							</select>
						</div>
					<!-- <?php// } ?> -->
					
					
					<div class="header hideid">
						<h4 class="title">Top Banner</h4>
						<button type="button" topactivevalue="1" class="btn btn-success btn-fill pull-left topactive">Active</button>
						<button type="button" topactivevalue="2" class="btn btn-warning btn-fill pull-left topactive">Inactive</button>
						<?php if (isset($permission) && ($permission =='1')) { ?>
							<button id="newtopbutton" type="button" class="btn btn-info btn-fill pull-right">Add New</button><br><br>
						<?php } ?>
					</div>
					
					<div class="content table-responsive table-full-width hideid">						
						<table class="table table-hover table-striped">
							<thead>
								<th>S.No</th>
								<th>Name</th>
								<th>Client</th>
								<th>Description</th>
								<th>Impressions</th>
								<th>Clicks</th>
								<th>Section</th>
								<th>Active</th>
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
									<td><?php echo $row['client']; ?></td>
									<td><?php echo $row['description']; ?></td>
									<td><?php if($row['impressions1'] >0 ) { echo $row['impressions1']; } else { echo 0; } ?></td>
									<td><?php if($row['totalcount1'] >0 ) { echo $row['totalcount1']; } else { echo 0; } ?></td>
									<td><?php echo $row['pname']; ?></td>
									<!--<td><img src="<php echo base_url();?>./images/<php echo $row['image'];?>" height="50" width="100"></td>
									<td><php echo $row['link']; ?></td> -->
									<td><?php if($row['active']==1){ ?>True<?php } else { ?>False<?php } ?></td>
									<td>
										<a href="<?php echo base_url();?>admincontrol/editbanner/<?php echo $row['id'] ; ?>">Edit</a> 
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
					
					<!-- <div class="header hideid">
						<h4 class="title">Bottom Banner</h4>
						<button type="button" bottomactivevalue="1" class="btn btn-success btn-fill pull-left bottomactive">Active</button>
						<button type="button" bottomactivevalue="2" class="btn btn-warning btn-fill pull-left bottomactive">Inactive</button>
						<button id="newbottombutton" type="button" class="btn btn-info btn-fill pull-right">Add New</button><br><br>
					</div> -->
					
					<!-- <div class="content table-responsive table-full-width hideid">						
						<table class="table table-hover table-striped">
							<thead>
								<th>S.No</th>
								<th>Name</th>
								<th>Client</th>
								<th>Description</th>
								<th>Impressions</th>
								<th>Clicks</th>
								<th>Section</th>
								<th>Active</th>
								<th>Action</th>
							</thead>
							<tbody>
						<?php 
							//$i=1;
							//foreach($getdata1 as $row){
						?>
								<tr>
									<td><?php //echo $i; ?></td>
									<td><?php //echo $row['name']; ?></td>
									<td><?php //echo $row['client']; ?></td>
									<td><?php //echo $row['description']; ?></td>
									<td><?php //echo $row['impressions']; ?></td>
									<td><?php //if($row['totalcount'] >0 ) { echo $row['totalcount']; } else { echo 0; } ?></td>
									<td><?php //echo $row['pname']; ?></td>
									<!--<td><img src="<php echo base_url();?>./images/<php echo $row['image'];?>" height="50" width="100"></td>
									<td><php echo $row['link']; ?></td>-->
									<!-- <td><?php //if($row['active']==1){ ?>True<?php //} //else { ?>False<?php //} ?></td>
									<td><a href="<?php //echo base_url();?>admincontrol/editbanner/<?php //echo $row['id'] ; ?>">Edit</a> / <a href="#" deleteid="<?php //echo $row['id']; ?>" class="delete">Delete</a></td>
								</tr> -->
						<!-- <?php 
							//$i++;
							//}
						?>
							</tbody>
						</table>
					</div> -->
				</div>
			</div>			
		</div>
	</div>
</div>

<script type="text/javascript">
    	$(document).ready(function(){ 	
			
			var pagesidvalue=$('#pagesid').val();
			if(pagesidvalue > 0)
				$('.hideid').show();
			else
				$('.hideid').hide();
			
			
			$('#pagesid').change(function(){ 				
				var pagesidvalue=$('#pagesid').val();				
				var url = '<?php echo base_url().'admincontrol/bannerlist'; ?>';
				$('<form method="post" action="'+url+'"><input type="hidden" name="pagesid" value="'+pagesidvalue+'"></form>').appendTo('body').submit();
			});
			
			$('#newtopbutton').click(function(){
				var pagesidvalue=$('#pagesid').val();
				if(pagesidvalue <= 0){
					alert("Please select the Pages");
				}
				else{					
					var url = '<?php echo base_url().'admincontrol/newbannertop'; ?>';
					$('<form method="post" action="'+url+'"><input type="hidden" name="pagesid" value="'+pagesidvalue+'"></form>').appendTo('body').submit();
				}				
			});
			$('#newbottombutton').click(function(){
				var pagesidvalue=$('#pagesid').val();
				if(pagesidvalue <= 0){
					alert("Please select the Pages");
				}
				else{					
					var url = '<?php echo base_url().'admincontrol/newbannerbottom'; ?>';
					$('<form method="post" action="'+url+'"><input type="hidden" name="pagesid" value="'+pagesidvalue+'"></form>').appendTo('body').submit();
				}				
			});
			
			$('.delete').click(function(){				
				if(confirm("Are you sure to delete this record ?")){
					var deleteid = $(this).attr('deleteid');
					var pagesidvalue=$('#pagesid').val();
					var url = '<?php echo base_url().'admincontrol/deletebanner'; ?>';
					$('<form method="post" action="'+url+'"><input type="hidden" name="deleteid" value="'+deleteid+'"><input type="hidden" name="pagesid" value="'+pagesidvalue+'"></form>').appendTo('body').submit();
				}
			});
			
			$('.topactive').click(function(){
				var topactivevalue = $(this).attr('topactivevalue'); 
				var pagesidvalue=$('#pagesid').val();
				var url = '<?php echo base_url().'admincontrol/bannerlist'; ?>';
				$('<form method="post" action="'+url+'"><input type="hidden" name="topactivevalue" value="'+topactivevalue+'"><input type="hidden" name="pagesid" value="'+pagesidvalue+'"></form>').appendTo('body').submit();
			});
			
			$('.bottomactive').click(function(){
				var bottomactivevalue = $(this).attr('bottomactivevalue'); 
				var pagesidvalue=$('#pagesid').val();
				var url = '<?php echo base_url().'admincontrol/bannerlist'; ?>';
				$('<form method="post" action="'+url+'"><input type="hidden" name="bottomactivevalue" value="'+bottomactivevalue+'"><input type="hidden" name="pagesid" value="'+pagesidvalue+'"></form>').appendTo('body').submit();
			});
			
			
    	});
</script>
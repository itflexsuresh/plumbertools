<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">Membership Fees</h4>
						<p class="membershipfees"></p><br>
					</div>
					
					<!-- <button type="button" activevalue="1" class="btn btn-success btn-fill pull-left active">Active</button>
					<button type="button" activevalue="2" class="btn btn-warning btn-fill pull-left active">Inactive</button> -->
					<!-- <a href="<?php //echo base_url();?>admincontrol/newmembershipfees"><button type="button" class="btn btn-info btn-fill pull-right">Add New</button></a><br><br> -->	
					
					<div class="content table-responsive table-full-width">						
						<table class="table table-hover table-striped">
							<thead>
								<th>S.No</th>
								<th colspan="2">Associate Member</th>
								<th colspan="3">Plumbing Contractor</th>
								<th colspan="3">Merchant Member</th>
								<th colspan="3">Manufacturer Member</th>
								<th>Action</th>
							</thead>
							<tbody>
								<tr>
									<td></td>
									<td>Annual</td>
									<td>Monthly</td>
									<td>Regional Annual</td>
									<td>Regional Monthly</td>
									<td>National Annual</td>
									<td>Regional Annual</td>
									<td>Regional Monthly</td>
									<td>National Annual</td>
									<td>Regional Annual</td>
									<td>Regional Monthly</td>
									<td>National Annual</td>
									<td></td>
								</tr>
						<?php 
							$i=1;
							foreach($getdata as $row){
						?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo number_format($row['associate_annual'],2); ?></td>
									<td><?php echo number_format($row['associate_monthly'],2); ?></td>
									<td><?php echo number_format($row['plumbing_reg_annual'],2); ?></td>
									<td><?php echo number_format($row['plumbing_reg_monthly'],2); ?></td>
									<td><?php echo number_format($row['plumbing_nat_annual'],2); ?></td>
									<td><?php echo number_format($row['merchant_reg_annual'],2); ?></td>
									<td><?php echo number_format($row['merchant_reg_monthly'],2); ?></td>
									<td><?php echo number_format($row['merchant_nat_annual'],2); ?></td>
									<td><?php echo number_format($row['manufacturer_reg_annual'],2); ?></td>
									<td><?php echo number_format($row['manufacturer_reg_monthly'],2); ?></td>
									<td><?php echo number_format($row['manufacturer_nat_annual'],2); ?></td>
									
									<td><a href="<?php echo base_url();?>admincontrol/editmembershipfees/<?php echo $row['id'] ; ?>">Edit</a></td>
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
				var url = '<?php echo base_url().'admincontrol/membershipfeeslist'; ?>';
				$('<form method="post" action="'+url+'"><input type="hidden" name="activeval" value="'+activeval+'"></form>').appendTo('body').submit();
			});	
			
			$('.delete').click(function(){				
				if(confirm("Are you sure to delete this record ?")){
					var deleteid = $(this).attr('deleteid');
					var url = '<?php echo base_url().'admincontrol/deletemembershipfees'; ?>';
					$('<form method="post" action="'+url+'"><input type="hidden" name="deleteid" value="'+deleteid+'"></form>').appendTo('body').submit();
				}
			});
			
    	});
</script>
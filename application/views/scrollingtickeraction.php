
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="header">
					<?php if ($action == "new") { ?>
						<h4 class="title">Scrolling Ticker Manager</h4>
					<?php } if ($action == "edit") { ?>
						<h4 class="title">Update Scrolling Ticker Manager</h4>
					<?php } ?>
					</div>
					<div class="content">
						<form method="post" action="<?php echo base_url();?>admincontrol/scrollingtickeraction"  enctype="multipart/form-data">
							
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Scrolling Ticker</label>
									<?php if ($action == "new") { ?>										
										<input name="scrollingticker" type="text" class="form-control" placeholder="Scrolling Ticker" value="<?php echo set_value('scrollingticker'); ?>">
									<?php } if ($action == "edit") { ?>
										<input name="scrollingticker" type="text" class="form-control" placeholder="Scrolling Ticker" value="<?php echo set_value('scrollingticker',$getdata['scrollingticker']); ?>">
									<?php } ?>										
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<!--<label>Pagesid</label>-->
									<?php if ($action == "new") { ?>										
										<input id="pagesid" name="pagesid" type="hidden" class="form-control" placeholder="Pagesid" value="<?php echo set_value('pagesid',$pagesid); ?>">
									<?php } if ($action == "edit") { ?>
										<input id="pagesid" name="pagesid" type="hidden" class="form-control" placeholder="Pagesid" value="<?php echo set_value('pagesid',$getdata['pagesid']); ?>">
									<?php } ?>										
									</div>
								</div>
							</div>
							
						<?php if ($action == "new") { ?>
							<input name="insert" type="hidden" value="1">
							<button type="submit" class="btn btn-info btn-fill pull-left">Save</button>						
						<?php } if ($action == "edit") { ?>
							<input name="update" type="hidden" value="1">
							<input name="updateid" type="hidden" value="<?php echo $getdata['id']; ?>">
							<button type="submit" class="btn btn-info btn-fill pull-left">Update</button>
						<?php } ?>
							
							<button id="backbutton" type="button" class="btn btn-warning btn-fill pull-left">Back</button>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#backbutton').click(function(){
		var pagesid = $('#pagesid').val();
		var url = '<?php echo base_url().'admincontrol/scrollingtickeraction'; ?>';
		$('<form method="post" action="'+url+'"><input type="hidden" name="pagesid" value="'+pagesid+'"></form>').appendTo('body').submit();		
	});
</script>
<?php 
$filepath 				= base_url().'images/';
$pdfimg 				= base_url().'images/pdf.png';
$profileimg 			= base_url().'icons/profile.jpg';
$uploadimg 				= base_url().'icons/upload.png';

// print_r($tagdata);die;

?>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">Posts</h4>
						<p class="advertise_address"></p><br>
					</div>
					<div class="content">
						<form method="post" class="form1" enctype="multipart/form-data">
							
							<div class="row">
								<div class="scrolldiv">
									<div class="col-md-6">

										<label>Filter by Tag</label>
										<div class="form-group">
											
											<?php
											foreach($tagdata as $key => $value){ ?>
												<div class="col-md-6">
													<div class="custom-control custom-checkbox">
														<input type="checkbox" id="<?php echo $key.'-'.$value['id']; ?>" class="custom-control-input taggs" name="taggs[]" value="<?php echo $value['id']; ?>">
														<label class="custom-control-label" for="<?php echo $key.'-'.$value['id']; ?>"><?php echo $value['tag_name']; ?></label>
													</div>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Filter by Date Range Start</label>
										<input type="text" class="form-control startrange" id="startrange" name="startrange" value="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Filter by Date Range End</label>
										<input type="text" class="form-control endrange" id="endrange" name="endrange" value="">
									</div>
								</div>
							</div>
							<div class="row">
								<input id="id" name="id" type="hidden" class="form-control" value="">
								<div class="col-md-6">
									<div class="form-group">
										<button type="button" class="btn btn-info btn-fill pull-left search">Apply Filter</button>	
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<button type="button" id="reset" class="btn btn-info btn-fill pull-left search">Reset</button>
									</div>
								</div>
							</div>
							
						</form>
							<div class="content table-responsive table-full-width">						
								<table class="table-hover table-striped postatable">
									<thead>
										<tr>
											<th>Title</th>
											<th>User name</th>
											<th>Date Created</th>
											<th>Upvotes</th>
											<th>Downvotes</th>
											<th>Reports</th>
											<th>Action</th>
										</tr>
									</thead>
								</table>
						</div>
						<div class="row">
							<div class="col-md-12">
								<?php if (isset($permission) && ($permission =='1')) { ?>
								<a href="<?php echo base_url();?>admincontrol/newposts"><button type="button" class="btn btn-info btn-fill pull-right">Add a PIRB post</button></a>
								<?php } ?>
							</div>
						</div>
						
					</div>
				</div>
			</div>			
		</div>
	</div>
</div>

<script type="text/javascript">
    $(function(){
    	datepicker('#startrange, #endrange');
    	datatable();
    });

    $('.search').on('click',function(){		
		datatable(1);
	});

	$('#reset').click(function(){
		var _form = $('.form1');
		_form.find('input[type="text"], input[type="number"]').val('');
		_form.find('select').val('');
		_form.find('input[type="checkbox"]').prop('checked', false);
		datatable(1);
	})

    function datatable(destroy=0){

			var data = {
				startrange 	: $('#startrange').val(),
				endrange 	: $('#endrange').val(),
				taggs 		: $('.taggs:checked').map(function(){return $(this).val();}).get(),
			};

			var options = {
				url 	: 	'<?php echo base_url()."admincontrol/DTposts"; ?>',
				data    :   data,
				destroy :   destroy,  			
				columns : 	[
						{ "data": "title" },
						{ "data": "uname" },
						{ "data": "datecreated" },
						{ "data": "upvote" },
						{ "data": "downvote" },
						{ "data": "reports" },
						{ "data": "action" }
					],
				target		:	[6],
				sort		:	'0',
				createdrow 	: createdrow
			};
			
			ajaxdatatables('.postatable', options);
	}

	function createdrow(row, data, dataIndex){
		if(data.status=='0'){
			$(row).addClass('tablestripe');
		}
	}

	$(document).ready(function(){
		$(document).on('click', '.delete', function(){
			// if(confirm("Are you sure to delete this post ?")){
				// var deleteid = $(this).attr('data-id');
				// var url = '<?php // echo base_url().'admincontrol/changepostStatus'; ?>';
				// $('<form method="post" action="'+url+'"><input type="hidden" name="deleteid" value="'+deleteid+'"><input type="hidden" name="is_delete" value="1"></form>').appendTo('body').submit();
				var action 	= 	'<?php echo base_url().'admincontrol/changepostStatus'; ?>';
				var data	= 	'\
				<input type="hidden" value="'+$(this).attr('data-id')+'" name="id">\
				<input type="hidden" value="1" name="status">\
				';

				sweetalert(action, data);
			// }
		});
	})
	
</script>
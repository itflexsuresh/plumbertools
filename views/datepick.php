
<html lang="en">
<head>

	<title>PLUMBER</title>

    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />

	<!-- datepicker -->
	<link href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
	
	<script src="<?php echo base_url(); ?>assets/js/jquery-3.4.1.min.js" type="text/javascript"></script>
	
</head>
<body>

<div class='input-group date' id='datetimepicker1'>
	<input type='text' class="form-control" name="update_time" placeholder="Update Date"/> 
	<span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span> 
</div> 



</body>
	
    <!--   Core JS Files   -->     
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
	
	<!-- datepicker -->
	<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.min.js"></script>

	
	
	<script type="text/javascript">
    	$(document).ready(function(){
			
			$('#datetimepicker1').datepicker();
			
    	});
	</script>

</html>


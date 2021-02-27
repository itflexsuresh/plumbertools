
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy;<a href="#">Plumber</a>
                </p>
            </div>
        </footer>

    </div>
</div>


</body>
	
    <!--   Core JS Files   -->     
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
	
	<!-- Datatable -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>	
	
	<!-- datepicker 
	<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.min.js"></script> -->
	
	<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.timepicker.min.js" type="text/javascript"></script>
	
	
	<!--  Charts Plugin -->
	<script src="<?php echo base_url(); ?>assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-notify.js"></script>
	
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-selectpicker.js"></script>
	
    <!--  Google Maps Plugin    -->
    <!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="<?php echo base_url(); ?>assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url(); ?>assets/js/demo.js"></script>
	
	<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
	
	
	<script type="text/javascript">
    	$(document).ready(function(){
			//$("#treeview-menu").hide();
			$("#treeview").click(function(){ 
				$("#treeview-menu").toggle();
			});
			$("#treeview1").click(function(){ 
				$("#treeview-menu1").toggle();
			});
			$("#treeview2").click(function(){ 
				$("#treeview-menu2").toggle();
			});
			
			$("#datepick").click(function(){ 
				$('#datepick').datepicker();
			}
			);
			
			var table = $('.table').DataTable( {
				rowReorder: {
					selector: 'td:nth-child(2)'
				},				
				//"dom": '<"col-md-6"f><"col-md-6"l>tip',
				"dom": '<"pull-left"f><"pull-right"l>tip<"clear">',
				oLanguage: {
					"sSearch": 'Search'
				},
				'aoColumnDefs': [{
					'bSortable': false,
					'aTargets': [-1] /* 1st one, start by the right */
				}],
				responsive: true
				
			} );
			//"dom": '<"top"lf>rt<"bottom"ip><"clear">',
			
			
			
			
			CKEDITOR.replace( '.ckeditor' );
			
			
			/*
        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

            },{
                type: 'info',
                timer: 4000
            });
			*/

    	});
	</script>

</html>
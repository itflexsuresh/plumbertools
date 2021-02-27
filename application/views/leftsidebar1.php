
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>PLUMBER</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
	
    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?php echo base_url(); ?>assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url(); ?>assets/css/demo.css" rel="stylesheet" />
		
    <!--     Fonts and icons     -->
    <!--
	<link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/family-roboto.css" rel="stylesheet" type="text/css">
	-->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url(); ?>assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	
	<!-- Datatable -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/responsive.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">	
	
	<!-- datepicker -->
	<link href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
	
	<script src="<?php echo base_url(); ?>assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="<?php echo base_url(); ?>assets/img/sidebar-4.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    PLUMBER 
                </a>
            </div>

            <ul class="nav">
                <li <?php if($leftsidebar_value == 1 ) { ?> class="active" <?php } ?> >
                    <a href="<?php echo base_url();?>admincontrol/dashboard">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
				<li <?php if($leftsidebar_value == 31 ) { ?> class="active" <?php } ?> >
                    <a href="<?php echo base_url();?>admincontrol/homeimagelist">
                        <i class="pe-7s-id"></i>
                        <p>Home Image</p>
                    </a>
                </li>
				<li <?php if($leftsidebar_value == 21 ) { ?> class="active" <?php } ?> >
                    <a href="<?php echo base_url();?>admincontrol/backbannerlist">
                        <i class="pe-7s-id"></i>
                        <p>Background Image</p>
                    </a>
                </li>
				<li <?php if($leftsidebar_value == 29 ) { ?> class="active" <?php } ?> >
                    <a href="<?php echo base_url();?>admincontrol/scrollingtickerlist">
                        <i class="pe-7s-id"></i>
                        <p>Scrolling Ticker</p>
                    </a>
                </li>
				<li <?php if($leftsidebar_value == 30 ) { ?> class="active" <?php } ?> >
                    <a href="<?php echo base_url();?>admincontrol/plumbingafricalist">
                        <i class="pe-7s-id"></i>
                        <p>Plumbing Africa</p>
                    </a>
                </li>
				<li <?php if($leftsidebar_value == 20 ) { ?> class="active" <?php } ?> >
                    <a href="<?php echo base_url();?>admincontrol/bannerlist">
                        <i class="pe-7s-id"></i>
                        <p>Advertising</p>
                    </a>
                </li>				
				<li <?php if($leftsidebar_value == 22 ) { ?> class="active" <?php } ?> >
                    <a href="<?php echo base_url();?>admincontrol/newslist">
                        <i class="pe-7s-id"></i>
                        <p>News</p>
                    </a>
                </li>
                <!--<li <php if($leftsidebar_value == 2 ) { ?> class="active" <php } ?> >
                    <a href="<php echo base_url();?>admincontrol/advertisinglist">
                        <i class="pe-7s-id"></i>
                        <p>Advertising</p>
                    </a>
                </li>-->
				<li <?php if($leftsidebar_value == 3 ) { ?> class="active" <?php } ?>>
                    <a href="<?php echo base_url();?>admincontrol/supplierlist">
                        <i class="pe-7s-user"></i>
                        <p>Suppliers</p>
                    </a>
                </li>
				<li <?php if($leftsidebar_value == 23 ) { ?> class="active" <?php } ?>>
                    <a href="<?php echo base_url();?>admincontrol/membershiplist">
                        <i class="pe-7s-user"></i>
                        <p>Memberships</p>
                    </a>
                </li>
				
				<li id="treeview-productguides" <?php if($leftsidebar_value == 6) { ?> class="active" <?php } ?>>
					<a href="<?php echo base_url();?>admincontrol/productguideslist">								 
						<i class="pe-7s-id"></i>
						<p>Product Guides</p>
					</a>							
				</li>						
				<li id="treeview-healthsafety" <?php if($leftsidebar_value == 14 ) { ?> class="active" <?php } ?>>
					<a href="<?php echo base_url();?>admincontrol/healthsafetytipslist">
						<i class="pe-7s-id"></i>
						<p>Health & Safety</p>
					</a>
				</li>
				<li <?php if($leftsidebar_value == 7 ) { ?> class="active" <?php } ?>>
					<a href="<?php echo base_url();?>admincontrol/toolboxtalkslist">
						<i class="pe-7s-id"></i>
						<p>Toolbox Talks</p>
					</a>
				</li>
				
				<li <?php if($leftsidebar_value == 24 ) { ?> class="active" <?php } ?>>
                    <a href="<?php echo base_url();?>admincontrol/userlist">
                        <i class="pe-7s-user"></i>
                        <p>Users</p>
                    </a>
                </li>			
				
                <!--
				<li id="treeview">					
                    <a href="#"><i class="pe-7s-note2"></i><p>Content</p></a>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="pe-7s-note2"></i>
						<p>Content <b class="caret"></b></p>
					</a>					
					<ul id="treeview-menu">						
						<li <?php if($leftsidebar_value == 4 ) { ?> class="active" <?php } ?>>
							<a href="<?php echo base_url();?>admincontrol/helpcontentlist">
								 
								<p>Help Content</p>
							</a>
						</li>
						<li <?php if($leftsidebar_value == 5 ) { ?> class="active" <?php } ?>>
							<a href="<?php echo base_url();?>admincontrol/quizzeslist">
								 
								<p>Quizzes</p>
							</a>
						</li>						
						
						<li <?php if($leftsidebar_value == 8 ) { ?> class="active" <?php } ?>>
							<a href="<?php echo base_url();?>admincontrol/complianceregulationslist">
								 
								<p>Compliance & Regulations</p>
							</a>
						</li>
						<li <?php if($leftsidebar_value == 9 ) { ?> class="active" <?php } ?>>
							<a href="<?php echo base_url();?>admincontrol/checklistslist">
								 
								<p>Checklists</p>
							</a>
						</li>
						<li <?php if($leftsidebar_value == 10 ) { ?> class="active" <?php } ?>>
							<a href="<?php echo base_url();?>admincontrol/faqslist">
								 
								<p>FAQ's</p>
							</a>
						</li>
						<li <?php if($leftsidebar_value == 11 ) { ?> class="active" <?php } ?>>
							<a href="<?php echo base_url();?>admincontrol/pageslist">
								 
								<p>Pages</p>
							</a>
						</li>
						<li <?php if($leftsidebar_value == 12 ) { ?> class="active" <?php } ?>>
							<a href="<?php echo base_url();?>admincontrol/cpdcontentlist">
								 
								<p>CPD Content</p>
							</a>
						</li>
						<li <?php if($leftsidebar_value == 13 ) { ?> class="active" <?php } ?>>
							<a href="<?php echo base_url();?>admincontrol/custompagelist">
								 
								<p>Custom Page</p>
							</a>
						</li>
						
						<li <?php if($leftsidebar_value == 15 ) { ?> class="active" <?php } ?>>
							<a href="<?php echo base_url();?>admincontrol/popupnotificationlist">
								 
								<p>Pop Up Notifications</p>
							</a>
						</li>
						<li <?php if($leftsidebar_value == 16 ) { ?> class="active" <?php } ?>>
							<a href="<?php echo base_url();?>admincontrol/serviceratepdflist">
								 
								<p>Service Rates PDF</p>
							</a>
						</li>					
					</ul>
                </li> -->	
				
				<li id="treeview1">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="pe-7s-note2"></i>
						<p>Buy / Sell <b class="caret"></b></p>
					</a>
					
					<ul id="treeview-menu1">						
						<li <?php if($leftsidebar_value == 25 ) { ?> class="active" <?php } ?>>
							<a href="<?php echo base_url();?>admincontrol/itemlist">								 
								<p>Items</p>
							</a>
						</li>
						<li <?php if($leftsidebar_value == 26 ) { ?> class="active" <?php } ?>>
							<a href="<?php echo base_url();?>admincontrol/categorylist">								 
								<p>Categorys</p>
							</a>
						</li>
						<li <?php if($leftsidebar_value == 27 ) { ?> class="active" <?php } ?>>
							<a href="<?php echo base_url();?>admincontrol/locationlist">								 
								<p>Locations</p>
							</a>
						</li>
					</ul>
				</li>
				
            </ul>
    	</div>
    </div>

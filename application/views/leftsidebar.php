<?php 
// echo "<pre>";print_r($userdetails); 
$usertype         = $userdetails['type'];
$staff            = $userdetails['warehouse_staff'];
$readpermission   = explode(',', $userdetails['read_permission']);
$writepermission  = explode(',', $userdetails['write_permission']);

if ($userdetails['warehouse_staff'] =='1') { 
   $title = 'Builders Warehouse';               
}else{
   $title = "PLUMBER";                        
}
?>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.ico">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <title><?php echo $title; ?></title>
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
      <meta name="viewport" content="width=device-width" />
      <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
      <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet"/>
      <link href="<?php echo base_url(); ?>assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
      <link href="<?php echo base_url(); ?>assets/css/demo.css" rel="stylesheet" />
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
     <!--  <link href="<?php// echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" />
      <link href='<?php// echo base_url(); ?>assets/css/fonts.css/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'> -->
      <link href="<?php echo base_url(); ?>assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/responsive.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">
      <link href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
      <link href="<?php echo base_url(); ?>assets/css/jquery.timepicker.min.css" rel="stylesheet"/>
      <style>	    .dataTables_filter{	        text-align: left !important;				    }		.dataTables_wrapper .dataTables_filter input {	    margin-left: 0;				.gj-unselectable{			style="position: absolute; left: 621.5px; top: 24.2px; display: block;"		}	}	</style>
      <script src="<?php echo base_url(); ?>assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
   </head>
   <body>
      <div class="wrapper">

      <div class="sidebar" data-color="azure" data-image="<?php echo base_url(); ?>assets/img/empty.png">
         <div class="sidebar-wrapper">
            <div class="logo">                
               <a href="#" class="simple-text">
                  <?php echo $title; ?>
               </a>               
            </div>
            <?php if ($staff =='1') { ?>
               <ul class="nav">
                    <li <?php if($leftsidebar_value == 1 ) { ?> class="active" <?php } ?> >
                     <a href="<?php echo base_url();?>admincontrol/dashboard">
                        <i class="fa fa-dashboard"></i>                        
                        <p>Dashboard</p>
                     </a>
                  </li>
                  <li <?php if($leftsidebar_value == 66 ) { ?> class="active" <?php } ?> >
                     <a href="<?php echo base_url();?>admincontrol/adbanners">
                        <i class="pe-7s-display2"></i>                        
                        <p>Advertising</p>
                     </a>
                  </li>
                  <!-- <li <?php if($leftsidebar_value == 20 ) { ?> class="active" <?php } ?> >
                     <a href="<?php echo base_url();?>admincontrol/bannerlist">
                        <i class="pe-7s-display2"></i>                        
                        <p>Advertising</p>
                     </a>
                  </li> -->
               </ul>
              
            <?php }else{ ?>
               <ul class="nav">
                  <li <?php if($leftsidebar_value == 1 ) { ?> class="active" <?php } ?> >
                     <a href="<?php echo base_url();?>admincontrol/dashboard">
                        <i class="fa fa-dashboard"></i>                        
                        <p>Dashboard</p>
                     </a>
                  </li>
                  <!-- <li <?php // if($leftsidebar_value == 31 ) { ?> class="active" <?php // } ?> >
                     <a href="<?php // echo base_url();?>admincontrol/homeimagelist">
                        <i class="pe-7s-photo"></i>                        
                        <p>Home Image</p>
                     </a>
                  </li> -->
                  <!-- <li <?php // if($leftsidebar_value == 21 ) { ?> class="active" <?php // } ?> >
                     <a href="<?php // echo base_url();?>admincontrol/backbannerlist">
                        <i class="pe-7s-photo"></i>                        
                        <p>Background Image</p>
                     </a>
                  </li> -->
                  <?php if ($usertype =='1' || (in_array('1', $readpermission)) || in_array('1', $writepermission)) { ?>
                     <li <?php if($leftsidebar_value == 29 ) { ?> class="active" <?php } ?> >
                        <a href="<?php echo base_url();?>admincontrol/scrollingtickerlist">
                           <i class="pe-7s-map-2"></i>                        
                           <p>Scrolling Ticker</p>
                        </a>
                     </li>
                  <?php  } ?>
                 <!--  <?php// if ($usertype =='1' || (in_array('2', $readpermission)) || in_array('2', $writepermission)) { ?>
                     <li <?php// if($leftsidebar_value == 30 ) { ?> class="active" <?php// } ?> >
                        <a href="<?php// echo base_url();?>admincontrol/plumbingafricalist">
                           <i class="pe-7s-photo"></i>                        
                           <p>Plumbing Africa</p>
                        </a>
                     </li>
                  <?php// } ?> -->
                  <?php if ($usertype =='1' || (in_array('3', $readpermission)) || in_array('3', $writepermission)) { ?>
                     <li id="treeview7">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                           <i class="pe-7s-display2"></i>                        
                           <p>Advertising <b class="caret"></b></p>
                        </a>
                        <ul id="treeview-menu7">
                           <!-- <?php if ($usertype == '1' || (in_array('3', $readpermission)) || in_array('3', $writepermission)) {?>
                           <li <?php if($leftsidebar_value == 20 ) { ?> class="active" <?php } ?>>
                              <a href="<?php echo base_url(); ?>admincontrol/bannerlist">
                                 <p>Banner List</p>
                              </a>
                           </li>
                           <?php } ?> -->
                           <?php if ($usertype == '1' || (in_array('3', $readpermission)) || in_array('3', $writepermission)) {?>
                           <li <?php if($leftsidebar_value == 65 ) { ?> class="active" <?php } ?>>
                              <a href="<?php echo base_url(); ?>admincontrol/clients">
                                 <p>Clients</p>
                              </a>
                           </li>
                           <?php } ?>
                           <?php if ($usertype == '1' || (in_array('3', $readpermission)) || in_array('3', $writepermission)) {?>
                           <li <?php if($leftsidebar_value == 66 ) { ?> class="active" <?php } ?>>
                              <a href="<?php echo base_url(); ?>admincontrol/adbanners">
                                 <p>Advertisement / Banners</p>
                              </a>
                           </li>                        
                           <?php } ?>
                        </ul>
                     </li>
                  <?php } ?>
                  <?php if ($usertype == '1' || (in_array('4', $readpermission)) || in_array('4', $writepermission)) {?>
                  <li id="treeview">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="pe-7s-helm"></i>
                        <p>MAGAZINE <b class="caret"></b></p>
                     </a>
                     <ul id="treeview-menu">
                        <?php if ($usertype == '1' || (in_array('4', $readpermission)) || in_array('4', $writepermission)) {?>
                        <li <?php if($leftsidebar_value == 61 ) { ?> class="active" <?php } ?>>
                           <a href="<?php echo base_url(); ?>admincontrol/articles">
                              <p>Articles</p>
                           </a>
                        </li>
                        <?php } ?>
                        <?php if ($usertype == '1' || (in_array('4', $readpermission)) || in_array('4', $writepermission)) {?>
                        <li <?php if($leftsidebar_value == 64 ) { ?> class="active" <?php } ?>>
                           <a href="<?php echo base_url(); ?>admincontrol/writers">
                              <p>Writers</p>
                           </a>
                        </li>
                        <?php } ?>
                        <?php if ($usertype == '1' || (in_array('4', $readpermission)) || in_array('4', $writepermission)) {?>
                        <li <?php if($leftsidebar_value == 62 ) { ?> class="active" <?php } ?>>
                           <a href="<?php echo base_url(); ?>admincontrol/tags">
                              <p>Tags</p>
                           </a>
                        </li>
                        <?php } ?>
                        <?php if ($usertype == '1' || (in_array('4', $readpermission)) || in_array('4', $writepermission)) {?>
                        <li <?php if($leftsidebar_value == 63 ) { ?> class="active" <?php } ?>>
                           <a href="<?php echo base_url(); ?>admincontrol/comments">
                              <p>Comments</p>
                           </a>
                        </li>
                        <?php } ?>
                        <?php if ($usertype == '1' || (in_array('4', $readpermission)) || in_array('4', $writepermission)) {?>
                        <li <?php if($leftsidebar_value == 67 ) { ?> class="active" <?php } ?>>
                           <a href="<?php echo base_url(); ?>admincontrol/commentsreports">
                              <p>Reports</p>
                           </a>
                        </li>
                        <?php } ?>
                     </ul>
                  </li>
                  <?php }?>
                  <?php if ($usertype =='1' || (in_array('5', $readpermission)) || in_array('5', $writepermission)) { ?>
                     <li id="treeview-productguides" <?php if($leftsidebar_value == 6) { ?> class="active" <?php } ?>>
                        <a href="<?php echo base_url();?>admincontrol/productguideslist">
                           <i class="pe-7s-photo-gallery"></i>                
                           <p>Reference Guides</p>
                        </a>
                     </li>
                  <?php } ?>
                  <!-- <?php// if ($usertype =='1' || (in_array('6', $readpermission)) || in_array('6', $writepermission)) { ?>
                     <li <?php// if($leftsidebar_value == 7 ) { ?> class="active" <?php// } ?>>
                        <a href="<?php// echo base_url();?>admincontrol/toolboxtalkslist">
                           <i class="pe-7s-tools"></i>                  
                           <p>Toolbox Talks</p>
                        </a>
                     </li>
                  <?php// } ?> -->
                  <?php if ($usertype =='1' || (in_array('36', $readpermission)) || in_array('36', $writepermission)) { ?>
                     <li id="treeview-productguides" <?php if($leftsidebar_value == 70) { ?> class="active" <?php } ?>>
                        <a href="<?php echo base_url();?>admincontrol/newtoolboxtalkslist">
                           <i class="pe-7s-tools"></i>                
                           <p>Toolbox Talks</p>
                        </a>
                     </li>
                  <?php } ?>
                  <?php if ($usertype =='1' || (in_array('7', $readpermission)) || in_array('7', $writepermission)) { ?>
                     <li <?php if($leftsidebar_value == 24 ) { ?> class="active" <?php } ?>>
                        <a href="<?php echo base_url();?>admincontrol/userlist">
                           <i class="pe-7s-users"></i>                        
                           <p>Users</p>
                        </a>
                     </li>
                  <?php } ?>
                  <?php if ($usertype =='1' || (in_array('8', $readpermission)) || in_array('8', $writepermission)) { ?>
                     <li <?php if($leftsidebar_value == 60 ) { ?> class="active" <?php } ?>>
                        <a href="<?php echo base_url();?>admincontrol/systemusers">
                           <i class="pe-7s-users"></i>                        
                           <p>System Users</p>
                        </a>
                     </li>
                  <?php } ?>
                  <!-- <li <?php // if($leftsidebar_value == 34 ) { ?> class="active" <?php // } ?> >
                     <a href="<?php // echo base_url();?>admincontrol/contactlist">
                        <i class="pe-7s-mail"></i>                        
                        <p>Contact us</p>
                     </a>
                  </li> -->
                  <?php if ($usertype =='1' || (in_array('9', $readpermission)) || in_array('9', $writepermission)) { ?>
                     <li id="treeview1">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                           <i class="pe-7s-helm"></i>                
                           <p>Rate My Work <b class="caret"></b></p>
                        </a>
                        <ul id="treeview-menu1">
                           <?php if ($usertype =='1' || (in_array('9', $readpermission)) || in_array('9', $writepermission)) { ?>
                               <li <?php if($leftsidebar_value == 57 ) { ?> class="active" <?php } ?>>
                                 <a href="<?php echo base_url();?>admincontrol/posts">
                                    <p>POSTS</p>
                                 </a>
                              </li>
                           <?php } ?>
                           <?php if ($usertype =='1' || (in_array('10', $readpermission)) || in_array('10', $writepermission)) { ?>
                              <li <?php if($leftsidebar_value == 58 ) { ?> class="active" <?php } ?>>
                                 <a href="<?php echo base_url();?>admincontrol/settings">
                                    <p>SETTINGS</p>
                                 </a>
                              </li>
                           <?php } ?>
                           <?php if ($usertype =='1' || (in_array('11', $readpermission)) || in_array('11', $writepermission)) { ?>
                              <li <?php if($leftsidebar_value == 59 ) { ?> class="active" <?php } ?>>
                                 <a href="<?php echo base_url();?>admincontrol/statistics">
                                    <p>SATISTICS</p>
                                 </a>
                              </li>
                           <?php } ?>
                        </ul>
                     </li>
                  <?php } ?>
                  <?php if ($usertype =='1' || (in_array('12', $readpermission)) || in_array('12', $writepermission)) { ?>
                     <li id="treeview2">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                           <i class="pe-7s-cash"></i>                
                           <p>Buy / Sell <b class="caret"></b></p>
                        </a>
                        <ul id="treeview-menu2">
                           <?php if ($usertype =='1' || (in_array('12', $readpermission)) || in_array('12', $writepermission)) { ?>
                              <li <?php if($leftsidebar_value == 25 ) { ?> class="active" <?php } ?>>
                                 <a href="<?php echo base_url();?>admincontrol/itemlist">
                                    <p>Items</p>
                                 </a>
                              </li>
                           <?php } ?>
                           <?php if ($usertype =='1' || (in_array('13', $readpermission)) || in_array('13', $writepermission)) { ?>
                              <li <?php if($leftsidebar_value == 26 ) { ?> class="active" <?php } ?>>
                                 <a href="<?php echo base_url();?>admincontrol/categorylist">
                                    <p>Categorys</p>
                                 </a>
                              </li>
                           <?php } ?>
                           <?php if ($usertype =='1' || (in_array('14', $readpermission)) || in_array('14', $writepermission)) { ?>
                              <li <?php if($leftsidebar_value == 27 ) { ?> class="active" <?php } ?>>
                                 <a href="<?php echo base_url();?>admincontrol/locationlist">
                                    <p>Locations</p>
                                 </a>
                              </li>
                           <?php } ?>
                        </ul>
                     </li>
                  <?php } ?>
                 <!--  <li id="treeview2">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="pe-7s-helm"></i>                
                        <p>ARTICULATE IT <b class="caret"></b></p>
                     </a>
                     <ul id="treeview-menu2">
                        <li <?php // if($leftsidebar_value == 32 ) { ?> class="active" <?php // } ?>>
                           <a href="<?php // echo base_url();?>admincontrol/webinarslist">
                              <p> WEBINARS</p>
                           </a>
                        </li>
                        <li <?php // if($leftsidebar_value == 33 ) { ?> class="active" <?php // } ?>>
                           <a href="<?php // echo base_url();?>admincontrol/radiolist">
                              <p> RADIO</p>
                           </a>
                        </li>
                     </ul>
                  </li> -->
                  <?php if ($usertype =='1' || (in_array('15', $readpermission)) || in_array('15', $writepermission)) { ?>
                     <li id="treeview3">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                           <i class="pe-7s-helm"></i>                
                           <p>IOPSA <b class="caret"></b></p>
                        </a>
                        <ul id="treeview-menu3">
                           <?php if ($usertype =='1' || (in_array('15', $readpermission)) || in_array('15', $writepermission)) { ?>
                              <li <?php if($leftsidebar_value == 35 ) { ?> class="active" <?php } ?>>
                                 <a href="<?php echo base_url();?>admincontrol/iopsa_homepagelist">
                                    <p> Home Page</p>
                                 </a>
                              </li>
                           <?php } ?>
                           <?php if ($usertype =='1' || (in_array('16', $readpermission)) || in_array('16', $writepermission)) { ?>
                              <li <?php if($leftsidebar_value == 36 ) { ?> class="active" <?php } ?>>
                                 <a href="<?php echo base_url();?>admincontrol/iopsa_membershipfeeslist">
                                    <p> Membership Fees</p>
                                 </a>
                              </li>
                           <?php } ?>
                           <?php if ($usertype =='1' || (in_array('17', $readpermission)) || in_array('17', $writepermission)) { ?>
                              <li <?php if($leftsidebar_value == 37 ) { ?> class="active" <?php } ?>>
                                 <a href="<?php echo base_url();?>admincontrol/iopsa_contactuslist">
                                    <p> Contact Us</p>
                                 </a>
                              </li>
                           <?php } ?>
                           <?php if ($usertype =='1' || (in_array('34', $readpermission)) || in_array('34', $writepermission)) { ?>
                              <li <?php if($leftsidebar_value == 38 ) { ?> class="active" <?php } ?>>
                                 <a href="<?php echo base_url();?>admincontrol/iopsa_addresslist">
                                    <p> Physical Address</p>
                                 </a>
                              </li>
                           <?php } ?>
                           <?php if ($usertype =='1' || (in_array('18', $readpermission)) || in_array('18', $writepermission)) { ?>
                              <li <?php if($leftsidebar_value == 39 ) { ?> class="active" <?php } ?>>
                                 <a href="<?php echo base_url();?>admincontrol/iopsa_categorylist">
                                    <p> Membership Category</p>
                                 </a>
                              </li>
                           <?php } ?>
                           <?php if ($usertype =='1' || (in_array('35', $readpermission)) || in_array('35', $writepermission)) { ?>
                              <li <?php if($leftsidebar_value == 40 ) { ?> class="active" <?php } ?>>
                                 <a href="<?php echo base_url();?>admincontrol/iopsa_provincelist">
                                    <p> Province</p>
                                 </a>
                              </li>
                           <?php } ?>
                           <?php if ($usertype =='1' || (in_array('19', $readpermission)) || in_array('19', $writepermission)) { ?>
                              <li <?php if($leftsidebar_value == 41 ) { ?> class="active" <?php } ?>>
                                 <a href="<?php echo base_url();?>admincontrol/iopsa_memberlist">
                                    <p> MEMBERSHIP CONTACT US</p>
                                 </a>
                              </li>
                           <?php } ?>
                           <?php if ($usertype =='1' || (in_array('20', $readpermission)) || in_array('20', $writepermission)) { ?>
                              <li id="treeview4">
                                 <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>Aims and Objectives <b class="caret"></b></p>
                                 </a>
                                 <ul id="treeview-menu4">
                                    <?php if ($usertype =='1' || (in_array('20', $readpermission)) || in_array('20', $writepermission)) { ?>
                                       <li <?php if($leftsidebar_value == 42 ) { ?> class="active" <?php } ?>>
                                          <a href="<?php echo base_url();?>admincontrol/iopsa_aimscontentlist">
                                             <p> Content</p>
                                          </a>
                                       </li>
                                    <?php } ?>
                                    <?php if ($usertype =='1' || (in_array('21', $readpermission)) || in_array('21', $writepermission)) { ?>
                                       <li <?php if($leftsidebar_value == 43 ) { ?> class="active" <?php } ?>>
                                          <a href="<?php echo base_url();?>admincontrol/iopsa_aimsimagelist">
                                             <p> Images</p>
                                          </a>
                                       </li>
                                    <?php } ?>
                                 </ul>
                              </li>
                           <?php } ?>
                           <?php if ($usertype =='1' || (in_array('36', $readpermission)) || in_array('36', $writepermission)) { ?>
                              <li <?php if($leftsidebar_value == 44 ) { ?> class="active" <?php } ?>>
                                 <a href="<?php echo base_url();?>admincontrol/iopsa_settingslist">
                                    <p> Settings</p>
                                 </a>
                              </li>
                           <?php } ?>
                        </ul>
                     </li>
                  <?php } ?>
                  <?php if ($usertype =='1' || (in_array('22', $readpermission)) || in_array('22', $writepermission)) { ?>
                     <li id="treeview5">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                           <i class="pe-7s-helm"></i>                
                           <p>PIRB <b class="caret"></b></p>
                        </a>
                        <ul id="treeview-menu5">
                           <?php if ($usertype =='1' || (in_array('22', $readpermission)) || in_array('22', $writepermission)) { ?>
                              <li <?php if($leftsidebar_value == 45 ) { ?> class="active" <?php } ?>>
                                 <a href="<?php echo base_url();?>admincontrol/pirb_aboutcontentlist">
                                    <p> About Content</p>
                                 </a>
                              </li>
                           <?php } ?>
                           <?php if ($usertype =='1' || (in_array('23', $readpermission)) || in_array('23', $writepermission)) { ?>
                              <li <?php if($leftsidebar_value == 46 ) { ?> class="active" <?php } ?>>
                                 <a href="<?php echo base_url();?>admincontrol/pirb_aboutimagelist">
                                    <p> About Image</p>
                                 </a>
                              </li>
                           <?php } ?>
                           <?php if ($usertype =='1' || (in_array('24', $readpermission)) || in_array('24', $writepermission)) { ?>
                              <li <?php if($leftsidebar_value == 52 ) { ?> class="active" <?php } ?>>
                                 <a href="<?php echo base_url();?>admincontrol/pirb_registrationlist">
                                    <p> Registration </p>
                                 </a>
                              </li>
                           <?php } ?>
                           <?php if ($usertype =='1' || (in_array('25', $readpermission)) || in_array('25', $writepermission)) { ?>
                              <li <?php if($leftsidebar_value == 47 ) { ?> class="active" <?php } ?>>
                                 <a href="<?php echo base_url();?>admincontrol/pirb_costcategorylist">
                                    <p> Cost Category</p>
                                 </a>
                              </li>
                           <?php } ?>
                           <?php if ($usertype =='1' || (in_array('26', $readpermission)) || in_array('26', $writepermission)) { ?>
                              <li <?php if($leftsidebar_value == 48 ) { ?> class="active" <?php } ?>>
                                 <a href="<?php echo base_url();?>admincontrol/pirb_costlist">
                                    <p> Cost</p>
                                 </a>
                              </li>
                           <?php } ?>
                           <?php if ($usertype =='1' || (in_array('27', $readpermission)) || in_array('27', $writepermission)) { ?>
                              <li <?php if($leftsidebar_value == 56 ) { ?> class="active" <?php } ?>>
                                 <a href="<?php echo base_url();?>admincontrol/pirblicensing">
                                    <p> PIRB Licensing System</p>
                                 </a>
                              </li>
                           <?php } ?>
                           <?php if ($usertype =='1' || (in_array('28', $readpermission)) || in_array('28', $writepermission)) { ?>
                              <li <?php if($leftsidebar_value == 49 ) { ?> class="active" <?php } ?>>
                                 <a href="<?php echo base_url();?>admincontrol/pirb_contactuslist">
                                    <p> Contact Us</p>
                                 </a>
                              </li>
                           <?php } ?>
                           <?php if ($usertype =='1' || (in_array('29', $readpermission)) || in_array('29', $writepermission)) { ?>
                              <li <?php if($leftsidebar_value == 50 ) { ?> class="active" <?php } ?>>
                                 <a href="<?php echo base_url();?>admincontrol/pirb_addresslist">
                                    <p> Physical Address</p>
                                 </a>
                              </li>
                           <?php } ?>
                           <?php if ($usertype =='1' || (in_array('30', $readpermission)) || in_array('30', $writepermission)) { ?>
                           <li <?php if($leftsidebar_value == 51 ) { ?> class="active" <?php } ?>>
                              <a href="<?php echo base_url();?>admincontrol/pirb_settingslist">
                                 <p> Settings</p>
                              </a>
                           </li>
                        <?php } ?>
                        </ul>
                     </li>
                  <?php } ?>
                  <?php if ($usertype =='1' || (in_array('31', $readpermission)) || in_array('31', $writepermission)) { ?>
                     <li id="treeview6">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                           <i class="pe-7s-helm"></i>                
                           <p>Advertise <b class="caret"></b></p>
                        </a>
                        <ul id="treeview-menu6">
                           <?php if ($usertype =='1' || (in_array('31', $readpermission)) || in_array('31', $writepermission)) { ?>
                              <li <?php if($leftsidebar_value == 53 ) { ?> class="active" <?php } ?>>
                                 <a href="<?php echo base_url();?>admincontrol/advertise_contactuslist">
                                    <p> Contact Us</p>
                                 </a>
                              </li>
                           <?php } ?>
                           <?php if ($usertype =='1' || (in_array('32', $readpermission)) || in_array('32', $writepermission)) { ?>
                              <li <?php if($leftsidebar_value == 54 ) { ?> class="active" <?php } ?>>
                                 <a href="<?php echo base_url();?>admincontrol/advertise_addresslist">
                                    <p> Physical Address</p>
                                 </a>
                              </li>
                           <?php } ?>
                           <?php if ($usertype =='1' || (in_array('33', $readpermission)) || in_array('33', $writepermission)) { ?>
                              <li <?php if($leftsidebar_value == 55 ) { ?> class="active" <?php } ?>>
                                 <a href="<?php echo base_url();?>admincontrol/advertise_settingslist">
                                    <p> Settings</p>
                                 </a>
                              </li>
                           <?php } ?>
                        </ul>
                     </li>
                  <?php }?>
                  <?php if ($usertype =='1' || (in_array('37', $readpermission)) || in_array('37', $writepermission)) { ?>
                     <li id="treeview8">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                           <i class="pe-7s-helm"></i>                
                           <p>Advanced Valves <b class="caret"></b></p>
                        </a>
                        <ul id="treeview-menu8">
                           <?php if ($usertype =='1' || (in_array('37', $readpermission)) || in_array('37', $writepermission)) { ?>
                              <li <?php if($leftsidebar_value == 68 ) { ?> class="active" <?php } ?>>
                                 <a href="<?php echo base_url();?>admincontrol/productrange">
                                    <p> Product Range</p>
                                 </a>
                              </li>
                           <?php } ?>
                           <?php if ($usertype =='1' || (in_array('38', $readpermission)) || in_array('38', $writepermission)) { ?>
                              <li <?php if($leftsidebar_value == 69 ) { ?> class="active" <?php } ?>>
                                 <a href="<?php echo base_url();?>admincontrol/advancedcontactus">
                                    <p> Contact Us</p>
                                 </a>
                              </li>
                           <?php } ?>
                        </ul>
                     </li>
                  <?php }?>
                  
                  <?php if ($usertype =='1' || (in_array('40', $readpermission)) || in_array('40', $writepermission)) { ?>
                     <li <?php if($leftsidebar_value == 71 ) { ?> class="active" <?php } ?>>
                        <a href="<?php echo base_url();?>admincontrol/helpvideolist">
                           <i class="pe-7s-users"></i>                        
                           <p>Help Videos</p>
                        </a>
                     </li>
                  <?php } ?>
               </ul>
            <?php } ?>
            
         </div>
      </div>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admincontrol extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('adminmodel');
		$this->load->model('Usersmodel');
		$this->load->model('Apimodel');
		$this->load->model('Diarymodel');
		$this->dashboard_title	 			=	"Dashboard";$this->dashboard_value 				=	1;
		$this->newdashboard_title	 		=	"New Dashboard"; $this->newdashboard_value 		=	1;

		$this->advertising_title 			=	"Plumber";	$this->advertising_title2 			=	""; 
		$this->advertising_value 			=	2;

		$this->supplier_title 				= 	"Plumber";	$this->supplier_title2 				= 	"";
		$this->supplier_value 				=	3;

		$this->helpcontent_title 			=	"Plumber";	$this->helpcontent_title2 			=	"";
		$this->helpcontent_value			=	4;

		$this->quizzes_title 				=	"Plumber";	$this->quizzes_title2 				=	"";
		$this->quizzes_value				=	5;

		$this->productguides_title 			=	"Plumber";	$this->productguides_title2 		=	"";
		$this->productguides_value 			=	6;

		$this->productguidessection_title 	=	"Plumber";	$this->productguidessection_title2 	=	"";
		$this->productguidessection_value 	=	6;

		$this->toolboxtalks_title 			=	"Plumber";	$this->toolboxtalks_title2 			=	"";
		$this->toolboxtalks_value 			=	7;

		$this->toolboxtalkssection_title 	=	"Plumber";	$this->toolboxtalkssection_title2	=	"";
		$this->toolboxtalkssection_value 	=	7;

		$this->complianceregulations_title 	=	"Plumber";	$this->complianceregulations_title2 =	"";
		$this->complianceregulations_value 	=	8;

		$this->checklists_title 			=	"Plumber";	$this->checklists_title2 			=	"";
		$this->checklists_value 			=	9;

		$this->checklistssection_title 		=	"Plumber";	$this->checklistssection_title2 	=	"";
		$this->checklistssection_value 		=	9;

		$this->faqs_title 					=	"Plumber";	$this->faqs_title2 					=	"";
		$this->faqs_value					=	10;

		$this->pages_title 					=	"Plumber";	$this->pages_title2 				=	"";
		$this->pages_value 					=	11;

		$this->cpdcontent_title 			=	"Plumber";	$this->cpdcontent_title2 			=	"";
		$this->cpdcontent_value				=	12;

		$this->custompage_title 			=	"Plumber";	$this->custompage_title2 			=	"";
		$this->custompage_value				=	13;

		$this->healthsafetytips_title 		=	"Plumber";	$this->healthsafetytips_title2 		=	"";
		$this->healthsafetytips_value 		=	14;

		$this->popupnotification_title 		= 	"Plumber";	$this->popupnotification_title2 	= 	"";
		$this->popupnotification_value 		=	15;

		$this->serviceratepdf_title 		=	"Plumber";	$this->serviceratepdf_title2 		=	"";
		$this->serviceratepdf_value 		=	16;

		$this->banner_title 				= 	"Plumber"; 	$this->banner_title2 				=	"";
		$this->banner_value 				=	20;

		$this->backbanner_title 			=	"Plumber";	$this->backbanner_title2			=	"";
		$this->backbanner_value				=	21;

		$this->news_title 					=	"Plumber";	$this->news_title2 					=	"";
		$this->news_value 					=	22;

		$this->membership_title 			=	"Plumber";	$this->membership_title2 			=	"";
		$this->membership_value 	 		=	23;

		$this->user_title 					=	"Plumber"; 	$this->user_title2 					=	"";
		$this->user_value 					=	24;

		$this->item_title 					=	"Buy/Sell"; $this->item_title2 					=	"";
		$this->item_value 					=	25;

		$this->category_title 				=	"Buy/Sell";	$this->category_title2 				=	"";
		$this->category_value 				=	26;

		$this->location_title 				=	"Buy/Sell";	$this->location_title2 				=	"";
		$this->location_value 				=	27;

		$this->scrollingticker_title 		=	"Plumber";	$this->scrollingticker_title2 		=	"";
		$this->scrollingticker_value 		=	29;

		$this->plumbingafrica_title 		=	"Plumber";	$this->plumbingafrica_title2 		=	"";
		$this->plumbingafrica_value 		=	30;

		$this->homeimage_title 				=	"Plumber";	$this->homeimage_title2 			=	"";
		$this->homeimage_value 				=	31;

		$this->webinars_title 				=	"Articulate IT"; $this->webinars_title2 		=	"";
		$this->webinars_value 				=	32;

		$this->radio_title 					= 	"Articulate IT"; $this->radio_title2 			=	"";
		$this->radio_value 					=	33;

		$this->contact_title 				=	"Plumber";	$this->contact_title2 				=	"";
		$this->contact_value 				=	34;
		
		$this->iopsa_homepage_title 		=	"IOPSA"; 	$this->iopsa_homepage_title2 		=	"";
		$this->iopsa_homepage_value 		=	35;

		$this->iopsa_membershipfees_title 	=	"IOPSA";	$this->iopsa_membershipfees_title2 	=	"";
		$this->iopsa_membershipfees_value 	=	36;

		$this->iopsa_contactus_title 		=	"IOPSA";	$this->iopsa_contactus_title2 		=	"";
		$this->iopsa_contactus_value 		=	37;

		$this->iopsa_address_title 			="IOPSA";		$this->iopsa_address_title2 		=	"";
		$this->iopsa_address_value 			=	38;

		$this->iopsa_category_title 		=	"IOPSA";	$this->iopsa_category_title2 		=	"";
		$this->iopsa_category_value 		=	39;

		$this->iopsa_province_title 		=	"IOPSA";	$this->iopsa_province_title2 		=	"";
		$this->iopsa_province_value 		=	40;

		$this->iopsa_member_title 			=	"IOPSA";	$this->iopsa_member_title2 			=	"";
		$this->iopsa_member_value 			=	41;

		$this->iopsa_aimscontent_title 		=	"IOPSA";	$this->iopsa_aimscontent_title2 	=	"";
		$this->iopsa_aimscontent_value 		=	42;

		$this->iopsa_aimsimage_title 		=	"IOPSA"; 	$this->iopsa_aimsimage_title2 		=	"";
		$this->iopsa_aimsimage_value 		=	43;

		$this->iopsa_settings_title 		=	"IOPSA";	$this->iopsa_settings_title2 		=	"";
		$this->iopsa_settings_value 		=	44;

		$this->pirb_aboutcontent_title 		=	"PIRB";		$this->pirb_aboutcontent_title2 	=	"";
		$this->pirb_aboutcontent_value 		=	45;

		$this->pirb_aboutimage_title 		=	"PIRB";		$this->pirb_aboutimage_title2 		=	"";
		$this->pirb_aboutimage_value 		=	46;

		$this->pirb_costcategory_title 		=	"PIRB"; 	$this->pirb_costcategory_title2 	=	"";
		$this->pirb_costcategory_value 		=	47;

		$this->pirb_cost_title 				=	"PIRB";		$this->pirb_cost_title2 			=	"";
		$this->pirb_cost_value 				=	48;

		$this->pirb_contactus_title 		=	"PIRB"; 	$this->pirb_contactus_title2 		=	"";
		$this->pirb_contactus_value 		=	49;

		$this->pirb_address_title 			=	"PIRB";		$this->pirb_address_title2 			=	"";
		$this->pirb_address_value 			=	50;

		$this->pirb_settings_title 			=	"PIRB";  	$this->pirb_settings_title2 		=	"";
		$this->pirb_settings_value 			=	51;

		$this->pirb_registration_title 		=	"PIRB";  	$this->pirb_registration_title2 	=	"";
		$this->pirb_registration_value 		=	52;

		$this->advertise_contactus_title 	=	"ArticulateIT"; 	$this->advertise_contactus_title2 	=	"";
		$this->advertise_contactus_value 	=	53;

		$this->advertise_address_title 		=	"PIRB";		$this->advertise_address_title2 	=	"";
		$this->advertise_address_value 		=	54;

		$this->advertise_settings_title 	=	"PIRB";  	$this->advertise_settings_title2 	=	"";
		$this->advertise_settings_value 	=	55;

		$this->pirb_licensing_title 		=	"PIRB";		$this->pirb_licensing_title2 		=	"";
		$this->pirb_licensing_value 		=	56;

		$this->ratemywork_title 			=	"Rate My Work";		$this->ratemywork_title2 	=	"";
		$this->ratemywork_value 			=	57;

		$this->ratemywork_post_title 		=	"Rate My Work";		$this->ratemywork_post_title2 	=	"";
		$this->ratemywork_post_value 		=	58;


		$this->ratemywork_statistics_title 		=	"Rate My Work";		$this->ratemywork_statistics_title2 	=	"";
		$this->ratemywork_statistics_value 		=	59;


		$this->system_user_title 		=	"System Users";		$this->system_user_title2 	=	"";
		$this->system_user_value 		=	60;

		$this->magazine_article_title 		=	"MAGAZINE";		$this->magazine_article_title2 	=	"";
		$this->magazine_article_value 		=	61;

		$this->magazine_tags_title 		=	"MAGAZINE";		$this->magazine_tags_title2 	=	"";
		$this->magazine_tags_value 		=	62;

		$this->magazine_comments_title 		=	"MAGAZINE";		$this->magazine_comments_title2 	=	"";
		$this->magazine_comments_value 		=	63;

		$this->magazine_writers_title 		=	"MAGAZINE";		$this->magazine_writers_title2 	=	"";
		$this->magazine_writers_value 		=	64;

		$this->advertising_clients_title 		=	"Advertising";		$this->advertising_clients_title2 	=	"";
		$this->advertising_clients_value 		=	65;

		$this->advertising_adbanners_title 		=	"Advertising";		$this->advertising_adbanners_title2 	=	"";
		$this->advertising_adbanners_value 		=	66;

		$this->magazine_reports_title 		=	"MAGAZINE";		$this->magazine_reports_title2 	=	"";
		$this->magazine_reports_value 		=	67;

		$this->advanced_valves_title 		=	"Advanced Valves";		$this->advanced_valves_title2 	=	"";
		$this->advanced_valves_value 		=	68;

		$this->advanced_valves_contactus_title 		=	"Advanced Valves Contact us";		$this->advanced_valves_contactus_title2 	=	"";
		$this->advanced_valves_contactus_value 		=	69;

		$this->load->library('session');
		$this->load->library('ckeditor');
		$this->ckeditor->basePath 			= base_url().'assets/ckeditor/';
		$this->ckeditor->config['toolbar'] 	= array(
            array( 'Source', '-', 'Bold', 'Italic', 'Underline', '-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo','-','NumberedList','BulletedList' )
                                                );
		$this->ckeditor->config['language'] = 'it';
		$this->ckeditor->config['width'] 	= '730px';
		$this->ckeditor->config['height'] 	= '300px'; 
			
			//echo $this->ckeditor->editor("textarea name","default textarea value"); die;
	}

	public function getUserID($id='')
	{
		$userDetails = $this->getUserDetails($id);
		
		if($userDetails){
			return $userDetails['id'];
		}else{
			return '';
		}
	}
	
	public function getUserDetails($id='')
	{
		if($id!=''){
			$userid = $id;
		}elseif($this->session->has_userdata('userid')){
			$userid = $this->session->userdata('userid');
		}
		
		if(isset($userid)){
			$result = $this->Usersmodel->getUserDetails('row', ['id' => $userid]);
			
			if($result){
				return $result;
			}else{
				return '';
			}
		}else{
			return '';
		}
	}

	public function checkUserPermission($pagetype, $permissiontype, $redirect='')
	{
		$userDetails = $this->getUserDetails();
		if($userDetails['type']=='2'){
			// $permission = $this->Usersmodel->getUserPermission($this->getUserID());
						
			$readpermission 	= explode(',', $userDetails['read_permission']);
			$writepermission 	= explode(',', $userDetails['write_permission']);
			
			if($permissiontype=='1'){
				if(!in_array($pagetype, $readpermission) && !in_array($pagetype, $writepermission)){
					redirect('admincontrol/dashboard'); 
				}
			}
			
			if($permissiontype=='2'){
				if(!in_array($pagetype, $writepermission)){ 
					if($redirect=='1'){
						redirect('admincontrol/dashboard'); 
					}
					
					return false;
				}else{
					return true;
				}
			}
		}else{
			return true;
		}
	}
	
	public function index()
	{			
		//$this->session->unset_userdata('userid');
		$this->checksession();
	}	
	public function checksession(){
		if($this->session->userdata('userid')){			
			redirect(base_url().'admincontrol/dashboard','refresh');
		}
		else{
			$this->login();
		}
	}
	public function checksessionout(){
		if(!$this->session->userdata('userid')){			
			redirect(base_url().'admincontrol/login','refresh');
		}				
	}
	function login(){				
		$this->load->view('login');
	}
	function sucess(){				
		$this->load->view('emailsucess');
	}
	function loginaction(){ 
		$this->form_validation->set_rules("username","User Name",'trim|required');
		$this->form_validation->set_rules("email","Email",'trim|required');
		if($this->form_validation->run()==FALSE){
			$this->login();
		}
		else{
			$username=$this->input->post("username");
			$email=$this->input->post("email");			
			$result=$this->adminmodel->login($username,$email);
			if($result){						
				$sessionid=$result['id'];
				$this->session->set_userdata('userid', $sessionid);				
				// $this->dashboard();
				redirect('admincontrol/dashboard');
			}
			else{
				echo "Check the User Name/Password";
				$this->load->view('login');
			}
		}
	}
	function allpage($viewpage,$data){
		$userid 				= $this->getUserID();
		$userDetails 			= $this->getUserDetails();

		$data['userid'] 		= $userid ;
		$data['userdetails'] 	= $userDetails;

		$this->load->view('leftsidebar',$data);
		$this->load->view('header',$data);		
		$this->load->view($viewpage,$data);
		$this->load->view('footer');
	}
	/*function dashboard(){
		$this->checksessionout();
		$data["header_title"]=$this->dashboard_title;
		$data["header_title2"]="";
		$data["leftsidebar_value"]=$this->dashboard_value;
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}
		
		if(! $this->input->post("fromdateA")){
			$currentdateA=date("Y-m-d");
			$fromdateA=date('Y-m-01', strtotime($currentdateA)); 
			$todateA=date('Y-m-t', strtotime($currentdateA));
		}
		else{
			$fromdateA=$this->input->post("fromdateA");  
			$todateA=$this->input->post("todateA");
		}
		
		$userdetails 				= $this->getUserDetails();
		$fromdateA1 				= date("Y-m-d", strtotime($fromdateA));
		$todateA1 					= date("Y-m-d", strtotime($todateA));
		$data["fromdateA"] 			= $fromdateA1;
		$data["todateA"] 			= $todateA1;
		$data["userdetails"] 		= $userdetails;
		$data["daterangevalueA"] 	= $this->input->post("daterangevalueA");
		$data["activestatus"]   	= $condition;
		$data["getdata"] 			= $this->adminmodel->getdata_dashboardbanner($condition,$fromdateA1,$todateA1);		
		//$data["getdata"]=$this->adminmodel->getdata_dashboardbanner($condition);		
		
		if(! $this->input->post("fromdate")){
			$currentdate=date("Y-m-d");
			$fromdate1=date('Y-m-01', strtotime($currentdate)); 
			$todate1=date('Y-m-t', strtotime($currentdate));
		}
		else{
			$fromdate1=$this->input->post("fromdate");  
			$todate1=$this->input->post("todate");
		}
		
		$fromdate=date("Y-m-d", strtotime($fromdate1));
		$todate=date("Y-m-d", strtotime($todate1));
		$data["fromdate"]=$fromdate;
		$data["todate"]=$todate;
		$data["daterangevalue"]=$this->input->post("daterangevalue");
		$data["activestatus"]   = $condition;
		$data["getdata2"]=$this->adminmodel->getdata_dashboardpages($fromdate,$todate);		
		$this->allpage('dashboard',$data);
	}*/

	function dashboard(){
		$this->checksessionout();
		$data["header_title"]=$this->dashboard_title;
		$data["header_title2"]="";
		$data["leftsidebar_value"]=$this->dashboard_value;
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}
		
		if(! $this->input->post("fromdateA")){
			$currentdateA 	= date("Y-m-d");
			$fromdateA 		= date('Y-m-01', strtotime($currentdateA)); 
			$todateA 		= date('Y-m-t', strtotime($currentdateA));
		}
		else{
			$fromdateA 		= $this->input->post("fromdateA");  
			$todateA 		= $this->input->post("todateA");
			$searchtype 	= $this->input->post("searchtype");
		}
		
		$userdetails 				= $this->getUserDetails();
		$fromdateA1 				= date("Y-m-d", strtotime($fromdateA));
		$todateA1 					= date("Y-m-d", strtotime($todateA));
		$data["fromdateA"] 			= $fromdateA1;
		$data["warehouse_staff"] 	= $userdetails['warehouse_staff'];
		$data["todateA"] 			= $todateA1;
		$data["userdetails"] 		= $userdetails;
		$data["daterangevalueA"] 	= $this->input->post("daterangevalueA");
		$data["activestatus"]   	= $condition;
		$data["getdata"] 			= $this->adminmodel->getdata_dashboardbanner($condition,$fromdateA1,$todateA1, ['warehouse_staff' => $userdetails['warehouse_staff']]);	
		// print_r($this->db->last_query());die;
		//$data["getdata"]=$this->adminmodel->getdata_dashboardbanner($condition);		
		
		if(! $this->input->post("fromdate")){
			$currentdate 	= date("Y-m-d");
			$fromdate1 		= date('Y-m-01', strtotime($currentdate)); 
			$todate1 		= date('Y-m-t', strtotime($currentdate));
		}
		else{
			$fromdate1 		= $this->input->post("fromdate");  
			$todate1 		= $this->input->post("todate");
			$searchtype 	= $this->input->post("searchtype");
		}
		
		$fromdate 				= date("Y-m-d", strtotime($fromdate1));
		$todate 				= date("Y-m-d", strtotime($todate1));
		$data["fromdate"] 		= $fromdate;
		$data["todate"] 		= $todate;
		$data["daterangevalue"] = $this->input->post("daterangevalue");
		$data["activestatus"]   = $condition;
		$data["searchtype"] 	= isset($searchtype) ? $searchtype : '';

		$data["getdata2"]=$this->adminmodel->getdata_dashboardpages($fromdate,$todate, ['warehouse_staff' => $userdetails['warehouse_staff']]);		
		$this->allpage('dashboard',$data);
	}
	
	function logout(){
		$this->session->unset_userdata('userid');
		$this->checksession();		
	}
	function advertisinglist(){
		$this->checksessionout();
		$data["header_title"]=$this->advertising_title;
		$data["header_title2"]=$this->advertising_title2;
		$data["leftsidebar_value"]=$this->advertising_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_advertising($condition);		
		$this->allpage('advertisinglist',$data);
	}
	function newadvertising(){
		$this->checksessionout();
		$data["header_title"]=$this->advertising_title;
		$data["header_title2"]=$this->advertising_title2;
		$data["leftsidebar_value"]=$this->advertising_value;
		$data["action"]="new";
		$data["pagenamedata"]=$this->adminmodel->getfulldata("pagename");		
		$this->allpage('advertisingaction',$data);
	}
	function editadvertising(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->advertising_title;
		$data["header_title2"]=$this->advertising_title2;
		$data["leftsidebar_value"]=$this->advertising_value;
		$data["getdata"]=$this->adminmodel->getsingledata("advertising",$uid);
		$data["action"]="edit";
		$data["pagenamedata"]=$this->adminmodel->getfulldata("pagename",'');		
		$this->allpage('advertisingaction',$data);
	}
	function deleteadvertising(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("advertising",$deleteid);		
		$this->advertisinglist();
	}
	function advertisingaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("cname","Name",'trim|required');
			$this->form_validation->set_rules("client","Client",'trim|required');
			$this->form_validation->set_rules("pagenameid","Page Name",'trim|required');
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newadvertising();
				}
				if($this->input->post("update")){
					$this->editadvertising();
				}
			}		
			else{					
								
				$uid=$this->input->post("updateid");				
				$deleteimagedata=$this->adminmodel->getsingledata("advertising",$uid);
				$oldimage=$deleteimagedata['image'];
								
				$config_image=array();
				$config_image['upload_path']='./images';
				$config_image['allowed_types']='jpg|jpeg|png|pdf';
				$config_image['encrypt_name']=TRUE;
				$this->load->library('upload',$config_image);
				
				if ( ! $this->upload->do_upload('imagefile'))
				{
					//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
				}
				else
				{
					$imagedata=$this->upload->data();
					$imagefile=$imagedata['file_name'];
					
					/*
					if($imagefile != $oldimage){								
						$deleteimagefile='./images/'.$oldimage;					
						if(file_exists($deleteimagefile)){	
							//echo "delete the previous image - ".$deleteimagefile;	
							unlink ($deleteimagefile);
						}
					} 
					*/ 
				}
				
							
				$data=array(
				"name" => $this->input->post("cname"),
				"client" => $this->input->post("client"),
				"description" => $this->input->post("description"),				
				"url" => $this->input->post("url"),
				"pagenameid" => $this->input->post("pagenameid"),
				"published" => $this->input->post("publishid")
				);
					
				
				if(isset($imagefile)){
					$data['image']=$imagefile;
				}			
							
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("advertising",$data);
					$this->advertisinglist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("advertising",$data,$this->input->post("updateid"));
					$this->advertisinglist();
				}		
			}
		}
		else{			
			$this->advertisinglist();
		}
	}

	function supplierlist(){
		$this->checksessionout();
		$data["header_title"]=$this->supplier_title;
		$data["header_title2"]=$this->supplier_title2;
		$data["leftsidebar_value"]=$this->supplier_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_supplier($condition);		
		$this->allpage('supplierlist',$data);
	}
	function newsupplier(){
		$this->checksessionout();
		$data["header_title"]=$this->supplier_title;
		$data["header_title2"]=$this->supplier_title2;
		$data["leftsidebar_value"]=$this->supplier_value;
		$data["action"]="new";				
		$this->allpage('supplieraction',$data);
	}
	function editsupplier(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->supplier_title;
		$data["header_title2"]=$this->supplier_title2;
		$data["leftsidebar_value"]=$this->supplier_value;
		$data["getdata"]=$this->adminmodel->getsingledata("supplier",$uid);
		$data["action"]="edit";				
		$this->allpage('supplieraction',$data);
	}
	function deletesupplier(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("supplier",$deleteid);		
		$this->supplierlist();
	}
	function supplieraction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("companyname","Company name",'trim|required');
			$this->form_validation->set_rules("contactname","Contact name",'trim|required');
			$this->form_validation->set_rules("telnumber","Tel number",'trim|required|regex_match[/^[0-9]{10}$/]');
			$this->form_validation->set_rules("emailaddress","Email address",'trim|required|valid_email');
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){
					$this->newsupplier();
				}
				if($this->input->post("update")){
					$this->editsupplier();
				}
			}		
			else{			
				
				if(! $this->input->post('categories')){ $categories = ""; }
				else{ $categories = implode(",", $this->input->post('categories'));} 
				$data=array(
				"companyname" => $this->input->post("companyname"),
				"contactname" => $this->input->post("contactname"),
				"address" => $this->input->post("address"),				
				"telnumber" => $this->input->post("telnumber"),
				"email" => $this->input->post("emailaddress"),
				"categories" => $categories,
				"active" => $this->input->post("active")
				);
							
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("supplier",$data);
					$this->supplierlist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("supplier",$data,$this->input->post("updateid"));
					$this->supplierlist();
				}		
			}
		}
		else{			
			$this->supplierlist();
		}
	}
	
	function helpcontentlist(){
		$this->checksessionout();
		$data["header_title"]=$this->helpcontent_title;
		$data["header_title2"]=$this->helpcontent_title2;
		$data["leftsidebar_value"]=$this->helpcontent_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_helpcontent($condition);		
		$this->allpage('helpcontentlist',$data);
	}
	function newhelpcontent(){
		$this->checksessionout();
		$data["header_title"]=$this->helpcontent_title;
		$data["header_title2"]=$this->helpcontent_title2;
		$data["leftsidebar_value"]=$this->helpcontent_value;
		$data["action"]="new";
		$data["sectiondata"]=$this->adminmodel->getfulldata("section");		
		$this->allpage('helpcontentaction',$data);
	}
	function edithelpcontent(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->helpcontent_title;
		$data["header_title2"]=$this->helpcontent_title2;
		$data["leftsidebar_value"]=$this->helpcontent_value;
		$data["getdata"]=$this->adminmodel->getsingledata("helpcontent",$uid);
		$data["action"]="edit";
		$data["sectiondata"]=$this->adminmodel->getfulldata("section",'');		
		$this->allpage('helpcontentaction',$data);
	}
	function deletehelpcontent(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("helpcontent",$deleteid);		
		$this->helpcontentlist();
	}
	function helpcontentaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("title","Title",'trim|required');			
			$this->form_validation->set_rules("sectionid","Section",'trim|required');
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newhelpcontent();
				}
				if($this->input->post("update")){
					$this->edithelpcontent();
				}
			}		
			else{							
							
				$data=array(
				"title" => $this->input->post("title"),
				"body" => $this->input->post("body"),
				"sectionid" => $this->input->post("sectionid"),
				"published" => $this->input->post("publishid")
				);
				
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("helpcontent",$data);
					$this->helpcontentlist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("helpcontent",$data,$this->input->post("updateid"));
					$this->helpcontentlist();
				}		
			}
		}
		else{			
			$this->helpcontentlist();
		}
	}
	
	function quizzeslist(){
		$this->checksessionout();
		$data["header_title"]=$this->quizzes_title;
		$data["header_title2"]=$this->quizzes_title2;
		$data["leftsidebar_value"]=$this->quizzes_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_quizzes($condition);		
		$this->allpage('quizzeslist',$data);
	}
	function newquizzes(){
		$this->checksessionout();
		$data["header_title"]=$this->quizzes_title;
		$data["header_title2"]=$this->quizzes_title2;
		$data["leftsidebar_value"]=$this->quizzes_value;
		$data["action"]="new";		
		$this->allpage('quizzesaction',$data);
	}
	function editquizzes(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->quizzes_title;
		$data["header_title2"]=$this->quizzes_title2;
		$data["leftsidebar_value"]=$this->quizzes_value;
		$data["getdata"]=$this->adminmodel->getsingledata("quizzes",$uid);
		$data["action"]="edit";		
		$this->allpage('quizzesaction',$data);
	}
	function deletequizzes(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("quizzes",$deleteid);		
		$this->quizzeslist();
	}
	function quizzesaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("content","Content",'trim|required');
			$this->form_validation->set_rules("position","Position",'trim|required|numeric');
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newquizzes();
				}
				if($this->input->post("update")){
					$this->editquizzes();
				}
			}		
			else{			
				
				$config_image=array();
				$config_image['upload_path']='./images';
				$config_image['allowed_types']='jpg|jpeg|png|pdf';
				$config_image['encrypt_name']=TRUE;
				$this->load->library('upload',$config_image);			
				if ( ! $this->upload->do_upload('imagefile'))
				{
					//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
				}
				else
				{
					$imagedata=$this->upload->data();
					$imagefile=$imagedata['file_name'];
				} 
							
				$data=array(
				"content" => $this->input->post("content"),
				"position" => $this->input->post("position"),
				"published" => $this->input->post("publishid")
				);					
				
				if(isset($imagefile)){
					$data['image']=$imagefile;
				}			
							
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("quizzes",$data);
					$this->quizzeslist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("quizzes",$data,$this->input->post("updateid"));
					$this->quizzeslist();
				}		
			}
		}
		else{			
			$this->quizzeslist();
		}
	}
	
	function productguideslist()
	{
	    $this->checksessionout();
	    $this->checkUserPermission('5', '1', '1');
	    $data["header_title"]      = $this->productguides_title;
	    $data["header_title2"]     = $this->productguides_title2;
	    $data["leftsidebar_value"] = $this->productguides_value;
	    if (!$this->input->post("activeval")) {$condition = "1";} else {
	        if ($this->input->post("activeval") == 1) {$condition = "1";} else { $condition = "0";}
	    }

	    $checkpermission    = $this->checkUserPermission('5', '2');
	    $data["permission"] = $checkpermission;
	    $data["getdata"] = $this->adminmodel->getdata_productguides($condition);
	    $this->allpage('productguideslist', $data);
	}
	function newproductguides(){
		$this->checksessionout();
		$this->checkUserPermission('5', '1', '1');
		$data["header_title"]=$this->productguides_title;
		$data["header_title2"]=$this->productguides_title2;
		$data["leftsidebar_value"]=$this->productguides_value;
		$data["action"]="new";		
		$checkpermission    = $this->checkUserPermission('5', '2');
	    $data["permission"] = $checkpermission;
		$this->allpage('productguidesaction',$data);
	}
	function editproductguides(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$this->checkUserPermission('5', '1', '1');
		$data["header_title"]=$this->productguides_title;
		$data["header_title2"]=$this->productguides_title2;
		$data["leftsidebar_value"]=$this->productguides_value;
		$data["getdata"]=$this->adminmodel->getsingledata("productguides",$uid);
		$data["action"]="edit";
		$checkpermission    = $this->checkUserPermission('5', '2');
	    $data["permission"] = $checkpermission;
		$this->allpage('productguidesaction',$data);
	}
	function deleteproductguides(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("productguides",$deleteid);		
		$this->productguideslist();
	}
	function productguidesaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("content","Content",'trim|required');
			$this->form_validation->set_rules("position","Position",'trim|required|numeric');
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newproductguides();
				}
				if($this->input->post("update")){
					$this->editproductguides($this->input->post("updateid"));
				}
			}		
			else{			
				
				$config_image=array();
				$config_image['upload_path']='./images';
				$config_image['allowed_types']='jpg|jpeg|png|pdf';
				$config_image['encrypt_name']=TRUE;
				$this->load->library('upload',$config_image);			
				if ( ! $this->upload->do_upload('imagefile'))
				{
					//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
				}
				else
				{
					$imagedata=$this->upload->data();
					if ($this->upload->data('file_ext') == '.pdf') {
						$pdfflag = '1';
					}else{
						$pdfflag = '0';
					}
					$imagefile=$imagedata['file_name'];
				} 

				if ($this->input->post('display') =='1') {
					$display = '1';
				}else{
					$display = '0';
				}

				if ($this->input->post('display_content') =='1') {
					$display_content = '1';
				}else{
					$display_content = '0';
				}
							
				$data=array(
				"content" => $this->input->post("content"),
				"position" => $this->input->post("position"),
				"published" => $this->input->post("publishid"),
				"display" => $display,
				"display_content" => $display_content,
				"pdf" => isset($pdfflag) ? $pdfflag : '0',
				);					
				
				if(isset($imagefile)){
					$data['image']=$imagefile;
				}			
							
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("productguides",$data);
					$this->productguideslist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("productguides",$data,$this->input->post("updateid"));
					$this->productguideslist();
				}		
			}
		}
		else{			
			$this->productguideslist();
		}
	}
	
	function productguidessection1list(){
		$this->checksessionout();
		$this->checkUserPermission('5', '1', '1');
		$productguidesid=$this->uri->segment(3);
		$data["header_title"]=$this->productguidessection_title;
		$data["header_title2"]=$this->productguidessection_title2;
		$data["leftsidebar_value"]=$this->productguidessection_value;		
				
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}
		$checkpermission    = $this->checkUserPermission('5', '2');
		$data["permission"] = $checkpermission;
		$data["productguidesid"]=$productguidesid;
		$data["productguidesname"]=$this->adminmodel->getsingledata("productguides",$productguidesid);
		$condition2=$productguidesid;		
		$data["getdata"]=$this->adminmodel->getdata_productguidessection1($condition,$condition2);		
		$this->allpage('productguidessection1list',$data);
	}
	function newproductguidessection1(){
		$this->checksessionout();
		$this->checkUserPermission('5', '1', '1');
		$productguidesid=$this->uri->segment(3);
		$data["header_title"]=$this->productguidessection_title;
		$data["header_title2"]=$this->productguidessection_title2;
		$data["leftsidebar_value"]=$this->productguidessection_value;
		$data["action"]="new";
		$checkpermission    = $this->checkUserPermission('5', '2');
		$data["permission"] = $checkpermission;
		$data["productguidesid"]=$productguidesid;
		$data["productguidesname"]=$this->adminmodel->getsingledata("productguides",$productguidesid);
		$this->allpage('productguidessection1action',$data);
	}
	function editproductguidessection1(){
		$productguidesid=$this->uri->segment(3);
		$uid=$this->uri->segment(4);
		$this->checksessionout();
		$this->checkUserPermission('5', '1', '1');
		$data["header_title"]=$this->productguidessection_title;
		$data["header_title2"]=$this->productguidessection_title2;
		$data["leftsidebar_value"]=$this->productguidessection_value;
		$data["getdata"]=$this->adminmodel->getsingledata("productguidessection1",$uid);
		$data["action"]="edit";		
		$data["productguidesid"]=$productguidesid;
		$data["productguidesname"]=$this->adminmodel->getsingledata("productguides",$productguidesid);
		$checkpermission    = $this->checkUserPermission('5', '2');
		$data["permission"] = $checkpermission;
		$this->allpage('productguidessection1action',$data);
	}
	function deleteproductguidessection1(){
		$deleteid=$this->input->post("deleteid");
		$this->checksessionout();		
		$this->adminmodel->deletedata("productguidessection1",$deleteid);		
		$this->productguidessection1list();
	}
	function productguidessection1action(){
		if($this->input->post("insert") || $this->input->post("update")){			
			$this->form_validation->set_rules("content","Content",'trim|required');
			$this->form_validation->set_rules("position","Position",'trim|required|numeric');
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newproductguidessection1();
				}
				if($this->input->post("update")){
					$this->editproductguidessection1($this->input->post("productguidesid"), $this->input->post("updateid"));
				}
			}		
			else{			
				if ($_FILES['imagefile']['name'] !='') {
					$config_image=array();
					$config_image['upload_path']='./images';
					$config_image['allowed_types']='jpg|jpeg|png|pdf';
					$config_image['encrypt_name']=TRUE;
					$this->load->library('upload',$config_image);			
					if ( ! $this->upload->do_upload('imagefile'))
					{
						//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
					}
					else
					{
						$imagedata=$this->upload->data();
						if ($this->upload->data('file_ext') == '.pdf') {
							$pdfflag = '1';
						}else{
							$pdfflag = '0';
						}
						$imagefile=$imagedata['file_name'];
					} 
				}

				if ($this->input->post('display') =='1') {
					$display = '1';
				}else{
					$display = '0';
				}

				if ($this->input->post('display_content') =='1') {
					$display_content = '1';
				}else{
					$display_content = '0';
				}
				
				
				$productguidesid=$this->uri->segment(3);				
				$data=array(
				"productguidesid" => $productguidesid,
				"content" => $this->input->post("content"),
				"position" => $this->input->post("position"),
				"published" => $this->input->post("publishid"),
				"display" => $display,
				"display_content" => $display_content,
				"pdf" => isset($pdfflag) ? $pdfflag : $this->input->post("pdf"),
				);					
				
				if(isset($imagefile)){
					$data['image']=$imagefile;
				}			
							
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("productguidessection1",$data);
					$this->productguidessection1list();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("productguidessection1",$data,$this->input->post("updateid"));
					$this->productguidessection1list();
				}		
			}
		}
		else{			
			$this->productguidessection1list();
		}
	}
	
	function productguidessection2list(){
		$this->checksessionout();
		$this->checkUserPermission('5', '1', '1');
		$productguidesid=$this->uri->segment(3);
		$productguidessection1id=$this->uri->segment(4);
		$data["header_title"]=$this->productguidessection_title;
		$data["header_title2"]=$this->productguidessection_title2;
		$data["leftsidebar_value"]=$this->productguidessection_value;		
				
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}
		$data["productguidesid"]=$productguidesid;
		$data["productguidessection1id"]=$productguidessection1id;
		$data["productguidesname"]=$this->adminmodel->getsingledata("productguides",$productguidesid);
		$data["productguidessection1name"]=$this->adminmodel->getsingledata("productguidessection1",$productguidessection1id);
		$condition2=$productguidessection1id;	
		$data["getdata"]=$this->adminmodel->getdata_productguidessection2($condition,$condition2);		
		$checkpermission    = $this->checkUserPermission('5', '2');
		$data["permission"] = $checkpermission;
		$this->allpage('productguidessection2list',$data);
	}
	function newproductguidessection2(){
		$this->checksessionout();
		$this->checkUserPermission('5', '1', '1');
		$productguidesid=$this->uri->segment(3);
		$productguidessection1id=$this->uri->segment(4);
		$data["header_title"]=$this->productguidessection_title;
		$data["header_title2"]=$this->productguidessection_title2;
		$data["leftsidebar_value"]=$this->productguidessection_value;
		$data["action"]="new";
		$checkpermission    = $this->checkUserPermission('5', '2');
		$data["permission"] = $checkpermission;
		$data["productguidesid"]=$productguidesid;
		$data["productguidessection1id"]=$productguidessection1id;
		$data["productguidesname"]=$this->adminmodel->getsingledata("productguides",$productguidesid);
		$data["productguidessection1name"]=$this->adminmodel->getsingledata("productguidessection1",$productguidessection1id);
		$this->allpage('productguidessection2action',$data);
	}
	function editproductguidessection2(){
		$productguidesid=$this->uri->segment(3);
		$productguidessection1id=$this->uri->segment(4);
		$uid=$this->uri->segment(5);
		$this->checksessionout();
		$this->checkUserPermission('5', '1', '1');
		$data["header_title"]=$this->productguidessection_title;
		$data["header_title2"]=$this->productguidessection_title2;
		$data["leftsidebar_value"]=$this->productguidessection_value;
		$data["getdata"]=$this->adminmodel->getsingledata("productguidessection2",$uid);
		$data["action"]="edit";		
		$data["productguidesid"]=$productguidesid;
		$data["productguidessection1id"]=$productguidessection1id;
		$data["productguidesname"]=$this->adminmodel->getsingledata("productguides",$productguidesid);
		$data["productguidessection1name"]=$this->adminmodel->getsingledata("productguidessection1",$productguidessection1id);
		$checkpermission    = $this->checkUserPermission('5', '2');
		$data["permission"] = $checkpermission;
		$this->allpage('productguidessection2action',$data);
	}
	function deleteproductguidessection2(){
		$deleteid=$this->input->post("deleteid");
		$this->checksessionout();		
		$this->adminmodel->deletedata("productguidessection2",$deleteid);		
		$this->productguidessection2list();
	}
	/*function productguidessection2action(){
		if($this->input->post("insert") || $this->input->post("update")){			
			$this->form_validation->set_rules("content","Content",'trim|required');
			$this->form_validation->set_rules("position","Position",'trim|required|numeric');
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newproductguidessection2();
				}
				if($this->input->post("update")){
					$this->editproductguidessection2();
				}
			}		
			else{			
				
				$config_image=array();
				$config_image['upload_path']='./images';
				$config_image['allowed_types']='jpg|jpeg|png|pdf';
				// $config_image['allowed_types']='jpg|jpeg|png';
				$config_image['encrypt_name']=TRUE;
				$this->load->library('upload',$config_image);			
				if ( ! $this->upload->do_upload('imagefile'))
				{
					//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
				}
				else
				{
					$imagedata=$this->upload->data();
					$imagefile=$imagedata['file_name'];
					if ($this->upload->data('file_ext') == '.pdf') {
						$pdfflag = '1';
					}else{
						$pdfflag = '0';
					}
				} 
				
				$productguidesid=$this->uri->segment(3);
				$productguidessection1id=$this->uri->segment(4);				
				$data=array(
				"productguidesid" => $productguidesid,
				"productguidessection1id" => $productguidessection1id,
				"content" => $this->input->post("content"),
				"position" => $this->input->post("position"),
				"published" => $this->input->post("publishid"),
				"pdf" => $pdfflag
				);					
				
				if(isset($imagefile)){
					$data['image']=$imagefile;
				}			
							
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("productguidessection2",$data);
					$this->productguidessection2list();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("productguidessection2",$data,$this->input->post("updateid"));
					$this->productguidessection2list();
				}		
			}
		}
		else{			
			$this->productguidessection2list();
		}
	}*/
	function productguidessection2action(){
		if($this->input->post("insert") || $this->input->post("update")){

			if ($this->input->post("selecttype") =='2') {
				$this->form_validation->set_rules("pdfcontent","Content",'trim|required');
				$this->form_validation->set_rules("pdfposition","Position",'trim|required');
				$this->form_validation->set_rules("pdfdescription","Description",'trim|required');
					if (empty($_FILES['pdffile']['name']) && $this->input->post("insert") =='1'){
					    $this->form_validation->set_rules('pdffile', 'PDF File', 'required');
					}
					if($this->form_validation->run()==FALSE){
						if($this->input->post("insert")){					
							$this->newproductguidessection2();
						}
						if($this->input->post("update")){
							redirect('admincontrol/editproductguidessection2/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->input->post("updateid").'');
							// $this->editproductguidessection2();
						}
					}else{

					$productguidesid=$this->uri->segment(3);
					$productguidessection1id=$this->uri->segment(4);

					if ($_FILES['pdffile']['name'] !='') {
						$config_image=array();
						$config_image['upload_path']='./images';
						$config_image['allowed_types']='jpg|jpeg|png|pdf';
						$config_image['encrypt_name']=TRUE;
						$this->load->library('upload',$config_image);			
						if ( ! $this->upload->do_upload('pdffile')){
							//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
						}
						else{
							$imagedata=$this->upload->data();
							if ($this->upload->data('file_ext') == '.pdf') {
								$type = '2';
							}else{
								$type = '1';
							}
							$imagefile=$imagedata['file_name'];
						}
					}

					if ($_FILES['featfile']['name'] !='') {
						$config_image=array();
						$config_image['upload_path']='./images';
						$config_image['allowed_types']='jpg|jpeg|png|pdf';
						$config_image['encrypt_name']=TRUE;
						$this->load->library('upload',$config_image);			
						if ( ! $this->upload->do_upload('featfile'))
						{
							// print_r($this->upload->display_errors()); print_r($this->input->post("featfile")); die;
						}
						else
						{
							$imagedata=$this->upload->data();
							$featfile=$imagedata['file_name'];
						}
					}

					if ($this->input->post('display') =='1') {
						$display = '1';
					}else{
						$display = '0';
					}

					if ($this->input->post('display_content') =='1') {
						$display_content = '1';
					}else{
						$display_content = '0';
					}

					$data=array(
						"productguidesid" => $productguidesid,
						"productguidessection1id" => $productguidessection1id,
						"content" => $this->input->post("pdfcontent"),
						"position" => $this->input->post("pdfposition"),
						"published" => $this->input->post("pdfpublishid"),
						"display" => $display,
						"display_content" => $display_content,
						"description" => $this->input->post("pdfdescription"),
						"type" => isset($type) ? $type : '2',
						"image" => NULL

					);

					if(isset($imagefile)){
						$data['file']=$imagefile;
					}
					if(isset($featfile)){
						$data['feat_file']=$featfile;
					}

					if($this->input->post("insert")){				
						$this->adminmodel->insertdata("productguidessection2",$data);
						redirect('admincontrol/productguidessection2list/'.$productguidesid.'/'.$productguidessection1id.'');
						// $this->productguidessection2list();
					}			
					if($this->input->post("update")){
						$this->adminmodel->updatedata("productguidessection2",$data,$this->input->post("updateid"));
						redirect('admincontrol/productguidessection2list/'.$productguidesid.'/'.$productguidessection1id.'');
						// $this->productguidessection2list();
					}
				}

			}elseif($this->input->post("selecttype") =='1'){

				$this->form_validation->set_rules("content","Content",'trim|required');
				$this->form_validation->set_rules("description","Description",'trim|required');
				$this->form_validation->set_rules("position","Position",'trim|required|numeric');
				if($this->form_validation->run()==FALSE){
					if($this->input->post("insert")){
						$this->newproductguidessection3();
					}
					if($this->input->post("update")){
						redirect('admincontrol/editproductguidessection2/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->input->post("updateid").'');
					}
				}else{
					
					$productguidesid=$this->uri->segment(3);
					$productguidessection1id=$this->uri->segment(4);

					if ($_FILES['imagefile']['name'] !='') {
						$config_image=array();
						$config_image['upload_path']='./images';
						$config_image['allowed_types']='jpg|jpeg|png|pdf';
						$config_image['encrypt_name']=TRUE;
						$this->load->library('upload',$config_image);			
						if ( ! $this->upload->do_upload('imagefile')){
							//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
						}
						else{
							$imagedata=$this->upload->data();
							
							$imagefile=$imagedata['file_name'];
						}
					}

					if ($this->input->post('display') =='1') {
						$display = '1';
					}else{
						$display = '0';
					}

					if ($this->input->post('display_content') =='1') {
						$display_content = '1';
					}else{
						$display_content = '0';
					}

					$data=array(
						"productguidesid" => $productguidesid,
						"productguidessection1id" => $productguidessection1id,
						"content" => $this->input->post("content"),
						"position" => $this->input->post("position"),
						"published" => $this->input->post("publishid"),
						"display" => $display,
						"display_content" => $display_content,
						"description" => $this->input->post("description"),
						"type" => isset($type) ? $type : '1',
						"feat_file" => NULL,
						"file" => NULL,

					);
					if(isset($imagefile)){
						$data['image']=$imagefile;
					}			
						// echo "<pre>";		print_r($data);die;
					if($this->input->post("insert")){				
						$this->adminmodel->insertdata("productguidessection2",$data);
						redirect('admincontrol/productguidessection2list/'.$productguidesid.'/'.$productguidessection1id.'');
						// $this->productguidessection2list();
					}			
					if($this->input->post("update")){
						$this->adminmodel->updatedata("productguidessection2",$data,$this->input->post("updateid"));
						redirect('admincontrol/productguidessection2list/'.$productguidesid.'/'.$productguidessection1id.'');
						// $this->productguidessection2list();
					}		
				}

			}
		}else{
			$this->productguidessection2list();
		}
	}
	
	
	function productguidessection3list(){
		$this->checksessionout();
		$productguidesid=$this->uri->segment(3);
		$productguidessection1id=$this->uri->segment(4);
		$productguidessection2id=$this->uri->segment(5);
		$data["header_title"]=$this->productguidessection_title;
		$data["header_title2"]=$this->productguidessection_title2;
		$data["leftsidebar_value"]=$this->productguidessection_value;		
				
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}
		$data["productguidesid"]=$productguidesid;
		$data["productguidessection1id"]=$productguidessection1id;
		$data["productguidessection2id"]=$productguidessection2id;
		$data["productguidesname"]=$this->adminmodel->getsingledata("productguides",$productguidesid);
		$data["productguidessection1name"]=$this->adminmodel->getsingledata("productguidessection1",$productguidessection1id);
		$data["productguidessection2name"]=$this->adminmodel->getsingledata("productguidessection2",$productguidessection2id);
		$condition2=$productguidessection2id;	
		$data["getdata"]=$this->adminmodel->getdata_productguidessection3($condition,$condition2);		
		$this->allpage('productguidessection3list',$data);
	}
	function newproductguidessection3(){
		$this->checksessionout();
		$productguidesid=$this->uri->segment(3);
		$productguidessection1id=$this->uri->segment(4);
		$productguidessection2id=$this->uri->segment(5);
		$data["header_title"]=$this->productguidessection_title;
		$data["header_title2"]=$this->productguidessection_title2;
		$data["leftsidebar_value"]=$this->productguidessection_value;
		$data["action"]="new";
		$data["productguidesid"]=$productguidesid;
		$data["productguidessection1id"]=$productguidessection1id;
		$data["productguidessection2id"]=$productguidessection2id;
		$data["productguidesname"]=$this->adminmodel->getsingledata("productguides",$productguidesid);
		$data["productguidessection1name"]=$this->adminmodel->getsingledata("productguidessection1",$productguidessection1id);
		$data["productguidessection2name"]=$this->adminmodel->getsingledata("productguidessection2",$productguidessection2id);
		$this->allpage('productguidessection3action',$data);
	}
	function editproductguidessection3(){
		$productguidesid=$this->uri->segment(3);
		$productguidessection1id=$this->uri->segment(4);
		$productguidessection2id=$this->uri->segment(5);
		$uid=$this->uri->segment(6);
		$this->checksessionout();
		$data["header_title"]=$this->productguidessection_title;
		$data["header_title2"]=$this->productguidessection_title2;
		$data["leftsidebar_value"]=$this->productguidessection_value;
		$data["getdata"]=$this->adminmodel->getsingledata("productguidessection3",$uid);
		$data["action"]="edit";		
		$data["productguidesid"]=$productguidesid;
		$data["productguidessection1id"]=$productguidessection1id;
		$data["productguidessection2id"]=$productguidessection2id;
		$data["productguidesname"]=$this->adminmodel->getsingledata("productguides",$productguidesid);
		$data["productguidessection1name"]=$this->adminmodel->getsingledata("productguidessection1",$productguidessection1id);
		$data["productguidessection2name"]=$this->adminmodel->getsingledata("productguidessection2",$productguidessection2id);
		$this->allpage('productguidessection3action',$data);
	}
	function deleteproductguidessection3(){
		$deleteid=$this->input->post("deleteid");
		$this->checksessionout();		
		$this->adminmodel->deletedata("productguidessection3",$deleteid);		
		$this->productguidessection3list();
	}
	/*function productguidessection3action(){
		if($this->input->post("insert") || $this->input->post("update")){			
			$this->form_validation->set_rules("content","Content",'trim|required');
			$this->form_validation->set_rules("position","Position",'trim|required|numeric');
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newproductguidessection3();
				}
				if($this->input->post("update")){
					$this->editproductguidessection3();
				}
			}		
			else{			
				
				$productguidesid=$this->uri->segment(3);
				$productguidessection1id=$this->uri->segment(4);
				$productguidessection2id=$this->uri->segment(5);
				$data=array(
				"productguidesid" => $productguidesid,
				"productguidessection1id" => $productguidessection1id,
				"productguidessection2id" => $productguidessection2id,
				"content" => $this->input->post("content"),
				"body" => $this->input->post("body"),
				"position" => $this->input->post("position"),
				"published" => $this->input->post("publishid")
				);					
							
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("productguidessection3",$data);
					$this->productguidessection3list();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("productguidessection3",$data,$this->input->post("updateid"));
					$this->productguidessection3list();
				}		
			}
		}
		else{			
			$this->productguidessection3list();
		}
	}*/

	function productguidessection3action(){
		if($this->input->post("insert") || $this->input->post("update")){

			if ($this->input->post("selecttype") =='2') {
				$this->form_validation->set_rules("pdfcontent","Content",'trim|required');
				$this->form_validation->set_rules("pdfposition","Position",'trim|required');
				if (empty($_FILES['pdffile']['name']) && $this->input->post("insert") =='1'){
				    $this->form_validation->set_rules('pdffile', 'PDF File', 'required');
				}
				if($this->form_validation->run()==FALSE){
					if($this->input->post("insert")){
						$this->newproductguidessection3();
					}
					if($this->input->post("update")){
						$this->editproductguidessection3();
					}
				}else{

					$productguidesid=$this->uri->segment(3);
					$productguidessection1id=$this->uri->segment(4);
					$productguidessection2id=$this->uri->segment(5);

					if ($_FILES['pdffile']['name'] !='') {
						$config_image=array();
						$config_image['upload_path']='./images';
						$config_image['allowed_types']='jpg|jpeg|png|pdf';
						$config_image['encrypt_name']=TRUE;
						$this->load->library('upload',$config_image);			
						if ( ! $this->upload->do_upload('pdffile')){
							//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
						}
						else{
							$imagedata=$this->upload->data();
							if ($this->upload->data('file_ext') == '.pdf') {
								$type = '2';
							}else{
								$type = '1';
							}
							$imagefile=$imagedata['file_name'];
						}
					}

					if ($_FILES['featfile']['name'] !='') {
						$config_image=array();
						$config_image['upload_path']='./images';
						$config_image['allowed_types']='jpg|jpeg|png|pdf';
						$config_image['encrypt_name']=TRUE;
						$this->load->library('upload',$config_image);			
						if ( ! $this->upload->do_upload('featfile'))
						{
							//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
						}
						else
						{
							$imagedata=$this->upload->data();
							$featfile=$imagedata['file_name'];
						}
					}

					$data=array(
							"productguidesid" => $productguidesid,
							"productguidessection1id" => $productguidessection1id,
							"productguidessection2id" => $productguidessection2id,
							"content" => $this->input->post("pdfcontent"),
							"body" => NULL,
							"position" => $this->input->post("pdfposition"),
							"published" => $this->input->post("pdfpublishid"),
							"type" => isset($type) ? $type : '2',
							);

					if(isset($imagefile)){
						$data['file']=$imagefile;
					}
					if(isset($featfile)){
						$data['feat_file']=$featfile;
					}
					if($this->input->post("insert")){				
						$this->adminmodel->insertdata("productguidessection3",$data);
						$this->productguidessection3list();
					}			
					if($this->input->post("update")){
						$this->adminmodel->updatedata("productguidessection3",$data,$this->input->post("updateid"));
						$this->productguidessection3list();
					}
				}

			}elseif($this->input->post("selecttype") =='1'){

				$this->form_validation->set_rules("content","Content",'trim|required');
				$this->form_validation->set_rules("position","Position",'trim|required|numeric');
				if($this->form_validation->run()==FALSE){
					if($this->input->post("insert")){
						$this->newproductguidessection3();
					}
					if($this->input->post("update")){
						$this->editproductguidessection3();
					}
				}else{
					
					$productguidesid=$this->uri->segment(3);
					$productguidessection1id=$this->uri->segment(4);
					$productguidessection2id=$this->uri->segment(5);
					$data=array(
					"productguidesid" => $productguidesid,
					"productguidessection1id" => $productguidessection1id,
					"productguidessection2id" => $productguidessection2id,
					"content" => $this->input->post("content"),
					"body" => $this->input->post("body"),
					"position" => $this->input->post("position"),
					"published" => $this->input->post("publishid")
					);					
								
					if($this->input->post("insert")){				
						$this->adminmodel->insertdata("productguidessection3",$data);
						$this->productguidessection3list();
					}			
					if($this->input->post("update")){
						$this->adminmodel->updatedata("productguidessection3",$data,$this->input->post("updateid"));
						$this->productguidessection3list();
					}		
				}

			}
		}else{
			$this->productguidessection3list();
		}
	}
	
	function toolboxtalkslist()
	{
	    $this->checksessionout();
	    $this->checkUserPermission('6', '1', '1');
	    $data["header_title"]      = $this->toolboxtalks_title;
	    $data["header_title2"]     = $this->toolboxtalks_title2;
	    $data["leftsidebar_value"] = $this->toolboxtalks_value;
	    if (!$this->input->post("activeval")) {$condition = "1";} else {
	        if ($this->input->post("activeval") == 1) {$condition = "1";} else { $condition = "0";}
	    }

	    $checkpermission    = $this->checkUserPermission('6', '2');
	    $data["permission"] = $checkpermission;
	    $data["getdata"] = $this->adminmodel->getdata_toolboxtalks($condition);
	    $this->allpage('toolboxtalkslist', $data);
	}
	function newtoolboxtalks(){
		$this->checksessionout();
		$this->checkUserPermission('6', '1', '1');
		$data["header_title"]=$this->toolboxtalks_title;
		$data["header_title2"]=$this->toolboxtalks_title2;
		$data["leftsidebar_value"]=$this->toolboxtalks_value;
		$data["action"]="new";		
		$checkpermission    = $this->checkUserPermission('6', '2');
	    $data["permission"] = $checkpermission;
		$this->allpage('toolboxtalksaction',$data);
	}
	function edittoolboxtalks(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$this->checkUserPermission('6', '1', '1');
		$data["header_title"]=$this->toolboxtalks_title;
		$data["header_title2"]=$this->toolboxtalks_title2;
		$data["leftsidebar_value"]=$this->toolboxtalks_value;
		$data["getdata"]=$this->adminmodel->getsingledata("toolboxtalks",$uid);
		$data["action"]="edit";		
		$checkpermission    = $this->checkUserPermission('6', '2');
	    $data["permission"] = $checkpermission;
		$this->allpage('toolboxtalksaction',$data);
	}
	function deletetoolboxtalks(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("toolboxtalks",$deleteid);		
		$this->toolboxtalkslist();
	}
	/*function toolboxtalksaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("content","Content",'trim|required');
			$this->form_validation->set_rules("position","Position",'trim|required|numeric');
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newtoolboxtalks();
				}
				if($this->input->post("update")){
					$this->edittoolboxtalks();
				}
			}		
			else{
				$config_image=array();
				$config_image['upload_path']='./images';
				$config_image['allowed_types']='jpg|jpeg|png';
				$config_image['encrypt_name']=TRUE;
				$this->load->library('upload',$config_image);			
				if ( ! $this->upload->do_upload('imagefile'))
				{
					//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
				}
				else
				{
					$imagedata=$this->upload->data();
					$imagefile=$imagedata['file_name'];
				} 
							
				$data=array(
				"content" => $this->input->post("content"),
				"bgcolorcode" => $this->input->post("bgcolorcode"),
				"position" => $this->input->post("position"),
				"published" => $this->input->post("publishid")
				);					
				
				if(isset($imagefile)){
					$data['image']=$imagefile;
				}else{
					if ($this->input->post("imgselector") =='0') {
						$data['image'] = '';
					}
					
				}
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("toolboxtalks",$data);
					$this->toolboxtalkslist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("toolboxtalks",$data,$this->input->post("updateid"));
					$this->toolboxtalkslist();
				}		
			}
		}
		else{			
			$this->toolboxtalkslist();
		}
	}*/

	function toolboxtalksaction(){
		if($this->input->post("insert") || $this->input->post("update")){

			if ($this->input->post("selecttype") =='2') {
				$this->form_validation->set_rules("pdfcontent","Content",'trim|required');
				$this->form_validation->set_rules("pdfposition","Position",'trim|required');
				if (empty($_FILES['pdffile']['name']) && $this->input->post("insert") =='1'){
				    $this->form_validation->set_rules('pdffile', 'PDF File', 'required');
				}
				if($this->form_validation->run()==FALSE){
					 if($this->input->post("insert") =='1'){	
						$this->newtoolboxtalks();
					}
					if($this->input->post("update") =='1'){
						$this->edittoolboxtalks();
					}
				   
				}else{
					if ($_FILES['pdffile']['name'] !='') {
						$config_image=array();
						$config_image['upload_path']='./images';
						$config_image['allowed_types']='jpg|jpeg|png|pdf';
						$config_image['encrypt_name']=TRUE;
						$this->load->library('upload',$config_image);			
						if ( ! $this->upload->do_upload('pdffile')){
							//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
						}else{
							$uploaddata=$this->upload->data();
							if ($this->upload->data('file_ext') == '.pdf') {
								$type = '2';
							}else{
								$type = '1';
							}
							$file = $uploaddata['file_name'];
						}
					}
					if ($_FILES['featfile']['name'] !='') {
						$config_image=array();
						$config_image['upload_path']='./images';
						$config_image['allowed_types']='jpg|jpeg|png|pdf';
						$config_image['encrypt_name']=TRUE;
						$this->load->library('upload',$config_image);			
						if ( ! $this->upload->do_upload('featfile'))
						{
							print_r($this->upload->display_errors()); print_r($this->input->post("featfile")); die;
						}
						else
						{
							$imagedata=$this->upload->data();
							$featfile=$imagedata['file_name'];
						}
					}

					$data=array(
						"content" => $this->input->post("pdfcontent"),
						"bgcolorcode" => NULL,
						"position" => $this->input->post("pdfposition"),
						"published" => $this->input->post("pdfpublishid"),
						"type" => isset($type) ? $type : '2',
						"image" => NULL,
						"description" => NULL,
						);
					if(isset($file)){
						$data['file'] = $file;
					}
					if(isset($featfile)){
						$data['feat_file']=$featfile;
					}
					if($this->input->post("insert")){				
						$this->adminmodel->insertdata("toolboxtalks",$data);
						redirect('admincontrol/toolboxtalkslist');
						//$this->toolboxtalkslist();
					}			
					if($this->input->post("update")){
						$this->adminmodel->updatedata("toolboxtalks",$data,$this->input->post("updateid"));
						redirect('admincontrol/toolboxtalkslist');
						//$this->toolboxtalkslist();
					}

				}
			}elseif($this->input->post("selecttype") =='1'){
				$this->form_validation->set_rules("content","Content",'trim|required');
				$this->form_validation->set_rules("description","Content",'trim|required');
				$this->form_validation->set_rules("position","Position",'trim|required|numeric');
				if($this->form_validation->run()==FALSE){
					if($this->input->post("insert")){					
						$this->newtoolboxtalks();
					}
					if($this->input->post("update")){
						$this->edittoolboxtalks();
					}
				}		
				else{
					$config_image=array();
					$config_image['upload_path']='./images';
					$config_image['allowed_types']='jpg|jpeg|png|pdf';
					$config_image['encrypt_name']=TRUE;
					$this->load->library('upload',$config_image);			
					if ( ! $this->upload->do_upload('imagefile'))
					{
						//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
					}
					else
					{
						$imagedata=$this->upload->data();
						$imagefile=$imagedata['file_name'];
					} 
								
					$data=array(
					"content" => $this->input->post("content"),
					"bgcolorcode" => $this->input->post("bgcolorcode"),
					"position" => $this->input->post("position"),
					"published" => $this->input->post("publishid"),
					"description" => $this->input->post("description"),
					"type" => isset($type) ? $type : '1',
					"file" => NULL,
					);					
					
					if(isset($imagefile)){
						$data['image']=$imagefile;
					}else{
						if ($this->input->post("imgselector") =='0') {
							$data['image'] = '';
						}
						
					}
					if($this->input->post("insert")){				
						$this->adminmodel->insertdata("toolboxtalks",$data);
						$this->toolboxtalkslist();
					}			
					if($this->input->post("update")){
						$this->adminmodel->updatedata("toolboxtalks",$data,$this->input->post("updateid"));
						$this->toolboxtalkslist();
					}		
				}

			}
		}else{			
			$this->toolboxtalkslist();
		}
	}
	
	function toolboxtalkssection1list(){
		$this->checksessionout();
		$this->checkUserPermission('6', '1', '1');
		$toolboxtalksid=$this->uri->segment(3);
		$data["header_title"]=$this->toolboxtalkssection_title;
		$data["header_title2"]=$this->toolboxtalkssection_title2;
		$data["leftsidebar_value"]=$this->toolboxtalkssection_value;
		if(! $this->input->post("activeval")){
			$condition="1";
		}else{ 
			if($this->input->post("activeval") == 1){
				$condition="1";
			}else{
				$condition="0";
			}
		}
		$data["toolboxtalksid"]=$toolboxtalksid;
		$data["toolboxtalksname"]=$this->adminmodel->getsingledata("toolboxtalks",$toolboxtalksid);
		$condition2=$toolboxtalksid;		
		$data["getdata"]=$this->adminmodel->getdata_toolboxtalkssection1($condition,$condition2);		
		$checkpermission    = $this->checkUserPermission('6', '2');
		$data["permission"] = $checkpermission;
		$this->allpage('toolboxtalkssection1list',$data);
	}
	function newtoolboxtalkssection1(){
		$this->checksessionout();
		$this->checkUserPermission('6', '1', '1');
		$toolboxtalksid=$this->uri->segment(3);
		$data["header_title"]=$this->toolboxtalkssection_title;
		$data["header_title2"]=$this->toolboxtalkssection_title2;
		$data["leftsidebar_value"]=$this->toolboxtalkssection_value;
		$data["action"]="new";
		$checkpermission    = $this->checkUserPermission('6', '2');
		$data["permission"] = $checkpermission;
		$data["toolboxtalksid"]=$toolboxtalksid;
		$data["toolboxtalksname"]=$this->adminmodel->getsingledata("toolboxtalks",$toolboxtalksid);
		$this->allpage('toolboxtalkssection1action',$data);
	}
	function edittoolboxtalkssection1(){
		$toolboxtalksid=$this->uri->segment(3);
		$uid=$this->uri->segment(4);
		$this->checksessionout();
		$this->checkUserPermission('6', '1', '1');
		$data["header_title"]=$this->toolboxtalkssection_title;
		$data["header_title2"]=$this->toolboxtalkssection_title2;
		$data["leftsidebar_value"]=$this->toolboxtalkssection_value;
		$data["getdata"]=$this->adminmodel->getsingledata("toolboxtalkssection1",$uid);
		$data["action"]="edit";		
		$data["toolboxtalksid"]=$toolboxtalksid;
		$data["toolboxtalksname"]=$this->adminmodel->getsingledata("toolboxtalks",$toolboxtalksid);
		$checkpermission    = $this->checkUserPermission('6', '2');
		$data["permission"] = $checkpermission;
		$this->allpage('toolboxtalkssection1action',$data);
	}
	function deletetoolboxtalkssection1(){
		$deleteid=$this->input->post("deleteid");
		$this->checksessionout();		
		$this->adminmodel->deletedata("toolboxtalkssection1",$deleteid);		
		$this->toolboxtalkssection1list();
	}
	/*function toolboxtalkssection1action(){
		if($this->input->post("insert") || $this->input->post("update")){			
			$this->form_validation->set_rules("content","Content",'trim|required');
			$this->form_validation->set_rules("position","Position",'trim|required|numeric');
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newtoolboxtalkssection1();
				}
				if($this->input->post("update")){
					$this->edittoolboxtalkssection1();
				}
			}		
			else{			
				
				$config_image=array();
				$config_image['upload_path']='./images';
				$config_image['allowed_types']='jpg|jpeg|png';
				$config_image['encrypt_name']=TRUE;
				$this->load->library('upload',$config_image);			
				if ( ! $this->upload->do_upload('imagefile'))
				{
					//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
				}
				else
				{
					$imagedata=$this->upload->data();
					$imagefile=$imagedata['file_name'];
				} 
				
				$toolboxtalksid=$this->uri->segment(3);				
				$data=array(
				"toolboxtalksid" => $toolboxtalksid,
				"content" => $this->input->post("content"),
				"description" => $this->input->post("description"),
				"detaildescription" => $this->input->post("detaildescription"),
				"link" => $this->input->post("link"),
				"position" => $this->input->post("position"),
				"published" => $this->input->post("publishid")
				);					
				
				if(isset($imagefile)){
					$data['image']=$imagefile;
				}			
							
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("toolboxtalkssection1",$data);
					$this->toolboxtalkssection1list();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("toolboxtalkssection1",$data,$this->input->post("updateid"));
					$this->toolboxtalkssection1list();
				}		
			}
		}
		else{			
			$this->toolboxtalkssection1list();
		}
	}*/

	function toolboxtalkssection1action(){
		if($this->input->post("insert") || $this->input->post("update")){

			if ($this->input->post("selecttype") =='2') {
				$this->form_validation->set_rules("pdfcontent","Content",'trim|required');
				// $this->form_validation->set_rules('pdftitle', 'Title', 'required');
				// $this->form_validation->set_rules('pdfdetail', 'Detail', 'required');
				$this->form_validation->set_rules("pdfposition","Position",'trim|required');
				if (empty($_FILES['pdffile']['name']) && $this->input->post("insert") =='1'){
				    $this->form_validation->set_rules('pdffile', 'PDF File', 'required');
				}
				if($this->form_validation->run()==FALSE){
					 if($this->input->post("insert") =='1'){	
						$this->newtoolboxtalkssection1();
					}
					if($this->input->post("update") =='1'){
						$this->edittoolboxtalkssection1();
					}
				   
				}else{
					if ($_FILES['pdffile']['name'] !='') {
						$config_image=array();
						$config_image['upload_path']='./images';
						$config_image['allowed_types']='jpg|jpeg|png|pdf';
						$config_image['encrypt_name']=TRUE;
						$this->load->library('upload',$config_image);			
						if ( ! $this->upload->do_upload('pdffile')){
							//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
						}
						else{
							$uploaddata=$this->upload->data();
							if ($this->upload->data('file_ext') == '.pdf') {
								$type = '2';
							}else{
								$type = '1';
							}
							$file = $uploaddata['file_name'];
						}
					}

					if ($_FILES['featfile']['name'] !='') {
						$config_image=array();
						$config_image['upload_path']='./images';
						$config_image['allowed_types']='jpg|jpeg|png|pdf';
						$config_image['encrypt_name']=TRUE;
						$this->load->library('upload',$config_image);			
						if ( ! $this->upload->do_upload('featfile'))
						{
							print_r($this->upload->display_errors()); print_r($this->input->post("featfile")); die;
						}
						else
						{
							$imagedata=$this->upload->data();
							$featfile=$imagedata['file_name'];
						}
					}
					

					$toolboxtalksid=$this->uri->segment(3);				
					$data=array(
						"toolboxtalksid" => $toolboxtalksid,
						"content" => $this->input->post("pdfcontent"),
						"description" => NULL,
						"detaildescription" => NULL,
						"link" => NULL,
						"position" => $this->input->post("pdfposition"),
						"published" => $this->input->post("pdfpublishid"),
						"type" => isset($type) ? $type : '2',
						"image" => NULL,
					);
					if(isset($file)){
						$data['file'] = $file;
					}
					if(isset($featfile)){
						$data['feat_file']=$featfile;
					}
					if($this->input->post("insert")){				
						$this->adminmodel->insertdata("toolboxtalkssection1",$data);
						redirect('admincontrol/toolboxtalkssection1list/'.$toolboxtalksid.'');
						//$this->toolboxtalkssection1list();
					}			
					if($this->input->post("update")){
						$this->adminmodel->updatedata("toolboxtalkssection1",$data,$this->input->post("updateid"));
						redirect('admincontrol/toolboxtalkssection1list/'.$toolboxtalksid.'');
						//$this->toolboxtalkssection1list();
					}

				}
			}elseif($this->input->post("selecttype") =='1'){
				$this->form_validation->set_rules("content","Content",'trim|required');
				$this->form_validation->set_rules("position","Position",'trim|required|numeric');
				if($this->form_validation->run()==FALSE){
					if($this->input->post("insert")){					
						$this->newtoolboxtalkssection1();
					}
					if($this->input->post("update")){
						$this->edittoolboxtalkssection1();
					}
				}else{			
					
					$config_image=array();
					$config_image['upload_path']='./images';
					$config_image['allowed_types']='jpg|jpeg|png|pdf';
					$config_image['encrypt_name']=TRUE;
					$this->load->library('upload',$config_image);			
					if ( ! $this->upload->do_upload('imagefile'))
					{
						//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
					}
					else
					{
						$imagedata=$this->upload->data();
						$imagefile=$imagedata['file_name'];
					} 
					
					$toolboxtalksid=$this->uri->segment(3);				
					$data=array(
					"toolboxtalksid" => $toolboxtalksid,
					"content" => $this->input->post("content"),
					"description" => $this->input->post("description"),
					"detaildescription" => $this->input->post("detaildescription"),
					"link" => $this->input->post("link"),
					"position" => $this->input->post("position"),
					"published" => $this->input->post("publishid"),
					"type" => isset($type) ? $type : '1',
					"file" => NULL,
					);					
					
					if(isset($imagefile)){
						$data['image']=$imagefile;
					}			
								
					if($this->input->post("insert")){				
						$this->adminmodel->insertdata("toolboxtalkssection1",$data);
						$this->toolboxtalkssection1list();
					}			
					if($this->input->post("update")){
						$this->adminmodel->updatedata("toolboxtalkssection1",$data,$this->input->post("updateid"));
						$this->toolboxtalkssection1list();
					}		
				}

			}
		}else{			
			$this->toolboxtalkssection1list();
		}
	}
		
	function complianceregulationslist(){
		$this->checksessionout();
		$data["header_title"]=$this->complianceregulations_title;
		$data["header_title2"]=$this->complianceregulations_title2;
		$data["leftsidebar_value"]=$this->complianceregulations_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_complianceregulations($condition);		
		$this->allpage('complianceregulationslist',$data);
	}
	function newcomplianceregulations(){
		$this->checksessionout();
		$data["header_title"]=$this->complianceregulations_title;
		$data["header_title2"]=$this->complianceregulations_title2;
		$data["leftsidebar_value"]=$this->complianceregulations_value;
		$data["action"]="new";		
		$this->allpage('complianceregulationsaction',$data);
	}
	function editcomplianceregulations(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->complianceregulations_title;
		$data["header_title2"]=$this->complianceregulations_title2;
		$data["leftsidebar_value"]=$this->complianceregulations_value;
		$data["getdata"]=$this->adminmodel->getsingledata("complianceregulations",$uid);
		$data["action"]="edit";		
		$this->allpage('complianceregulationsaction',$data);
	}
	function deletecomplianceregulations(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("complianceregulations",$deleteid);		
		$this->complianceregulationslist();
	}
	function complianceregulationsaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("content","Content",'trim|required');
			$this->form_validation->set_rules("position","Position",'trim|required|numeric');
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newcomplianceregulations();
				}
				if($this->input->post("update")){
					$this->editcomplianceregulations();
				}
			}		
			else{			
				
				$config_image=array();
				$config_image['upload_path']='./images';
				$config_image['allowed_types']='jpg|jpeg|png|pdf';
				$config_image['encrypt_name']=TRUE;
				$this->load->library('upload',$config_image);			
				if ( ! $this->upload->do_upload('imagefile'))
				{
					//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
				}
				else
				{
					$imagedata=$this->upload->data();
					$imagefile=$imagedata['file_name'];
				} 
							
				$data=array(
				"content" => $this->input->post("content"),
				"position" => $this->input->post("position"),
				"published" => $this->input->post("publishid")
				);					
				
				if(isset($imagefile)){
					$data['image']=$imagefile;
				}			
							
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("complianceregulations",$data);
					$this->complianceregulationslist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("complianceregulations",$data,$this->input->post("updateid"));
					$this->complianceregulationslist();
				}		
			}
		}
		else{			
			$this->complianceregulationslist();
		}
	}
	
	function checklistslist(){
		$this->checksessionout();
		$data["header_title"]=$this->checklists_title;
		$data["header_title2"]=$this->checklists_title2;
		$data["leftsidebar_value"]=$this->checklists_value;			
		$data["getdata"]=$this->adminmodel->getdata_checklists();		
		$this->allpage('checklistslist',$data);
	}
	function newchecklists(){
		$this->checksessionout();
		$data["header_title"]=$this->checklists_title;
		$data["header_title2"]=$this->checklists_title2;
		$data["leftsidebar_value"]=$this->checklists_value;
		$data["action"]="new";		
		$this->allpage('checklistsaction',$data);
	}
	function editchecklists(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->checklists_title;
		$data["header_title2"]=$this->checklists_title2;
		$data["leftsidebar_value"]=$this->checklists_value;
		$data["getdata"]=$this->adminmodel->getsingledata("checklists",$uid);
		$data["action"]="edit";		
		$this->allpage('checklistsaction',$data);
	}
	function deletechecklists(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("checklists",$deleteid);		
		$this->checklistslist();
	}
	function checklistsaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("cname","Name",'trim|required');			
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newchecklists();
				}
				if($this->input->post("update")){
					$this->editchecklists();
				}
			}		
			else{			
							
				$data=array(
				"name" => $this->input->post("cname"),
				"information" => $this->input->post("information")
				);		
							
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("checklists",$data);
					$this->checklistslist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("checklists",$data,$this->input->post("updateid"));
					$this->checklistslist();
				}		
			}
		}
		else{			
			$this->checklistslist();
		}
	}
	
	function checklistssection1list(){
		$this->checksessionout();
		$checklistsid=$this->uri->segment(3);
		$data["header_title"]=$this->checklistssection_title;
		$data["header_title2"]=$this->checklistssection_title2;
		$data["leftsidebar_value"]=$this->checklistssection_value;		
				
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}
		$data["checklistsid"]=$checklistsid;
		$data["checklistsname"]=$this->adminmodel->getsingledata("checklists",$checklistsid);
		$condition2=$checklistsid;		
		$data["getdata"]=$this->adminmodel->getdata_checklistssection1($condition,$condition2);		
		$this->allpage('checklistssection1list',$data);
	}
	function newchecklistssection1(){
		$this->checksessionout();
		$checklistsid=$this->uri->segment(3);
		$data["header_title"]=$this->checklistssection_title;
		$data["header_title2"]=$this->checklistssection_title2;
		$data["leftsidebar_value"]=$this->checklistssection_value;
		$data["action"]="new";
		$data["checklistsid"]=$checklistsid;
		$data["checklistsname"]=$this->adminmodel->getsingledata("checklists",$checklistsid);
		$this->allpage('checklistssection1action',$data);
	}
	function editchecklistssection1(){
		$checklistsid=$this->uri->segment(3);
		$uid=$this->uri->segment(4);
		$this->checksessionout();
		$data["header_title"]=$this->checklistssection_title;
		$data["header_title2"]=$this->checklistssection_title2;
		$data["leftsidebar_value"]=$this->checklistssection_value;
		$data["getdata"]=$this->adminmodel->getsingledata("checklistssection1",$uid);
		$data["action"]="edit";		
		$data["checklistsid"]=$checklistsid;
		$data["checklistsname"]=$this->adminmodel->getsingledata("checklists",$checklistsid);
		$this->allpage('checklistssection1action',$data);
	}
	function deletechecklistssection1(){
		$deleteid=$this->input->post("deleteid");
		$this->checksessionout();		
		$this->adminmodel->deletedata("checklistssection1",$deleteid);		
		$this->checklistssection1list();
	}
	function checklistssection1action(){
		if($this->input->post("insert") || $this->input->post("update")){			
			$this->form_validation->set_rules("cname","Name",'trim|required');			
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newchecklistssection1();
				}
				if($this->input->post("update")){
					$this->editchecklistssection1();
				}
			}		
			else{			
				
				$checklistsid=$this->uri->segment(3);				
				$data=array(
				"checklistsid" => $checklistsid,
				"name" => $this->input->post("cname"),
				"information" => $this->input->post("information"),				
				"active" => $this->input->post("active")
				);					
							
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("checklistssection1",$data);
					$this->checklistssection1list();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("checklistssection1",$data,$this->input->post("updateid"));
					$this->checklistssection1list();
				}		
			}
		}
		else{			
			$this->checklistssection1list();
		}
	}
	
	function faqslist(){
		$this->checksessionout();
		$data["header_title"]=$this->faqs_title;
		$data["header_title2"]=$this->faqs_title2;
		$data["leftsidebar_value"]=$this->faqs_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_faqs($condition);		
		$this->allpage('faqslist',$data);
	}
	function newfaqs(){
		$this->checksessionout();
		$data["header_title"]=$this->faqs_title;
		$data["header_title2"]=$this->faqs_title2;
		$data["leftsidebar_value"]=$this->faqs_value;
		$data["action"]="new";		
		$this->allpage('faqsaction',$data);
	}
	function editfaqs(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->faqs_title;
		$data["header_title2"]=$this->faqs_title2;
		$data["leftsidebar_value"]=$this->faqs_value;
		$data["getdata"]=$this->adminmodel->getsingledata("faqs",$uid);
		$data["action"]="edit";		
		$this->allpage('faqsaction',$data);
	}
	function deletefaqs(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("faqs",$deleteid);		
		$this->faqslist();
	}
	function faqsaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("content","Content",'trim|required');			
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newfaqs();
				}
				if($this->input->post("update")){
					$this->editfaqs();
				}
			}		
			else{			
											
				$data=array(
				"content" => $this->input->post("content"),
				"published" => $this->input->post("publishid")
				);				
							
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("faqs",$data);
					$this->faqslist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("faqs",$data,$this->input->post("updateid"));
					$this->faqslist();
				}		
			}
		}
		else{			
			$this->faqslist();
		}
	}
	
	function pageslist(){
		$this->checksessionout();
		$data["header_title"]=$this->pages_title;
		$data["header_title2"]=$this->pages_title2;
		$data["leftsidebar_value"]=$this->pages_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_pages($condition);		
		$this->allpage('pageslist',$data);
	}
	function newpages(){
		$this->checksessionout();
		$data["header_title"]=$this->pages_title;
		$data["header_title2"]=$this->pages_title2;
		$data["leftsidebar_value"]=$this->pages_value;
		$data["action"]="new";
		$data["sectiondata"]=$this->adminmodel->getfulldata("section");		
		$this->allpage('pagesaction',$data);
	}
	function editpages(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->pages_title;
		$data["header_title2"]=$this->pages_title2;
		$data["leftsidebar_value"]=$this->pages_value;
		$data["getdata"]=$this->adminmodel->getsingledata("pages",$uid);
		$data["action"]="edit";
		$data["sectiondata"]=$this->adminmodel->getfulldata("section",'');		
		$this->allpage('pagesaction',$data);
	}
	function deletepages(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("pages",$deleteid);		
		$this->pageslist();
	}
	function pagesaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("title","Title",'trim|required');						
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newpages();
				}
				if($this->input->post("update")){
					$this->editpages();
				}
			}		
			else{							
							
				$data=array(
				"title" => $this->input->post("title"),
				"body" => $this->input->post("body"),				
				"published" => $this->input->post("publishid")
				);
				
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("pages",$data);
					$this->pageslist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("pages",$data,$this->input->post("updateid"));
					$this->pageslist();
				}		
			}
		}
		else{			
			$this->pageslist();
		}
	}
	
	function cpdcontentlist(){
		$this->checksessionout();
		$data["header_title"]=$this->cpdcontent_title;
		$data["header_title2"]=$this->cpdcontent_title2;
		$data["leftsidebar_value"]=$this->cpdcontent_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_cpdcontent($condition);		
		$this->allpage('cpdcontentlist',$data);
	}
	function newcpdcontent(){
		$this->checksessionout();
		$data["header_title"]=$this->cpdcontent_title;
		$data["header_title2"]=$this->cpdcontent_title2;
		$data["leftsidebar_value"]=$this->cpdcontent_value;
		$data["action"]="new";
		$data["sectiondata"]=$this->adminmodel->getfulldata("cpdsection");		
		$this->allpage('cpdcontentaction',$data);
	}
	function editcpdcontent(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->cpdcontent_title;
		$data["header_title2"]=$this->cpdcontent_title2;
		$data["leftsidebar_value"]=$this->cpdcontent_value;
		$data["getdata"]=$this->adminmodel->getsingledata("cpdcontent",$uid);
		$data["action"]="edit";
		$data["sectiondata"]=$this->adminmodel->getfulldata("cpdsection",'');		
		$this->allpage('cpdcontentaction',$data);
	}
	function deletecpdcontent(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("cpdcontent",$deleteid);		
		$this->cpdcontentlist();
	}
	function cpdcontentaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("title","Title",'trim|required');			
			$this->form_validation->set_rules("sectionid","Section",'trim|required');
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newcpdcontent();
				}
				if($this->input->post("update")){
					$this->editcpdcontent();
				}
			}		
			else{							
							
				$data=array(
				"title" => $this->input->post("title"),
				"body" => $this->input->post("body"),
				"cpdsectionid" => $this->input->post("sectionid"),
				"published" => $this->input->post("publishid")
				);
				
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("cpdcontent",$data);
					$this->cpdcontentlist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("cpdcontent",$data,$this->input->post("updateid"));
					$this->cpdcontentlist();
				}		
			}
		}
		else{			
			$this->cpdcontentlist();
		}
	}
	
	function custompagelist(){
		$this->checksessionout();
		$data["header_title"]=$this->custompage_title;
		$data["header_title2"]=$this->custompage_title2;
		$data["leftsidebar_value"]=$this->custompage_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_custompage($condition);		
		$this->allpage('custompagelist',$data);
	}
	function newcustompage(){
		$this->checksessionout();
		$data["header_title"]=$this->custompage_title;
		$data["header_title2"]=$this->custompage_title2;
		$data["leftsidebar_value"]=$this->custompage_value;
		$data["action"]="new";		
		$this->allpage('custompageaction',$data);
	}
	function editcustompage(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->custompage_title;
		$data["header_title2"]=$this->custompage_title2;
		$data["leftsidebar_value"]=$this->custompage_value;
		$data["getdata"]=$this->adminmodel->getsingledata("custompage",$uid);
		$data["action"]="edit";		
		$this->allpage('custompageaction',$data);
	}
	function deletecustompage(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("custompage",$deleteid);		
		$this->custompagelist();
	}
	function custompageaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("pagename","Page Name",'trim|required');
			$this->form_validation->set_rules("tagnumber","NFC Tag Number",'trim|required');
			$this->form_validation->set_rules("title","Title",'trim|required');						
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newcustompage();
				}
				if($this->input->post("update")){
					$this->editcustompage();
				}
			}		
			else{							
							
				$data=array(
				"pagename" => $this->input->post("pagename"),
				"tagnumber" => $this->input->post("tagnumber"),
				"title" => $this->input->post("title"),
				"body" => $this->input->post("body"),				
				"published" => $this->input->post("publishid")
				);
				
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("custompage",$data);
					$this->custompagelist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("custompage",$data,$this->input->post("updateid"));
					$this->custompagelist();
				}		
			}
		}
		else{			
			$this->custompagelist();
		}
	}
	
	function healthsafetytipslist(){
		$this->checksessionout();
		$data["header_title"]=$this->healthsafetytips_title;
		$data["header_title2"]=$this->healthsafetytips_title2;
		$data["leftsidebar_value"]=$this->healthsafetytips_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_healthsafetytips($condition);		
		$this->allpage('healthsafetytipslist',$data);
	}
	function newhealthsafetytips(){
		$this->checksessionout();
		$data["header_title"]=$this->healthsafetytips_title;
		$data["header_title2"]=$this->healthsafetytips_title2;
		$data["leftsidebar_value"]=$this->healthsafetytips_value;
		$data["action"]="new";		
		$this->allpage('healthsafetytipsaction',$data);
	}
	function edithealthsafetytips(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->healthsafetytips_title;
		$data["header_title2"]=$this->healthsafetytips_title2;
		$data["leftsidebar_value"]=$this->healthsafetytips_value;
		$data["getdata"]=$this->adminmodel->getsingledata("healthsafetytips",$uid);
		$data["action"]="edit";		
		$this->allpage('healthsafetytipsaction',$data);
	}
	function deletehealthsafetytips(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("healthsafetytips",$deleteid);		
		$this->healthsafetytipslist();
	}
	function healthsafetytipsaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("content","Content",'trim|required');
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newhealthsafetytips();
				}
				if($this->input->post("update")){
					$this->edithealthsafetytips();
				}
			}		
			else{			
							
				$data=array(
				"content" => $this->input->post("content"),
				"active" => $this->input->post("active")
				);			
							
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("healthsafetytips",$data);
					$this->healthsafetytipslist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("healthsafetytips",$data,$this->input->post("updateid"));
					$this->healthsafetytipslist();
				}		
			}
		}
		else{			
			$this->healthsafetytipslist();
		}
	}
	
	function popupnotificationlist(){
		$this->checksessionout();
		$data["header_title"]=$this->popupnotification_title;
		$data["header_title2"]=$this->popupnotification_title2;
		$data["leftsidebar_value"]=$this->popupnotification_value;
		$data["getdata"]=$this->adminmodel->getdata_popupnotification();		
		$this->allpage('popupnotificationlist',$data);
	}
	function newpopupnotification(){
		$this->checksessionout();
		$data["header_title"]=$this->popupnotification_title;
		$data["header_title2"]=$this->popupnotification_title2;
		$data["leftsidebar_value"]=$this->popupnotification_value;
		$data["action"]="new";		
		$this->allpage('popupnotificationaction',$data);
	}
	function editpopupnotification(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->popupnotification_title;
		$data["header_title2"]=$this->popupnotification_title2;
		$data["leftsidebar_value"]=$this->popupnotification_value;
		$data["getdata"]=$this->adminmodel->getsingledata("popupnotification",$uid);
		$data["action"]="edit";		
		$this->allpage('popupnotificationaction',$data);
	}
	function deletepopupnotification(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("popupnotification",$deleteid);		
		$this->popupnotificationlist();
	}
	function popupnotificationaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("heading","Heading",'trim|required');
			$this->form_validation->set_rules("text","Text",'trim|required');
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newpopupnotification();
				}
				if($this->input->post("update")){
					$this->editpopupnotification();
				}
			}		
			else{			
				
				$config_image=array();
				$config_image['upload_path']='./images';
				$config_image['allowed_types']='jpg|jpeg|png|pdf';
				$config_image['encrypt_name']=TRUE;
				$this->load->library('upload',$config_image);			
				if ( ! $this->upload->do_upload('imagefile'))
				{
					//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
				}
				else
				{
					$imagedata=$this->upload->data();
					$imagefile=$imagedata['file_name'];
				} 
				
				$activedate=date("Y-m-d", strtotime($this->input->post("activedate")));
				$deactivedate=date("Y-m-d", strtotime($this->input->post("inactivedate")));
				
				$data=array(
				"heading" => $this->input->post("heading"),
				"text" => $this->input->post("text"),
				"url" => $this->input->post("url"),
				"urltext" => $this->input->post("urltext"),
				"activedate" => $activedate,
				"inactivedate" => $deactivedate
				);					
				
				if(isset($imagefile)){
					$data['image']=$imagefile;
				}			
							
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("popupnotification",$data);
					$this->popupnotificationlist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("popupnotification",$data,$this->input->post("updateid"));
					$this->popupnotificationlist();
				}		
			}
		}
		else{			
			$this->popupnotificationlist();
		}
	}
	
	function bannerlist(){
		$this->checksessionout();
		$this->checkUserPermission('3', '1', '1');
		$userdetails 		= 	$this->getUserDetails();
		$data["header_title"]=$this->banner_title;
		$data["header_title2"]=$this->banner_title2;
		$data["leftsidebar_value"]=$this->banner_value;	
		// print_r($userdetails['warehouse_staff']);die;
		if ($userdetails['warehouse_staff'] == '0') {
			$data["pagesdata"]=$this->adminmodel->getfulldata("pages", ['pagetype' => 'bannerlist', 'warehouse_staff' => '0']);
		}else{
			$data["pagesdata"]=$this->adminmodel->getfulldata("pages", ['pagetype' => 'bannerlist', 'warehouse_staff' => '1']);
		}
		
				
		if(! $this->input->post("pagesid"))
			$condition='1';					
		else
			$condition=$this->input->post("pagesid");	
		
		
		if(! $this->input->post("topactivevalue")){ $condition2="1"; } 
		else{ 
			if($this->input->post("topactivevalue") == 1){ $condition2="1"; }
			else{ $condition2="0"; }
		}
		
		if(! $this->input->post("bottomactivevalue")){ $condition3="1"; } 
		else{ 
			if($this->input->post("bottomactivevalue") == 1){ $condition3="1"; }
			else{ $condition3="0"; }
		}

		$checkpermission		=	$this->checkUserPermission('3', '2');
		$data["permission"] 	= 	$checkpermission;
		$data["userdetails"] 	= 	$userdetails;
		$data["getdata"] 		=	$this->adminmodel->getdata_bannertop_1($condition,$condition2);
		$data["getdata1"] 		=	$this->adminmodel->getdata_bannerbottom($condition,$condition3);
		
		//print_r($data["scrollingtickerdata"]); die;
		$data["pagesid"]=$this->input->post("pagesid");
		$this->allpage('bannerlist',$data);
	}
	
	function newbannertop(){
		$this->checksessionout();
		$this->checkUserPermission('3', '1', '1');
		$data["header_title"]=$this->banner_title;
		$data["header_title2"]=$this->banner_title2;
		$data["leftsidebar_value"]=$this->banner_value;
		$data["action"]="new";
		$data["topbottom"]="top";
		$checkpermission	=	$this->checkUserPermission('3', '2');
		$data["permission"] = $checkpermission;
		$data["pagesid"]=$this->input->post("pagesid");
		$this->allpage('banneraction',$data);
	}
	function newbannerbottom(){
		$this->checksessionout();
		$data["header_title"]=$this->banner_title;
		$data["header_title2"]=$this->banner_title2;
		$data["leftsidebar_value"]=$this->banner_value;
		$data["action"]="new";
		$data["topbottom"]="bottom";
		$data["pagesid"]=$this->input->post("pagesid");
		$this->allpage('banneraction',$data);
	}
	function editbanner(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$this->checkUserPermission('3', '1', '1');
		$data["header_title"]=$this->banner_title;
		$data["header_title2"]=$this->banner_title2;
		$data["leftsidebar_value"]=$this->banner_value;
		$data["getdata"]=$this->adminmodel->getsingledata("banner",$uid);
		$data["action"]="edit";		
		$checkpermission    = $this->checkUserPermission('3', '2');
		$data["permission"] = $checkpermission;
		$this->allpage('banneraction',$data);
	}
	function deletebanner(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("banner",$deleteid);		
		$this->bannerlist();
	}
	function banneraction(){		
		if($this->input->post("insert") || $this->input->post("update")){

			$this->form_validation->set_rules("topbottom","TopBottom",'trim|required');
			if ($this->input->post("insert") && empty($_FILES['imagefile']['name'])) {
				$this->form_validation->set_rules("imagefile","Banner Image",'trim|required');
			}
			if($this->form_validation->run()==FALSE){
				
				if($this->input->post("insert")){
					if($this->input->post("topbottom") == 'top')
						$this->newbannertop();
					else
						$this->newbannerbottom();
				}
				if($this->input->post("update")){
					$this->editbanner();
				}
			}		
			else{			
				
				$config_image=array();
				$config_image['upload_path']='./images';
				$config_image['allowed_types']='jpg|jpeg|png|pdf';
				$config_image['encrypt_name']=TRUE;
				$this->load->library('upload',$config_image);			
				if ( ! $this->upload->do_upload('imagefile'))
				{
					//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
				}
				else
				{
					//print_r($this->upload->data()); die;
					$imagedata=$this->upload->data();
					$imagefile=$imagedata['file_name'];
				} 
							
				$data=array(
				"name" => $this->input->post("cname"),
				"client" => $this->input->post("client"),
				"description" => $this->input->post("description"),
				"pagesid" => $this->input->post("pagesid"),
				"topbottom" => $this->input->post("topbottom"),
				"link" => $this->input->post("link"),
				"active" => $this->input->post("active")
				);					
				
				if(isset($imagefile)){
					$data['image']=$imagefile;
				}			
							
				if($this->input->post("insert")){				
					$result = $this->adminmodel->bannerInsert("banner",$data);
					$date 							= date('Y-m-d');
					/*if ($result) {
						$request1['bannerid'] 		= $result;
						$request1['newpageid'] 		= $this->input->post("pagesid");
						$request1['impressions'] 	= 0;
						$request1['impressions'] 	= 0;
						$request1['clickscount'] 	= 0;
						$request1['created_at'] 	= $date;

						// $bandata 		= $this->db->insert('banner_impressions_count', $request1);
						$newbannerid 	= $this->db->insert_id();
					}*/
					$this->bannerlist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->bannerUpdate("banner",$data,$this->input->post("updateid"));

					$date 				= date('Y-m-d');
					/*$bannerdata 		= $this->Apimodel->impressionsClicksgetList('row', ['date' => $date, 'newpageid' => $post['newpageid'], 'bannerid' => $post['bannerid']]);
					
					if ($bannerdata == '') {
						$request1['bannerid'] 		= $this->input->post("updateid");
						$request1['newpageid'] 		= $this->input->post("pagesid");
						$request1['impressions'] 	= 0;
						$request1['impressions'] 	= 0;
						$request1['clickscount'] 	= 0;
						$request1['created_at'] 	= $date;

						// $bandata 		= $this->db->insert('banner_impressions_count', $request1);
						$newbannerid 	= $this->db->insert_id();
					}*/

					$this->bannerlist();
				}		
			}
		}
		else{			
			$this->bannerlist();
		}
	}
	
	function scrollingtickerlist(){
		$this->checksessionout();
		$this->checkUserPermission('1', '1', '1');
		$data["header_title"]=$this->scrollingticker_title;
		$data["header_title2"]=$this->scrollingticker_title2;
		$data["leftsidebar_value"]=$this->scrollingticker_value;	
		$data["pagesdata"]=$this->adminmodel->getfulldata("pages");
		
		// if(! $this->input->post("pagesid"))
			$condition='1';					
		// else
		// 	$condition=$this->input->post("pagesid");
		$checkpermission	=	$this->checkUserPermission('1', '2');
		$data["permission"] = $checkpermission;
		$data["getdata"] 	= $this->adminmodel->getdata_scrollingticker($condition);
		$data["pagesid"] 	= $this->input->post("pagesid");
		$this->allpage('scrollingtickerlist',$data);
	}	
	function newscrollingticker(){
		$this->checksessionout();
		$this->checkUserPermission('1', '2', '1');
		$data["header_title"]=$this->scrollingticker_title;
		$data["header_title2"]=$this->scrollingticker_title2;
		$data["leftsidebar_value"]=$this->scrollingticker_value;
		$data["action"]="new";
		$data["topbottom"]="";
		$data["pagesid"]=$this->input->post("pagesid");
		$this->allpage('scrollingtickeraction',$data);
	}
	function editscrollingticker(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$this->checkUserPermission('1', '2', '1');
		$data["header_title"]=$this->scrollingticker_title;
		$data["header_title2"]=$this->scrollingticker_title2;
		$data["leftsidebar_value"]=$this->scrollingticker_value;
		$data["getdata"]=$this->adminmodel->getsingledata("scrollingticker",$uid);		
		$data["action"]="edit";		
		$this->allpage('scrollingtickeraction',$data);
	}
	function deletescrollingticker(){
		$this->checkUserPermission('1', '2', '1');
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("scrollingticker",$deleteid);		
		$this->scrollingtickerlist();
	}
	function scrollingtickeraction(){		
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("scrollingticker","scrollingticker",'trim|required');
			if($this->form_validation->run()==FALSE){
				
				if($this->input->post("insert")){
					$this->newscrollingticker();
				}
				if($this->input->post("update")){
					$this->editscrollingticker();
				}
			}		
			else{ 
							
				$data=array(
				// "pagesid" => $this->input->post("pagesid"),
				"pagesid" => '1', // 1 - home
				"scrollingticker" => $this->input->post("scrollingticker")
				);				
							
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("scrollingticker",$data);
					$this->scrollingtickerlist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("scrollingticker",$data,$this->input->post("updateid"));
					$this->scrollingtickerlist();
				}		
			}
		}
		else{			
			$this->scrollingtickerlist();
		}
	}
	
	function newslist()
	{
	    $this->checksessionout();
	    $this->checkUserPermission('4', '1', '1');
	    $data["header_title"]      = $this->news_title;
	    $data["header_title2"]     = $this->news_title2;
	    $data["leftsidebar_value"] = $this->news_value;

	    $checkpermission    = $this->checkUserPermission('4', '2');
	    $data["permission"] = $checkpermission;
	    $data["getdata"]    = $this->adminmodel->getdata_news();
	    $this->allpage('newslist', $data);
	}
	function newnews(){
		$this->checksessionout();
		$this->checkUserPermission('4', '1', '1');
		$data["header_title"]=$this->news_title;
		$data["header_title2"]=$this->news_title2;
		$data["leftsidebar_value"]=$this->news_value;
		$data["action"]="new";		
		$checkpermission    = $this->checkUserPermission('4', '2');
	    $data["permission"] = $checkpermission;		
		$this->allpage('newsaction',$data);
	}
	function editnews(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$this->checkUserPermission('4', '1', '1');
		$data["header_title"]=$this->news_title;
		$data["header_title2"]=$this->news_title2;
		$data["leftsidebar_value"]=$this->news_value;
		$data["getdata"]=$this->adminmodel->getsingledata("news",$uid);
		$data["action"]="edit";		
		$checkpermission    = $this->checkUserPermission('4', '2');
	    $data["permission"] = $checkpermission;
		$this->allpage('newsaction',$data);
	}
	function deletenews(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("news",$deleteid);		
		// $this->newslist();
		redirect('admincontrol/newslist');
	}
	function newsaction(){
		if($this->input->post("insert") || $this->input->post("update")){

			if ($this->input->post("selecttype") =='2') {
				$this->form_validation->set_rules("pdftitle","Title",'trim|required');
				$this->form_validation->set_rules("position", "Position", 'trim|required|numeric');
				// $this->form_validation->set_rules('pdftitle', 'Title', 'required');
				// $this->form_validation->set_rules('pdfdetail', 'Detail', 'required');
				$this->form_validation->set_rules("pdfdetail","Detail",'trim|required');
				if (empty($_FILES['pdffile']['name']) && $this->input->post("files") ==''){
				    $this->form_validation->set_rules('pdffile', 'PDF File', 'required');
				}
				// if (empty($_FILES['featfile']['name']) && $this->input->post("feat_file") ==''){
				//     $this->form_validation->set_rules('featfile', 'Feature Image', 'required');
				// }

				if($this->form_validation->run()==FALSE){
					 if($this->input->post("insert") =='1'){	
						$this->newnews();
					}
					if($this->input->post("update") =='1'){
						// print_r($this->input->post());die;
						// $this->editnews();
						redirect('admincontrol/editnews/'.$this->input->post("updateid").'');
					}
				   
				}else{
					if ($_FILES['pdffile']['name'] !='') {
						$config_image=array();
						$config_image['upload_path']='./images';
						$config_image['allowed_types']='jpg|jpeg|png|pdf';
						$config_image['encrypt_name']=TRUE;
						$this->load->library('upload',$config_image);			
						if ( ! $this->upload->do_upload('pdffile'))
						{
							//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
						}
						else
						{
							$imagedata=$this->upload->data();
							if ($this->upload->data('file_ext') == '.pdf') {
								$type = '2';
							}else{
								$type = '1';
							}
							$imagefile=$imagedata['file_name'];
						}
					}
					if ($_FILES['featfile']['name'] !='') {
						$config_image=array();
						$config_image['upload_path']='./images';
						$config_image['allowed_types']='jpg|jpeg|png|pdf';
						$config_image['encrypt_name']=TRUE;
						$this->load->library('upload',$config_image);			
						if ( ! $this->upload->do_upload('featfile'))
						{
							//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
						}
						else
						{
							$imagedata=$this->upload->data();
							$featfile=$imagedata['file_name'];
						}
					}
					 
								
					$data=array(
					"title" => $this->input->post("pdftitle"),				
					"detail" => $this->input->post("pdfdetail"),
					"position"    => $this->input->post("position"),
                    "published"   => $this->input->post("publishid"),
					"description" => null,
					"type" => isset($type) ? $type : '2',
					);					
					
					if(isset($imagefile)){
						$data['file']=$imagefile;
					}
					if(isset($featfile)){
						$data['feat_file']=$featfile;
					}
					if($this->input->post("insert")){				
						$this->adminmodel->insertdata("news",$data);
						redirect('admincontrol/newslist');
						// $this->newslist();
					}			
					if($this->input->post("update")){
						$this->adminmodel->updatedata("news",$data,$this->input->post("updateid"));
						redirect('admincontrol/newslist');
						// $this->newslist();
					}
				}	
				
			}elseif($this->input->post("selecttype") =='1'){
				$this->form_validation->set_rules("title","Title",'trim|required');
				$this->form_validation->set_rules("position", "Position", 'trim|required|numeric');
				if (empty($_FILES['imagefile']['name']) && $this->input->post("insert") =='1'){
				    $this->form_validation->set_rules('imagefile', 'Image File', 'required');
				}
				if($this->form_validation->run()==FALSE){
					if($this->input->post("insert")){					
						$this->newnews();
					}
					if($this->input->post("update")){
						$this->editnews();
					}
				}		
				else{
					if ( isset($_FILES['imagefile']['name']) && $_FILES['imagefile']['name'] !='') {
						$uploaddata = $this->fileupload(['file' => $_FILES]);
					}

					$data = array(
					"title" => $this->input->post("title"),				
					"detail" => $this->input->post("detail"),
					"position"    => $this->input->post("position"),
                    "published"   => $this->input->post("publishid"),
					"description" => $this->input->post("description"),
					"type" => isset($type) ? $type : '1',
					);
					if (isset($uploaddata)) {
						$data['file'] = $uploaddata;
					}
								
					if($this->input->post("insert")){				
						$this->adminmodel->insertdata("news",$data);
						redirect('admincontrol/newslist');
						// $this->newslist();
					}			
					if($this->input->post("update")){
						$this->adminmodel->updatedata("news",$data,$this->input->post("updateid"));
						redirect('admincontrol/newslist');
						// $this->newslist();
					}
					
				}
			}
			
		}
		else{			
			$this->newslist();
		}
	}
	
	function backbannerlist(){
		$this->checksessionout();
		$data["header_title"]=$this->backbanner_title;
		$data["header_title2"]=$this->backbanner_title2;
		$data["leftsidebar_value"]=$this->backbanner_value;						
		$data["getdata"]=$this->adminmodel->getdata_backbanner();		
		$this->allpage('backbannerlist',$data);
	}
	function newbackbanner(){
		$this->checksessionout();
		$data["header_title"]=$this->backbanner_title;
		$data["header_title2"]=$this->backbanner_title2;
		$data["leftsidebar_value"]=$this->backbanner_value;
		$data["action"]="new";				
		$this->allpage('backbanneraction',$data);
	}
	function editbackbanner(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->backbanner_title;
		$data["header_title2"]=$this->backbanner_title2;
		$data["leftsidebar_value"]=$this->backbanner_value;
		$data["getdata"]=$this->adminmodel->getsingledata("backbanner",$uid);
		$data["action"]="edit";		
		$this->allpage('backbanneraction',$data);
	}
	function deletebackbanner(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("backbanner",$deleteid);		
		$this->backbannerlist();
	}
	function backbanneraction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("imagefile","Image",'required');
			if(empty($_FILES['imagefile']['name'])){  //$this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newbackbanner();
				}
				if($this->input->post("update")){
					$this->editbackbanner();
				}
			}		
			else{			
				
				$config_image=array();
				$config_image['upload_path']='./images';
				$config_image['allowed_types']='jpg|jpeg|png|pdf';
				$config_image['encrypt_name']=TRUE;
				$this->load->library('upload',$config_image);			
				if ( ! $this->upload->do_upload('imagefile'))
				{
					//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
				}
				else
				{
					$imagedata=$this->upload->data();
					$imagefile=$imagedata['file_name'];
				} 
							
				$data=array();			
				
				if(isset($imagefile)){
					$data['image']=$imagefile;
				}			
							
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("backbanner",$data);
					$this->backbannerlist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("backbanner",$data,$this->input->post("updateid"));
					$this->backbannerlist();
				}		
			}
		}
		else{			
			$this->backbannerlist();
		}
	}
	
	function serviceratepdflist(){
		$this->checksessionout();
		$data["header_title"]=$this->serviceratepdf_title;
		$data["header_title2"]=$this->serviceratepdf_title2;
		$data["leftsidebar_value"]=$this->serviceratepdf_value;	
		$data["getdata"]=$this->adminmodel->getdata_serviceratepdf();		
		$this->allpage('serviceratepdflist',$data);
	}
	function newserviceratepdf(){
		$this->checksessionout();
		$data["header_title"]=$this->serviceratepdf_title;
		$data["header_title2"]=$this->serviceratepdf_title2;
		$data["leftsidebar_value"]=$this->serviceratepdf_value;
		$data["action"]="new";		
		$this->allpage('serviceratepdfaction',$data);
	}
	function editserviceratepdf(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->serviceratepdf_title;
		$data["header_title2"]=$this->serviceratepdf_title2;
		$data["leftsidebar_value"]=$this->serviceratepdf_value;
		$data["getdata"]=$this->adminmodel->getsingledata("serviceratepdf",$uid);
		$data["action"]="edit";		
		$this->allpage('serviceratepdfaction',$data);
	}
	function deleteserviceratepdf(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("serviceratepdf",$deleteid);		
		$this->serviceratepdflist();
	}
	function serviceratepdfaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("content","Content",'trim|required');
			if (empty($_FILES['imagefile']['name']))
				$this->form_validation->set_rules('imagefile', 'Document', 'required');
			
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newserviceratepdf();
				}
				if($this->input->post("update")){
					$this->editserviceratepdf();
				}
			}		
			else{			
				
				$config_image=array();
				$config_image['upload_path']='./images';
				$config_image['allowed_types']='jpg|jpeg|png|pdf';
				$this->load->library('upload',$config_image);			
				if ( ! $this->upload->do_upload('imagefile'))
				{
					//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
				}
				else
				{
					$imagedata=$this->upload->data();
					$imagefile=$imagedata['file_name'];
				} 
							
				$data=array(
				"content" => $this->input->post("content")
				);					
				
				if(isset($imagefile)){
					$data['document']=$imagefile;
				}			
							
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("serviceratepdf",$data);
					$this->serviceratepdflist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("serviceratepdf",$data,$this->input->post("updateid"));
					$this->serviceratepdflist();
				}		
			}
		}
		else{			
			$this->serviceratepdflist();
		}
	}
	
	function membershiplist(){
		$this->checksessionout();
		$data["header_title"]=$this->membership_title;
		$data["header_title2"]=$this->membership_title2;
		$data["leftsidebar_value"]=$this->membership_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_membership($condition);		
		$this->allpage('membershiplist',$data);
	}
	function newmembership(){
		$this->checksessionout();
		$data["header_title"]=$this->membership_title;
		$data["header_title2"]=$this->membership_title2;
		$data["leftsidebar_value"]=$this->membership_value;
		$data["action"]="new";		
		$this->allpage('membershipaction',$data);
	}
	function editmembership(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->membership_title;
		$data["header_title2"]=$this->membership_title2;
		$data["leftsidebar_value"]=$this->membership_value;
		$data["getdata"]=$this->adminmodel->getsingledata("membership",$uid);
		$data["action"]="edit";		
		$this->allpage('membershipaction',$data);
	}
	function deletemembership(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("membership",$deleteid);		
		$this->membershiplist();
	}
	function membershipaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("company","Company",'trim|required');
			$this->form_validation->set_rules("membershipno","Membership No",'trim|required');
			$this->form_validation->set_rules("email","Email",'trim|required|valid_email');
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newmembership();
				}
				if($this->input->post("update")){
					$this->editmembership();
				}
			}		
			else{	
							
				$data=array(
				"company" => $this->input->post("company"),
				"membershipno" => $this->input->post("membershipno"),
				"email" => $this->input->post("email"),
				"suspended" => $this->input->post("suspended")
				);			
							
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("membership",$data);
					$this->membershiplist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("membership",$data,$this->input->post("updateid"));
					$this->membershiplist();
				}		
			}
		}
		else{			
			$this->membershiplist();
		}
	}
	
	/*function userlist()
	{
	    $this->checksessionout();
	    $this->checkUserPermission('7', '1', '1');
	    $data["header_title"]      = $this->user_title;
	    $data["header_title2"]     = $this->user_title2;
	    $data["leftsidebar_value"] = $this->user_value;

	    $checkpermission    = $this->checkUserPermission('7', '2');
	    $data["permission"] = $checkpermission;
	    $data["getdata"]    = $this->Usersmodel->getList('all', ['pagetype' => 'users', 'status' => '1']);
	    $this->allpage('userlist', $data);
	}*/

	function userlist()
	{
	    $this->checksessionout();
	    $this->checkUserPermission('7', '1', '1');
	    $data["header_title"]      = $this->user_title;
	    $data["header_title2"]     = $this->user_title2;
	    $data["leftsidebar_value"] = $this->user_value;

	    $checkpermission    = $this->checkUserPermission('7', '2');
	    $data["permission"] = $checkpermission;

	    if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}
		$data['condition'] = $condition;
	    // $data["getdata"]    = $this->Usersmodel->getList('all', ['pagetype' => 'users', 'status' => '1']);
	    $data["getdata"]    = $this->Usersmodel->getList('all', ['pagetype' => 'users', 'status' => $condition]);
	    $this->allpage('userlist', $data);
	}
	function newuser(){
		$this->checksessionout();
		$this->checkUserPermission('7', '1', '1');
		$data["header_title"]=$this->user_title;
		$data["header_title2"]=$this->user_title2;
		$data["leftsidebar_value"]=$this->user_value;
		$data["banunban"] = $this->config->item('banunban');
		$data["mail_status"] = $this->config->item('mailstatus');
		$data["action"]="new";		
		$checkpermission    = $this->checkUserPermission('7', '2');
	    $data["permission"] = $checkpermission;
		$this->allpage('useraction',$data);
	}
	function edituser(){
		$uid=$this->uri->segment(3);
		$userid = $this->getUserID();
		$userDetails = $this->getUserDetails();
		$this->checksessionout();
		$this->checkUserPermission('7', '1', '1');
		$data["header_title"]=$this->user_title;
		$data["header_title2"]=$this->user_title2;
		$data["leftsidebar_value"]=$this->user_value;
		// $data["getdata"]=$this->adminmodel->getsingledata("users",$uid);
		$data["getdata"] = $this->Usersmodel->getList('row', ['userid' => $uid]);
		$data["diarylist"] =$this->Diarymodel->getdiaryList('all', ['adminid' => $userid, 'userid' => $uid, 'pagetype' => 'admin']);
		$data["userDetails"] = $userDetails;
		$data["banunban"] = $this->config->item('banunban');
		$data["mail_status"] = $this->config->item('mailstatus');
		$data["action"]="edit";		
		$checkpermission    = $this->checkUserPermission('7', '2');
	    $data["permission"] = $checkpermission;
		$this->allpage('useraction',$data);
	}
	function deleteuser(){
		$deleteid = $this->input->post("id");  //$this->uri->segment(3);
		$this->checksessionout();		
		// $this->adminmodel->deletedata("users",$deleteid);		
		$this->adminmodel->changestatus("users",$deleteid);
		// $this->userlist();
		redirect('admincontrol/userlist');
	}
	function deletesystem_user(){
		$deleteid = $this->input->post("id");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata1("users",$deleteid);		
		redirect('admincontrol/systemusers');
	}
	function useraction(){

		if ($this->input->post()) {
			$requestData = $this->input->post();
			$userid = $this->getUserID();
			// echo "<pre>";print_r($requestData);die;
			$data = $this->Usersmodel->action($requestData);

			if(isset($requestData['reason']) && $requestData['reason'] !=''){
				$diarydata = $this->Diarymodel->action(['adminid' => $userid, 'user_id' => $data]+$requestData);
			}
			
			$this->userlist();
		}else{
			$this->userlist();
		}
	}
	
	function categorylist(){
		$this->checksessionout();
		$this->checkUserPermission('13', '1', '1');
		$data["header_title"]=$this->category_title;
		$data["header_title2"]=$this->category_title2;
		$data["leftsidebar_value"]=$this->category_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_category($condition);	

		$checkpermission    = $this->checkUserPermission('13', '2');
    	$data["permission"] = $checkpermission;	
		$this->allpage('categorylist',$data);
	}
	function newcategory(){
		$this->checksessionout();
		$this->checkUserPermission('13', '1', '1');
		$data["header_title"]=$this->category_title;
		$data["header_title2"]=$this->category_title2;
		$data["leftsidebar_value"]=$this->category_value;
		$data["action"]="new";		
		$checkpermission    = $this->checkUserPermission('13', '2');
    	$data["permission"] = $checkpermission;	
		$this->allpage('categoryaction',$data);
	}
	function editcategory(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$this->checkUserPermission('13', '1', '1');
		$data["header_title"]=$this->category_title;
		$data["header_title2"]=$this->category_title2;
		$data["leftsidebar_value"]=$this->category_value;
		$data["getdata"]=$this->adminmodel->getsingledata("category",$uid);
		$data["action"]="edit";		
		$checkpermission    = $this->checkUserPermission('13', '2');
    	$data["permission"] = $checkpermission;	
		$this->allpage('categoryaction',$data);
	}
	function deletecategory(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("category",$deleteid);		
		$this->categorylist();
	}
	function categoryaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("category","Category",'trim|required');			
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newcategory();
				}
				if($this->input->post("update")){
					$this->editcategory();
				}
			}		
			else{			
				
				$config_image=array();
				$config_image['upload_path']='./images';
				$config_image['allowed_types']='jpg|jpeg|png|pdf';
				$config_image['encrypt_name']=TRUE;
				$this->load->library('upload',$config_image);			
				if ( ! $this->upload->do_upload('imagefile'))
				{
					//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
				}
				else
				{
					$imagedata=$this->upload->data();
					$imagefile=$imagedata['file_name'];
				} 

				$config_image=array();
				$config_image['upload_path']='./images';
				$config_image['allowed_types']='jpg|jpeg|png|pdf';
				$config_image['encrypt_name']=TRUE;
				$this->load->library('upload',$config_image);			
				if ( ! $this->upload->do_upload('imagefile2'))
				{
					//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
				}
				else
				{
					$imagedata2=$this->upload->data();
					$imagefile2=$imagedata2['file_name'];
				} 				

				$data=array(
				"category" => $this->input->post("category"),
				"published" => $this->input->post("publishid")
				);

				if(isset($imagefile)){
					$data['image']=$imagefile;
				}

				if(isset($imagefile2)){
					$data['image2']=$imagefile2;
				}				
						
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("category",$data);
					$this->categorylist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("category",$data,$this->input->post("updateid"));
					$this->categorylist();
				}		
			}
		}
		else{			
			$this->categorylist();
		}
	}
	
	function locationlist(){
		$this->checksessionout();
		$this->checkUserPermission('14', '1', '1');
		$data["header_title"]=$this->location_title;
		$data["header_title2"]=$this->location_title2;
		$data["leftsidebar_value"]=$this->location_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_location($condition);	

		$checkpermission    = $this->checkUserPermission('14', '2');
    	$data["permission"] = $checkpermission;	
		$this->allpage('locationlist',$data);
	}
	function newlocation(){
		$this->checksessionout();
		$data["header_title"]=$this->location_title;
		$data["header_title2"]=$this->location_title2;
		$data["leftsidebar_value"]=$this->location_value;
		$data["action"]="new";		
		$this->allpage('locationaction',$data);
	}
	function editlocation(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->location_title;
		$data["header_title2"]=$this->location_title2;
		$data["leftsidebar_value"]=$this->location_value;
		$data["getdata"]=$this->adminmodel->getsingledata("location",$uid);
		$data["action"]="edit";		
		$this->allpage('locationaction',$data);
	}
	function deletelocation(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("location",$deleteid);		
		$this->locationlist();
	}
	function locationaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("location","location",'trim|required');			
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newlocation();
				}
				if($this->input->post("update")){
					$this->editlocation();
				}
			}		
			else{			
											
				$data=array(
				"location" => $this->input->post("location"),
				"published" => $this->input->post("publishid")
				);					
						
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("location",$data);
					$this->locationlist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("location",$data,$this->input->post("updateid"));
					$this->locationlist();
				}		
			}
		}
		else{			
			$this->locationlist();
		}
	}
	
	function toolboxtalkssublist(){
		$this->checksessionout();
		$data["header_title"]=$this->toolboxtalkssub_title;
		$data["header_title2"]=$this->toolboxtalkssub_title2;
		$data["leftsidebar_value"]=$this->toolboxtalkssub_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_toolboxtalkssub($condition);		
		$this->allpage('toolboxtalkssublist',$data);
	}
	function newtoolboxtalkssub(){
		$this->checksessionout();
		$data["header_title"]=$this->toolboxtalkssub_title;
		$data["header_title2"]=$this->toolboxtalkssub_title2;
		$data["leftsidebar_value"]=$this->toolboxtalkssub_value;
		$data["action"]="new";		
		$data["toolboxtalksdata"]=$this->adminmodel->getfulldata("toolboxtalks");
		$this->allpage('toolboxtalkssubaction',$data);
	}
	function edittoolboxtalkssub(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->toolboxtalkssub_title;
		$data["header_title2"]=$this->toolboxtalkssub_title2;
		$data["leftsidebar_value"]=$this->toolboxtalkssub_value;
		$data["getdata"]=$this->adminmodel->getsingledata("toolboxtalkssub",$uid);
		$data["action"]="edit";
		$data["toolboxtalksdata"]=$this->adminmodel->getfulldata("toolboxtalks");
		$this->allpage('toolboxtalkssubaction',$data);
	}
	function deletetoolboxtalkssub(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("toolboxtalkssub",$deleteid);		
		$this->toolboxtalkssublist();
	}
	function toolboxtalkssubaction(){ 
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("content","Content",'trim|required');
			$this->form_validation->set_rules("description","Description",'trim|required');
			$this->form_validation->set_rules("position","Position",'trim|required');
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newtoolboxtalkssub();
				}
				if($this->input->post("update")){
					$this->edittoolboxtalkssub();
				}
			}		
			else{			
				
				$config_image=array();
				$config_image['upload_path']='./images';
				$config_image['allowed_types']='jpg|jpeg|png|pdf';				
				$config_image['encrypt_name']=TRUE;
				$this->load->library('upload',$config_image);			
				if ( ! $this->upload->do_upload('imagefile'))
				{
					//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
				}
				else
				{
					$imagedata=$this->upload->data();
					$imagefile=$imagedata['file_name']; 
				} 
							
				$data=array(
				"content" => $this->input->post("content"),				
				"description" => $this->input->post("description"),				
				"position" => $this->input->post("position"),
				"toolboxtalksid" => $this->input->post("toolboxtalksid"),
				"published" => $this->input->post("publishid")
				);
					
				if(isset($imagefile)){
					$data['image']=$imagefile;
				}			
							
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("toolboxtalkssub",$data);
					$this->toolboxtalkssublist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("toolboxtalkssub",$data,$this->input->post("updateid"));
					$this->toolboxtalkssublist();
				}		
			}
		}
		else{			
			$this->toolboxtalkssublist();
		}
	}
	
	function plumbingafricalist(){
		$this->checksessionout();
		$this->checkUserPermission('2', '1', '1');
		$data["header_title"]=$this->plumbingafrica_title;
		$data["header_title2"]=$this->plumbingafrica_title2;
		$data["leftsidebar_value"]=$this->plumbingafrica_value;
		$checkpermission	=	$this->checkUserPermission('2', '2');
		$data["permission"] = $checkpermission;
		$data["getdata"]=$this->adminmodel->getdata_plumbingafrica();		
		$this->allpage('plumbingafricalist',$data);
	}
	function newplumbingafrica(){
		$this->checksessionout();
		$data["header_title"]=$this->plumbingafrica_title;
		$data["header_title2"]=$this->plumbingafrica_title2;
		$data["leftsidebar_value"]=$this->plumbingafrica_value;
		$data["action"]="new";		
		$this->allpage('plumbingafricaaction',$data);
	}
	function editplumbingafrica(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->plumbingafrica_title;
		$data["header_title2"]=$this->plumbingafrica_title2;
		$data["leftsidebar_value"]=$this->plumbingafrica_value;
		$data["getdata"]=$this->adminmodel->getsingledata("plumbingafrica",$uid);
		$data["action"]="edit";		
		$this->allpage('plumbingafricaaction',$data);
	}
	function deleteplumbingafrica(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("plumbingafrica",$deleteid);		
		$this->plumbingafricalist();
	}
	function plumbingafricaaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			
			$this->form_validation->set_rules("imagefile","Image",'required');
			if(empty($_FILES['imagefile']['name'])){  //$this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newplumbingafrica();
				}
				if($this->input->post("update")){
					$this->editplumbingafrica();
				}
			}		
			else{			
				
				$config_image=array();
				$config_image['upload_path']='./images';
				$config_image['allowed_types']='jpg|jpeg|png|pdf';
				$config_image['encrypt_name']=TRUE;
				$this->load->library('upload',$config_image);			
				if ( ! $this->upload->do_upload('imagefile'))
				{
					//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
				}
				else
				{
					$imagedata=$this->upload->data();
					$imagefile=$imagedata['file_name'];
				} 
				
				if(isset($imagefile)){
					$data['image']=$imagefile;
				}			
							
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("plumbingafrica",$data);
					$this->plumbingafricalist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("plumbingafrica",$data,$this->input->post("updateid"));
					$this->plumbingafricalist();
				}		
			}
		}
		else{			
			$this->plumbingafricalist();
		}
	}
	
	function itemlist(){
		$this->checksessionout();
		$this->checkUserPermission('12', '1', '1');
		$data["header_title"]=$this->item_title;
		$data["header_title2"]=$this->item_title2;
		$data["leftsidebar_value"]=$this->item_value;		
		if(! $this->input->post("activeval")){ $condition="2"; } 
		else{ 
			if($this->input->post("activeval") == 1){
				$condition="1";
			}elseif($this->input->post("activeval") == 3){
				$condition="2";
			}else{
				$condition="0";
			}
		}		
		$userid=$this->session->userdata('userid');
		$data["getdata"]=$this->adminmodel->getdata_item($condition,$userid);

		$checkpermission    = $this->checkUserPermission('12', '2');
    	$data["permission"] = $checkpermission;		
		$this->allpage('itemlist',$data);
	}
	function newitem(){
		$this->checksessionout();
		$this->checkUserPermission('12', '1', '1');
		$data["header_title"]=$this->item_title;
		$data["header_title2"]=$this->item_title2;
		$data["leftsidebar_value"]=$this->item_value;
		$data["action"]="new";
		$data["categorydata"]=$this->adminmodel->getfulldata("category");
		$data["locationdata"]=$this->adminmodel->getfulldata("location");
		$checkpermission    = $this->checkUserPermission('12', '2');
    	$data["permission"] = $checkpermission;		
		$this->allpage('itemaction',$data);
	}
	function edititem(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$this->checkUserPermission('12', '1', '1');
		$data["header_title"]=$this->item_title;
		$data["header_title2"]=$this->item_title2;
		$data["leftsidebar_value"]=$this->item_value;
		$data["getdata"]=$this->adminmodel->getsingledata("item",$uid);
		$data["action"]="edit";
		$data["categorydata"]=$this->adminmodel->getfulldata("category");
		$data["locationdata"]=$this->adminmodel->getfulldata("location");
		$checkpermission    = $this->checkUserPermission('12', '2');
    	$data["permission"] = $checkpermission;				
		$this->allpage('itemaction',$data);
	}
	function deleteitem(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("item",$deleteid);		
		$this->itemlist();
	}
	function itemaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("cname","Name",'trim|required');
			$this->form_validation->set_rules("categoryid","Category",'trim|required');
			$this->form_validation->set_rules("locationid","Location",'trim|required');
			$this->form_validation->set_rules("cellphone","Cell Phone",'trim|required|numeric');
			$this->form_validation->set_rules("email","Email",'trim|required|valid_email');
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newitem();
				}
				if($this->input->post("update")){
					$this->edititem();
				}
			}		
			else{
				if (isset($_FILES) && $_FILES['imagefile']['name'][0]!='' && $_FILES['imagefile']['tmp_name'][0]!='') {
					define('UPLOAD_DIR', './images/');
					foreach ($_FILES['imagefile']['tmp_name'] as $key => $value) {
						$file_tmpname 	= $_FILES['imagefile']['tmp_name'][$key];
						$file_ext 		= explode('.', $_FILES['imagefile']['name'][$key]);
            			$file_name 		= uniqid(); 
            			$filepath 		= UPLOAD_DIR . $file_name . '.'.$file_ext[1].'';
            			if(move_uploaded_file($file_tmpname, $filepath)){
            				$imagefile[] = $file_name.'.'.$file_ext[1];
            			}
					}
					$imagename = implode(',', $imagefile);
					
				}else{
					$imagename = $this->input->post("itemimghidden");
				}
				// if(isset($imagefile) && is_array($imagefile)){
				// 	echo "hiii";die;
				// }
				// $config_image=array();
				// $config_image['upload_path']='./images';
				// $config_image['allowed_types']='jpg|jpeg|png';
				// $config_image['encrypt_name']=TRUE;
				// $this->load->library('upload',$config_image);			
				// if ( ! $this->upload->do_upload('imagefile'))
				// {
				// 	//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
				// }
				// else
				// {
				// 	$imagedata=$this->upload->data();
				// 	$imagefile=$imagedata['file_name'];
				// } 
							
				$data=array(
				"name" => $this->input->post("cname"),
				// "uid" => $this->session->userdata('userid'),
				"uid" => $this->input->post("udid"),
				"categoryid" => $this->input->post("categoryid"),
				"locationid" => $this->input->post("locationid"),				
				"description" => $this->input->post("description"),				
				"contactname" => $this->input->post("contactname"),
				"email" => $this->input->post("email"),
				"cellphone" => $this->input->post("cellphone"),
				"price" => $this->input->post("price"),
				// "manufacturerbrand" => $this->input->post("manufacturerbrand"),
				// "address" => $this->input->post("address"),
				"active" => $this->input->post("active"),
				'image' => $imagename
				);
					
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("item",$data);
					$this->itemlist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("item",$data,$this->input->post("updateid"));
					$this->itemlist();
				}		
			}
		}
		else{			
			$this->itemlist();
		}
	}
	
	function homeimagelist(){
		$this->checksessionout();
		$data["header_title"]=$this->homeimage_title;
		$data["header_title2"]=$this->homeimage_title2;
		$data["leftsidebar_value"]=$this->homeimage_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_homeimage($condition);		
		$this->allpage('homeimagelist',$data);
	}
	function newhomeimage(){
		$this->checksessionout();
		$data["header_title"]=$this->homeimage_title;
		$data["header_title2"]=$this->homeimage_title2;
		$data["leftsidebar_value"]=$this->homeimage_value;
		$data["action"]="new";		
		$this->allpage('homeimageaction',$data);
	}
	function edithomeimage(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->homeimage_title;
		$data["header_title2"]=$this->homeimage_title2;
		$data["leftsidebar_value"]=$this->homeimage_value;
		$data["getdata"]=$this->adminmodel->getsingledata("homeimage",$uid);
		$data["action"]="edit";		
		$this->allpage('homeimageaction',$data);
	}
	function deletehomeimage(){
		$deleteid=$this->input->post("deleteid"); 
		$this->checksessionout();		
		$this->adminmodel->deletedata("homeimage",$deleteid);		
		$this->homeimagelist();
	}
	function homeimageaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			
			$this->form_validation->set_rules("imagefile","Image",'required');
			if(empty($_FILES['imagefile']['name'])){  //$this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newhomeimage();
				}
				if($this->input->post("update")){
					$this->edithomeimage();
				}
			}		
			else{					
								
				$config_image=array();
				$config_image['upload_path']='./images';
				$config_image['allowed_types']='jpg|jpeg|png|pdf';
				$config_image['encrypt_name']=TRUE;
				$this->load->library('upload',$config_image);
				
				if ( ! $this->upload->do_upload('imagefile'))
				{
					//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
				}
				else
				{
					$imagedata=$this->upload->data();
					$imagefile=$imagedata['file_name'];
					
				}
				
				
				$data=array();
				if(isset($imagefile)){
					$data['image']=$imagefile;
				}			
							
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("homeimage",$data);
					$this->homeimagelist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("homeimage",$data,$this->input->post("updateid"));
					$this->homeimagelist();
				}		
			}
		}
		else{			
			$this->homeimagelist();
		}
	}
	
	function webinarslist(){
		$this->checksessionout();
		$data["header_title"]=$this->webinars_title;
		$data["header_title2"]=$this->webinars_title2;
		$data["leftsidebar_value"]=$this->webinars_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_webinars($condition);		
		$this->allpage('webinarslist',$data);
	}
	function newwebinars(){
		$this->checksessionout();
		$data["header_title"]=$this->webinars_title;
		$data["header_title2"]=$this->webinars_title2;
		$data["leftsidebar_value"]=$this->webinars_value;
		$data["action"]="new";		
		$this->allpage('webinarsaction',$data);
	}
	function editwebinars(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->webinars_title;
		$data["header_title2"]=$this->webinars_title2;
		$data["leftsidebar_value"]=$this->webinars_value;
		$data["getdata"]=$this->adminmodel->getsingledata("webinars",$uid);
		$data["action"]="edit";		
		$this->allpage('webinarsaction',$data);
	}
	function deletewebinars(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("webinars",$deleteid);		
		$this->webinarslist();
	}
	function webinarsaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("title","title",'trim|required');			
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newwebinars();
				}
				if($this->input->post("update")){
					$this->editwebinars();
				}
			}		
			else{			
				
				$config_image=array();
				$config_image['upload_path']='./images';
				$config_image['allowed_types']='jpg|jpeg|png|pdf';
				$config_image['encrypt_name']=TRUE;
				$this->load->library('upload',$config_image);			
				if ( ! $this->upload->do_upload('imagefile'))
				{
					//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
				}
				else
				{
					$imagedata=$this->upload->data();
					$imagefile=$imagedata['file_name'];
				} 
				
				$data=array(
				"title" => $this->input->post("title"),
				"link" => $this->input->post("link"),
				"date" => date("Y-m-d", strtotime($this->input->post("date"))),
				"time" => $this->input->post("time"),
				"inactivedate" => date("Y-m-d", strtotime($this->input->post("inactivedate"))),
				"duration" => $this->input->post("duration"),
				"active" => $this->input->post("activeid")
				);					
				
				if(isset($imagefile)){
					$data['image']=$imagefile;
				}			
							
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("webinars",$data);
					$this->webinarslist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("webinars",$data,$this->input->post("updateid"));
					$this->webinarslist();
				}		
			}
		}
		else{			
			$this->webinarslist();
		}
	}
	
	function radiolist(){
		$this->checksessionout();
		$data["header_title"]=$this->radio_title;
		$data["header_title2"]=$this->radio_title2;
		$data["leftsidebar_value"]=$this->radio_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_radio($condition);		
		$this->allpage('radiolist',$data);
	}
	function newradio(){
		$this->checksessionout();
		$data["header_title"]=$this->radio_title;
		$data["header_title2"]=$this->radio_title2;
		$data["leftsidebar_value"]=$this->radio_value;
		$data["action"]="new";		
		$this->allpage('radioaction',$data);
	}
	function editradio(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->radio_title;
		$data["header_title2"]=$this->radio_title2;
		$data["leftsidebar_value"]=$this->radio_value;
		$data["getdata"]=$this->adminmodel->getsingledata("radio",$uid);
		$data["action"]="edit";		
		$this->allpage('radioaction',$data);
	}
	function deleteradio(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("radio",$deleteid);		
		$this->radiolist();
	}
	function radioaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("title","title",'trim|required');			
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newradio();
				}
				if($this->input->post("update")){
					$this->editradio();
				}
			}		
			else{			
				
				$config_image=array();
				$config_image['upload_path']='./images';
				$config_image['allowed_types']='jpg|jpeg|png|pdf';
				$config_image['encrypt_name']=TRUE;
				$this->load->library('upload',$config_image);			
				if ( ! $this->upload->do_upload('imagefile'))
				{
					//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
				}
				else
				{
					$imagedata=$this->upload->data();
					$imagefile=$imagedata['file_name'];
				} 
				
				if($this->input->post("livestreamlink")){ $livestreamlink = $this->input->post("livestreamlink") ;}else{ $livestreamlink = 0;}
				
				$data=array(
				"title" => $this->input->post("title"),
				"link" => $this->input->post("link"),
				"date" => date("Y-m-d", strtotime($this->input->post("date"))),
				"time" => $this->input->post("time"),
				"inactivedate" => date("Y-m-d", strtotime($this->input->post("inactivedate"))),
				"duration" => $this->input->post("duration"),
				"livestreamlink" => $livestreamlink,
				"active" => $this->input->post("activeid")
				);					
				
				if(isset($imagefile)){
					$data['image']=$imagefile;
				}			
							
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("radio",$data);
					$this->radiolist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("radio",$data,$this->input->post("updateid"));
					$this->radiolist();
				}		
			}
		}
		else{			
			$this->radiolist();
		}
	}
	
	function contactlist(){
		$this->checksessionout();
		$data["header_title"]=$this->contact_title;
		$data["header_title2"]=$this->contact_title2;
		$data["leftsidebar_value"]=$this->contact_value;						
		$data["getdata"]=$this->adminmodel->getdata_contact();		
		$this->allpage('contactlist',$data);
	}
	function newcontact(){
		$this->checksessionout();
		$data["header_title"]=$this->contact_title;
		$data["header_title2"]=$this->contact_title2;
		$data["leftsidebar_value"]=$this->contact_value;
		$data["action"]="new";				
		$this->allpage('contactaction',$data);
	}
	function editcontact(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->contact_title;
		$data["header_title2"]=$this->contact_title2;
		$data["leftsidebar_value"]=$this->contact_value;
		$data["getdata"]=$this->adminmodel->getsingledata("contact",$uid);
		$data["action"]="edit";		
		$this->allpage('contactaction',$data);
	}
	function deletecontact(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("contact",$deleteid);		
		$this->contactlist();
	}
	function contactaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("name","Name",'trim|required');
			$this->form_validation->set_rules("email","Email",'trim|required');			
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newcontact();
				}
				if($this->input->post("update")){
					$this->editcontact();
				}
			}		
			else{			
				
							
				$data=array(
				"name" => $this->input->post("name"),				
				"email" => $this->input->post("email"),
				"mobile" => $this->input->post("mobile"),
				"address" => $this->input->post("address"),
				"message" => $this->input->post("message")
				);					
							
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("contact",$data);
					$this->contactlist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("contact",$data,$this->input->post("updateid"));
					$this->contactlist();
				}		
			}
		}
		else{			
			$this->contactlist();
		}
	}

	//IOPSA membership fees
	function iopsa_membershipfeeslist(){
		$this->checksessionout();
		$this->checkUserPermission('16', '1', '1');
		$data["header_title"]=$this->iopsa_membershipfees_title;
		$data["header_title2"]=$this->iopsa_membershipfees_title2;
		$data["leftsidebar_value"]=$this->iopsa_membershipfees_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_iopsa_membershipfees($condition);	

		$checkpermission    = $this->checkUserPermission('16', '2');
    	$data["permission"] = $checkpermission;	
		$this->allpage('iopsa_membershipfeeslist',$data);
	}
	function newiopsa_membershipfees(){
		$this->checksessionout();
		$this->checkUserPermission('16', '1', '1');
		$data["header_title"]=$this->iopsa_membershipfees_title;
		$data["header_title2"]=$this->iopsa_membershipfees_title2;
		$data["leftsidebar_value"]=$this->iopsa_membershipfees_value;
		$data["action"]="new";		
		$checkpermission    = $this->checkUserPermission('16', '2');
    	$data["permission"] = $checkpermission;	
		$this->allpage('iopsa_membershipfeesaction',$data);
	}
	function editiopsa_membershipfees(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$this->checkUserPermission('16', '1', '1');
		$data["header_title"]=$this->iopsa_membershipfees_title;
		$data["header_title2"]=$this->iopsa_membershipfees_title2;
		$data["leftsidebar_value"]=$this->iopsa_membershipfees_value;
		$data["getdata"]=$this->adminmodel->getsingledata("iopsa_membershipfees",$uid);
		$data["action"]="edit";		
		$checkpermission    = $this->checkUserPermission('16', '2');
    	$data["permission"] = $checkpermission;	
		$this->allpage('iopsa_membershipfeesaction',$data);
	}
	function deleteiopsa_membershipfees(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("iopsa_membershipfees",$deleteid);		
		$this->iopsa_membershipfeeslist();
	}
	function iopsa_membershipfeesaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			// $this->form_validation->set_rules("imagefile","Image",'trim|required');
			$this->form_validation->set_rules("associate_annual","associate_annual",'trim|required');
			$this->form_validation->set_rules("associate_monthly","associate_monthly",'trim|required');
			$this->form_validation->set_rules("plumbing_reg_annual","plumbing_reg_annual",'trim|required');
			$this->form_validation->set_rules("plumbing_reg_monthly","plumbing_reg_monthly",'trim|required');
			$this->form_validation->set_rules("plumbing_nat_annual","plumbing_nat_annual",'trim|required');
			$this->form_validation->set_rules("merchant_reg_annual","merchant_reg_annual",'trim|required');
			$this->form_validation->set_rules("merchant_reg_monthly","merchant_reg_monthly",'trim|required');
			$this->form_validation->set_rules("merchant_nat_annual","merchant_nat_annual",'trim|required');
			$this->form_validation->set_rules("manufacturer_reg_annual","manufacturer_reg_annual",'trim|required');
			$this->form_validation->set_rules("manufacturer_reg_monthly","manufacturer_reg_monthly",'trim|required');
			$this->form_validation->set_rules("manufacturer_nat_annual","manufacturer_nat_annual",'trim|required');	
			$this->form_validation->set_rules("downloadlink","downloadlink",'trim|required');
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newiopsa_membershipfees();
				}
				if($this->input->post("update")){
					$this->editiopsa_membershipfees();
				}
			}		
			else{	
											
				$data=array(
				"associate_annual" => $this->input->post("associate_annual"),
				"associate_monthly" => $this->input->post("associate_monthly"),
				"plumbing_reg_annual" => $this->input->post("plumbing_reg_annual"),
				"plumbing_reg_monthly" => $this->input->post("plumbing_reg_monthly"),
				"plumbing_nat_annual" => $this->input->post("plumbing_nat_annual"),
				"merchant_reg_annual" => $this->input->post("merchant_reg_annual"),
				"merchant_reg_monthly" => $this->input->post("merchant_reg_monthly"),
				"merchant_nat_annual" => $this->input->post("merchant_nat_annual"),
				"manufacturer_reg_annual" => $this->input->post("manufacturer_reg_annual"),
				"manufacturer_reg_monthly" => $this->input->post("manufacturer_reg_monthly"),
				"manufacturer_nat_annual" => $this->input->post("manufacturer_nat_annual"),
				"downloadlink" => $this->input->post("downloadlink")				
				);	

				
				if(!empty($_FILES['imagefile']['name'])){
					$config_image=array();
					$config_image['upload_path']='./images';
					$config_image['allowed_types']='jpg|jpeg|png|pdf';
					$config_image['encrypt_name']=TRUE;
					$this->load->library('upload',$config_image);
					
					if ( ! $this->upload->do_upload('imagefile'))
					{
						//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
					}
					else
					{
						$imagedata=$this->upload->data();
						$imagefile=$imagedata['file_name'];
						
					}	

					$data['image']=$imagefile;
				}	

				

				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("iopsa_membershipfees",$data);
					$this->iopsa_membershipfeeslist();
				}			
				if($this->input->post("update")){
					$updatedid = $this->input->post("updateid");
					$this->adminmodel->updatedata("iopsa_membershipfees",$data,$updatedid);
					// $str = $this->db->last_query();
					// print_r($str); exit(0);
					$this->iopsa_membershipfeeslist();
				}		
			}
		}
		else{			
			$this->iopsa_membershipfeeslist();
		}
	}

	//IOPSA Home page content
	function iopsa_homepagelist(){
		$this->checksessionout();
		$this->checkUserPermission('15', '1', '1');
		$data["header_title"]=$this->iopsa_homepage_title;
		$data["header_title2"]=$this->iopsa_homepage_title2;
		$data["leftsidebar_value"]=$this->iopsa_homepage_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_iopsa_homepage($condition);	

		$checkpermission    = $this->checkUserPermission('15', '2');
    	$data["permission"] = $checkpermission;	
		$this->allpage('iopsa_homepagelist',$data);
	}
	function newiopsa_homepage(){
		$this->checksessionout();
		$data["header_title"]=$this->iopsa_homepage_title;
		$data["header_title2"]=$this->iopsa_homepage_title2;
		$data["leftsidebar_value"]=$this->iopsa_homepage_value;
		$data["action"]="new";		
		$this->allpage('iopsa_homepageaction',$data);
	}
	function editiopsa_homepage(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->iopsa_homepage_title;
		$data["header_title2"]=$this->iopsa_homepage_title2;
		$data["leftsidebar_value"]=$this->iopsa_homepage_value;
		$data["getdata"]=$this->adminmodel->getsingledata("iopsa_homepage",$uid);
		$data["action"]="edit";		
		$this->allpage('iopsa_homepageaction',$data);
	}
	function deleteiopsa_homepage(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("iopsa_homepage",$deleteid);		
		$this->iopsa_homepagelist();
	}
	function iopsa_homepageaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("content","content",'trim|required');			
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newiopsa_homepage();
				}
				if($this->input->post("update")){
					$this->editiopsa_homepage();
				}
			}		
			else{			
											
				$data=array(
				"content" => $this->input->post("content")
				);					
						
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("iopsa_homepage",$data);
					$this->iopsa_homepagelist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("iopsa_homepage",$data,$this->input->post("updateid"));
					$this->iopsa_homepagelist();
				}		
			}
		}
		else{			
			$this->iopsa_homepagelist();
		}
	}

	//iopsa contact us
	function iopsa_contactuslist(){
		$this->checksessionout();
		$this->checkUserPermission('17', '1', '1');
		$data["header_title"]=$this->iopsa_contactus_title;
		$data["header_title2"]=$this->iopsa_contactus_title2;
		$data["leftsidebar_value"]=$this->iopsa_contactus_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_iopsa_contactus($condition);	

		$checkpermission    = $this->checkUserPermission('17', '2');
    	$data["permission"] = $checkpermission;	
		$this->allpage('iopsa_contactuslist',$data);
	}
	function newiopsa_contactus(){
		$this->checksessionout();
		$data["header_title"]=$this->iopsa_contactus_title;
		$data["header_title2"]=$this->iopsa_contactus_title2;
		$data["leftsidebar_value"]=$this->iopsa_contactus_value;
		$data["action"]="new";		
		$this->allpage('iopsa_contactusaction',$data);
	}
	function editiopsa_contactus(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->iopsa_contactus_title;
		$data["header_title2"]=$this->iopsa_contactus_title2;
		$data["leftsidebar_value"]=$this->iopsa_contactus_value;
		$data["getdata"]=$this->adminmodel->getsingledata("iopsa_contactus",$uid);
		$data["action"]="edit";		
		$this->allpage('iopsa_contactusaction',$data);
	}
	function viewiopsa_contactus(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->iopsa_contactus_title;
		$data["header_title2"]=$this->iopsa_contactus_title2;
		$data["leftsidebar_value"]=$this->iopsa_contactus_value;
		$data["getdata"]=$this->adminmodel->getsingledata("iopsa_contactus",$uid);
		$data["action"]="view";		
		$this->allpage('iopsa_contactusaction',$data);
	}
	function deleteiopsa_contactus(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("iopsa_contactus",$deleteid);		
		$this->iopsa_contactuslist();
	}
	function iopsa_contactusaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("name","Name",'trim|required');
			$this->form_validation->set_rules("email","Email",'trim|required');
			$this->form_validation->set_rules("message","Message",'trim|required');			
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newiopsa_contactus();
				}
				if($this->input->post("update")){
					$this->editiopsa_contactus();
				}
			}		
			else{			
											
				$data=array(
				"name" => $this->input->post("name"),
				"email" => $this->input->post("email"),
				"message" => $this->input->post("message")
				);					
						
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("iopsa_contactus",$data);
					$this->iopsa_contactuslist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("iopsa_contactus",$data,$this->input->post("updateid"));
					$this->iopsa_contactuslist();
				}		
			}
		}
		else{			
			$this->iopsa_contactuslist();
		}
	}

	//iopsa address us
	function iopsa_addresslist(){
		$this->checksessionout();
		$this->checkUserPermission('34', '1', '1');
		$data["header_title"]=$this->iopsa_address_title;
		$data["header_title2"]=$this->iopsa_address_title2;
		$data["leftsidebar_value"]=$this->iopsa_address_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_iopsa_address($condition);		
		$checkpermission    = $this->checkUserPermission('34', '2');
    	$data["permission"] = $checkpermission;
		$this->allpage('iopsa_addresslist',$data);
	}
	function newiopsa_address(){
		$this->checksessionout();
		$data["header_title"]=$this->iopsa_address_title;
		$data["header_title2"]=$this->iopsa_address_title2;
		$data["leftsidebar_value"]=$this->iopsa_address_value;
		$data["action"]="new";		
		$this->allpage('iopsa_addressaction',$data);
	}
	function editiopsa_address(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->iopsa_address_title;
		$data["header_title2"]=$this->iopsa_address_title2;
		$data["leftsidebar_value"]=$this->iopsa_address_value;
		$data["getdata"]=$this->adminmodel->getsingledata("iopsa_address",$uid);
		$data["action"]="edit";		
		$this->allpage('iopsa_addressaction',$data);
	}
	function deleteiopsa_address(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("iopsa_address",$deleteid);		
		$this->iopsa_addresslist();
	}
	function iopsa_addressaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("telephone","Telephone",'trim|required');
			$this->form_validation->set_rules("fax","Fax",'trim|required');
			$this->form_validation->set_rules("email","Email",'trim|required');
			$this->form_validation->set_rules("address","Address",'trim|required');			
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newiopsa_address();
				}
				if($this->input->post("update")){
					$this->editiopsa_address();
				}
			}		
			else{			
											
				$data=array(
				"telephone" => $this->input->post("telephone"),
				"fax" => $this->input->post("fax"),
				"email" => $this->input->post("email"),
				"address" => $this->input->post("address")
				);					
						
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("iopsa_address",$data);
					$this->iopsa_addresslist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("iopsa_address",$data,$this->input->post("updateid"));
					$this->iopsa_addresslist();
				}		
			}
		}
		else{			
			$this->iopsa_addresslist();
		}
	}

	function iopsa_categorylist(){
		$this->checksessionout();
		$this->checkUserPermission('18', '1', '1');
		$data["header_title"]=$this->iopsa_category_title;
		$data["header_title2"]=$this->iopsa_category_title2;
		$data["leftsidebar_value"]=$this->iopsa_category_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_iopsa_category($condition);
		$checkpermission    = $this->checkUserPermission('18', '2');
    	$data["permission"] = $checkpermission;		
		$this->allpage('iopsa_categorylist',$data);
	}
	function newiopsa_category(){
		$this->checksessionout();
		$data["header_title"]=$this->iopsa_category_title;
		$data["header_title2"]=$this->iopsa_category_title2;
		$data["leftsidebar_value"]=$this->iopsa_category_value;
		$data["action"]="new";		
		$this->allpage('iopsa_categoryaction',$data);
	}
	function editiopsa_category(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->iopsa_category_title;
		$data["header_title2"]=$this->iopsa_category_title2;
		$data["leftsidebar_value"]=$this->iopsa_category_value;
		$data["getdata"]=$this->adminmodel->getsingledata("iopsa_category",$uid);
		$data["action"]="edit";		
		$this->allpage('iopsa_categoryaction',$data);
	}
	function deleteiopsa_category(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("iopsa_category",$deleteid);		
		$this->iopsa_categorylist();
	}
	function iopsa_categoryaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("category","Category",'trim|required');			
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newiopsa_category();
				}
				if($this->input->post("update")){
					$this->editiopsa_category();
				}
			}		
			else{			
											
				$data=array(
				"category" => $this->input->post("category"),
				"published" => $this->input->post("publishid")
				);					
						
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("iopsa_category",$data);
					$this->iopsa_categorylist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("iopsa_category",$data,$this->input->post("updateid"));
					$this->iopsa_categorylist();
				}		
			}
		}
		else{			
			$this->iopsa_categorylist();
		}
	}

	function iopsa_provincelist(){
		$this->checksessionout();
		$this->checkUserPermission('35', '1', '1');
		$data["header_title"]=$this->iopsa_province_title;
		$data["header_title2"]=$this->iopsa_province_title2;
		$data["leftsidebar_value"]=$this->iopsa_province_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_iopsa_province($condition);	
		$checkpermission    = $this->checkUserPermission('35', '2');
    	$data["permission"] = $checkpermission;	
		$this->allpage('iopsa_provincelist',$data);
	}
	function newiopsa_province(){
		$this->checksessionout();
		$data["header_title"]=$this->iopsa_province_title;
		$data["header_title2"]=$this->iopsa_province_title2;
		$data["leftsidebar_value"]=$this->iopsa_province_value;
		$data["action"]="new";		
		$this->allpage('iopsa_provinceaction',$data);
	}
	function editiopsa_province(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->iopsa_province_title;
		$data["header_title2"]=$this->iopsa_province_title2;
		$data["leftsidebar_value"]=$this->iopsa_province_value;
		$data["getdata"]=$this->adminmodel->getsingledata("iopsa_province",$uid);
		$data["action"]="edit";		
		$this->allpage('iopsa_provinceaction',$data);
	}
	function deleteiopsa_province(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("iopsa_province",$deleteid);		
		$this->iopsa_provincelist();
	}
	function iopsa_provinceaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("province","province",'trim|required');			
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newiopsa_province();
				}
				if($this->input->post("update")){
					$this->editiopsa_province();
				}
			}		
			else{			
											
				$data=array(
				"province" => $this->input->post("province"),
				"published" => $this->input->post("publishid")
				);					
						
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("iopsa_province",$data);
					$this->iopsa_provincelist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("iopsa_province",$data,$this->input->post("updateid"));
					$this->iopsa_provincelist();
				}		
			}
		}
		else{			
			$this->iopsa_provincelist();
		}
	}

	function iopsa_memberlist(){
		$this->checksessionout();
		$this->checkUserPermission('19', '1', '1');
		$data["header_title"]=$this->iopsa_member_title;
		$data["header_title2"]=$this->iopsa_member_title2;
		$data["leftsidebar_value"]=$this->iopsa_member_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_iopsa_member($condition);	

		$checkpermission    = $this->checkUserPermission('19', '2');
    	$data["permission"] = $checkpermission;	
		$this->allpage('iopsa_memberlist',$data);
	}
	function newiopsa_member(){
		$this->checksessionout();
		$this->checkUserPermission('19', '1', '1');
		$data["header_title"]=$this->iopsa_member_title;
		$data["header_title2"]=$this->iopsa_member_title2;
		$data["leftsidebar_value"]=$this->iopsa_member_value;
		$data["action"]="new";		
		$data["categorydata"]=$this->adminmodel->getfulldata("iopsa_category");
		$data["provincedata"]=$this->adminmodel->getfulldata("iopsa_province");
		$checkpermission    = $this->checkUserPermission('19', '2');
    	$data["permission"] = $checkpermission;	
		$this->allpage('iopsa_memberaction',$data);
	}
	function editiopsa_member(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$this->checkUserPermission('19', '1', '1');
		$data["header_title"]=$this->iopsa_member_title;
		$data["header_title2"]=$this->iopsa_member_title2;
		$data["leftsidebar_value"]=$this->iopsa_member_value;
		$data["getdata"]=$this->adminmodel->getsingledata("iopsa_member",$uid);
		$data["action"]="edit";		
		$data["categorydata"]=$this->adminmodel->getfulldata("iopsa_category");
		$data["provincedata"]=$this->adminmodel->getfulldata("iopsa_province");
		$checkpermission    = $this->checkUserPermission('19', '2');
    	$data["permission"] = $checkpermission;	
		$this->allpage('iopsa_memberaction',$data);
	}
	function deleteiopsa_member(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("iopsa_member",$deleteid);		
		$this->iopsa_memberlist();
	}
	function iopsa_memberaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("name","Name",'trim|required');
			$this->form_validation->set_rules("email","Email",'trim|required');
			$this->form_validation->set_rules("cellphone","Cellphone",'trim|required');
			$this->form_validation->set_rules("categoryid","Category",'trim|required');
			$this->form_validation->set_rules("provinceid","Province",'trim|required');
			$this->form_validation->set_rules("message","Message",'trim|required');			
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newiopsa_member();
				}
				if($this->input->post("update")){
					$this->editiopsa_member();
				}
			}		
			else{			
											
				$data=array(
				"name" => $this->input->post("name"),
				"email" => $this->input->post("email"),
				"cellphone" => $this->input->post("cellphone"),
				"categoryid" => $this->input->post("categoryid"),
				"provinceid" => $this->input->post("provinceid"),
				"published" => $this->input->post("publishid"),
				"message" => $this->input->post("message")
				);
				
						
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("iopsa_member",$data);
					$this->iopsa_memberlist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("iopsa_member",$data,$this->input->post("updateid"));
					$this->iopsa_memberlist();
				}		
			}
		}
		else{			
			$this->iopsa_memberlist();
		}
	}

	function iopsa_aimscontentlist(){
		$this->checksessionout();
		$this->checkUserPermission('20', '1', '1');
		$data["header_title"]=$this->iopsa_aimscontent_title;
		$data["header_title2"]=$this->iopsa_aimscontent_title2;
		$data["leftsidebar_value"]=$this->iopsa_aimscontent_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_iopsa_aimscontent($condition);

		$checkpermission    = $this->checkUserPermission('20', '2');
    	$data["permission"] = $checkpermission;		
		$this->allpage('iopsa_aimscontentlist',$data);
	}
	function newiopsa_aimscontent(){
		$this->checksessionout();
		$this->checkUserPermission('20', '1', '1');
		$data["header_title"]=$this->iopsa_aimscontent_title;
		$data["header_title2"]=$this->iopsa_aimscontent_title2;
		$data["leftsidebar_value"]=$this->iopsa_aimscontent_value;
		$data["action"]="new";		
		$checkpermission    = $this->checkUserPermission('20', '2');
    	$data["permission"] = $checkpermission;	
		$this->allpage('iopsa_aimscontentaction',$data);
	}
	function editiopsa_aimscontent(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$this->checkUserPermission('20', '1', '1');
		$data["header_title"]=$this->iopsa_aimscontent_title;
		$data["header_title2"]=$this->iopsa_aimscontent_title2;
		$data["leftsidebar_value"]=$this->iopsa_aimscontent_value;
		$data["getdata"]=$this->adminmodel->getsingledata("iopsa_aimscontent",$uid);
		$data["action"]="edit";		
		$checkpermission    = $this->checkUserPermission('20', '2');
    	$data["permission"] = $checkpermission;	
		$this->allpage('iopsa_aimscontentaction',$data);
	}
	function deleteiopsa_aimscontent(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("iopsa_aimscontent",$deleteid);		
		$this->iopsa_aimscontentlist();
	}
	function iopsa_aimscontentaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("content","content",'trim|required');	
			$this->form_validation->set_rules("vision","vision",'trim|required');
			$this->form_validation->set_rules("mission","mission",'trim|required');
			$this->form_validation->set_rules("objectives","objectives",'trim|required');	
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newiopsa_aimscontent();
				}
				if($this->input->post("update")){
					$this->editiopsa_aimscontent();
				}
			}		
			else{			
					//echo "<pre>";print_r($this->input->post());die;
				$data=array(
				"content" => $this->input->post("content"),
				"vision" => $this->input->post("vision"),
				"mission" => $this->input->post("mission"),
				"objectives" => $this->input->post("objectives"),
				"published" => $this->input->post("publishid")
				);					
						
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("iopsa_aimscontent",$data);
					$this->iopsa_aimscontentlist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("iopsa_aimscontent",$data,$this->input->post("updateid"));
					$this->iopsa_aimscontentlist();
				}		
			}
		}
		else{			
			$this->iopsa_aimscontentlist();
		}
	}

	function iopsa_aimsimagelist(){
		$this->checksessionout();
		$this->checkUserPermission('21', '1', '1');
		$data["header_title"]=$this->iopsa_aimsimage_title;
		$data["header_title2"]=$this->iopsa_aimsimage_title2;
		$data["leftsidebar_value"]=$this->iopsa_aimsimage_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_iopsa_aimsimage($condition);		

		$checkpermission    = $this->checkUserPermission('21', '2');
    	$data["permission"] = $checkpermission;
		$this->allpage('iopsa_aimsimagelist',$data);
	}
	function newiopsa_aimsimage(){
		$this->checksessionout();
		$data["header_title"]=$this->iopsa_aimsimage_title;
		$data["header_title2"]=$this->iopsa_aimsimage_title2;
		$data["leftsidebar_value"]=$this->iopsa_aimsimage_value;
		$data["action"]="new";		
		$this->allpage('iopsa_aimsimageaction',$data);
	}
	function editiopsa_aimsimage(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->iopsa_aimsimage_title;
		$data["header_title2"]=$this->iopsa_aimsimage_title2;
		$data["leftsidebar_value"]=$this->iopsa_aimsimage_value;
		$data["getdata"]=$this->adminmodel->getsingledata("iopsa_aimsimage",$uid);
		$data["action"]="edit";		
		$this->allpage('iopsa_aimsimageaction',$data);
	}
	function deleteiopsa_aimsimage(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("iopsa_aimsimage",$deleteid);		
		$this->iopsa_aimsimagelist();
	}	

	function iopsa_aimsimageaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			
			$this->form_validation->set_rules("imagefile","Image",'required');
			if(empty($_FILES['imagefile']['name'])){  //$this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newiopsa_aimsimage();
				}
				if($this->input->post("update")){
					// $this->editiopsa_aimsimage();
					$data=array();
					$data['published']=$this->input->post("publishid");
					if($this->input->post("update")){
						$this->adminmodel->updatedata("iopsa_aimsimage",$data,$this->input->post("updateid"));
						$this->iopsa_aimsimagelist();
					}

				}
			}		
			else{					
								
				$config_image=array();
				$config_image['upload_path']='./images';
				$config_image['allowed_types']='jpg|jpeg|png|pdf';
				$config_image['encrypt_name']=TRUE;
				$this->load->library('upload',$config_image);
				
				if ( ! $this->upload->do_upload('imagefile'))
				{
					//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
				}
				else
				{
					$imagedata=$this->upload->data();
					$imagefile=$imagedata['file_name'];
					
				}
				
				
				$data=array();
				if(isset($imagefile)){
					$data['image']=$imagefile;
				}	

				$data['published']=$this->input->post("publishid");	
							
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("iopsa_aimsimage",$data);
					$this->iopsa_aimsimagelist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("iopsa_aimsimage",$data,$this->input->post("updateid"));
					$this->iopsa_aimsimagelist();
				}		
			}
		}
		else{			
			$this->iopsa_aimsimagelist();
		}
	}

	function iopsa_settingslist(){
		$this->checksessionout();
		$this->checkUserPermission('36', '1', '1');
		$data["header_title"]=$this->iopsa_settings_title;
		$data["header_title2"]=$this->iopsa_settings_title2;
		$data["leftsidebar_value"]=$this->iopsa_settings_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_iopsa_settings($condition);		
		$checkpermission    = $this->checkUserPermission('36', '2');
    	$data["permission"] = $checkpermission;
		$this->allpage('iopsa_settingslist',$data);
	}
	function newiopsa_settings(){
		$this->checksessionout();
		$data["header_title"]=$this->iopsa_settings_title;
		$data["header_title2"]=$this->iopsa_settings_title2;
		$data["leftsidebar_value"]=$this->iopsa_settings_value;
		$data["action"]="new";		
		$this->allpage('iopsa_settingsaction',$data);
	}
	function editiopsa_settings(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->iopsa_settings_title;
		$data["header_title2"]=$this->iopsa_settings_title2;
		$data["leftsidebar_value"]=$this->iopsa_settings_value;
		$data["getdata"]=$this->adminmodel->getsingledata("iopsa_settings",$uid);
		$data["action"]="edit";		
		$this->allpage('iopsa_settingsaction',$data);
	}
	function deleteiopsa_settings(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("iopsa_settings",$deleteid);		
		$this->iopsa_settingslist();
	}
	function iopsa_settingsaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("email","email",'trim|required');			
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newiopsa_settings();
				}
				if($this->input->post("update")){
					$this->editiopsa_settings();
				}
			}		
			else{			
											
				$data=array(
				"email" => $this->input->post("email"),
				"published" => $this->input->post("publishid")
				);					
						
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("iopsa_settings",$data);
					$this->iopsa_settingslist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("iopsa_settings",$data,$this->input->post("updateid"));
					$this->iopsa_settingslist();
				}		
			}
		}
		else{			
			$this->iopsa_settingslist();
		}
	}

	function pirb_aboutcontentlist(){
		$this->checksessionout();
		$this->checkUserPermission('22', '1', '1');
		$data["header_title"]=$this->pirb_aboutcontent_title;
		$data["header_title2"]=$this->pirb_aboutcontent_title2;
		$data["leftsidebar_value"]=$this->pirb_aboutcontent_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_pirb_aboutcontent($condition);	
		$checkpermission    = $this->checkUserPermission('22', '2');
    	$data["permission"] = $checkpermission;	
		$this->allpage('pirb_aboutcontentlist',$data);
	}
	function newpirb_aboutcontent(){
		$this->checksessionout();
		$this->checkUserPermission('22', '1', '1');
		$data["header_title"]=$this->pirb_aboutcontent_title;
		$data["header_title2"]=$this->pirb_aboutcontent_title2;
		$data["leftsidebar_value"]=$this->pirb_aboutcontent_value;
		$data["action"]="new";		
		$checkpermission    = $this->checkUserPermission('22', '2');
    	$data["permission"] = $checkpermission;	
		$this->allpage('pirb_aboutcontentaction',$data);
	}
	function editpirb_aboutcontent(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$this->checkUserPermission('22', '1', '1');
		$data["header_title"]=$this->pirb_aboutcontent_title;
		$data["header_title2"]=$this->pirb_aboutcontent_title2;
		$data["leftsidebar_value"]=$this->pirb_aboutcontent_value;
		$data["getdata"]=$this->adminmodel->getsingledata("pirb_aboutcontent",$uid);
		$data["action"]="edit";		
		$checkpermission    = $this->checkUserPermission('22', '2');
    	$data["permission"] = $checkpermission;	
		$this->allpage('pirb_aboutcontentaction',$data);
	}
	function deletepirb_aboutcontent(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("pirb_aboutcontent",$deleteid);		
		$this->pirb_aboutcontentlist();
	}
	function pirb_aboutcontentaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("content1","content1",'trim|required');	
			$this->form_validation->set_rules("content2","content2",'trim|required');
			$this->form_validation->set_rules("content3","content3",'trim|required');	
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newpirb_aboutcontent();
				}
				if($this->input->post("update")){
					$this->editpirb_aboutcontent();
				}
			}		
			else{			
											
				$data=array(
				"content1" => $this->input->post("content1"),
				"content2" => $this->input->post("content2"),
				"content3" => $this->input->post("content3"),
				"published" => $this->input->post("publishid")
				);					
						
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("pirb_aboutcontent",$data);
					$this->pirb_aboutcontentlist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("pirb_aboutcontent",$data,$this->input->post("updateid"));
					$this->pirb_aboutcontentlist();
				}		
			}
		}
		else{			
			$this->pirb_aboutcontentlist();
		}
	}

	function pirb_aboutimagelist(){
		$this->checksessionout();
		$this->checkUserPermission('23', '1', '1');
		$data["header_title"]=$this->pirb_aboutimage_title;
		$data["header_title2"]=$this->pirb_aboutimage_title2;
		$data["leftsidebar_value"]=$this->pirb_aboutimage_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_pirb_aboutimage($condition);		
		$checkpermission    = $this->checkUserPermission('23', '2');
    	$data["permission"] = $checkpermission;
		$this->allpage('pirb_aboutimagelist',$data);
	}
	function newpirb_aboutimage(){
		$this->checksessionout();
		$data["header_title"]=$this->pirb_aboutimage_title;
		$data["header_title2"]=$this->pirb_aboutimage_title2;
		$data["leftsidebar_value"]=$this->pirb_aboutimage_value;
		$data["action"]="new";		
		$this->allpage('pirb_aboutimageaction',$data);
	}
	function editpirb_aboutimage(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->pirb_aboutimage_title;
		$data["header_title2"]=$this->pirb_aboutimage_title2;
		$data["leftsidebar_value"]=$this->pirb_aboutimage_value;
		$data["getdata"]=$this->adminmodel->getsingledata("pirb_aboutimage",$uid);
		$data["action"]="edit";		
		$this->allpage('pirb_aboutimageaction',$data);
	}
	function deletepirb_aboutimage(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("pirb_aboutimage",$deleteid);		
		$this->pirb_aboutimagelist();
	}	

	function pirb_aboutimageaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			
			$this->form_validation->set_rules("imagefile","Image",'required');
			if(empty($_FILES['imagefile']['name'])){  //$this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newpirb_aboutimage();
				}
				if($this->input->post("update")){
					// $this->editpirb_aboutimage();
					$data=array();
					$data['published']=$this->input->post("publishid");
					if($this->input->post("update")){
						$this->adminmodel->updatedata("pirb_aboutimage",$data,$this->input->post("updateid"));
						$this->pirb_aboutimagelist();
					}

				}
			}		
			else{					
								
				$config_image=array();
				$config_image['upload_path']='./images';
				$config_image['allowed_types']='jpg|jpeg|png|pdf';
				$config_image['encrypt_name']=TRUE;
				$this->load->library('upload',$config_image);
				
				if ( ! $this->upload->do_upload('imagefile'))
				{
					//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
				}
				else
				{
					$imagedata=$this->upload->data();
					$imagefile=$imagedata['file_name'];
					
				}
				
				
				$data=array();
				if(isset($imagefile)){
					$data['image']=$imagefile;
				}	

				$data['published']=$this->input->post("publishid");	
							
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("pirb_aboutimage",$data);
					$this->pirb_aboutimagelist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("pirb_aboutimage",$data,$this->input->post("updateid"));
					$this->pirb_aboutimagelist();
				}		
			}
		}
		else{			
			$this->pirb_aboutimagelist();
		}
	}

	function pirb_costlist(){
		$this->checksessionout();
		$this->checkUserPermission('26', '1', '1');
		$data["header_title"]=$this->pirb_cost_title;
		$data["header_title2"]=$this->pirb_cost_title2;
		$data["leftsidebar_value"]=$this->pirb_cost_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_pirb_cost($condition);	
		$checkpermission    = $this->checkUserPermission('26', '2');
    	$data["permission"] = $checkpermission;	
		$this->allpage('pirb_costlist',$data);
	}
	
	function pirblicensing(){
		$this->checksessionout();
		$this->checkUserPermission('27', '1', '1');
		$data["header_title"]=$this->pirb_licensing_title;
		$data["header_title2"]=$this->pirb_licensing_title2;
		$data["leftsidebar_value"]=$this->pirb_licensing_value;	
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}
		$data["getdata"]=$this->adminmodel->getdata_pirb_licensing($condition);		
		$checkpermission    = $this->checkUserPermission('27', '2');
    	$data["permission"] = $checkpermission;
		$this->allpage('pirblicensinglist',$data);
	}
	function newpirblicensing(){
		$this->checksessionout();
		$this->checkUserPermission('27', '1', '1');
		$data["header_title"]=$this->pirb_licensing_title;
		$data["header_title2"]=$this->pirb_licensing_title2;
		$data["leftsidebar_value"]=$this->pirb_licensing_value;
		$data["action"]="new";		
		$checkpermission    = $this->checkUserPermission('27', '2');
    	$data["permission"] = $checkpermission;		
		$this->allpage('pirblicensingaction',$data);
	}
	function editpirblicensing(){
		$uid = $this->uri->segment(3);
		$this->checksessionout();
		$this->checkUserPermission('27', '1', '1');
		$data["header_title"]=$this->pirb_licensing_title;
		$data["header_title2"]=$this->pirb_licensing_title2;
		$data["leftsidebar_value"]=$this->pirb_licensing_value;
		$data["getdata"]=$this->adminmodel->getsingledata("pirb_licensing",$uid);
		$data["action"]="edit";		
		$checkpermission    = $this->checkUserPermission('27', '2');
		$data["permission"] = $checkpermission;
		$this->allpage('pirblicensingaction',$data);
	}

	/*function pirblicensingaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("title","Title",'trim|required');
			$this->form_validation->set_rules("detail","Content",'trim|required');
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newpirblicensing();
				}
				if($this->input->post("update")){
					$this->editpirblicensing();
				}
			}		
			else{

				$data=array(
				"title" 	=> $this->input->post("title"),				
				"content" 	=> $this->input->post("detail"),
				"published" => $this->input->post("publishid")
				);
							
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("pirb_licensing",$data);
					$this->pirblicensing();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("pirb_licensing",$data,$this->input->post("updateid"));
					$this->pirblicensing();
				}		
			}
		}
		else{			
			$this->pirblicensing();
		}
	}*/
	function pirblicensingaction(){
		if($this->input->post("insert") || $this->input->post("update")){

			if ($this->input->post("selecttype") =='2') {
				$this->form_validation->set_rules("pdftitle","Title",'trim|required');
				$this->form_validation->set_rules("pdfposition","Position",'trim|required');
				if (empty($_FILES['pdffile']['name']) && $this->input->post("files") ==''){
				    $this->form_validation->set_rules('pdffile', 'PDF File', 'required');
				}
					if($this->form_validation->run()==FALSE){
					if($this->input->post("insert")){					
						$this->newpirblicensing();
					}
					if($this->input->post("update")){
						redirect('admincontrol/editpirblicensing/'.$this->input->post("updateid").'');
						// $this->editpirblicensing();
					}
				}else{
					if ($_FILES['pdffile']['name'] !='') {
						$config_image=array();
						$config_image['upload_path']='./images';
						$config_image['allowed_types']='jpg|jpeg|png|pdf';
						$config_image['encrypt_name']=TRUE;
						$this->load->library('upload',$config_image);			
						if ( ! $this->upload->do_upload('pdffile'))
						{
							//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
						}
						else
						{
							$imagedata=$this->upload->data();
							if ($this->upload->data('file_ext') == '.pdf') {
								$type = '2';
							}else{
								$type = '1';
							}
							$imagefile=$imagedata['file_name'];
						}
					}

					$data=array(
					"title" 	=> $this->input->post("pdftitle"),				
					"position" 	=> $this->input->post("pdfposition"),
					"content" 	=> NULL,
					"published" => $this->input->post("pdfpublishid"),
					'type' => isset($type) ? $type : '2',

					);
					if(isset($imagefile)){
						$data['file']=$imagefile;
					}
					if($this->input->post("insert")){				
						$this->adminmodel->insertdata("pirb_licensing",$data);
						redirect('admincontrol/pirblicensing');
						//$this->pirblicensing();
					}			
					if($this->input->post("update")){
						$this->adminmodel->updatedata("pirb_licensing",$data,$this->input->post("updateid"));
						redirect('admincontrol/pirblicensing');
						//$this->pirblicensing();
					}
				}
			}elseif($this->input->post("selecttype") =='1'){
				$this->form_validation->set_rules("title","Title",'trim|required');
				$this->form_validation->set_rules("detail","Content",'trim|required');
				$this->form_validation->set_rules("position","Position",'trim|required');
				if($this->form_validation->run()==FALSE){
					if($this->input->post("insert")){					
						$this->newpirblicensing();
					}
					if($this->input->post("update")){
						$this->editpirblicensing();
					}
				}else{

					$data=array(
					"title" 	=> $this->input->post("title"),				
					"content" 	=> $this->input->post("detail"),
					"published" => $this->input->post("publishid"),
					"position" => $this->input->post("position"),
					'type' => isset($type) ? $type : '1',
					);
								
					if($this->input->post("insert")){				
						$this->adminmodel->insertdata("pirb_licensing",$data);
						redirect('admincontrol/pirblicensing');
						// $this->pirblicensing();
					}			
					if($this->input->post("update")){
						$this->adminmodel->updatedata("pirb_licensing",$data,$this->input->post("updateid"));
						redirect('admincontrol/pirblicensing');
						// $this->pirblicensing();
					}		
				}

			}
		}
		else{			
			$this->pirblicensing();
		}
	}
	function deletepirblicensing(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("pirb_licensing",$deleteid);		
		$this->pirblicensing();
	}

	function newpirb_cost(){
		$this->checksessionout();
		$data["header_title"]=$this->pirb_cost_title;
		$data["header_title2"]=$this->pirb_cost_title2;
		$data["leftsidebar_value"]=$this->pirb_cost_value;
		$data["action"]="new";	
		$data["categorydata"]=$this->adminmodel->getfulldata("pirb_costcategory");	
		$this->allpage('pirb_costaction',$data);
	}
	function editpirb_cost(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->pirb_cost_title;
		$data["header_title2"]=$this->pirb_cost_title2;
		$data["leftsidebar_value"]=$this->pirb_cost_value;
		$data["getdata"]=$this->adminmodel->getsingledata("pirb_cost",$uid);
		$data["action"]="edit";		
		$data["categorydata"]=$this->adminmodel->getfulldata("pirb_costcategory");
		$this->allpage('pirb_costaction',$data);
	}
	function deletepirb_cost(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("pirb_cost",$deleteid);		
		$this->pirb_costlist();
	}
	function pirb_costaction(){
		if($this->input->post("insert") || $this->input->post("update")){			
			$this->form_validation->set_rules("categoryid","categoryid",'trim|required');
			$this->form_validation->set_rules("name","name",'trim|required');
			$this->form_validation->set_rules("cost","cost",'trim|required');

			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newpirb_cost();
				}
				if($this->input->post("update")){
					$this->editpirb_cost();
				}
			}		
			else{			
									
				$data=array(
				"categoryid" => $this->input->post("categoryid"),
				"name" => $this->input->post("name"),
				"cost" => $this->input->post("cost"),
				"published" => $this->input->post("publishid")
				);							
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("pirb_cost",$data);
					$this->pirb_costlist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("pirb_cost",$data,$this->input->post("updateid"));
					$this->pirb_costlist();
				}		
			}
		}
		else{			
			$this->pirb_costlist();
		}
	}

	function pirb_costcategorylist(){
		$this->checksessionout();
		$this->checkUserPermission('25', '1', '1');
		$data["header_title"]=$this->pirb_costcategory_title;
		$data["header_title2"]=$this->pirb_costcategory_title2;
		$data["leftsidebar_value"]=$this->pirb_costcategory_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_pirb_costcategory($condition);		
		$checkpermission    = $this->checkUserPermission('25', '2');
    	$data["permission"] = $checkpermission;
		$this->allpage('pirb_costcategorylist',$data);
	}
	function newpirb_costcategory(){
		$this->checksessionout();
		$data["header_title"]=$this->pirb_costcategory_title;
		$data["header_title2"]=$this->pirb_costcategory_title2;
		$data["leftsidebar_value"]=$this->pirb_costcategory_value;
		$data["action"]="new";		
		$this->allpage('pirb_costcategoryaction',$data);
	}
	function editpirb_costcategory(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->pirb_costcategory_title;
		$data["header_title2"]=$this->pirb_costcategory_title2;
		$data["leftsidebar_value"]=$this->pirb_costcategory_value;
		$data["getdata"]=$this->adminmodel->getsingledata("pirb_costcategory",$uid);
		$data["action"]="edit";		
		$this->allpage('pirb_costcategoryaction',$data);
	}
	function deletepirb_costcategory(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("pirb_costcategory",$deleteid);		
		$this->pirb_costcategorylist();
	}
	function pirb_costcategoryaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("category","category",'trim|required');			
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newpirb_costcategory();
				}
				if($this->input->post("update")){
					$this->editpirb_costcategory();
				}
			}		
			else{			
											
				$data=array(
				"category" => $this->input->post("category"),
				"published" => $this->input->post("publishid")
				);					
						
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("pirb_costcategory",$data);
					$this->pirb_costcategorylist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("pirb_costcategory",$data,$this->input->post("updateid"));
					$this->pirb_costcategorylist();
				}		
			}
		}
		else{			
			$this->pirb_costcategorylist();
		}
	}

	function pirb_contactuslist(){
		$this->checksessionout();
		$this->checkUserPermission('28', '1', '1');
		$data["header_title"]=$this->pirb_contactus_title;
		$data["header_title2"]=$this->pirb_contactus_title2;
		$data["leftsidebar_value"]=$this->pirb_contactus_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_pirb_contactus($condition);	
		$checkpermission    = $this->checkUserPermission('28', '2');
    	$data["permission"] = $checkpermission;	
		$this->allpage('pirb_contactuslist',$data);
	}
	function newpirb_contactus(){
		$this->checksessionout();
		$data["header_title"]=$this->pirb_contactus_title;
		$data["header_title2"]=$this->pirb_contactus_title2;
		$data["leftsidebar_value"]=$this->pirb_contactus_value;
		$data["action"]="new";		
		$this->allpage('pirb_contactusaction',$data);
	}
	function editpirb_contactus(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->pirb_contactus_title;
		$data["header_title2"]=$this->pirb_contactus_title2;
		$data["leftsidebar_value"]=$this->pirb_contactus_value;
		$data["getdata"]=$this->adminmodel->getsingledata("pirb_contactus",$uid);
		$data["action"]="edit";		
		$this->allpage('pirb_contactusaction',$data);
	}
	function viewpirb_contactus(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->pirb_contactus_title;
		$data["header_title2"]=$this->pirb_contactus_title2;
		$data["leftsidebar_value"]=$this->pirb_contactus_value;
		$data["getdata"]=$this->adminmodel->getsingledata("pirb_contactus",$uid);
		$data["action"]="view";		
		$this->allpage('pirb_contactusaction',$data);
	}
	function deletepirb_contactus(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("pirb_contactus",$deleteid);		
		$this->pirb_contactuslist();
	}
	function pirb_contactusaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("name","Name",'trim|required');
			$this->form_validation->set_rules("email","Email",'trim|required');
			$this->form_validation->set_rules("message","Message",'trim|required');			
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newpirb_contactus();
				}
				if($this->input->post("update")){
					$this->editpirb_contactus();
				}
			}		
			else{			
											
				$data=array(
				"name" => $this->input->post("name"),
				"email" => $this->input->post("email"),
				"message" => $this->input->post("message")
				);					
						
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("pirb_contactus",$data);
					$this->pirb_contactuslist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("pirb_contactus",$data,$this->input->post("updateid"));
					$this->pirb_contactuslist();
				}		
			}
		}
		else{			
			$this->pirb_contactuslist();
		}
	}

	function pirb_addresslist(){
		$this->checksessionout();
		$this->checkUserPermission('29', '1', '1');
		$data["header_title"]=$this->pirb_address_title;
		$data["header_title2"]=$this->pirb_address_title2;
		$data["leftsidebar_value"]=$this->pirb_address_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_pirb_address($condition);	
		$checkpermission    = $this->checkUserPermission('29', '2');
    	$data["permission"] = $checkpermission;	
		$this->allpage('pirb_addresslist',$data);
	}
	function newpirb_address(){
		$this->checksessionout();
		$data["header_title"]=$this->pirb_address_title;
		$data["header_title2"]=$this->pirb_address_title2;
		$data["leftsidebar_value"]=$this->pirb_address_value;
		$data["action"]="new";		
		$this->allpage('pirb_addressaction',$data);
	}
	function editpirb_address(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->pirb_address_title;
		$data["header_title2"]=$this->pirb_address_title2;
		$data["leftsidebar_value"]=$this->pirb_address_value;
		$data["getdata"]=$this->adminmodel->getsingledata("pirb_address",$uid);
		$data["action"]="edit";		
		$this->allpage('pirb_addressaction',$data);
	}
	function deletepirb_address(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("pirb_address",$deleteid);		
		$this->pirb_addresslist();
	}
	function pirb_addressaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("telephone","Telephone",'trim|required');
			$this->form_validation->set_rules("fax","Fax",'trim|required');
			$this->form_validation->set_rules("email","Email",'trim|required');
			$this->form_validation->set_rules("address","Address",'trim|required');			
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newpirb_address();
				}
				if($this->input->post("update")){
					$this->editpirb_address();
				}
			}		
			else{			
											
				$data=array(
				"telephone" => $this->input->post("telephone"),
				"fax" => $this->input->post("fax"),
				"email" => $this->input->post("email"),
				"address" => $this->input->post("address")
				);					
						
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("pirb_address",$data);
					$this->pirb_addresslist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("pirb_address",$data,$this->input->post("updateid"));
					$this->pirb_addresslist();
				}		
			}
		}
		else{			
			$this->pirb_addresslist();
		}
	}

	function pirb_settingslist(){
		$this->checksessionout();
		$this->checkUserPermission('30', '1', '1');
		$data["header_title"]=$this->pirb_settings_title;
		$data["header_title2"]=$this->pirb_settings_title2;
		$data["leftsidebar_value"]=$this->pirb_settings_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_pirb_settings($condition);
		$checkpermission    = $this->checkUserPermission('30', '2');
    	$data["permission"] = $checkpermission;		
		$this->allpage('pirb_settingslist',$data);
	}
	function newpirb_settings(){
		$this->checksessionout();
		$data["header_title"]=$this->pirb_settings_title;
		$data["header_title2"]=$this->pirb_settings_title2;
		$data["leftsidebar_value"]=$this->pirb_settings_value;
		$data["action"]="new";		
		$this->allpage('pirb_settingsaction',$data);
	}
	function editpirb_settings(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->pirb_settings_title;
		$data["header_title2"]=$this->pirb_settings_title2;
		$data["leftsidebar_value"]=$this->pirb_settings_value;
		$data["getdata"]=$this->adminmodel->getsingledata("pirb_settings",$uid);
		$data["action"]="edit";		
		$this->allpage('pirb_settingsaction',$data);
	}
	function deletepirb_settings(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("pirb_settings",$deleteid);		
		$this->pirb_settingslist();
	}
	function pirb_settingsaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("email","email",'trim|required');			
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newpirb_settings();
				}
				if($this->input->post("update")){
					$this->editpirb_settings();
				}
			}		
			else{			
											
				$data=array(
				"email" => $this->input->post("email"),
				"published" => $this->input->post("publishid")
				);					
						
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("pirb_settings",$data);
					$this->pirb_settingslist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("pirb_settings",$data,$this->input->post("updateid"));
					$this->pirb_settingslist();
				}		
			}
		}
		else{			
			$this->pirb_settingslist();
		}
	}

	function pirb_registrationlist(){
		$this->checksessionout();
		$this->checkUserPermission('24', '1', '1');
		$data["header_title"]=$this->pirb_registration_title;
		$data["header_title2"]=$this->pirb_registration_title2;
		$data["leftsidebar_value"]=$this->pirb_registration_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_pirb_registration($condition);		
		$checkpermission    = $this->checkUserPermission('24', '2');
    	$data["permission"] = $checkpermission;
		$this->allpage('pirb_registrationlist',$data);
	}
	function newpirb_registration(){
		$this->checksessionout();
		$this->checkUserPermission('24', '1', '1');
		$data["header_title"]=$this->pirb_registration_title;
		$data["header_title2"]=$this->pirb_registration_title2;
		$data["leftsidebar_value"]=$this->pirb_registration_value;
		$data["action"]="new";	
		$checkpermission    = $this->checkUserPermission('24', '2');
    	$data["permission"] = $checkpermission;	
		$this->allpage('pirb_registrationaction',$data);
	}
	function editpirb_registration(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$this->checkUserPermission('24', '1', '1');
		$data["header_title"]=$this->pirb_registration_title;
		$data["header_title2"]=$this->pirb_registration_title2;
		$data["leftsidebar_value"]=$this->pirb_registration_value;
		$data["getdata"]=$this->adminmodel->getsingledata("pirb_registration",$uid);
		$data["action"]="edit";		
		$checkpermission    = $this->checkUserPermission('24', '2');
    	$data["permission"] = $checkpermission;
		$this->allpage('pirb_registrationaction',$data);
	}
	function deletepirb_registration(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("pirb_registration",$deleteid);		
		$this->pirb_registrationlist();
	}
	function pirb_registrationaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("registration","registration",'trim|required');			
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newpirb_registration();
				}
				if($this->input->post("update")){
					$this->editpirb_registration();
				}
			}		
			else{			
											
				$data=array(
				"registration" => $this->input->post("registration"),
				"registeronline_link" => $this->input->post("registeronline_link"),
				"registermanual" => $this->input->post("registermanual"),
				"downloadlink" => $this->input->post("downloadlink"),
				"published" => $this->input->post("publishid")
				);					
						
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("pirb_registration",$data);
					$this->pirb_registrationlist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("pirb_registration",$data,$this->input->post("updateid"));
					$this->pirb_registrationlist();
				}		
			}
		}
		else{			
			$this->pirb_registrationlist();
		}
	}

	function advertise_contactuslist(){
		$this->checksessionout();
		$this->checkUserPermission('31', '1', '1');
		$data["header_title"]=$this->advertise_contactus_title;
		$data["header_title2"]=$this->advertise_contactus_title2;
		$data["leftsidebar_value"]=$this->advertise_contactus_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_advertise_contactus($condition);
		$checkpermission    = $this->checkUserPermission('31', '2');
    	$data["permission"] = $checkpermission;		
		$this->allpage('advertise_contactuslist',$data);
	}
	function newadvertise_contactus(){
		$this->checksessionout();
		$data["header_title"]=$this->advertise_contactus_title;
		$data["header_title2"]=$this->advertise_contactus_title2;
		$data["leftsidebar_value"]=$this->advertise_contactus_value;
		$data["action"]="new";		
		$this->allpage('advertise_contactusaction',$data);
	}
	function editadvertise_contactus(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->advertise_contactus_title;
		$data["header_title2"]=$this->advertise_contactus_title2;
		$data["leftsidebar_value"]=$this->advertise_contactus_value;
		$data["getdata"]=$this->adminmodel->getsingledata("advertise_contactus",$uid);
		$data["action"]="edit";		
		$this->allpage('advertise_contactusaction',$data);
	}
	function viewadvertise_contactus(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->advertise_contactus_title;
		$data["header_title2"]=$this->advertise_contactus_title2;
		$data["leftsidebar_value"]=$this->advertise_contactus_value;
		$data["getdata"]=$this->adminmodel->getsingledata("advertise_contactus",$uid);
		$data["action"]="view";		
		$this->allpage('advertise_contactusaction',$data);
	}
	function deleteadvertise_contactus(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("advertise_contactus",$deleteid);		
		$this->advertise_contactuslist();
	}
	function advertise_contactusaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("name","Name",'trim|required');
			$this->form_validation->set_rules("email","Email",'trim|required');
			$this->form_validation->set_rules("message","Message",'trim|required');			
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newadvertise_contactus();
				}
				if($this->input->post("update")){
					$this->editadvertise_contactus();
				}
			}		
			else{			
											
				$data=array(
				"name" => $this->input->post("name"),
				"email" => $this->input->post("email"),
				"message" => $this->input->post("message")
				);					
						
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("advertise_contactus",$data);
					$this->advertise_contactuslist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("advertise_contactus",$data,$this->input->post("updateid"));
					$this->advertise_contactuslist();
				}		
			}
		}
		else{			
			$this->advertise_contactuslist();
		}
	}

	function advertise_addresslist(){
		$this->checksessionout();
		$this->checkUserPermission('32', '1', '1');
		$data["header_title"]=$this->advertise_address_title;
		$data["header_title2"]=$this->advertise_address_title2;
		$data["leftsidebar_value"]=$this->advertise_address_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_advertise_address($condition);	
		$checkpermission    = $this->checkUserPermission('32', '2');
    	$data["permission"] = $checkpermission;	
		$this->allpage('advertise_addresslist',$data);
	}
	function newadvertise_address(){
		$this->checksessionout();
		$data["header_title"]=$this->advertise_address_title;
		$data["header_title2"]=$this->advertise_address_title2;
		$data["leftsidebar_value"]=$this->advertise_address_value;
		$data["action"]="new";		
		$this->allpage('advertise_addressaction',$data);
	}
	function editadvertise_address(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->advertise_address_title;
		$data["header_title2"]=$this->advertise_address_title2;
		$data["leftsidebar_value"]=$this->advertise_address_value;
		$data["getdata"]=$this->adminmodel->getsingledata("advertise_address",$uid);
		$data["action"]="edit";		
		$this->allpage('advertise_addressaction',$data);
	}
	function deleteadvertise_address(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("advertise_address",$deleteid);		
		$this->advertise_addresslist();
	}
	function advertise_addressaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("telephone","Telephone",'trim|required');
			$this->form_validation->set_rules("fax","Fax",'trim|required');
			$this->form_validation->set_rules("email","Email",'trim|required');
			$this->form_validation->set_rules("address","Address",'trim|required');			
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newadvertise_address();
				}
				if($this->input->post("update")){
					$this->editadvertise_address();
				}
			}		
			else{			
											
				$data=array(
				"telephone" => $this->input->post("telephone"),
				"fax" => $this->input->post("fax"),
				"email" => $this->input->post("email"),
				"address" => $this->input->post("address")
				);					
						
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("advertise_address",$data);
					$this->advertise_addresslist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("advertise_address",$data,$this->input->post("updateid"));
					$this->advertise_addresslist();
				}		
			}
		}
		else{			
			$this->advertise_addresslist();
		}
	}

	function advertise_settingslist(){
		$this->checksessionout();
		$this->checkUserPermission('33', '1', '1');
		$data["header_title"]=$this->advertise_settings_title;
		$data["header_title2"]=$this->advertise_settings_title2;
		$data["leftsidebar_value"]=$this->advertise_settings_value;		
		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}		
		$data["getdata"]=$this->adminmodel->getdata_advertise_settings($condition);	
		$checkpermission    = $this->checkUserPermission('33', '2');
    	$data["permission"] = $checkpermission;	
		$this->allpage('advertise_settingslist',$data);
	}
	function newadvertise_settings(){
		$this->checksessionout();
		$data["header_title"]=$this->advertise_settings_title;
		$data["header_title2"]=$this->advertise_settings_title2;
		$data["leftsidebar_value"]=$this->advertise_settings_value;
		$data["action"]="new";		
		$this->allpage('advertise_settingsaction',$data);
	}
	function editadvertise_settings(){
		$uid=$this->uri->segment(3);
		$this->checksessionout();
		$data["header_title"]=$this->advertise_settings_title;
		$data["header_title2"]=$this->advertise_settings_title2;
		$data["leftsidebar_value"]=$this->advertise_settings_value;
		$data["getdata"]=$this->adminmodel->getsingledata("advertise_settings",$uid);
		$data["action"]="edit";		
		$this->allpage('advertise_settingsaction',$data);
	}
	function deleteadvertise_settings(){
		$deleteid=$this->input->post("deleteid");  //$this->uri->segment(3);
		$this->checksessionout();		
		$this->adminmodel->deletedata("advertise_settings",$deleteid);		
		$this->advertise_settingslist();
	}
	function advertise_settingsaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("email","email",'trim|required');			
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newadvertise_settings();
				}
				if($this->input->post("update")){
					$this->editadvertise_settings();
				}
			}		
			else{			
											
				$data=array(
				"email" => $this->input->post("email"),
				"published" => $this->input->post("publishid")
				);					
						
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("advertise_settings",$data);
					$this->advertise_settingslist();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("advertise_settings",$data,$this->input->post("updateid"));
					$this->advertise_settingslist();
				}		
			}
		}
		else{			
			$this->advertise_settingslist();
		}
	}

	public function fileupload($data = []){

		$directory 	 		= dirname(__DIR__, 2);
		 // print_r($data['file']['imagefile']);die;
		$file 				= $data['file']['imagefile']['tmp_name'];
		$file_name 			= $data['file']['imagefile']['name'];
		$file_name_array 	= explode(".", $file_name);
		$extension 			= end($file_name_array);
		$new_image_name 	= rand() . '.' . $extension;

		 // chmod('upload', 0777);
		$allowed_extension = array("jpg", "png");
		// if(in_array($extension, $allowed_extension))
		// {
		 // move_uploaded_file($file, $directory.'/'.'images/' . $new_image_name);
		 // image compression
		 if ($data['file']['imagefile']["size"] >= '1000000') {
		 	$info = getimagesize($file);
	           if ($info['mime'] == 'image/jpeg') 
	               $image = imagecreatefromjpeg($file);

	           elseif ($info['mime'] == 'image/gif') 
	               $image = imagecreatefromgif($file);

	           elseif ($info['mime'] == 'image/png') 
	               $image = imagecreatefrompng($file);

	           imagejpeg($image, $directory.'/'.'images/' . $new_image_name, 60);
		 }else{
		 	move_uploaded_file($file, $directory.'/'.'images/' . $new_image_name);
		 }
		// }
	return isset($new_image_name) ? $new_image_name : '0';
	}

	public function emailValidation(){
		$requestData 		= $this->input->post();
		
		$result = $this->Usersmodel->emailvalidation($requestData);

		echo $result;
	}
	public function usernameValidation(){
		$requestData 		= $this->input->post();
		
		$result = $this->Usersmodel->usernamevalidation($requestData);

		echo $result;
	}

	public function usernameValidation1(){
		$requestData 		= $this->input->post();
		
		$result = $this->Usersmodel->usernamevalidation1($requestData);

		echo $result;
	}

	public function emailverification($id){
		
		$result = $this->Usersmodel->verification($id);

		if($data){
			$this->session->unset_userdata('userid');
			$this->session->set_flashdata('success', 'Successfully Verified.');
		}else{
			$this->session->set_flashdata('error', 'Try Later.');
		}
		
		redirect('admincontrol/sucess');
	}
	public function emailverification2($id){
		
		$result = $this->Usersmodel->verification2($id);

		if($data){
			$this->session->unset_userdata('userid');
			$this->session->set_flashdata('success', 'Successfully Verified.');
		}else{
			$this->session->set_flashdata('error', 'Try Later.');
		}
		
		redirect('admincontrol/sucess');
	}

	public function settings(){

		$this->checksessionout();
		$this->checkUserPermission('10', '1', '1');
		$data["header_title"]		= $this->ratemywork_post_title;
		$data["header_title2"]		= $this->ratemywork_post_title2;
		$data["leftsidebar_value"]	= $this->ratemywork_post_value;
		$data["mainsettings"]		= $this->adminmodel->getdata_ratemywork_settings('row');
		$data["tagdata"]			= $this->adminmodel->getdata_tagmanagement('all');	
		$data["reportdata"]			= $this->adminmodel->getdata_reportmanagement('all');

		$checkpermission    = $this->checkUserPermission('10', '2');
    	$data["permission"] = $checkpermission;		

		$this->allpage('settings',isset($data) ? $data : '');
	}
	public function posts(){

		$this->checksessionout();
		$this->checkUserPermission('9', '1', '1');
		$data["header_title"]		= $this->ratemywork_title;
		$data["header_title2"]		= $this->ratemywork_title2;
		$data["leftsidebar_value"]	= $this->ratemywork_value;
		// $data["mainsettings"]		= $this->adminmodel->getdata_ratemywork_settings('row');
		$data["postdata"]			= $this->adminmodel->postgetList('all');
		$data["tagdata"]			= $this->adminmodel->getdata_tagmanagement('all', ['status' => '1']);	
		$data["reportdata"]			= $this->adminmodel->getdata_reportmanagement('all');
		$data["userid"]				= $this->getUserID();

		$checkpermission    = $this->checkUserPermission('9', '2');
    	$data["permission"] = $checkpermission;

		if ($this->input->post()) {
				$reportData = $this->input->post();
				$data 		= $this->adminmodel->postaction($reportData);
				redirect('admincontrol/posts');
			}	

		$this->allpage('postslist',isset($data) ? $data : '');
	}
	public function newposts(){

		$this->checksessionout();
		$this->checkUserPermission('9', '1', '1');

		$data["header_title"]		= $this->ratemywork_title;
		$data["header_title2"]		= $this->ratemywork_title2;
		$data["leftsidebar_value"]	= $this->ratemywork_value;
		// $data["mainsettings"]		= $this->adminmodel->getdata_ratemywork_settings('row');
		$data["postdata"]			= $this->adminmodel->postgetList('all');
		$data["tagdata"]			= $this->adminmodel->getdata_tagmanagement('all', ['status' => '1']);	
		$data["reportdata"]			= $this->adminmodel->getdata_reportmanagement('all');
		$data["userid"]				= $this->getUserID();
		$data["userdetails"]		= $this->getUserDetails();
		$checkpermission    		= $this->checkUserPermission('9', '2');
    	$data["permission"] 		= $checkpermission;

		if ($this->input->post()) {
				$reportData = $this->input->post();
				$data 		= $this->adminmodel->postaction($reportData);
				redirect('admincontrol/posts');
			}	

		$this->allpage('posts',isset($data) ? $data : '');
	}

	public function manageposts($id=''){
		$this->checksessionout();
		$this->checkUserPermission('9', '1', '1');

		$userDetails 				= $this->getUserDetails();
		$userid 					= $this->getUserID();

		$data["header_title"]		= $this->ratemywork_title;
		$data["header_title2"]		= $this->ratemywork_title2;
		$data["leftsidebar_value"]	= $this->ratemywork_value;
		$data["postdata"]			= $this->adminmodel->postgetList('row', ['id' => $id]);
		$posttaggs 					= $this->getpostTags(explode(',', $data["postdata"]['post_taggs']));
		$data["userDetails"] 		= $userDetails;
		$data["diarylist"] 			= $this->Diarymodel->getdiaryList('all', ['post_id' => $id]);
		$data["tagdata"]			= $this->adminmodel->getdata_tagmanagement('all', ['status' => '1']);
		$data["posttaggs"] 			= $posttaggs;
		$data["reportdata"]			= $this->adminmodel->getdata_reportmanagement('all');
		$data["reportlists"]		= $this->getReportList();
		$data["userid"]				= $userid;
		$checkpermission    = $this->checkUserPermission('9', '2');
    	$data["permission"] = $checkpermission;

		if ($this->input->post()) {
			$reportData = $this->input->post();

			if (isset($reportData['pagetype']) && $reportData['pagetype'] =='post_status') {

				$data 		= $this->adminmodel->postaction2($reportData);

				$diarydata = $this->Diarymodel->action(['adminid' => $userid, 'post_id' => $reportData['id'], 'pagedata' => 'postupdate']+$reportData);
			}elseif(isset($reportData['pagetype']) && $reportData['pagetype'] =='admincomments'){

				$diarydata = $this->Diarymodel->action(['adminid' => $userid, 'post_id' => $reportData['id'], 'pagedata' => 'postcomments']+$reportData);
			}
			
			// redirect('admincontrol/manageposts/'.$id.'');
		}	

		$this->allpage('postsmanage',isset($data) ? $data : '');

	}
	 public function changepostStatus(){
	 	$post = $this->input->post();
	 	$this->adminmodel->deletepost($post);
	 	redirect('admincontrol/posts');
	 }
	public function getpostTags($data = []){

		$data = $this->adminmodel->getPosttags('all', ['tags' => $data]);
		return $data;
	}

	public function getReportList(){
		$data = $this->adminmodel->getdata_reportmanagement('all');
		
		if(count($data) > 0) return ['' => 'Select Reason']+array_column($data, 'report_name', 'id');
		else return [];
	}

	public function DTposts(){
		$permission    = $this->checkUserPermission('9', '2');    	

		$post 			= $this->input->post();

		$totalcount 	= $this->adminmodel->postgetList('count', ['status' => ['0', '1'], 'is_delete' => '0']+$post);
		$results 		= $this->adminmodel->postgetList('all',['status' => ['0', '1'], 'is_delete' => '0']+$post);
		$totalrecord 	= [];
		if(count($results) > 0){
			foreach($results as $result){
				//if (isset($permission) && ($permission =='1')) {
					// $action = '<div class="table-action">
					// 				<a href="'.base_url().'admincontrol/manageposts/'.$result['id'].'">Manage</a>
					// 			</div>';
				/*}else
				{
					$action ='';
				}*/

				if ($result['post_reports'] !='') {
					$reportcount =  count(array_count_values(explode(',', $result['post_reports'])));
					$action = '<div class="table-action">
									<a href="'.base_url().'admincontrol/manageposts/'.$result['id'].'">Manage</a>
								</div>
								<div class="table-action">
									<a href="javascript:void(0)" class="delete" data-id="'.$result['id'].'" >Delete</a>
								</div>';
				}else{
					$reportcount =  '0';
					$action = '<div class="table-action">
									<a href="'.base_url().'admincontrol/manageposts/'.$result['id'].'">Manage</a>
								</div>';
				}

				if($result['user_id'] =='1') 	$username 	= "PIRB";
				else $username 	= $result['username'];

				$totalrecord[] = 	[
										'status' 		=> 	$result['status'],
										'title' 		=> 	$result['post_title'],
										'uname' 		=> 	$username,
										'datecreated' 	=> 	date('d-m-Y', strtotime($result['created_at'])),
										'upvote' 		=> 	count(array_filter(explode(",", $result['upvote']))),
										'downvote' 		=> 	count(array_filter(explode(",", $result['downvote']))),
										'reports' 		=> 	$reportcount,
										'action'		=> 	$action
									];
			}
		}

		$json = array(
			"draw"            => intval($post['draw']),   
			"recordsTotal"    => intval($totalcount),  
			"recordsFiltered" => intval($totalcount),
			"data"            => $totalrecord
		);

		echo json_encode($json);

	}

	public function statistics(){

		$this->checksessionout();
		$this->checkUserPermission('11', '1', '1');

		$data["header_title"]		= $this->ratemywork_statistics_title;
		$data["header_title2"]		= $this->ratemywork_statistics_title2;
		$data["leftsidebar_value"]	= $this->ratemywork_statistics_value;
		$datetime					= date('Y-m-d H:i:s');

		$progress 					= $this->adminmodel->getStatisticsList('row', ['type' => 'progress', 'statisticstype' => '1']);
		$top1 						= $this->adminmodel->getStatisticsTopPostList('all', ['type' => '1', 'statisticstype' => '2']);
		$top2 						= $this->adminmodel->getStatisticsTopPostList('all', ['type' => '2' , 'statisticstype' => '2']);
		$top3 						= $this->adminmodel->getStatisticsTopPostList('all', ['type' => '3' , 'statisticstype' => '2']);
		$top4 						= $this->adminmodel->getStatisticsTopPostList('all', ['type' => '4' , 'statisticstype' => '2']);
		$top5 						= $this->adminmodel->getStatisticsTopPostList('all', ['type' => '5' , 'statisticstype' => '2']);

		$topmonth 					= $this->adminmodel->getStatisticsTopPostList('all', ['type' => 'topmonth', 'statisticstype' => '2']);
		$topweek 					= $this->adminmodel->getStatisticsTopPostList('all', ['type' => 'topweek', 'statisticstype' => '2']);
		$topyear 					= $this->adminmodel->getStatisticsTopPostList('all', ['type' => 'topyear', 'statisticstype' => '2']);

		if (isset($progress['post_id']) && (count(array_filter(explode(',', $progress['post_id']))) > 0)) {
			$result 					= $this->Apimodel->postgetList('all', ['post_id' => isset($progress['post_id']) ? explode(',', $progress['post_id']) : '', 'pagetype' => 'progressposts']);
		}
		/*if (count(array_filter(explode(',', $top1['post_id']))) > 0) {
			$result1 					= $this->Apimodel->postgetList('all', ['post_id' => isset($top1['post_id']) ? explode(',', $top1['post_id']) : '', 'pagetype' => 'topposts']);
		}
		if (count(array_filter(explode(',', $top2['post_id']))) > 0) {
			$result2 					= $this->Apimodel->postgetList('all', ['post_id' => isset($top2['post_id']) ? explode(',', $top2['post_id']) : '', 'pagetype' => 'topposts']);
		}
		if (count(array_filter(explode(',', $top3['post_id']))) > 0) {
			$result3 					= $this->Apimodel->postgetList('all', ['post_id' => isset($top3['post_id']) ? explode(',', $top3['post_id']) : '', 'pagetype' => 'topposts']);
		}
		if (count(array_filter(explode(',', $top4['post_id']))) > 0) {
			$result4 					= $this->Apimodel->postgetList('all', ['post_id' => isset($top4['post_id']) ? explode(',', $top4['post_id']) : '', 'pagetype' => 'topposts']);
		}
		if (count(array_filter(explode(',', $top5['post_id']))) > 0) {
			$result5 					= $this->Apimodel->postgetList('all', ['post_id' => isset($top5['post_id']) ? explode(',', $top5['post_id']) : '', 'pagetype' => 'topposts']);
		}*/

		if (isset($top1) && count($top1) > 0){
			$postsort1 					= array_column($top1, 'post_calculation');
											array_multisort($postsort1, SORT_DESC, $top1);
			$result1 					= array_slice($top1, 0, 3);
		}
		
		if (isset($top2) && count($top2) > 0){
			$postsort2 					= array_column($top2, 'post_calculation');
											array_multisort($postsort2, SORT_DESC, $top2);
			$result2 			= array_slice($top2, 0, 3);
		}

		if (isset($top3) && count($top3) > 0){
			$postsort3 					= array_column($top3, 'post_calculation');
											array_multisort($postsort3, SORT_DESC, $top3);
			$result3 					= array_slice($top3, 0, 3);
		}
		
		if (isset($top4) && count($top4) > 0){
			$postsort4 					= array_column($top4, 'post_calculation');
											array_multisort($postsort4, SORT_DESC, $top4);
			$result4 					= array_slice($top4, 0, 3);
		}
		
		if (isset($top5) && count($top5) > 0){
			$postsort5 					= array_column($top5, 'post_calculation');
											array_multisort($postsort5, SORT_DESC, $top5);
			$result5 					= array_slice($top5, 0, 3);
		}

		if (isset($topmonth) && count($topmonth) > 0){
			$postsort6 					= array_column($topmonth, 'post_calculation');
											array_multisort($postsort6, SORT_DESC, $topmonth);
			$topmonth_result1 			= array_slice($topmonth, 0, 3);
		}
		
		if (isset($topweek) && count($topweek) > 0){
			$postsort7 					= array_column($topweek, 'post_calculation');
											array_multisort($postsort7, SORT_DESC, $topweek);
			$topweek_result2 			= array_slice($topweek, 0, 3);
		}

		if (isset($topyear) && count($topyear) > 0){
			$postsort8					= array_column($topyear, 'post_calculation');
											array_multisort($postsort8, SORT_DESC, $topyear);
			$topyear_result3 			= array_slice($topyear, 0, 3);
		}
		

		$data["result"]  = isset($result) ? $result : [];
		$data["result1"] = isset($result1) ? $result1 : [];
		$data["result2"] = isset($result2) ? $result2 : [];
		$data["result3"] = isset($result3) ? $result3 : [];
		$data["result4"] = isset($result4) ? $result4 : [];
		$data["result5"] = isset($result5) ? $result5 : [];

		$data["result6"] = isset($topmonth_result1) ? $topmonth_result1 : [];
		$data["result7"] = isset($topweek_result2) ? $topweek_result2 : [];
		$data["result8"] = isset($topyear_result3) ? $topyear_result3 : [];


		
		$data["userid"]				= $this->getUserID();

		$checkpermission    = $this->checkUserPermission('11', '2');
    	$data["permission"] = $checkpermission;

		$this->allpage('statistics',isset($data) ? $data : '');
	}

	public function postTypeCalculation($data){

		foreach ($data as $datakey => $datavalue) {

			$result['postdata'][] = [
					'postid' 			=> $datavalue['id'],
					'userid' 			=> $datavalue['user_id'],
					'post_title' 		=> $datavalue['post_title'],
					'created_at' 		=> $datavalue['created_at'],
					'postuser' 			=> $datavalue['username'],
					'upvotecount' 		=> count(array_filter(explode(",", $datavalue['upvote']))),
					'downvotecount' 	=> count(array_filter(explode(",", $datavalue['downvote']))),
				];
			
		}
		return isset($result) ? $result : $result['postdata'] = [];
	}

	function systemusers()
	{
	    $this->checksessionout();
	    $this->checkUserPermission('8', '1', '1');
	    $userDetails = $this->getUserDetails();
	    $userid      = $this->getUserID();
	    $results     = $this->Usersmodel->getList('all', ['pagetype' => 'systemusers']);

	    $data["header_title"]      = $this->system_user_title;
	    $data["header_title2"]     = $this->system_user_title2;
	    $data["leftsidebar_value"] = $this->system_user_value;

	    $checkpermission     = $this->checkUserPermission('8', '2');
	    $data["permission"]  = $checkpermission;
	    $data["getdata"]     = $results;
	    $data["userDetails"] = $userDetails;
	    $data["userid"]      = $userid;

	    $this->allpage('systemusers', isset($data) ? $data : '');
	}
	public function addsystemuser(){
		$this->checksessionout();
		$this->checkUserPermission('8', '1', '1');

		$userDetails 				= $this->getUserDetails();
		$userid 					= $this->getUserID();

		$permission_list 			= $this->adminmodel->getPermissions();

        $fotmatted_list = array();
        for($k=0;$k<count($permission_list);$k++) 
        {
	        $fotmatted_list[$k]['id'] 			= $permission_list[$k]->id;
	        $fotmatted_list[$k]['category_id'] 	= $permission_list[$k]->category_id;
         	$fotmatted_list[$k]['name'] 		= $permission_list[$k]->name;
        }
        
        $data['permission_list'] 	= $fotmatted_list;		

		$data["header_title"]		= $this->system_user_title;
		$data["header_title2"]		= $this->system_user_title2;
		$data["leftsidebar_value"]	= $this->system_user_value;

		$checkpermission     = $this->checkUserPermission('8', '2');
	    $data["permission"]  = $checkpermission;

		$data["userDetails"] 		= $userDetails;
		$data["userid"]				= $userid;
		if ($this->input->post()) {
			$requestData = $this->input->post();
			// echo "<pre>";print_r($requestData);die;
			$data = $this->adminmodel->systemuserAction($requestData);
			if($data['action'] == 'insert'){
				$this->session->set_flashdata('success', 'Successfully Created New System user.');
			}elseif($data['action'] == 'update'){
				$this->session->set_flashdata('success', 'Successfully Updated System user Details.');
			}
			else{
				$this->session->set_flashdata('error', 'Try Later.');
			}
			redirect('admincontrol/systemusers');
		}

		$this->allpage('systemuser_action',isset($data) ? $data : '');
	}
	public function managesystemuser($id){
		$this->checksessionout();
		$this->checkUserPermission('8', '1', '1');

		$userDetails 				= $this->getUserDetails();
		$userid 					= $this->getUserID();
		$result 					= $this->adminmodel->getList('row', ['userid' => $id, 'pagetype' => 'systemusers']);

		$permission_list 			= $this->adminmodel->getPermissions();

        $fotmatted_list = array();
        for($k=0;$k<count($permission_list);$k++) 
        {
	        $fotmatted_list[$k]['id'] 			= $permission_list[$k]->id;
	        $fotmatted_list[$k]['category_id'] 	= $permission_list[$k]->category_id;
         	$fotmatted_list[$k]['name'] 		= $permission_list[$k]->name;
        }
        
        $data['permission_list'] 	= $fotmatted_list;		

		$data["header_title"]		= $this->system_user_title;
		$data["header_title2"]		= $this->system_user_title2;
		$data["leftsidebar_value"]	= $this->system_user_value;

		$checkpermission     = $this->checkUserPermission('8', '2');
	    $data["permission"]  = $checkpermission;
		$data["userDetails"] 		= $userDetails;
		$data["userid"]				= $userid;
		$data["getdata"]			= $result;
		if ($this->input->post()) {
			$requestData = $this->input->post();
			$data = $this->adminmodel->systemuserAction($requestData);

			redirect('admincontrol/systemusers');
		}

		$this->allpage('systemuser_action',isset($data) ? $data : '');
	}

	function tags_exists($key, $id = '')
	{
		$this->db->where('tag_name', $key);
		if ($id != '') $this->db->where('id !=', $id);
		$this->db->where('status', '1');
		$query = $this->db->get('articles_tags');		
		
		if ($query->num_rows() == 0) {
			return true;
		} else {
			$this->form_validation->set_message('tags_exists', 'Sorry, This Tag is already added.');
			return false;
		}
	}

	function tags($id = '')
	{
	    if ($this->input->post()) {	    	    	
	    	$tagid = $this->input->post('id');        
	        $this->form_validation->set_rules('tag_name', 	'Tag Name',		'trim|required|max_length[150]|callback_tags_exists[' . $tagid . ']');
	        if ($this->form_validation->run() != FALSE) {
	        	$requestData = $this->input->post();
	        	
		        $result      = $this->adminmodel->tagsAction($requestData);
		        if ($result == 'insert') {
		            $this->session->set_flashdata('success', 'Successfully Created New Tag.');
		        } elseif ($result == 'update') {
		            $this->session->set_flashdata('success', 'Successfully Updated Tag.');
		        } else {
		            $this->session->set_flashdata('error', 'Try Later.');
		        }
		        redirect('admincontrol/tags');
		    }
	    }

	    $this->checksessionout();
	    $this->checkUserPermission('4', '1', '1');
	    $data["header_title"]      = $this->magazine_tags_title;
	    $data["header_title2"]     = $this->magazine_tags_title2;
	    $data["leftsidebar_value"] = $this->magazine_tags_value;

	    $checkpermission    = $this->checkUserPermission('4', '2');
	    $data["permission"] = $checkpermission;

	    if ($id == '') {
	        $data["action"]  = "new";
	        $data["getdata"] = $this->adminmodel->getdata_tags();
	    } else {
	        $data["action"] = "edit";
	        $datas          = $this->adminmodel->getdata_tags($id);
	        if ($datas) {
	            $data["data"]    = $datas;
	            $data["getdata"] = $this->adminmodel->getdata_tags();
	        } else {
	            redirect('admincontrol/tags');
	        }
	    }

	    $this->allpage('tags', $data);
	}

	function deletetags()
	{
		$data = [
            'status' => '0',
        ];
	    $deleteid = $this->input->post("deleteid");
	    $this->checksessionout();
	    $this->adminmodel->updatedata("articles_tags", $data, $deleteid);	    
	    $this->session->set_flashdata('success', 'Successfully Deleted Tag.');
	    redirect('admincontrol/tags');
	}

	function comments()
	{
	    if ($this->input->post()) {
	        $requestData = $this->input->post();
	        $result      = $this->adminmodel->commentsAction($requestData);	        
	        if ($result) {
	            $this->session->set_flashdata('success', 'Successfully Updated published status.');
	        } else {
	            $this->session->set_flashdata('error', 'Try Later.');
	        }

	        redirect('admincontrol/comments');
	    }

	    $this->checksessionout();
	    $this->checkUserPermission('4', '1', '1');
	    $data["header_title"]      = $this->magazine_comments_title;
	    $data["header_title2"]     = $this->magazine_comments_title2;
	    $data["leftsidebar_value"] = $this->magazine_comments_value;

	    $checkpermission    = $this->checkUserPermission('4', '2');
	    $data["permission"] = $checkpermission;
	    $data["getdata"]    = $this->adminmodel->getdata_comments();
	    // echo $this->db->last_query(); die();
	    $this->allpage('comments', $data);
	}

	function deletecomments()
	{
		$data = [
            'status' => '0',
        ];
	    $deleteid = $this->input->post("deleteid");
	    $this->checksessionout();
	    $this->adminmodel->updatedata("articles_comments", $data, $deleteid);
	    // $this->adminmodel->deletedata("articles_comments", $deleteid);
	    $this->session->set_flashdata('success', 'Successfully Deleted Comment.');
	    redirect('admincontrol/comments');
	}

	function ajaxtag()
	{
	    $json = [];
	    $data = $this->adminmodel->getTagData();
	    foreach ($data as $key => $value) {
	        $json[] = $value['tag_name'];
	    }
	    echo json_encode($json);
	}

	function articles()
	{
	    if ($this->input->post()) {
	        $requestData = $this->input->post();
	        $result      = $this->adminmodel->articlesaction($requestData);
	        if ($result) {
	            $this->session->set_flashdata('success', 'Successfully Updated published status.');
	        } else {
	            $this->session->set_flashdata('error', 'Try Later.');
	        }
	        redirect('admincontrol/articles');
	    }

	    $data['last_pos'] = $this->adminmodel->getLastPosition();
	    
	    $this->checksessionout();
	    $this->checkUserPermission('4', '1', '1');
	    $data["header_title"]      = $this->magazine_article_title;
	    $data["header_title2"]     = $this->magazine_article_title2;
	    $data["leftsidebar_value"] = $this->magazine_article_value;

	    $checkpermission    = $this->checkUserPermission('4', '2');
	    $data["permission"] = $checkpermission;
	    $data["getdata"]    = $this->adminmodel->getdata_articles('all');	    
	    $this->allpage('articles', $data);
	}

	function newarticles()
	{
	    if ($this->input->post()) {
            $reportData = $this->input->post();
            // echo "<pre>";
            // print_r($reportData);
            // echo "</pre>"; die();

            $newposition      = (int) $reportData['position'];
            $oldposition 	  = $this->adminmodel->getLastPosition() + 1;
            $plusoldposition  = $oldposition + 1;
            $minusoldposition = $oldposition - 1;

            $plusnewposition  = $newposition + 1;
            $minusnewposition = $newposition - 1;

            if ($oldposition > $newposition) {
                $query1 = $this->db->query("update articles set position = position+1 where position >= '" . $newposition . "' AND position <= '" . $minusoldposition . "' ");
            } elseif ($oldposition < $newposition) {
                $query1 = $this->db->query("update articles set position = position-1 where position >= '" . $plusoldposition . "' AND position <= '" . $newposition . "'");
            }

            $result = $this->adminmodel->articlesaction($reportData);
            if ($result) {
                $this->session->set_flashdata('success', 'Successfully Created new Article.');
            } else {
                $this->session->set_flashdata('error', 'Try Later.');
            }
            redirect('admincontrol/articles');
        }

        $data['last_pos'] = $this->adminmodel->getLastPosition();

	    $json    = [];
	    $TagData = $this->adminmodel->getTagData();
	    foreach ($TagData as $key => $value) {
	        $json[] = $value['tag_name'];
	    }
	    $data["taggs"] = json_encode($json);

	    $this->checksessionout();
	    $this->checkUserPermission('4', '1', '1');
	    $currentdate               = date("Y-m-d");
	    $data["fromdate"]          = $currentdate;
	    $data["todate"]            = '';
	    $data["header_title"]      = $this->magazine_article_title;
	    $data["header_title2"]     = $this->magazine_article_title2;
	    $data["leftsidebar_value"] = $this->magazine_article_value;
	    $data["getdata"]           = '';
	    $data["sections_headers"]  = $this->adminmodel->get_sections_headers();

	    $checkpermission    = $this->checkUserPermission('4', '2');
	    $data["permission"] = $checkpermission;
	    $this->allpage('articlesaction', $data);
	}

	function editarticles()
	{
	    if ($this->input->post()) {
	        $reportData = $this->input->post();

	        $article_id       = $reportData['id'];
            $newposition      = (int) $reportData['position'];
            $oldpositiondata  = $this->adminmodel->getdata_articles('row', ['id' => $article_id]);
            $oldposition      = (int) $oldpositiondata['position'];
            $plusoldposition  = $oldposition + 1;
            $minusoldposition = $oldposition - 1;

            $plusnewposition  = $newposition + 1;
            $minusnewposition = $newposition - 1;

            if ($oldposition > $newposition) {
                $query1 = $this->db->query("update articles set position = position+1 where position >= '" . $newposition . "' AND position <= '" . $minusoldposition . "' ");

                $query2 = $this->db->query("update articles set position = '$newposition' where id = '" . $article_id . "'");
            } elseif ($oldposition < $newposition) {
                $query1 = $this->db->query("update articles set position = position-1 where position >= '" . $plusoldposition . "' AND position <= '" . $newposition . "'");

                $query2 = $this->db->query("update articles set position = '$newposition' where id = '" . $article_id . "'");
            }

	        $result     = $this->adminmodel->articlesaction($reportData);	        
	        if ($result) {
	            $this->session->set_flashdata('success', 'Successfully Updated Article.');
	        } else {
	            $this->session->set_flashdata('error', 'Try Later.');
	        }
	        redirect('admincontrol/articles');
	    }

	    $json    = [];
	    $TagData = $this->adminmodel->getTagData();
	    foreach ($TagData as $key => $value) {
	        $json[] = $value['tag_name'];
	    }
	    $data["taggs"] = json_encode($json);
	    $data['last_pos'] = $this->adminmodel->getLastPosition();

	    $uid         = $this->uri->segment(3);
	    $userid      = $this->getUserID();
	    $userDetails = $this->getUserDetails();
	    $this->checksessionout();
	    $this->checkUserPermission('4', '1', '1');
	    $data["header_title"]      = $this->magazine_article_title;
	    $data["header_title2"]     = $this->magazine_article_title2;
	    $data["leftsidebar_value"] = $this->magazine_article_value;
	    $getdata                   = $this->adminmodel->getdata_articles('row', ['id' => $uid]);
	    if (!empty($getdata)) {
	        $data["getdata"] = $getdata;
	    } else {
	        redirect('admincontrol/articles');
	    }

	    $data["sections_headers"] = $this->adminmodel->get_sections_headers();
	    $checkpermission          = $this->checkUserPermission('4', '2');
	    $data["permission"]       = $checkpermission;
	    $this->allpage('articlesaction', $data);
	}

	function deletearticles()
	{
	    $deleteid = $this->input->post("deleteid");
	    $this->checksessionout();

	    $newposition      = $this->adminmodel->getLastPosition() + 1;
        $oldpositiondata  = $this->adminmodel->getdata_articles('row', ['id' => $deleteid]);
        $oldposition      = (int) $oldpositiondata['position'];
        $plusoldposition  = $oldposition + 1;
        $minusoldposition = $oldposition - 1;

        $plusnewposition  = $newposition + 1;
        $minusnewposition = $newposition - 1;

        if ($oldposition > $newposition) {
            $query1 = $this->db->query("update articles set position = position+1 where position >= '" . $newposition . "' AND position <= '" . $oldposition . "' ");
        } elseif ($oldposition < $newposition) {
            $query1 = $this->db->query("update articles set position = position-1 where position >= '" . $plusoldposition . "' AND position <= '" . $newposition . "'");
        }
        
	    $result = $this->adminmodel->deletedata("articles", $deleteid);
	    $this->session->set_flashdata('success', 'Successfully Deleted Article.');
	    redirect('admincontrol/articles');
	}   

	function writers_exists($key, $id = '')
	{
		$this->db->where('writers_name', $key);
		if ($id != '') $this->db->where('id !=', $id);
		$this->db->where('status', '1');
		$query = $this->db->get('articles_writers');		
		
		if ($query->num_rows() == 0) {
			return true;
		} else {
			$this->form_validation->set_message('writers_exists', 'Sorry, This Writer is already added.');
			return false;
		}
	}

	function writers($id = '')
	{
	    if ($this->input->post()) {	    	    	
	    	$tagid = $this->input->post('id');        
	        $this->form_validation->set_rules('writers_name', 	'Writer Name',		'trim|required|max_length[150]|callback_writers_exists[' . $tagid . ']');
	        if ($this->form_validation->run() != FALSE) {
	        	$requestData = $this->input->post();
	        	
		        $result      = $this->adminmodel->writersAction($requestData);
		        if ($result == 'insert') {
		            $this->session->set_flashdata('success', 'Successfully Created New Writer.');
		        } elseif ($result == 'update') {
		            $this->session->set_flashdata('success', 'Successfully Updated Writer.');
		        } else {
		            $this->session->set_flashdata('error', 'Try Later.');
		        }
		        redirect('admincontrol/writers');
		    }
	    }

	    $this->checksessionout();
	    $this->checkUserPermission('4', '1', '1');
	    $data["header_title"]      = $this->magazine_writers_title;
	    $data["header_title2"]     = $this->magazine_writers_title2;
	    $data["leftsidebar_value"] = $this->magazine_writers_value;

	    $checkpermission    = $this->checkUserPermission('4', '2');
	    $data["permission"] = $checkpermission;

	    if ($id == '') {
	        $data["action"]  = "new";
	        $data["getdata"] = $this->adminmodel->getdata_writers();
	    } else {
	        $data["action"] = "edit";
	        $datas          = $this->adminmodel->getdata_writers($id);
	        if ($datas) {
	            $data["data"]    = $datas;
	            $data["getdata"] = $this->adminmodel->getdata_writers();
	        } else {
	            redirect('admincontrol/writers');
	        }
	    }

	    $this->allpage('writers', $data);
	}

	function deletewriters()
	{
		$data = [
            'status' => '0',
        ];
	    $deleteid = $this->input->post("deleteid");
	    $this->checksessionout();
	    $this->adminmodel->updatedata("articles_writers", $data, $deleteid);	    
	    $this->session->set_flashdata('success', 'Successfully Deleted Writer.');
	    redirect('admincontrol/writers');
	}

	function autocomplete_writers() {
        $returnData = array();

        $conditions['searchTerm'] = $this->input->get('term');
        $conditions['conditions']['status'] = '1';
        $skillData = $this->adminmodel->autocomplete_writers($conditions);
                
        if(!empty($skillData)){
            foreach ($skillData as $row){
                $data['id'] = $row['id'];
                $data['value'] = $row['writers_name'];
                array_push($returnData, $data);
            }
        }
                
        echo json_encode($returnData);die;
    }	

    function client_exists($key, $id = '')
	{
		$this->db->where('client_name', $key);
		if ($id != '') $this->db->where('id !=', $id);
		$this->db->where('status', '1');
		$query = $this->db->get('advertising_clients');		
		
		if ($query->num_rows() == 0) {
			return true;
		} else {
			$this->form_validation->set_message('client_exists', 'Sorry, This Client Name is already added.');
			return false;
		}
	}

	function email_exists($key, $id = '')
	{
		$this->db->where('email', $key);
		if ($id != '') $this->db->where('id !=', $id);
		$this->db->where('status', '1');
		$query = $this->db->get('advertising_clients');		
		
		if ($query->num_rows() == 0) {
			return true;
		} else {
			$this->form_validation->set_message('email_exists', 'Sorry, This Email Address is already added.');
			return false;
		}
	}

	function login_exists($key, $id = '')
	{
		$this->db->where('login', $key);
		if ($id != '') $this->db->where('id !=', $id);
		$this->db->where('status', '1');
		$query = $this->db->get('advertising_clients');		
		
		if ($query->num_rows() == 0) {
			return true;
		} else {
			$this->form_validation->set_message('login_exists', 'Sorry, This Login is already added.');
			return false;
		}
	}

    function clients($id = '')
	{
	    if ($this->input->post()) {	  	    		     
	    	$id = $this->input->post('id');
	       	
	       	$this->form_validation->set_rules('client_name', 'Client Name', 'trim|required|max_length[150]|callback_client_exists[' . $id . ']');
	       	
	       	$this->form_validation->set_rules('email', 'Email Address', 'trim|required|callback_email_exists[' . $id . ']');
	       	
	       	$this->form_validation->set_rules('login', 'Login Password', 'trim|required|max_length[15]|callback_login_exists[' . $id . ']');

	        if ($this->form_validation->run() != FALSE) {
	        	$requestData = $this->input->post();
	        	
		        $result      = $this->adminmodel->clientsAction($requestData);
			    if ($result == 'insert') {
			    	$this->session->set_flashdata('success', 'Successfully Created New Client.');
				} elseif ($result == 'update') {
			    	$this->session->set_flashdata('success', 'Successfully Updated Client.');
			    } else {
			    	$this->session->set_flashdata('error', 'Try Later.');
			    }
			    redirect('admincontrol/clients');
		    }
	    }

	    $this->checksessionout();
	    $this->checkUserPermission('3', '1', '1');
	    $data["header_title"]      = $this->advertising_clients_title;
	    $data["header_title2"]     = $this->advertising_clients_title2;
	    $data["leftsidebar_value"] = $this->advertising_clients_value;

	    $checkpermission    = $this->checkUserPermission('3', '2');
	    $data["permission"] = $checkpermission;

	    if ($id == '') {
	        $data["action"]  = "new";
	        $data["getdata"] = $this->adminmodel->getdata_clients();
	    } else {
	        $data["action"] = "edit";
	        $datas          = $this->adminmodel->getdata_clients($id);
	        if ($datas) {
	            $data["data"]    = $datas;
	            $data["getdata"] = $this->adminmodel->getdata_clients();
	        } else {
	            redirect('admincontrol/clients');
	        }
	    }

	    $this->allpage('clients', $data);
	}

	function deleteclients()
	{
		$data = [
            'status' => '0',
        ];
	    $deleteid = $this->input->post("deleteid");
	    $this->checksessionout();
	    $this->adminmodel->updatedata("advertising_clients", $data, $deleteid);	    
	    $this->session->set_flashdata('success', 'Successfully Deleted Client.');
	    redirect('admincontrol/clients');
	}

	function adbanners()
	{	    
	    $this->checksessionout();
	    $userdetails 		= 	$this->getUserDetails();
	    if ($userdetails['warehouse_staff'] =='0') {
			$this->checkUserPermission('3', '1', '1');
		}

	    $data["header_title"]      = $this->advertising_adbanners_title;
	    $data["header_title2"]     = $this->advertising_adbanners_title2;
	    $data["leftsidebar_value"] = $this->advertising_adbanners_value;

	    if ($userdetails['warehouse_staff'] == '0') {	
	    	$checkpermission		=	$this->checkUserPermission('3', '2');
			$data["permission"] 	= 	$checkpermission;		
			$data["getdata"]    = $this->adminmodel->getdata_adbanners('all');	
		}else{			
			$data["getdata"]    = $this->adminmodel->getdata_adbanners('all', ['advert_type' => '2', 'warehouse_staff' => '1']);				
		}	
	    $this->allpage('adbanners', $data);
	}

	function newadbanners()
	{
	    if ($this->input->post()) {
	        $reportData = $this->input->post();
	        $result = $this->adminmodel->adbannersaction($reportData);
	        if ($result) {
	            $this->session->set_flashdata('success', 'Successfully Created new Advertisement.');
	        } else {
	            $this->session->set_flashdata('error', 'Try Later.');
	        }
	        redirect('admincontrol/adbanners');
	    }	    
	    
	    $this->checksessionout();
	    $userdetails 		= 	$this->getUserDetails();
	    if ($userdetails['warehouse_staff'] =='0') {
			$this->checkUserPermission('3', '1', '1');
		}

	    if ($userdetails['warehouse_staff'] == '0') {
			$data["pagesdata"]=$this->adminmodel->getfulldata("pages", ['pagetype' => 'bannerlist', 'warehouse_staff' => '0']);
		}else{
			$data["pagesdata"]=$this->adminmodel->getfulldata("pages", ['pagetype' => 'bannerlist', 'warehouse_staff' => '1']);
		}

	    if ($userdetails['warehouse_staff'] =='0') {
			$checkpermission		=	$this->checkUserPermission('3', '2');
			$data["permission"] 	= 	$checkpermission;
		}	

	    $currentdate               = date("Y-m-d");
	    $data["fromdate"]          = $currentdate;
	    $data["todate"]            = $currentdate;
	    $data["client_name_list"]  = $this->adminmodel->getdata_clients();
	    $data["header_title"]      = $this->advertising_adbanners_title;
	    $data["header_title2"]     = $this->advertising_adbanners_title2;
	    $data["leftsidebar_value"] = $this->advertising_adbanners_value;
	    $data["getdata"]           = '';	    
	    
	    $this->allpage('adbannersaction', $data);
	}

	function editadbanners()
	{
	    if ($this->input->post()) {
	        $reportData = $this->input->post();	    
	        // echo "<pre>";    print_r($reportData); die();
	        $result     = $this->adminmodel->adbannersaction($reportData);	        
	        if ($result) {
	            $this->session->set_flashdata('success', 'Successfully Updated Advertisement.');
	        } else {
	            $this->session->set_flashdata('error', 'Try Later.');
	        }
	        redirect('admincontrol/adbanners');
	    }	    

	    $this->checksessionout();
	    $userdetails 		= 	$this->getUserDetails();
	    if ($userdetails['warehouse_staff'] =='0') {
			$this->checkUserPermission('3', '1', '1');
		}
		
	    if ($userdetails['warehouse_staff'] == '0') {
			$data["pagesdata"]=$this->adminmodel->getfulldata("pages", ['pagetype' => 'bannerlist', 'warehouse_staff' => '0']);
		}else{
			$data["pagesdata"]=$this->adminmodel->getfulldata("pages", ['pagetype' => 'bannerlist', 'warehouse_staff' => '1']);
		}

	    if ($userdetails['warehouse_staff'] =='0') {
			$checkpermission		=	$this->checkUserPermission('3', '2');
			$data["permission"] 	= 	$checkpermission;
		}
	    
	    $uid         = $this->uri->segment(3);
	    $userid      = $this->getUserID();	   
	    $currentdate               = date("Y-m-d");
	    $data["fromdate"]          = $currentdate;
	    $data["todate"]            = $currentdate;
	    $data["client_name_list"]  = $this->adminmodel->getdata_clients();
	    $data["header_title"]      = $this->advertising_adbanners_title;
	    $data["header_title2"]     = $this->advertising_adbanners_title2;
	    $data["leftsidebar_value"] = $this->advertising_adbanners_value;

	    $getdata                   = $this->adminmodel->getdata_adbanners('row', ['id' => $uid]);
	    if (!empty($getdata)) {
	        $data["getdata"] = $getdata;
	    } else {
	        redirect('admincontrol/adbanners');
	    }

	    $data["sections_headers"] = $this->adminmodel->get_sections_headers();	    
	    $this->allpage('adbannersaction', $data);
	}

	function deleteadbanners()
	{
	    $deleteid = $this->input->post("deleteid");
	    $this->checksessionout();
	    $result = $this->adminmodel->deletedata("advertising_adbanners", $deleteid);
	    $this->session->set_flashdata('success', 'Successfully Deleted Advertisement.');
	    redirect('admincontrol/adbanners');
	}

	function autocomplete_clients() {
        $returnData = array();

        $conditions['searchTerm'] = $this->input->get('term');
        $conditions['conditions']['status'] = '1';
        $skillData = $this->adminmodel->autocomplete_clients($conditions);
                
        if(!empty($skillData)){
            foreach ($skillData as $row){
                $data['id'] = $row['id'];
                $data['value'] = $row['client_name'];
                array_push($returnData, $data);
            }
        }
                
        echo json_encode($returnData);die;
    }	

    function reports_exists($key, $id = '')
	{
		$this->db->where('report_name', $key);
		if ($id != '') $this->db->where('id !=', $id);
		$this->db->where('status', '1');
		$query = $this->db->get('articles_comments_reports');		
		
		if ($query->num_rows() == 0) {
			return true;
		} else {
			$this->form_validation->set_message('reports_exists', 'Sorry, This Report Reason is already added.');
			return false;
		}
	}

    function commentsreports($id = '')
	{
	    if ($this->input->post()) {	    	    		    	
	    	$reportid = $this->input->post('id');        
	    	$this->form_validation->set_rules('report_name', 	'Report Reason',		'trim|required|max_length[150]|callback_reports_exists[' . $reportid . ']');	        
	        if ($this->form_validation->run() != FALSE) {
	        	$requestData = $this->input->post();

		        $result      = $this->adminmodel->commentsreportsAction($requestData);
		        if ($result == 'insert') {
		            $this->session->set_flashdata('success', 'Successfully Created New Report.');
		        } elseif ($result == 'update') {
		            $this->session->set_flashdata('success', 'Successfully Updated Report.');
		        } else {
		            $this->session->set_flashdata('error', 'Try Later.');
		        }
		        redirect('admincontrol/commentsreports');
		    }
	    }

	    $this->checksessionout();
	    $this->checkUserPermission('4', '1', '1');
	    $data["header_title"]      = $this->magazine_reports_title;
	    $data["header_title2"]     = $this->magazine_reports_title2;
	    $data["leftsidebar_value"] = $this->magazine_reports_value;

	    $checkpermission    = $this->checkUserPermission('4', '2');
	    $data["permission"] = $checkpermission;

	    if ($id == '') {
	        $data["action"]  = "new";
	        $data["getdata"] = $this->adminmodel->getdata_commentsreports();
	    } else {
	        $data["action"] = "edit";
	        $datas          = $this->adminmodel->getdata_commentsreports($id);
	        if ($datas) {
	            $data["data"]    = $datas;
	            $data["getdata"] = $this->adminmodel->getdata_commentsreports();
	        } else {
	            redirect('admincontrol/commentsreports');
	        }
	    }

	    $this->allpage('commentsreports', $data);
	}

	function deletecommentsreports()
	{
		$data = [
            'status' => '0',
        ];
	    $deleteid = $this->input->post("deleteid");
	    $this->checksessionout();
	    $this->adminmodel->updatedata("articles_comments_reports", $data, $deleteid);	    
	    $this->session->set_flashdata('success', 'Successfully Deleted Report.');
	    redirect('admincontrol/commentsreports');
	}

	public function positionchange()
    {
        if ($this->input->post()) {
            $postData = $this->input->post();
            $newposition      = (int) $postData['position'];

            $last_pos = $this->adminmodel->getLastPosition();
            if(($newposition >= 1) && ($newposition <= $last_pos)){
	            $article_id       = $postData['id'];            
	            $oldpositiondata  = $this->adminmodel->getdata_articles('row', ['id' => $article_id]);
	            $oldposition      = (int) $oldpositiondata['position'];
	            $plusoldposition  = $oldposition + 1;
	            $minusoldposition = $oldposition - 1;

	            $plusnewposition  = $newposition + 1;
	            $minusnewposition = $newposition - 1;

	            if ($oldposition > $newposition) {
	                $query1 = $this->db->query("update articles set position = position+1 where position >= '" . $newposition . "' AND position <= '" . $minusoldposition . "' ");

	                $query2 = $this->db->query("update articles set position = '$newposition' where id = '" . $article_id . "'");
	            } elseif ($oldposition < $newposition) {
	                $query1 = $this->db->query("update articles set position = position-1 where position >= '" . $plusoldposition . "' AND position <= '" . $newposition . "'");

	                $query2 = $this->db->query("update articles set position = '$newposition' where id = '" . $article_id . "'");
	            }

	            if ($query1 || $query2) {
	                $this->session->set_flashdata('success', 'Successfully positions Updated.');
	            } else {
	                $this->session->set_flashdata('error', 'Try Later.');
	            }
	            redirect('admincontrol/articles');
	        }else {
	           	$this->session->set_flashdata('error', 'Please enter a value between 1 and '.$last_pos.'.');
	           	redirect('admincontrol/articles');
			}	        
	    }
    }

    function newdashboard(){
		$this->checksessionout();
		$data["header_title"]=$this->newdashboard_title;
		$data["header_title2"]="";
		$data["leftsidebar_value"]=$this->newdashboard_value;

		if(! $this->input->post("activeval")){ $condition="1"; } 
		else{ 
			if($this->input->post("activeval") == 1){ $condition="1"; }
			else{ $condition="0"; }
		}
		
		if(! $this->input->post("fromdateA")){
			$currentdateA 	= date("Y-m-d");
			$fromdateA 		= date('Y-m-01', strtotime($currentdateA)); 
			$todateA 		= date('Y-m-t', strtotime($currentdateA));
		}else{
			$fromdateA 		= $this->input->post("fromdateA");  
			$todateA 		= $this->input->post("todateA");
			$searchtype 	= $this->input->post("searchtype");
		}
		
		$userdetails 				= $this->getUserDetails();
		$fromdateA1 				= date("Y-m-d", strtotime($fromdateA));
		$todateA1 					= date("Y-m-d", strtotime($todateA));
		$data["fromdateA"] 			= $fromdateA1;
		
		$data["warehouse_staff"] 	= $userdetails['warehouse_staff'];
		$data["todateA"] 			= $todateA1;
		$data["userdetails"] 		= $userdetails;
		$data["daterangevalueA"] 	= $this->input->post("daterangevalueA");
		$data["activestatus"]   	= $condition;
		$data["getdata"] 			= $this->adminmodel->getdata_newdashboard($condition,$fromdateA1,$todateA1, ['warehouse_staff' => $userdetails['warehouse_staff']]);

		if(! $this->input->post("fromdate")){
			$currentdate 	= date("Y-m-d");
			$fromdate1 		= date('Y-m-01', strtotime($currentdate)); 
			$todate1 		= date('Y-m-t', strtotime($currentdate));
		}
		else{

			$fromdate1 		= $this->input->post("fromdate");  
			$todate1 		= $this->input->post("todate");
			$searchtype 	= $this->input->post("searchtype");
		}
		
		$fromdate 				= date("Y-m-d", strtotime($fromdate1));
		$todate 				= date("Y-m-d", strtotime($todate1));
		$data["fromdate"] 		= $fromdate;
		$data["todate"] 		= $todate;
		$data["daterangevalue"] =$this->input->post("daterangevalue");
		$data["activestatus"]   = $condition;
		$data["searchtype"] 	= isset($searchtype) ? $searchtype : '';
		
		$data["getdata2"] 		=$this->adminmodel->getdata_dashboardpages($fromdate,$todate, ['warehouse_staff' => $userdetails['warehouse_staff']]);			
			
		$this->allpage('newdashboard',$data);
	}

	// ADVANCED VALVES

    public function productrange(){
    	$data["header_title"] 		= $this->advanced_valves_title;
		$data["header_title2"] 		= "";
		$data["leftsidebar_value"] 	= $this->advanced_valves_value;

		$this->checkUserPermission('37', '1', '1');

		$checkpermission    	= $this->checkUserPermission('37', '2');
		$data["permission"] 	= $checkpermission;
		$data["getdata"] 		= $this->adminmodel->getdata_productrange();
		// echo "<pre>";print_r($data["getdata"]);die;
		$this->allpage('productrangelist',isset($data) ? $data : '');
    }

    public function newproductrange(){
    	$data["header_title"] 		= $this->advanced_valves_title;
		$data["header_title2"] 		= "";
		$data["leftsidebar_value"] 	= $this->advanced_valves_value;

		$this->checkUserPermission('37', '1', '1');

		$checkpermission    	= $this->checkUserPermission('37', '2');
		$data["action"] 		= "new";
		$data["permission"] 	= $checkpermission;
		$data["getdata"] 		= $this->adminmodel->getdata_productrange();
		$this->allpage('productrangeaction',isset($data) ? $data : '');
    }

    public function editproductrange($id = ''){
    	$data["header_title"] 		= $this->advanced_valves_title;
		$data["header_title2"] 		= "";
		$data["leftsidebar_value"] 	= $this->advanced_valves_value;

		$this->checkUserPermission('37', '1', '1');

		$checkpermission    	= $this->checkUserPermission('37', '2');
		$data["permission"] 	= $checkpermission;
		$data["action"] 		= "edit";
		$data["getdata"] 		= $this->adminmodel->getsingledata('productrange', $id);
		// echo "<pre>";print_r($data["getdata"]);die;
		$this->allpage('productrangeaction',isset($data) ? $data : '');
    }

    public function productrangeaction(){
    	if($this->input->post("insert") || $this->input->post("update")){
    		// echo "<pre>";print_r($this->input->post());die;

    		if ($this->input->post("selecttype") =='2') {
				$this->form_validation->set_rules("pdfcontent","Content",'trim|required');
				// $this->form_validation->set_rules("pdfposition","Position",'trim|required');
				$this->form_validation->set_rules("pdfdescription","Description",'trim|required');
					if (empty($_FILES['pdffile']['name']) && $this->input->post("insert") =='1'){
					    $this->form_validation->set_rules('pdffile', 'PDF File', 'required');
					}
					if($this->form_validation->run()==FALSE){
						if($this->input->post("insert")){
							$this->newproductrange();
						}
						if($this->input->post("update")){
							$this->editproductrange($this->input->post("updateid"));
						}
					}else{

					$productguidesid=$this->uri->segment(3);
					$productguidessection1id=$this->uri->segment(4);

					if ($_FILES['pdffile']['name'] !='') {
						$config_image=array();
						$config_image['upload_path']='./images';
						$config_image['allowed_types']='jpg|jpeg|png|pdf';
						$config_image['encrypt_name']=TRUE;
						$this->load->library('upload',$config_image);			
						if ( ! $this->upload->do_upload('pdffile')){
							//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
						}
						else{
							$imagedata=$this->upload->data();
							if ($this->upload->data('file_ext') == '.pdf') {
								$type = '2';
							}else{
								$type = '1';
							}
							$imagefile=$imagedata['file_name'];
						}
					}

					if ($_FILES['featfile']['name'] !='') {
						$config_image=array();
						$config_image['upload_path']='./images';
						$config_image['allowed_types']='jpg|jpeg|png|pdf';
						$config_image['encrypt_name']=TRUE;
						$this->load->library('upload',$config_image);			
						if ( ! $this->upload->do_upload('featfile'))
						{
							// print_r($this->upload->display_errors()); print_r($this->input->post("featfile")); die;
						}
						else
						{
							$imagedata=$this->upload->data();
							$featfile=$imagedata['file_name'];
						}
					}

					if ($this->input->post('display') =='1') {
						$display = '1';
					}else{
						$display = '0';
					}

					if ($this->input->post('display_content') =='1') {
						$display_content = '1';
					}else{
						$display_content = '0';
					}

					$data=array(
						"content" => $this->input->post("pdfcontent"),
						"position" => $this->input->post("pdfposition"),
						// "published" => $this->input->post("pdfpublishid"),
						"published" => '1',
						"display" => $display,
						"display_content" => $display_content,
						"description" => $this->input->post("pdfdescription"),
						"type" => isset($type) ? $type : '2',
						"image" => NULL

					);

					if(isset($imagefile)){
						$data['file']=$imagefile;
					}
					if(isset($featfile)){
						$data['feat_file']=$featfile;
					}

					if($this->input->post("insert")){				
						$this->adminmodel->insertdata("productrange",$data);
						redirect('admincontrol/productrange');
					}			
					if($this->input->post("update")){
						$this->adminmodel->updatedata("productrange",$data,$this->input->post("updateid"));
						redirect('admincontrol/productrange');
					}
				}

			}elseif($this->input->post("selecttype") =='1'){

				$this->form_validation->set_rules("content","Content",'trim|required');
				$this->form_validation->set_rules("description","Description",'trim|required');
				// $this->form_validation->set_rules("position","Position",'trim|required|numeric');
				if($this->form_validation->run()==FALSE){
					if($this->input->post("insert")){
						$this->newproductrange();
					}
					if($this->input->post("update")){
						$this->editproductrange($this->input->post("updateid"));
					}
				}else{
					
					$productguidesid=$this->uri->segment(3);
					$productguidessection1id=$this->uri->segment(4);

					if ($_FILES['imagefile']['name'] !='') {
						$config_image=array();
						$config_image['upload_path']='./images';
						$config_image['allowed_types']='jpg|jpeg|png|pdf';
						$config_image['encrypt_name']=TRUE;
						$this->load->library('upload',$config_image);			
						if ( ! $this->upload->do_upload('imagefile')){
							//print_r($this->upload->display_errors()); print_r($this->input->post("imagefile")); die;
						}
						else{
							$imagedata=$this->upload->data();
							
							$imagefile=$imagedata['file_name'];
						}
					}

					if ($this->input->post('display') =='1') {
						$display = '1';
					}else{
						$display = '0';
					}

					if ($this->input->post('display_content') =='1') {
						$display_content = '1';
					}else{
						$display_content = '0';
					}

					$data=array(
						"content" => $this->input->post("content"),
						"position" => $this->input->post("position"),
						// "published" => $this->input->post("publishid"),
						"published" => '1',
						"display" => $display,
						"display_content" => $display_content,
						"description" => $this->input->post("description"),
						"type" => isset($type) ? $type : '1',
						"feat_file" => NULL,
						"file" => NULL,

					);
					if(isset($imagefile)){
						$data['image']=$imagefile;
					}	
					if($this->input->post("insert")){				
						$this->adminmodel->insertdata("productrange",$data);
						redirect('admincontrol/productrange');
					}			
					if($this->input->post("update")){
						$this->adminmodel->updatedata("productrange",$data,$this->input->post("updateid"));
						redirect('admincontrol/productrange');
					}		
				}

			}

    	}else{
    		redirect('admincontrol/productrange');
    	}
    }

    public function deleteproductrange(){

    	$deleteid = $this->input->post("deleteid");
		$this->checksessionout();		
		$this->adminmodel->deletedata("productrange",$deleteid);		
		redirect('admincontrol/productrange');

    }

    public function advancedcontactus(){
    	$data["header_title"] 		= $this->advanced_valves_contactus_title;
		$data["header_title2"] 		= "";
		$data["leftsidebar_value"] 	= $this->advanced_valves_contactus_value;

		$this->checkUserPermission('38', '1', '1');

		$checkpermission    	= $this->checkUserPermission('38', '2');
		$data["permission"] 	= $checkpermission;

		$data["getdata"] 		= $this->adminmodel->getdata_productrangecontactus();
		$this->allpage('productrange_contactuslist',isset($data) ? $data : '');
    }

    function newadvancedcontactus(){
		$this->checksessionout();
		$data["header_title"] 			= $this->advanced_valves_contactus_title;
		$data["header_title2"] 			= $this->advanced_valves_contactus_title2;
		$data["leftsidebar_value"] 		= $this->advanced_valves_contactus_value;
		$data["action"] 				= "new";		
		$this->allpage('productrange_contactusaction',$data);
	}

    public function viewadvancedcontactus($id = ''){
    	$data["header_title"] 		= $this->advanced_valves_contactus_title;
		$data["header_title2"] 		= "";
		$data["leftsidebar_value"] 	= $this->advanced_valves_contactus_value;

		$this->checkUserPermission('38', '1', '1');

		$checkpermission    	= $this->checkUserPermission('38', '2');
		$data["permission"] 	= $checkpermission;
		$data["action"] 		= "view";

		$data["getdata"] 		= $this->adminmodel->getsingledata('advanced_valves_contactus', $id);
		$this->allpage('productrange_contactusaction',isset($data) ? $data : '');
    }

    function advancecontactaction(){
		if($this->input->post("insert") || $this->input->post("update")){
			$this->form_validation->set_rules("name","Name",'trim|required');
			$this->form_validation->set_rules("email","Email",'trim|required');			
			if($this->form_validation->run()==FALSE){
				if($this->input->post("insert")){					
					$this->newadvancedcontactus();
				}
				// if($this->input->post("update")){
				// 	$this->editcontact();
				// }
			}		
			else{			
				
							
				$data=array(
				"name" => $this->input->post("name"),				
				"email" => $this->input->post("email"),
				/*"mobile" => $this->input->post("mobile"),
				"address" => $this->input->post("address"),*/
				"message" => $this->input->post("message"),
				"published" => '1'
				);					
							
				if($this->input->post("insert")){				
					$this->adminmodel->insertdata("advanced_valves_contactus",$data);
					$this->advancedcontactus();
				}			
				if($this->input->post("update")){
					$this->adminmodel->updatedata("advanced_valves_contactus",$data,$this->input->post("updateid"));
					$this->advancedcontactus();
				}		
			}
		}
		else{			
			$this->advancedcontactus();
		}
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminmodel extends CI_Model {

	function login($username,$email){		
		$this->db->where("name",$username);		
		$this->db->group_start();
			$this->db->where("email",$email);
			$this->db->or_where("password",md5($email));
		$this->db->group_end();		
		$this->db->where("status",'1');
		$this->db->group_start();
			$this->db->where("type",'1');
			$this->db->or_where("type",'2');
		$this->db->group_end();
		$query=$this->db->get("users");
		if($query->num_rows() > 0){			
			$result=$query->row_array();
			return $result;
		}
		else{
			return false;
		}
	}

	public function getPermissions()
	{ 
		$this->db->select('system_user_permission.*');
		$this->db->from('system_user_permission');
		$this->db->where('system_user_permission.status', '1');
		// $this->db->join('system_user_category', 'system_user_permission.category_id = system_user_category.id');

		
		$query = $this->db->get();

		return $query->result();
	}

	function getfulldata($table,$requestdata=[])
	{
		if(isset($requestdata['user_id'])){
			$this->db->where('user_id', $requestdata['user_id']);
		}
		if(isset($requestdata['viewid'])){
			$this->db->where('id', $requestdata['viewid']);
		}
		if(isset($requestdata['harmed_id'])){
			$this->db->where_in('id', $requestdata['harmed_id']);
		}
		if(isset($requestdata['personalequipment_id'])){
			$this->db->where_in('id', $requestdata['personalequipment_id']);
		}
		if(isset($requestdata['productguidesid'])){
			$this->db->where_in('productguidesid', $requestdata['productguidesid']);
		}
		if(isset($requestdata['orderby_position'])){
			$this->db->order_by('position ASC');
		}
		if(isset($requestdata['pagetype']) && $requestdata['pagetype'] =='bannerlist'){
			$this->db->where('status', '1');
		}
		if(isset($requestdata['pagename']) && $requestdata['pagename'] =='pirb_licensing'){
			$this->db->order_by('id', 'DESC');
			$this->db->where('published', '1');
		}
		if(isset($requestdata['pagename']) && $requestdata['pagename'] =='productguide_subcategory'){
			$this->db->where('published', '1');
		}
		if(isset($requestdata['extras']) && $requestdata['extras'] =='pagetrue'){
			$this->db->where('published', '1');
		}

		if (isset($requestdata['warehouse_staff']) && $requestdata['warehouse_staff'] =='1') {
			$this->db->where('id', '22');
		}

		
		$query=$this->db->get($table);
		return $query->result_array();
	}  

	function action($table,$requestdata=[])
	{
		$datetime							= 	date('Y-m-d H:i:s');
		$request['createddate'] 			= 	$datetime;
		$request['user_id'] 				= 	(isset($requestdata['user_id'])) ? $requestdata['user_id'] : '';

		if($table == 'vehiclechecklist')
		{		
			$request['team'] 				= (isset($requestdata['team'])) ? $requestdata['team'] : '';
			$request['registration_no'] 	= (isset($requestdata['registration_no'])) ? $requestdata['registration_no'] : '';

			$request['tyres'] 				= (isset($requestdata['tyres'])) ? $requestdata['tyres'] : '';
			$request['tyres_image1'] 		= (isset($requestdata['tyres_image1'])) ? $requestdata['tyres_image1'] : '';
			$request['tyres_image2'] 		= (isset($requestdata['tyres_image2'])) ? $requestdata['tyres_image2'] : '';

			$request['tyres_image3'] 		= (isset($requestdata['tyres_image3'])) ? $requestdata['tyres_image3'] : '';
			$request['tyres_image4'] 		= (isset($requestdata['tyres_image4'])) ? $requestdata['tyres_image4'] : '';
			$request['tyres_image5'] 		= (isset($requestdata['tyres_image5'])) ? $requestdata['tyres_image5'] : '';
			$request['tyres_image6'] 		= (isset($requestdata['tyres_image6'])) ? $requestdata['tyres_image6'] : '';
			$request['tyres_image7'] 		= (isset($requestdata['tyres_image7'])) ? $requestdata['tyres_image7'] : '';
			$request['tyres_image8'] 		= (isset($requestdata['tyres_image8'])) ? $requestdata['tyres_image8'] : '';
			$request['tyres_image9'] 		= (isset($requestdata['tyres_image9'])) ? $requestdata['tyres_image9'] : '';
			$request['tyres_image10'] 		= (isset($requestdata['tyres_image10'])) ? $requestdata['tyres_image10'] : '';

			$request['tyres_faults'] 		= (isset($requestdata['tyres_faults'])) ? $requestdata['tyres_faults'] : '';

			$request['lights'] 				= (isset($requestdata['lights'])) ? $requestdata['lights'] : '';
			$request['lights_image1'] 		= (isset($requestdata['lights_image1'])) ? $requestdata['lights_image1'] : '';
			$request['lights_image2'] 		= (isset($requestdata['lights_image2'])) ? $requestdata['lights_image2'] : '';

			$request['lights_image3'] 		= (isset($requestdata['lights_image3'])) ? $requestdata['lights_image3'] : '';
			$request['lights_image4'] 		= (isset($requestdata['lights_image4'])) ? $requestdata['lights_image4'] : '';
			$request['lights_image5'] 		= (isset($requestdata['lights_image2'])) ? $requestdata['lights_image2'] : '';
			$request['lights_image6'] 		= (isset($requestdata['lights_image6'])) ? $requestdata['lights_image6'] : '';
			$request['lights_image7'] 		= (isset($requestdata['lights_image7'])) ? $requestdata['lights_image7'] : '';
			$request['lights_image8'] 		= (isset($requestdata['lights_image8'])) ? $requestdata['lights_image8'] : '';
			$request['lights_image9'] 		= (isset($requestdata['lights_image9'])) ? $requestdata['lights_image9'] : '';
			$request['lights_image10'] 		= (isset($requestdata['lights_image9'])) ? $requestdata['lights_image9'] : '';

			$request['lights_faults'] 		= (isset($requestdata['lights_faults'])) ? $requestdata['lights_faults'] : '';

			$request['windscreen'] 			= (isset($requestdata['windscreen'])) ? $requestdata['windscreen'] : '';
			$request['windscreen_image1'] 	= (isset($requestdata['windscreen_image1'])) ? $requestdata['windscreen_image1'] : '';
			$request['windscreen_image2'] 	= (isset($requestdata['windscreen_image2'])) ? $requestdata['windscreen_image2'] : '';

			$request['windscreen_image3'] 	= (isset($requestdata['windscreen_image3'])) ? $requestdata['windscreen_image3'] : '';
			$request['windscreen_image4'] 	= (isset($requestdata['windscreen_image4'])) ? $requestdata['windscreen_image4'] : '';
			$request['windscreen_image5'] 	= (isset($requestdata['windscreen_image5'])) ? $requestdata['windscreen_image5'] : '';
			$request['windscreen_image6'] 	= (isset($requestdata['windscreen_image6'])) ? $requestdata['windscreen_image6'] : '';
			$request['windscreen_image7'] 	= (isset($requestdata['windscreen_image7'])) ? $requestdata['windscreen_image7'] : '';
			$request['windscreen_image8'] 	= (isset($requestdata['windscreen_image8'])) ? $requestdata['windscreen_image8'] : '';
			$request['windscreen_image9'] 	= (isset($requestdata['windscreen_image9'])) ? $requestdata['windscreen_image9'] : '';
			$request['windscreen_image10'] 	= (isset($requestdata['windscreen_image10'])) ? $requestdata['windscreen_image10'] : '';

			$request['windscreen_faults'] 	= (isset($requestdata['windscreen_faults'])) ? $requestdata['windscreen_faults'] : '';
			
			$request['body'] 				= (isset($requestdata['body'])) ? $requestdata['body'] : '';
			$request['body_image1'] 		= (isset($requestdata['body_image1'])) ? $requestdata['body_image1'] : '';
			$request['body_image2'] 		= (isset($requestdata['body_image2'])) ? $requestdata['body_image2'] : '';
			$request['body_image3'] 		= (isset($requestdata['body_image3'])) ? $requestdata['body_image3'] : '';
			$request['body_image4'] 		= (isset($requestdata['body_image4'])) ? $requestdata['body_image4'] : '';
			$request['body_image5'] 		= (isset($requestdata['body_image5'])) ? $requestdata['body_image5'] : '';
			$request['body_image6'] 		= (isset($requestdata['body_image6'])) ? $requestdata['body_image6'] : '';
			$request['body_image7'] 		= (isset($requestdata['body_image7'])) ? $requestdata['body_image7'] : '';
			$request['body_image8'] 		= (isset($requestdata['body_image8'])) ? $requestdata['body_image8'] : '';
			$request['body_image9'] 		= (isset($requestdata['body_image9'])) ? $requestdata['body_image9'] : '';
			$request['body_image10'] 		= (isset($requestdata['body_image10'])) ? $requestdata['body_image10'] : '';
			$request['body_faults'] 		= (isset($requestdata['body_faults'])) ? $requestdata['body_faults'] : '';
			
			$request['doorlocks'] 			= (isset($requestdata['doorlocks'])) ? $requestdata['doorlocks'] : '';
			$request['doorlocks_image1'] 	= (isset($requestdata['doorlocks_image1'])) ? $requestdata['doorlocks_image1'] : '';
			$request['doorlocks_image2'] 	= (isset($requestdata['doorlocks_image2'])) ? $requestdata['doorlocks_image2'] : '';

			$request['doorlocks_image3'] 	= (isset($requestdata['doorlocks_image3'])) ? $requestdata['doorlocks_image3'] : '';
			$request['doorlocks_image4'] 	= (isset($requestdata['doorlocks_image4'])) ? $requestdata['doorlocks_image4'] : '';
			$request['doorlocks_image5'] 	= (isset($requestdata['doorlocks_image5'])) ? $requestdata['doorlocks_image5'] : '';
			$request['doorlocks_image6'] 	= (isset($requestdata['doorlocks_image6'])) ? $requestdata['doorlocks_image6'] : '';
			$request['doorlocks_image7'] 	= (isset($requestdata['doorlocks_image7'])) ? $requestdata['doorlocks_image7'] : '';
			$request['doorlocks_image8'] 	= (isset($requestdata['doorlocks_image8'])) ? $requestdata['doorlocks_image8'] : '';
			$request['doorlocks_image9'] 	= (isset($requestdata['doorlocks_image9'])) ? $requestdata['doorlocks_image9'] : '';
			$request['doorlocks_image10'] 	= (isset($requestdata['doorlocks_image10'])) ? $requestdata['doorlocks_image10'] : '';

			$request['doorlocks_faults'] 	= (isset($requestdata['doorlocks_faults'])) ? $requestdata['doorlocks_faults'] : '';
			
			$request['equipment'] 			= (isset($requestdata['equipment'])) ? $requestdata['equipment'] : '';
			$request['equipment_image1'] 	= (isset($requestdata['equipment_image1'])) ? $requestdata['equipment_image1'] : '';
			$request['equipment_image2'] 	= (isset($requestdata['equipment_image2'])) ? $requestdata['equipment_image2'] : '';

			$request['equipment_image3'] 	= (isset($requestdata['equipment_image3'])) ? $requestdata['equipment_image3'] : '';
			$request['equipment_image4'] 	= (isset($requestdata['equipment_image4'])) ? $requestdata['equipment_image4'] : '';
			$request['equipment_image5'] 	= (isset($requestdata['equipment_image5'])) ? $requestdata['equipment_image5'] : '';
			$request['equipment_image6'] 	= (isset($requestdata['equipment_image6'])) ? $requestdata['equipment_image6'] : '';
			$request['equipment_image7'] 	= (isset($requestdata['equipment_image7'])) ? $requestdata['equipment_image7'] : '';
			$request['equipment_image8'] 	= (isset($requestdata['equipment_image8'])) ? $requestdata['equipment_image8'] : '';
			$request['equipment_image9'] 	= (isset($requestdata['equipment_image9'])) ? $requestdata['equipment_image9'] : '';
			$request['equipment_image10'] 	= (isset($requestdata['equipment_image10'])) ? $requestdata['equipment_image10'] : '';

			$request['equipment_faults'] 	= (isset($requestdata['equipment_faults'])) ? $requestdata['equipment_faults'] : '';
			
			$request['warningflag'] 		= (isset($requestdata['warningflag'])) ? $requestdata['warningflag'] : '';
			$request['warningflag_image1'] 	= (isset($requestdata['warningflag_image1'])) ? $requestdata['warningflag_image1'] : '';
			$request['warningflag_image2'] 	= (isset($requestdata['warningflag_image2'])) ? $requestdata['warningflag_image2'] : '';

			$request['warningflag_image3'] 	= (isset($requestdata['warningflag_image3'])) ? $requestdata['warningflag_image3'] : '';
			$request['warningflag_image4'] 	= (isset($requestdata['warningflag_image4'])) ? $requestdata['warningflag_image4'] : '';
			$request['warningflag_image5'] 	= (isset($requestdata['warningflag_image5'])) ? $requestdata['warningflag_image5'] : '';
			$request['warningflag_image6'] 	= (isset($requestdata['warningflag_image6'])) ? $requestdata['warningflag_image6'] : '';
			$request['warningflag_image7'] 	= (isset($requestdata['warningflag_image7'])) ? $requestdata['warningflag_image7'] : '';
			$request['warningflag_image8'] 	= (isset($requestdata['warningflag_image8'])) ? $requestdata['warningflag_image8'] : '';
			$request['warningflag_image9'] 	= (isset($requestdata['warningflag_image9'])) ? $requestdata['warningflag_image9'] : '';
			$request['warningflag_image10'] = (isset($requestdata['warningflag_image10'])) ? $requestdata['warningflag_image10'] : '';
			// print_r($request);die;

			$request['warningflag_faults'] 	= (isset($requestdata['warningflag_faults'])) ? $requestdata['warningflag_faults'] : '';
		}
		
		if($table == 'siterisk_assessment')
		{
			$request['companyname'] 		= (isset($requestdata['companyname'])) ? $requestdata['companyname'] : '';
			$request['task'] 				= (isset($requestdata['task'])) ? $requestdata['task'] : '';
			$request['location'] 			= (isset($requestdata['location'])) ? $requestdata['location'] : '';
			$request['harmed'] 				= (isset($requestdata['harmed'])) ? $requestdata['harmed'] : '';
			$request['controlmeasures'] 	= (isset($requestdata['controlmeasures'])) ? $requestdata['controlmeasures'] : '';
			$request['information'] 		= (isset($requestdata['information'])) ? $requestdata['information'] : '';
			$request['personalequipment'] 	= (isset($requestdata['personalequipment'])) ? $requestdata['personalequipment'] : '';
		}

		if($table == 'significantrisks_temp')
		{
			$request['name'] 				= (isset($requestdata['name'])) ? $requestdata['name'] : '';
			$request['rating'] 				= (isset($requestdata['rating'])) ? $requestdata['rating'] : '';
		}

		if($table == 'significantrisks')
		{
			$request['siterisk_id'] 		= (isset($requestdata['siterisk_id'])) ? $requestdata['siterisk_id'] : '';
			$request['name'] 				= (isset($requestdata['name'])) ? $requestdata['name'] : '';
			$request['rating'] 				= (isset($requestdata['rating'])) ? $requestdata['rating'] : '';
		}

		$updateid							= (isset($requestdata['updateid'])) ? $requestdata['updateid'] : '0';
		if($updateid == '0'){
			$this->db->insert($table, $request);
			$insert_id						=	$this->db->insert_id();
			return $insert_id;
		}
		else{
			$this->db->update($table, $request, ['id' => $updateid]);
			return $updateid;
		}
	}

	function delete($table,$requestdata=[])
	{
		if(isset($requestdata['user_id']))	$this->db->where('user_id', $requestdata['user_id']);
		if(isset($requestdata['deleteid'])){
			$this->db->where('id', $requestdata['deleteid']);
			$deleteid					= 	$requestdata['deleteid'];
			$deleteid					=	$this->db->delete($table);
			return $deleteid;
		}				
	}

	function clear($table,$requestdata=[])
	{
		if(isset($requestdata['user_id']))	$this->db->where('user_id', $requestdata['user_id']);		
		$this->db->delete($table);
		return '1';
						
	}


	function insertdata($table,$data)
	{
		$this->db->insert($table,$data);
		if($this->db->affected_rows() > 0)
			$status=$this->db->insert_id();
		else
			$status=0;
		
		return $status;

	}
	function updatedata($table,$data,$id){
		$this->db->where("id",$id);
		$query=$this->db->update($table,$data);
		if($this->db->affected_rows() > 0)
			$status=1;
		else
			$status=0;
		
		return $status;
	}	
	function deletedata($table,$deleteid)
	{
		$this->db->where("id",$deleteid);
		$query=$this->db->delete($table);
		// $request1['status']	= 	'0';

		// $data = $this->db->update($table, $request1, ['id' => $deleteid]);
	}

	public function bannerInsert($table, $data){

		$data['created_at'] = date('Y-m-d H:i:s');
		$this->db->insert($table,$data);
		return '1';
	}

	public function bannerUpdate($table, $data, $id){

		$datetime		= date('Y-m-d H:i:s');
		$data['updated_at'] = date('Y-m-d H:i:s');
		$adminid = $this->getUserID();

		if ($data['active'] =='0') {
			$data['inactivedate'] = date('Y-m-d H:i:s');

			$log = [
				'bannerid' 			=> $id,
				'admin_id' 			=> $adminid,
				'inactivedate' 		=> $datetime,
				'created_at' 		=> $datetime,
			];

		}

		$this->db->where("id",$id);
		$query=$this->db->update($table,$data);

		if (isset($log)) {
			$this->db->insert('banner_log',$log);
		}
		
		return '1';
		
	}

	public function deleteBanner($id){

		$datetime			= date('Y-m-d H:i:s');
		$data['updated_at'] = date('Y-m-d H:i:s');

		$requestdata = [
				'active' 			=> '2',
			];

		$this->db->update('banner',$requestdata, ['id' => $id]);
		return $id;
	}

	function changestatus($table,$deleteid)
	{
		// $this->db->where("id",$deleteid);
		// $query=$this->db->delete($table);
		$request1['status']	= 	'0';

		$data = $this->db->update($table, $request1, ['id' => $deleteid]);
	}

		
	function getpageid_api($table,$value)
	{			
		$this->db->select('title');
		$this->db->where("id",$value);
		$query=$this->db->get($table);		
		return $query->row_array();
	}
	function getfulldata_api($table,$value,$pageid)
	{			
		$this->db->select('*');
		$this->db->where("topbottom",$value);
		$this->db->where("pagesid",$pageid);
		$this->db->where("active","1");
		$query=$this->db->get($table);		
		return $query->result_array();
	}
	function advertclickcount_api($table,$pagesid,$imageid){
		$this->db->where("pagesid",$pagesid);
		$this->db->where("imageid",$imageid);
		$query=$this->db->get($table);		
		if($query->num_rows() > 0){	
			$result['value']=1;
			$result['data']=$query->row_array();
			return $result;
		}
		else{
			$result['value']=0;
			return $result;
		}
	}
	function visitingcount_api($table,$deviceid,$userid){
		$this->db->where("deviceid",$deviceid);
		$this->db->where("userid",$userid);
		$query=$this->db->get($table);		
		if($query->num_rows() > 0){	
			$result['value']=1;			
		}
		else{
			$result['value']=0;			
		}
		return $result;
	}
	function impressionscount_api($table,$imageid){		
		$this->db->where("id",$imageid);
		$query=$this->db->get($table);		
		if($query->num_rows() > 0){	
			$result['value']=1;
			$result['data']=$query->row_array();
			return $result;
		}
		else{
			$result['value']=0;
			return $result;
		}
	}
	function getfulldata_toolbox_api($table, $requestdata = [])
	{
		$this->db->select('*');
		$this->db->from($table);
		if(isset($requestdata['plublish'])) 		$this->db->where('published', $requestdata['plublish']);
		$query = $this->db->get();

		//$query = $this->db->query("Select * From ".$table." order by position asc");
		return $query->result_array();
	}
	function getfulldata_toolboxsubsection_api($table,$condition)
	{			
		$query = $this->db->query("Select * From ".$table." where toolboxtalksid=".$condition." order by position asc");
		return $query->result_array();
	}	
	function getfulldata_scrolling_api($table,$value)
	{
		$this->db->where("pagesid",$value);
		$query=$this->db->get($table);		
		return $query->result_array();
	}	
	function getsingledata($table,$value)
	{
		$this->db->where("id",$value);
		$query=$this->db->get($table);		
		return $query->row_array();
	}
	function getdata_advertising($condition)
	{			
		//$query = $this->db->query("Select advertising.*,pagename.name as pname From advertising INNER JOIN pagename on pagename.id =advertising.pagenameid WHERE advertising.published=".$condition);		
		
		$this->db->select('advertising.*, pagename.name as pname, advertisingclickcount.totalcount as adtotalcount');
		$this->db->from('advertising');
		$this->db->join('pagename', 'pagename.id = advertising.pagenameid','left');
		$this->db->join('advertisingclickcount', 'advertisingclickcount.pagesid = advertising.pagenameid','left');
		$this->db->where_in('advertising.published', $condition);
		$query = $this->db->get();
		return $query->result_array();
	}	
	function getdata_supplier($condition)
	{			
		$query = $this->db->query("Select * From supplier WHERE active=".$condition);		
		return $query->result_array();
	}
	function getdata_helpcontent($condition)
	{			
		$query = $this->db->query("Select helpcontent.*,section.name as sname From helpcontent INNER JOIN section on section.id =helpcontent.sectionid WHERE helpcontent.published=".$condition);		
		return $query->result_array();
	}
	function getdata_quizzes($condition)
	{			
		$query = $this->db->query("Select * From quizzes WHERE published=".$condition);
		return $query->result_array();
	}
	function getdata_productguides($condition)
	{			
		$query = $this->db->query("Select * From productguides order by content asc");
		return $query->result_array();
	}
	function getdata_productguidessection1($condition,$condition2, $requestdata = [])
	{	
		if (isset($requestdata['pagetype']) && $requestdata['pagetype'] =='productguide_subcategory') {
			$published = '1';
			$query = $this->db->query("Select productguidessection1.*,productguides.content as pgcontent from productguidessection1 LEFT JOIN productguides on productguides.id=productguidessection1.productguidesid WHERE  productguidessection1.productguidesid=".$condition2." AND productguidessection1.published = '".$published."' order by productguidessection1.published asc");
		}else{
			$query = $this->db->query("Select productguidessection1.*,productguides.content as pgcontent from productguidessection1 INNER JOIN productguides on productguides.id=productguidessection1.productguidesid WHERE  productguidessection1.productguidesid=".$condition2." order by productguidessection1.content asc");
		}		
				
		return $query->result_array();
	}
	function getdata_productguidessection2($condition,$condition2, $requestdata = [])
	{
		if (isset($requestdata['pagetype']) && $requestdata['pagetype'] =='apiproductguide_innersubcategory') {
			$published = '1';
			$query = $this->db->query("Select productguidessection2.*,productguidessection1.content as pgcontent from productguidessection2 INNER JOIN productguidessection1 on productguidessection1.id=productguidessection2.productguidessection1id WHERE productguidessection2.productguidessection1id=".$condition2." AND productguidessection2.published=".$published." order by productguidessection2.position asc");	
		}else{
			$query = $this->db->query("Select productguidessection2.*,productguidessection1.content as pgcontent from productguidessection2 INNER JOIN productguidessection1 on productguidessection1.id=productguidessection2.productguidessection1id WHERE productguidessection2.productguidessection1id=".$condition2." order by productguidessection2.id DESC");
		}
		
		return $query->result_array();
	}
	function getdata_productguidessection3($condition,$condition2)
	{			
		$query = $this->db->query("Select productguidessection3.*,productguidessection2.content as pgcontent from productguidessection3 INNER JOIN productguidessection2 on productguidessection2.id=productguidessection3.productguidessection2id WHERE productguidessection3.productguidessection2id=".$condition2." order by productguidessection3.content asc");	
		return $query->result_array();
	}
	function getdata_productguidessection3_api($condition,$condition2)
	{			
		$query = $this->db->query("Select productguidessection2.*,productguidessection1.content as pgcontent from productguidessection2 INNER JOIN productguidessection1 on productguidessection1.id=productguidessection2.productguidessection1id WHERE productguidessection2.productguidessection1id=".$condition2." order by productguidessection2.content asc, productguidessection2.position asc");	
		return $query->result_array();
	}
	function getdata_toolboxtalks($condition)
	{			
		$query = $this->db->query("Select * From toolboxtalks order by position asc");
		return $query->result_array();
	}
	function getdata_toolboxtalkssection1($condition,$condition2)
	{
		$query = $this->db->query("Select toolboxtalkssection1.*,toolboxtalks.content as pgcontent from toolboxtalkssection1 INNER JOIN toolboxtalks on toolboxtalks.id=toolboxtalkssection1.toolboxtalksid WHERE  toolboxtalkssection1.toolboxtalksid=".$condition2." order by toolboxtalkssection1.position asc");		
		return $query->result_array();
	}	
	function getdata_complianceregulations($condition)
	{			
		$query = $this->db->query("Select * From complianceregulations WHERE published=".$condition);
		return $query->result_array();
	}
	function getdata_checklists()
	{			
		$query = $this->db->query("Select * From checklists order by id desc");
		return $query->result_array();
	}
	function getdata_checklistssection1($condition,$condition2)
	{			
		$query = $this->db->query("Select checklistssection1.*,checklists.name as cname from checklistssection1 INNER JOIN checklists on checklists.id=checklistssection1.checklistsid WHERE  checklistssection1.checklistsid=".$condition2." order by checklistssection1.name asc");		
		return $query->result_array();
	}
	function getdata_faqs($condition)
	{			
		$query = $this->db->query("Select * From faqs WHERE published=".$condition);
		return $query->result_array();
	}
	function getdata_pages($condition)
	{			
		$query = $this->db->query("Select * From pages WHERE published=".$condition);
		return $query->result_array();
	}
	function getdata_cpdcontent($condition)
	{			
		$query = $this->db->query("Select cpdcontent.*,cpdsection.name as sname From cpdcontent INNER JOIN cpdsection on cpdsection.id =cpdcontent.cpdsectionid WHERE cpdcontent.published=".$condition);		
		return $query->result_array();
	}
	function getdata_custompage($condition)
	{			
		$query = $this->db->query("Select * From custompage WHERE published=".$condition);
		return $query->result_array();
	}
	function getdata_healthsafetytips($condition)
	{			
		$query = $this->db->query("Select * From healthsafetytips WHERE active=".$condition);
		return $query->result_array();
	}
	function getdata_popupnotification()
	{			
		$query = $this->db->query("Select * From popupnotification order by id desc");
		return $query->result_array();
	}
	function getdata_bannertop($condition,$condition2)
	{			
		//$query = $this->db->query("Select banner.*,pages.title as ptitle From banner INNER JOIN pages on pages.id =banner.pagesid WHERE banner.topbottom='top' and banner.pagesid=".$condition." and active=".$condition2." order by banner.id desc");
		$top="top";
		$this->db->select('banner.*, pages.title as pname, advertisingclickcount.totalcount');
		$this->db->from('banner');
		$this->db->join('pages', 'pages.id = banner.pagesid','left');
		$this->db->join('advertisingclickcount', 'advertisingclickcount.imageid = banner.id','left');
		$this->db->where('banner.topbottom',$top);
		$this->db->where_in('banner.pagesid', $condition);
		$this->db->where_in('banner.active', $condition2);
		$query = $this->db->get(); 
		return $query->result_array();
		
	}
	function getdata_bannertop_1($condition,$condition2)
	{			
		//$query = $this->db->query("Select banner.*,pages.title as ptitle From banner INNER JOIN pages on pages.id =banner.pagesid WHERE banner.topbottom='top' and banner.pagesid=".$condition." and active=".$condition2." order by banner.id desc");
		$groupCodition = array("banner_impressions_count.bannerid", "pages.id");
		$top="top";
		$this->db->select('banner.*, pages.title as pname, sum(banner_impressions_count.impressions) as impressions1, sum(banner_impressions_count.clickscount) as totalcount1');
		$this->db->from('banner');
		$this->db->join('pages', 'pages.id = banner.pagesid','left');
		// $this->db->join('advertisingclickcount', 'advertisingclickcount.imageid = banner.id','left');
		$this->db->join('banner_impressions_count', 'banner_impressions_count.bannerid = banner.id','left');
		$this->db->where('banner.topbottom',$top);
		$this->db->where_in('banner.pagesid', $condition);
		$this->db->where_in('banner.active', $condition2);
		$this->db->group_by($groupCodition);
		$query = $this->db->get(); 
		return $query->result_array();
		
	}
	function getdata_bannerbottom($condition,$condition3)
	{			
		//$query = $this->db->query("Select banner.*,pages.title as ptitle From banner INNER JOIN pages on pages.id =banner.pagesid WHERE banner.topbottom='bottom' and banner.pagesid=".$condition." and active=".$condition3." order by banner.id desc");		
		
		$bottom="bottom";
		$this->db->select('banner.*, pages.title as pname, advertisingclickcount.totalcount');
		$this->db->from('banner');
		$this->db->join('pages', 'pages.id = banner.pagesid','left');
		$this->db->join('advertisingclickcount', 'advertisingclickcount.imageid = banner.id','left');
		$this->db->where('banner.topbottom',$bottom);
		$this->db->where_in('banner.pagesid', $condition);
		$this->db->where_in('banner.active', $condition3);
		$query = $this->db->get();
		
		return $query->result_array();
	}
	function getdata_scrollingticker($condition)
	{			
		$query = $this->db->query("Select scrollingticker.*,pages.title as ptitle From scrollingticker INNER JOIN pages on pages.id =scrollingticker.pagesid WHERE scrollingticker.pagesid=".$condition." order by scrollingticker.id desc");		
		return $query->result_array();
	}
	function getdata_news()
	{			
		$query = $this->db->query("Select * From news order by id desc");
		return $query->result_array();
	}
	function getdata_backbanner()
	{			
		$query = $this->db->query("Select * From backbanner order by id desc");
		return $query->result_array();
	}
	function getdata_serviceratepdf()
	{			
		$query = $this->db->query("Select * From serviceratepdf order by id desc");
		return $query->result_array();
	}
	function getdata_user()
	{			
		$query = $this->db->query("Select * From users order by id desc");
		return $query->result_array();
	}
	function getdata_membership($condition)
	{			
		$query = $this->db->query("Select * From membership WHERE suspended=".$condition);
		return $query->result_array();
	}
	function getdata_category($condition)
	{			
		$query = $this->db->query("Select * From category WHERE published=".$condition);
		return $query->result_array();
	}
	function getdata_location($condition)
	{			
		$query = $this->db->query("Select * From location WHERE published=".$condition);
		return $query->result_array();
	}
	function getdata_toolboxtalkssub($condition)
	{			
		//$query = $this->db->query("Select * From toolboxtalkssub WHERE published=".$condition);
		$query = $this->db->query("Select toolboxtalkssub.*,toolboxtalks.content as tcontent From toolboxtalkssub INNER JOIN toolboxtalks on toolboxtalks.id =toolboxtalkssub.toolboxtalksid WHERE toolboxtalkssub.published=".$condition);
		return $query->result_array();
	}
	function getdata_plumbingafrica()
	{			
		$query = $this->db->query("Select * From plumbingafrica order by id desc");
		return $query->result_array();
	}
	function getdata_item($condition,$userid)
	{			
		//$query = $this->db->query("Select item.*,category.name as catname From category,location.name as locname From Item INNER JOIN category on category.id =item.categoryid, location on location.id=item.locationid WHERE item.active=".$condition);
		
		$this->db->select('item.*, category.category as catname, location.location as locname');
		$this->db->from('item');
		$this->db->join('category', 'category.id = item.categoryid', 'left');
		$this->db->join('location', 'location.id = item.locationid', 'left');
		
		//$this->db->where_in('item.uid', $userid);
		
		$this->db->where('item.active', $condition); 	
		$query = $this->db->get(); 
		return $query->result_array();
	}
	function getdata_itemapi($condition,$userid)
	{			
		//$query = $this->db->query("Select item.*,category.name as catname From category,location.name as locname From Item INNER JOIN category on category.id =item.categoryid, location on location.id=item.locationid WHERE item.active=".$condition);
		
		$this->db->select('item.*, category.category as catname, location.location as locname');
		$this->db->from('item');
		$this->db->join('category', 'category.id = item.categoryid');
		$this->db->join('location', 'location.id = item.locationid');
		if($userid > 0){
		$this->db->where_in('item.uid', $userid); }
				
		$query = $this->db->get(); 
		return $query->result_array();
	}
	function allitemlist($condition)
	{			
		
		$this->db->select('item.*, category.category as catname, location.location as locname');
		$this->db->from('item');
		$this->db->join('category', 'category.id = item.categoryid');
		$this->db->join('location', 'location.id = item.locationid');
		$this->db->where_in('item.active', $condition);		
		$query = $this->db->get(); 
		return $query->result_array();
	}
	function getdata_homeimage()
	{			
		$query = $this->db->query("Select * From homeimage order by id desc");
		return $query->result_array();
	}
	
	/*function getdata_dashboardbanner($condition,$fromdate,$todate)
	{			
		$this->db->select('bannernew.name, bannernew.client,bannernew.description, bannernew.impressions_count, bannernew.click_count, bannernew.pagesid, bannernew.active, pages.title as pname, SUM(bannernew.impressions_count) as bannerimpressions, SUM(bannernew.click_count) as bannerclicks');
        $this->db->from('bannernew');
        $this->db->join('pages', 'pages.id = bannernew.pagesid', 'left');
        $this->db->where('bannernew.topbottom', 'top'); // selecting top banner alone
        $this->db->where_in('bannernew.active', $condition);
        $this->db->where('bannernew.date_created >=', $fromdate);
        $this->db->where('bannernew.date_created <=', $todate);
        $this->db->group_by('bannernew.banner_id');
        $query = $this->db->get();
        // print_r($this->db->last_query());die;
        return $query->result_array();
				
	}*/

	function getdata_dashboardbanner($condition,$fromdate,$todate, $extras = []){

		$groupCodition = array("bic.bannerid", "bic.newpageid");

		$this->db->select('bic.id as bicid, bic.bannerid, bic.newpageid, SUM(bic.impressions) as impressionscount, SUM(bic.clickscount) as clickscount, ban.name as bannername, ban.client, ban.description, ban.topbottom, ban.image, ban.link, ban.active, pg.title as pagename, ban.created_at, ban.inactivedate');
		$this->db->from('banner_impressions_count as bic');
		$this->db->join('banner as ban', 'ban.id = bic.bannerid', 'left');
        $this->db->join('pages as pg', 'pg.id = bic.newpageid', 'left');

        // $this->db->where_in('ban.active', $condition);
        $this->db->where('bic.created_at >=', $fromdate);
        $this->db->where('bic.created_at <=', $todate);
        $this->db->group_by($groupCodition);

        if (isset($extras['warehouse_staff']) && $extras['warehouse_staff'] == '1') {
        	$pageid = $this->config->item('pagesid')[21]; // Builder Page ID
        	$this->db->group_start();
        		$this->db->where('bic.newpageid', $pageid);
        	$this->db->group_end();
        }
        // $this->db->group_by('bic.newpageid');

        $query = $this->db->get();
        // print_r($this->db->last_query());die;
        return $query->result_array();
				
	}
	
	function getdata_dashboardpages($fromdate,$todate, $extras = [])
	{			
		$this->db->select('pages.*,count(pagescount.count) as totalcount');
		$this->db->from('pages');
		$this->db->join('pagescount', 'pagescount.pagesid = pages.id', 'left');		
		$this->db->where('pagescount.date >=',$fromdate);	
		$this->db->where('pagescount.date <=',$todate);

		if (isset($extras['warehouse_staff']) && $extras['warehouse_staff'] == '1') {
        	$pageid = $this->config->item('pagesid')[21]; // Builder Page ID
        	$this->db->group_start();
        		$this->db->where('pages.id', $pageid);
        	$this->db->group_end();
        }

		$this->db->group_by('pagescount.pagesid');

		$query = $this->db->get();
		// print_r($this->db->last_query());die;
		return $query->result_array();
				
	}
	function getservicerates_api($table,$uid,$cname,$categoryid){
		$this->db->where("uid",$uid);
		$this->db->where("cname",$cname);
		$this->db->where("categoryid",$categoryid);
		$query=$this->db->get($table);
		return $query->result_array();
	}
	function getServiceRatesDefault_api($table){
		$this->db->where("isActive","1");
		$query=$this->db->get($table);
		return $query->result_array();
	}
	function getserviceratestot($table,$uid,$cname){
		$this->db->where("uid",$uid);
		$this->db->where("cname",$cname);
		$this->db->select('sum(monthlycost) as TOT from servicerates');
		$query=$this->db->get();
		return $query->row_array();
	}
	function getserviceratestot_year($table,$uid,$cname){
		$this->db->where("uid",$uid);
		$this->db->where("cname",$cname);
		$this->db->select('sum(monthlycost)*12 as TOT from servicerates');
		$query=$this->db->get();
		return $query->row_array();
	}
	function getservicesubcatdropdown($table,$categoryid){
		$this->db->where("categoryid",$categoryid);
		$query=$this->db->get($table);
		return $query->result_array();
	}
	function serviceupdatedata($table,$UpdateData,$id){
		$this->db->where("serviceid",$id);
		$query=$this->db->update($table,$UpdateData);
		if($this->db->affected_rows() > 0){
			$status=1;
		}
		else{
			$status = 0;			
		}
		
		return $status;
	}	
	function servicedeletedata($table,$deleteid)
	{
		$this->db->where("serviceid",$deleteid);
		$query=$this->db->delete($table);				
	}
	function getserviceratesdata($table,$serviceid)
	{
		$this->db->where("serviceid",$serviceid);
		$query=$this->db->get($table);
		return $query->result_array();
	}
	function getservicecategoryfulldata($table)
	{			
		$active=1;
		$this->db->where("isactive",$active);
		$query=$this->db->get($table);		
		return $query->result_array();
	}
	function getservicesubcategoryfulldata($table,$catid)
	{			
		$active=1;
		$this->db->where("isactive",$active);
		$this->db->where("categoryid",$catid);
		$query=$this->db->get($table);		
		return $query->result_array();
	}
	function getservicecategoriesid($table,$servicecategoriesname)
	{			
		$this->db->where("category",$servicecategoriesname);
		$query=$this->db->get($table);		
		return $query->row_array();
	}
	function getsubservicecategoriesid($table,$servicesubcategoriesname)
	{			
		$this->db->where("subcategory",$servicesubcategoriesname);
		$query=$this->db->get($table);		
		return $query->row_array();
	}
	function geyserdeletedata($table,$userid,$elmid,$elmhtml,$cname)
	{
		$this->db->where("userid",$userid);
		$this->db->where("elmid",$elmid);
		$this->db->where("elmhtml",$elmhtml);
		$this->db->where("cname",$cname);
		$query=$this->db->delete($table);
		if($this->db->affected_rows() > 0)
			$status=1;
		else
			$status=0;
		return $status;
	}
	function getgeyserdata($table,$userid,$elmid,$cname)
	{
		$this->db->where("userid",$userid);
		$this->db->where("elmid",$elmid);
		$this->db->where("cname",$cname);
		$query=$this->db->get($table);	
		return $query->row_array();
	}
	function getdata_webinars($condition)
	{			
		$query = $this->db->query("Select * From webinars WHERE active=".$condition);
		return $query->result_array();
	}
	function getdata_radio($condition)
	{			
		$query = $this->db->query("Select * From radio WHERE active=".$condition);
		return $query->result_array();
	}
	function getdata_contact()
	{			
		$query = $this->db->query("Select * From contact order by id desc");
		return $query->result_array();
	}
	function getwebinardata($table,$curdate)
	{		
		$this->db->where('inactivedate >',$curdate);
		$query = $this->db->get($table);
		return $query->result_array();
	}
	function getradiodata($table,$curdate)
	{		
		$this->db->where('inactivedate >',$curdate);
		$query = $this->db->get($table);
		return $query->result_array();
	}
	function getradiodata_singledata($table,$curdate)
	{		
		$this->db->where('inactivedate >',$curdate);
		$this->db->where('livestreamlink = 1');
		$query = $this->db->get($table);
		return $query->result_array();
	}
	//IOPSA
	function getdata_iopsa_membershipfees($condition)
	{			
		$query = $this->db->query("Select * From iopsa_membershipfees WHERE published=".$condition);
		return $query->result_array();
	}

	function getdata_iopsa_homepage($condition)
	{			
		$query = $this->db->query("Select * From iopsa_homepage WHERE published=".$condition);
		return $query->result_array();
	}

	function getdata_iopsa_contactus($condition)
	{			
		$query = $this->db->query("Select * From iopsa_contactus WHERE published=".$condition);
		return $query->result_array();
	}

	function getdata_iopsa_address($condition)
	{			
		$query = $this->db->query("Select * From iopsa_address WHERE published=".$condition);
		return $query->result_array();
	}

	function getdata_iopsa_category($condition)
	{			
		$query = $this->db->query("Select * From iopsa_category WHERE published=".$condition);
		return $query->result_array();
	}

	function getdata_iopsa_province($condition)
	{			
		$query = $this->db->query("Select * From iopsa_province WHERE published=".$condition);
		return $query->result_array();
	}

	function getdata_iopsa_member($condition)
	{			
		$query = $this->db->query("Select * From iopsa_member WHERE published=".$condition);
		return $query->result_array();
	}

	function getdata_iopsa_aimscontent($condition)
	{			
		$query = $this->db->query("Select * From iopsa_aimscontent WHERE published=".$condition);
		return $query->result_array();
	}

	function getdata_iopsa_aimsimage($condition)
	{			
		$query = $this->db->query("Select * From iopsa_aimsimage WHERE published=".$condition);
		return $query->result_array();
	}

	function getdata_iopsa_settings($condition)
	{			
		$query = $this->db->query("Select * From iopsa_settings WHERE published=".$condition);
		return $query->result_array();
	}

	function getdata_pirb_aboutcontent($condition)
	{			
		$query = $this->db->query("Select * From pirb_aboutcontent WHERE published=".$condition);
		return $query->result_array();
	}

	function getdata_pirb_aboutimage($condition)
	{			
		$query = $this->db->query("Select * From pirb_aboutimage WHERE published=".$condition);
		return $query->result_array();
	}

	function getdata_pirb_costcategory($condition)
	{			
		$query = $this->db->query("Select * From pirb_costcategory WHERE published=".$condition);
		return $query->result_array();
	}
	function getdata_pirb_licensing($condition)
	{			
		// $query = $this->db->query("Select * From pirb_licensing  WHERE published=".$condition);
		$query = $this->db->query("Select * From pirb_licensing order by id desc");
		return $query->result_array();
	}

	function getdata_pirb_cost($condition)
	{			
		// $query = $this->db->query("Select * From pirb_cost WHERE published=".$condition);
		$this->db->select('pcc.*,pc.*');
		$this->db->from('pirb_cost pc');
		$this->db->join('pirb_costcategory pcc', 'pcc.id = pc.categoryid');
		$this->db->order_by('pc.categoryid ASC, pc.id DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	function getdata_pirb_contactus($condition)
	{			
		$query = $this->db->query("Select * From pirb_contactus WHERE published=".$condition);
		return $query->result_array();
	}

	function getdata_pirb_address($condition)
	{			
		$query = $this->db->query("Select * From pirb_address WHERE published=".$condition);
		return $query->result_array();
	}

	function getdata_pirb_settings($condition)
	{			
		$query = $this->db->query("Select * From pirb_settings WHERE published=".$condition);
		return $query->result_array();
	}

	function getdata_significantrisks($id)
	{	
		$this->db->select('sr.*,r.name as ratingname');
		$this->db->from('significantrisks sr');
		$this->db->join('risk r', 'r.id = sr.rating');
		$this->db->where('sr.siterisk_id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	function getdata_significantrisks_temp($user_id)
	{	
		$this->db->select('sr.*,r.name as ratingname');
		$this->db->from('significantrisks_temp sr');
		$this->db->join('risk r', 'r.id = sr.rating');
		$this->db->where('sr.user_id', $user_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	function getdata_pirb_registration($condition)
	{			
		$query = $this->db->query("Select * From pirb_registration WHERE published=".$condition);
		return $query->result_array();
	}

	function getdata_advertise_contactus($condition)
	{			
		$query = $this->db->query("Select * From advertise_contactus WHERE published=".$condition);
		return $query->result_array();
	}

	function getdata_advertise_address($condition)
	{			
		$query = $this->db->query("Select * From advertise_address WHERE published=".$condition);
		return $query->result_array();
	}

	function getdata_advertise_settings($condition)
	{			
		$query = $this->db->query("Select * From advertise_settings WHERE published=".$condition);
		return $query->result_array();
	}

	function getdata_buyandsell_items($query=[])
	{			
		
		
		$this->db->select('it.*,lo.location as location,cat.category as categoryname');
		$this->db->from('item it');
		$this->db->join('location lo', 'lo.id = it.locationid');
		$this->db->join('category cat', 'cat.id = it.categoryid');

		if(isset($query['categoryid'])){
			$this->db->where('it.categoryid', $query['categoryid']);
		}
		if(isset($query['userid'])){
			$this->db->where('it.uid', $query['userid']);
		}
		if(isset($query['locationid']) && $query['locationid'] !='0'){
			$this->db->where('it.locationid', $query['locationid']);
		}
		if(!isset($query['appdata'])){
			$this->db->where('it.active', '1');
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	public function fileUpload2($file, $path, $type = '')
    {
        $config['upload_path']   = $path;
        $config['allowed_types'] = ($type == '') ? 'jpeg|jpg|png' : $type;
        $config['remove_spaces'] = true;
        $config['encrypt_name']  = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($file)) {
            return $this->upload->display_errors();
            return '';
        } else {
            $data = $this->upload->data();
            if (in_array($data['image_type'], array('png', 'jpeg', 'jpg'))) {
                //$this->fileResize($data['file_name'], $path);
                $path = rtrim($path, '/') . '/';
                $this->fileResizeCore($path . $data['file_name'], $path . $data['file_name'], 80);
                // image resize
                $this->load->library('image_lib');
                $config_resize['image_library']  = 'gd2';
                $config_resize['create_thumb']   = true;
                $config_resize['maintain_ratio'] = true;
                $config_resize['master_dim']     = 'auto';
                $config_resize['quality']        = "100%";
                $config_resize['source_image']   = './' . $path . $data['file_name'];

                $config_resize['height'] = 100;
                $config_resize['width']  = 100;
                $this->image_lib->initialize($config_resize);
                $this->image_lib->resize();
                $this->fileResizeCore($path . $data['raw_name'] . '_thumb' . $data['file_ext'], $path . $data['raw_name'] . '_thumb' . $data['file_ext'], 80);
                $data['file_name2'] = $data['raw_name'] . '_thumb' . $data['file_ext'];
            }
            return $data;
        }
    }

	public function fileUpload($file, $path, $type='')
	{
		// $this->createDirectory($path);
		
		$config['upload_path']          = $path;
		$config['allowed_types']        = ($type=='') ? 'jpeg|jpg|png' : $type;
		$config['remove_spaces'] 		= true;
		$config['encrypt_name'] 		= true;

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload($file))
		{
			return $this->upload->display_errors();
			return '';
		}
		else
		{
			$data = $this->upload->data();
			if(in_array($data['image_type'], array('png','jpeg','jpg'))){
				//$this->fileResize($data['file_name'], $path);
				$path = rtrim($path, '/').'/';
				$this->fileResizeCore($path.$data['file_name'], $path.$data['file_name'], 80);
			}
			return $data;
		}
	}

	public function fileResizeCore($source, $destination, $quality)
	{
		$info = getimagesize($source);
		if ($info['mime'] == 'image/jpeg') 		$image = imagecreatefromjpeg($source);
		elseif ($info['mime'] == 'image/gif') 	$image = imagecreatefromgif($source);
		elseif ($info['mime'] == 'image/png') 	$image = imagecreatefrompng($source);

		imagejpeg($image, $destination, $quality);
	}
	
	public function createDirectory($path)
	{
		$location = explode('/', $path);
		for($i=0; $i<count($location); $i++)
		{
			if($location[$i]!='.'){
				$dir = implode('/', array_slice($location, 0, $i+1));
				if(!is_dir($dir))
				{
					$mask = umask(0);
					mkdir($dir, 0755);
					umask($mask);
				}
			}
		}
	}
	public function getUserID()
	{
		if($this->session->has_userdata('userid')){
			$userid = $this->session->userdata('userid');			
			$result = $this->db->select('*')->from('users')->where('id', $userid)->get()->row_array();
			
			if($result){
				return $result['id'];
			}else{
				return '';
			}
		}else{
			return '';
		}
	}

	function deletedata1($table,$deleteid)
	{
		$request1['status']	= 	'0';

		$data = $this->db->update($table, $request1, ['id' => $deleteid]);				
	}

	public function getdata_ratemywork_settings($type, $requestdata=[]){

		$this->db->select('rmt.*');
		$this->db->from('ratemywork_settings rmt');

		if($type=='count'){
			$result = $this->db->count_all_results();
		}
		else
		{
			$query = $this->db->get();
			
			if($type=='all') 		$result = $query->result_array();
			elseif($type=='row') 	$result = $query->row_array();
		}
		
		return $result;
	}

	public function ratemywork_settingsAction($data){

		$userid 		= $this->getUserID();
		$id 			= isset($data['mainsettingsid']) ? $data['mainsettingsid'] : '';
		$datetime		= date('Y-m-d H:i:s');
		// echo "<pre>";print_r($data);die;
		
		if(isset($data['numberpost'])) 		$request1['no_post'] 			= $data['numberpost'];
		if(isset($data['votes'])) 			$request1['no_votes'] 			= $data['votes'];
		if(isset($data['monthpost'])) 		$request1['months_granted'] 	= $data['monthpost'];

		if($id==''){
			$request1['created_by']	= 	$userid;
			$request1['created_at']	= 	$datetime;

			$data = $this->db->insert('ratemywork_settings', $request1);
			$id = $this->db->insert_id();

		}else{
			$request1['updated_by']	= 	$userid;
			$request1['updated_at']	= 	$datetime;

			$data = $this->db->update('ratemywork_settings', $request1, ['id' => $id]);
		}
		return $id;
	}

	public function deletepost($data){
		$status 				= $data['status'];
		$id 					= $data['id'];

		$request1['is_delete'] 	= $status;

		$data 	= $this->db->update('posts', $request1, ['id' => $id]);
		
		$request2['is_delete'] = '1';
		$data2 	= $this->db->update('statistcs_toppost', $request2, ['postid' => $id]);
		return $id;
	}

	public function getdata_tagmanagement($type, $requestdata=[]){

		$this->db->select('tm.*');
		$this->db->from('tag_management tm');

		if(isset($requestdata['id'])) 	$this->db->where('tm.id', $requestdata['id']);
		if(isset($requestdata['status'])) 	$this->db->where('tm.status', $requestdata['status']);

		if($type=='count'){
			$result = $this->db->count_all_results();
		}
		else
		{
			$query = $this->db->get();
			
			if($type=='all') 		$result = $query->result_array();
			elseif($type=='row') 	$result = $query->row_array();
		}
		
		return $result;
	}

	public function tagmanagementAction($data){

		$userid 		= $this->getUserID();
		$id 			= isset($data['tagid']) ? $data['tagid'] : '';
		$datetime		= date('Y-m-d H:i:s');
		// echo "<pre>";print_r($data);die;
		
		if(isset($data['tagname'])) 	$request1['tag_name'] 		= $data['tagname'];

		if($id==''){
			$request1['created_by']	= 	$userid;
			$request1['created_at']	= 	$datetime;

			$data = $this->db->insert('tag_management', $request1);
			$id = $this->db->insert_id();

		}else{
			$request1['updated_by']	= 	$userid;
			$request1['updated_at']	= 	$datetime;

			$data = $this->db->update('tag_management', $request1, ['id' => $id]);
		}
		return $id;
	}

	public function tagchangeStatus($data){

		$userid 		= $this->getUserID();
		$id 			= isset($data['tagid']) ? $data['tagid'] : '';
		$datetime		= date('Y-m-d H:i:s');
		
		if(isset($data['status'])) 	$request1['status'] 	= $data['status'];

		$request1['updated_by']	= 	$userid;
		$request1['updated_at']	= 	$datetime;

		$data = $this->db->update('tag_management', $request1, ['id' => $id]);

		return $id;
	}

	public function getdata_reportmanagement($type, $requestdata=[]){

		$this->db->select('rm.*');
		$this->db->from('report_management rm');

		if(isset($requestdata['id'])) 		$this->db->where('rm.id', $requestdata['id']);
		if(isset($requestdata['status'])) 	$this->db->where('rm.status', $requestdata['status']);

		if($type=='count'){
			$result = $this->db->count_all_results();
		}
		else
		{
			$query = $this->db->get();
			
			if($type=='all') 		$result = $query->result_array();
			elseif($type=='row') 	$result = $query->row_array();
		}
		
		return $result;
	}

	public function reportAction($data){

		$userid 		= $this->getUserID();
		$id 			= isset($data['reportid']) ? $data['reportid'] : '';
		$datetime		= date('Y-m-d H:i:s');
		// echo "<pre>";print_r($data);die;
		
		if(isset($data['reportname'])) 	$request1['report_name'] 		= $data['reportname'];

		if($id==''){
			$request1['created_by']	= 	$userid;
			$request1['created_at']	= 	$datetime;

			$data = $this->db->insert('report_management', $request1);
			$id = $this->db->insert_id();

		}else{
			$request1['updated_by']	= 	$userid;
			$request1['updated_at']	= 	$datetime;

			$data = $this->db->update('report_management', $request1, ['id' => $id]);
		}
		return $id;
	}

	public function reportchangeStatus($data){

		$userid 		= $this->getUserID();
		$id 			= isset($data['reportid']) ? $data['reportid'] : '';
		$datetime		= date('Y-m-d H:i:s');
		
		if(isset($data['status'])) 	$request1['status'] 	= $data['status'];

		$request1['updated_by']	= 	$userid;
		$request1['updated_at']	= 	$datetime;

		$data = $this->db->update('report_management', $request1, ['id' => $id]);

		return $id;
	}

	public function postgetList($type, $requestdata=[]){

		$this->db->select('pst.*, us.name as username');
		$this->db->from('posts pst');
		$this->db->join('users us', 'us.id=pst.user_id', 'left');

		if(isset($requestdata['status']))				$this->db->where_in('pst.status', $requestdata['status']);
		if(isset($requestdata['id']))					$this->db->where('pst.id', $requestdata['id']);
		if(isset($requestdata['is_delete']))			$this->db->where('pst.is_delete', $requestdata['is_delete']);

		if(isset($requestdata['startrange']) && $requestdata['startrange']!='')				$this->db->where('DATE(pst.created_at) >=', date('Y-m-d', strtotime($requestdata['startrange'])));
		if(isset($requestdata['endrange']) && $requestdata['endrange']!='')					$this->db->where('DATE(pst.created_at) <=', date('Y-m-d', strtotime($requestdata['endrange'])));

		if (isset($requestdata['taggs']) && (count($requestdata['taggs']) > 0)) {
			$tagsarray = $requestdata['taggs'];
			 $this->db->group_start();
		    foreach($tagsarray as $tagsvalue){
		        $this->db->where("find_in_set($tagsvalue, pst.post_taggs)");
		    }
		    $this->db->group_end();

		}

		if($type!=='count' && isset($requestdata['start']) && isset($requestdata['length'])){
			$this->db->limit($requestdata['length'], $requestdata['start']);
		}
		if(isset($requestdata['order']['0']['column']) && isset($requestdata['order']['0']['dir'])){
			$column = ['pst.id', 'pst.post_title', 'pst.created_at', 'us.name', 'pst.upvote', 'pst.post_reports'];
			$this->db->order_by($column[$requestdata['order']['0']['column']], 'DESC');
		}
		if(isset($requestdata['search']['value']) && $requestdata['search']['value']!=''){
			$searchvalue = $requestdata['search']['value'];
			$this->db->like('us.name', $searchvalue);
			$this->db->or_like('pst.post_title', $searchvalue);
			$this->db->or_like('pst.post_title', $searchvalue);
			$this->db->or_like('pst.created_at', $searchvalue);
			$this->db->or_like('pst.upvote', $searchvalue);
			$this->db->or_like('pst.post_reports', $searchvalue);
		}


		if($type=='count'){
			$result = $this->db->count_all_results();
		}
		else
		{
			$query = $this->db->get();
			
			if($type=='all') 		$result = $query->result_array();
			elseif($type=='row') 	$result = $query->row_array();
		}
		
		return $result;
	}

	public function postaction($data){

		$userid 		= $this->getUserID();
		$id 			= isset($data['id']) ? $data['id'] : '';
		$datetime		= date('Y-m-d H:i:s');
		// echo "<pre>";print_r($data);die;

		if(isset($data['file2']) && $data['file2'] !=''){
			$request1['post_images'] 		= implode(',', $data['file2']);
		}
		if(isset($data['taggs']) && $data['taggs'] !=''){
			$request1['post_taggs'] 		= implode(',', $data['taggs']);
		}
		
		if(isset($data['posttitle'])) 	$request1['post_title'] 		= $data['posttitle'];
		if(isset($data['posttext'])) 	$request1['post_text'] 			= $data['posttext'];
		if(isset($data['user_type'])) 	$request1['user_type'] 			= $data['user_type'];
		$request1['user_id'] 											= $userid;

		if($id==''){
			$request1['created_by']	= 	$userid;
			$request1['created_at']	= 	$datetime;

			$data = $this->db->insert('posts', $request1);
			$id = $this->db->insert_id();

		}else{
			$request1['updated_by']	= 	$userid;
			$request1['updated_at']	= 	$datetime;

			$data = $this->db->update('posts', $request1, ['id' => $id]);
		}
		return $id;
	}

	public function postaction2($data){

		$userid 		= $this->getUserID();
		$id 			= isset($data['id']) ? $data['id'] : '';
		$datetime		= date('Y-m-d H:i:s');
		// echo "<pre>";print_r($data);die;
		
		/*if ($data['reason'] !='') {
			
			$query 		= $this->db->select('*')->from('posts')->where('id', $id)->get();
			$postdata 	= $query->row_array();
			$postarray 	= explode(',', $postdata['post_reports']);
			
			if ($postdata['post_reports'] !='') {
				$reportpush = $postdata['post_reports'].','.$data['reason'];
			}else{
				$reportpush = $data['reason'];
			}
			
		}*/
		if ($data['status'] =='1') {
			$reportpush = '';
			
		}else{
			$reportpush = $data['reason'];
		}
		
		$request1['admin_report'] 									= $reportpush;
		if(isset($data['status'])) 		$request1['status'] 		= $data['status'];
		
		$request1['updated_by']	= 	$userid;
		$request1['updated_at']	= 	$datetime;

		$data = $this->db->update('posts', $request1, ['id' => $id]);

		return $id;
	}

	public function getPosttags($type, $requestdata=[]){
		$this->db->select('tm.*');
		$this->db->from('tag_management tm');
		$this->db->where_in('tm.id', $requestdata['tags']);

		if($type=='count'){
			$result = $this->db->count_all_results();
		}
		else
		{
			$query = $this->db->get();
			
			if($type=='all') 		$result = $query->result_array();
			elseif($type=='row') 	$result = $query->row_array();
		}
		
		return $result;
	}

	public function getStatisticsList($type, $requestdata=[]){
		$datetime	= date('Y-m-d');

		$this->db->select('stats.*');
		$this->db->from('statistcs stats');

		if (isset($requestdata['statisticstype']) && $requestdata['statisticstype'] =='1') {
			$this->db->where('stats.type', $requestdata['statisticstype']);
		}elseif(isset($requestdata['statisticstype']) && $requestdata['statisticstype'] =='2'){
			$this->db->where('stats.type', $requestdata['statisticstype']);
		}

		if (isset($requestdata['type']) && $requestdata['type'] =='progress') {

			$this->db->where('YEAR(stats.post_of) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)');
			$this->db->where('MONTH(stats.post_of) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)');

		}elseif (isset($requestdata['type']) && $requestdata['type'] =='1') {

			$this->db->where('YEAR(stats.post_of) = YEAR(CURRENT_DATE - INTERVAL 2 MONTH)');
			$this->db->where('MONTH(stats.post_of) = MONTH(CURRENT_DATE - INTERVAL 2 MONTH)');

		}elseif(isset($requestdata['type']) && $requestdata['type'] =='2'){
			
			$this->db->where('YEAR(stats.post_of) = YEAR(CURRENT_DATE - INTERVAL 3 MONTH)');
			$this->db->where('MONTH(stats.post_of) = MONTH(CURRENT_DATE - INTERVAL 3 MONTH)');
			
		}elseif(isset($requestdata['type']) && $requestdata['type'] =='3'){
			
			$this->db->where('YEAR(stats.post_of) = YEAR(CURRENT_DATE - INTERVAL 4 MONTH)');
			$this->db->where('MONTH(stats.post_of) = MONTH(CURRENT_DATE - INTERVAL 4 MONTH)');
			
		}elseif(isset($requestdata['type']) && $requestdata['type'] =='4'){
			
			$this->db->where('YEAR(stats.post_of) = YEAR(CURRENT_DATE - INTERVAL 5 MONTH)');
			$this->db->where('MONTH(stats.post_of) = MONTH(CURRENT_DATE - INTERVAL 5 MONTH)');
			
		}elseif(isset($requestdata['type']) && $requestdata['type'] =='5'){
			
			$this->db->where('YEAR(stats.post_of) = YEAR(CURRENT_DATE - INTERVAL 6 MONTH)');
			$this->db->where('MONTH(stats.post_of) = MONTH(CURRENT_DATE - INTERVAL 6 MONTH)');
		}

		if($type=='count'){
			$result = $this->db->count_all_results();
		}
		else
		{
			$query = $this->db->get();
			
			if($type=='all') 		$result = $query->result_array();
			elseif($type=='row') 	$result = $query->row_array();
		}
		
		return $result;
	}

	public function getStatisticsTopPostList($type, $requestdata=[]){

		$this->db->select('*')->from('statistcs_toppost stp');
		$this->db->where('id = (SELECT MAX(id) FROM statistcs_toppost WHERE stp.postid = postid AND stp.is_delete="0")', NULL, FALSE);

		if (isset($requestdata['type']) && $requestdata['type'] =='1') {
			$this->db->group_start();
			$this->db->where('YEAR(stp.created_at) = YEAR(CURRENT_DATE - INTERVAL 2 MONTH)');
			$this->db->where('MONTH(stp.created_at) = MONTH(CURRENT_DATE - INTERVAL 2 MONTH)');
			$this->db->group_end();
		}elseif(isset($requestdata['type']) && $requestdata['type'] =='2'){
			
			$this->db->group_start();
			$this->db->where('YEAR(stp.created_at) = YEAR(CURRENT_DATE - INTERVAL 3 MONTH)');
			$this->db->where('MONTH(stp.created_at) = MONTH(CURRENT_DATE - INTERVAL 3 MONTH)');
			$this->db->group_end();
			
		}elseif(isset($requestdata['type']) && $requestdata['type'] =='3'){
			
			$this->db->group_start();
			$this->db->where('YEAR(stp.created_at) = YEAR(CURRENT_DATE - INTERVAL 4 MONTH)');
			$this->db->where('MONTH(stp.created_at) = MONTH(CURRENT_DATE - INTERVAL 4 MONTH)');
			$this->db->group_end();
			
		}elseif(isset($requestdata['type']) && $requestdata['type'] =='4'){
			
			$this->db->group_start();
			$this->db->where('YEAR(stp.created_at) = YEAR(CURRENT_DATE - INTERVAL 5 MONTH)');
			$this->db->where('MONTH(stp.created_at) = MONTH(CURRENT_DATE - INTERVAL 5 MONTH)');
			$this->db->group_end();
			
		}elseif(isset($requestdata['type']) && $requestdata['type'] =='5'){
			
			$this->db->group_start();
			$this->db->where('YEAR(stp.created_at) = YEAR(CURRENT_DATE - INTERVAL 6 MONTH)');
			$this->db->where('MONTH(stp.created_at) = MONTH(CURRENT_DATE - INTERVAL 6 MONTH)');
			$this->db->group_end();
		}elseif(isset($requestdata['type']) && $requestdata['type'] =='topmonth'){
			
			$this->db->group_start();
			$this->db->where('YEAR(stp.created_at) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)');
			$this->db->where('MONTH(stp.created_at) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)');
			$this->db->group_end();
		}elseif(isset($requestdata['type']) && $requestdata['type'] =='topweek'){
			
			$this->db->group_start();
			$this->db->where('stp.created_at >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY');
			$this->db->where('stp.created_at < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY');
			$this->db->group_end();
		}elseif(isset($requestdata['type']) && $requestdata['type'] =='topyear'){
			
			$this->db->group_start();
			$this->db->where('YEAR(stp.postdate) = YEAR(DATE_SUB(CURDATE(), INTERVAL 1 YEAR))');
			$this->db->group_end();
		}
		

		if($type=='count'){
			$result = $this->db->count_all_results();
		}
		else
		{
			$query = $this->db->get();
			
			if($type=='all') 		$result = $query->result_array();
			elseif($type=='row') 	$result = $query->row_array();
		}
		
		return $result;
	}

	public function systemuserAction($data){
		$userid 			= $this->getUserID();
		$id 				= isset($data['id']) ? $data['id'] : '';
		$datetime			= date('Y-m-d H:i:s');
		$request1['type'] 	= '2';

		if(isset($data['email'])) 		$request1['email'] 			= $data['email'];
		if(isset($data['name'])) 		$request1['name'] 			= $data['name'];
		if(isset($data['password'])) 	$request1['password_raw'] 	= $data['password'];
		if(isset($data['password'])) 	$request1['password'] 		= md5($data['password']);

		$request1['warehouse_staff'] 					= isset($data['warehouse']) ? $data['warehouse'] : '0';
		$request2['read_permission'] 					= isset($data['read']) ? implode(',',$data['read']) : '';
        $request2['write_permission'] 					= isset($data['write']) ? implode(',',$data['write']) : '';

        if(isset($data['comments'])) 		$request3['comments'] 			= $data['comments'];

        if(isset($request1)){
			if($id==''){
				$request1['createddate']	= 	$datetime;

				$userdata = $this->db->insert('users', $request1);
				$id = $this->db->insert_id();
				$action='insert';

			}else{
				$userdata = $this->db->update('users', $request1, ['id' => $id]);
				$action='update';
			}
		}

		if(isset($request2)){
			$request2['user_id'] 		= $id;
			$userdetailid				= isset($data['userdetailid']) ? $data['userdetailid'] : '';

			if($userdetailid==''){
				$request2['created_at']	= 	$datetime;
				$request2['created_by']	= 	$userid;
				$userdetaildata 		= $this->db->insert('users_details', $request2);
				$userdetailid 			= $this->db->insert_id();
			}else{
				$request2['updated_at']	= 	$datetime;
				$request2['updated_by']	= 	$userid;
				$userdetaildata 		= $this->db->update('users_details', $request2, ['id' => $userdetailid]);
			}
		}

		if(isset($request3))
		{
			$request3['user_id'] 	= $id;
			$commentsid				= isset($data['commentsid']) ? $data['commentsid'] : '';

			if($commentsid==''){				
				$usercmtdata 		= $this->db->insert('systemusers_comments', $request3);
				$commentsid 		= $this->db->insert_id();
			}else{				
				$usercmtdata 		= $this->db->update('systemusers_comments', $request3, ['id' => $commentsid]);
			}
		}

		$result['action'] 		= $action;
		$result['id'] 			= $id;
		$result['userdetailid'] = $userdetailid;
		$result['commentsid'] = $commentsid;
		return $result;
	}

	public function getList($type, $requestData = []){
		
		$this->db->select('u.*, ud.id as userdetailid,ud.companyname as contact, ud.profile, cmt.comments, cmt.id as commentsid, ud.read_permission , ud.write_permission');
		$this->db->from('users u');
		$this->db->join('users_details ud', 'u.id=ud.user_id', 'left');
		$this->db->join('systemusers_comments cmt', 'cmt.user_id=u.id', 'left');

		if(isset($requestData['userid'])) 				$this->db->where('u.id', $requestData['userid']);

		if (isset($requestData['pagetype']) && $requestData['pagetype'] =='systemusers') {
			$this->db->where('u.type', '2');
			$this->db->where('u.status', '1');
		}
		if (isset($requestData['pagetype']) && $requestData['pagetype'] =='users') {
			$this->db->where('u.type', '3');
		}

		if (isset($requestData['pagetype']) && $requestData['pagetype'] =='api') {
			if(isset($requestData['credential'])){
				$this->db->group_start();
				$this->db->where('u.email', $requestData['credential']);
				$this->db->or_where('u.name', $requestData['credential']);
				$this->db->group_end();
			} 		
		}
		

		if($type=='count'){
			$result = $this->db->count_all_results();
		}
		else
		{
			$query = $this->db->get();
			
			if($type=='all') 		$result = $query->result_array();
			elseif($type=='row') 	$result = $query->row_array();
		}
		
		return $result;	

	}

	public function getdata_tags($id = '')
    {
        /*if ($id == '') {
            $query = $this->db->query("Select * From articles_tags where status = '1' order by id desc");
            return $query->result_array();
        } else {
            $query = $this->db->query("Select * From articles_tags where status = '1' and id =" . $id);
            return $query->result_array();
        }*/

        if ($id == '') {
            $query = $this->db->query("SELECT t1.*,(SELECT COUNT(1) FROM articles t2 WHERE t2.tags LIKE CONCAT('%', t1.tag_name, '%')) AS tag_count FROM articles_tags t1 WHERE t1.status = '1' ORDER BY id DESC");
            return $query->result_array();
        } else {
            $query = $this->db->query("SELECT t1.*,(SELECT COUNT(1) FROM articles t2 WHERE t2.tags LIKE CONCAT('%', t1.tag_name, '%')) AS tag_count FROM articles_tags t1 WHERE t1.status = '1' AND t1.id =" . $id);
            return $query->result_array();
        }
    }

    public function tagsAction($data)
    {
    	$userid   = $this->getUserID();
        $action               = '';
        $id                   = isset($data['id']) ? $data['id'] : '';
        $datetime             = date('Y-m-d H:i:s');
        $request1['tag_name'] = $data['tag_name'];

        if ($id == '') {
        	$request1['created_by'] = $userid;
            $request1['created_at'] = $datetime;
            $data                   = $this->db->insert('articles_tags', $request1);
            $id                     = $this->db->insert_id();
            $action                 = 'insert';
        } else {
        	$request1['updated_by'] = $userid;
            $request1['updated_at'] = $datetime;
            $data                   = $this->db->update('articles_tags', $request1, ['id' => $id]);
            $action                 = 'update';
        }
        return $action;
    }

    public function getdata_comments()
    {
        $this->db->select('ac.*, ar.title as article_name, us.name as user_name')->select('(SELECT COUNT(id) FROM articles_comments_likes WHERE comment_id = ac.id AND ACTION = "1") AS likes', false)->select('(SELECT COUNT(id) FROM articles_comments_likes WHERE comment_id = ac.id AND ACTION = "0") AS dislikes', false)->select('(SELECT COUNT(id) FROM articles_comments_reports_count WHERE comment_id = ac.id) AS reports', false);
        $this->db->from('articles_comments ac');
        $this->db->join('articles ar', 'ar.id = ac.posted_on_article', 'left');
        $this->db->join('users us', 'us.id = ac.posted_by', 'left');
        $this->db->where('ac.status', '1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function commentsAction($data)
    {
        $action   = '';
        $id       = isset($data['id']) ? $data['id'] : '';
        $datetime = date('Y-m-d H:i:s');

        if ($id == '') {
            $request1['created_at'] = $datetime;
            $data                   = $this->db->insert('articles_comments', $request1);
            $id                     = $this->db->insert_id();
            $action                 = 'insert';

        } else {
            $request1['published']  = $data['value'];
            $request1['updated_at'] = $datetime;
            $data                   = $this->db->update('articles_comments', $request1, ['id' => $id]);
            $action                 = 'update';
        }
        return $action;
    }

    public function get_sections_headers($id = '')
    {
        if ($id == '') {
            $query = $this->db->query("Select * From articles_sections_headers order by id");
            return $query->result_array();
        } else {
            $query = $this->db->query("Select * From articles_sections_headers where id =" . $id);
            return $query->result_array();
        }
    }
    
    public function getTagData()
    {	
    	$this->db->select('tag_name');
    	$this->db->from('articles_tags');
    	$this->db->where('status', '1');
    	$query = $this->db->get();			
    	$result = $query->result_array();		
		return $result;
	}
	
	public function getdata_articles($type, $requestData = [])
	{			
		$this->db->select('ac.*, COUNT(acc.id) as commentcount');
		$this->db->from('articles ac');        
		$this->db->join('articles_comments acc', 'acc.posted_on_article = ac.id AND acc.status = "1"', 'left');
		if(isset($requestData['id'])) 				$this->db->where('ac.id', $requestData['id']);
		
		$this->db->group_by('ac.id');
        if (isset($requestData['order'])) {
            $this->db->order_by('ac.id');
        }else{
            $this->db->order_by('ac.position ASC');
        }
		
		if($type=='count'){
			$result = $this->db->count_all_results();
		}else{
			$query = $this->db->get();			
			if($type=='all') 		$result = $query->result_array();
			elseif($type=='row') 	$result = $query->row_array();
		}
		
		return $result;			
	}

	public function articlesaction($data)
	{		
	    $userid   = $this->getUserID();
	    $id       = isset($data['id']) ? $data['id'] : '';
	    $datetime = date('Y-m-d H:i:s');    	    

	    if (!isset($data['published'])) {	    	
		    if (isset($data['publishid'])) {
		        $request1['published'] = 1;
		    } else {
		        $request1['published'] = 0;
		    }

		    if (isset($data['fromdate'])) {
		        $request1['start_date'] = date("Y-m-d", strtotime($data['fromdate']));
		    }
		    
	    	if (isset($data['todate']) && $data['todate'] != '') {
		        $request1['end_date'] = date("Y-m-d", strtotime($data['todate']));
		    }

		    if (isset($data['title'])) {
		        $request1['title'] = $data['title'];
		    }

		    if (isset($data['description'])) {
		        $request1['description'] = $data['description'];
		    }

		    if (isset($data['image1'])) {
		        $request1['file'] = $data['image1'];
		    }

		    if (isset($data['image1thumb'])) {
                $request1['file_thumb'] = $data['image1thumb'];
            }

		    if (isset($data['position'])) {
		        $request1['position'] = $data['position'];
		    }

		    if (isset($data['writers_name'])) {
		        $request1['writers_name'] = $data['writers_name'];
		    }

		    if (isset($data['selecttype'])) {
		        if ($data['selecttype'] == 1) {
		            $request1['detail_file'] = $data['image4'];
		            $request1['detail_file_type'] = 'Audio';

		            if(isset($data['audiofrontimg'])){
		        		$request1['audio_image'] = $data['image1'];	
		        		$request1['as_per_front_audioimg'] = '1';	        				        		
		        	}else{
		        		$request1['audio_image'] = $data['audio_image'];
		        		$request1['as_per_front_audioimg'] = '0';		        		
		        	}
		        } elseif ($data['selecttype'] == 2) {
		            $request1['detail_file'] = $data['image3'];
		            $request1['detail_file_type'] = 'Video';
		        } elseif ($data['selecttype'] == 3) {
		        	if(isset($data['frontimg'])){
		        		$request1['detail_file'] = $data['image1'];		        		
		        		$request1['as_per_front_img'] = '1';
		        	}else{
		        		$request1['detail_file'] = $data['image2'];
		        		$request1['as_per_front_img'] = '0';
		        	}		            
		            $request1['detail_file_type'] = 'Image';
		        }
		    }

		    if (isset($data['level1'])) {
		        $request1['details_level1'] = $data['level1'];
		    }

		    if (isset($data['level2'])) {
		        $request1['details_level2'] = $data['level2'];
		    }

		    if (isset($data['sections_headers']) && $data['sections_headers'] != '') {
		        $request1['sections_headers'] = implode(',', $data['sections_headers']);
		    }

		    if (isset($data['tags'])) {
		        $request1['tags'] = $data['tags'];
		    }
		}else{
			$request1['published']  = $data['value'];
		}

	    if ($id == '') {
	        $request1['created_by'] = $userid;
	        $request1['created_at'] = $datetime;

	        $data = $this->db->insert('articles', $request1);
	        $id   = $this->db->insert_id();
	    } else {
	        $request1['updated_by'] = $userid;
	        $request1['updated_at'] = $datetime;

	        $data = $this->db->update('articles', $request1, ['id' => $id]);
	    }
	    return $id;
	}

	public function getdata_writers($id = '')
    {
        if ($id == '') {
            $query = $this->db->query("Select * From articles_writers where status = '1' order by id desc");
            return $query->result_array();
        } else {
            $query = $this->db->query("Select * From articles_writers where status = '1' and id =" . $id);
            return $query->result_array();
        }
    }

    public function writersAction($data)
    {
    	$userid   = $this->getUserID();
        $action               = '';
        $id                   = isset($data['id']) ? $data['id'] : '';
        $datetime             = date('Y-m-d H:i:s');
        $request1['writers_name'] = $data['writers_name'];

        if ($id == '') {
        	$request1['created_by'] = $userid;
            $request1['created_at'] = $datetime;
            $data                   = $this->db->insert('articles_writers', $request1);
            $id                     = $this->db->insert_id();
            $action                 = 'insert';
        } else {
        	$request1['updated_by'] = $userid;
            $request1['updated_at'] = $datetime;
            $data                   = $this->db->update('articles_writers', $request1, ['id' => $id]);
            $action                 = 'update';
        }
        return $action;
    }

    function autocomplete_writers($params = array()){
        $this->db->select("*");
        $this->db->from("articles_writers");
        
        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key,$value);
            }
        }
        
        //search by terms
        if(!empty($params['searchTerm'])){
            $this->db->like('writers_name', $params['searchTerm']);
        }
        
        $this->db->order_by('writers_name', 'asc');
        
        if(array_key_exists("id",$params)){
            $this->db->where('id',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }

        //return fetched data
        return $result;
    }    

    public function clientsAction($data)
    {
    	$userid   = $this->getUserID();
        $action               = '';
        $id                   = isset($data['id']) ? $data['id'] : '';
        $datetime             = date('Y-m-d H:i:s');

        $request1['client_name'] 	= $data['client_name'];
        $request1['contact_person'] = $data['contact_person'];
        $request1['contact_number'] = $data['contact_number'];
        $request1['email'] 			= $data['email'];
        $request1['login'] 			= $data['login'];

        if ($id == '') {
        	$request1['created_by'] = $userid;
            $request1['created_at'] = $datetime;
            $data                   = $this->db->insert('advertising_clients', $request1);
            $id                     = $this->db->insert_id();
            $action                 = 'insert';
        } else {
        	$request1['updated_by'] = $userid;
            $request1['updated_at'] = $datetime;
            $data                   = $this->db->update('advertising_clients', $request1, ['id' => $id]);
            $action                 = 'update';
        }
        return $action;
    }

    public function getdata_clients($id = '')
    {
        if ($id == '') {
            $query = $this->db->query("Select * From advertising_clients where status = '1' order by id desc");
            return $query->result_array();
        } else {
            $query = $this->db->query("Select * From advertising_clients where status = '1' and id =" . $id);
            return $query->result_array();
        }
    }

    public function getdata_adbanners($type, $requestData = [])
	{							
		$this->db->select('ad.*, cl.client_name, SUM(ct.impressions) AS count_impressions, SUM(ct.clickscount) AS count_clicks, pg.title as pagename');
		$this->db->from('advertising_adbanners ad');	
		$this->db->join('advertising_clients cl', 'cl.id = ad.client_id', 'left');
		$this->db->join('advertising_adbanners_impressions_count ct', 'ct.bannerid = ad.id', 'left');
		$this->db->join('pages as pg', 'pg.id = ad.page_id', 'left');

		if(isset($requestData['id'])) 				$this->db->where('ad.id', $requestData['id']);

		$this->db->group_by('ad.id');
		$this->db->order_by('ad.id desc');	
		
		if($type=='count'){
			$result = $this->db->count_all_results();
		}else{
			$query = $this->db->get();			
			if($type=='all') 		$result = $query->result_array();
			elseif($type=='row') 	$result = $query->row_array();
		}
		
		return $result;			
	}

	function autocomplete_clients($params = array()){
        $this->db->select("*");
        $this->db->from("advertising_clients");
        
        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key,$value);
            }
        }
        
        //search by terms
        if(!empty($params['searchTerm'])){
            $this->db->like('client_name', $params['searchTerm']);
        }
        
        $this->db->order_by('client_name', 'asc');
        
        if(array_key_exists("id",$params)){
            $this->db->where('id',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }

        //return fetched data
        return $result;
    }

    public function adbannersaction($data)
	{
	    $userid         = $this->getUserID();
	    $id             = isset($data['id']) ? $data['id'] : '';
	    $datetime       = date('Y-m-d H:i:s');
	    $request1['autoplay_video'] = '0';
	    $request1['reason'] = NULL;

	    if (isset($data['c_status'])) {
	    	$request1['campaign_status'] = $data['c_status'];
	        if ($data['c_status'] == 2) {
	        	if (isset($data['c_status'])) {
	        		$request1['reason'] = $data['reason'];
	        	}
	        } 
	    }	

	    if (isset($data['advert_type'])) {
	    	$request1['advert_type'] = $data['advert_type'];
	        if ($data['advert_type'] == 0 || $data['advert_type'] == 1) {
	        	if (isset($data['level'])) {
	        		$request1['level'] = $data['level'];
	        		$request1['page_id'] = 0;
	        	}
	       	} elseif ($data['advert_type'] == 2) {
	       		if (isset($data['pages'])) {
	        		$request1['page_id'] = $data['pages'];
	        		$request1['level'] = NULL;
	        	}
	       	}
	    }	

	    if (isset($data['fromdate'])) {
	        $request1['start_date'] = date("Y-m-d", strtotime($data['fromdate']));
	    }

	    if (isset($data['todate']) && $data['todate'] != '') {
	        $request1['end_date'] = date("Y-m-d", strtotime($data['todate']));
	    }

	    if (isset($data['description'])) {
	        $request1['description'] = $data['description'];
	    }

	    if (isset($data['url'])) {
	        $request1['url'] = $data['url'];
	    }

	    if (isset($data['impression'])) {
	        $request1['impressions'] = $data['impression'];
	    }

	    if (isset($data['client_name'])) {
	        $request1['client_id'] = $data['client_name'];
	    }

	    if (isset($data['media'])) {
	        if ($data['media'] == 2) {
	            $request1['file']      = $data['image'];
	            $request1['file_type'] = 'Image';
	        } elseif ($data['media'] == 1) {
	            $request1['file']      = $data['video'];
	            $request1['file_type'] = 'Video';
	            if (isset($data['autoplay_video'])) {
	                $request1['autoplay_video'] = '1';
	            }
	        }
	    }

	    if ($id == '') {
	        $request1['created_by'] = $userid;
	        $request1['created_at'] = $datetime;

	        $data = $this->db->insert('advertising_adbanners', $request1);
	        $id   = $this->db->insert_id();
	    } else {
	        $request1['updated_by'] = $userid;
	        $request1['updated_at'] = $datetime;

	        $data = $this->db->update('advertising_adbanners', $request1, ['id' => $id]);
	    }
	    return $id;
	}

	public function getdata_commentsreports($id = '')
    {
        if ($id == '') {
            $query = $this->db->query("Select * From articles_comments_reports where status = '1' order by id desc");
            return $query->result_array();
        } else {
            $query = $this->db->query("Select * From articles_comments_reports where status = '1' and id =" . $id);
            return $query->result_array();
        }
    }

    public function commentsreportsAction($data)
    {
    	$userid   = $this->getUserID();
        $action               = '';
        $id                   = isset($data['id']) ? $data['id'] : '';
        $datetime             = date('Y-m-d H:i:s');
        $request1['report_name'] = $data['report_name'];

        if ($id == '') {
        	$request1['created_by'] = $userid;
            $request1['created_at'] = $datetime;
            $data                   = $this->db->insert('articles_comments_reports', $request1);
            $id                     = $this->db->insert_id();
            $action                 = 'insert';
        } else {
        	$request1['updated_by'] = $userid;
            $request1['updated_at'] = $datetime;
            $data                   = $this->db->update('articles_comments_reports', $request1, ['id' => $id]);
            $action                 = 'update';
        }
        return $action;
    }

    public function getLastPosition()
    {
        $this->db->select_max('position');
        $result = $this->db->get('articles')->row();
        $data   = $result->position;
        return $data;
    }

    public function getdata_newdashboard($condition,$fromdate,$todate, $extras = []){
		$groupCodition = array("bic.bannerid", "bic.newpageid");			

		$this->db->select('bic.id as bicid, bic.bannerid, bic.newpageid, SUM(bic.impressions) as impressionscount, SUM(bic.clickscount) as clickscount, ban.client_id, ban.description, ban.file, ban.url, ban.campaign_status, pg.title as pagename, ban.created_at, ban.inactive_date, cl.client_name');
		$this->db->from('advertising_adbanners_impressions_count as bic');		
		$this->db->join('advertising_adbanners as ban', 'ban.id = bic.bannerid', 'left');
		$this->db->join('advertising_clients cl', 'cl.id = ban.client_id', 'left'); 
        $this->db->join('pages as pg', 'pg.id = bic.newpageid', 'left');

        // $this->db->where_in('ban.active', $condition);
        $this->db->where('bic.created_at >=', $fromdate);
        $this->db->where('bic.created_at <=', $todate);
        $this->db->group_by($groupCodition);

        if (isset($extras['warehouse_staff']) && $extras['warehouse_staff'] == '1') {
        	$pageid = $this->config->item('pagesid')[21]; // Builder Page ID
        	$this->db->group_start();
        		$this->db->where('bic.newpageid', $pageid);
        	$this->db->group_end();
        }
        // $this->db->group_by('bic.newpageid');

        $query = $this->db->get();
        // print_r($this->db->last_query());die;
        return $query->result_array();				
	}

	function getfulldata_newapi($table,$pageid)
	{			
		$this->db->select('*');	
		$this->db->where("page_id",$pageid);
		$this->db->where("campaign_status","1");
		$query=$this->db->get($table);		
		return $query->result_array();
	}

	public function getdata_productrange($data =[]){
    	$this->db->select('pr.*');
    	$this->db->from('productrange as pr');
    	
    	if (isset($data['id'])) $this->db->where('pr.id', $data['id']);

    	$query = $this->db->get();
    	$result = $query->result_array();

		return $result;
    }

    public function getdata_productrangecontactus($data =[]){
    	$this->db->select('advc.*');
    	$this->db->from('advanced_valves_contactus as advc');
    	$this->db->order_by('advc.id', 'DESC');
    	
    	if (isset($data['id'])) $this->db->where('advc.id', $data['id']);

    	$query = $this->db->get();
    	$result = $query->result_array();

		return $result;
    }
}

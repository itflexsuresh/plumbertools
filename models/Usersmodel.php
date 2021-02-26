<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usersmodel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	function login($username,$email){
		$this->db->where("name",$username);
		$this->db->where("email",$email);
		$query=$this->db->get("users");
		if($query->num_rows() > 0){			
			$result=$query->row_array();
			return $result;
		}
		else{
			return false;
		}
	}

	public function checkMailstatus($data){
		$credential 	= $data['email'];

		$this->db->select('u.*');
		$this->db->from('users u');
		$this->db->group_start();
		$this->db->where('u.email', $credential);
		$this->db->or_where('u.name', $credential);
		$this->db->or_where('u.temp_email', $credential);
		$this->db->group_end();
		$this->db->where('u.type', '3');
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;

	}

	public function userAuthenticationValidator($data){
		$email 		= $data['email'];
		$password 	= isset($data['password']) ? $data['password'] : '';

		$this->db->select('u.*');
		$this->db->from('users u');
		$this->db->group_start();
		$this->db->where('u.email', $email);
		$this->db->or_where('u.name', $email);
		$this->db->or_where('u.temp_email', $email);
		$this->db->group_end();
		$this->db->where('u.type', '3');

		$query 	= $this->db->get();
		$result = $query->row_array();

		return $result;
	}

	public function userAuthentication($data){

		$email 		= $data['email'];
		$password 	= $data['password'];

		$this->db->select('u.*');
		$this->db->from('users u');
		$this->db->group_start();
		$this->db->where('u.temp_email', $email);
		$this->db->where('u.type', '3');
		$this->db->group_end();
		$tempcount = $this->db->count_all_results();
		if($tempcount=='1'){
			$resultdata['userdata'] = '';
			$resultdata['password_attempt'] = '3';
			$resultdata['message'] = 'Please Activiate Your Email';
			$resultdata['staus'] = '3';
		}else{
			$this->db->select('u.*');
			$this->db->from('users u');
			$this->db->group_start();
			$this->db->where('u.email', $email);
			$this->db->or_where('u.name', $email);
			$this->db->group_end();
			$usercount = $this->db->count_all_results();

			if($usercount!='1'){
				$resultdata['userdata'] = [];
				$resultdata['password_attempt'] = '3';
				$resultdata['message'] = 'User not found';
				$resultdata['staus'] = '0';
			}else{
				$this->db->select('u.*');
				$this->db->from('users u');
				$this->db->group_start();
				$this->db->where('u.email', $email);
				$this->db->or_where('u.name', $email);
				$this->db->group_end();
				// $this->db->where('u.password', md5($password));
				$this->db->where('u.password', $password);
				$resultset = $this->db->count_all_results();
				if($resultset!='1'){

					$this->db->select('u.*');
					$this->db->from('users u');
					$this->db->group_start();
					$this->db->where('u.email', $email);
					$this->db->or_where('u.name', $email);
					$this->db->group_end();
					$query = $this->db->get();
					$result = $query->row_array();
					if ($result['password_attempt'] > '1') {

						$this->db->set('password_attempt', 'password_attempt  -1',FALSE); 
						$this->db->where('id', $result['id']); 
						$this->db->update('users');
						$resultdata['password_attempt'] = $result['password_attempt']-1;
						$resultdata['message'] = 'Incorrect credentials!';
						$resultdata['staus'] = '2';
					}else{

						$this->db->set('password_attempt', 'password_attempt  +2',FALSE); 
						$this->db->where('id', $result['id']); 
						$this->db->update('users');
						$resultdata['password_attempt'] = $result['password_attempt']-1;
						$resultdata['message'] = 'Max attempts reached! Try again in';
						$resultdata['staus'] = '2';
					}
				}else{
					
					$this->db->select('u.*');
					$this->db->from('users u');
					$this->db->group_start();
					$this->db->where('u.email', $email);
					$this->db->or_where('u.name', $email);
					$this->db->group_end();
					$query = $this->db->get();
					$result = $query->row_array();

					$this->db->set('password_attempt', '3'); 
					$this->db->where('id', $result['id']); 
					$this->db->update('users');

					$resultdata['userdata'] = $result;
					$resultdata['password_attempt'] = '3';
					$resultdata['message'] = 'Login Sucessfull';
					$resultdata['staus'] = '1';
				}

			}
		}
		return $resultdata;

	}

	public function Logaction($id, $userdetailid ='', $type =''){

		if ($type == 'login') {
			$request1['log'] 	= '1';
		}elseif($type == 'logout'){
			$request1['log'] 	= '0';
			$request2['pirbverification'] = '0';
		}
		
		$this->db->update('users', $request1, ['id' => $id]);

		if (isset($request2)) {
			$this->db->update('users_details', $request2, ['id' => $userdetailid]);
		}
		
	}

	public function getList($type, $requestData = []){
		
		$this->db->select('u.*, ud.id as userdetailid,ud.companyname as contact, ud.profile, otp.otpcode, otp.created_at, ud.read_permission , ud.write_permission');
		$this->db->from('users u');
		$this->db->join('users_details ud', 'u.id=ud.user_id', 'left');
		$this->db->join('otp otp', 'otp.user_id=u.id', 'left');

		if(isset($requestData['userid'])) 				$this->db->where('u.id', $requestData['userid']);
		if(isset($requestData['status'])) 				$this->db->where('u.status', $requestData['status']);
		if(isset($requestData['is_ban'])) 				$this->db->where('u.is_ban', $requestData['is_ban']);
		if(isset($requestData['type'])) 				$this->db->where('u.type', $requestData['type']);
		if(isset($requestData['email'])) {

			$this->db->where('u.email', $requestData['email']);
			$this->db->or_where('u.name', $requestData['email']);
		}


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


	public function action ($data){
		$userid 		= $this->getUserID();
		$id 			= $data['id'];
		$datetime		= date('Y-m-d H:i:s');
		// echo "<pre>";print_r($data);die;
		
		if(isset($data['email'])) 		$request1['email'] 			= $data['email'];
		// if(isset($data['password'])) 	$request1['password'] 		= $data['password'];
		// if(isset($data['password'])) 	$request1['password_raw'] 	= md5($data['password']);
		if(isset($data['name'])) 		$request1['name'] 			= $data['name'];
		if(isset($data['is_ban'])) 		$request1['is_ban'] 		= $data['is_ban'];
		if(isset($data['mailstatus'])) 	$request1['mailstatus'] 	= $data['mailstatus'];

		if(isset($request1)){
			if($id==''){
				$request1['createddate']	= 	$datetime;
				$request1['type']			= 	'3';
				$request1['device_type']	= 	isset($data['device_type']) ? $data['device_type'] : '2'; // device 
				
				$userdata = $this->db->insert('users', $request1);
				$id = $this->db->insert_id();

			}else{
				$userdata = $this->db->update('users', $request1, ['id' => $id]);
			}
		}

		if(isset($data['contact'])) 			$request2['companyname'] 		= $data['contact'];
		if(isset($data['profile'])) 			$request2['profile'] 			= $data['profile'];

		if(isset($request2)){
			$request2['user_id'] 	= $id;
			$userdetailid			= $data['userdetailid'];

			if($userdetailid==''){
				$request2['created_at']	= 	$datetime;
				$request2['created_by']	= 	$userid;
				$userdetaildata = $this->db->insert('users_details', $request2);
			}else{
				$request2['updated_at']	= 	$datetime;
				$request2['updated_by']	= 	$userid;
				$userdetaildata = $this->db->update('users_details', $request2, ['id' => $userdetailid]);
			}
		}
		return $id;
	}


	public function getUserDetails($type, $requestdata=[])
	{
		$this->db->select('u.*, ud.read_permission , ud.write_permission');
		$this->db->from('users u');
		$this->db->join('users_details ud', 'u.id=ud.user_id', 'left');
		
		if(isset($requestdata['id'])) 		$this->db->where('u.id', $requestdata['id']);
		// if(isset($requestdata['type']))		$this->db->where_in('u.type', $requestdata['type']);
		// if(isset($requestdata['status']))	$this->db->where_in('u.status', $requestdata['status']);
		
		$query = $this->db->get();
		
		if($type=='all') 		$result = $query->result_array();
		elseif($type=='row') 	$result = $query->row_array();
		
		return $result;
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


	public function emailvalidation($data){

		$id 		= isset($data['id']) ? $data['id'] : '';
		$email 		= $data['email'];		
		$this->db->where('email', $email);
		if($id!='') $this->db->where('id !=', $id);
		//$this->db->where('status !=', '2');
		$query = $this->db->get('users');
		
		if($query->num_rows() > 0){
			return 'false';
		}else{
			return 'true';
		}
	}
	public function usernamevalidation($data){

		$id 			= isset($data['id']) ? $data['id'] : '';
		$username 		= $data['name'];		
		$this->db->where('name', $username);
		if($id!='') $this->db->where('id !=', $id);
		//$this->db->where('status !=', '2');
		$query = $this->db->get('users');
		
		if($query->num_rows() > 0){
			return 'false';
		}else{
			return 'true';
		}
	}

	public function usernamevalidation1($data){

		$id 			= isset($data['id']) ? $data['id'] : '';		
		$username 		= $data['name'];		
		$this->db->where('name', $username);
		if($id!='') $this->db->where('id !=', $id);

		$this->db->where('type', '2');					
		//$this->db->where('status !=', '2');
		$query = $this->db->get('users');
		
		if($query->num_rows() > 0){
			return 'false';
		}else{
			return 'true';
		}
	}


	public function verification($id)
	{
		$this->db->trans_begin();
		
		$id 		= 	$id;
		$datetime	= 	date('Y-m-d H:i:s');
		
		$users		=	[
							'mailstatus' 	=> '1'
						];
		
		$result = $this->db->update('users', $users, ['id' => $id]);

		if((!isset($result)) || !$result || $this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}

	}
	public function verification2($id)
	{
		$this->db->trans_begin();
		
		$id 		= 	$id;
		$datetime	= 	date('Y-m-d H:i:s');
		$query 		= $this->db->select('*')->from('users')->where('id', $id)->get();
		$result 	= $query->row_array();
		$users		=	[
							'email' 	=> $result['temp_email'],
							'temp_email' => NULL,
						];
		
		$result = $this->db->update('users', $users, ['id' => $id]);

		if((!isset($result)) || !$result || $this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}

	}

	public function changePassword($data){
		$id 			= $data['user_id'];
		// $password 		= $data['password'];
		// $password_raw 	= $data['password_raw'];

		if(isset($data['password'])) 	$request1['password'] 		= md5($data['password']);
		if(isset($data['password'])) 	$request1['password_raw'] 	= $data['password'];

		$userdata 		= $this->db->update('users', $request1, ['id' => $id]);

		return $id;
	}
}

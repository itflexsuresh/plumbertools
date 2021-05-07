<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apimodel extends CI_Model {

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

	public function getList($type, $requestData = []){

		$this->db->select('u.*, ud.id as userdetailid,ud.companyname as contact, ud.profile, ud.pirbverification');
		$this->db->from('users u');
		$this->db->join('users_details ud', 'u.id=ud.user_id', 'left');

		if(isset($requestData['userid'])) 				$this->db->where('u.id', $requestData['userid']);
		if(isset($requestData['email'])) 				$this->db->where('u.email', $requestData['email']);

		if (isset($requestData['pagetype']) && ($requestData['pagetype'] =='api' || $requestData['pagetype'] =='adminotp')) {
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
		$id 			= isset($data['user_id']) ? $data['user_id'] : '';
		$datetime		= date('Y-m-d H:i:s');
		// echo "<pre>";print_r($data);die;
		
		if(isset($data['email'])) 		$request1['email'] 			= $data['email'];
		if(isset($data['password'])) 	$request1['password'] 		= md5($data['password']);
		if(isset($data['password'])) 	$request1['password_raw'] 	= $data['password'];
		if(isset($data['name'])) 		$request1['name'] 			= $data['name'];
		if(isset($data['status'])) 		$request1['status'] 		= $data['status'];
		if(isset($data['banunban'])) 	$request1['is_ban'] 		= $data['banunban'];

		if(isset($data['temp_email']) && ($data['email'] != $data['temp_email'])){
			$request1['temp_email'] = $data['temp_email'];
		}

		if(isset($request1)){
			if($id==''){
				$request1['createddate']	= 	$datetime;
				$request1['type']			= 	'3';
				// $request1['device_type']	= 	isset($data['device_type']) ? $data['device_type'] : '2'; // device type
				$request1['device_type']	= 	'2'; // device 

				$userdata = $this->db->insert('users', $request1);
				$id = $this->db->insert_id();

			}else{
				$userdata = $this->db->update('users', $request1, ['id' => $id]);
			}
		}

		if(isset($data['contact'])) 			$request2['companyname'] 		= $data['contact'];
		if(isset($data['profile_attachment'])) 	$request2['profile'] 			= $data['profile_attachment'];

		if(isset($request2)){
			$request2['user_id'] 	= $id;
			$userdetailid			= isset($data['userdetailid']) ? $data['userdetailid'] : '';

			if($userdetailid=='' && ($userdetailid=='null' || $userdetailid== null)){
				$request2['created_at']	= 	$datetime;
				$request2['created_by']	= 	$id;
				$userdetaildata = $this->db->insert('users_details', $request2);
			}else{
				$request2['updated_at']	= 	$datetime;
				$request2['updated_by']	= 	$id;
				$userdetaildata = $this->db->update('users_details', $request2, ['id' => $userdetailid]);
			}
		}
		return $id;
	}


	public function getUserDetails($type, $requestdata=[])
	{
		$this->db->select('u.*');
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
		$this->db->or_where('temp_email', $email);
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

	public function emailvalidation1($data){

		$id 		= isset($data['id']) ? $data['id'] : '';
		$email 		= $data['email'];

		$this->db->group_start();
			$this->db->where('email', $email);
			$this->db->or_where('temp_email', $email);
			if($id!='') $this->db->where('id !=', $id);
		$this->db->group_end();
		
		$this->db->where('status', '0');
		$query = $this->db->get('users');
		$result = $query->row_array();
		
		if($result !=''){
			return $result;
		}else{
			return 'false';
		}
	}
	public function usernamevalidation1($data){

		$id 			= isset($data['id']) ? $data['id'] : '';
		$username 		= $data['name'];
		
		$this->db->group_start();
			$this->db->where('name', $username);
			if($id!='') $this->db->where('id !=', $id);
		$this->db->group_end();

		$this->db->where('status', '0');
		$query = $this->db->get('users');
		$result = $query->row_array();
		
		if($result !=''){
			return $result;
		}else{
			return 'false';
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

	public function generteOTP($data){

		$datetime				= date('Y-m-d H:i:s');

		$this->db->select('o.*');
		$this->db->from('otp o');
		$this->db->where('o.user_id', $data['userid']);
		$query = $this->db->get();
		$result = $query->row_array();

		if ($result !='') {
			$id 					= $result['id'];
			$request['otpcode'] 	= mt_rand(100000, 999999);
			$request['attempt'] 	= 5;
			$request['status'] 		= '1';
			$request['created_at'] 	= $datetime;

			$otpdata = $this->db->update('otp', $request, ['id' => $id]);
		}else{
			$request['otpcode'] 	= mt_rand(100000, 999999);
			$request['user_id'] 	= $data['userid'];
			$request['status'] 		= '1';
			$request['created_at'] 	= $datetime;

			$otpdata = $this->db->insert('otp', $request);
			$id = $this->db->insert_id();
		}
		return $id;
	}

	public function OTPStatus($status, $id){
		$request['status'] = $status;
		$status = $this->db->update('otp', $request, ['id' => $id]);
		return $id;
	}

	public function getOTPlist($type, $requestData = []){

		$this->db->select('ot.*, us.email');
		$this->db->from('otp ot');
		$this->db->join('users us', 'us.id=ot.user_id', 'left');
		
		if(isset($requestData['otpid'])) 		$this->db->where('ot.id', $requestData['otpid']);
		if(isset($requestData['userid'])) 		$this->db->where('ot.user_id', $requestData['userid']);

		$query = $this->db->get();
		
		if($type=='all') 		$result = $query->result_array();
		elseif($type=='row') 	$result = $query->row_array();
		
		return $result;

	}

	public function VAlidateOTP($data){

		$datetime		= date('Y-m-d H:i:s');
		// $datetime		= '2020-11-26 15:23:09';
		$time 			= strtotime($datetime);

		

		$this->db->select('ot.*');
		$this->db->from('otp ot');
		$this->db->where('ot.user_id', $data['userid']);
		// $this->db->where('ot.user_id', $data['email']);
		$this->db->where('ot.otpcode', $data['otpcode']);
		$this->db->where('ot.status', '1');
		$query1 		= $this->db->get();
		$resultset1 	= $query1->row_array();

		if ($resultset1 =='') {

			$this->db->select('ot.*');
			$this->db->from('otp ot');
			$this->db->where('ot.user_id', $data['userid']);
			$this->db->where('ot.status', '0');
			$query3 		= $this->db->get();
			$resultset3 	= $query3->row_array();
			if ($resultset3 !='') {
				$resultdata['userdata'] = [];
				$resultdata['otp_attempt'] = '';
				$resultdata['message'] = 'OTP is incorrect or has expired.';
				$resultdata['status'] = '0';
			}else{
				$this->db->select('ot.*');
				$this->db->from('otp ot');
				$this->db->where('ot.user_id', $data['userid']);
				$query2 		= $this->db->get();
				$resultset2 	= $query2->row_array();

				
				$otp_attempt = $resultset2['attempt']-1;
				if ($otp_attempt=='0') {
					$resultdata['userdata'] = [];
					$resultdata['otp_attempt'] = '0';
					$resultdata['message'] = 'Max attempts reached! Try again in';
					$resultdata['status'] = '0';
				}else{
					$this->db->set('attempt', 'attempt  -1',FALSE); 
					$this->db->where('id', $resultset2['id']); 
					$this->db->update('otp');

					$resultdata['userdata'] = [];
					$resultdata['otp_attempt'] = $otp_attempt;
					$resultdata['message'] = 'OTP is incorrect or has expired. Attempts remaining';
					$resultdata['status'] = '0';
				}
			}


			
			
		}else{
			// $this->db->select('ot.*');
			// $this->db->from('otp ot');
			// $this->db->where('ot.user_id', $data['userid']);
			// // $this->db->where('ot.user_id', $data['email']);
			// $this->db->where('ot.otpcode', $data['otpcode']);
			// $query = $this->db->get();
			// $resultset 	= $query->row_array();
			$otptime 	=  strtotime($resultset1['created_at']);
			$difference = ($time - $otptime) / 60;
			$hours 		= intdiv($difference, 60).':'. ($difference % 60);

			if ($hours <= 5) {
					$request1['attempt'] 	= '5';
					$request1['status'] 	= '0';
					$this->db->update('otp', $request1, ['id' => $resultset1['id']]);

					$this->db->select('ot.*, us.email, us.id as userid, us.name as name');
					$this->db->from('otp ot');
					$this->db->join('users us', 'us.id=ot.user_id', 'left');
					$this->db->where('ot.user_id', $data['userid']); 
					$query = $this->db->get();
					$result = $query->row_array();
					$resultdata['userdata'] = $result;
					$resultdata['otp_attempt'] = '';
					$resultdata['message'] = 'Given otp is correct';
					$resultdata['status'] = '1';
				
			}else{
				$request1['status'] 	= '0';
				$this->db->update('otp', $request1, ['id' => $resultset1['id']]);

				$resultdata['otp_attempt'] 	= '0';
				$resultdata['message'] 		= 'Your OTP is epired';
				$resultdata['status'] 		= '0';
			}
		}
		return $resultdata;
	}

	public function checkuser($type, $requestData = []){

		$this->db->select('u.*');
		$this->db->from('users u');

		if(isset($requestData['userid'])) 				$this->db->where('u.id', $requestData['userid']);
		if(isset($requestData['email'])) 				$this->db->where('u.email', $requestData['email']);

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

	public function changePassword($data){
		$id 			= $data['user_id'];
		// $password 		= $data['password'];
		// $password_raw 	= $data['password_raw'];

		if(isset($data['password'])) 	$request1['password'] 		= md5($data['password']);
		if(isset($data['password'])) 	$request1['password_raw'] 	= $data['password'];

		$userdata 		= $this->db->update('users', $request1, ['id' => $id]);

		return $id;
	}

	public function pirbVerification($data){
		$userdetailid 		= $data['userdetailid'];
		// $password 		= $data['password'];
		// $password_raw 	= $data['password_raw'];

		if(isset($data['status'])) 	$request1['pirbverification'] 		= $data['status'];

		$result 		= $this->db->update('users_details', $request1, ['id' => $userdetailid]);

		return $userdetailid;
	}

	public function postgetList($type, $requestdata=[], $extras=[]){
		
		$this->db->select('pst.*, us.id as us_id, us.name as username, ud.companyname as companyname, ud.pirbverification');
		$this->db->from('posts pst');
		$this->db->join('users us', 'us.id=pst.user_id', 'left');
		$this->db->join('users_details ud', 'ud.user_id=pst.user_id', 'left');

		if(isset($requestdata['status']))				$this->db->where_in('pst.status', $requestdata['status']);
		if(isset($requestdata['id']))					$this->db->where('pst.id', $requestdata['id']);
		if(isset($requestdata['userid']))				$this->db->where('pst.user_id', $requestdata['userid']);
		if(isset($requestdata['status']))				$this->db->where('pst.status', $requestdata['status']);
		if(isset($requestdata['is_delete']))			$this->db->where('pst.is_delete', $requestdata['is_delete']);
		if(isset($requestdata['halloffame']))			$this->db->where('pst.hallof_fame', $requestdata['halloffame']);
		if(isset($requestdata['user_type']))			$this->db->where('pst.user_type', $requestdata['user_type']);

		if(isset($requestdata['post_id']) && $requestdata['post_id'] !='' && ($requestdata['pagetype'] == 'topposts' || $requestdata['pagetype'] == 'progressposts')){
			$this->db->where_in('pst.id', $requestdata['post_id']);
			$order = sprintf('FIELD(pst.id, %s)', implode(', ', $requestdata['post_id']));
			$this->db->order_by($order); 
		}

		if (isset($requestdata['pagetype']) && $requestdata['pagetype'] =='toppostcron') {
			/*$this->db->where('YEAR(pst.created_at) = YEAR(CURRENT_DATE - INTERVAL 2 MONTH)');
			$this->db->where('MONTH(pst.created_at) = MONTH(CURRENT_DATE - INTERVAL 2 MONTH)');*/
			
			$this->db->where('pst.created_at BETWEEN NOW() - INTERVAL 30 DAY AND NOW()');
			// $this->db->where('MONTH(pst.created_at) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)');
		}
		if (isset($requestdata['pagetype']) && ($requestdata['pagetype'] =='progresspostcron' || $requestdata['pagetype'] =='-1 month')) {
			$this->db->where('YEAR(pst.created_at) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)');
			$this->db->where('MONTH(pst.created_at) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)');
		}

		if (isset($extras['searchtype']) && $extras['searchtype'] == 'tagpostsearch' && isset($requestdata['tags'])) {
			$tagsarray = explode(',', $requestdata['tags']);
			 $this->db->group_start();
		    foreach($tagsarray as $tagsvalue){

		        $this->db->where("find_in_set($tagsvalue, pst.post_taggs)");
		    }
		    $this->db->group_end();

		}

		if ((isset($extras['posttype']) && $extras['posttype'] == 'latestpost') || (isset($requestdata['halloffame']) && $requestdata['halloffame'] == '1')) {
			$this->db->order_by("pst.id", "DESC");

		}

		if(isset($requestdata['startdate']) && $requestdata['startdate']!='')				$this->db->where('DATE(pst.created_at) >=', date('Y-m-d', strtotime($requestdata['startdate'])));
		if(isset($requestdata['enddate']) && $requestdata['enddate']!='')					$this->db->where('DATE(pst.created_at) <=', date('Y-m-d', strtotime($requestdata['enddate'])));

		if($type!=='count' && isset($requestdata['start']) && isset($requestdata['length'])){
			$this->db->limit($requestdata['length'], $requestdata['start']);
		}
		if(isset($requestdata['order']['0']['column']) && isset($requestdata['order']['0']['dir'])){
			$column = ['pst.post_title', 'pst.created_at', 'us.name', 'pst.upvote', 'pst.post_reports'];
			$this->db->order_by($column[$requestdata['order']['0']['column']], $requestdata['order']['0']['dir']);
		}
		if(isset($requestdata['search']['value']) && $requestdata['search']['value']!=''){
			$searchvalue = $requestdata['search']['value'];
			$this->db->like('pst.post_title', $searchvalue);
			// $this->db->or_like('pst.post_title', $searchvalue);
			// $this->db->or_like('pst.post_title', $searchvalue);
			// $this->db->or_like('pst.created_at', $searchvalue);
			// $this->db->or_like('pst.upvote', $searchvalue);
			// $this->db->or_like('pst.post_reports', $searchvalue);
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

		$userid 		= $data['user_id'];
		$id 			= isset($data['id']) ? $data['id'] : '';
		$datetime		= date('Y-m-d H:i:s');
		
		if(isset($data['posttitle'])) 	$request1['post_title'] 		= $data['posttitle'];
		if(isset($data['posttext'])) 	$request1['post_text'] 			= $data['posttext'];
		if(isset($data['user_id'])) 	$request1['user_id'] 			= $data['user_id'];
		if(isset($data['file2'])) 		$request1['post_images'] 		= $data['file2'];
		if(isset($data['taggs'])) 		$request1['post_taggs'] 		= $data['taggs'];
		if(isset($data['delete'])) 		$request1['is_delete'] 			= $data['delete'];
		if(isset($data['user_type'])) 	$request1['user_type'] 			= $data['user_type'];

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

	public function Voteaction($data){

		$userid 		= $data['user_id'];
		$id 			= $data['post_id'];
		$votetype 		= $data['votetype'];
		if ($votetype =='upvote') {

			$uservote 	= 'upvote';
			$checkvote 	= $this->chekVote($userid, $id, $uservote);
			if ($checkvote =='') {
				$value = null;
			}else{
				$value = implode(',', $checkvote);
			}

			$request1['downvote']	= 	isset($value) ? $value : null;
			$downvote = $this->db->update('posts', $request1, ['id' => $id]);

			$query 		= $this->db->select('*')->from('posts')->where('id', $id)->get();
			$postdata 	= $query->row_array();
			$postarray 	= explode(',', $postdata['upvote']);

			if ($postdata['upvote'] !='') {
				$votepush = $postdata['upvote'].','.$userid;
			}else{
				$votepush = $userid;
			}

			$request2['upvote']	= 	$votepush;
			$upvote = $this->db->update('posts', $request2, ['id' => $id]);
			$syncpost = $this->syncpost('vote', $id);

		}elseif($votetype =='downvote'){

			$uservote 	= 'downvote';
			$checkvote 	= $this->chekVote($userid, $id, $uservote);
			if ($checkvote =='') {
				$value = null;
			}else{
				$value = implode(',', $checkvote);
			}
			$request1['upvote']	= 	isset($value) ? $value : null;
			$upvote = $this->db->update('posts', $request1, ['id' => $id]);

			$query 		= $this->db->select('*')->from('posts')->where('id', $id)->get();
			$postdata 	= $query->row_array();
			$postarray 	= explode(',', $postdata['downvote']);

			if ($postdata['downvote'] !='') {
				$votepush = $postdata['downvote'].','.$userid;
			}else{
				$votepush = $userid;
			}

			$request2['downvote']	= 	$votepush;
			$downvote = $this->db->update('posts', $request2, ['id' => $id]);
			$syncpost = $this->syncpost('vote', $id);
		}
		return $syncpost;
	}

	public function chekVote($userid, $postid, $votetype){
		if ($votetype == 'upvote') {
			$coloumn = 'downvote';
		}elseif($votetype == 'downvote'){
			$coloumn = 'upvote';
		}

		$this->db->select('pst.'.$coloumn.'');
		$this->db->from('posts pst');
		$this->db->where('pst.id', $postid);

		$query 		= $this->db->get();
		$result 	= $query->row_array();
		$votearray 	= explode(",", $result[$coloumn]);

		if (in_array($userid, $votearray)) {
			unset($votearray[array_search($userid, $votearray)]);
		}

		return $votearray;

	}

	public function syncpost($type, $postid){

		$this->db->select('pst.*, COUNT(pc.id) as commentcount');
		$this->db->from('posts pst');
		$this->db->join('post_comments pc', 'pc.post_id=pst.id', 'left');
		$this->db->where('pst.id', $postid);
		$this->db->where('pc.post_id', $postid);
		$this->db->where('pc.status', '0');
		$query = $this->db->get();
		$postdata 	= $query->row_array();

		// if ($type =='vote') {
		$syncdata['upvote'] 	= count(array_filter(explode(',', $postdata['upvote'])));
		$syncdata['downvote'] 	= count(array_filter(explode(',', $postdata['downvote'])));

		// }
		// if ($type =='comment') {
		$syncdata['comment'] 	= $postdata['commentcount'];

		// }
		return $syncdata;

	}

	public function reportpost($data){
		$userid = $data['user_id'];
		$id 	= $data['post_id'];

		$query 		= $this->db->select('*')->from('posts')->where('id', $id)->get();
		$postdata 	= $query->row_array();
		$postarray 	= explode(',', $postdata['post_reports']);
		
		if ($postdata['post_reports'] !='') {
			$reportpush = $postdata['post_reports'].','.$data['report_id'];
		}else{
			$reportpush = $data['report_id'];
		}

		$request1['post_reports'] 	= $reportpush;

		$data = $this->db->update('posts', $request1, ['id' => $id]);
		return $id;
	}

	public function deletepost($data){
		$userid 				= $data['user_id'];
		$id 					= $data['post_id'];

		$request1['is_delete'] 	= '1';

		$data = $this->db->update('posts', $request1, ['id' => $id]);

		$request2['is_delete'] = '1';
		$data2 	= $this->db->update('statistcs_toppost', $request2, ['postid' => $id]);
		return $id;
	}

	public function getCommentsList($type, $requestdata=[])
	{
		$this->db->select('pc.*, us.name as username, ud.pirbverification');
		$this->db->from('post_comments pc');
		$this->db->join('users us', 'us.id=pc.user_id', 'left');
		$this->db->join('users_details ud', 'ud.user_id=pc.user_id', 'left');
		
		if(isset($requestdata['id'])) 		$this->db->where('pc.id', $requestdata['id']);
		if(isset($requestdata['postid']))	$this->db->where_in('pc.post_id', $requestdata['postid']);
		if(isset($requestdata['userid']))	$this->db->where_in('pc.user_id', $requestdata['userid']);
		if(isset($requestdata['status']))	$this->db->where_in('pc.status', $requestdata['status']);

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

	public function commentsAction($data){
		$userid 				= $data['user_id'];
		$postid 				= $data['post_id'];
		$id 					= isset($data['comment_id']) ? $data['comment_id'] : '';
		$datetime				= date('Y-m-d H:i:s');

		if ($id=='') {
			$request1['post_id'] 	= $postid;
			$request1['user_id'] 	= $userid;
			$request1['comments'] 	= $data['comments'];
			$request1['created_at'] = $datetime;

			$data 	= $this->db->insert('post_comments', $request1);
			$id 	= $this->db->insert_id();
		}else{
			$request1['status'] 	= '1';
			$data 	= $this->db->update('post_comments', $request1, ['id' => $id]);
		}
		

		$syncpost 		= $this->syncpost('comment', $postid);
		$syncpost['id'] = $id;
		return $syncpost;
	}

	public function impressionsClicksgetList($type, $requestdata=[]){

		$this->db->select('bic.*');
		$this->db->from('banner_impressions_count bic');

		if(isset($requestdata['id'])) 			$this->db->where('bic.id', $requestdata['id']);
		if(isset($requestdata['date']))			$this->db->where_in('bic.created_at', $requestdata['date']);
		if(isset($requestdata['bannerid']))		$this->db->where_in('bic.bannerid', $requestdata['bannerid']);
		if(isset($requestdata['newpageid']))	$this->db->where_in('bic.newpageid', $requestdata['newpageid']);


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

	public function impressionsClicksAction($data){

		$date 			= date('Y-m-d');
		$bannerdata 	= $data['bannerdata'];
		$bannerid 		= $data['bannerid'];
		$newpageid 		= $data['newpageid'];
		$isdata 		= $data['isdata'];
		$requesttype 	= $data['requesttype'];
		$idarray 		= [];

		if ($isdata =='0') {
			if ($requesttype == 'impressionscount') {
				$request1['impressions'] 	= '1';
				$request1['clickscount'] 	= '0';
				$request1['bannerid'] 		= $bannerid;
				$request1['newpageid'] 		= $newpageid;
				$request1['created_at'] 	= $date;

				$this->db->insert('banner_impressions_count', $request1);
				$idarray['impressions'] = $this->db->insert_id();
			}elseif ($requesttype == 'clickscount') {
				$request1['impressions'] 	= '0';
				$request1['clickscount'] 	= '1';
				$request1['bannerid'] 		= $bannerid;
				$request1['newpageid'] 		= $newpageid;
				$request1['created_at'] 	= $date;

				$this->db->insert('banner_impressions_count', $request1);
				$idarray['clickscount'] = $this->db->insert_id();
			}
		}elseif ($isdata =='1') {
			if ($requesttype == 'impressionscount') {
				$request1['impressions'] 	= $bannerdata['impressions']+1;
				$request1['clickscount'] 	= $bannerdata['clickscount'];
				$request1['bannerid'] 		= $bannerdata['bannerid'];
				$request1['newpageid'] 		= $bannerdata['newpageid'];

				$this->db->update('banner_impressions_count', $request1, ['id' => $bannerdata['id']]);
				$idarray['impressions'] = $bannerdata['id'];
			}elseif ($requesttype == 'clickscount') {
				$request1['impressions'] 	= $bannerdata['impressions'];
				$request1['clickscount'] 	= $bannerdata['clickscount']+1;
				$request1['bannerid'] 		= $bannerdata['bannerid'];
				$request1['newpageid'] 		= $bannerdata['newpageid'];

				$this->db->update('banner_impressions_count', $request1, ['id' => $bannerdata['id']]);
				$idarray['clickscount'] = $bannerdata['id'];
			}
		}

		return $idarray;
	}
		
	public function getdata_articles($type, $requestData = [])
	{
	    $this->db->select('*');
	    $this->db->from('articles');
	    $this->db->where('published', '1');
	    if (isset($requestData['id'])) {
	        $this->db->where('id', $requestData['id']);
	    }

	    if (isset($requestData['keyword'])) {	        
	        $this->db->like('title', $requestData['keyword'], 'both');
	        $this->db->or_like('CONCAT(tags)', $requestData['keyword'], 'both');	        
	    }

	    if (isset($requestData['header_id'])) {	        
	        $this->db->like('sections_headers', $requestData['header_id'], 'both');
	    }

	    if (isset($requestData['date'])) {
	    	$this->db->group_start();
	        $this->db->where('start_date <=', $requestData['date']);
	        $this->db->where('end_date >=', $requestData['date']);
	        $this->db->or_where('end_date', null);
	        $this->db->group_end();
	    }

	    if($type!=='count' && isset($requestData['start']) && isset($requestData['length'])){
			$this->db->limit($requestData['length'], $requestData['start']);
		}
		
	    $this->db->order_by('position');

	    if ($type == 'count') {
	        $result = $this->db->count_all_results();
	    } else {
	        $query = $this->db->get();
	        if ($type == 'all') {	        	
	            $result = $query->result_array();
	        } elseif ($type == 'row') {
	            $result = $query->row_array();
	        }
	    }

	    // echo $this->db->last_query(); die();

	    return $result;
	}

	public function get_sections_headers($type, $requestData = [])
    {             
       	$this->db->select('*');
	    $this->db->from('articles_sections_headers');	    
	    if (isset($requestData['id'])) {
	        $this->db->where_in('header_id', explode(",",$requestData['id']));
	    }
	    
	    if ($type == 'count') {
	        $result = $this->db->count_all_results();
	    } else {
	        $query = $this->db->get();
	        if ($type == 'all') {
	            $result = $query->result_array();
	        } elseif ($type == 'row') {
	            $result = $query->row_array();
	        }
	    }
	    return $result;
    }

    public function getArticleCommentsList($type, $requestdata = [])
    {    	
    	$this->db->select('ac.*, us.name as username')->select('(SELECT COUNT(*) FROM articles_comments_likes WHERE comment_id = ac.id AND ACTION = "1") AS likes', false);
        $this->db->from('articles_comments ac');        
        $this->db->join('users us', 'us.id = ac.posted_by', 'left');
        $this->db->join('users_details ud', 'ud.user_id=ac.posted_by', 'left');

        if (isset($requestdata['id'])) {
            $this->db->where('ac.id', $requestdata['id']);
        }

        if (isset($requestdata['article_id'])) {
            $this->db->where('ac.posted_on_article', $requestdata['article_id']);
        }

        if (isset($requestdata['user_id'])) {
            $this->db->where('ac.posted_by', $requestdata['user_id']);
        }

        if (isset($requestdata['status'])) {
            $this->db->where('ac.status', $requestdata['status']);
        }

        if (isset($requestdata['order'])) {
            $this->db->order_by("likes", "DESC");
            $this->db->order_by("ac.created_at", "DESC");
        }

        if ($type == 'count') {
            $result = $this->db->count_all_results();
        } else {
            $query = $this->db->get();

            if ($type == 'all') {
                $result = $query->result_array();
            } elseif ($type == 'row') {
                $result = $query->row_array();
            }
        }
        return $result;
    }

    public function articlecommentsAction($data)
    {
        $userid    = $data['user_id'];
        $articleid = $data['article_id'];
        $id        = isset($data['comment_id']) ? $data['comment_id'] : '';
        $date      = date('Y-m-d');
        $datetime  = date('Y-m-d H:i:s');

        if ($id == '') {
            $request1['posted_on_article'] = $articleid;
            $request1['posted_by']         = $userid;
            $request1['comment']           = $data['comments'];
            $request1['created_at']        = $datetime;
            $request1['comment_date']      = $date;

            $data = $this->db->insert('articles_comments', $request1);
            $id   = $this->db->insert_id();
        } else {
        	$request1['status'] = '0';

            $data = $this->db->update('articles_comments', $request1, ['id' => $id]);
        }

        $syncpost['id'] = $id;
        return $syncpost;
    }

    public function articlecommentlikesaction($data){
    	$datetime  = date('Y-m-d H:i:s');    	
    	$request1['article_id'] = $request['article_id'] = $data['article_id'];
    	$request1['comment_id'] = $request['comment_id'] = $data['comment_id'];
    	$request1['user_id'] 	= $request['user_id']	 = $data['user_id'];
    	
    	$status = $this->CheckLike($request1); 

    	if($data['type'] == 'like'){
    		$request1['action']      = '1';
    	}elseif($data['type'] == 'dislike'){
    		$request1['action']      = '0';
    	}
    	// $request1['user_id']    = $data['user_id'];
    	$request1['created_at']  = $datetime;     

		if (empty($status)) {            
            $datavalue = $this->db->insert('articles_comments_likes', $request1);
            $id   = $this->db->insert_id();            
        } else {        	
            $datavalue = $this->db->update('articles_comments_likes', $request1, ['id' => $status['id']]);
            $id   = $status['id'];            
        }

        $output = $this->GetLikesCount($request);
        return $output;
	}
	
	public function CheckLike($requestData)
    {             
       	$this->db->select('*');
	    $this->db->from('articles_comments_likes');	    	    
	    $this->db->where($requestData);	 
	    $query = $this->db->get();   	    
	    $result = $query->row_array();
	    return $result;
    }

    public function GetLikesCount($requestData)
    {             
       	$this->db->select('*');
	    $this->db->from('articles_comments_likes');	    	    
	    $this->db->where($requestData);	 
	    $this->db->where('action', '1');
	    $result['like'] = $this->db->count_all_results();

	    $this->db->select('*');
	    $this->db->from('articles_comments_likes');	    	    
	    $this->db->where($requestData);	 
	    $this->db->where('action', '0');
	    $result['dislike'] = $this->db->count_all_results();

	    return $result;
    }

    public function articlebookmarkaction($data){
    	$datetime  = date('Y-m-d H:i:s');
    	$request1['user_id']    = $data['user_id'];
    	$request1['article_id'] = $data['article_id'];    	
    	
    	if($data['type'] == 'bookmark'){
    		$request1['created_at'] = $datetime; 
    		$datavalue = $this->db->insert('articles_bookmark', $request1);
    	}elseif($data['type'] == 'unbookmark'){    		
    		$datavalue = $this->db->delete('articles_bookmark', $request1);
    	}
        
		return (int)$datavalue;
	}

	public function get_bookmarks($type, $requestData = [])
    {             
    	// echo "<pre>";
    	// print_r($requestData); die();
       	$this->db->select('*');
	    $this->db->from('articles_bookmark');	    
	    if (isset($requestData['article_id'])) {
            $this->db->where('article_id', $requestData['article_id']);
        }

        if (isset($requestData['user_id'])) {
            $this->db->where('user_id', $requestData['user_id']);
        }
	    
	    if ($type == 'count') {
	        $result = $this->db->count_all_results();
	    } else {
	        $query = $this->db->get();
	        if ($type == 'all') {
	            $result = $query->result_array();
	        } elseif ($type == 'row') {
	            $result = $query->row_array();
	        }
	    }

	    return $result;
    }

    public function getdata_advertisement($type, $requestData = [])
	{
		$this->db->select('ad.*, cl.client_name');
		$this->db->from('advertising_adbanners ad');	
		$this->db->join('advertising_clients cl', 'cl.id = ad.client_id', 'left');	   
	    $this->db->where('ad.campaign_status', '1');	

	    if (isset($requestData['advert_type'])) {
	        $this->db->where('ad.advert_type', $requestData['advert_type']);
	    }	    

	    if (isset($requestData['id'])) {
	        $this->db->where('ad.id', $requestData['id']);
	    }	    

	    if (isset($requestData['date'])) {	
	    	$this->db->group_start();
	        $this->db->where('start_date <=', $requestData['date']);
	        $this->db->where('end_date >=', $requestData['date']);	        
	        $this->db->group_end();

	        // $this->db->where('ad.end_date >=', $requestData['date']);	        	        
	    }
	    	
	    $this->db->order_by('ad.id');

	    if ($type == 'count') {
	        $result = $this->db->count_all_results();
	    } else {
	        $query = $this->db->get();
	        if ($type == 'all') {	        	
	            $result = $query->result_array();
	        } elseif ($type == 'row') {
	            $result = $query->row_array();
	        }
	    }
	    // echo $this->db->last_query(); die();
	    return $result;
	}

	public function getArticleCommentsReports($type, $requestdata = [])
    {
        $this->db->select('*');
        $this->db->from('articles_comments_reports');
        
        if (isset($requestdata['status'])) {
            $this->db->where_in('status', $requestdata['status']);
        }

        if ($type == 'count') {
            $result = $this->db->count_all_results();
        } else {
            $query = $this->db->get();

            if ($type == 'all') {
                $result = $query->result_array();
            } elseif ($type == 'row') {
                $result = $query->row_array();
            }
        }

        return $result;
    }

    public function articlecommentsreportAction($request)
    {
        $id        = isset($request['id']) ? $request['id'] : '';        
        $datetime  = date('Y-m-d H:i:s');
        $request['created_at']        = $datetime;

        if ($id == '') {            
            $data = $this->db->insert('articles_comments_reports_count', $request);
            $id   = $this->db->insert_id();
        } else {            
            $data = $this->db->update('articles_comments_reports_count', $request, ['id' => $id]);
        }    
        return $data;
    }

    public function ad_impressionsClicksgetList($type, $requestdata=[]){
		$this->db->select('bic.*');
		$this->db->from('advertising_adbanners_impressions_count bic');

		if(isset($requestdata['id'])) 			$this->db->where('bic.id', $requestdata['id']);
		if(isset($requestdata['date']))			$this->db->where_in('bic.created_at', $requestdata['date']);
		if(isset($requestdata['ad_id']))		$this->db->where_in('bic.bannerid', $requestdata['ad_id']);	
		if(isset($requestdata['newpageid']))	$this->db->where_in('bic.newpageid', $requestdata['newpageid']);		

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

	public function ad_impressionsClicksAction($data){

		$date 			= date('Y-m-d');
		$bannerdata 	= $data['bannerdata'];
		$bannerid 		= $data['ad_id'];
		$newpageid 		= $data['newpageid'];
		$isdata 		= $data['isdata'];
		$requesttype 	= $data['requesttype'];
		$idarray 		= [];

		if ($isdata =='0') {
			if ($requesttype == 'impressionscount') {
				$request1['impressions'] 	= '1';
				$request1['clickscount'] 	= '0';
				$request1['bannerid'] 		= $bannerid;
				$request1['newpageid'] 		= $newpageid;
				$request1['created_at'] 	= $date;

				$this->db->insert('advertising_adbanners_impressions_count', $request1);
				$idarray['impressions'] = $this->db->insert_id();
			}elseif ($requesttype == 'clickscount') {
				$request1['impressions'] 	= '0';
				$request1['clickscount'] 	= '1';
				$request1['bannerid'] 		= $bannerid;				
				$request1['newpageid'] 		= $newpageid;
				$request1['created_at'] 	= $date;

				$this->db->insert('advertising_adbanners_impressions_count', $request1);
				$idarray['clickscount'] = $this->db->insert_id();
			}
		}elseif ($isdata =='1') {
			if ($requesttype == 'impressionscount') {
				$request1['impressions'] 	= $bannerdata['impressions']+1;
				$request1['clickscount'] 	= $bannerdata['clickscount'];
				$request1['bannerid'] 		= $bannerdata['bannerid'];
				$request1['newpageid'] 		= $bannerdata['newpageid'];

				$this->db->update('advertising_adbanners_impressions_count', $request1, ['id' => $bannerdata['id']]);
				$idarray['impressions'] = $bannerdata['id'];
			}elseif ($requesttype == 'clickscount') {
				$request1['impressions'] 	= $bannerdata['impressions'];
				$request1['clickscount'] 	= $bannerdata['clickscount']+1;
				$request1['bannerid'] 		= $bannerdata['bannerid'];	
				$request1['newpageid'] 		= $bannerdata['newpageid'];			

				$this->db->update('advertising_adbanners_impressions_count', $request1, ['id' => $bannerdata['id']]);
				$idarray['clickscount'] = $bannerdata['id'];
			}
		}

		return $idarray;
	}

	public function CheckReportold($requestData)
    {             
       	$this->db->select('*');
	    $this->db->from('articles_comments_reports_count');	    	    
	    $this->db->where($requestData);	 
	    $query = $this->db->get();   	    
	    $result = $query->row_array();	    
	    return $result;
    }

    public function CheckReport($type, $requestdata = [])
    {
        $this->db->select('*');
        $this->db->from('articles_comments_reports_count');
              
        if (isset($requestdata['article_id'])) {
	        $this->db->where('article_id', $requestdata['article_id']);
	    }	   

	    if (isset($requestdata['comment_id'])) {
	        $this->db->where('comment_id', $requestdata['comment_id']);
	    }	   

	    if (isset($requestdata['user_id'])) {
	        $this->db->where('user_id', $requestdata['user_id']);
	    }	   	   

        if ($type == 'count') {
            $result = $this->db->count_all_results();
        } else {
            $query = $this->db->get();

            if ($type == 'all') {
                $result = $query->result_array();
            } elseif ($type == 'row') {
                $result = $query->row_array();
            }
        }

        return $result;
    }
}

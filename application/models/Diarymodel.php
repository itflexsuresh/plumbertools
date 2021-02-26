<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diarymodel extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function action($data){

		$id 			= isset($data['id']) ? $data['id'] : '';
		$datetime		= date('Y-m-d H:i:s');
		// print_r($id);die;
		if (isset($data['pagetype']) && $data['pagetype'] =='api') {
			if($id==''){
				$action = 1;
			}elseif($id!=''){
				$action = 2;
			}
		}elseif(isset($data['pagedata']) && $data['pagedata'] =='postcomments'){
			if($id==''){
				$action = 7;
			}elseif($id!=''){
				$action = 8;
			}
		}elseif(isset($data['pagedata']) && $data['pagedata'] =='postupdate'){
			if($id==''){
				$action = 5;
			}elseif($id!=''){
				$action = 6;
			}
		}
		else{
			if($id==''){
				$action = 3;
			}elseif($id!=''){
				$action = 4;
			}
		}
		

		if (isset($data['adminid']) && $data['adminid']!='') {
			$type = '1';
		}else{
			$type = '2';
		}

		if(isset($data['adminid'])) 	$request1['adminid'] 	= $data['adminid'];
		if(isset($data['user_id'])) 	$request1['user_id'] 	= $data['user_id'];
		if(isset($data['reason'])) 		$request1['reason'] 	= $data['reason'];
		if(isset($data['comment'])) 	$request1['reason'] 	= $data['comment'];
		if(isset($data['post_id'])) 	$request1['post_id'] 	= $data['post_id'];
		if(isset($type)) 				$request1['type'] 		= $type;
		if(isset($action)) 				$request1['action'] 	= $action;

		$request1['datetime']	= 	$datetime;
		
		$userdata = $this->db->insert('diary', $request1);

		return true;

	}

	public function getdiaryList($type, $requestData = []){
		$this->db->select('diary.*');
		$this->db->from('diary diary');

		if(isset($requestData['id'])) 			$this->db->where('diary.id', $requestData['id']);
		if(isset($requestData['userid'])) 		$this->db->where('diary.user_id', $requestData['userid']);
		if(isset($requestData['post_id'])) 		$this->db->where('diary.post_id', $requestData['post_id']);
		// if(isset($requestdata['adminid'])) 		$this->db->where('diary.adminid', $requestdata['adminid']);
		if(isset($requestData['pagetype']) && $requestData['pagetype'] =='admin'){
			$this->db->order_by('diary.id', "DESC");
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
}

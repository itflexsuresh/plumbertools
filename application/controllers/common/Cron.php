<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cron extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('adminmodel');
		$this->load->model('Usersmodel');
		$this->load->model('Commonmodel');
		$this->load->model('Diarymodel');
		$this->load->model('Apimodel');
		
	}
	public function halloffame(){

		$datetime	= date('Y-m-d H:i:s');
		$settings 	= $this->adminmodel->getdata_ratemywork_settings('row');
		$postdata 	= $this->Apimodel->postgetList('all', ['status' => '1', 'isdelete' => '0', 'halloffame' => '0']);
		// print_r($this->db->last_query());die;

		if (count($postdata ) > 0) {
			foreach ($postdata as $postdatakey => $postdatavalue) {
				$upvotecount 	= count(array_filter(explode(",", $postdatavalue['upvote'])));
				$downvotecount 	= count(array_filter(explode(",", $postdatavalue['downvote'])));
				$votecount 		= $upvotecount - $downvotecount;
				$postage  		= date('m',strtotime($datetime)) - date('m',strtotime($postdatavalue['created_at']));
				if ($postage <= date('m',strtotime($settings['months_granted']))) {
					if ($votecount >= $settings['no_votes']) {
						$request['hallof_fame'] = '1';
						$halloffame = $this->db->update('posts', $request, ['id' => $postdatavalue['id']]);
					}
					/*else{
						continue;
					}*/
				}
				/*else{
					continue;
				}*/
			}
		}
		
		$end_time   = date('Y-m-d H:i:s');

		$data1 = array(
		    'filename'   => base_url().'common/Cron/halloffame',
		    'start_time' => $datetime,
		    'end_time'   => $end_time,
		);

		$this->db->insert('cron_log', $data1);

	}

	public function topPost(){
		$datetime	= date('Y-m-d H:i:s');
		$postdata 	= $this->Apimodel->postgetList('all', ['status' => '1', 'isdelete' => '0', 'halloffame' => '0', 'user_type' => '3', 'pagetype' => 'toppostcron']);

		$statistics = $this->postTypeCalculationTopPost($postdata);
		
		if (count($statistics) > 0) {
			$postsort1 					= array_column($statistics['postdata'], 'calculation');
											array_multisort($postsort1, SORT_DESC, $statistics['postdata']);
			$statistics_result 			= array_slice($statistics['postdata'], 0, 3);
		}
		if (isset($statistics_result) && count($statistics_result) > 0) {
			foreach ($statistics_result as $statistics_resultkey => $statistics_resultvalue) {
				if ($statistics_resultvalue['calculation'] > 0) {
					$result[] = [
						'postid' 				=> $statistics_resultvalue['postid'],
						'post_title' 			=> $statistics_resultvalue['post_title'],
						'upvote' 				=> $statistics_resultvalue['upvotecount'],
						'downvote' 				=> $statistics_resultvalue['downvotecount'],
						'post_calculation' 		=> $statistics_resultvalue['calculation'],
						'user_id' 				=> $statistics_resultvalue['userid'],
						'postuser' 				=> $statistics_resultvalue['postuser'],
						'postdate' 				=> $statistics_resultvalue['created_at'],
						'is_delete' 			=> '0',
						'created_at' 			=> $datetime,
					];
				}else{
					$result[] = [];
				}
			}
		}

		// echo "<pre>";print_r($result);die;
		if (isset($result) && count(array_filter($result)) > 0) {
			foreach ($result as $resultkey => $resultvalue) {
				$this->db->insert('statistcs_toppost', $resultvalue);
			}
		}
		
		/*$request1['post_id'] 		= implode(',', array_column($result, 'postid'));
		$request1['type '] 			= '2';
		$request1['post_of '] 		= date('Y-m-d', strtotime(date($datetime)." -2 month"));
		$request1['created_at '] 	= $datetime;

		$fetchStats 				= $this->adminmodel->getStatisticsList('row', ['type' => '1']);

		echo date('Y-m-d', strtotime(date($datetime)." -2 month"));die;

		if (!isset($fetchStats) || count($fetchStats) == 0) {
			$this->db->insert('statistcs_toppost', $request1);
		}else{
			$this->db->update('statistcs', $request1, ['id' => $fetchStats['id']]);
		}

		// echo "<pre>";print_r($request1);die;
		*/

		$end_time   = date('Y-m-d H:i:s');

		$data1 = array(
		    'filename'   => base_url().'common/Cron/topPost',
		    'start_time' => $datetime,
		    'end_time'   => $end_time,
		);

		$this->db->insert('cron_log', $data1);
	}

	public function progressPost(){
		$datetime	= date('Y-m-d H:i:s');
		$postdata 	= $this->Apimodel->postgetList('all', ['status' => '1', 'isdelete' => '0', 'halloffame' => '0', 'user_type' => '3', 'pagetype' => 'progresspostcron']);
		$statistics = $this->postTypeCalculation($postdata);

		if (count($statistics) > 0) {
			$postsort1 					= array_column($statistics['postdata'], 'calculation');
											array_multisort($postsort1, SORT_DESC, $statistics['postdata']);
			$statistics_result 			= array_slice($statistics['postdata'], 0, 3);

			if (count($statistics_result) > 0) {
				foreach ($statistics_result as $statistics_resultkey => $statistics_resultvalue) {
					if ($statistics_resultvalue['calculation'] > 0) {
						$result[] = [
							'postid' 	=> $statistics_resultvalue['postid'],
						];
					}else{
						$result[] = [];
					}
				}
			}
			$request1['post_id'] 		= implode(',', array_column($result, 'postid'));
			$request1['type '] 			= '1';
			$request1['post_of '] 		= date('Y-m-d', strtotime(date($datetime)." -1 month"));
			$request1['created_at '] 	= $datetime;

			$fetchStats 				= $this->adminmodel->getStatisticsList('row', ['type' => 'progress']);

			if (!isset($fetchStats) || count($fetchStats) == 0) {
				$this->db->insert('statistcs', $request1);
			}else{
				$this->db->update('statistcs', $request1, ['id' => $fetchStats['id']]);
			}
		}

		// echo"<pre>"; print_r($request1);
		$end_time   = date('Y-m-d H:i:s');

		$data1 = array(
		    'filename'   => base_url().'common/Cron/progressPost',
		    'start_time' => $datetime,
		    'end_time'   => $end_time,
		);

		$this->db->insert('cron_log', $data1);
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
					'calculation' 		=> count(array_filter(explode(",", $datavalue['upvote']))) - count(array_filter(explode(",", $datavalue['downvote'])))
				];
			
		}
		return isset($result) ? $result : $result['postdata'] = [];
	}


	public function postTypeCalculationTopPost($data){

		foreach ($data as $datakey => $datavalue) {
			if (isset($datavalue['us_id']) && $datavalue['us_id'] !='') {
				$calculation = count(array_filter(explode(",", $datavalue['upvote']))) - count(array_filter(explode(",", $datavalue['downvote'])));
				if ($calculation > 0) {
					$result['postdata'][] = [
						'postid' 			=> $datavalue['id'],
						'userid' 			=> $datavalue['user_id'],
						'post_title' 		=> $datavalue['post_title'],
						'created_at' 		=> $datavalue['created_at'],
						'postuser' 			=> $datavalue['username'],
						'upvotecount' 		=> count(array_filter(explode(",", $datavalue['upvote']))),
						'downvotecount' 	=> count(array_filter(explode(",", $datavalue['downvote']))),
						'calculation' 		=> $calculation
					];
				}
			}
			
		}
		return isset($result) ? $result : $result['postdata'] = [];
	}


	public function subqueries(){
		$this->db->select('*')->from('statistcs_toppost stp');
		$this->db->where('id = (SELECT MAX(id) FROM statistcs_toppost WHERE stp.postid = postid AND stp.is_delete="0")', NULL, FALSE);
		$this->db->group_start();
		$this->db->where('YEAR(stp.postdate) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)');
		$this->db->where('MONTH(stp.postdate) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)');
		$this->db->group_end();
		$query = $this->db->get();
		$result = $query->result_array();
		echo "<pre>";print_r($this->db->last_query());die;
	}

	public function banner_cron()
    {
        $start_time = date('Y-m-d H:i:s');

        $current_date = date('Y-m-d');
        $yesterday    = date("Y-m-d", strtotime("yesterday"));
        $this->db->select('banner.*, advertisingclickcount.totalcount as adtotalcount');
        $this->db->from('banner');
        $this->db->join('advertisingclickcount', 'advertisingclickcount.imageid = banner.id', 'left');
        $this->db->order_by('id', 'asc');
        $query = $this->db->get();
        $data  = $query->result_array();

        $getcudata = $this->db->select('*')->where('date_created', $current_date)->get('bannernew')->result_array();
        if (!$getcudata) {
            $getdata = $this->db->select('*')->where('date_created', $yesterday)->get('bannernew')->result_array();
            if (!$getdata) {
                foreach ($data as $row) {
                    if ($row['adtotalcount']) {
                        $adtotalcount = $row['adtotalcount'];
                    } else {
                        $adtotalcount = 0;
                    }
                    $dataarray = array(
                        'banner_id'         => $row['id'],
                        'name'              => $row['name'],
                        'client'            => $row['client'],
                        'description'       => $row['description'],
                        'pagesid'           => $row['pagesid'],
                        'topbottom'         => $row['topbottom'],
                        'image'             => $row['image'],
                        'link'              => $row['link'],
                        'active'            => $row['active'],
                        'impressions'       => $row['impressions'],
                        'impressions_count' => 0,
                        'click'             => $adtotalcount,
                        'click_count'       => 0,
                        'date_created'      => $current_date,
                    );

                    $this->db->insert('bannernew', $dataarray);
                }
                // echo "Done1";
            } else {
                foreach ($data as $row) {
                    $impressions_count = 0;
                    $click_count       = 0;
                    if ($row['adtotalcount']) {
                        $adtotalcount = $row['adtotalcount'];
                    } else {
                        $adtotalcount = 0;
                    }
                    $getdata1 = $this->db->select('*')->where('banner_id', $row['id'])->get('bannernew')->result_array();
                    foreach ($getdata1 as $row1) {
                        $impressions_count = $row['impressions'] - $row1['impressions'];
                        $click_count       = $adtotalcount - $row1['click'];
                    }

                    $dataarray = array(
                        'banner_id'         => $row['id'],
                        'name'              => $row['name'],
                        'client'            => $row['client'],
                        'description'       => $row['description'],
                        'pagesid'           => $row['pagesid'],
                        'topbottom'         => $row['topbottom'],
                        'image'             => $row['image'],
                        'link'              => $row['link'],
                        'active'            => $row['active'],
                        'impressions'       => $row['impressions'],
                        'impressions_count' => $impressions_count,
                        'click'             => $adtotalcount,
                        'click_count'       => $click_count,
                        'date_created'      => $current_date,
                    );

                    $this->db->insert('bannernew', $dataarray);
                }
                // echo "Done2";
            }
        } else {
            //echo "No data";
        }

        $end_time = date('Y-m-d H:i:s');

        $data1 = array(
            'filename'   => base_url().'common/Cron/banner_cron',
            'start_time' => $start_time,
            'end_time'   => $end_time,
        );

        $this->db->insert('cron_log', $data1);
    }

    public function ad_cron1()
	{
	    $start_time     = date('Y-m-d H:i:s');
	    $current_date   = date('Y-m-d');
	    $yesterday_date = date('Y-m-d', strtotime("yesterday"));

	    $this->db->where('campaign_status', '1');
	    $this->db->where('end_date <=', $yesterday_date);
	    $query   = $this->db->get('advertising_adbanners');
	    $getdata = $query->result_array();

	    // echo $this->db->last_query(); die();

	    foreach ($getdata as $row) {
	        $request['campaign_status'] = '0';

	        $request['inactive_date'] = $current_date;

	        $data = $this->db->update('advertising_adbanners', $request, ['id' => $row['id']]);
	    }

	    $end_time = date('Y-m-d H:i:s');

	    $data1 = array(
	        'filename'   => base_url().'common/Cron/ad_cron1',
	        'start_time' => $start_time,
	        'end_time'   => $end_time,
	    );

	    $this->db->insert('cron_log', $data1);
	}

	public function ad_cron2()
	{
	    $start_time   = date('Y-m-d H:i:s');
	    $current_date = date('Y-m-d');

	    $this->db->select('ad.id as ad_id, ad.impressions, SUM(ct.impressions) AS count_impressions');
	    $this->db->from('advertising_adbanners ad');
	    $this->db->join('advertising_adbanners_impressions_count ct', 'ct.bannerid = ad.id', 'left');

	    $this->db->where('ad.campaign_status', '1');
	    $this->db->where('ad.impressions >', 0);

	    $this->db->group_by('ad.id');
	    $this->db->order_by('ad.id desc');

	    $query1   = $this->db->get();
	    $getdata1 = $query1->result_array();
	    // echo $this->db->last_query(); die();

	    foreach ($getdata1 as $row1) {
	        if ($row1['count_impressions'] >= $row1['impressions']) {
	            $request1['campaign_status'] = '0';
	            $request1['inactive_date']   = $current_date;

	            $data = $this->db->update('advertising_adbanners', $request1, ['id' => $row1['ad_id']]);
	        }
	    }

	    $end_time = date('Y-m-d H:i:s');

	    $data1 = array(
	        'filename'   => base_url().'common/Cron/ad_cron2',
	        'start_time' => $start_time,
	        'end_time'   => $end_time,
	    );

	    $this->db->insert('cron_log', $data1);
	}
}

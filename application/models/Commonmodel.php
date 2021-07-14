<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commonmodel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function sentMail($to, $subject, $message, $file='', $cc='')
	{
		
		$this->load->library('email');
		
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['mailtype'] = 'html';
		$config['charset'] 	= 'iso-8859-1';
		$config['wordwrap'] = TRUE;

		/*
		$config['protocol']    	= 'mail';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_user']    = 'norwin.kairo5@gmail.com';
        $config['smtp_pass']    = 'jedczpvjwxdyhqlo';
		$config['mailtype'] 	= 'html';
		$config['charset'] 		= 'iso-8859-1';
		$config['newline']      = '\r\n';
		$config['wordwrap'] 	= TRUE;
		*/
		
		$this->email->initialize($config);
		$this->email->from('do_not_reply@articulateit.co.za', 'Message from APP Plumber');
		$this->email->to($to);
		if($cc!='') $this->email->cc($cc);
		$this->email->subject($subject);
		$this->email->message($message);
		
		if($file!="") $this->email->attach($file);

		if($this->email->send()){
			$this->email->clear(true);
			return 'true';
		}else{
			//print_r($this->email->print_debugger());die;
			$this->email->clear(true);
			return 'false';
		}
	}

	public function sentCustomMail($to, $subject, $message, $from='', $file='', $cc='')
	{
		
		$this->load->library('email');
		
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['mailtype'] = 'html';
		$config['charset'] 	= 'iso-8859-1';
		$config['wordwrap'] = TRUE;

		/*
		$config['protocol']    	= 'mail';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_user']    = 'norwin.kairo5@gmail.com';
        $config['smtp_pass']    = 'jedczpvjwxdyhqlo';
		$config['mailtype'] 	= 'html';
		$config['charset'] 		= 'iso-8859-1';
		$config['newline']      = '\r\n';
		$config['wordwrap'] 	= TRUE;
		*/

		if($from !='') $from = $from;
			else $from = 'do_not_reply@articulateit.co.za';

		if($subject !='') $subject = $subject;
			else $from = 'Message from APP Plumber';
		
		$this->email->initialize($config);
		$this->email->from($from, $subject);
		$this->email->to($to);
		if($cc!='') $this->email->cc($cc);
		$this->email->subject($subject);
		$this->email->message($message);
		
		if($file!="") $this->email->attach($file);

		if($this->email->send()){
			$this->email->clear(true);
			return 'true';
		}else{
			//print_r($this->email->print_debugger());die;
			$this->email->clear(true);
			return 'false';
		}
	}

	public function sentMail2($to, $subject, $message, $file='', $cc='')
	{
		
		$this->load->library('email');
		
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['mailtype'] = 'html';
		$config['charset'] 	= 'iso-8859-1';
		$config['wordwrap'] = TRUE;

		/*
		$config['protocol']    	= 'mail';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_user']    = 'norwin.kairo5@gmail.com';
        $config['smtp_pass']    = 'jedczpvjwxdyhqlo';
		$config['mailtype'] 	= 'html';
		$config['charset'] 		= 'iso-8859-1';
		$config['newline']      = '\r\n';
		$config['wordwrap'] 	= TRUE;
		*/
		
		$this->email->initialize($config);
		$this->email->from('do_not_reply@articulateit.co.za', 'Message from APP Plumber');
		$this->email->to($to);
		if($cc!='') $this->email->cc($cc);
		$this->email->subject($subject);
		$this->email->message($message);
		
		if($file!="") $this->email->attach($file);

		if($this->email->send()){
			$this->email->clear(true);
			return 'true';
		}else{
			//print_r($this->email->print_debugger());die;
			$this->email->clear(true);
			return 'false';
		}
	}

	function getdata_dashboardbanner($condition,$fromdate,$todate)
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
		return $query->result_array();			
	}

	function getdata_dashboardbanner1($condition,$fromdate,$todate, $extras = [])
	{					
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

	public function download_articles()
	{			
		/*$this->db->select('*');
		$this->db->from('articles');			
		$this->db->order_by('id desc');	*/

		$this->db->select('ac.*, COUNT(acc.id) as commentcount');
		$this->db->from('articles ac');        
		$this->db->join('articles_comments acc', 'acc.posted_on_article = ac.id AND acc.status = "1"', 'left');		
		$this->db->group_by('ac.id');
        $this->db->order_by('ac.position ASC');
		$query = $this->db->get();		
		$result = $query->result_array();	
		return $result;			
	}

	public function download_adbanners()
	{			
		$this->db->select('ad.*, cl.client_name, SUM(ct.impressions) AS count_impressions, SUM(ct.clickscount) AS count_clicks, pg.title as pagename');
		$this->db->from('advertising_adbanners ad');	
		$this->db->join('advertising_clients cl', 'cl.id = ad.client_id', 'left');
		$this->db->join('advertising_adbanners_impressions_count ct', 'ct.bannerid = ad.id', 'left');
		$this->db->join('pages as pg', 'pg.id = ad.page_id', 'left');

		$this->db->group_by('ad.id');
		$this->db->order_by('ad.id desc');	
			
		$query = $this->db->get();		
		$result = $query->result_array();	
		return $result;			
	}

	public function positionvalidator($data = []){
		
		$id 			= isset($data['id']) ? $data['id'] : '';		
		$position 		= $data['position'];
		$tablename 		= $data['tablename'];

		$this->db->where('position', $position);
		if($id!='') $this->db->where('id !=', $id);
		
		$query = $this->db->get(''.$tablename.'');
		
		if($query->num_rows() > 0){
			return 'false';
		}else{
			return 'true';
		}
	}

}

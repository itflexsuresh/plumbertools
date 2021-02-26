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
		/*$this->db->select('bic.id as bicid, bic.bannerid, bic.newpageid, SUM(bic.impressions) as impressionscount, SUM(bic.clickscount) as clickscount, ban.name as bannername, ban.client, ban.description, ban.topbottom, ban.image, ban.link, ban.active, pg.title as pagename');
		$this->db->from('banner_impressions_count as bic');
		$this->db->join('banner as ban', 'ban.id = bic.bannerid', 'left');
        $this->db->join('pages as pg', 'pg.id = bic.newpageid', 'left');

        $this->db->where_in('ban.active', $condition);
        $this->db->where('bic.created_at >=', $fromdate);
        $this->db->where('bic.created_at <=', $todate);
        $this->db->group_by('bic.newpageid');

		$query = $this->db->get();		
		return $query->result_array();	*/
		$groupCodition = array("bic.bannerid", "bic.newpageid");

		$this->db->select('bic.id as bicid, bic.bannerid, bic.newpageid, SUM(bic.impressions) as impressionscount, SUM(bic.clickscount) as clickscount, ban.name as bannername, ban.client, ban.description, ban.topbottom, ban.image, ban.link, ban.active, pg.title as pagename');
		$this->db->from('banner_impressions_count as bic');
		$this->db->join('banner as ban', 'ban.id = bic.bannerid', 'left');
        $this->db->join('pages as pg', 'pg.id = bic.newpageid', 'left');

        $this->db->where_in('ban.active', $condition);
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

}

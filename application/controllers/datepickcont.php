<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datepickcont extends CI_Controller {
	public function loaddatepick()
	{ 
		$this->load->view('datepick'); 
	}
}
?>
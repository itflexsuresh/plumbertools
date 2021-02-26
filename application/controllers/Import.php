<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Import extends CI_Controller {

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
		
	}
	public function location()
	{
		//http://new.plumbertools.co.za/import/location

		$this->db->truncate('location');
		$directory 	 = dirname(__DIR__, 2);
		$file 	= $directory.'/assets/import/Province_Area.xlsx';
		// $file 	= $directory.'/assets/import/Province_Area77.xlsx';
		$type 	= \PhpOffice\PhpSpreadsheet\IOFactory::identify($file);
		$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($type);
		$spreadsheet = $reader->load($file);
		
		$datas 	= $spreadsheet->getActiveSheet()->toArray();
		unset($datas[0]);
		foreach($datas as $key => $data){
			if ($data[2]!='') {
				$formdata = [
					'location' 	=> $data[2],
					'published' => '1',
				];
				$insertdata = $this->db->insert('location', $formdata);
			}
			
		}
		if ($insertdata) {
			echo "Location inserted sucessfully";
		}else{
			echo "Error";
		}
	}
}

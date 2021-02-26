<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
require 'vendor/autoload.php';

class Index extends CI_Controller {

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
		$this->load->model('Commonmodel');
		
	}
	public function ckeeditorimageupload(){

	if(isset($_FILES['upload']['name']))
		{
		 $directory 	 = dirname(__DIR__, 3);
		 $file = $_FILES['upload']['tmp_name'];
		 $file_name = $_FILES['upload']['name'];
		 $file_name_array = explode(".", $file_name);
		 $extension = end($file_name_array);
		 $new_image_name = rand() . '.' . $extension;
		 // chmod('upload', 0777);
		 // $allowed_extension = array("jpg", "png");
		 $allowed_extension = array("jpg", "png", "JPG", "PNG");
		 if(in_array($extension, $allowed_extension))
		 {
		  // move_uploaded_file($file, $directory.'/'.'images/' . $new_image_name);
		 	// image compression
		 	if ($_FILES["upload"]["size"] >= '1000000') {
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
		 	

		  $function_number = $_GET['CKEditorFuncNum'];
		  $url = $directory.'/'.'images/' . $new_image_name;
		  $imagebase = base_url().'images/'. $new_image_name;
		  $str = str_replace('\\', '/', $url);

		  $message = '';
		  echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$imagebase', '$message');</script>";
		 }else{
		 	echo "<script type='text/javascript'> alert('Only jpg and png are allowed')</script>";
		 }
		}

	}

	public function productguidesimport(){
		$directory 	 = dirname(__DIR__, 3);

		if (($handle = fopen($directory."/import/productguides.csv", "r")) !== FALSE) {
		  while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
		    $num = count($data);
		    $explodearray = explode(';', $data[0]);
		    unset($explodearray[0]);

		    $request['content'] 	= trim($explodearray[1], '"');
		    $request['image'] 		= trim($explodearray[2], '"');
		    $request['position'] 	= trim($explodearray[3], '"');
		    $request['published'] 	= trim($explodearray[4], '"');
		    $request['pdf'] 		= trim($explodearray[5], '"');
		  }
		  fclose($handle);
		}
		$data = $this->db->insert('productguides', $request);
		if ($data) {
			echo "Data inserted sucessfully";
		}else{
			echo "Something went wrong please try again";
		}
	}

	public function productguidessection1import(){
		$directory 	 = dirname(__DIR__, 3);

		if (($handle = fopen($directory."/import/productguidessection1.csv", "r")) !== FALSE) {
		  while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
		    $num = count($data);
			
			for ($c=0; $c < $num; $c++) {
				$explodearray = explode(',', $data[$c]);
				unset($explodearray[0]);
				$request['productguidesid'] = $explodearray[1];
			    $request['content'] 		= $explodearray[2];
			    $request['image'] 			= $explodearray[3];
			    $request['position'] 		= $explodearray[4];
			    $request['published'] 		= $explodearray[5];
			    $request['pdf'] 			= $explodearray[6];
			    echo "<pre>";print_r($explodearray);echo "<br>";
		        // $data 						= $this->db->insert('productguides', $request);
		    }
		  }
		  fclose($handle);
		}die;
		
		if ($data) {
			echo "Data inserted sucessfully";
		}else{
			echo "Something went wrong please try again";
		}
	}

	/*function download_banner(){					
		if ($this->input->post("activestatus") == 1) {$condition = 1;} else { $condition = 0;}

        if (!$this->input->post("fromdate")) {
            $currentdate = date("Y-m-d");
            $fromdate1   = date('Y-m-01', strtotime($currentdate));
            $todate1     = date('Y-m-t', strtotime($currentdate));
        } else {
            $fromdate1 = $this->input->post("fromdate");
            $todate1   = $this->input->post("todate");
        }

        $fromdate = date("Y-m-d", strtotime($fromdate1));
        $todate   = date("Y-m-d", strtotime($todate1));

        $result = $this->Commonmodel->getdata_dashboardbanner($condition, $fromdate, $todate);

        $directory = dirname(__DIR__, 3);
        $digits    = 2;
        $fn        = mt_rand(pow(10, $digits - 1), pow(10, $digits) - 1);
        $filename  = 'Advert_Summary' . $fn;

        $phpExcel = new Spreadsheet();

        $phpExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'S.No')
            ->setCellValue('B1', 'Name')
            ->setCellValue('C1', 'Client')
            ->setCellValue('D1', 'Description')
            ->setCellValue('E1', 'Impressions')
            ->setCellValue('F1', 'Clicks')
            ->setCellValue('G1', 'Section')
            ->setCellValue('H1', 'Active');

        $row = 2;
        $i   = 1;
        foreach ($result as $rows) {
            if ($rows['name'] != '' && $rows['pagesid'] != '0') {
                if ($rows['active'] == 1) {
                    $active = true;
                } else {
                    $active = false;
                }

                if ($rows['click_count'] > 0) {
                    $adtotalcount = $rows['click_count'];
                } else {
                    $adtotalcount = 0;
                }

                $phpExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $row . '', $i)
                    ->setCellValue('B' . $row . '', $rows['name'])
                    ->setCellValue('C' . $row . '', $rows['client'])
                    ->setCellValue('D' . $row . '', $rows['description'])
                    ->setCellValue('E' . $row . '', $rows['impressions_count'])
                    ->setCellValue('F' . $row . '', $adtotalcount)
                    ->setCellValue('G' . $row . '', $rows['pname'])
                    ->setCellValue('H' . $row . '', $active);

                $i++;
                $row = $row + 1;
            }
        }

        $writer = new Xlsx($phpExcel);
        $writer->save($directory.'/assets/uploads/dashboardreport/'.$filename.'.csv');
        // redirect($directory.'/assets/uploads/temp/Report.xlsx');
        // unlink($directory.'/assets/uploads/temp/Report.xlsx');
        echo $filename;
	}*/

	function download_banner(){					
		if ($this->input->post("activestatus") == 1) {$condition = 1;} else { $condition = 0;}

        if (!$this->input->post("fromdate")) {
            $currentdate = date("Y-m-d");
            $fromdate1   = date('Y-m-01', strtotime($currentdate));
            $todate1     = date('Y-m-t', strtotime($currentdate));
        } else {
            $fromdate1 = $this->input->post("fromdate");
            $todate1   = $this->input->post("todate");
        }

        $fromdate 			= date("Y-m-d", strtotime($fromdate1));
        $todate   			= date("Y-m-d", strtotime($todate1));
        $warehouse_staff 	= $this->input->post("warehouse_staff");

        // $result = $this->Commonmodel->getdata_dashboardbanner($condition, $fromdate, $todate);

        $result = $this->Commonmodel->getdata_dashboardbanner1($condition, $fromdate, $todate, ['warehouse_staff' => $warehouse_staff]);


        $directory = dirname(__DIR__, 3);
        $digits    = 2;
        $fn        = mt_rand(pow(10, $digits - 1), pow(10, $digits) - 1);
        $filename  = 'Advert_Summary' . $fn;

        $phpExcel = new Spreadsheet();

        $phpExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'S.No')
            ->setCellValue('B1', 'Banner ID')
            ->setCellValue('C1', 'Name')
            ->setCellValue('D1', 'Client')
            ->setCellValue('E1', 'Description')
            ->setCellValue('F1', 'Impressions')
            ->setCellValue('G1', 'Clicks')
            ->setCellValue('H1', 'Section')
            ->setCellValue('I1', 'Active');

        $row = 2;
        $i   = 1;
        foreach ($result as $rows) {
            // if ($rows['name'] != '' && $rows['pagesid'] != '0') {
                if ($rows['active'] == 1) {
                    $active = true;
                } else {
                    $active = false;
                }

                // if ($rows['click_count'] > 0) {
                //     $adtotalcount = $rows['click_count'];
                // } else {
                //     $adtotalcount = 0;
                // }

                $phpExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $row . '', $i)
                    ->setCellValue('B' . $row . '', $rows['bannerid'])
                    ->setCellValue('C' . $row . '', $rows['bannername'])
                    ->setCellValue('D' . $row . '', $rows['client'])
                    ->setCellValue('E' . $row . '', $rows['description'])
                    ->setCellValue('F' . $row . '', $rows['impressionscount'])
                    ->setCellValue('G' . $row . '', $rows['clickscount'])
                    ->setCellValue('H' . $row . '', $rows['pagename'])
                    ->setCellValue('I' . $row . '', $active);

                $i++;
                $row = $row + 1;
            // }
        }

        $writer = new Xlsx($phpExcel);
        $writer->save($directory.'/assets/uploads/dashboardreport/'.$filename.'.csv');
        // redirect($directory.'/assets/uploads/temp/Report.xlsx');
        // unlink($directory.'/assets/uploads/temp/Report.xlsx');
        echo $filename;
	}

	function download_pages(){						
		if(! $this->input->post("fromdate")){
			$currentdate 	= date("Y-m-d");
			$fromdate1 		= date('Y-m-01', strtotime($currentdate)); 
			$todate1 		= date('Y-m-t', strtotime($currentdate));
		}
		else{
			$fromdate1 		= $this->input->post("fromdate");  
			$todate1 		= $this->input->post("todate");
		}
		
		$fromdate 			= date("Y-m-d", strtotime($fromdate1));
		$todate 			= date("Y-m-d", strtotime($todate1));
		$warehouse_staff 	= $this->input->post("warehouse_staff");
						
		$result 			= $this->Commonmodel->getdata_dashboardpages($fromdate,$todate, ['warehouse_staff' => $warehouse_staff]);

		$directory 	 	= dirname(__DIR__, 3);
		$digits 		= 2;
		$fn 			= mt_rand(pow(10, $digits-1), pow(10, $digits)-1);
		$filename 		= 'Usage_Summary'.$fn;

		$phpExcel 		= new Spreadsheet();

		$phpExcel->setActiveSheetIndex(0)
					->setCellValue('A1','S.No')
					->setCellValue('B1','Page ID')
			        ->setCellValue('C1','Page Name')
			        ->setCellValue('D1','Views');	

		$row = 2;
		$i=1;
		foreach($result as $rows){			
			$phpExcel->setActiveSheetIndex(0)
					->setCellValue('A'.$row.'',$i)
					->setCellValue('B'.$row.'',$rows['id'])
			        ->setCellValue('C'.$row.'',$rows['title'])
			        ->setCellValue('D'.$row.'',$rows['totalcount']);	

			$i++;
			$row = $row+1;		    
		}
		
		$writer = new Xlsx($phpExcel);
		$writer->save($directory.'/assets/uploads/dashboardreport/'.$filename.'.csv');
		// redirect($directory.'/assets/uploads/temp/Report.xlsx');
		// unlink($directory.'/assets/uploads/temp/Report.xlsx');
		echo $filename;
	}
}

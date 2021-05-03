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
            ->setCellValue('I1', 'Created Date')
            ->setCellValue('J1', 'Inactive Date')
            ->setCellValue('K1', 'Active');

        $row = 2;
        $i   = 1;
        foreach ($result as $rows) {
            // if ($rows['name'] != '' && $rows['pagesid'] != '0') {
                if ($rows['active'] == 1) {
                    $active = true;
                } else {
                    $active = false;
                }

                if($rows['created_at'] !='') $created_at = date('d-m-Y', strtotime($rows['created_at']));
                	else $created_at = "-";

                if($rows['inactivedate'] !='') $inactivedate = date('d-m-Y', strtotime($rows['inactivedate']));
                	else $inactivedate = "-";

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
                    ->setCellValue('I' . $row . '', $created_at)
                    ->setCellValue('J' . $row . '', $inactivedate)
                    ->setCellValue('K' . $row . '', $active);

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

	function download_articles(){					
		if ($this->input->post("articles") == 'articles') {
	        $result = $this->Commonmodel->download_articles();

	        $directory = dirname(__DIR__, 3);
	        $digits    = 2;
	        $fn        = mt_rand(pow(10, $digits - 1), pow(10, $digits) - 1);
	        $filename  = 'Articles' . $fn;

	        $phpExcel = new Spreadsheet();

	        $phpExcel->setActiveSheetIndex(0)
	            ->setCellValue('A1', 'S.No')
	            ->setCellValue('B1', 'Start Date')
	            ->setCellValue('C1', 'Title')
	            ->setCellValue('D1', 'Description')
	            ->setCellValue('E1', 'Position')
	            ->setCellValue('F1', 'Number of Impressions')	            
	            ->setCellValue('G1', 'Number of Comments')
	            ->setCellValue('H1', 'Published');

	        $row = 2;
	        $i   = 1;
	        foreach ($result as $rows) {            
	          	if ($rows['published'] == 1) {
	           		$active = true;
				} else {
	            	$active = false;
				}
	                
	            $phpExcel->setActiveSheetIndex(0)
	            	->setCellValue('A' . $row . '', $i)
	                ->setCellValue('B' . $row . '', date('d-m-Y', strtotime($rows['start_date'])))
	                ->setCellValue('C' . $row . '', $rows['title'])
	                ->setCellValue('D' . $row . '', $rows['description'])
	                ->setCellValue('E' . $row . '', $rows['position'])
	                ->setCellValue('F' . $row . '', $rows['no_of_impressions'])	                
	                ->setCellValue('G' . $row . '', $rows['commentcount'])
	                ->setCellValue('H' . $row . '', $active);

				$i++;
	            $row = $row + 1;            
	        }

	        $writer = new Xlsx($phpExcel);
	        $writer->save($directory.'/assets/uploads/articlesreport/'.$filename.'.csv');        
	        echo $filename;
	    }
	}

	function download_adbanners(){					
		if ($this->input->post("advertisement") == 'advertisement') {
	        $result = $this->Commonmodel->download_adbanners();

	        $directory = dirname(__DIR__, 3);
	        $digits    = 2;
	        $fn        = mt_rand(pow(10, $digits - 1), pow(10, $digits) - 1);
	        $filename  = 'Advertisement ' . $fn;

	        $phpExcel = new Spreadsheet();

	        $phpExcel->setActiveSheetIndex(0)
	            ->setCellValue('A1', 'S.No')
	            ->setCellValue('B1', 'Banner ID')
	            ->setCellValue('C1', 'Advert Type')
	            ->setCellValue('D1', 'Advert Level')
	            ->setCellValue('E1', 'Start Date of Campaign')
	            ->setCellValue('F1', 'End Date of Campaign')
	            ->setCellValue('G1', 'Page Name')
	            ->setCellValue('H1', 'Client Name')
	            ->setCellValue('I1', 'Campaign Name / Description')
	            ->setCellValue('J1', 'Impressions Start Number')
	            ->setCellValue('K1', 'Total Impression Count To Date')
	            ->setCellValue('L1', 'Clicks')
	            ->setCellValue('M1', 'Status');

	        $row = 2;
	        $i   = 1;
	        foreach ($result as $rows) {            
	          	if($rows['advert_type'] == 0){
					$advert_type = 'Header';
				}elseif($rows['advert_type'] == 1){
					$advert_type = 'Advert';
				}elseif($rows['advert_type'] == 2){
					$advert_type = 'Banner';
				}

				if($rows['campaign_status'] == 0){
					$status = 'Inactive';
				}elseif($rows['campaign_status'] == 1){
					$status = 'Active';
				}elseif($rows['campaign_status'] == 2){
					$status = 'Suspend';
				}

				if($advert_type == 'Banner'){
					$pagename = $rows['pagename'];
				}else{
					$pagename = '-';
				}
	                
	            $phpExcel->setActiveSheetIndex(0)
	            	->setCellValue('A' . $row . '', $i)
	            	->setCellValue('B' . $row . '', $rows['id'])
	                ->setCellValue('C' . $row . '', $advert_type)
	                ->setCellValue('D' . $row . '', $rows['level'])
	                ->setCellValue('E' . $row . '', date('d-m-Y', strtotime($rows['start_date'])))
	                ->setCellValue('F' . $row . '', date('d-m-Y', strtotime($rows['end_date'])))
	                ->setCellValue('G' . $row . '', $pagename)
	                ->setCellValue('H' . $row . '', $rows['client_name'])
	                ->setCellValue('I' . $row . '', $rows['description'])
	                ->setCellValue('J' . $row . '', $rows['impressions'])
	                ->setCellValue('K' . $row . '', $rows['count_impressions'])
	                ->setCellValue('L' . $row . '', $rows['count_clicks'])
	                ->setCellValue('M' . $row . '', $status);

				$i++;
	            $row = $row + 1;            
	        }

	        $writer = new Xlsx($phpExcel);
	        $writer->save($directory.'/assets/uploads/articlesreport/'.$filename.'.csv');        
	        echo $filename;
	    }
	}

	function download_newbanner(){					
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
        $fn = date('dFY');
        $filename  = 'Advert_Summary_' . $fn;

        $phpExcel = new Spreadsheet();

        $phpExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'S.No')
            ->setCellValue('B1', 'Banner ID')            
            ->setCellValue('C1', 'Client')
            ->setCellValue('D1', 'Description')
            ->setCellValue('E1', 'Impressions')
            ->setCellValue('F1', 'Clicks')
            ->setCellValue('G1', 'Section')
            ->setCellValue('H1', 'Created Date')
            ->setCellValue('I1', 'Inactive Date')
            ->setCellValue('J1', 'Active');

        $row = 2;
        $i   = 1;
        foreach ($result as $rows) {
            // if ($rows['name'] != '' && $rows['pagesid'] != '0') {
                if ($rows['campaign_status'] == 1) {
                    $active = true;
                } else {
                    $active = false;
                }

                if($rows['created_at'] !='') $created_at = date('d-m-Y', strtotime($rows['created_at']));
                	else $created_at = "-";

                if($rows['inactive_date'] !='') $inactivedate = date('d-m-Y', strtotime($rows['inactive_date']));
                	else $inactivedate = "-";

                // if ($rows['click_count'] > 0) {
                //     $adtotalcount = $rows['click_count'];
                // } else {
                //     $adtotalcount = 0;
                // }

                $phpExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $row . '', $i)
                    ->setCellValue('B' . $row . '', $rows['bannerid'])                    
                    ->setCellValue('C' . $row . '', $rows['client_name'])
                    ->setCellValue('D' . $row . '', $rows['description'])
                    ->setCellValue('E' . $row . '', $rows['impressionscount'])
                    ->setCellValue('F' . $row . '', $rows['clickscount'])
                    ->setCellValue('G' . $row . '', $rows['pagename'])
                    ->setCellValue('H' . $row . '', $created_at)
                    ->setCellValue('I' . $row . '', $inactivedate)
                    ->setCellValue('J' . $row . '', $active);

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

	public function ad_migrate()
    {
        $data        = '';
        $currentdate = date("Y-m-d");
        $yesterday   = date('Y-m-d', strtotime("yesterday"));
        $yearEnd     = date('Y-m-d', strtotime('12/31'));

        $query   = $this->db->get('banner');
        $results = $query->result_array();
        // echo "<pre>";
        // print_r($results);die();

        foreach ($results as $row) {
            if (!empty($row['client'])) {
                $this->db->where('client_name', $row['client']);
                $query1   = $this->db->get('advertising_clients');
                $results1 = $query1->row_array();

                if ($results1) {
                    $client_id = $results1['id'];
                } else {
                    $request_client['client_name'] = $row['client'];
                    $request_client['created_at']  = $row['created_at'];
                    $request_client['updated_at']  = $row['updated_at'];
                    $data1                         = $this->db->insert('advertising_clients', $request_client);
                    $client_id                     = $this->db->insert_id();
                }
            } else {
                $client_id = null;
            }

            if ($row['active'] == 0 || $row['active'] == 2) {
                $request['start_date']    = $yesterday;
                $request['end_date']      = $yesterday;
                $request['inactive_date'] = $row['inactivedate'];
            } elseif ($row['active'] == 1) {
                $request['start_date']    = $currentdate;
                $request['end_date']      = $yearEnd;
                $request['inactive_date'] = $row['inactivedate'];
            }

            $request['client_id']       = $client_id;
            $request['import_id']       = $row['id'];
            $request['campaign_status'] = $row['active'];
            $request['advert_type']     = '2';
            $request['url']             = $row['link'];
            $request['description']     = $row['name'] . ' - ' . $row['description'];
            $request['page_id']         = $row['pagesid'];
            $request['file']            = $row['image'];
            $request['file_type']       = 'Image';
            $request['created_at']      = $row['created_at'];
            $request['updated_at']      = $row['updated_at'];

            // echo "<pre>";
            // print_r($request);
            // die();
            $data = $this->db->insert('advertising_adbanners', $request);
            // $request2['bannerid'] = $this->db->insert_id();
            // $data2                = $this->db->update('banner_impressions_count', $request2, ['bannerid' => $row['id']]);
        }

        if ($data) {
            echo "Data inserted sucessfully";
        } else {
            echo "Something went wrong please try again";
        }
    }

    public function adimpression_migrate()
    {
        $data = '';

        $query   = $this->db->get('banner_impressions_count');
        $results = $query->result_array();

        foreach ($results as $row) {
            $request['bannerid']    = $row['bannerid'];
            $request['newpageid']   = $row['newpageid'];
            $request['impressions'] = $row['impressions'];
            $request['clickscount'] = $row['clickscount'];
            $request['created_at']  = $row['created_at'];
            $data                   = $this->db->insert('advertising_adbanners_impressions_count', $request);
        }

        $query1   = $this->db->get('advertising_adbanners');
        $results1 = $query1->result_array();

        foreach ($results1 as $row1) {
            $request1['bannerid'] = $row1['id'];
            $data1                = $this->db->update('advertising_adbanners_impressions_count', $request1, ['bannerid' => $row1['import_id']]);
        }

        if ($data) {
            echo "Data Updated sucessfully";
        } else {
            echo "Something went wrong please try again";
        }
    }
}

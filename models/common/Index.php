<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
		 $allowed_extension = array("jpg", "png");
		 if(in_array($extension, $allowed_extension))
		 {
		  move_uploaded_file($file, $directory.'/'.'images/' . $new_image_name);
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
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Adminmodel');
		$this->load->model('Commonmodel');
		$this->load->model('Apimodel');
		$this->load->model('Usersmodel');
	}

	public function ajaxfileupload2()
    {    	
        $post = $this->input->post();        
        $path = strval($post['path']);
        $type = strval($post['type']);

        $result = $this->Adminmodel->fileUpload2('file', $path, $type);
        echo json_encode($result);
    }
	
	public function ajaxfileupload()
	{
		$post 			= $this->input->post();
		$path			= strval($post['path']);
		$type			= strval($post['type']);
		
		$result 		= $this->Adminmodel->fileUpload('file', $path, $type);
		echo json_encode($result);
	}

	public function emailVerification()
	{
		$post 			= $this->input->post();

		$id 			= 	$post['id'];
		$userdetails 	= 	$this->Usersmodel->getList('row', ['userid' => $id]);
		$subject 		= 	'App Plumber Account verification';
		$message 		= 	'<div>Good day '.$userdetails['name'].'</div>
							<br>
							<div>You have received this verification email to verify your new account on the App Plumber app. If you received this email in error or you did not create an account with us, please ignore this email.</div>
							<br>
							<div>If you have created an account with us, click on the link below to verify your email address.
								Verify my email and activate my account <a href="'.base_url().'admincontrol/emailverification/'.$id.'">Click Here</a></div>
							<br>
							<div>Do not reply on this email, as your emails will not be answered.</div>
							<br>
							<div>Best Regards</div>
							<br>
							<div>Articulate IT Team.</div>';
		$maildata = $this->Commonmodel->sentMail($post['email'], $subject, $message);
		if ($maildata) {
			echo "1";
		}else{
			echo "0";
		}

	}
	public function requestOTP(){

		$post 				= $this->input->post();
		$userdata 			= $this->Apimodel->getList('row',['credential' => $post['email'], 'pagetype' => 'adminotp']);
		$otpdata 			= $this->Apimodel->generteOTP(['userid' => $userdata['id']]);
		$verificationdata 	= $this->emailOTPverification(['otpid' => $otpdata]);

		if ($verificationdata =='1') {
			echo "1";
		}else{
			echo "0";
		}
	}

	public function emailOTPverification($data)
	{
		$otpdata 	= $this->Apimodel->getOTPlist('row', ['otpid' => $data['otpid']]);

		$id 		= 	$data['otpid'];
		$subject 	= 	'OTP Verification';
		$message 	= 	'<div>Please reset your password by using the OTP below:</div>
						<br>
						<div>'.$otpdata['otpcode'].'</div>
						<br>
						<div>Best Regards</div>
						<br>
						<div>Articulate IT Team.</div>
						<br>
						<div>Please do not reply to this email, as it will not be responded to.</div>
						';
		$maildata = $this->Commonmodel->sentMail($otpdata['email'], $subject, $message);
		if ($maildata) {
			return '1';
		}else{
			return '0';
		}

	}

	public function settingsAction(){
		$post = $this->input->post();

		$data = $this->Adminmodel->ratemywork_settingsAction($post);
		if ($data) {
			echo '1';
		}else{
			echo '0';
		}
	}

	public function tagAction(){
		$post = $this->input->post();

		$data = $this->Adminmodel->tagmanagementAction($post);
		if ($data) {
			echo '1';
		}else{
			echo '0';
		}
	}
	public function tagchangeStatus(){
		$post = $this->input->post();

		$data = $this->Adminmodel->tagchangeStatus($post);
		// redirect(base_url().'admincontrol/settings','refresh');
		if ($data) {
			echo '1';
		}else{
			echo '0';
		}
	}

	public function reportAction(){
		$post = $this->input->post();

		$data = $this->Adminmodel->reportAction($post);
		if ($data) {
			echo '1';
		}else{
			echo '0';
		}
	}
	public function reportchangeStatus(){
		$post = $this->input->post();

		$data = $this->Adminmodel->reportchangeStatus($post);
		// redirect(base_url().'admincontrol/settings','refresh');
		if ($data) {
			echo '1';
		}else{
			echo '0';
		}
	}

	public function positionValidator(){
		$post = $this->input->post();
		
		$result = $this->Commonmodel->positionvalidator($post);

		echo $result;
	}


}

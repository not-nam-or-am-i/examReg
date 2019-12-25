<?php
defined('BASEPATH') OR exit('No direct access allowed');

class Log_controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('log_model');
	}
	public function index($msg = NULL) {
		$data['msg'] = $msg;
		$this->load->view('login_view', $data);
	}
	public function login() {
		$result = $this->log_model->validate();
		
		if (! $result ) {
			$msg = "<font color='red'>Invalid username or password !</font>";
			$this->index($msg);
		} else {
			redirect('examReg/index.php/CRUD_Students_Controller');
		}
	}		
	public function logout() {
		$this->log_model->destroy_session();
		$this->index();
	}
}
?>
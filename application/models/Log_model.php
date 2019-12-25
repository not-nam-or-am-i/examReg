<?php
defined('BASEPATH') OR exit('No direct access allowed');

class Log_model extends BASE_model {
	protected $table = 'account';
	
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
	}
	public function validate() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$this->db->where('id', $username);
		$this->db->where('password', $password);
		
		$query = $this->db->get('account');
		if ($query->num_rows() == 1) {
			$row = $query->row();
			
			$new_session = array(
				'session_id' => $row->id,
			);
			$this->session->set_userdata($new_session);
			
			return true;
		}
		return false;
	}
	public function destroy_session() {
		$this->session->unset_userdata('session_id');
	}
}
?>
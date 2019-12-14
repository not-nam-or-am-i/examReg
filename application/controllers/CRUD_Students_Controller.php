<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUD_Students_Controller extends CI_Controller {

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
	public function index()
	{
    //TODO: 
    /*
        $this->load->model('account');
        $student_accounts = $this->account->getAll(); // if isAdmin==false
    */

    //TODO: xong load đống thuộc tính vào array

		$this->load->view('admin_homepage');
	}

	public function create() {
        
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('id', 'ID', 'required');
 
        if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin_create_student');
        } else {
            //TODO: create in database

            redirect($this->input->post('admin_homepage'));
        }
	}
	
	public function update($id) {
        
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('id', 'ID', 'required');
 
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin_update_student');
        } else {
            //TODO: update in database

            redirect($this->input->post('admin_homepage'));
        }
	}

	public function delete() {
        
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('id', 'ID', 'required');
 
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin_delete_student');
        } else {
            //TODO: delete in database

            redirect($this->input->post('admin_homepage'));
        }
	}

}
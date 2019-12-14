<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUD_Students_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->model('account_model');
    }

    //load trang mặc định
	public function index()
	{   
        $data['student_accounts'] = $this->account_model->get_all_students();
		$this->load->view('admin/admin_homepage', $data);
	}

    //tạo một tài khoản cho sinh viên
	public function create() {
        //kiểm tra dữ liệu điền vào có trống không
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('khoa_hoc', 'Khóa học', 'required');
 
        if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin/admin_create_student');
        } else {
            $data = array(
                'ten'       => $this->input->post('name'),
                'id'        => $this->input->post('id'),
                'khoa_hoc'  => $this->input->post('khoa_hoc'),
                'password'  => $this->input->post('password')
            );
            $this->account_model->insert($data);

            redirect('admin');
        }
	}
    
    //sửa thông tin sinh viên
	public function update($id) {
        $data['student'] = $this->account_model->get_by_id($id);
        
        //kiểm tra dữ liệu điền vào có trống không
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('khoa_hoc', 'Khóa học', 'required');
 
        if ($this->form_validation->run() === FALSE) {
            $data['id'] = $id;
            $this->load->view('admin/admin_update_student', $data);
        } else {
            $update_data = array(
                'ten'       => $this->input->post('name'),
                'id'        => $this->input->post('id'),
                'khoa_hoc'  => $this->input->post('khoa_hoc'),
                'password'  => $this->input->post('password')
            );
            $this->account_model->update($id, $update_data);

            redirect('admin');
        }
	}

    //TODO: chạy, nhưng TẠI SAO NÓ KHÔNG DIRECT SANG DELETE VIEW???
	public function delete($id) {
        $data['student'] = $this->account_model->get_by_id($id);
        $this->load->view('admin/admin_delete_student');

        $this->account_model->delete($id);
        redirect('admin');
	}

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUD_Students_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->model('account_model');
        // check login admin:
        if (!$this->session->userdata('logged_in') || !$this->session->userdata('is_admin')){
            redirect('login');
        }
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
        $this->form_validation->set_rules('ten', 'Tên', 'required');
        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('khoa_hoc', 'Khóa học', 'required');
 
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/admin_create_student');
            $this->session->set_flashdata('error', "Unexpected error?");
        } else {
            $data = array(
                'ten'       => $this->input->post('ten'),
                'id'        => $this->input->post('id'),
                'khoa_hoc'  => $this->input->post('khoa_hoc'),
                'password'  => md5($this->input->post('password'))
            );
            $this->account_model->insert($data);
            $this->session->set_flashdata('success', "Thêm sinh viên thành công"); 
            redirect('admin');
        }
	}
    
    //sửa thông tin sinh viên
	public function update($id) {
        $data['student'] = $this->account_model->get_by_id($id);
        
        //kiểm tra dữ liệu điền vào có trống không
        $this->form_validation->set_rules('ten', 'Tên', 'required');
        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('khoa_hoc', 'Khóa học', 'required');
 
        if ($this->form_validation->run() === FALSE) {
            $data['id'] = $id;
            $this->load->view('admin/admin_update_student', $data);
            $this->session->set_flashdata('error', "Unexpected error?");
        } else {
            $update_data = array(
                'ten'       => $this->input->post('ten'),
                'id'        => $this->input->post('id'),
                'khoa_hoc'  => $this->input->post('khoa_hoc'),
                'password'  => md5($this->input->post('password'))
            );
            $this->account_model->update($id, $update_data);
            $this->session->set_flashdata('success', "Sửa thông tin sinh viên thành công"); 
            redirect('admin');
        }
	}

	public function delete($id) {
        $data['student'] = $this->account_model->get_by_id($id);

        $this->account_model->delete($id);
        if ($this->account_model->delete($id) === FALSE) {
            $this->session->set_flashdata('error', "Unexpected error?");
        } else {
            $this->session->set_flashdata('success', "Xoá sinh viên thành công"); 
            redirect('admin');
        }
    }
    
    //TODO: MULTIPLE DELETE BY CHECKBOX
    /*
    public function delete_multiple() {
        if ($this->input->post('checkbox_value')) {
            $id = $this->input->post('checkbox_value');
            for ($count = 0; $count < count($id); $count++) {
                $this->account_model->delete($id[$count]);
            }
        }
    }
    */
    /*
    public function delete_multiple($id) {
        $data['student'] = $this->account_model->get_by_id($id);

        $this->account_model->delete($id);
        if ($this->account_model->delete($id) === FALSE) {
            //TODO: insert a failure msg
        } else {
            //TODO: insert a success msg
            redirect('admin');
        }
    }
    */
}
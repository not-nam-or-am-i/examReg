<?php
//admin tạo kỳ thi

class Create_exam_period_controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->model('ky_thi_model');
        $this->load->model('ca_model');
        $this->load->model('phong_model');
        $this->load->model('phong_ca_model');
        $this->load->model('mon_model');
        // check login admin:
        if (!$this->session->userdata('logged_in') || !$this->session->userdata('is_admin')){
            redirect('login');
        }
    }

    //load trang mặc định
    public function index()
	{   
        $data['exam_periods'] = $this->ky_thi_model->get_all_periods();
        $this->load->view('admin/exam_periods/admin_exam_period', $data);
    }
    
    //tạo kỳ thi
    public function create() {
        //không cần id vì auto increment
        $this->form_validation->set_rules('hoc_ky', 'Học kỳ', 'required');
        $this->form_validation->set_rules('nam', 'Năm', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/exam_periods/admin_create_exam_period');
            $this->session->set_flashdata('error', "Unexpected error?");
        } else {
            $data = array(
                'hoc_ky'       => $this->input->post('hoc_ky'),
                'nam'          => $this->input->post('nam')
            );
            $this->ky_thi_model->insert($data);
            $this->session->set_flashdata('success', "Thêm kỳ thi thành công"); 
            redirect('admin/exam-period');
        }
    }

	public function update($id) {
        $data['period'] = $this->ky_thi_model->get_by_id($id);
        
        $this->form_validation->set_rules('hoc_ky', 'Học kỳ', 'required');
        $this->form_validation->set_rules('nam', 'Năm', 'required');
 
        if ($this->form_validation->run() === FALSE) {
            $data['id'] = $id;
            $this->load->view('admin/exam_periods/admin_update_exam_period', $data);
            $this->session->set_flashdata('error', "Sửa thông tin kỳ thi không thành công");
        } else {
            $update_data = array(
                'hoc_ky'        => $this->input->post('hoc_ky'),
                'nam'           => $this->input->post('nam')
            );
            $this->ky_thi_model->update($id, $update_data);
            $this->session->set_flashdata('success', "Sửa thông tin kỳ thi thành công"); 
            redirect('admin/exam-period');
        }
	}

	public function delete($id) {
        $this->ky_thi_model->delete($id);
        if ($this->ky_thi_model->delete($id) === FALSE) {
            $this->session->set_flashdata('error', "Xóa kỳ thi không thành công");
        } else {
            $this->session->set_flashdata('success', "Xoá kỳ thi thành công"); 
            redirect('admin/exam-period');
        }
    }

    public function ca_index()
	{   
        $data['exam_periods'] = $this->ky_thi_model->get_all_periods();
        $this->load->view('admin/exam_periods/admin_exam_period', $data);
    }
    
    //tạo ca thi cho kỳ thi
    public function create_ca($id_ky_thi) {
        $data['id_ky_thi'] = $id_ky_thi;
        $data['subjects'] = $this->mon_model->get_all_subjects();
        $this->load->view('admin/exam_periods/admin_create_ca', $data);

        //không cần id vì auto increment
        //NOTE: input kiểu datetime?
        $this->form_validation->set_rules('bat_dau', 'Thời gian bắt đầu', 'required');
        $this->form_validation->set_rules('ket_thuc', 'Thời gian kết thúc', 'required');
        $this->form_validation->set_rules('subjectList', 'Môn học', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/exam_periods/admin_create_ca');
            $this->session->set_flashdata('error', "Thêm ca thi không thành công");
        } else {
            $data = array(
                'bat_dau'           => $this->input->post('bat_dau'),
                'ket_thuc'          => $this->input->post('ket_thuc'),
                'id_ky_thi'         => $id_ky_thi,
                'id_mon'            => $this->input->post('subjectList')
            );
            $this->ca_model->insert($data);
            $this->session->set_flashdata('success', "Thêm ca thi thành công"); 
            redirect('admin/exam-period-details/'.$id_ky_thi);
        }
    }

    public function delete_ca($id) {
        $this->ky_thi_model->delete($id);
        if ($this->ky_thi_model->delete($id) === FALSE) {
            //TODO: insert a failure msg
        } else {
            //TODO: insert a success msg
            //TODO: redirect
        }
    }

    //lấy ca và môn tương ứng của kỳ thi
    public function get_all_ca($id_ky_thi) {
        $data['ca'] = $this->ca_model->get_ca_by_ky($id_ky_thi);
        //TODO: thêm load view
    }

    //thêm phòng thi vào ca thi
    //TODO: chưa biết làm hàm này như nào cả...
    public function add_phong($id_ca) {
        //TODO: kiểu gì cũng phải insert vào bảng phong_ca nhưng chưa biết cách lấy id phòng
    }

    //xem chi tiết ca_môn trong kỳ thi
    public function view_detail_index($id)
	{   
        $data['period']  = $this->ky_thi_model->get_by_id($id);
        $data['details'] = $this->phong_ca_model->get_ca_mon($id);
        $this->load->view('admin/exam_periods/admin_view_period_details', $data);
    }

    //xem phòng thi trong ca thi
    public function view_detail_room_index($id_ky_thi, $id_ca)
	{   
        $data['period']  = $this->ky_thi_model->get_by_id($id_ky_thi);
        $data['ca']  = $this->ca_model->get_by_id($id_ca);
        $data['details'] = $this->phong_ca_model->get_phong_by_ca($id_ca);
        $this->load->view('admin/exam_periods/admin_view_rooms', $data);
    }

    //tạo phòng thi cho ca thi
    public function create_room($id_ky_thi, $id_ca) {
        $data['id_ky_thi'] = $id_ky_thi;
        $data['id_ca'] = $id_ca;
        $data['details'] = $this->phong_ca_model->get_phong_by_ca($id_ca);
        $this->load->view('admin/exam_periods/admin_create_ca', $data);

        //không cần id vì auto increment
        //NOTE: input kiểu datetime?
        $this->form_validation->set_rules('bat_dau', 'Thời gian bắt đầu', 'required');
        $this->form_validation->set_rules('ket_thuc', 'Thời gian kết thúc', 'required');
        $this->form_validation->set_rules('subjectList', 'Môn học', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/exam_periods/admin_create_ca');
            $this->session->set_flashdata('error', "Thêm ca thi không thành công");
        } else {
            $data = array(
                'bat_dau'           => $this->input->post('bat_dau'),
                'ket_thuc'          => $this->input->post('ket_thuc'),
                'id_ky_thi'         => $id_ky_thi,
                'id_mon'            => $this->input->post('subjectList')
            );
            $this->ca_model->insert($data);
            $this->session->set_flashdata('success', "Thêm ca thi thành công"); 
            redirect('admin/exam-period-details/'.$id_ky_thi);
        }
    }

}
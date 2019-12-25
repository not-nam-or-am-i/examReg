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
    
    //tạo ca thi cho kỳ thi
    public function create_ca($id_ky_thi, $id_mon) {
        //không cần id vì auto increment
        //NOTE: input kiểu datetime?
        $this->form_validation->set_rules('bat_dau', 'Thời gian bắt đầu', 'required');
        $this->form_validation->set_rules('ket_thuc', 'Thời gian kết thúc', 'required');

        if ($this->form_validation->run() === FALSE) {
            //TODO: load view
            //TODO: insert a failure msg
        } else {
            $data = array(
                'bat_dau'           => $this->input->post('bat_dau'),
                'ket_thuc'          => $this->input->post('ket_thuc'),
                'id_ky_thi'         => $id_ky_thi,
                'id_mon'            => $id_mon
            );
            $this->ca_model->insert($data);
            //TODO: insert a success msg
            //TODO: redirect 
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

    public function view_detail_index($id)
	{   
        $data['period']  = $this->ky_thi_model->get_by_id($id);
        $data['details'] = $this->phong_ca_model->get_ca_mon_phong($id);
        $this->load->view('admin/exam_periods/admin_view_period_details', $data);
    }

    //TODO: Tạo create_phong_ca controller (ĐỀ BÀI CHỈ NÓI THÊM THÔI, thích thì viết nốt sửa xóa mệt quạ...)
    public function create_detail() {
        
    }
    
    
}
<?php
//admin tạo kỳ thi

class Create_exam_period_controller extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->model('ky_thi_model');
        $this->load->model('ca_model');
        $this->load->model('phong_model');
        $this->load->model('phong_ca_model');
        $this->load->model('mon_model');
    }

    //tạo kỳ thi
    public function create() {
        //không cần id vì auto increment
        $this->form_validation->set_rules('hoc_ky', 'Học kỳ', 'required');
        $this->form_validation->set_rules('nam', 'Năm', 'required');

        if ($this->form_validation->run() === FALSE) {
            //TODO: load view
            //TODO: insert a failure msg
        } else {
            $data = array(
                'hoc_ky'       => $this->input->post('hoc_ky'),
                'nam'        => $this->input->post('nam')
            );
            $this->ky_thi_model->insert($data);
            //TODO: insert a success msg
            //TODO: redirect 
        }
    }

	public function update($id) {
        $data['ky_thi'] = $this->ky_thi_model->get_by_id($id);
        
        $this->form_validation->set_rules('hoc_ky', 'Học kỳ', 'required');
        $this->form_validation->set_rules('nam', 'Năm', 'required');
 
        if ($this->form_validation->run() === FALSE) {
            $data['id'] = $id;
            //TODO: load view
        } else {
            $update_data = array(
                'hoc_ky'        => $this->input->post('hoc_ky'),
                'nam'           => $this->input->post('nam')
            );
            $this->ky_thi_model->update($id, $update_data);
            //TODO: insert a success msg
            //TODO: redirect
        }
	}

	public function delete($id) {
        $this->ky_thi_model->delete($id);
        if ($this->ky_thi_model->delete($id) === FALSE) {
            //TODO: insert a failure msg
        } else {
            //TODO: insert a success msg
            //TODO: redirect
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

    //thêm phòng thi vào ca thi
    //TODO: chưa biết làm hàm này như nào cả...
    public function add_phong($id_ca) {
        //TODO: kiểu gì cũng phải insert vào bảng phong_ca nhưng chưa biết cách lấy id phòng
    }
}
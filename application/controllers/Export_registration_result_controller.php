<?php
//sinh viên in kết quả đăng ký
//NOTE: chưa rõ cách lấy id của sinh viên kiểu gì nên viết tạm là tham số $id_sv vào hàm

class Export_registration_result_controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->model('sv_phong_ca_model');
        // check login sv:
        if (!$this->session->userdata('logged_in') || $this->session->userdata('is_admin')){
            redirect('login');
        }
    }

    //lấy kết quả đăng ký thi
    public function get_reg_result() {
        //data reg_result gồm có: id môn, tên môn, id ca, giờ bắt đầu, giờ kết thúc, tên phòng thi
        $id_sv = $this->session->userdata('user_id');
        $data['reg_result'] = $this->sv_phong_ca_model->get_reg_result(12);

        $this->load->view('student/student_export_reg_result', $data);
    }
}
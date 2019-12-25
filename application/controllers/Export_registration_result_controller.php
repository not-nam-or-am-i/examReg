<?php
//sinh viên in kết quả đăng ký
//NOTE: chưa rõ cách lấy id của sinh viên kiểu gì nên viết tạm là tham số $id_sv vào hàm

class Export_registration_result_controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->model('sv_phong_ca_model');
		// Phải có 2 lệnh sau ở mỗi Controller
		$this->load->library('session');
		$this->check_authentication();
    }
	// kiểm tra tình trạng đăng nhập
	public function check_authentication() {
		if (! $this->session->userdata('session_id')) {
			redirect('examReg/index.php/Log_controller');
		}
	}
    //lấy kết quả đăng ký thi
    public function get_reg_result($id_sv) {
        //data reg_result gồm có: id môn, tên môn, id ca, giờ bắt đầu, giờ kết thúc, tên phòng thi
        $data['reg_result'] = $this->sv_phong_ca_model->get_reg_result($id_sv);

        //TODO: load view
    }
}
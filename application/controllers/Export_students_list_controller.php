<?php
    //admin in danh sách thí sinh dự thi theo từng phòng thi của các ca thi.
    //xem export pdf note tôi gửi
    //TODO: sửa load view trong hàm index()
    class Export_students_list_controller extends CI_Controller {
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
        //load trang mặc định
        public function index($id_ca, $id_phong) {
            //lấy ra danh sách sinh viên thi ca '$id_ca' trong phòng '$id_phong'
            //data list gồm có: id sv, tên sv, khóa học
            $data['list'] = $this->sv_phong_ca_model->get_students_list($id_ca, $id_phong);

            //TODO: sửa $this->load->view('students_list_view/list', $data);
        }
    }
?>


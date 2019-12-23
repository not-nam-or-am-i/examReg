<?php
    //admin in danh sách thí sinh dự thi theo từng phòng thi của các ca thi.
    //xem export pdf note tôi gửi
    //TODO: sửa load view trong hàm index()
    class Export_students_list_controller extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->helper('url', 'form');
            $this->load->model('sv_phong_ca_model');
        }

        //load trang mặc định
        public function index($id_ca, $id_phong) {
            //lấy ra danh sách sinh viên thi ca '$id_ca' trong phòng '$id_phong'
            $data['list'] = $this->sv_phong_ca_model->get_students_list($id_ca, $id_phong);

            //TODO: sửa $this->load->view('students_list_view/list', $data);
        }
    }
?>


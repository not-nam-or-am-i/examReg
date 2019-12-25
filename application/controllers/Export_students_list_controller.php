<?php
require 'vendor/autoload.php';
use Dompdf\Dompdf;
//admin in danh sách thí sinh dự thi theo từng phòng thi của các ca thi.
//xem export pdf note tôi gửi
//TODO: thêm trang mặc định gồm có danh sách các phòng thi
class Export_students_list_controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->model('sv_phong_ca_model');
    }

    //TODO: trang mặc định, hiện ca - phòng cho admin chọn để sau đó export danh sách sv trong phòng đó
    public function index() {

    }

    //lấy danh sách sinh viên trong phòng thi, cần được truyền vào id_ca và id_phong
    public function get_students_list($id_ca, $id_phong) {
        //lấy ra danh sách sinh viên thi ca '$id_ca' trong phòng '$id_phong'
        //data list gồm có: id sv, tên sv, khóa học
        $data['students'] = $this->sv_phong_ca_model->get_students_list($id_ca, $id_phong);

        $this->load->view('admin/export/admin_export_room', $data);
    }
}


?>


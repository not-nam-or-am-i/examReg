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
        $this->load->model('phong_model');
        // check login admin:
        if (!$this->session->userdata('logged_in') || !$this->session->userdata('is_admin')){
            redirect('login');
        }
    }

    //TODO: trang mặc định, hiện ca - phòng cho admin chọn để sau đó export danh sách sv trong phòng đó
    public function index() {

    }

    //lấy danh sách sinh viên trong phòng thi, cần được truyền vào id_ca và id_phong
    public function get_students_list($id_ca, $id_phong) {
        //lấy ra danh sách sinh viên thi ca '$id_ca' trong phòng '$id_phong'
        //data list gồm có: id sv, tên sv, khóa học
        $data['students'] = $this->sv_phong_ca_model->get_students_list($id_ca, $id_phong);
        $data['phong'] = $this->phong_model->get_by_id($id_phong)->ten_phong;
        $data['id_ca'] = $id_ca;

        $this->load->view('admin/export/admin_export_room', $data);
        //hàm này để thực hiện download file pdf
        function download() {
            //get file content after the script is server-side interpreted
            $data['content'] = $this->session->userdata('htmlPage');
            
            //debug...
            //$this->load->view('pdf_view/view_data', $data);
            
            $dompdf = new DOMPDF();

            //load stored html string
            $dompdf->loadHtml($data['content']);
            $dompdf->render();
            $dompdf->stream("danh sách sinh viên.pdf");
        }
    }
}


?>


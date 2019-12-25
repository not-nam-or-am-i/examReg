<?php
//TODO: sửa view dòng 15 và 46
//COMMENT: geez đừng bắt tôi viết TODO = dòng nữa tôi còn sửa 3 tỉ thứ...
require 'vendor/autoload.php';

class Import_Students_Info_Controller extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->model('account_model');
    }

    //load view trang 
    public function index() {
        $this->load->view('admin/import/admin_import_students');
    }

    //lưu thông tin excel vào csdl
    public function import_excel() {
        //mảng data_batch lưu tất cả dữ liệu được nhận từ excel
        $data_batch = array();

        //TODO: check file extension
        //kiểm tra điều kiên file đã được đặt chưa
        if (isset($_FILES["file"]["name"])) {
            //lấy đường dẫn vào lưu data vào mảng
            $path = $_FILES["file"]["tmp_name"];
            $data = \PhpOffice\PhpSpreadsheet\IOFactory::load($path)->getActiveSheet()->toArray();
            
            //unset dòng đầu tiên tại vì nó không mang dữ liệu
            unset($data[0]);

            //duyệt mảng data rồi lưu dữ liệu và data_batch
            foreach ($data as $row) {
                array_push($data_batch, array(
                    'ten'       => $row[0],
                    'id'        => $row[1],
                    'khoa_hoc'  => $row[2],
                    'password'  => md5($row[3]),
                    'is_admin'  => false
                ));
            }

            $affectedRow = $this->account_model->insert_multiple($data_batch);

            if ($affectedRow == 0) {
                $this->session->set_flashdata('error', "Unexpected, oops");
            }
            else {
                $this->session->set_flashdata('success', "Thêm danh sách sinh viên thành công"); 
                redirect('admin');
            }
        } 
    }
}
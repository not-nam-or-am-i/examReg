<?php
//admin nhập danh sách sinh viên học từng môn học
//TODO: sửa view trong upload_file và cuối import_excel(); hàm import excel cần được truyền id môn học
require 'vendor/autoload.php';

class Import_students_list_by_subject_controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->model('sv_mon_model');
    }

    //load view trang 
    public function upload_file() {
        //TODO:
        //$this->load->view('excel_view/excel_data);
    }

    //lưu thông tin excel vào csdl
    public function import_excel($id_mon) {
        //mảng data_batch lưu tất cả dữ liệu được nhận từ excel
        $data_batch = array();

        //kiểm tra điều kiên file đã được đặt chưa
        if(isset($_FILES["file"]["name"])) {
            //lấy đường dẫn vào lưu data vào mảng
            $path = $_FILES["file"]["tmp_name"];
            $data = \PhpOffice\PhpSpreadsheet\IOFactory::load($path)->getActiveSheet()->toArray();
            
            //unset dòng đầu tiên tại vì nó không mang dữ liệu
            unset($data[0]);

            //duyệt mảng data rồi lưu dữ liệu và data_batch
            foreach($data as $row) {
                array_push($data_batch, array(
                    'id_sv'     => $row[1],
                    'id_mon'    => $id_mon,
                    'dk'        => true
                ));
                
            }
            $this->sv_mon_model->insert_multi($data_batch);
            
            //TODO: load view hoặc redirect tùy
            //$this->load->view('excel_view/data_check');
        }
            
        
    }

}
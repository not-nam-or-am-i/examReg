<!-- TODO: ĐỔI ID SANG STRING? -->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUD_Subjects_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->model('mon_model');
        $this->load->model('sv_mon_model');
    }

    //load trang mặc định
	public function index()
	{   
        $data['subjects'] = $this->mon_model->get_all_subjects();
		$this->load->view('admin/admin_CRUD_subject', $data);
	}

    //tạo một môn học
	public function create() {
        //kiểm tra dữ liệu điền vào có trống không
        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('ten_mon', 'Tên môn', 'required');
 
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/admin_create_subject');
            $this->session->set_flashdata('error', "Unexpected error?");
        } else {
            $data = array(
                'id'        => $this->input->post('id'),
                'ten_mon'   => $this->input->post('ten_mon'),
            );
            $this->mon_model->insert($data);
            $this->session->set_flashdata('success', "Thêm môn học thành công"); 
            redirect('admin/subject');
        }
	}
    
    //sửa thông tin môn học
	public function update($id) {
        $data['subject'] = $this->mon_model->get_by_id($id);
        
        //kiểm tra dữ liệu điền vào có trống không
        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('ten_mon', 'Tên môn', 'required');
 
        if ($this->form_validation->run() === FALSE) {
            $data['id'] = $id;
            $this->load->view('admin/admin_update_subject', $data);
            $this->session->set_flashdata('error', "Unexpected error?");
        } else {
            $update_data = array(
                'id'        => $this->input->post('id'),
                'ten_mon'   => $this->input->post('ten_mon'),
            );
            $this->mon_model->update($id, $update_data);

            $this->session->set_flashdata('success', "Sửa thông tin môn học thành công"); 
            redirect('admin/subject');
        }
	}

	public function delete($id) {
        $data['student'] = $this->mon_model->get_by_id($id);
        $this->mon_model->delete($id);
        if ($this->mon_model->delete($id) === FALSE) {
            $this->session->set_flashdata('error', "Unexpected error?");
        } else {
            $this->session->set_flashdata('success', "Xoá sinh viên thành công"); 
            redirect('admin/subject');
        }
    }
    
    public function import_index($id_mon) {
        $data['id_mon'] = $id_mon;
        $this->load->view('admin/import/admin_import_subject_list', $data);
    }

    //lưu thông tin excel vào csdl
    public function import_excel($id_mon) {
        //$this->load->view('admin/import/admin_import_subject_list');
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
            $this->sv_mon_model->insert_multiple($data_batch);
            
            //TODO: load view hoặc redirect tùy
            //$this->load->view('excel_view/data_check');
        }
    }
    
}
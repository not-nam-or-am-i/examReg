<!-- TODO: ĐỔI ID SANG STRING? -->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUD_Subjects_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->model('mon_model');
        $this->load->model('sv_mon_model');
        // check login admin:
        if (!$this->session->userdata('logged_in') || !$this->session->userdata('is_admin')){
            redirect('login');
        }
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

    // public function delete_multiple() {
    //     $data['student'] = $this->mon_model->get_by_id($id);
    //     $selectedSubjects = $this->input->post('subjects');

    //     //check xem có phòng nào được chọn không
    //     if (empty($selectedStudents)) {
    //         redirect('admin/subject');
    //         $this->session->set_flashdata('error', "Vui lòng chọn ít nhất một môn"); 
    //     } else {
    //         foreach ($selectedSubjects as $subject) {
    //             $this->mon_model->delete($subject->id);
    //         }
    //         $this->session->set_flashdata('success', "Đăng kí thành công"); 
    //         redirect('student/subject-details/'.$id_mon.'/'.$id_ca);
    //     }   
    // }
    
    public function import_index_eligible($id_mon) {
        $data['id_mon'] = $id_mon;
        $this->load->view('admin/import/admin_import_eligibilities', $data);
    }

    public function import_excel_eligible($id_mon) {
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
            $affectedRow = $this->sv_mon_model->insert_multiple($data_batch);
            
            if ($affectedRow == 0) {
                $this->session->set_flashdata('error', "Unexpected, oops");
            }
            else {
                $this->session->set_flashdata('success', "Thêm danh sách sinh viên đủ điều kiện dự thi môn thành công"); 
                redirect('admin/subject');
            }
        }
    }

    public function import_index_ineligible($id_mon) {
        $data['id_mon'] = $id_mon;
        $this->load->view('admin/import/admin_import_ineligible', $data);
    }

    public function import_excel_ineligible($id_mon) {
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
                    'dk'        => false
                ));
                
            }
            $affectedRow = $this->sv_mon_model->update_multiple($data_batch, $id_mon);
            
            if ($affectedRow == 0) {
                $this->session->set_flashdata('error', "Unexpected, oops");
            }
            else {
                $this->session->set_flashdata('success', "Thêm danh sách sinh viên không đủ điều kiện dự thi thành công"); 
                redirect('admin/subject');
            }
        }
    }
}
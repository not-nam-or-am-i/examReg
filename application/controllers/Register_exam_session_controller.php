<?php
//sinh viên đăng ký ca thi
class Register_exam_session_controller extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->model('mon_model');
        $this->load->model('phong_model');
        $this->load->model('sv_mon_model');
        $this->load->model('sv_phong_ca_model');
        $this->load->model('phong_ca_model');
        $this->load->model('ca_model');
        // check login sv:
        if (!$this->session->userdata('logged_in') || $this->session->userdata('is_admin')){
            redirect('login');
        }
    }
    //load trang mặc định
	public function index()
	{   
        //TODO: Làm sao biết ID kỳ thi để truyền vào get_ca_mon?
        //$data['records'] = $this->phong_ca_model->get_ca_mon(1);
        $data['mon'] = $this->sv_mon_model->get_mon($this->session->userdata('user_id'));
        //$data['ca'] = $this->ca_model->get_ca_by_mon($mon);
        $this->load->view('student/student_register_exam_session', $data);
    }
    
    //lấy các môn mà sv học
    public function get_mon() {
        //data mon gồm có: id môn, tên môn
        $id_sv = $this->session->userdata('user_id');
        $data['mon'] = $this->sv_mon_model->get_mon($id_sv);
        //TODO: thêm load view
    }
    //lấy các ca thi của môn
    public function get_ca($id_mon) {
        //data ca gồm có: id ca, giờ bắt đầu, giờ kết thúc
        $data['mon']      = $this->mon_model->get_by_id($id_mon);
        $data['ca']       = $this->ca_model->get_ca_by_mon($id_mon);
        //TODO: get phòng + ca cùng lúc = id môn
        $this->load->view('student/student_view_subject_ca', $data);
    }
    //lấy các phòng thi của ca thi
    public function get_phong($id_mon, $id_ca) {
        //data phòng gồm có: tên phòng, số chỗ
        $data['mon']            = $this->mon_model->get_by_id($id_mon);
        $data['ca']             = $this->ca_model->get_by_id($id_ca);
        $data['phong']          = $this->phong_ca_model->get_phong_by_ca($id_ca);
        //$data['count']          = $this->sv_phong_ca_model->reg_count($id_ca, $id_phong);
        
        //TODO: thêm load view
        $this->load->view('student/student_view_subject_ca_room', $data);
    }
    //sinh viên đăng ký phòng thi trong ca thi
    public function register($id_mon, $id_ca) {
        $data['ca']             = $this->ca_model->get_by_id($id_ca);
        $data['phong']          = $this->phong_ca_model->get_phong_by_ca($id_ca);
        $id_sv = $this->session->userdata('user_id');
        $selectedRooms = $this->input->post('room');
        //check xem có phòng nào được chọn không
        if (empty($selectedRooms)) {
            redirect('student/subject-details/'.$id_mon.'/'.$id_ca);
            $this->session->set_flashdata('error', "Vui lòng chọn ít nhất một phòng"); 
        } else {
            foreach ($selectedRooms as $room) {
                //đăng ký <=> insert vào bảng sv_phong_ca
                $reg_data = array (
                    'id_sv'         => $id_sv,
                    'id_phong'      => $room,
                    'id_ca'         => $id_ca
                );
                $this->sv_phong_ca_model->insert($reg_data);
            }
    
            //TODO: kiểm tra điều kiện ca thi không bị trùng bởi lịch đã đăng kí
            //TODO: viết query check xem primary_key (id_sv+id_ca) có bị trùng không
    
            //TODO: kiểm tra điều kiện phòng còn chỗ trống
            
            //TODO: thêm load view
            $this->session->set_flashdata('success', "Đăng kí thành công"); 
            redirect('student/subject-details/'.$id_mon.'/'.$id_ca);
        }   
    }
}
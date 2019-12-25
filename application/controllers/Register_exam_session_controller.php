<?php
//sinh viên đăng ký ca thi
//NOTE: chưa rõ cách lấy id của sinh viên kiểu gì nên viết tạm là tham số $id_sv vào hàm

class Register_exam_session_controller extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->model('mon_model');
        $this->load->model('sv_mon_model');
        $this->load->model('sv_phong_ca_model');
        $this->load->model('phong_ca_model');
        $this->load->model('ca_model');
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
	public function index()
	{   
        //TODO: hừm query kiểu gì nhỉ... cần lấy ten_mon, bat_dau, ket_thuc, phong
        $data['records'] = $this->phong_ca_model->get_ca_mon_phong(1);
        $this->load->view('student/student_register_exam_session', $data);
	}

    //lấy các môn mà sv học
    public function get_mon($id_sv) {
        //data mon gồm có: id môn, tên môn
        $data['mon'] = $this->sv_mon_model->get_mon($id_sv);

        //TODO: thêm load view
    }

    //lấy các ca thi của môn
    public function get_ca($id_mon) {
        //data ca gồm có: id ca, giờ bắt đầu, giờ kết thúc
        $data['ca'] = $this->ca_model->get_ca_by_mon($id_mon);

        //TODO: thêm load view
    }

    //lấy các phòng thi của ca thi
    public function get_phong($id_ca) {
        //data phòng gồm có: tên phòng, số chỗ
        $data['phong'] = $this->phong_ca_model->get_phong_by_ca($id_ca);

        //TODO: thêm load view
    }

    //sinh viên đăng ký phòng thi trong ca thi
    public function register($id_sv, $id_phong, $id_ca) {
        //số lượng sinh viên đã đăng ký thi tại phòng 'id_phong' (để kiểm tra xem phòng đã đầy chưa)
        $data['count'] = $this->sv_phong_ca_model->reg_count($id_ca, $id_phong);

        //đăng ký <=> insert vào bảng sv_phong_ca
        $reg_data = array (
            'id_sv'         => $id_sv,
            'id_phong'      => $id_phong,
            'id_ca'         => $id_ca
        );
        $this->sv_phong_ca_model->insert($reg_data);


        //TODO: kiểm tra điều kiện phòng còn chỗ trống
        //TODO: kiểm tra điều kiện ca thi không bị trùng bởi lịch đã đăng kí
        //TODO: thêm load view
    }
}
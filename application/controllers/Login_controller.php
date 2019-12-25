<?php
//người dùng login
// NOTE:
// đã tạo route login và logout
// thêm vào đầu các hàm trong controller câu kiểm tra đăng nhập sv/admin
// controller của admin thì check login admin, controller của sv thì check login sv
// check login admin:
// if(!$this->session->userdata('logged_in') || !$this->session->userdata('is_admin')){
//     redirect('login');
// }
// check login sv:
// if(!$this->session->userdata('logged_in') || $this->session->userdata('is_admin')){
//     redirect('login');
// }
class Login_controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->model('account_model');
    }

    // Login
    public function login(){

        $this->form_validation->set_rules('id', 'Id', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() === FALSE){
            //load view
            $this->load->view('login_view/login');
        } else {
            $id = $this->input->post('id');
            //encrypt password
            $password = $this->input->post('password');

            //Login
            $sv_data = $this->account_model->login($id, $password);

            //kiểm tra xem có tài khoản không
            if($sv_data){
                //TODO: login success msg

                // Create session
                $user_data = array(
                    'user_id'       => $id,
                    'ten'           => $sv_data->ten,
                    'khoa_hoc'      => $sv_data->khoa_hoc,
                    'is_admin'      => $sv_data->is_admin,
                    'logged_in'     => true
                );

                $this->session->set_userdata($user_data);

                //TODO: redirect về trang của admin hoặc sv
                if($this->session->userdata('is_admin')) {
                    //trang admin
                } else {
                    //trang sv
                }
            } else {
                //TODO: login fail msg
                redirect('login');
            }		
        }
    }

    //logout
    public function logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('ten');
        $this->session->unset_userdata('khoa_hoc');
        $this->session->unset_userdata('id_admin');
        $this->session->unset_userdata('user_id');
        //TODO: logout thành công msg (nếu muốn)
        redirect('login');
    }
}
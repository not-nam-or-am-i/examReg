<?php
    class Sv_phong_ca_model extends BASE_model {
        protected $table = 'sv_phong_ca';

        public function __construct() {
            parent::__construct();
        }

        //đếm số sinh viên đã đăng ký thi trong phòng thi
        public function reg_count($id_ca, $id_phong) {
            //điều kiện query
            $condition = array('id_ca' => $id_ca, 'id_phong' => $id_phong);

            $this->db->select('*');
            $this->db->where($condition);
            return $this->db->get($this->table)->num_rows();
        }

        //lấy danh sách sinh viên trong phòng thi
        public function get_students_list($id_ca, $id_phong) {
            //điều kiện query where
            $condition = array('id_ca' => $id_ca, 'id_phong' => $id_phong);

            //query
            $this->db->select('`account`.`id`, `account`.`ten`, `account`.`khoa_hoc`');
            $this->db->from('sv_phong_ca');
            $this->db->join('account', 'id_sv = `account`.`id`', 'left');
            $this->db->where($condition);
            return $this->db->get()->result();
        }
    }
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

        //lấy kết quả đăng ký thi của sinh viên
        public function get_reg_result($id_sv) {
            //query trực tiếp
            $query = $this->db->query('SELECT id_mon, ten_mon, mon_ca.id_ca, bat_dau, ket_thuc, sv_phong_ca_phong.ten_phong
            FROM (SELECT `mon`.`id` as id_mon,`mon`.`ten_mon`, `ca_thi`.`id` as id_ca, `ca_thi`.`bat_dau`, `ca_thi`.`ket_thuc`
                FROM `ca_thi`
                JOIN `mon` ON id_mon=`mon`.`id`) as mon_ca
            JOIN (SELECT id_sv, id_ca, id_phong, `phong`.`ten_phong`
                FROM sv_phong_ca
                JOIN phong ON id_phong=phong.id) as sv_phong_ca_phong
            ON mon_ca.id_ca = sv_phong_ca_phong.id_ca
            WHERE sv_phong_ca_phong.id_sv = ' . $id_sv);

            return $query->result();
        }
    }
<?php
    class Phong_ca_model extends BASE_model {
        protected $table = 'phong_ca';

        public function __construct() {
            parent::__construct();
        }

        //lấy các phòng thi trong ca thi
        public function get_phong_by_ca($id_ca) {
            //điều kiện query where
            $condition = array('id_ca' => $id_ca);

            //query
            $this->db->select('`phong`.`ten_phong`, `phong`.`so_cho`');
            $this->db->from('phong_ca');
            $this->db->join('phong', 'id_phong=`phong`.`id`', 'left');
            $this->db->where($condition);
            return $this->db->get()->result();
        }
    }
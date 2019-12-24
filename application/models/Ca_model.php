<?php
    class Ca_model extends BASE_model {
        protected $table = 'ca_thi';

        public function __construct() {
            parent::__construct();
        }

        //lấy các ca thi của một môn
        public function get_ca_by_mon($id_mon) {
            //điều kiện query where
            $condition = array('id_mon' => $id_mon);

            //query
            $this->db->select('`id`, `bat_dau`, `ket_thuc`');
            $this->db->from('ca_thi');
            $this->db->where($condition);
            return $this->db->get()->result();
        }
    }
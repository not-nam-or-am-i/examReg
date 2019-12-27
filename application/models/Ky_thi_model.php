<?php
    class Ky_thi_model extends BASE_model {
        protected $table = 'ky_thi';

        public function __construct() {
            parent::__construct();
        }

        public function get_all_periods() {
            $this->db->select('*');
            return $this->db->get($this->table)->result();
        }

        public function get_ky_now() {
            //query trực tiếp
            $query = $this->db->query('SELECT * FROM `ky_thi` WHERE bat_dau < LOCALTIME AND ket_thuc>LOCALTIME ' );
            
            return $query->result();
        }
    }
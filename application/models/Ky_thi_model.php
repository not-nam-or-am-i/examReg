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

    }
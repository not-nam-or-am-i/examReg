<?php
    class Sv_mon_model extends BASE_model {
        protected $table = 'sv_mon';

        public function __construct() {
            parent::__construct();
        }

        public function insert_multiple($data) {
            return $this->db->insert_batch($this->table, $data);
        }
    }
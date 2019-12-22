<?php
    class Account_model extends BASE_model {
        protected $table = 'account';

        public function __construct() {
            parent::__construct();
        }

        public function get_all_students() {
            $this->db->select('*');
            $this->db->where('is_admin', false);
            return $this->db->get($this->table)->result();
        }

        public function insert_multiple($data) {
            return $this->db->insert_batch($this->table, $data);
        }
    }
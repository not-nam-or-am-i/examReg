<?php
    class Mon_model extends BASE_model {
        protected $table = 'mon';

        public function __construct() {
            parent::__construct();
        }

        public function get_all_subjects() {
            $this->db->select('*');
            return $this->db->get($this->table)->result();
        }
    }
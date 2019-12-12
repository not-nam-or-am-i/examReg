<?php  
    //model gốc chứa các function cơ bản có thể dùng chung
    class BASE_model extends CI_Model {
        protected $table = '';

        public function __construct() {
            parent::__construct();
        }

        public function get_all() {
            return $this->db->get($this->table)->result();
        }

        public function get_by_id($id) {
            $this->db->select('*');
            $this->db->where('id', $id);
            return $this->db->get($this->table)->result();
        }

        public function delete($id) {
            $this->db->where('id', $id);
            $query = $this->db->delete($this->table);
            return true;
        }
    }
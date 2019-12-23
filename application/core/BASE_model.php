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
            return $this->db->get($this->table)->row();
        }

        public function delete($id) {
            $this->db->where('id', $id);
            $query = $this->db->delete($this->table);
            return true;
        }

        public function insert($data) {
            return $this->db->insert($this->table, $data);
        }

        public function update($id, $data) {
            $this->db->where('id', $id);
            return $this->db->update($this->table, $data);

            // TODO: TÔI CẦN 1 CÁCH CHECK XEM QUERY CÓ THAY ĐỔI DATABASE KHÔNG
            // return $this->db->affected_rows();
        }
    }
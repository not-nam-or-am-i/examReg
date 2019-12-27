<?php
    class Sv_mon_model extends BASE_model {
        protected $table = 'sv_mon';

        public function __construct() {
            parent::__construct();
        }

        public function insert_multiple($data) {
            return $this->db->insert_batch($this->table, $data);
        }

        public function update_multiple($data, $id_mon) {
            $condition = array('id_mon' => $id_mon);

            $this->db->where($condition);
            return $this->db->update_batch($this->table, $data, 'id_sv');
        }

        //lấy môn sinh viên học bằng id sinh viên
        public function get_mon($id_sv) {
            //điều kiện query where
            $condition = array('id_sv' => $id_sv, 'dk' => true);

            //query
            $this->db->select('`mon`.`id`, `mon`.`ten_mon`');
            $this->db->from('sv_mon');
            $this->db->join('mon', 'id_mon = `mon`.`id`', 'left');
            $this->db->where($condition);
            return $this->db->get()->result();
        }
    }
<?php
    class Ca_model extends BASE_model {
        protected $table = 'ca_thi';

        public function __construct() {
            parent::__construct();
        }

        //lấy các ca thi của một môn
        public function get_ca_by_mon($id_mon) {
            //query trực tiếp
            $query = $this->db->query('SELECT `ky_thi`.`id` as id_ky_thi, `ky_thi`.`hoc_ky` as hoc_ky, `ky_thi`.`nam` as nam, `ca_thi`.`id`, `ca_thi`.`id_mon`, `ca_thi`.`bat_dau`, `ca_thi`.`ket_thuc`
            FROM `ca_thi` 
            JOIN `ky_thi` ON `ca_thi`.`id_ky_thi` = `ky_thi`.`id`
            WHERE id_mon = ' .$id_mon. ' AND `ky_thi`.bat_dau < LOCALTIME AND `ky_thi`.ket_thuc>LOCALTIME' );
            
            return $query->result();
        }

        //lấy các ca thi của kỳ thi
        public function get_ca_by_ky($id_ky) {
            //query trực tiếp
            $query = $this->db->query('SELECT * FROM `ca_thi` WHERE `ca_thi`.id_ky_thi =' . $id_ky . ' ORDER BY `ca_thi`.`id` asc ' );
            
            return $query->result();
        }
    }
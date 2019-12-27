<?php
    class Phong_ca_model extends BASE_model {
        protected $table = 'phong_ca';

        public function __construct() {
            parent::__construct();
        }

        //lấy các phòng thi trong ca thi
        public function get_phong_by_ca($id_ca) {
            //query trực tiếp
            $query = $this->db->query('SELECT * FROM `phong` WHERE `phong`.`id_ca` = ' . $id_ca);
            return $query->result();
        }

        //lấy ca - môn
        public function get_ca_mon($id_ky_thi) {
            //query trực tiếp
            $query = $this->db->query('SELECT `ca_thi`.id as id_ca, `ca_thi`.`bat_dau`, `ca_thi`.`ket_thuc`, `mon`.`id` as id_mon, `mon`.`ten_mon`
            FROM `ca_thi`
            JOIN `mon` ON `ca_thi`.`id_mon` = `mon`.`id`
            WHERE `ca_thi`.`id_ky_thi` = '. $id_ky_thi .'
            ORDER BY id_ca ASC' );
            return $query->result();
        }
    }
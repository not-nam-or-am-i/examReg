<?php
    class Phong_ca_model extends BASE_model {
        protected $table = 'phong_ca';

        public function __construct() {
            parent::__construct();
        }

        //lấy các phòng thi trong ca thi
        public function get_phong_by_ca($id_ca) {
            //điều kiện query where
            $condition = array('id_ca' => $id_ca);

            //query
            $this->db->select('`phong`.`ten_phong`, `phong`.`so_cho`');
            $this->db->from('phong_ca');
            $this->db->join('phong', 'id_phong=`phong`.`id`', 'left');
            $this->db->where($condition);
            return $this->db->get()->result();
        }

        //lấy ca - môn - phòng
        public function get_ca_mon_phong($id_ky_thi) {
            //query trực tiếp
            $query = $this->db->query('SELECT ca_mon.id_ca, ca_mon.bat_dau, ca_mon.ket_thuc, ca_mon.id_mon, ca_mon.ten_mon, id_phong, `phong`.`ten_phong`, `phong`.`so_cho`
            FROM `phong_ca`
            JOIN (SELECT `ca_thi`.`id` as id_ca, id_ky_thi, id_mon, `mon`.`ten_mon`, bat_dau, ket_thuc
                        FROM `ca_thi` 
                        JOIN `mon` ON id_mon=`mon`.`id`
                         WHERE id_ky_thi = '. $id_ky_thi . ') as ca_mon
            ON `phong_ca`.id_ca = ca_mon.id_ca
            JOIN `phong` ON id_phong=`phong`.`id`
            WHERE 1');
            return $query->result();
        }
    }
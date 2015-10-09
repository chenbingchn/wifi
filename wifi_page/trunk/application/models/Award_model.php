<?php
    class Award_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }
        public function get_award()
        {
            $sql = 'SELECT award_type_id, award_type_en, award_type_zh, group_concat(`mobile`) as mobile FROM award GROUP BY award_type';
            $query = $this->db->query($sql);
            return $query->result_array();
        }

    }
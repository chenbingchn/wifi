<?php
    class Girls extends CI_Model{
        public function __construct(){

            parent::__construct();
            //从新设置一个新的数据库连接，并且命名为db2
            $this->db2 = $this->load->database('additional', TRUE);

        }

        public function image(){
            $this->db2->order_by('id', 'DESC')->limit(10);
            $imags = $this->db2->get('image');
            $pic = $imags->result();
            return $pic;
        }
    }
?>
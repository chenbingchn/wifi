<?php

class Discovery extends CI_Model{

    public function __construct(){

        parent::__construct();
        $this->load->database();

    }

    public function mainclass(){
        $class = $this->db->get('main_class');
        $mainclass = $class->result();
        return $mainclass;
    }

    public function categorys(){
        $cat = $this->db->get('categorys');
        $categorys = $cat->result();
        return $categorys;
    }

    public function banner(){
        $this->db->where('type',2)->where('state',1);
        $ban = $this->db->get('banner');
        $banner = $ban->result();
        return $banner;
    }
    public function find() {
        $query = $this->db->get('find_content');
        return $query->result();
    }
}
?>
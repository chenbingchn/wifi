<?php

class Integralcategory extends CI_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    public function getCatecory(){
        $cat = array();
        $query = $this->db->get('integral_category');
        foreach($query->result() as $row){
            $cat[$row->id] = $row->cate_name;
        }
        return $cat;
    } 

}

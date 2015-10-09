<?php

class Integral extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getCatNumByCatId($cat_id) {
        $sql = "select count(*) as num from integral where cat_id = ?  and start_time < ? and  end_time > ? group by cat_id";
        $num = $this->db->query($sql,array($cat_id,date('Y-m-d',time()),date('Y-m-d',time())))->row();
        if($num){
            return $num->num;
        }
    }

    public function getIntegralByCatId($cat_id) {
        $sql = "select * from integral where cat_id = ? and start_time < ? and end_time > ? ";
        $Integrals = $this->db->query($sql,array($cat_id,date('Y-m-d',time()),date('Y-m-d',time())))->result();
        $lang = isset($_GET['language'])?$_GET['language']:"";;
        foreach ($Integrals as $Integral) {
            if ($lang == 'yn' || $lang == 'in_ID' || $lang == 'indonesian') {
                $Integral->Title = $Integral->Titleyn;
                $Integral->Content = $Integral->Contentyn;
                $Integral->use = $Integral->useyn;
                $Integral->tips = $Integral->tipsyn;
            } 
        }
        return $Integrals;
    }

    public function isValidGoods($obj) {
        if (time() < strtotime($obj->start_time) || time() > strtotime($obj->end_time)) {
            return false;
        } elseif ($obj->total <= 0) {
            return false;
        } elseif ($obj->ration <= $obj->usage) {
            return false;
        }
        return true;
    }

    public function isSoldOut($obj) {
        return $obj->total <= 0 ? true : false;
    }

    public function getByPk($id) {
        $sql = "select * from integral where id = ? ";
        $Integral = $this->db->query($sql,array($id))->row();
        $lang = isset($_GET['language'])?$_GET['language']:"";
        if ($lang == 'yn' || $lang == 'in_ID' || $lang == 'indonesian') {
            $Integral->Title = $Integral->Titleyn;
            $Integral->Content = $Integral->Contentyn;
            $Integral->use = $Integral->useyn;
            $Integral->tips = $Integral->tipsyn;
        } 
        return $Integral;
    }

}

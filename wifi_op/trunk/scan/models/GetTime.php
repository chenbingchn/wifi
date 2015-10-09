<?php
namespace app\models;

use Yii;

class GetTime{
    public function start_time($start,$hits){
        if (empty($start)) {
            return null;
        }
        $start=strtotime($start);
        $hits=$hits*60;
        if($hits < 0){
            $start=$start-(-$hits);
        }else{
            $start=$start-$hits;
        }
        return date('Y-m-d',$start);
    }
    public function end_time($end,$hits){
        if (empty($end)) {
            return null;
        }
        $end=strtotime($end);
        $hits=$hits*60;
        if($hits < 0){
            $end=$end-(-$hits);
        }else{
            $end=$end-$hits;
        }
        return date('Y-m-d',$end);
    }
}
?>
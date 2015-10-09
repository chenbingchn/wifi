<?php
namespace app\models;

use Yii;
use yii\base\Model;

class Wifitype extends Model{

    public $bssid;
    public $ssid;
    public $type;
    public $source;
    public $start_date;
    public $end_date;

    public function rules(){
        return [
            [['bssid','ssid'],'string','max' => 225],
            [['start_date','end_date'], 'safe'],
            [['type','source'],'integer'],
        ];
    }
    public function attributeLabels(){
        return [
            'bssid' => '物理地址',
            'ssid' => 'WiFi名称',
            'type' => 'WiFi类型',
            'source' => 'WiFi来源',
            'start_date' => '起始时间',
            'end_date' => '结束时间',
        ];
    }
}
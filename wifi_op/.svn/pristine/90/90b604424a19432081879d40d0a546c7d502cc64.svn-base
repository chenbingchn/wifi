<?php
namespace app\models;

use yii\base\Model;
use Yii;

class DataForm extends Model{

    public $user_id;
    public $start;
    public $end;
    public $type;
    public $hits;
    public $flag;
    public $ssid;
    public $shop_type;
    public $city;
    public $address;

    public function rules()
    {
        return [
            [['user_id'], 'string', 'min' => 2, 'max' => 255],

            ['start', 'string', 'min' => 2, 'max' => 255],

            ['end', 'string', 'min' => 2, 'max' => 255],

            ['type', 'integer'],
            
            ['flag', 'integer'],
            
            ['ssid', 'string', 'min' => 2, 'max' => 255],
            
            ['shop_type', 'string', 'min' => 2, 'max' => 255],
            
            ['city', 'string', 'min' => 2, 'max' => 255],
            
            ['address', 'string', 'min' => 2, 'max' => 255],
        ];
    }


    public function attributeLabels()
    {
        return [
            'user_id' => '用户名',
            'start' => '开始时间',
            'end' => '结束时间',
            'type' => 'wifi类型',
            'flag' =>'审核状态',
            'ssid'=>'wifi名称',
            'shop_type'=>'商铺类型',
            'city'=>'城市',
            'address'=>'地理位置'
        ];
    }

}
?>
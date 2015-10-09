<?php
namespace app\models;

use yii\base\Model;
use Yii;

class DataForm extends Model{


    public $start;
    public $end;

    public function rules()
    {
        return [

            ['start', 'string', 'min' => 2, 'max' => 255],

            ['end', 'string', 'min' => 2, 'max' => 255],

        ];
    }


    public function attributeLabels()
    {
        return [
            'start' => '开始时间',
            'end' => '结束时间',
        ];
    }

}
?>
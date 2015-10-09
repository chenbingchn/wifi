<?php
namespace app\models;

use Yii;

class Imeiscorelimit extends \yii\db\ActiveRecord{
    public static function tableName()
    {
        return '{{%imei_score_limit}}';
    }
}
?>
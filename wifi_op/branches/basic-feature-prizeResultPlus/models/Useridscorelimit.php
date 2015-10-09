<?php
namespace app\models;

use Yii;

class Useridscorelimit extends \yii\db\ActiveRecord{
    public static function tableName()
    {
        return '{{%userid_score_limit}}';
    }
}
?>
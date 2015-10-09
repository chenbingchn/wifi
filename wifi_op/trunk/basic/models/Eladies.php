<?php
namespace app\models;

use Yii;

class Eladies extends \yii\db\ActiveRecord{
    public static function tableName()
    {
        return '{{%image}}';
    }
    public static function getDb()
    {
        return Yii::$app->get('eladiesdb');
    }
}
?>
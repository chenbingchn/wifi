<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%score_config}}".
 *
 * @property string $id
 * @property string $type_name
 * @property integer $score
 */
class Scoreconfig extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%score_config}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type_name'], 'required'],
            [['id', 'score'], 'integer'],
            [['type_name'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_name' => '获取积分的方式',
            'score' => '每次获得积分配额',
        ];
    }

    public function getLink(){
        return $this->hasOne(Scorelimitconfig::className(),['id' => 'id']);
    }
}

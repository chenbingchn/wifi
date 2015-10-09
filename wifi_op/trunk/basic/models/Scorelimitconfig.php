<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%score_limit_config}}".
 *
 * @property string $id
 * @property string $type_name
 * @property integer $limits
 */
class Scorelimitconfig extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%score_limit_config}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type_name'], 'required'],
            [['id', 'limits'], 'integer'],
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
            'limits' => '每日最高获取积分上限',
        ];
    }
}

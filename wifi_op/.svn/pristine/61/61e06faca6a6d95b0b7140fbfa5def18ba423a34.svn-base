<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "award".
 *
 * @property integer $id
 * @property string $mobile
 * @property integer $award_type
 * @property string $award_type_en
 * @property string $award_type_id
 * @property string $award_type_zh
 */
class Award extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'award';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mobile', 'award_type', 'award_type_en', 'award_type_id', 'award_type_zh'], 'required'],
            [['award_type'], 'integer'],
            [['mobile'], 'string', 'max' => 11],
            [['award_type_en', 'award_type_id', 'award_type_zh'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mobile' => '手机号码',
            'award_type' => '中奖类型代码',
            'award_type_en' => '中奖类型（英文）',
            'award_type_id' => '中奖类型（印尼语）',
            'award_type_zh' => '中奖类型（中文）',
        ];
    }
}

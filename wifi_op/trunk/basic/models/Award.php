<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "award".
 *
 * @property integer $id
 * @property string $mobile
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
            [['mobile', 'award_type_en', 'award_type_id', 'award_type_zh'], 'required'],
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
            'mobile' => 'Mobile',
            'award_type_en' => 'Award Type En',
            'award_type_id' => 'Award Type ID',
            'award_type_zh' => 'Award Type Zh',
        ];
    }
}
<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "award_type".
 *
 * @property integer $award_type
 * @property string $award_type_en
 * @property string $award_type_id
 * @property string $award_type_zh
 */
class AwardType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'award_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['award_type', 'award_type_en', 'award_type_id', 'award_type_zh'], 'required'],
            [['award_type'], 'integer'],
            [['award_type_en', 'award_type_id', 'award_type_zh'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'award_type' => 'Award Type',
            'award_type_en' => 'Award Type En',
            'award_type_id' => 'Award Type ID',
            'award_type_zh' => 'Award Type Zh',
        ];
    }
}

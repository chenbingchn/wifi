<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%notify}}".
 *
 * @property string $id
 * @property string $imei
 * @property string $title
 * @property integer $type
 * @property string $brief_desc
 * @property string $full_desc
 * @property string $activity_url
 * @property string $created_at
 * @property string $title_yn
 * @property string $brief_desc_yn
 */
class Notify extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%notify}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'imei', 'title', 'type'], 'required'],
            [['id', 'type'], 'integer'],
            [['created_at'], 'string'],
            [['imei'], 'string', 'max' => 15],
            [['title', 'title_yn'], 'string', 'max' => 100],
            [['brief_desc', 'brief_desc_yn'], 'string', 'max' => 480],
            [['full_desc'], 'string', 'max' => 1024],
            [['activity_url'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'imei' => Yii::t('app', 'Imei'),
            'title' => Yii::t('app', 'Title'),
            'type' => Yii::t('app', 'Type'),
            'brief_desc' => Yii::t('app', 'Brief Desc'),
            'full_desc' => Yii::t('app', 'Full Desc'),
            'activity_url' => Yii::t('app', 'Activity Url'),
            'created_at' => Yii::t('app', 'Created At'),
            'title_yn' => Yii::t('app', 'Title Yn'),
            'brief_desc_yn' => Yii::t('app', 'Brief Desc Yn'),
        ];
    }
}

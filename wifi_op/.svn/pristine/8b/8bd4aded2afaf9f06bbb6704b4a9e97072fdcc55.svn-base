<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%activity}}".
 *
 * @property string $id
 * @property string $activity_url
 * @property string $text
 * @property integer $flag
 * @property string $created_at
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%activity}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','activity_url','flag'], 'required'],
            [['id', 'flag'], 'integer'],
            [['created_at'], 'safe'],
            [['activity_url'], 'url'],
            [['text'], 'string', 'max' => 48]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'activity_url' => 'Activity Url',
            'flag' => 'Flag',
            'created_at' => 'Created At',
        ];
    }
}

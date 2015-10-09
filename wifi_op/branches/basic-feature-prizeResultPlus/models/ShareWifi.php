<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%share_wifi}}".
 *
 * @property string $id
 * @property string $title
 * @property string $titlezh
 * @property string $titleyn
 * @property string $max_value
 * @property string $min_value
 * @property string $pic_url
 */
class ShareWifi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%share_wifi}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'title', 'titlezh', 'titleyn', 'max_value', 'min_value', 'pic_url'], 'required'],
            [['id', 'max_value', 'min_value'], 'integer'],
            [['titlezh', 'titleyn'], 'string'],
            [['title'], 'string', 'max' => 50],
            [['pic_url'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'titlezh' => 'Titlezh',
            'titleyn' => 'Titleyn',
            'max_value' => 'Max Value',
            'min_value' => 'Min Value',
            'pic_url' => 'Pic Url',
        ];
    }
}

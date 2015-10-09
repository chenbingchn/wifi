<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%banner}}".
 *
 * @property integer $id
 * @property integer $type
 * @property string $title
 * @property string $subtitle
 * @property integer $state
 * @property string $pic_url
 * @property string $url
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%banner}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'state', 'pic_url', 'url'], 'required'],
            [['type', 'state'], 'integer'],
            [['title'], 'string', 'max' => 20],
            [['subtitle'], 'string', 'max' => 200],
            [[ 'url'],'url'],
            [['pic_url'], 'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'title' => 'Title',
            'subtitle' => 'Subtitle',
            'state' => 'State',
            'pic_url' => 'Pic Url',
            'url' => 'Url',
        ];
    }
}

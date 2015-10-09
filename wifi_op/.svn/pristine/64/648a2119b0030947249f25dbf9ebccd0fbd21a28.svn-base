<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%find_logo}}".
 *
 * @property integer $id
 * @property string $image
 * @property string $url
 */
class Push extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%splash}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image', 'url'], 'required'],
            [['image'], 'file', 'message'=>'内容不能为空'],
            [['url'], 'url', 'message'=>'URL必须包含http://']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'url' => 'Url',
            'html_url'=>'Html Url',
        ];
    }
}

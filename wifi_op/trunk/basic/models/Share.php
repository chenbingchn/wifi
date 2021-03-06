<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%share}}".
 *
 * @property integer $id
 * @property integer $type
 * @property string $color_value
 * @property string $icon
 * @property string $title
 * @property string $titlezh
 * @property string $titleyn
 * @property string $content
 * @property string $contentzh
 * @property string $contentyn
 * @property string $pic
 */
class Share extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%share}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','pic_url'], 'required'],
            [['id','max_value','min_value','state'], 'integer'],
            [['color_value', 'titlezh', 'titleyn','title'], 'string', 'max' => 80],
            [['icon'], 'file'],
            [['pic_url'], 'file'],
            [['id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'color_value' => 'Color Value',
            'type' => 'Type',
            'icon' => 'Icon',
            'state' => 'State',
            'title' => 'Title',
            'titlezh' => 'Titlezh',
            'titleyn' => 'Titleyn',
            'max_value' => 'Max Value',
            'min_value' => 'Min Value',
            'pic_url' => 'Pic Url',
        ];
    }
}

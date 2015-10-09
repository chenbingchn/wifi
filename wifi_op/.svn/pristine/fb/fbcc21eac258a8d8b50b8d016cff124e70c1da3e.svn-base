<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%operation}}".
 *
 * @property integer $id
 * @property integer $type
 * @property integer $value
 * @property string $title
 * @property string $titlezh
 * @property string $titleyn
 * @property string $images
 */
class Operation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%operation}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['type'], 'integer'],
            [['color_value','title','titlezh', 'titleyn'], 'string'],
            [['images'], 'file']
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
            'color_value' => 'Color value',
            'title' => 'Title',
            'titlezh' => 'Titlezh',
            'titleyn' => 'Titleyn',
            'images' => 'Images',
        ];
    }
}

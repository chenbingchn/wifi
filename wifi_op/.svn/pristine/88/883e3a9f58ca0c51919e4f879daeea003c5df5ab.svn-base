<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%categorys}}".
 *
 * @property integer $pid
 * @property string $title
 * @property string $url
 */
class Categorys extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%categorys}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid','mainclass', 'title', 'url'], 'required'],
            [['titlezh', 'titleyn'], 'required'],
            [['pid'], 'integer'],
            [['title'], 'string', 'max' => 20],
            [['url'], 'url'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mainclass'=>'Mainclass',
            'mainclasszh'=>'Mainclasszh',
            'mainclassyn'=>'Mainclassyn',
            'pid' => 'Pid',
            'title' => 'Title',
            'titleyn' => 'Titleyn',
            'titlezh' => 'Titlezh',
            'url' => 'Url',
        ];
    }
}

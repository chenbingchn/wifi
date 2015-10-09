<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%raiders}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $titlezh
 * @property string $titleyn
 * @property string $content
 * @property string $contentzh
 * @property string $contentyn
 */
class Raiders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%raiders}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'titlezh', 'titleyn', 'content', 'contentzh', 'contentyn'], 'required'],
            [['content', 'contentzh','contentyn'], 'string'],
            [['title'], 'string', 'max' => 20],
            [['titlezh', 'titleyn'], 'string', 'max' => 50],
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
            'content' => 'Content',
            'contentzh' => 'Contentzh',
            'contentyn' => 'Contentyn',
        ];
    }
}

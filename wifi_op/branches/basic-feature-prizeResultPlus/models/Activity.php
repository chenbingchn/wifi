<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%activity}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $namezh
 * @property string $nameyn
 * @property string $title
 * @property string $titlezh
 * @property string $titleyn
 * @property string $content
 * @property string $contentzh
 * @property string $contentyn
 */
class Activity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%message}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','name', 'namezh', 'nameyn', 'title', 'titlezh', 'titleyn', 'content', 'contentzh', 'contentyn','pic_url'], 'required'],
            [['content', 'contentzh', 'contentyn'], 'string'],
            [['name'], 'string', 'max' => 20],
            [['namezh', 'nameyn'], 'string', 'max' => 50],
            [['title'], 'string', 'max' => 100],
            [['titlezh', 'titleyn'], 'string', 'max' => 200],
            [['start_date', 'end_date'], 'safe'],
            [['pic_url'],'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'namezh' => 'Namezh',
            'nameyn' => 'Nameyn',
            'title' => 'Title',
            'titlezh' => 'Titlezh',
            'titleyn' => 'Titleyn',
            'content' => 'Content',
            'contentzh' => 'Contentzh',
            'contentyn' => 'Contentyn',
            'start_time' => 'Start Date',
            'end_time' => 'End Date',
            'pic_url' => 'Pic Url',
        ];
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%article}}".
 *
 * @property integer $id
 * @property string $user_name
 * @property string $title
 * @property string $Content
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['integral','match','pattern'=>'/^[0-9]*$/','message'=>'必须为纯数字'],
            [['user_name', 'title', 'Content','integral'], 'required','message'=>'内容不能为空'],
            [['titlezh', 'titleyn', 'Contentzh','Contentyn'], 'required','message'=>'内容不能为空'],
            [['user_name', 'title'], 'string', 'max' => 20],
            [['Content'], 'string', 'max' => 100],
            [['minVersion'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_name' => 'User Name',
            'integral'=> 'Integral',
            'title' => 'Title',
            'titlezh' => 'Titlezh',
            'titleyn' => 'Titleyn',
            'Content' => 'Content',
            'Contentzh' => 'Contentzh',
            'Contentyn' => 'Contentyn',
            'minVersion'=>'最低版本号'
        ];
    }
}
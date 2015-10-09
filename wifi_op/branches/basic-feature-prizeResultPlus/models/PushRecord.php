<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "push_record".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $jump_page
 * @property integer $create_user
 * @property integer $create_time
 */
class PushRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'push_record';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jump_page', 'create_user', 'create_time'], 'integer'],
            [['title', 'content','url'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'content' => '内容',
            'jump_page' => '跳转页面',
            'create_user' => '创建者',
            'create_time' => '创建时间',
            'url'=>'链接地址（url）'
        ];
    }
}

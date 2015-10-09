<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%shared_wifi_page}}".
 *
 * @property integer $id
 * @property string $create_user
 * @property integer $type
 * @property string $header_EN
 * @property string $header_Ind
 * @property string $title_EN
 * @property string $title_Ind
 * @property string $content_EN
 * @property string $content_Ind
 * @property string $pic_url
 */
class Sharedwifipage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shared_wifi_page}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'create_user', 'type', 'header_EN', 'header_Ind', 'title_EN', 'title_Ind', 'content_EN', 'content_Ind', 'pic_url'], 'required'],
            [['id', 'type'], 'integer'],
            [['create_user'], 'string', 'max' => 30],
            [['header_EN', 'header_Ind'], 'string', 'max' => 50],
            [['title_EN', 'title_Ind'], 'string', 'max' => 50],
            [['content_EN', 'content_Ind'], 'string', 'max' => 100],
            [['pic_url'], 'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '序号'),
            'create_user' => Yii::t('app', '创建人名称'),
            'type' => Yii::t('app', 'WiFi状态'),
            'header_EN' => Yii::t('app', '位置2：标题英文'),
            'header_Ind' => Yii::t('app', '位置2：标题印尼文'),
            'title_EN' => Yii::t('app', '位置3：标题英文'),
            'title_Ind' => Yii::t('app', '位置3：标题印尼文'),
            'content_EN' => Yii::t('app', '位置1：内容英文'),
            'content_Ind' => Yii::t('app', '位置1：内容印尼文'),
            'pic_url' => Yii::t('app', '图标'),
        ];
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feed_back".
 *
 * @property integer $id
 * @property string $imei
 * @property string $content
 * @property string $contact
 * @property string $created_at
 */
class FeedBack extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feed_back';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['imei', 'content'], 'required'],
            [['created_at'], 'safe'],
            [['imei'], 'string', 'max' => 32],
            [['content'], 'string', 'max' => 256],
            [['contact'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'imei' => 'Imei',
            'content' => '内容',
            'contact' => '联系方式',
            'created_at' => '创建时间',
        ];
    }
}

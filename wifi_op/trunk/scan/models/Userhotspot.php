<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user_hotspot}}".
 *
 * @property string $user_id
 * @property string $bssid
 * @property integer $flag
 * @property string $created_at
 * @property string $imei
 */
class Userhotspot extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_hotspot}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'bssid'], 'required'],
            [['user_id', 'flag'], 'integer'],
            [['created_at'], 'safe'],
            [['bssid'], 'string', 'max' => 17],
            [['imei'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'bssid' => 'Bssid',
            'flag' => 'Flag',
            'created_at' => 'Created At',
            'imei' => 'Imei',
        ];
    }
}

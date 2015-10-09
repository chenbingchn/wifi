<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hotspot".
 *
 * @property string $bssid
 * @property string $ssid
 * @property string $password
 * @property double $latitude
 * @property double $longitude
 * @property integer $level
 * @property integer $frequency
 * @property integer $weight
 * @property string $capabilities
 * @property string $imei
 * @property integer $flag
 * @property string $created_at
 * @property string $last_shared_at
 * @property string $user_id
 * @property integer $type
 */
class Hotspot extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hotspot';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bssid'], 'required'],
            [['latitude', 'longitude'], 'number'],
            [['level', 'frequency', 'weight', 'flag', 'user_id', 'type'], 'integer'],
            [['created_at', 'last_shared_at'], 'safe'],
            [['bssid'], 'string', 'max' => 17],
            [['ssid', 'imei'], 'string', 'max' => 32],
            [['password'], 'string', 'max' => 128],
            [['capabilities'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bssid' => '物理地址',
            'ssid' => 'wifi名称',
            'password' => 'Password',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'level' => 'Level',
            'frequency' => 'Frequency',
            'weight' => 'Weight',
            'capabilities' => 'Capabilities',
            'imei' => 'Imei',
            'flag' => 'Flag',
            'created_at' => '创建时间',
            'last_shared_at' => '最后分享时间',
            'user_id' => '用户ID',
            'type' => 'wifi类型',
        ];
    }
    
    public function getUser()
    {
        return $this->hasOne(Account::className(), ['user_id' => 'user_id']);
    }
}

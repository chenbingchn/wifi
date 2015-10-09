<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%wifi_event_detail}}".
 *
 * @property string $id
 * @property string $bssid
 * @property integer $wifi_type
 * @property integer $connect_event
 * @property integer $level
 * @property integer $connect_way
 * @property string $connector_imei
 * @property string $connector_uid
 * @property string $connect_date
 */
class WifiEventDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wifi_event_detail}}';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('wifievent');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bssid', 'wifi_type', 'connect_event', 'level', 'connect_way', 'connector_imei'], 'required'],
            [['wifi_type', 'connect_event', 'level', 'connect_way', 'connector_uid'], 'integer'],
            [['connect_date'], 'safe'],
            [['bssid'], 'string', 'max' => 17],
            [['connector_imei'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'bssid' => Yii::t('app', 'Bssid'),
            'wifi_type' => Yii::t('app', 'WiFi类型'),
            'connect_event' => Yii::t('app', '连接状态'),
            'level' => Yii::t('app', '连接强度'),
            'connect_way' => Yii::t('app', '连接方式'),
            'connector_imei' => Yii::t('app', '连接IMEI'),
            'connector_uid' => Yii::t('app', '连接UID'),
            'connect_date' => Yii::t('app', '连接时间'),
        ];
    }
}

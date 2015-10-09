<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%wifi_data}}".
 *
 * @property string $id
 * @property string $bssid
 * @property string $ssid
 * @property string $shop_name
 * @property string $city
 * @property string $address
 * @property string $type
 * @property integer $capabilities
 * @property string $pic_url1
 * @property string $pic_url2
 * @property string $pic_url3
 * @property string $pic_url4
 * @property string $created_at
 * @property string $last_change_at
 * @property string $wifi_type
 * @property double $latitude
 * @property double $longitude
 * @property double $pic_latitude
 * @property double $pic_longitude
 */
class Wifidata extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wifi_data}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'bssid', 'ssid'], 'required'],
            [['id', 'capabilities'], 'integer'],
            [['created_at', 'last_change_at'], 'safe'],
            [['latitude', 'longitude', 'pic_latitude', 'pic_longitude'], 'number'],
            [['bssid'], 'string', 'max' => 17],
            [['ssid'], 'string', 'max' => 32],
            [['shop_name', 'type', 'wifi_type'], 'string', 'max' => 50],
            [['city', 'pic_url1', 'pic_url2', 'pic_url3', 'pic_url4'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bssid' => 'wifi物理地址',
            'ssid' => 'wifi名称',
            'shop_name' => 'Shop Name',
            'city' => '城市',
            'address' => '地址',
            'type' => 'Type',
            'capabilities' => 'Capabilities',
            'pic_url1' => 'Pic Url1',
            'pic_url2' => 'Pic Url2',
            'pic_url3' => 'Pic Url3',
            'pic_url4' => 'Pic Url4',
            'created_at' => 'Created At',
            'last_change_at' => 'Last Change At',
            'wifi_type' => 'Wifi类型',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'pic_latitude' => 'Pic Latitude',
            'pic_longitude' => 'Pic Longitude',
        ];
    }
    public function getOrders()
    {
        return $this->hasOne(Userwifidata::className(), ['dataid' => 'id']);
    }
    public function getOpdata()
    {
        return $this->hasOne(Opstandarddata::className(), ['dataid' => 'id']);
    }
}

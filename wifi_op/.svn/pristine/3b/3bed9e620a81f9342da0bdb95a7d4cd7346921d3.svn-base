<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%imei_user_basic_info}}".
 *
 * @property string $imei
 * @property integer $country_id
 * @property string $country_name
 * @property string $first_date
 * @property string $email
 * @property integer $channel_id
 * @property double $latitude
 * @property double $longitude
 * @property string $city_name
 */
class Imeiuserbasicinfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%imei_user_basic_info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['imei'], 'required'],
            [['country_id', 'channel_id'], 'integer'],
            [['first_date'], 'safe'],
            [['latitude', 'longitude'], 'number'],
            [['imei'], 'string', 'max' => 32],
            [['country_name', 'city_name'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'imei' => Yii::t('app', 'Imei'),
            'country_id' => Yii::t('app', '国家ID'),
            'country_name' => Yii::t('app', '国家名称'),
            'first_date' => Yii::t('app', '首次打开时间'),
            'email' => Yii::t('app', 'Email'),
            'channel_id' => Yii::t('app', '渠道'),
            'latitude' => Yii::t('app', 'Latitude'),
            'longitude' => Yii::t('app', 'Longitude'),
            'city_name' => Yii::t('app', '首次打开地点'),
        ];
    }
}

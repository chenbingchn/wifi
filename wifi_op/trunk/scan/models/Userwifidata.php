<?php

namespace app\models;

use Yii;
use app\models\Wifidata;

/**
 * This is the model class for table "{{%user_wifi_data}}".
 *
 * @property string $user_id
 * @property string $bssid
 * @property string $dataid
 * @property string $created_at
 * @property string $last_change_at
 * @property integer $flag
 */
class Userwifidata extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_wifi_data}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'bssid', 'dataid'], 'required'],
            [['user_id', 'dataid', 'flag'], 'integer'],
            [['created_at', 'last_change_at'], 'safe'],
            [['bssid'], 'string', 'max' => 17]
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
            'dataid' => 'Dataid',
            'created_at' => 'Created At',
            'last_change_at' => 'Last Change At',
            'flag' => 'Flag',
        ];
    }
    public function getOrders()
    {
        return $this->hasOne(Wifidata::className(), ['id' => 'dataid']);
    }
    public function getHotspot()
    {
        return $this->hasOne(Hotspot::className(), ['bssid' => 'bssid']);
    }
    
    public function getUser()
    {
        return $this->hasOne(Account::className(), ['user_id' => 'user_id']);
    }
    
    public static function getPendingAuditNum(){
        return self::find()->where('flag = 0')->count();
    }
    
    public static function getPassButFailWifiNum(){
        return self::find()->joinWith('hotspot')->where('user_wifi_data.flag = 0')->andFilterWhere(['hotspot.flag'=>'1'])->count();
    }

}

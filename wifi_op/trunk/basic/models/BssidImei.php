<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bssid_imei".
 *
 * @property string $bssid
 * @property string $imei
 * @property string $created_at
 */
class BssidImei extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bssid_imei';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bssid', 'imei'], 'required'],
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
            'bssid' => 'Bssid',
            'imei' => 'Imei',
            'created_at' => 'Created At',
        ];
    }
    
     public static function getConnectNumByBssid($bssid){
         if(!$bssid){
             return  null;
         }
        return self::find()->andFilterWhere(['=','bssid',$bssid])->count();
    }
}

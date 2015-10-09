<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "imei_gcm_token".
 *
 * @property string $imei
 * @property string $token
 */
class ImeiGcmToken extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'imei_gcm_token';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['imei', 'token'], 'required'],
            [['imei'], 'string', 'max' => 32],
            [['token'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'imei' => 'Imei',
            'token' => 'Token',
        ];
    }
    
    public static function  getToken(){
        $tokens = self::find()->select('token')->asArray()->all();
        $return = array();
        foreach($tokens  as $v){
            $return[] = $v['token'];
        }
        return $return ;
    }
}

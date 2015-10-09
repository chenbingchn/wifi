<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%op_standard_data}}".
 *
 * @property string $id
 * @property string $user_id
 * @property string $dataid
 * @property string $type
 * @property integer $pay
 */
class Opstandarddata extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%op_standard_data}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'dataid', 'type', 'pay'], 'required'],
            [['id', 'user_id', 'dataid', 'pay','type'], 'integer'],
            [['auto_type'], 'string', 'max' => 30],
            [['admin_account'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'admin_account' => '审核人员账号',
            'user_id' => '用户ID',
            'dataid' => 'WifiID',
            'type' => 'WiFi类型',
            'auto_type' => '默认类型',
            'pay' => '结款状态（“0”为没有结款，“1”为已经结款）',
        ];
    }
    
    public function getUser()
    {
        return $this->hasOne(Account::className(), ['user_id' => 'user_id']);
    }
    
    public function getWifi()
    {
        return $this->hasOne(Wifidata::className(), ['id' => 'dataid']);
    }
    
    public static function getPendingSettlementNum(){
       return self::find()->where('pay = 0')->count();
    }
}

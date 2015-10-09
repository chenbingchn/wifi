<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%integral_record}}".
 *
 * @property string $id
 * @property string $user_id
 * @property string $integral_id
 * @property string $buy_date
 * @property string $buy_time
 * @property integer $bargin_points
 * @property integer $flag
 */
class Integralrecord extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%integral_record}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'user_id', 'integral_id', 'buy_date', 'bargin_points'], 'required'],
            [['id', 'user_id', 'integral_id', 'bargin_points', 'flag'], 'integer'],
            [['buy_date', 'buy_time'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'user_id' => '用户',
            'integral_id' => 'Integral ID',
            'buy_date' => '购买天',
            'buy_time' => '购买时间',
            'bargin_points' => '交易点数',
            'flag' => 'Flag',
        ];
    }

    public function getAccount() {
        return $this->hasOne(Account::classname(), ['user_id' => 'user_id']);
    }
    
    public function getGood() {
        return $this->hasOne(Integral::classname(), ['id' => 'integral_id']);
    }

    public static function getSpendUserByDate($beignDate = NULL,$endDate=NULL) {
        if (!$beignDate) {
            $beignDate = date('Y-m-d H:i:s',strtotime(date('Y-m-d')));
        }
        if (!$endDate) {
            $endDate = date('Y-m-d H:i:s',strtotime(date('Y-m-d'))+3600*24);
        }
        $model = new self();
        $userId = $model->find()->select('user_id')->andFilterWhere(['>','buy_time',$beignDate])->andFilterWhere(['<','buy_time',$endDate])->asarray()->all();
        return $userId;
    }

}

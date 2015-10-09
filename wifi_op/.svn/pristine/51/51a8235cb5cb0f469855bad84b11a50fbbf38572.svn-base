<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%account}}".
 *
 * @property string $user_id
 * @property string $email
 * @property string $user_name
 * @property string $password
 * @property string $phone_number
 * @property string $avatar
 * @property string $imei
 * @property integer $age
 * @property integer $gender
 * @property string $created_at
 */
class Account extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%account}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'age', 'gender'], 'integer'],
            [['created_at'], 'safe'],
            [['email', 'user_name', 'imei'], 'string', 'max' => 32],
            [['password'], 'string', 'max' => 128],
            [['phone_number'], 'string', 'max' => 16],
            [['avatar'], 'string', 'max' => 256],
            [['user_name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => '用户ID',
            'email' => '邮箱',
            'user_name' => '用户名',
            'password' => '密码',
            'phone_number' => '电话号码',
            'avatar' => 'Avatar',
            'imei' => 'Imei',
            'age' => '年龄',
            'gender' => '性别',
            'created_at' => '创建时间',
            'pwd'=>'密码'
        ];
    }
    
    public static function getUsernameByUserId($userId){
        if(!$userId){
            return null;
        }
        $user = self::getUserByUserId($userId);
        if($user){
            return $user->user_name;
        }
    }
    
    public static function getUserByUserId($userId){
        if(!$userId){
            return null;
        }
        return self::find()->andFilterWhere(['=','user_id',$userId])->one();
    }
}

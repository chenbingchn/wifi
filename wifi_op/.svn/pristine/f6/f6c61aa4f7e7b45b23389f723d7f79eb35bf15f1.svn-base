<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userid_hotspot".
 *
 * @property string $user_id
 * @property string $bssid
 * @property integer $score
 * @property string $created_at
 */
class UseridHotspot extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'userid_hotspot';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'bssid'], 'required'],
            [['user_id', 'score'], 'integer'],
            [['created_at'], 'safe'],
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
            'score' => 'Score',
            'created_at' => 'Created At',
        ];
    }
    
    public function getWifi(){
        return $this->hasOne(Hotspot::className(),['bssid'=>'bssid']);
    }
    

}

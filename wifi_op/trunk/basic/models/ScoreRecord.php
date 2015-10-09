<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "score_record".
 *
 * @property string $id
 * @property string $user_id
 * @property integer $type
 * @property integer $score
 * @property string $created_at
 */
class ScoreRecord extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'score_record';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['user_id', 'type', 'score'], 'required'],
            [['user_id', 'type', 'score'], 'integer'],
            [['created_at'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'user_id' => '用户ID',
            'type' => '获取积分类型',
            'score' => '积分',
            'created_at' => '获取时间',
        ];
    }

    public static function getEarnUserByDate($beignDate = NULL, $endDate = NULL) {
        if (!$beignDate) {
            $beignDate = date('Y-m-d H:i:s', strtotime(date('Y-m-d')));
        }
        if (!$endDate) {
            $endDate = date('Y-m-d H:i:s', strtotime(date('Y-m-d')) + 3600 * 24);
        }
        $model = new self();
        $userId = $model->find()->select('user_id')->andFilterWhere(['>', 'created_at', $beignDate])->andFilterWhere(['<', 'created_at', $endDate])->asarray()->all();
        return $userId;
    }

}

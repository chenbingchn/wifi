<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userid_score".
 *
 * @property string $id
 * @property integer $counter
 */
class UseridScore extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'userid_score';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'counter'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'counter' => 'Counter',
        ];
    }
}

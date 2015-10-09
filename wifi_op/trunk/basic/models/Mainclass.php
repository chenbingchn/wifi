<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%main_class}}".
 *
 * @property integer $pid
 * @property string $Classname
 */
class Mainclass extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%main_class}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'Classname'], 'required'],
            [['Classnamezh', 'Classnameyn'], 'required'],
            [['pid'], 'integer'],
            [['Classname'], 'string', 'max' => 20],
            [['pid'], 'unique'],
            [['Classname'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pid' => 'Pid',
            'Classname' => 'Classname',
            'Classnameyn' => 'Classnameyn',
            'Classnamezh' => 'Classnamezh',
        ];
    }
}

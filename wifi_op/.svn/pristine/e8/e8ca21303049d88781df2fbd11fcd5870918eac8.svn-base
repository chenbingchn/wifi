<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "integral_category".
 *
 * @property integer $id
 * @property string $cate_name
 */
class IntegralCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'integral_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cate_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cate_name' => '分类名称',
        ];
    }
    
    public static function getCatecory(){
        $return  =array('0'=>'请选择');
        foreach(self::find()->asArray()->all() as $v){
            $return[$v['id']] = $v['cate_name'];
        }
        return $return;
    }
}

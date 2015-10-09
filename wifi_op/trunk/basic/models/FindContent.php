<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%find_content}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $app_img
 */
class FindContent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%find_content}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product', 'app_img','url','content'], 'required'],
            [['productzh', 'productyn','contentzh','contentyn'], 'required'],
            [['show'],'default','value'=>0],
            [['product'], 'string', 'max' => 20],
            [['url'], 'url','message'=>'URL必须包含http://'],
            [['app_img'], 'file','message'=>'内容不能为空']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {

        return [
            'id' => 'ID',
            'url' => 'url',
            'product' => 'Product',
            'productzh' => 'Productzh',
            'productyn' => 'Productyn',
            'show' => 'Show',
            'content' => 'Content',
            'contentzh' => 'Contentzh',
            'contentyn' => 'Contentyn',
            'app_img' => 'app_img',
        ];
    }
}

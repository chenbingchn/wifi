<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%integral}}".
 *
 * @property integer $id
 * @property string $user_name
 * @property integer $Integral_value
 * @property integer $total
 * @property integer $ration
 * @property integer $discount
 * @property integer $usage
 * @property string $start_time
 * @property string $end_time
 * @property string $Title
 * @property string $Titlezh
 * @property string $Titleyn
 * @property string $Content
 * @property string $Contentzh
 * @property string $Contentyn
 * @property string $img_url
 */
class Integral extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%integral}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_name', 'Integral_value', 'total', 'ration', 'discount', 'usage', 'start_time', 'end_time', 'Title', 'Titlezh', 'Titleyn', 'Content', 'Contentzh', 'Contentyn'], 'required'],
            [['Integral_value', 'total', 'ration', 'discount', 'usage','cat_id'], 'integer'],
            [['start_time', 'end_time'], 'safe'],
            [['Contentzh', 'Contentyn'], 'string'],
            [['user_name', 'Title'], 'string', 'max' => 20],
            [['Titlezh', 'Titleyn'], 'string', 'max' => 50],
            [['Content'], 'string', 'max' => 100],
            [['use', 'tips','tipsyn','useyn'], 'string', 'max' => 2000],
//            [['img_url'],'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_name' => 'User Name',
            'Integral_value' => 'Integral Value',
            'total' => 'Total',
            'ration' => 'Ration',
            'discount' => 'Discount',
            'usage' => 'Usage',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'Title' => 'Title',
            'Titlezh' => 'Titlezh',
            'Titleyn' => 'Titleyn',
            'Content' => 'Content',
            'Contentzh' => 'Contentzh',
            'Contentyn' => 'Contentyn',
            'img_url' => 'Img Url',
            'cat_id'=>'分类',
            'use'=>'使用帮助(英文)',
            'tips'=>'重要提示(英文)',
            'useyn'=>'使用帮助(印尼文)',
            'tipsyn'=>'重要提示(印尼文)',
        ];
    }
    
    public static function geTitleById($id,$title="zh"){
        if(!$id){
            return null;
        }
        $model =  self::find()->andFilterWhere(['=','id',$id])->one();
        if($title=='zh'){
            return $model->Titlezh;
        }elseif($title=='yn'){
            return $model->Titleyn;
        }else{
            return $model->Title;
        }
    }
    
   public function getContent($language="en_US"){
        if($language=='zh_CN'){
            return $this->Contentzh;
        }elseif($language=='in_ID'){
            return $this->Contentyn;
        }else{
            return $this->Content;
        }
    }
    
   public function getTitle($language="en_US"){
        if($language=='zh_CN'){
            return $this->Titlezh;
        }elseif($language=='in_ID'){
            return $this->Titleyn;
        }else{
            return $this->Title;
        }
    }
    
    public function getTips($language="en_US"){
        if($language=='in_ID'){
            return $this->tipsyn;
        }else{
            return $this->tips;
        }
    }
    
   public function getUse($language="en_US"){
        if($language=='in_ID'){
            return $this->useyn;
        }else{
            return $this->use;
        }
    }
    
    
    public static function getCatNumByCatId($CatId){
        if($CatId==null)
            return null;
        return self::find()->where('cat_id ='.$CatId)->andWhere(['<','start_time',date('Y-m-d',time())])->andWhere(['>','end_time',date('Y-m-d',time())])->count();
    }
    
    public static function getIntegralByCatId($CatId){
        if ($CatId == null)
            return null;
        return self::find()->where('cat_id =' . $CatId)->andWhere(['<','start_time',date('Y-m-d',time())])->andWhere(['>','end_time',date('Y-m-d',time())])->all();
    }
    
    public function isValidGoods(){
        if(time() < strtotime($this->start_time)||time() > strtotime($this->end_time)){
           return false;
        }elseif($this->total<=0){
           return false;
        }elseif($this->ration<=$this->usage){
           return false;
        }
        return true;
    }
    
    public function isSoldOut(){
        return $this->total<=0?true:false;
    }

}

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
            [['user_name', 'Integral_value', 'total', 'ration', 'discount', 'start_time', 'end_time', 'Title', 'Titlezh', 'Titleyn', 'Content', 'Contentzh', 'Contentyn'], 'required'],
            [['Integral_value', 'total', 'ration', 'discount', 'usage','cat_id'], 'integer'],
            [['start_time', 'end_time'], 'safe'],
            [['Contentzh', 'Contentyn'], 'string'],
            [['user_name', 'Title'], 'string', 'max' => 20],
            [['Titlezh', 'Titleyn'], 'string', 'max' => 50],
            [['Content'], 'string', 'max' => 100],
            [['use', 'tips','tipsyn','useyn'], 'string', 'max' => 2000],
            ['usage', 'default', 'value' => 0],
//            [['img_url'],'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '商品ID',
            'user_name' => '用户名',
            'Integral_value' => '商品原价',
            'total' => '总数量',
            'ration' => '每日配额',
            'discount' => '折扣价',
            'usage' => '今日兑换量',
            'start_time' => '开始时间',
            'end_time' => '结束时间',
            'Title' => '商品名称(英文)',
            'Titlezh' => '商品名称(中文)',
            'Titleyn' => '商品名称(印尼文)',
            'Content' => '商品内容(英文)',
            'Contentzh' => '商品内容(中文)',
            'Contentyn' => '商品内容(印尼文)',
            'img_url' => 'Img Url',
            'cat_id'=>'商品类别',
            'use'=>'how to exchange(英文)',
            'tips'=>'tips(英文)',
            'useyn'=>'how to exchange(印尼文)',
            'tipsyn'=>'tips(印尼文)',
        ];
    }
    
    public static function geTitleById($id,$title="zh"){
        if(!$id){
            return null;
        }
        $model =  self::find()->andFilterWhere(['=','id',$id])->one();
        if($title=='zh'){
            return $model['Titlezh'];
        }elseif($title=='yn'){
            return $model['Titleyn'];
        }else{
            return $model['Title'];
        }
    }
    
   public function getContent($language="en_US"){
        if($language=='zh_CN'){
            return $this['Contentzh'];
        }elseif($language=='in_ID'){
            return $this['Contentyn'];
        }else{
            return $this['Content'];
        }
    }
    
   public function getTitle($language="en_US"){
        if($language=='zh_CN'){
            return $this['Titlezh'];
        }elseif($language=='in_ID'){
            return $this['Titleyn'];
        }else{
            return $this['Title'];
        }
    }
    
    public function getTips($language="en_US"){
        if($language=='in_ID'){
            return $this['tipsyn'];
        }else{
            return $this['tips'];
        }
    }
    
   public function getUse($language="en_US"){
        if($language=='in_ID'){
            return $this['useyn'];
        }else{
            return $this['use'];
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
    
    public function getState(){
        if($this->isSoldOut() || $this->ration<=$this->usage){
            return  "<span class='text-danger'>已售罄</span>";
        }elseif(time() < strtotime($this->start_time)||time() > strtotime($this->end_time)){
            return  "<span class='text-success'>已下架</span>";
        }else{
            return  "<span class='text-info'>可兑换</span>";
        }
    }

}

<?php
namespace app\models;

use Yii;

class Updatawifi{

    public function savet($id){

        $type=Wifidata::find()->where(['id'=>$id])->one();
        $updatas=new Wifidata();

        $url = 'http://localhost:8888/api/snowflake';
        $uid=file_get_contents($url);

        $data = $type->attributes;
        $data['create_time'] = date('Y-m-d');
        $data['last_change_at'] = date('Y-m-d');
        $data['id']=$uid;
        $updatas->setAttributes($data, false);
        $updatas->insert();

        return $uid;

    }

}
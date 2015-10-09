<?php

namespace app\filters;
use yii\base\ActionFilter;
use Yii;
use app\models\User;

class Logfilter extends ActionFilter {

    public function beforeAction($action) {
//        $actionId = $action->id;
//        $controllerId = $action->controller->id;
//        $item = $controllerId.".".$actionId;
        $url =  Yii::$app->request->url;
        $userId = Yii::$app->user->id;
//        $userName = User::getUsernameByUserId($userId);
        $time = date('Y-m-d H:i:s',time());
        $method = Yii::$app->request->isPost?'POST':'GET';
//        $get  = isset($_GET)?serialize($_GET):null;
        $post  = isset($_POST)?serialize($_POST):null;
        $logDir  = Yii::$app->basePath."/log/".date('Y-m-d',time());
        if(!file_exists($logDir)){
            mkdir($logDir, 0777,true);
        }
//        $str = "用户名:{$userName}    请求页面: {$item}  请求时间:{$time}  Get参数:{$get}  Post参数:{$post} \r\n";
        $str = "[{$time}] user::{$userId} {$method} {$url}  params::$post \r\n";
        file_put_contents($logDir."/log.txt",$str,FILE_APPEND);
        return true;
    }

}

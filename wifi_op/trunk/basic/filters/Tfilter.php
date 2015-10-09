<?php

namespace app\filters;

use Yii;
use yii\base\ActionFilter;
use yii\web\HttpException;
use app\models\User;


class Tfilter extends ActionFilter {

    public function beforeAction($action) {
        $actionId = $action->id;
        $controllerId = $action->controller->id;
        $item = $controllerId.".".$actionId;
        $userId = Yii::$app->user->id;
        $Guest = Yii::$app->user->isGuest;
        if($Guest){
            Yii::$app->user->loginRequired();
        }
        $userName = User::getUsernameByUserId($userId);
        if($userName=='admin'){
            return true;
        }
        if(Yii::$app->TAuthManager->checkAccess($userId,$item)){
            return true;
        }
        throw new HttpException(403,'您没有权限访问  请通知管理员开通权限');
    }

}

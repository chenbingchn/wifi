<?php
namespace app\views;
use Yii;

    if (!\Yii::$app->user->isGuest) {
        return $this->context->redirect(['site/index']);
    }else{
        return $this->context->redirect(['site/login']);
    }



?>
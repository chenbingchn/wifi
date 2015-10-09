<?php
namespace app\views;
use Yii;

    if (!\Yii::$app->user->isGuest) {
        return $this->context->redirect(['article/index']);
    }else{
        return $this->context->redirect(['site/login']);
    }



?>
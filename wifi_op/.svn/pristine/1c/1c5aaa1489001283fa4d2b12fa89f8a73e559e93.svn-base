<?php

namespace app\controllers;

use app\models\FeedBack;
use yii\data\ActiveDataProvider;
use app\components\TController;
use Yii;

class FeedbackController extends TController {

    /**
     * @return type
     * @desc feedback详情页列表
     */
    public function actionIndex() {
        $query = FeedBack::find()->orderBy('created_at desc');
        if (Yii::$app->request->get()) {
            $start_time = isset($_GET['start_time']) ? $_GET['start_time'] : null;
            $end_time = isset($_GET['end_time']) ? $_GET['end_time'] : null;
            if($start_time){
                $query->where("created_at > '$start_time'");
            }
            if($end_time){
                 $query->andwhere("created_at < '$end_time'");
            }
        }
//        var_dump($query);die;
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pagesize' => '10',
            ]
        ]);
        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
    }

}

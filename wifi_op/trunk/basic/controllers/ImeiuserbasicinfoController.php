<?php

namespace app\controllers;

use Yii;
use app\models\Imeiuserbasicinfo;
use app\models\search\ImeiuserbasicinfoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\components\TController;

/**
 * ImeiuserbasicinfoController implements the CRUD actions for Imeiuserbasicinfo model.
 */
class ImeiuserbasicinfoController extends TController
{
//    public function behaviors()
//    {
//        return [
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'delete' => ['post'],
//                ],
//            ],
//        ];
//    }

    /**
     * Lists all Imeiuserbasicinfo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ImeiuserbasicinfoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
}

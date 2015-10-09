<?php

namespace app\controllers;

use app\models\Scorelimitconfig;
use Yii;
use app\models\Scoreconfig;
use app\components\TController;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ScoreconfigController implements the CRUD actions for Scoreconfig model.
 */
class ScoreconfigController extends TController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup','index','view','create','update','delete'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout','index','view','create','update','delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Scoreconfig models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Scoreconfig::find()->joinWith('link'),
            'pagination' => [
                'pagesize' => '10',
            ]
        ]);
            return $this->render('index', [
                'dataProvider' => $dataProvider,
        ]);
//        $query =Scoreconfig::find()->joinWith('link');
//        $pagination = new Pagination([
//            'defaultPageSize' => 10,
//            'totalCount' => $query->count(),
//        ]);
//        $Article = $query->orderBy('score_config.id')
//            ->offset($pagination->offset)
//            ->limit($pagination->limit)
//            ->all();
//
//        return $this->render('index', [
//            'Article'=>$Article,
//            'pagination' => $pagination,
//        ]);

    }

    /**
     * Displays a single Scoreconfig model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Scoreconfig model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
//    public function actionCreate()
//    {
//        $model_config = new Scoreconfig();
//        $model_limits = new Scorelimitconfig();
//
//        $limits = $model_limits->load(Yii::$app->request->post());
//        $config = $model_config->load(Yii::$app->request->post());
//
//        if($limits && $config)//判断用户数据与身份信息
//        {
//            $model_limits->id = $model_config->id;
//            $model_config->save();
//            $model_limits->save();
//
//            return $this->redirect(['view', 'id' => $model_config->id]);
//        }else{
//
//            return $this->render('create', [
//                'model_config' => $model_config,
//                'model_limits' => $model_limits,
//            ]);
//
//        }
//
//    }

    /**
     * Updates an existing Scoreconfig model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model_config = Scoreconfig::find()->where(['id' => $id])->one();
        $model_limits = Scorelimitconfig::find()->where(['id' => $id])->one();

        $limits = $model_limits->load(Yii::$app->request->post());
        $config = $model_config->load(Yii::$app->request->post());

        if($config && $limits){
            $model_limits->id = $model_config->id;
            $model_config->save();
            $model_limits->save();
            return $this->redirect(['view', 'id' => $model_config->id]);
        }else{
            return $this->render('update',[
                'model_config' => $model_config,
                'model_limits' => $model_limits,
            ]);
        }
    }

    /**
     * Deletes an existing Scoreconfig model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        return $this->render('index');
    }

    /**
     * Finds the Scoreconfig model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Scoreconfig the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Scoreconfig::find()->joinWith('link')->where(['score_config.id' => $id])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}

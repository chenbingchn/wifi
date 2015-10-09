<?php

namespace app\controllers;

use Yii;
use app\models\Prize;
use app\models\search\PrizeSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\components\TController;
/**
 * PrizeController implements the CRUD actions for Prize model.
 */
class PrizeController extends TController
{
    // public function behaviors()
    // {
    //     return [
    //         'verbs' => [
    //             'class' => VerbFilter::className(),
    //             'actions' => [
    //                 'delete' => ['post'],
    //             ],
    //         ],
    //     ];
    // }

    /**
     * Lists all Prize models.
     * @return mixed
     * @desc 从数据库动态获取中奖号码
     */
    public function actionIndex()
    {
        $searchModel = new PrizeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @desc 获奖号码静态页面
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * @desc 创建中奖号码
     */
    public function actionCreate()
    {
        $model = new Prize();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * @desc 修改中奖号码信息
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * @desc 删除中奖号码信息
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * @desc 根据手机号或者中奖类别查找
     */
    protected function findModel($id)
    {
        if (($model = Prize::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

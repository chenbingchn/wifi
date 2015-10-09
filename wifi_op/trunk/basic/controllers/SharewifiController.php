<?php

namespace app\controllers;

use Yii;
use app\models\ShareWifi;
use yii\filters\AccessControl;
use app\models\search\ShareWifiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\components\TController;

/**
 * ShareWifiController implements the CRUD actions for ShareWifi model.
 */
class ShareWifiController extends TController
{
//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['logout', 'signup','index','view','create','update','delete'],
//                'rules' => [
//                    [
//                        'actions' => ['signup'],
//                        'allow' => true,
//                        'roles' => ['?'],
//                    ],
//                    [
//                        'actions' => ['logout','index','view','create','update','delete'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'delete' => ['post'],
//                ],
//            ],
//        ];
//    }

    /**
     * Lists all ShareWifi models.
     * @return mixed
     * @desc 分享wifi列表
     */
    public function actionIndex()
    {
        $searchModel = new ShareWifiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ShareWifi model.
     * @param string $id
     * @return mixed
     * @desc 显示分享wifi详情
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ShareWifi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @desc 创建分享wifi
     */
    public function actionCreate()
    {
        $model = new ShareWifi();

        if ($model->load(Yii::$app->request->post())) {
            $model->pic_url = UploadedFile::getInstance($model, 'pic_url');
            $names=$model->pic_url->baseName;
            $images =  UploadedFile::getInstance($model,'pic_url');
            $exts = $images->getExtension();
            $imageNames = $names.'.'.$exts;
            $path =Yii::$app->request->hostInfo.Yii::$app->request->baseUrl.'/';
            if (!is_dir('sharewifi/')) mkdir('sharewifi/');
            $images->saveAs('sharewifi/'.$imageNames);
            $model->pic_url = $path.'sharewifit/'.$imageNames;

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ShareWifi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @desc 更新wifi列表
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->pic_url = UploadedFile::getInstance($model, 'pic_url');
            $names=$model->pic_url->baseName;
            $images =  UploadedFile::getInstance($model,'pic_url');
            $exts = $images->getExtension();
            $imageNames = $names.'.'.$exts;
            $path =Yii::$app->request->hostInfo.Yii::$app->request->baseUrl.'/';
            if (!is_dir('sharewifi/')) mkdir('sharewifi/');
            $images->saveAs('sharewifi/'.$imageNames);
            $model->pic_url = $path.'sharewifi/'.$imageNames;

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ShareWifi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @desc 删除wifi列表
     */
    public function actionDelete($id)
    {
        //删除数据库的内容后自动删除本地文件的相对应的图片
        $model = $this->findModel($id);
        $names=$model->pic_url;
        $path =Yii::$app->request->hostInfo.Yii::$app->request->baseUrl.'/';
        $leng= strlen($path);
        $img_url=substr($names,$leng);
        $url=realpath(dirname(__FILE__).'/../').'/web/'.$img_url;
        if(unlink($url)){
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        }else{
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the ShareWifi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return ShareWifi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ShareWifi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

<?php

namespace app\controllers;

use Yii;
use app\models\Activity;
use yii\filters\AccessControl;
use app\models\search\ActivitySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\components\TController;

/**
 * ActivityController implements the CRUD actions for Activity model.
 */
class ActivityController extends TController
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
     * Lists all Activity models.
     * @return mixed
     * @desc 消息中心列表
     */
    public function actionIndex()
    {
        $searchModel = new ActivitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Activity model.
     * @param integer $id
     * @return mixed
     * @desc 显示消息详情
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Activity model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @desc 创建消息详情
     */
    public function actionCreate()
    {
        $model = new Activity();

        if ($model->load(Yii::$app->request->post())) {
            $model->pic_url = UploadedFile::getInstance($model, 'pic_url');
            $name=$model->pic_url->baseName;
            $image =  UploadedFile::getInstance($model,'pic_url');
            $ext = $image->getExtension();
            $imageName = $name.'.'.$ext;
            $path = Yii::$app->request->hostInfo.Yii::$app->request->baseUrl.'/';
            if (!is_dir('message/')) mkdir('message/');
            $image->saveAs('message/'.$imageName);
            $model->pic_url = $path.'message/'.$imageName;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Activity model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @desc 更新消息详情
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->pic_url = UploadedFile::getInstance($model, 'pic_url');
            $name=$model->pic_url->baseName;
            $image =  UploadedFile::getInstance($model,'pic_url');
            $ext = $image->getExtension();
            $imageName = $name.'.'.$ext;
            $path = Yii::$app->request->hostInfo.Yii::$app->request->baseUrl.'/';
            if (!is_dir('message/')) mkdir('message/');
            $image->saveAs('message/'.$imageName);
            $model->pic_url = $path.'message/'.$imageName;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Activity model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @desc 删除消息详情
     */
    public function actionDelete($id)
    {
        //删除数据库的内容后自动删除本地文件的相对应的图片
        $model = $this->findModel($id);
        $names=$model->pic_url;
        $path = Yii::$app->request->hostInfo.Yii::$app->request->baseUrl.'/';
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
     * Finds the Activity model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Activity the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Activity::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

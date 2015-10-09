<?php

namespace app\controllers;

use Yii;
use app\models\Integral;
use yii\filters\AccessControl;
use app\models\search\IntegralSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\components\TController;

/**
 * IntegralController implements the CRUD actions for Integral model.
 */
class IntegralController extends TController
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
     * Lists all Integral models.
     * @return mixed
     * @desc 积分商城列表页面
     */
    public function actionIndex()
    {
        $searchModel = new IntegralSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Integral model.
     * @param integer $id
     * @return mixed
     * @desc 积分商城详情页面
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Integral model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @desc 创建积分商城详情
     */
    public function actionCreate()
    {
        $model = new Integral();

        if ($model->load(Yii::$app->request->post())) {
            $model->img_url = UploadedFile::getInstance($model, 'img_url');
            $name=$model->img_url->baseName;
            $image =  UploadedFile::getInstance($model,'img_url');
            $ext = $image->getExtension();
            $imageName = $name.'.'.$ext;
            $path = Yii::$app->request->hostInfo.Yii::$app->request->baseUrl.'/';
            if (!is_dir('poins_image/')) mkdir('poins_image/');
            $image->saveAs('poins_image/'.$imageName);
            $model->img_url = $path.'poins_image/'.$imageName;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Integral model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @desc 更新积分商城详情
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if($_FILES['Integral']['tmp_name']['img_url'] != ""){
                $model->img_url = UploadedFile::getInstance($model, 'img_url');
                $name=$model->img_url->baseName;
                $image =  UploadedFile::getInstance($model,'img_url');
                $ext = $image->getExtension();
                $imageName = $name.'.'.$ext;
                $path = Yii::$app->request->hostInfo.Yii::$app->request->baseUrl.'/';
                $image->saveAs('poins_image/'.$imageName);
                $model->img_url = $path.'poins_image/'.$imageName;
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Integral model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @desc 删除积分商城详情
     */
    public function actionDelete($id)
    {
        //删除数据库的内容后自动删除本地文件的相对应的图片
        $model = $this->findModel($id);
        $name=$model->img_url;
        $path = Yii::$app->request->hostInfo.Yii::$app->request->baseUrl.'/';
        $leng= strlen($path);
        $img_url=substr($name,$leng);

        $url=realpath(dirname(__FILE__).'/../').'/web/'.$img_url;
        if(unlink($url)){
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        }else{
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Integral model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Integral the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Integral::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

<?php

namespace app\controllers;

use Yii;
use app\models\Share;
use yii\filters\AccessControl;
use app\models\search\ShareSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\components\TController;

/**
 * ShareController implements the CRUD actions for Share model.
 */
class ShareController extends TController
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
     * Lists all Share models.
     * @return mixed
     * @desc 首页下标题详情列表
     */
    public function actionIndex()
    {
        $searchModel = new ShareSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Share model.
     * @param integer $id
     * @return mixed
     * @desc 显示首页下标题详情
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Share model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @desc 创建首页下标题详情
     */
    public function actionCreate()
    {
        $model = new Share();

        if ($model->load(Yii::$app->request->post())) {
            if($model->icon = UploadedFile::getInstance($model, 'icon') != NULL) {
                $model->icon = UploadedFile::getInstance($model, 'icon');
                $names = $model->icon->baseName;
                $images = UploadedFile::getInstance($model, 'icon');
                $exts = $images->getExtension();
                $imageNames = $names . '.' . $exts;
                $path =Yii::$app->request->hostInfo.Yii::$app->request->baseUrl.'/';
                if (!is_dir('share/')) mkdir('share/');
                $images->saveAs('share/' . $imageNames);
                $model->icon = $path . 'share/' . $imageNames;

            }

            $model->pic_url = UploadedFile::getInstance($model, 'pic_url');
            $name = $model->pic_url->baseName;
            $image = UploadedFile::getInstance($model, 'pic_url');
            $ext = $image->getExtension();
            $imageName = $name . '.' . $ext;
            $path =Yii::$app->request->hostInfo.Yii::$app->request->baseUrl.'/';
            if (!is_dir('share/')) mkdir('share/');
            $image->saveAs('share/' . $imageName);
            $model->pic_url = $path . 'share/' . $imageName;

            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Share model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @desc 更新首页下标题详情
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if($model->icon = UploadedFile::getInstance($model, 'icon') != NULL) {
                $model->icon = UploadedFile::getInstance($model, 'icon');
                $names = $model->icon->baseName;
                $images = UploadedFile::getInstance($model, 'icon');
                $exts = $images->getExtension();
                $imageNames = $names . '.' . $exts;
                $path =Yii::$app->request->hostInfo.Yii::$app->request->baseUrl.'/';
                if (!is_dir('share/')) mkdir('share/');
                $images->saveAs('share/' . $imageNames);
                $model->icon = $path . 'share/' . $imageNames;

            }
            $model->pic_url = UploadedFile::getInstance($model, 'pic_url');
            $name = $model->pic_url->baseName;
            $image = UploadedFile::getInstance($model, 'pic_url');
            $ext = $image->getExtension();
            $imageName = $name . '.' . $ext;
            $path =Yii::$app->request->hostInfo.Yii::$app->request->baseUrl.'/';
            if (!is_dir('share/')) mkdir('share/');
            $image->saveAs('share/' . $imageName);
            $model->pic_url = $path . 'share/' . $imageName;

            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Share model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @desc 删除首页下标题详情
     */
    public function actionDelete($id)
    {
        //删除数据库的内容后自动删除本地文件的相对应的图片
        /*$model = $this->findModel($id);
        $name=$model->icon;
        $names=$model->pic_url;
        $path="wifiweb.enmonet.com/wifi_op/trunk/basic/";
        $leng= strlen($path);
        $img_url=substr($name,$leng);
        $img_urls=substr($names,$leng);

        if($img_url == NULL){
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        }
        $url=realpath(dirname(__FILE__).'/../').'/web/'.$img_url;
        if(unlink($url)){
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        }else{
            return $this->redirect(['index']);
        }*/
        return $this->redirect(['index']);
    }

    /**
     * Finds the Share model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Share the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Share::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

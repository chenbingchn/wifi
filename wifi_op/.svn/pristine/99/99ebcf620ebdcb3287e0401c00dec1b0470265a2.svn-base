<?php

namespace app\controllers;

use Yii;
use app\models\FindContent;
use yii\filters\AccessControl;
use app\models\search\FindcontentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\components\TController;

/**
 * FindcontentController implements the CRUD actions for Findcontent model.
 */
class FindcontentController extends TController
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
     * Lists all Findcontent models.
     * @return mixed
     * @desc 发现页icon列表
     */
    public function actionIndex()
    {
        $searchModel = new FindcontentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Findcontent model.
     * @param integer $id
     * @return mixed
     * @desc 发现页icon列表详情显示
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Findcontent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @desc 创建icon列表详情
     */
    public function actionCreate()
    {
        $model = new FindContent();

        if ($model->load(Yii::$app->request->post())) {
            $model->app_img = UploadedFile::getInstance($model, 'app_img');
            $name=$model->app_img->baseName;
            $image =  UploadedFile::getInstance($model,'app_img');
            $ext = $image->getExtension();
            $imageName = $name.'.'.$ext;
            if (!is_dir('app_images/')) mkdir('app_images/');
            $image->saveAs('app_images/'.$imageName);
            $model->app_img = 'app_images/'.$imageName;

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Findcontent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @desc 更新icon列表详情
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->app_img = UploadedFile::getInstance($model, 'app_img');
            $name=$model->app_img->baseName;
            $image =  UploadedFile::getInstance($model,'app_img');
            $ext = $image->getExtension();
            $imageName = $name.'.'.$ext;
            $image->saveAs('app_images/'.$imageName);
            $model->app_img = 'app_images/'.$imageName;

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Findcontent model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @desc 删除icon列表详情
     */
    public function actionDelete($id)
    {
        //删除数据库的内容后自动删除本地文件的相对应的图片
        $model = $this->findModel($id);
        $names=$model->app_img;
        $url=realpath(dirname(__FILE__).'/../').'/web/'.$names;
        if(unlink($url)){
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        }else{
            return $this->redirect(['index']);
        }

    }

    /**
     * Finds the Findcontent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Findcontent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FindContent::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

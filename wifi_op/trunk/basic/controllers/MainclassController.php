<?php

namespace app\controllers;

use Yii;
use app\models\Mainclass;
use yii\filters\AccessControl;
use app\models\search\MainclassSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Categorys;
use yii\web\UploadedFile;
use app\components\TController;

/**
 * MainclassController implements the CRUD actions for Mainclass model.
 */
class MainclassController extends TController
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
     * Lists all Mainclass models.
     * @return mixed
     * @desc 发现页大类别详情列表
     */
    public function actionIndex()
    {
        $searchModel = new MainclassSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mainclass model.
     * @param integer $id
     * @return mixed
     * @desc 显示发现页大类别详情
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Mainclass model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @desc 创建发现页大类别详情
     */
    public function actionCreate()
    {
        $model = new Mainclass();

        if ($model->load(Yii::$app->request->post())) {
            $model->icon = UploadedFile::getInstance($model, 'icon');
            $name=$model->icon->baseName;
            $image =  UploadedFile::getInstance($model,'icon');
            $ext = $image->getExtension();
            $imageName = $name.'.'.$ext;
            if (!is_dir('main_icon/')) mkdir('main_icon/');
            $image->saveAs('main_icon/'.$imageName);
            $model->icon = 'main_icon/'.$imageName;

            $model->save();
            return $this->redirect(['view', 'id' => $model->pid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Mainclass model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @desc 更新发现页大类别详情
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->icon = UploadedFile::getInstance($model, 'icon');
            $name=$model->icon->baseName;
            $image =  UploadedFile::getInstance($model,'icon');
            $ext = $image->getExtension();
            $imageName = $name.'.'.$ext;
            $image->saveAs('main_icon/'.$imageName);
            $model->icon = 'main_icon/'.$imageName;

            $model->save();
            return $this->redirect(['view', 'id' => $model->pid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Mainclass model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @desc 删除发现页大类别详情
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);
        $mpid=$model->pid;
        Categorys::deleteAll(['pid'=> $mpid]);
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
        /*
        $this->findModel($id)->delete();

        return $this->redirect(['index']);*/
    }

    /**
     * Finds the Mainclass model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mainclass the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mainclass::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

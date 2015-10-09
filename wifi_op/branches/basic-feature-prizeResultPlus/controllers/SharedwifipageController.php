<?php

namespace app\controllers;

use Yii;
use app\models\Sharedwifipage;
use app\models\search\SharedwifipageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SharedwifipageController implements the CRUD actions for Sharedwifipage model.
 */
class SharedwifipageController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Sharedwifipage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SharedwifipageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sharedwifipage model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Sharedwifipage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
//    public function actionCreate()
//    {
//        $model = new Sharedwifipage();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('create', [
//                'model' => $model,
//            ]);
//        }
//    }

    /**
     * Updates an existing Sharedwifipage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
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
            if (!is_dir('sheard_images/')) mkdir('sheard_images/');
            $image->saveAs('sheard_images/'.$imageName);
            $model->pic_url = $path.'sheard_images/'.$imageName;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Sharedwifipage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
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
     * Finds the Sharedwifipage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sharedwifipage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sharedwifipage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

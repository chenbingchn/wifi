<?php

namespace app\controllers;

use app\models\Account;
use app\models\Notify;
use Yii;
use app\models\Integralrecord;
use app\models\search\IntegralrecordSearch;
use yii\helpers\Json;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\components\TController;

/**
 * IntegralrecordController implements the CRUD actions for Integralrecord model.
 */
class IntegralrecordController extends TController
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
     * Lists all Integralrecord models.
     * @return mixed
     * @desc 积分商城用户消费记录详情列表
     */
    public function actionIndex()
    {
        $searchModel = new IntegralrecordSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * @desc 系统给用户发兑换消息
     */
    public function actionShow()
    {
        if(Yii::$app->request->post()){
            $ids=$_POST['selection'];
            foreach($ids as $k=>$v){
                $url = 'http://localhost:8888/api/snowflake';
                $uid=file_get_contents($url);
                $updata=Integralrecord::find()->where(['id'=> $v])->one();
                $user=$updata->user_id;
                $imeirow=Account::find()->where(['user_id'=>$user])->one();
                $imei=$imeirow->imei;
                $time=date('Y-m-d h:m:s',time());
                $create = new Notify();
                $create->id=$uid;
                $create->imei = ''.$imei.'';
                $create->title = 'We have successfully refilled your cell phone.';
                $create->type = 6;
                $create->brief_desc = 'We have successfully refilled your cell phone.Please check for it.If there is any question, please send us a email via enjoyapp.wifi@enmonet.com with your user name,cell phone number and exchanged date. We will contact with you later.';
                $create->created_at = ''.$time.'';
                $create->save();
                $updata->flag='1';
                $updata->update();
            }
        }

//        return $this->redirect(['index']);
    }

//    /**
//     * Displays a single Integralrecord model.
//     * @param string $id
//     * @return mixed
//     */
//    public function actionView($id)
//    {
//        return $this->render('view', [
//            'model' => $this->findModel($id),
//        ]);
//    }
//
//    /**
//     * Creates a new Integralrecord model.
//     * If creation is successful, the browser will be redirected to the 'view' page.
//     * @return mixed
//     */
//    public function actionCreate()
//    {
//        $model = new Integralrecord();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('create', [
//                'model' => $model,
//            ]);
//        }
//    }
//
//    /**
//     * Updates an existing Integralrecord model.
//     * If update is successful, the browser will be redirected to the 'view' page.
//     * @param string $id
//     * @return mixed
//     */
//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('update', [
//                'model' => $model,
//            ]);
//        }
//    }
//
//    /**
//     * Deletes an existing Integralrecord model.
//     * If deletion is successful, the browser will be redirected to the 'index' page.
//     * @param string $id
//     * @return mixed
//     */
//    public function actionDelete($id)
//    {
//        $this->findModel($id)->delete();
//
//        return $this->redirect(['index']);
//    }
//
//    /**
//     * Finds the Integralrecord model based on its primary key value.
//     * If the model is not found, a 404 HTTP exception will be thrown.
//     * @param string $id
//     * @return Integralrecord the loaded model
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    protected function findModel($id)
//    {
//        if (($model = Integralrecord::findOne($id)) !== null) {
//            return $model;
//        } else {
//            throw new NotFoundHttpException('The requested page does not exist.');
//        }
//    }
}

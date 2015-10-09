<?php

namespace app\Controllers;

use app\models\Newuser;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use app\models\Account;
use app\models\search\AccountSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\DataForm;
use app\models\Userwifidata;
use yii\data\Pagination;
use app\models\GetTime;
use app\models\Opstandarddata;
use app\models\search\OpstandarddataSearch;

/**
 * AccountController implements the CRUD actions for Account model.
 */
class AccountController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup', 'index', 'view', 'show', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'index', 'view', 'show', 'create', 'update', 'delete'],
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
     * Lists all Account models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new AccountSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Account model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Account model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Account();
        $user = new Newuser();

        if (Yii::$app->request->post()) {
            $num = $_POST['num'];
            for ($i = 0; $i < $num; $i++) {
                $us = $user->User();
                $pwd = $user->Password();

                $model->isNewRecord = true;
                $model->user_id = $user->User_id();
                ;
                $model->user_name = $us;
                $model->password = md5($pwd);
                $model->pwd = $pwd;
                $model->save();
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Account model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $pwd = $model->password;
            $model->password = md5($pwd);
            $model->pwd = $pwd;
            $model->save();
            return $this->redirect(['view', 'id' => $model->user_id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Account model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionWifi($id) {
        $model = new DataForm();
        if ($model->load(Yii::$app->request->get())) {
//            var_dump($model);die;
            $get = new Gettime();
            $start = $get->start_time($model->start, $model->hits);
            $end = $get->end_time($model->end, $model->hits);
            if (!$model->flag) {
                $model->flag = 0;
            }
            $query = Userwifidata::find()->joinWith('orders')->joinWith('user')->joinWith('hotspot')->where(['user_wifi_data.flag' => $model->flag])->andFilterWhere(['like', 'account.user_name', $model->user_id])->andWhere(['user_wifi_data.user_id' => $id])
                            ->andFilterWhere(['=', 'wifi_data.capabilities', $model->type])->andFilterWhere(['like', 'wifi_data.ssid', $model->ssid])->andFilterWhere(['like', 'wifi_data.address', $model->address])
                            ->andFilterWhere(['=', 'wifi_data.type', $model->shop_type])->andFilterWhere(['like', 'wifi_data.city', $model->city]);
            if (!empty($start)) {
                $query = $query->andFilterWhere(['>=', 'user_wifi_data.created_at', $start]);
            }
            if (!empty($end)) {
                $query = $query->andFilterWhere(['<', 'user_wifi_data.created_at', $end]);
            }
            $pagination = new Pagination([
                'defaultPageSize' => 10,
                'totalCount' => $query->count(),
            ]);
            $Article = $query->orderBy('dataid')
                    ->offset($pagination->offset)
                    ->limit($pagination->limit)
                    ->orderBy('last_change_at desc')
                    ->all();
            $pagination->params['DataForm'] = [
                'start' => $model->start,
                'end' => $model->end,
                'user_id' => $model->user_id,
                'type' => $model->type,
                'hit' => 0,
                'flag' => $model->flag,
            ];
            $pagination->params['id'] = $id;
        } else {
            $model->flag = 0;
            $query = Userwifidata::find()->joinWith('orders')->joinWith('hotspot')->where(['user_wifi_data.flag' => $model->flag])->andWhere(['user_wifi_data.user_id' => $id]);
            $pagination = new Pagination([
                'defaultPageSize' => 10,
                'totalCount' => $query->count(),
            ]);
            $Article = $query->orderBy('user_id')
                    ->offset($pagination->offset)
                    ->limit($pagination->limit)
                    ->orderBy('last_change_at desc')
                    ->all();
        }
        return $this->render('wifi', [
                    'model' => $model,
                    'test' => $Article,
                    'pagination' => $pagination,
        ]);
    }

    public function actionPayrecord() {
        $searchModel = new OpstandarddataSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('payrecord', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the Account model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Account the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Account::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}

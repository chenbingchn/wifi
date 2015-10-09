<?php

namespace app\controllers;

use app\models\Newhtml;
use Yii;
use app\models\Push;
use yii\filters\AccessControl;
use app\models\search\PushSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\BaseUrl;
use app\components\TController;
use app\models\PushRecord;
use app\models\ImeiGcmToken;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * PushController implements the CRUD actions for Push model.
 */
class PushController extends TController {

    public $gcm_url = "https://gcm-http.googleapis.com/gcm/send";

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
     * Lists all Push models.
     * @return mixed
     * @desc 推送页面列表详情显示
     */
    public function actionIndex() {
        $searchModel = new PushSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Push model.
     * @param integer $id
     * @return mixed
     * @desc 显示推送页面详情
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Push model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @desc 创建推送页详情
     */
    public function actionCreate() {
        $model = new Push();

        $html = new Newhtml();

        $cout = Push::find()->max('id');
        $cout = $cout + 1;

        if ($model->load(Yii::$app->request->post())) {
            $model->image = UploadedFile::getInstance($model, 'image');
            $name = $model->image->baseName;
            $image = UploadedFile::getInstance($model, 'image');
            $ext = $image->getExtension();
            $imageName = $name . '.' . $ext;
            $path = BaseUrl::base(true) . '/';
            if (!is_dir('push_image/'))
                mkdir('push_image/');
            $image->saveAs('push_image/' . $imageName);
            $model->image = $path . 'push_image/' . $imageName;
            $web = $html->News($cout, $model->url, $model->image);
            $model->html_url = $path . '' . $web;

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Push model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @desc 更新推送页详情
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        $html = new Newhtml();

        if ($model->load(Yii::$app->request->post())) {
            $model->image = UploadedFile::getInstance($model, 'image');
            $name = $model->image->baseName;
            $image = UploadedFile::getInstance($model, 'image');
            $ext = $image->getExtension();
            $imageName = $name . '.' . $ext;
            $path = Yii::$app->request->hostInfo . Yii::$app->request->baseUrl . '/';
            if (!is_dir('push_image/'))
                mkdir('push_image/');
            $image->saveAs('push_image/' . $imageName);
            $model->image = $path . 'push_image/' . $imageName;
            $web = $html->News($model->id, $model->url, $model->image);
            $model->html_url = $path . '' . $web;

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Push model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @desc 删除推送页详情
     */
    public function actionDelete($id) {
        //删除数据库的内容后自动删除本地文件的相对应的图片
        $model = $this->findModel($id);
        $html = $model->html_url;
        $names = $model->image;
        $path = Yii::$app->request->hostInfo . Yii::$app->request->baseUrl . '/';
        $paths = Yii::$app->request->hostInfo . Yii::$app->request->baseUrl . '/';
        $leng = strlen($path);
        $lengs = strlen($paths);
        $img_url = substr($names, $leng);
        $html_url = substr($html, $lengs);
        $url = realpath(dirname(__FILE__) . '/../') . '/web/' . $img_url;
        $urls = realpath(dirname(__FILE__) . '/../') . '/web/' . $html_url;
        if (unlink($url)) {
            unlink($urls);
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        } else {
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Push model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Push the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Push::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionList() {
        $query = PushRecord::find();
        if (isset($_GET['start_time'])&&!empty($_GET['start_time'])) {
            $query->where(['>','create_time',  strtotime($_GET['start_time'])]);
        }
        if (isset($_GET['end_time'])&&!empty($_GET['end_time'])) {
            $query->andWhere(['<','create_time',  strtotime($_GET['end_time'])]);
        }
        if(isset($_GET['pushUser'])&&!empty($_GET['pushUser'])){
            $userId = User::getUserIdByUsername($_GET['pushUser']);
            $query->andWhere(['=','create_user',$userId]);
        }
        if(isset($_GET['junmPage'])&&$_GET['junmPage']!=""){
            $query->andWhere(['=','jump_page',$_GET['junmPage']]);
        }
        $query->orderBy('create_time desc');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $this->render('list', [
                    'dataProvider' => $dataProvider
        ]);
    }

    public function actionCreatepush() {
        $model = new PushRecord;
        if (Yii::$app->request->post()) {
            $title = $_POST['PushRecord']['title'];
            $text = $_POST['PushRecord']['content'];
            $registration_ids = ImeiGcmToken::getToken();
            $registration_array = $this->explodeArrayByNum($registration_ids, 2000);
            $headers = array(
                'Authorization: key=AIzaSyCL4zsvkN54bdWpXwWZYKY_El_t8Xl4WH8',
                'Content-Type: application/json'
            );
            $jsonArray = array(
                'data' => array(
                    "type" => $_POST['PushRecord']['jump_page'],
                    "url" => $_POST['PushRecord']['url'],
                ),
                'notification' => array(
                    'title' => $title,
                    'text' => $text,
                )
            );
            foreach ($registration_array as $k => $v) {
                $jsonArray['registration_ids'] = $v;
                $result = $this->sendMessage($jsonArray, $headers);
                $obj = json_decode($result);
                $isReplaceRegistration_id = false;
                if ($obj->canonical_ids != 0) {
                    $isReplaceRegistration_id = true;
                }
                $preHandleArray = $this->getPreHandleArray($obj->results, $isReplaceRegistration_id);
                if (!empty($preHandleArray['delete'])) {
                    foreach ($preHandleArray['delete'] as $deleteIndex) {
                        $deleteModel = ImeiGcmToken::find()->where("token = '{$v[$deleteIndex]}'")->one();
                        $deleteModel->delete();
                    }
                }
                if (!empty($preHandleArray['replace'])) {
                    foreach ($preHandleArray['replace'] as $index => $newId) {
                        $pushRecod = ImeiGcmToken::find()->where("token = '{$v[$index]}'")->one();
                        $pushRecod->token = $newId;
                        $pushRecod->update();
                    }
                }
//                var_dump($obj);
//                echo "<hr>";
            }

            $model->load(Yii::$app->request->post());
            $model->create_time = time();
            $model->create_user = Yii::$app->user->id;
            $model->save();
            return $this->render('/msg/success', array('info' => 'push消息推送成功', 'jumpPage' => Yii::$app->urlManager->createUrl('push/createpush')));
//             var_dump($result);die;
//            DIE;
        }
        return $this->render('createPush', [
                    'model' => $model
        ]);
    }

    private function sendMessage($jsonArray, $headers) {
        $host = Yii::$app->request->hostInfo;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->gcm_url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($jsonArray));
        if ($host != "http://wifiop.enmonet.com") {
            curl_setopt($ch, CURLOPT_PROXY, "23.91.98.74");
            curl_setopt($ch, CURLOPT_PROXYPORT, 7777);
            curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
        }
//        curl_setopt($ch, CURLOPT_PROXY, "127.0.0.1:1080");
//        curl_setopt($ch, CURLOPT_PROXYTYPE, 7);
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Problem occurred: ' . curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }

    private function explodeArrayByNum($array, $num) {
        $return = array();
        $temp = 0;
        $count = 0;
        foreach ($array as $k => $v) {
            $return[$count][] = $v;
            $temp++;
            if ($temp == $num) {
                $temp = 0;
                $count++;
            }
        }
        return $return;
    }

    public function getPreHandleArray($result, $isReplace) {
        $replace = array();
        $delete = array();
        foreach ($result as $k => $v) {
            if ($isReplace) {
                if (isset($v->registration_id)) {
                    $replace[$k] = $v->registration_id;
                }
            }
            if (isset($v->error) && $v->error == 'NotRegistered') {
                $delete[$k] = $k;
            }
        }
        return array('replace' => $replace, 'delete' => $delete);
    }

}

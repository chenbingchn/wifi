<?php

namespace app\controllers;

use app\models\Hotspot;
use app\models\Hotspots;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use app\models\SignupForm;
use app\models\LoginForm;
use app\models\Userwifidata;
use app\models\Opstandarddata;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','synchronous','updata'],
                'rules' => [
//					[
//                        'actions' => ['signup'],
//                        'allow' => true,
//                        'roles' => ['?'],
//                    ],
                    [
                        'actions' => ['logout','synchronous','updata'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex() {
        if (Yii::$app->user->isGuest) {
              $this->redirect(Yii::$app->urlManager->createUrl('site/login'));
        }
        $PendingAuditNum = Userwifidata::getPendingAuditNum();
        $PassButFailWifiNum =  Userwifidata::getPassButFailWifiNum();
        $PendingSettlementNum = Opstandarddata::getPendingSettlementNum();
        $PendingSyncNum  = Hotspot::getPendingSyncNum();
        return $this->render('index',[
            'PendingAuditNum'=>$PendingAuditNum,
            'PendingSettlementNum'=>$PendingSettlementNum,
            'PendingSyncNum'=>$PendingSyncNum,
            'PassButFailWifiNum'=>$PassButFailWifiNum
        ]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
	
        public function actionSignup() {
          
         if(Yii::$app->user->isGuest||Yii::$app->user->identity->username !=="admin"){
             return $this->redirect(Yii::$app->urlManager->createUrl('site/index'));
         }   
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
                    'model' => $model,
        ]);
    }
    public function actionFaq()
    {
        return $this->renderPartial('FAQ');
    }
    
    public function actionSynchronous()
    {

//        $nowtime=time();
//        $oldtime=$nowtime-604800;
//        $daysago=$oldtime-604800;
//        $oldtime = date('Y-m-d h:m:s',$oldtime);
//        $daysago = date('Y-m-d h:m:s',$daysago);
        $row= new Hotspot();
        $dataProvider = new ActiveDataProvider([
            'query' => $row->find()->joinWith('wifidata')
                       ->andFilterWhere(['user_wifi_data.flag'=>'1'])->orderBy('last_shared_at desc'),
//                       ->andFilterWhere(['<','hotspot.last_shared_at',$oldtime])
//                       ->andFilterWhere(['>','hotspot.last_shared_at',$daysago]),
            'pagination' => [
                    'pagesize' => '10',
             ]
        ]);
        return $this->render('synchronous', [
            'row'=>$row,
            'dataProvider' => $dataProvider,
        ]);

    }

//    public function actionUpdata()
//    {
//        if (Yii::$app->request->post()) {
//            $ids=$_POST['selection'];
//            foreach($ids as $k=>$v){
//                             
//                $upwifi=Hotspots::find()->andFilterWhere(['=','bssid',$v])
//                                        ->andFilterWhere(['=','flag','1'])
//                                        ->one();
//                $insert=Hotspots::find()->andFilterWhere(['=','bssid',$v])->one();
//  
//                $hotspot=Hotspot::find()->where(['bssid'=>$v])->one();
//                if($upwifi != NULL)
//                {
//                    $upwifi->password=$hotspot->password;
//                    $upwifi->last_shared_at = date('Y-m-d H:i:s',time());
//                    $upwifi->flag='0';
//                    if($upwifi->update()){
//                        $hotspot->is_sync = '已同步';
//                        $hotspot->update();
//                    }
//                }
//                if($insert == NULL)
//                {
//                    $updata=new Hotspots();
//                    $data = $hotspot->attributes;
//                    $data['last_change_at'] = date('Y-m-d H:i:s',time());
//                    $data['user_id'] = '-1';
//                    $data['imei'] = '-1';
//                    $updata->setAttributes($data, false);
//                    if($updata->insert()){
//                        $hotspot->is_sync = '已同步';
//                        $hotspot->update();
//                    }
//                }else{
//                    if($insert->flag ==0 && !$insert->password ){ 
//                        $insert->delete();
//                        $updata=new Hotspots();
//                        $data = $hotspot->attributes;
//                        $data['last_change_at'] = date('Y-m-d h:i:s', time());
//                        $data['user_id'] = '-1';
//                        $data['imei'] = '-1';
//                        $updata->setAttributes($data, false);
//                        if ($updata->insert()) {
//                            $hotspot->is_sync = '已同步';
//                            $hotspot->update();
//                        }
//                    }
//                }
//            }
//        }
//    }
    
    public function actionUpdata(){
        if (Yii::$app->request->post()) {
            $ids = $_POST['selection'];
            $host = Yii::$app->request->hostInfo;
            if($host == "http://wifiweb.enmonet.com"){
                $url = "wifitest.enmonet.com/v1/op/sync_wifi_batch";
            }elseif($host == "http://wifiop.enmonet.com"){
                $url = "wifi.enmonet.com/v1/op/sync_wifi_batch";
            }
//            var_dump($host); var_dump($url);
            $post_data = ['bssids' => json_encode($_POST['selection'])];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
            $result = curl_exec($ch);
            $json = curl_multi_getcontent($ch);
            curl_close($ch);
            $result = json_decode($json, true);
//            var_dump($result);die;
            foreach ($result['result']['result'] as $v) {
                if ($v['result'] == 0) {
                    $oriWifi = Hotspot::find()->where(['bssid' => $v['bssid']])->one();
                    $oriWifi->is_sync = '已同步';
                    $oriWifi->update();
                }elseif($v['result'] == 2){
                    $oriWifi = Hotspot::find()->where(['bssid' => $v['bssid']])->one();
                    $oriWifi->is_sync = '无需同步';
                    $oriWifi->update();
                }
            }

//            foreach ($ids as $k => $v) {
//                $syncWifi = Hotspots::find()->andFilterWhere(['=', 'bssid', $v])->one();
//                $oriWifi = Hotspot::find()->where(['bssid' => $v])->one();
//                if ($syncWifi) {
//                    if ($syncWifi->flag == 1) {
//                        $syncWifi->password = $oriWifi->password;
//                        $syncWifi->last_shared_at = date('Y-m-d H:i:s', time());
//                        $syncWifi->flag = '0';
//                        $syncWifi->user_id = '-1';
//                        $syncWifi->imei = '-1';
//                        if ($syncWifi->update()) {
//                            $oriWifi->is_sync = '已同步';
//                            $oriWifi->update();
//                        }
//                    } elseif ($syncWifi->flag == 0 && !$syncWifi->password) {
//                        $syncWifi->delete();
//                        $newWifi = new Hotspots();
//                        $data = $oriWifi->attributes;
//                        $data['last_change_at'] = date('Y-m-d h:i:s', time());
//                        $data['user_id'] = '-1';
//                        $data['imei'] = '-1';
//                        $newWifi->setAttributes($data, false);
//                        if ($newWifi->insert()) {
//                            $oriWifi->is_sync = '已同步';
//                            $oriWifi->update();
//                        }
//                    } elseif ($syncWifi->flag == 0 && $oriWifi->is_sync == '未同步') {
//                        $oriWifi->is_sync = '已同步';
//                        $oriWifi->update();
//                    }
//                } else {
//                    $newWifi = new Hotspots();
//                    $data = $oriWifi->attributes;
//                    $data['last_change_at'] = date('Y-m-d H:i:s', time());
//                    $data['user_id'] = '-1';
//                    $data['imei'] = '-1';
//                    $newWifi->setAttributes($data, false);
//                    if ($newWifi->insert()) {
//                        $oriWifi->is_sync = '已同步';
//                        $oriWifi->update();
//                    }
//                }
//            }
        }
    }

}

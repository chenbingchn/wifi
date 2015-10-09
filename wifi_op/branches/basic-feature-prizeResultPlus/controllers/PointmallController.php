<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Account;
use app\models\IntegralCategory;
use app\models\Integralrecord;
use app\models\Integral;
use app\models\Banner;

class PointmallController extends Controller {

    public $layout = false;

    public function actionIndex() {
//        $user_id = '643614411621273600';
//        $imei = '353347060351374';
//        $access_token = 'V1wCr0PioNoOMz0x7PT_WQ==';
        $user_id = isset($_GET['user_id'])?$_GET['user_id']:-1;
        $imei = isset($_GET['imei'])?$_GET['imei']:-1;
        $access_token =  isset($_GET['access_token'])?$_GET['access_token']:null;
        $language =  isset($_GET['language'])?$_GET['language']:'en_US';
        $integral_cate = IntegralCategory::getCatecory();
        unset($integral_cate[0]);
        $user = null;
        $banner = Banner::find()->where('type = 3 and state =1')->all();
        if ($user_id&&$user_id != -1) { 
            $user = Account::find()->where('user_id =' . $user_id)->one();
        }
        return $this->render('index', array(
                    'user' => $user,
                    'integral_cate' => $integral_cate,
                    'user_id' => $user_id,
                    'imei' => $imei,
                    'access_token' => $access_token,
                    'banner'=>$banner,
                    'language'=>$language,
        ));
    }

    public function actionHistory() {
        $user_id = isset($_GET['user_id'])?$_GET['user_id']:-1;
        $imei = isset($_GET['imei'])?$_GET['imei']:-1;
        $access_token =  isset($_GET['access_token'])?$_GET['access_token']:null;
        $language =  isset($_GET['language'])?$_GET['language']:'en_US';
        $record = Integralrecord::find()->where("user_id={$user_id}")->orderBy('buy_time desc')->all();
        return $this->render('history',[
            'record'=>$record,
            'user_id'=>$user_id,
            'imei'=>$imei,
            'access_token'=>$access_token,
            'language'=>$language,
        ]);
    }

    public function actionDetail() {
        $id =$_GET['id'];
        $user_id = isset($_GET['user_id'])?$_GET['user_id']:null;
        $imei = isset($_GET['imei'])?$_GET['imei']:null;
        $access_token =  isset($_GET['access_token'])?$_GET['access_token']:null;
        $language =  isset($_GET['language'])?$_GET['language']:'en_US';
        $Integral = Integral::find()->where("id = {$id}")->one();
        return $this->render('detail',[
            'Integral'=>$Integral,
            'user_id'=>$user_id,
            'imei'=>$imei,
            'access_token'=>$access_token,
            'id'=>$id,
            'language'=>$language,
        ]);
    }

    public function actionExchange() {
        $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : null;
        $imei = isset($_GET['imei']) ? $_GET['imei'] : null;
        $access_token = isset($_GET['access_token']) ? $_GET['access_token'] : null;
        $giftId = isset($_GET['giftId']) ? $_GET['giftId'] : null;
        $jsonArray = array('user_id' => $user_id, 'imei' => $imei, 'access_token' => $access_token, 'giftId' => $giftId);
//        $url = 'http://wifitest.enmonet.com/v1/web/exchange';
//        var_dump(json_encode($jsonArray));die;
        $host = Yii::$app->request->hostInfo;
        if ($host == "http://wifiweb.enmonet.com") {
            $url = 'http://wifitest.enmonet.com/v1/web/exchange';
        } elseif ($host == "http://wifiop.enmonet.com") {
            $url = 'http://wifi.enmonet.com/v1/web/exchange';
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonArray);
        $result = curl_exec($ch);
        return $result;
    }

}

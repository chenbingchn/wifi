<?php

namespace app\controllers;

use app\models\Banner;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Article;
use app\models\Integral;
use app\models\SignupForm;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\FindContent;
use app\models\Mainclass;
use app\models\Categorys;
use app\models\Account;
use app\models\Events;
use app\models\Useridscorelimit;
use app\models\Scorelimitconfig;
use app\models\Imeiscorelimit;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
					[
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
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

    public function actionIndex()
    {
        return $this->render('newindex');
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

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
	
	public function actionSignup()
    {
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

//    public function actionPoins_mall()
//    {
//        $row=Integral::find()->all();
//
//        return $this->renderPartial('Poins_mall',['row'=>$row]);
//    }

    public function actionEarn_poins()
    {
        $base_url = 'http://wifipage.enmonet.com/site/earn_poins?';
        $params = [
            'language' => isset($_GET['language']) ? $_GET['language'] : '',
            'id' => isset($_GET['id']) ? $_GET['id'] : '',
            'imei' => isset($_GET['imei']) ? $_GET['imei'] : '',
        ];
        $url = $base_url . http_build_query($params);
        header('Location: ' . $url, null, 301);
        Yii::$app->end();
    }

    public function actionFind()
    {
        if (isset($_GET['v']) && $_GET['v'] >= 208) {
            header('Location: http://wifipage.enmonet.com/site/discovery', null, 301);
            Yii::$app->end();
        } else {

            $class = Mainclass::find()->all();
            $categorys = Categorys::find()->all();
            $find = FindContent::find()->all();
            $show = FindContent::find()->where(['show' => 1])->all();
            $banners = Banner::find()->where(['type' => 2, 'state' => 1])->all();

            return $this->renderPartial('find', [
                'class' => $class,
                'categorys' => $categorys,
                'find' => $find,
                'show' => $show,
                'banners' => $banners,
            ]);
        }
    }

    public function actionControl()
    {
        return $this->renderPartial('control');
    }

    public function actionEladies()
    {
        header('Location: http://wifipage.enmonet.com/site/eladies', null, 301);
        Yii::$app->end();
    }

    public function actionShow()
    {
        return $this->renderPartial('show');
    }
    
    public function actionGuidance(){
        $base_url = 'http://wifipage.enmonet.com/site/guidance?';
        $params = [
            'language' => isset($_GET['language']) ? $_GET['language'] : ''
        ];
        $url = $base_url . http_build_query($params);
        header('Location: ' . $url, null, 301);
        Yii::$app->end();
    }
}

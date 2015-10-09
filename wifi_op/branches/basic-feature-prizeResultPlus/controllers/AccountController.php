<?php

namespace app\controllers;

use Yii;
use app\models\Account;
use app\models\search\AccountSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UseridHotspot;
use yii\data\ActiveDataProvider;
use app\models\ScoreRecord;
use app\models\Integralrecord;
use app\models\DataForm;
use app\models\Hotspot;
use app\components\TController;

/**
 * AccountController implements the CRUD actions for Account model.
 */
class AccountController extends TController {

//    public function behaviors() {
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
     * Lists all Account models.
     * @desc 用户信息列表
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
     * @desc 用户wifi分享列表
     */
    public function actionHistory($id) {
        $query = UseridHotspot::find()->andFilterWhere(['=', 'user_id', $id])->orderBy('created_at desc');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pagesize' => '10',
            ]
        ]);
        return $this->render('history', [
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @desc 用户获取积分信息
     */
    public function actionGetscorehistory($id) {
        $query = ScoreRecord::find();
        if($id!='null'){
            $query->andFilterWhere(['=', 'user_id', $id]);
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pagesize' => '10',
            ]
        ]);
        return $this->render('get_score_history', [
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @desc 用户兑换积分信息
     */
    public function actionSpendscorehistory($id) {
        $query = Integralrecord::find();
        if($id!='null'){
            $query->andFilterWhere(['=', 'user_id', $id]);
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pagesize' => '10',
            ]
        ]);
        return $this->render('spend_score_history', [
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @desc 积分流水列表
     */
    public function actionScorestream() {
        $model = new DataForm();
        $model->load(Yii::$app->request->get());
        $spendUser = Integralrecord::getSpendUserByDate($model->start,$model->end);
        $getScoreUser = ScoreRecord::getEarnUserByDate($model->start,$model->end);
        $user = array_merge($spendUser, $getScoreUser);
        function ArrayUnique($array) {
            $return = array();
            foreach ($array as $v) {
                if (!in_array($v, $return)) {
                    $return[] = $v;
                }
            }
            return $return;
        }

        $user = ArrayUnique($user);
        $conditionUser = array();
        foreach ($user as $v) {
            $conditionUser[] = $v['user_id'];
        }
        $query = Account::find()->Where(['in', 'user_id', $conditionUser]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pagesize' => '10',
                'params'=>[
                    'DataForm'=>isset($_GET['DataForm'])?$_GET['DataForm']:null,
                    'page'=>isset($_GET['page'])?$_GET['page']:null,
                ]
            ]
        ]);
        return $this->render('scorestream', [
                    'dataProvider' => $dataProvider,
                    'model'=>$model
        ]);
    }
    
    /**
     * @desc Wifi列表
     */
    public function actionWifi(){
        $username = isset($_GET['user_name'])?$_GET['user_name']:null; 
        $bssid = isset($_GET['bssid'])?$_GET['bssid']:null; 
        $phone = isset($_GET['phone'])?$_GET['phone']:null;  
        $imei = isset($_GET['imei'])?$_GET['imei']:null;  
        $wifi_name = isset($_GET['wifi_name'])?$_GET['wifi_name']:null;  
        $start_time = isset($_GET['start_time'])?$_GET['start_time']:null;  
        $end_time = isset($_GET['end_time'])?$_GET['end_time']:null;  
        $source = isset($_GET['source'])?$_GET['source']:null;  
        $wifi_type = isset($_GET['wifi_type'])?$_GET['wifi_type']:"";  
        $flag =  isset($_GET['flag'])?$_GET['flag']:"";  
        $query  = Hotspot::find()->joinWith('user')->orderBy('last_shared_at desc')->andFilterWhere(['=','hotspot.source',(int)$source])->andFilterWhere(['like','user_name',$username])
                        ->andFilterWhere(['like','phone_number',$phone])->andFilterWhere(['like','hotspot.imei',$imei])->andFilterWhere(['like','ssid',$wifi_name])->andFilterWhere(['=','bssid',$bssid])
                        ->andFilterWhere(['>','last_shared_at',$start_time])->andFilterWhere(['<','last_shared_at',$end_time]);
        if($flag!=""){
             $query->andFilterWhere(['=','hotspot.flag',$flag]);
        }
        if($wifi_type!=""){
            $query->andFilterWhere(['=','hotspot.type',$wifi_type]);
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,]);
        return $this->render('shareWifi', [
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
    
    /**
     * @desc 用户信息导出到excel
    */
    public function actionExport(){
        $users = Account::find()->asArray()->all();
        $this->buildExcelFile($users);
    }
    
    private function buildExcelFile($data) {
        $phpExcelPath = Yii::getAlias('@vendor') . DIRECTORY_SEPARATOR . 'PHPExcel';
        require_once $phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php';
        $objPHPExcel = new \PHPExcel();
        $objPHPExcel->getProperties()->setCreator("enmonet.com")
                ->setLastModifiedBy("enmonet.com")
                ->setTitle("用户信息")
                ->setSubject("用户信息")
                ->setDescription("用户信息")
                ->setKeywords("用户信息")
                ->setCategory("用户信息");
        // Set Headers
        $header = [];
        $first_row = reset($data);
        foreach ($first_row as $k => $v) {
            $header[] = $k;
        }
        array_unshift($data, $header);
        // Write file with Array and force them be String values.
        $objPHPExcel->getActiveSheet()->fromArray($data, null, 'A1');

        // Excel打开后显示的工作表
        $objPHPExcel->setActiveSheetIndex(0);

        //通浏览器输出Excel报表
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="用户信息' . date('Y_m_d_H_i_s') . '.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }

}

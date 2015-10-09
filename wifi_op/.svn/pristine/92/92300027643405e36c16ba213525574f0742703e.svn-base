<?php
namespace app\Controllers;

use app\models\Wifidata;
use Yii;
use app\models\DataForm;
use app\models\Userwifidata;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use app\models\Opstandarddata;
use app\models\Updatawifi;
use app\models\GetTime;
use yii\db\Query;
use yii\data\ActiveDataProvider;

class DataController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup','index','examination','show','through','defeat','reset','failure','approved'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'signup','index','examination','show','through','defeat','reset','failure','approved'],
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

    public function actionExamination(){
        $query =Userwifidata::find()->joinWith('orders')->andFilterWhere(['>', 'user_wifi_data.flag', '0'])->orderBy('user_id')->orderBy('last_change_at desc');
         $dataProvider = new ActiveDataProvider([
            'query' => $query,
            ]);
        return $this->render('examination', [
            'dataProvider'=>$dataProvider,
        ]);
    }

    public function actionShow()
    {
        $bssid=$_GET['bssid'];
        $query =Userwifidata::find()->joinWith('orders')->where(['wifi_data.bssid'=> $bssid,'flag'=>'0']);
        $pagination = new Pagination([
            'defaultPageSize' => 4,
            'totalCount' => $query->count(),
        ]);
        $Article = $query->orderBy('dataid')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->orderBy('created_at desc')
            ->all();
        return $this->render('show', [
            'Article'=>$Article,
            'pagination' => $pagination,
        ]);
    }

    /**
     * 审核通过的更新条件语句
     */
    public function actionThrough()
    {
        if ($_GET['id'] != NULL) {

            $id=$_GET['id'];
            $through= Userwifidata::find()->where(['dataid'=>$id])->one();
            $type=Wifidata::find()->where(['id'=>$id])->one();
            $bill=new Opstandarddata();
            if(!\Yii::$app->user->isGuest){
                $username=Yii::$app->user->identity->username;
            }else{
                $username='';
            }

            $updata= new Updatawifi();
            $updata_id=$updata->savet($id);

            $admin=$username;
            $user_id=$through->user_id;
            $wifiid=$through->dataid;
            $wifitype=$type->capabilities;
            $wifiautotype=$type->wifi_type;

            $bill->admin_account = $admin;
            $bill->user_id = $user_id;
            $bill->dataid = $wifiid;
            $bill->history_id=$updata_id;
            $bill->type=$wifitype;
            $bill->auto_type=$wifiautotype;
            $bill->pay='0';
            $bill->save();



            $through->flag = '1';
            $through->last_change_at=date('Y-m-d H:i:s',time());
            $through->update();
            $bid=$through->bssid;

//            return $this->redirect(['show',
//                'bssid'=>$bid,
//            ]);
              return "ok";
        } else {
//            return $this->redirect(['index']);
              return 'fail';
        }
    }

    /**
     * 审核没有通过的更新条件语句
     */
    public function actionDefeat()
    {
        if ($_GET['id'] != NULL) {

            $id=$_GET['id'];
            $user= Userwifidata::find()->where(['dataid'=>$id])->one();
            $user->flag = '2';
            $user->last_change_at=date('Y-m-d H:i:s',time());
            $user->reason =0;
            $user->update();
            $bssid=$user->bssid;

//            return $this->redirect(['show',
//                'bssid'=>$bssid,
//            ]);
              return "ok";
        } else {
//            return $this->redirect(['index']);
              return "fail";
        }
    }

    public function actionReset(){
        if ($_GET['id'] != NULL) {

            $id=$_GET['id'];
            $user= Userwifidata::find()->where(['dataid'=>$id])->one();
            $user->flag = '0';
            $user->last_change_at=date('Y-m-d H:i:s',time());
            $user->update();
            return "ok";
//            return $this->redirect(['examination']);
        } else {
            return "fail";   
//            return $this->redirect(['index']);
        }
    }

    public function actionFailure(){
        $query =Userwifidata::find()->joinWith('orders')
            ->andFilterWhere(['>', 'user_wifi_data.flag', '0'])
            ->where(['flag'=>'2'])->orderBy('user_id')->orderBy('last_change_at desc');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            ]);
        return $this->render('examination', [
            'dataProvider'=>$dataProvider,
        ]);
    }
    public function actionApproved(){
        $query =Userwifidata::find()->joinWith('orders')
            ->andFilterWhere(['>', 'user_wifi_data.flag', '0'])
            ->where(['flag'=>'1'])->orderBy('user_id')->orderBy('last_change_at desc');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            ]);
        return $this->render('examination', [
            'dataProvider'=>$dataProvider,
        ]);
    }
    
    public function actionIndex() {
        $model = new DataForm();
        if ($model->load(Yii::$app->request->get())) {
            $get = new Gettime();
            $start = $get->start_time($model->start, $model->hits);
            $end = $get->end_time($model->end, $model->hits);
            if (!$model->flag) {
                $model->flag = 0;
            }
           $query = Userwifidata::find()->joinWith('orders')->joinWith('user')->joinWith('hotspot')->where(['user_wifi_data.flag' => $model->flag])->andFilterWhere(['like', 'account.user_name', $model->user_id])
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
        } else {
            $model->flag =0;
            $query = Userwifidata::find()->joinWith('orders')->joinWith('hotspot')->where(['user_wifi_data.flag' => $model->flag]);
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
        return $this->render('index', [
                    'model' => $model,
                    'test' => $Article,
                    'pagination' => $pagination,
        ]);
    }
    
    public function actionExport() {
        if (Yii::$app->request->get()) {
            $ids = $_GET['selection'];
            $ids = explode(',', $ids);
            $rows = array();
            foreach($ids as $v){
               $match =  explode('-', $v);
//               var_dump($match);die;
               $query = new Query();
               $query->select([
                    'user_id',
                    't2.bssid',
                    't2.ssid',
                    't2.shop_name',
                    't2.city',
                    't2.wifi_type',
                    'flag',
                    't1.created_at',
                    'wifi_ping',
                ])->from('user_wifi_data t1')
                ->leftJoin('wifi_data t2', 't1.dataid=t2.id')->Where("t1.user_id = $match[0] and t1.bssid = '$match[1]' ");
               $row = $query->one();
               if($row['flag']==0){
                   $row['flag'] ='审核中';
               }elseif($row['flag']==1){
                   $row['flag'] ='已通过审核';
               }else{
                   $row['flag'] ='未通过审核';
               }
               $rows[] = $row;
            }
            if (!empty($rows)) {
                $this->buildExcelFile($rows);
            } else {
                throw new NotFoundHttpException('No data items found.');
            }
        }
    }
    
    private function buildExcelFile($data) {
        $phpExcelPath = Yii::getAlias('@vendor') . DIRECTORY_SEPARATOR . 'PHPExcel';
        require_once $phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php';
        $objPHPExcel = new \PHPExcel();
        $objPHPExcel->getProperties()->setCreator("enmonet.com")
                ->setLastModifiedBy("enmonet.com")
                ->setTitle("分享wifi热点")
                ->setSubject("分享wifi热点")
                ->setDescription("分享wifi热点")
                ->setKeywords("分享wifi热点")
                ->setCategory("分享wifi热点");
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
        header('Content-Disposition: attachment;filename="分享wifi热点_' . date('Y_m_d_H_i_s') . '.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }

}

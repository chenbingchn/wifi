<?php

namespace app\Controllers;

use Yii;
use app\models\Opstandarddata;
use app\models\search\OpstandarddataSearch;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Wifidata;

/**
 * OpstandarddataController implements the CRUD actions for Opstandarddata model.
 */
class OpstandarddataController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup','index','view','create','update','delete', 'export'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout','index','view','create','update','delete', 'export'],
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
     * Lists all Opstandarddata models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OpstandarddataSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Opstandarddata model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Opstandarddata model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Opstandarddata();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Opstandarddata model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Opstandarddata model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $del=Opstandarddata::findOne($id);
        $date=$del->history_id;
        Wifidata::findOne($date)->delete();
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Opstandarddata model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Opstandarddata the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Opstandarddata::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionShow(){
        if (Yii::$app->request->post()) {
            $ids=$_POST['selection'];
            foreach($ids as $k=>$v){
                $updata=Opstandarddata::find()->where(['id'=>$v])->one();
                $updata->pay='1';
                $updata->update();
            }
        }
    }

    public function actionExport() {
        if (Yii::$app->request->get()) {
            $ids = $_GET['selection'];
            $ids = explode(',', $ids);
            $query = new Query();
            $query->select([
                't1.user_id',
                'dataid',
                'pay',
                'history_id',
                'bssid',
                'ssid',
                'shop_name',
                'city',
                'address',
                't2.type',
                'capabilities',
                'created_at',
                'last_change_at',
                'wifi_type',
                'latitude',
                'longitude',
                'pic_latitude',
                'pic_longitude'
            ])->from('op_standard_data t1')
                ->leftJoin('wifi_data t2', 't1.history_id=t2.id')
                ->where(['in', 't1.id', $ids])->limit(20);
            $rows = $query->all();
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
                    ->setTitle("用户流水账")
                    ->setSubject("用户流水账")
                    ->setDescription("用户流水账")
                    ->setKeywords("用户流水账")
                    ->setCategory("用户流水账");
        // Set Headers
        $header = [];
        $first_row = reset($data);
        foreach ($first_row as $k=>$v) {
            $header[] = $k;
        }
        array_unshift($data, $header);
        // Write file with Array and force them be String values.
        $objPHPExcel->getActiveSheet()->fromArray($data, null, 'A1');

        // Excel打开后显示的工作表
        $objPHPExcel->setActiveSheetIndex(0);

        //通浏览器输出Excel报表
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="用户流水账_' . date('Y_m_d_H_i_s') . '.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }
}

<?php

namespace app\controllers;

use app\services\AccountBookStatistics;
use sevenUtils\utils\TimeStamp;
use Yii;
use app\models\AccountBook;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Application;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * AccountBookController implements the CRUD actions for AccountBook model.
 */
class AccountBookController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all AccountBook models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => AccountBook::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AccountBook model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AccountBook model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AccountBook();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AccountBook model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AccountBook model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        exit('forbidden');
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AccountBook model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AccountBook the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AccountBook::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionStatisticsPay()
    {
        $amount = (float)AccountBookStatistics::getInstance()->statisticsPay(); //统计所有的
        \yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'code' => 0,
            'amount' => $amount
        ];
    }

    public function actionStatisticsRevenue()
    {
        $amount = (float)AccountBookStatistics::getInstance()->statisticsRevenue();
        \yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'code' => 0,
            'amount' => $amount
        ];
    }

    public function actionStatisticsCurrentMonthPay()
    {
        //获得当前月的开始时间
        $timeStart = TimeStamp::getInstance()->getCurrentMonthStartUnixTime();
        $timeEnd = TimeStamp::getInstance()->getCurrentMonthEndUnixTime();
        $amount = (float)AccountBookStatistics::getInstance()->statisticsPay($timeStart, $timeEnd);
        \yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'code' => 0,
            'amount' => $amount
        ];
    }

    public function actionStatisticsCurrentMonthRevenue()
    {
        $timeStart = TimeStamp::getInstance()->getCurrentMonthStartUnixTime();
        $timeEnd = TimeStamp::getInstance()->getCurrentMonthEndUnixTime();
        $amount = (float)AccountBookStatistics::getInstance()->statisticsRevenue($timeStart, $timeEnd);
        \yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'code' => 0,
            'amount' => $amount
        ];
    }
}

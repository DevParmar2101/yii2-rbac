<?php

namespace backend\controllers;

use Yii;
use common\models\UserChannel;
use common\models\UserChannelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserChannelController implements the CRUD actions for UserChannel model.
 */
class UserChannelController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all UserChannel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserChannelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserChannel model.
     * @param int $channel_id Channel ID
     * @return mixed
     */
    public function actionView($channel_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($channel_id),
        ]);
    }

    /**
     * Creates a new UserChannel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserChannel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'channel_id' => $model->channel_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing UserChannel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $channel_id Channel ID
     * @return mixed
     */
    public function actionUpdate($channel_id)
    {
        $model = $this->findModel($channel_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'channel_id' => $model->channel_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing UserChannel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $channel_id Channel ID
     * @return mixed
     */
    public function actionDelete($channel_id)
    {
        $this->findModel($channel_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserChannel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $channel_id Channel ID
     * @return UserChannel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($channel_id)
    {
        if (($model = UserChannel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

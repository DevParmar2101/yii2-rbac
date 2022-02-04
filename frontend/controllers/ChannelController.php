<?php

namespace frontend\controllers;

use common\models\UserChannel;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Channel Controller
 */
class ChannelController extends Controller
{

    public function actionChannelList()
    {
        $channel_list = new ActiveDataProvider([
            'query' => UserChannel::find()->where(['user_id' => Yii::$app->user->identity->id])
        ]);

        return $this->render('channel-list',[
            'channel_list' => $channel_list
        ]);
    }

    public function actionOverview($channel_id)
    {
        $channel_detail = $this->findModel($channel_id);

        return $this->render('overview',[
            'channel_detail' => $channel_detail,
        ]);
    }
    public function actionEdit($channel_id)
    {
        $model = $this->findModel($channel_id);

        return $this->render('edit',[
            'model' => $model
        ]);
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
        if (($model = UserChannel::findOne($channel_id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
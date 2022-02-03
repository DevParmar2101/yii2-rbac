<?php

use yii\helpers\Html;

/* @var $web \yii\web\View*/
/* @var $model \common\models\UserChannel*/

?>
    <div class="card">
        <a href=""></a>
        <img class="card-img-top channel-list" src="<?= Yii::getAlias('@web/uploads/channel-profile/'.$model->channel_profile)?>"  alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"><?= $model->channel_name?></h5>
            <p class="card-text"><?= strlen($model->channel_bio) > 125 ? substr($model->channel_bio,0,125).'...':$model->channel_bio?></p>
            <a href="<?= \yii\helpers\Url::toRoute(['channel/overview','channel_uid' => $model->channel_id])?>" class="btn btn-sm btn-primary">
                View
            </a>
            <a href="<?= \yii\helpers\Url::toRoute(['channel/edit','channel_uid' => $model->channel_id])?>" class="btn btn-sm btn-primary">
                Edit
            </a>
        </div>
        <div class="card-footer">
            <small class="text-muted">Created at: <?= Yii::$app->formatter->asDate($model->created_at)?></small>
        </div>
    </div>

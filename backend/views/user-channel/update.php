<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserChannel */

$this->title = 'Update User Channel: ' . $model->channel_id;
$this->params['breadcrumbs'][] = ['label' => 'User Channels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->channel_id, 'url' => ['view', 'channel_id' => $model->channel_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-channel-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\UserChannel */

$this->title = $model->channel_id;
$this->params['breadcrumbs'][] = ['label' => 'User Channels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-channel-view box box-primary">
    <div class="box-header">
        <?= Html::a('Update', ['update', 'channel_id' => $model->channel_id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('Delete', ['delete', 'channel_id' => $model->channel_id], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'channel_id',
                'user_id',
                'channel_name',
                'channel_category',
                'channel_sub_category',
                'channel_bio:ntext',
            ],
        ]) ?>
    </div>
</div>

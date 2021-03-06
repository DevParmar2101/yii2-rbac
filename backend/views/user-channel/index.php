<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserChannelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Channels';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-channel-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a('Create User Channel', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'channel_name',
                [
                        'attribute' => 'channel_category',
                        'value' => function($model){
                            return $model->category->category;
                        }
                ],
                [
                        'attribute' => 'channel_sub_category',
                        'value' => function($model){
                            return $model->sub->sub_category;
                        }
                ],

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>

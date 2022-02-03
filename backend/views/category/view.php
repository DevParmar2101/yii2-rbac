<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Category */

$this->title = $model->category;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view box box-primary">
    <div class="box-header">
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Back',['category/index'],['class' => 'btn btn-warning btn-flat'])?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [

                'category',
                [
                        'attribute' => 'status',
                        'value' => function($model) {
                            if ($model->status == \common\models\Category::ACTIVE) {
                                return \common\models\Category::STATUS_ACTIVE;
                            }else {
                                return \common\models\Category::STATUS_INACTIVE;
                            }
                        }
                ],
                'created_at',
            ],
        ]) ?>
    </div>
</div>

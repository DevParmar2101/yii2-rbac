<?php

/* @var $this \yii\web\View */
/* @var $form \yii\bootstrap4\ActiveForm */
/* @var $model \common\models\UserChannel */

$this->title = 'Create Your Channel';

use common\models\UserChannel;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
?>

<div class="site-channel">
    <h3><?= Html::encode($this->title) ?></h3>

    <?php $form = ActiveForm::begin(['id' => 'use-channel']) ?>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model,'channel')?>
        </div>
    </div>
</div>

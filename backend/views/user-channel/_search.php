<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserChannelSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-channel-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'channel_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'channel_name') ?>

    <?= $form->field($model, 'channel_category') ?>

    <?= $form->field($model, 'channel_sub_category') ?>

    <?php // echo $form->field($model, 'channel_bio') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

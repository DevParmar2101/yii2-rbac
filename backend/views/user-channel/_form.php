<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserChannel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-channel-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'user_id')->textInput() ?>

        <?= $form->field($model, 'channel_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'channel_category')->textInput() ?>

        <?= $form->field($model, 'channel_sub_category')->textInput() ?>

        <?= $form->field($model, 'channel_bio')->textarea(['rows' => 6]) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>

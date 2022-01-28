<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="user-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>

    <div class="box-body table-responsive">
        <div class="row-lg">

            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <?= $form->field($model,'first_name')->textInput(['class' => 'form-control w-100']) ?>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <?= $form->field($model,'last_name')->textInput(['class' => 'form-control w-100']) ?>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <?= $form->field($model,'dob')->widget(\kartik\date\DatePicker::class,[
                    'type' => \kartik\date\DatePicker::TYPE_COMPONENT_APPEND,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd-M-yyyy'
                    ]
                ]); ?>
            </div>

        </div>

        <div class="row-lg">

            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <?= $form->field($model,'username')->textInput(['class' => 'form-control w-100']); ?>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <?= $form->field($model,'email')->textInput(['class' => 'form-control w-100']); ?>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <?= $form->field($model,'role')->dropDownList($model->getList()); ?>
            </div>

        </div>

        <div class="row-lg">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <?= $form->field($model,'password')->passwordInput(['class' => 'form-control w-100']); ?>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <?= $form->field($model,'confirm_password')->passwordInput(['class' => 'form-control w-100']); ?>
            </div>
        </div>

    </div>

    <div class="box-footer">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-danger']) ?>
        <?= Html::a(Yii::t('app', 'Back'),['index'], ['class' => 'btn btn-warning']) ?>

    </div>

    <?php ActiveForm::end(); ?>
</div>

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

    <?php $form = ActiveForm::begin(['id' => 'user-channel']) ?>

    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model,'channel_name')->textInput()?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model,'channel_category')->dropdownList(
                    \yii\helpers\ArrayHelper::map(\common\models\Category::find()->where(['status' => \common\models\Category::ACTIVE])->all(),'id' ,'category'),
                [
                        'prompt' => 'Select Category ...',
                        'onchange' => '
                        $.post("lists?id='.'"+$(this).val(), function( data ) {
                    $("select#userchannel-channel_sub_category").html( data );
                });'
                ]
            )?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model,'channel_sub_category')->dropdownList(
                    \yii\helpers\ArrayHelper::map(\common\models\SubCategory::find()->all(),'id','sub_category'),
                [
                        'prompt' => 'Select Sub Category...',
                ]
            ) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model,'channel_bio')->textarea(['rows' => 10]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model,'status')->dropdownList($model->status())?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model,'channel_profile')->fileInput() ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

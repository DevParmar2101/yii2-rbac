<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $model \common\models\UserChannel*/
$this->title = 'Edit Channel Detail';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="channel-edit">
    <h2><?= Html::encode($this->title.' :- '.$model->channel_name)?></h2>


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
            <?= $form->field($model,'channel_banner')->widget(\kartik\file\FileInput::class,[

                    'pluginOptions' => [
                        'initialPreviewAsData' => true,
                        'initialPreview' => Yii::getAlias('@web/uploads/channel-banner/'.$model->channel_banner),
                        'showPreview' =>true,
                        'showCaption' => false,
                        'showRemove' => false,
                        'showCancel' => false,
                        'showUpload' => false,
                    ],
            ])?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model,'channel_profile')->widget(\kartik\file\FileInput::class,[

                'pluginOptions' => [
                    'initialPreviewAsData'=>true,
                    'initialPreview' => Yii::getAlias('@web/uploads/channel-profile/'.$model->channel_profile),
                    'showPreview' => true,
                    'showCaption' => false,
                    'showRemove' => false,
                    'showCancel' => false,
                    'showUpload' => false,
                ],
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model,'status')->dropdownList($model->status())?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

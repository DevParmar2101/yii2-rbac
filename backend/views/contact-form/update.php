<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ContactForm */

$this->title = 'Update Contact Form: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Contact Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contact-form-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UserChannel */

$this->title = 'Create User Channel';
$this->params['breadcrumbs'][] = ['label' => 'User Channels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-channel-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>

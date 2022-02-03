<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $web \yii\web\View */
/* @var $channel_list*/

$this->title = 'Channel Lists';
?>
<div class="card-deck">
    <div class="row">

        <?=
        \yii\widgets\ListView::widget([
            'dataProvider' => $channel_list,
            'itemView' => '_channel_list',

            'itemOptions' => [
                'class' => 'col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12'
            ],

            'options' => [
                'tag' => false,
            ],
            'layout' => "{items}\n<div class='full_width paginationn'>{pager}</div>",
            'emptyText' => '<div class="empty">'.'No Results Found !'.'</div>',
            'summary' => '',
            'pager' => [
                'prevPageLabel' => '<span class="lnr lnr-chevron-left"></span>',
                'nextPageLabel' => '<span class="lnr lnr-chevron-right"></span>',
                'maxButtonCount' => 4,
            ],
        ]);
        ?>
    </div>
</div>

<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
if (!Yii::$app->user->isGuest) {
    $user = \common\models\User::findOne(['id' => Yii::$app->user->identity->id]);
}
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle align-left" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= Yii::getAlias('@web/admin/img/user2-160x160.jpg') ?>" class="user-image" alt="User Image"/>
                        <span class="hidden-xs">
                            <?= $user->username?>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= Yii::getAlias('@web/admin/img/user2-160x160.jpg') ?>" class="img-circle"
                                 alt="User Image"/>

                            <p>
                                <?= $user->username?>
                                <small>Member since <?= Yii::$app->formatter->asDate($user->created_at)?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

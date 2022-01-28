<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><?= Yii::$app->name ?></a>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= \yii\helpers\Url::toRoute('/')?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= \yii\helpers\Url::toRoute('/site/about')?>">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= \yii\helpers\Url::toRoute('/site/contact')?>">Contact Us</a>
                    </li>
                </ul>
                <?php if (Yii::$app->user->isGuest) {?>
                    <div class="navbar-text">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= \yii\helpers\Url::toRoute('/site/signup')?>">Signup</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= \yii\helpers\Url::toRoute('/site/login')?>">Login</a>
                            </li>
                        </ul>
                    </div>
                <?php }else{?>
                    <div class="navbar-text">
                        <div class="dropdown">

                            <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                                <?= Yii::$app->user->identity->username?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item text-dark" href="#">Action</a>
                                <a class="dropdown-item text-dark" href="#">Another action</a>
                                <a class="dropdown-item text-dark" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </nav>
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer class="footer mt-auto py-3 text-muted">
        <div class="container">
            <p class="float-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
            <p class="float-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();

<?php
?>

<aside class="main-sidebar">

    <section class="sidebar">
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'User', 'icon' => 'arrow-right', 'url' => ['/user']],
                    ['label' => 'Contact Form', 'icon' => 'arrow-right', 'url' => ['/contact-form']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Users Channel', 'icon' => 'arrow-right', 'url' => ['/user-channel']],
                    ['label' => 'Category', 'icon' => 'arrow-right', 'url' => ['/category']],
                    ['label' => 'Sub Category', 'icon' => 'arrow-right', 'url' => ['/sub-category']]
                ],
            ]
        ) ?>

    </section>

</aside>

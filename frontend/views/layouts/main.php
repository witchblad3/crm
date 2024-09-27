<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

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
    <style>
        .sidebar {
            width: 170px;
            background-color: #343a40;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            padding-top: 60px;
            overflow-y: auto;
            transition: width 0.3s ease;
        }

        .sidebar ul {
            padding: 0;
            list-style: none;
        }

        .sidebar ul li {
            padding: 10px 20px;
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .sidebar ul li a .icon {
            margin-right: 10px;
        }

        .navbar {
            margin-left: 170px;
            transition: margin-left 0.3s ease;
            background-color: #007bff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .main-content {
            margin-left: 250px;
            transition: margin-left 0.3s ease;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #fff;
        }

        .navbar-nav .nav-link {
            color: #fff;
            font-size: 1rem;
        }

        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
        }

        .container {
            padding-top: 60px;
        }
    </style>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => 'CRM System',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-light fixed-top',
            'style' => 'background-color: #E9ECEF; padding: 10px 20px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); top:-65px;margin-right: 170px;',
        ],
        'brandOptions' => [
            'style' => 'font-weight: bold; font-size: 1.5rem; color: #457B9D;',
        ],
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
    ]);

    if (!Yii::$app->user->isGuest) {
        echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
            . Html::submitButton(
                'Выйти (' . Yii::$app->user->identity->username . ')',
                [
                    'class' => 'btn btn-outline-light',
                    'style' => 'background-color: #A8DADC; color: white; border-radius: 8px; padding: 10px 20px; font-weight: 500;',
                    'onmouseover' => "this.style.backgroundColor='#457B9D'; this.style.color='white';",
                    'onmouseout' => "this.style.backgroundColor='#A8DADC'; this.style.color='white';",
                ]
            )
            . Html::endForm();
    }
    NavBar::end();
    ?>
</header>

<?php if (!Yii::$app->user->isGuest): ?>
    <aside class="sidebar">
        <ul>
            <li><a href="/"><span class="icon">&#128200;</span>Главная</a></li>
            <li><a href="<?= Yii::$app->urlManager->createUrl(['/user/index']); ?>"><span class="icon">&#128101;</span> Пользователи</a></li>
            <li><a href="<?= Yii::$app->urlManager->createUrl(['/application/index']); ?>"><span class="icon">&#128179;</span> Заявки</a></li>
        </ul>
    </aside>
<?php endif; ?>

<main class="main-content flex-shrink-0" style="<?= Yii::$app->user->isGuest ? 'margin-left: 0;' : 'margin-left: 170px;' ?>">
    <div class="container">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

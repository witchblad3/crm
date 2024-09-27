<?php
/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'CRM - Приветственная страница';
?>
<div class="site-index" style="min-height: 100vh; display: flex; flex-direction: column; justify-content: space-between;">
    <div class="welcome-container" style="text-align: center; padding: 100px 0;">
        <div class="welcome-header">
            <h1 style="font-size: 3.5rem; font-weight: 600; color: #2C3E50;">Добро пожаловать в CRM</h1>
            <p style="font-size: 1.5rem; font-weight: 300; color: #7F8C8D;">Система для управления и реорганизации торговли</p>
        </div>

        <?php if (!Yii::$app->user->isGuest): ?>
            <div class="navigation-buttons" style="margin-top: 40px; display: flex; justify-content: center; gap: 20px;">
                <?= Html::a('<span class="icon">&#128101;</span> Пользователи', ['/user/index'], [
                    'class' => 'btn btn-lg',
                    'style' => 'background-color: #F4A261; color: white; padding: 15px 30px; font-size: 1.2rem; border-radius: 8px; text-decoration: none; display: flex; align-items: center; justify-content: center; gap: 10px; transition: background-color 0.3s ease;',
                    'onmouseover' => "this.style.backgroundColor='#E76F51'",
                    'onmouseout' => "this.style.backgroundColor='#F4A261'"
                ]) ?>

                <?= Html::a('<span class="icon">&#128179;</span> Заявки', ['/application/index'], [
                    'class' => 'btn btn-lg',
                    'style' => 'background-color: #BFD200; color: white; padding: 15px 30px; font-size: 1.2rem; border-radius: 8px; text-decoration: none; display: flex; align-items: center; justify-content: center; gap: 10px; transition: background-color 0.3s ease;',
                    'onmouseover' => "this.style.backgroundColor='#84A100'",
                    'onmouseout' => "this.style.backgroundColor='#BFD200'"
                ]) ?>

                <?= Html::a('<span class="icon">&#128202;</span> Отчеты', ['#'], [
                    'class' => 'btn btn-lg',
                    'style' => 'background-color: #A0C4FF; color: white; padding: 15px 30px; font-size: 1.2rem; border-radius: 8px; text-decoration: none; display: flex; align-items: center; justify-content: center; gap: 10px; transition: background-color 0.3s ease;',
                    'onmouseover' => "this.style.backgroundColor='#72A0FF'",
                    'onmouseout' => "this.style.backgroundColor='#A0C4FF'"
                ]) ?>
            </div>

        <?php else: ?>
            <div class="navigation-buttons" style="margin-top: 40px; display: flex; justify-content: center; gap: 20px;">
                <?= Html::a('Регистрация', ['/site/signup'], [
                    'class' => 'btn btn-lg',
                    'style' => 'background-color: #A8DADC; color: white; padding: 15px 30px; font-size: 1.2rem; border-radius: 8px; text-decoration: none; transition: background-color 0.3s ease;',
                    'onmouseover' => "this.style.backgroundColor='#457B9D'",
                    'onmouseout' => "this.style.backgroundColor='#A8DADC'"
                ]) ?>

                <?= Html::a('Войти', ['/site/login'], [
                    'class' => 'btn btn-lg',
                    'style' => 'background-color: #F4A261; color: white; padding: 15px 30px; font-size: 1.2rem; border-radius: 8px; text-decoration: none; transition: background-color 0.3s ease;',
                    'onmouseover' => "this.style.backgroundColor='#E76F51'",
                    'onmouseout' => "this.style.backgroundColor='#F4A261'"
                ]) ?>

                <?= Html::a('Оставить заказ', ['/application/create'], [
                    'class' => 'btn btn-lg',
                    'style' => 'background-color: #A0C4FF; color: white; padding: 15px 30px; font-size: 1.2rem; border-radius: 8px; text-decoration: none; transition: background-color 0.3s ease;',
                    'onmouseover' => "this.style.backgroundColor='#72A0FF'",
                    'onmouseout' => "this.style.backgroundColor='#A0C4FF'"
                ]) ?>
            </div>
        <?php endif; ?>
    </div>
</div>

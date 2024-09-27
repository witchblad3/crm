<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login" style="background-color: #f7f9fc; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); max-width: 400px; margin: auto;">
    <h1 style="color: #3a3a3a; text-align: center;"><?= Html::encode($this->title) ?></h1>

    <p style="color: #6c757d; text-align: center;">Пожалуйста, заполните следующие поля для входа:</p>

    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'style' => 'background-color: #ffffff; border: 1px solid #d1d1d1; border-radius: 5px;'])->label('Имя пользователя') ?>

    <?= $form->field($model, 'password')->passwordInput(['style' => 'background-color: #ffffff; border: 1px solid #d1d1d1; border-radius: 5px;'])->label('Пароль') ?>

    <?= $form->field($model, 'rememberMe')->checkbox(['style' => 'margin-top: 10px;'])->label('Запомнить меня') ?>

    <div class="form-group">
        <?= Html::submitButton('Войти', [
            'class' => 'btn btn-primary',
            'style' => 'background-color: #6c757d; border-color: #6c757d; transition: background-color 0.3s; width: 100%;',
            'name' => 'login-button'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

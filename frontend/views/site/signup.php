<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-signup" style="background-color: #f7f9fc; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); max-width: 400px; margin: auto;">
    <h1 style="color: #3a3a3a; text-align: center;"><?= Html::encode($this->title) ?></h1>

    <p style="color: #6c757d; text-align: center;">Пожалуйста, заполните следующие поля для регистрации:</p>

    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'username')->label('Имя пользователя')->textInput(['autofocus' => true, 'style' => 'background-color: #ffffff; border: 1px solid #d1d1d1; border-radius: 5px;']) ?>

            <?= $form->field($model, 'email')->label('Электронная почта')->textInput(['style' => 'background-color: #ffffff; border: 1px solid #d1d1d1; border-radius: 5px;']) ?>

            <?= $form->field($model, 'password')->label('Пароль')->passwordInput(['style' => 'background-color: #ffffff; border: 1px solid #d1d1d1; border-radius: 5px;']) ?>

            <div class="form-group">
                <?= Html::submitButton('Зарегистрироваться', [
                    'class' => 'btn btn-primary',
                    'style' => 'background-color: #6c757d; border-color: #6c757d; transition: background-color 0.3s; width: 100%;',
                    'name' => 'signup-button'
                ]) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

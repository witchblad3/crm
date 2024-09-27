<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var common\models\User $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Редактировать пользователя: ' . $model->email;
?>

<div class="user-update" style="background-color: #f7f9fc; padding: 30px; border-radius: 15px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); max-width: 500px; margin: auto;">
    <h1 style="color: #3a3a3a; text-align: center;"><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'style' => 'background-color: #ffffff; border: 1px solid #d1d1d1; border-radius: 5px;']) ?>

    <?= $form->field($model, 'status')->dropDownList([
        10 => 'Активен',
        9 => 'Неактивен',
    ], ['style' => 'background-color: #ffffff; border: 1px solid #d1d1d1; border-radius: 5px;']) ?>

    <?= $form->field($model, 'role')->dropDownList([
        'manager' => 'Менеджер',
        'admin' => 'Администратор',
    ], ['style' => 'background-color: #ffffff; border: 1px solid #d1d1d1; border-radius: 5px;']) ?>

    <div class="form-group text-center">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success', 'style' => 'background-color: #28a745; border-color: #28a745; padding: 10px 20px; font-weight: 600; border-radius: 5px;']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

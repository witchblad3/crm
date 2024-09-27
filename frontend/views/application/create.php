<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Создать заявку';
?>

<div class="application-form" style="background-color: #f9f9f9; padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); max-width: 400px; margin: auto;">
    <h1 style="color: #3a3a3a; text-align: center; margin-bottom: 20px;"><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group" style="margin-bottom: 15px;">
        <?= $form->field($model, 'client_name')->textInput([
            'maxlength' => true,
            'style' => 'background-color: #ffffff; border: 1px solid #d1d1d1; border-radius: 5px;'
        ])->label('Имя клиента', ['class' => 'form-label']) ?>
    </div>

    <div class="form-group" style="margin-bottom: 15px;">
        <?= $form->field($model, 'phone')->textInput([
            'maxlength' => true,
            'style' => 'background-color: #ffffff; border: 1px solid #d1d1d1; border-radius: 5px;'
        ])->label('Телефон', ['class' => 'form-label']) ?>
    </div>

    <div class="form-group" style="margin-bottom: 15px;">
        <?= $form->field($model, 'comment')->textarea([
            'rows' => 6,
            'style' => 'background-color: #ffffff; border: 1px solid #d1d1d1; border-radius: 5px;'
        ])->label('Комментарий', ['class' => 'form-label']) ?>
    </div>

    <div class="form-group" style="margin-bottom: 15px;">
        <?= $form->field($model, 'product_name')->dropDownList([
            'apple' => 'Яблоки',
            'orange' => 'Апельсины',
            'tangerine' => 'Мандарины',
        ], ['prompt' => 'Выберите товар', 'style' => 'background-color: #ffffff; border: 1px solid #d1d1d1; border-radius: 5px;']) ?>
    </div>

    <div class="form-group" style="margin-bottom: 15px;">
        <?= $form->field($model, 'price')->textInput([
            'type' => 'number',
            'min' => 0,
            'style' => 'background-color: #ffffff; border: 1px solid #d1d1d1; border-radius: 5px;'
        ])->label('Цена', ['class' => 'form-label']) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', [
            'class' => 'btn btn-success',
            'style' => 'background-color: #a8d8f0; border-color: #a8d8f0; border-radius: 5px; width: 100%;'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

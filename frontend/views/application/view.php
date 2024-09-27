<?php
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'История изменений заявки';
?>

<h1><?= Html::encode($this->title) ?></h1>

<?= GridView::widget([
    'dataProvider' => $historyDataProvider,
    'columns' => [
        [
            'attribute' => 'changed_at',
            'label' => 'Дата изменения',
        ],
        [
            'attribute' => 'changedByUser.username',
            'label' => 'Пользователь',
        ],
        [
            'attribute' => 'field_name',
            'label' => 'Имя поля',
        ],
        [
            'attribute' => 'old_value',
            'label' => 'Старое значение',
        ],
        [
            'attribute' => 'new_value',
            'label' => 'Новое значение',
        ],
    ],
]) ?>



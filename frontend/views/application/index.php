<?php
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Список заявок';

$productNames = [
    'apple' => 'Яблоки',
    'orange' => 'Апельсины',
    'tangerine' => 'Мандарины',
];

$statusNames = [
    'accepted' => 'Принята',
    'declined' => 'Отказана',
    'defective' => 'Брак',
];

?>

<h1><?= Html::encode($this->title) ?></h1>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'attribute' => 'client_name',
            'label' => 'Имя клиента',
        ],
        [
            'attribute' => 'product_name',
            'label' => 'Продукт',
            'value' => function($model) use ($productNames) {
                return $productNames[$model->product_name] ?? $model->product_name;
            },
        ],
        [
            'attribute' => 'phone',
            'label' => 'Телефон',
        ],
        [
            'attribute' => 'created_at',
            'label' => 'Дата создания',
            'format' => ['datetime'],
        ],
        [
            'attribute' => 'status',
            'label' => 'Статус',
            'value' => function($model) use ($statusNames) {
                return $statusNames[$model->status] ?? $model->status;
            },
        ],
        [
            'attribute' => 'comment',
            'label' => 'Комментарий',
        ],
        [
            'attribute' => 'price',
            'label' => 'Цена',
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
            'buttons' => [
                'history' => function ($url, $model, $key) {
                    return Html::a('<i class="fa fa-history" aria-hidden="true"></i>', $url, [
                        'title' => 'Посмотреть историю',
                        'aria-label' => 'Посмотреть историю',
                        'data-pjax' => '0',
                    ]);
                },
            ],
        ],
    ],
]) ?>

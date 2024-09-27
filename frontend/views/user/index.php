<?php
use yii\helpers\Html;

$this->title = 'Список пользователей';
?>

<div class="container mt-4">
    <h1 class="text-center mb-4" style="font-size: 2.5rem; color: #343a40; text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);"><?= Html::encode($this->title) ?></h1>

    <div class="table-responsive">
        <table class="table" style="border-collapse: collapse; width: 100%; margin-top: 20px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
            <thead style="background-color: #E9F5F5;">
            <tr>
                <th style="padding: 10px; text-align: left; border-bottom: 2px solid #B2E0E6;">Email</th>
                <th style="padding: 10px; text-align: left; border-bottom: 2px solid #B2E0E6;">Статус</th>
                <th style="padding: 10px; text-align: left; border-bottom: 2px solid #B2E0E6;">Роль</th>
                <th style="padding: 10px; text-align: left; border-bottom: 2px solid #B2E0E6;">Действия</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr style="border-bottom: 1px solid #E9E9E9;">
                    <td style="padding: 10px;"><?= Html::encode($user->email) ?></td>
                    <td style="padding: 10px;"><?= Html::encode($user->status == 10 ? 'Активен' : 'Неактивен') ?></td>
                    <td style="padding: 10px;"><?= Html::encode($user->role === "admin" ? 'Администратор' : 'Менеджер') ?></td>
                    <td style="padding: 10px;">
                        <?= Html::a('Редактировать', ['update', 'id' => $user->id], ['class' => 'btn btn-warning', 'style' => 'background-color: #F9C9A5; color: #2c3e50; border: none; border-radius: 5px; padding: 5px 10px; margin-right: 5px;']) ?>
                        <?= Html::a('Удалить', ['delete', 'id' => $user->id], [
                            'class' => 'btn btn-danger',
                            'style' => 'background-color: #F1A7A1; color: #2c3e50; border: none; border-radius: 5px; padding: 5px 10px;',
                            'data' => [
                                'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<style>

    .table {
        background-color: #ffffff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    .table th {
        background-color: #343a40;
        color: #ffffff;
        text-align: center;
    }
    .table td {
        vertical-align: middle;
    }
    .animated-status {
        animation: fadeIn 0.5s;
    }
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
</style>

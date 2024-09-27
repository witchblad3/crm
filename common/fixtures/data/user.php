<?php

use yii\helpers\Security;
use Faker\Factory;

$faker = Factory::create('ru_RU');

$users = [];

for ($i = 1; $i <= 50; $i++) {
    $users[] = [
        'id' => $i,
        'username' => $faker->userName,
        'auth_key' => Yii::$app->security->generateRandomString(),
        'password_hash' => Yii::$app->security->generatePasswordHash('password123'),
        'email' => $faker->email,
        'role' => 'manager',
        'status' => 10,
        'created_at' => time(),
        'updated_at' => time(),
    ];
}

return $users;

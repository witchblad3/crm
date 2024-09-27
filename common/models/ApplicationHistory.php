<?php

namespace common\models;

class ApplicationHistory extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'application_history';
    }

    public function getChangedByUser(): \yii\db\ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'changed_by']);
    }

}



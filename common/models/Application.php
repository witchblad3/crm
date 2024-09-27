<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "application".
 *
 * @property int $id
 * @property string $client_name
 * @property string $product_name
 * @property string $phone
 * @property string|null $comment
 * @property string|null $created_at
 * @property string $status
 * @property float|null $price
 */
class Application extends \yii\db\ActiveRecord
{


    const STATUS_ACCEPTED = 'accepted';
    const STATUS_DECLINED = 'declined';
    const STATUS_DEFECTIVE = 'defective';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'application';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_name', 'product_name', 'phone', 'comment'], 'required'],
            ['status', 'in', 'range' => [self::STATUS_ACCEPTED, self::STATUS_DECLINED, self::STATUS_DEFECTIVE]],
            [['price'], 'number'],
        ];
    }
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        foreach ($changedAttributes as $attribute => $oldValue) {
            $history = new ApplicationHistory();
            $history->application_id = $this->id;
            $history->changed_by = Yii::$app->user->id;
            $history->field_name = $attribute;
            $history->old_value = $oldValue;
            $history->new_value = $this->$attribute;
            $history->save();
        }
    }
}

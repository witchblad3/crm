<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%application}}`.
 */
class m240927_110433_create_application_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%application}}', [
            'id' => $this->primaryKey(),
            'client_name' => $this->string()->notNull(),
            'product_name' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'comment' => $this->text(),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'status' => "ENUM('accepted', 'declined', 'defective') NOT NULL DEFAULT 'accepted'",
            'price' => $this->decimal(10, 2),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%application}}');
    }
}

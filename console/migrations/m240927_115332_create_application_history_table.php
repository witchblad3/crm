<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%application_history}}`.
 */
class m240927_115332_create_application_history_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('application_history', [
            'id' => $this->primaryKey(),
            'application_id' => $this->integer()->notNull(),
            'changed_by' => $this->integer()->defaultValue(null),
            'changed_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'field_name' => $this->string()->notNull(),
            'old_value' => $this->text(),
            'new_value' => $this->text(),
        ]);

        $this->createIndex('idx-application_id', 'application_history', 'application_id');

        $this->addForeignKey(
            'fk-application_history-application_id',
            'application_history',
            'application_id',
            'application',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-application_history-changed_by',
            'application_history',
            'changed_by',
            'user',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-application_history-application_id', 'application_history');
        $this->dropForeignKey('fk-application_history-changed_by', 'application_history');
        $this->dropTable('application_history');
    }
}

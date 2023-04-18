<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payments}}`.
 */
class m230413_092551_create_payments_table extends Migration
{
    const TABLE_NAME = '{{%payment}}';
    
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'payment_id' => $this->primaryKey(),
            'payment' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->insert(self::TABLE_NAME, [
            'payment' => 2500,
        ]);

        $this->insert(self::TABLE_NAME, [
            'payment' => 1000,
        ]);

        $this->insert(self::TABLE_NAME, [
            'payment' => 3000,
        ]);

        $this->insert(self::TABLE_NAME, [
            'payment' => 500,
        ]);

        $this->insert(self::TABLE_NAME, [
            'payment' => 2500,
        ]);

        $this->insert(self::TABLE_NAME, [
            'payment' => 1250,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);
    }
}

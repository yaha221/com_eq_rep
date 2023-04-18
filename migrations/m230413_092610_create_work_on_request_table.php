<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%work_on_request}}`.
 */
class m230413_092610_create_work_on_request_table extends Migration
{
    const TABLE_NAME = '{{%work_on_request}}';
    
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'work_on_request_id' => $this->primaryKey(),
            'status' => $this->smallInteger()->defaultValue(0)->notNull(),
            'last_work' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        $this->insert(self::TABLE_NAME, [
            'status' => 0,
        ]);

        $this->insert(self::TABLE_NAME, [
            'status' => 1,
        ]);

        $this->insert(self::TABLE_NAME, [
            'status' => 2,
        ]);

        $this->insert(self::TABLE_NAME, [
            'status' => 0,
        ]);

        $this->insert(self::TABLE_NAME, [
            'status' => 2,
        ]);

        $this->insert(self::TABLE_NAME, [
            'status' => 1,
        ]);

        $this->insert(self::TABLE_NAME, [
            'status' => 0,
        ]);

        $this->insert(self::TABLE_NAME, [
            'status' => 2,
        ]);

        $this->insert(self::TABLE_NAME, [
            'status' => 1,
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

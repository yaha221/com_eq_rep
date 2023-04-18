<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%list_bid_work_on_request}}`.
 */
class m230417_150757_create_list_bid_work_on_request_table extends Migration
{
    const TABLE_NAME = '{{%list_bid_work_on_request}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'bid_id' => $this->integer()->notNull(),
            'work_on_request_id' => $this->integer()->notNull(),
        ]);

        $this->insert(self::TABLE_NAME, [
            'bid_id' => 2,
            'work_on_request_id' => 7,
        ]);

        $this->insert(self::TABLE_NAME, [
            'bid_id' => 1,
            'work_on_request_id' => 3,
        ]);

        $this->insert(self::TABLE_NAME, [
            'bid_id' => 3,
            'work_on_request_id' => 1,
        ]);

        $this->insert(self::TABLE_NAME, [
            'bid_id' => 1,
            'work_on_request_id' => 2,
        ]);

        $this->insert(self::TABLE_NAME, [
            'bid_id' => 3,
            'work_on_request_id' => 8,
        ]);

        $this->insert(self::TABLE_NAME, [
            'bid_id' => 2,
            'work_on_request_id' => 5,
        ]);

        $this->insert(self::TABLE_NAME, [
            'bid_id' => 1,
            'work_on_request_id' => 9,
        ]);

        $this->insert(self::TABLE_NAME, [
            'bid_id' => 3,
            'work_on_request_id' => 6,
        ]);

        $this->insert(self::TABLE_NAME, [
            'bid_id' => 2,
            'work_on_request_id' => 4,
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

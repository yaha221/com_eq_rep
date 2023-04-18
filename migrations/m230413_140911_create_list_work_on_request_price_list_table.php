<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%list_work_on_request_price_list}}`.
 */
class m230413_140911_create_list_work_on_request_price_list_table extends Migration
{
    const TABLE_NAME = '{{%list_work_on_request_price_list}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'work_on_request_id' => $this->integer()->notNull(),
            'price_list_id' => $this->integer()->notNull(),
        ]);

        $this->insert(self::TABLE_NAME, [
            'work_on_request_id' => 1,
            'price_list_id' => 3,
        ]);

        $this->insert(self::TABLE_NAME, [
            'work_on_request_id' => 7,
            'price_list_id' => 1,
        ]);

        $this->insert(self::TABLE_NAME, [
            'work_on_request_id' => 8,
            'price_list_id' => 4,
        ]);

        $this->insert(self::TABLE_NAME, [
            'work_on_request_id' => 9,
            'price_list_id' => 6,
        ]);

        $this->insert(self::TABLE_NAME, [
            'work_on_request_id' => 2,
            'price_list_id' => 5,
        ]);

        $this->insert(self::TABLE_NAME, [
            'work_on_request_id' => 6,
            'price_list_id' => 5,
        ]);

        $this->insert(self::TABLE_NAME, [
            'work_on_request_id' => 5,
            'price_list_id' => 2,
        ]);

        $this->insert(self::TABLE_NAME, [
            'work_on_request_id' => 3,
            'price_list_id' => 3,
        ]);

        $this->insert(self::TABLE_NAME, [
            'work_on_request_id' => 4,
            'price_list_id' => 3,
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

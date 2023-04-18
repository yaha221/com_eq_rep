<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%list_bid_payments}}`.
 */
class m230413_092920_create_list_bid_payments_table extends Migration
{
    const TABLE_NAME = '{{%list_bid_payments}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'bid_id' => $this->integer()->notNull(),
            'payment_id' => $this->integer()->notNull(),
        ]);

        $this->insert(self::TABLE_NAME, [
            'bid_id' => 1,
            'payment_id' => 3,
        ]);

        $this->insert(self::TABLE_NAME, [
            'bid_id' => 3,
            'payment_id' => 2,
        ]);

        $this->insert(self::TABLE_NAME, [
            'bid_id' => 2,
            'payment_id' => 4,
        ]);

        $this->insert(self::TABLE_NAME, [
            'bid_id' => 1,
            'payment_id' => 1,
        ]);

        $this->insert(self::TABLE_NAME, [
            'bid_id' => 3,
            'payment_id' => 5,
        ]);

        $this->insert(self::TABLE_NAME, [
            'bid_id' => 2,
            'payment_id' => 6,
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

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%list_bid_masters}}`.
 */
class m230423_145211_create_list_bid_masters_table extends Migration
{
    const TABLE_NAME = '{{%list_bid_masters}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'bid_id' => $this->integer()->notNull(),
            'master_id' => $this->integer()->notNull(),
        ]);

        $this->insert(self::TABLE_NAME, [
            'bid_id' => 2,
            'master_id' => 4,
        ]);

        $this->insert(self::TABLE_NAME, [
            'bid_id' => 3,
            'master_id' => 1,
        ]);

        $this->insert(self::TABLE_NAME, [
            'bid_id' => 1,
            'master_id' => 3,
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

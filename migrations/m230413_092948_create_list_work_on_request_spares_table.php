<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%list_work_on_request_spares}}`.
 */
class m230413_092948_create_list_work_on_request_spares_table extends Migration
{
    const TABLE_NAME = '{{%list_work_on_request_spares}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'work_on_request_id' => $this->integer()->notNull(),
            'spare_id' => $this->integer()->notNull(),
        ]);

        $this->insert(self::TABLE_NAME, [
            'work_on_request_id' => 5,
            'spare_id' => 1,
        ]);

        $this->insert(self::TABLE_NAME, [
            'work_on_request_id' => 7,
            'spare_id' => 3,
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

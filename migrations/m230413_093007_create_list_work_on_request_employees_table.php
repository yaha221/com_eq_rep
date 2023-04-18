<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%list_work_on_request_employees}}`.
 */
class m230413_093007_create_list_work_on_request_employees_table extends Migration
{
    const TABLE_NAME = '{{%list_work_on_request_employees}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'work_on_request_id' => $this->integer()->notNull(),
            'employee_id' => $this->integer()->notNull(),
        ]);

        $this->insert(self::TABLE_NAME, [
            'work_on_request_id' => 5,
            'employee_id' => 3,
        ]);

        $this->insert(self::TABLE_NAME, [
            'work_on_request_id' => 3,
            'employee_id' => 2,
        ]);

        $this->insert(self::TABLE_NAME, [
            'work_on_request_id' => 4,
            'employee_id' => 3,
        ]);

        $this->insert(self::TABLE_NAME, [
            'work_on_request_id' => 7,
            'employee_id' => 3,
        ]);

        $this->insert(self::TABLE_NAME, [
            'work_on_request_id' => 1,
            'employee_id' => 2,
        ]);

        $this->insert(self::TABLE_NAME, [
            'work_on_request_id' => 9,
            'employee_id' => 2,
        ]);

        $this->insert(self::TABLE_NAME, [
            'work_on_request_id' => 2,
            'employee_id' => 3,
        ]);

        $this->insert(self::TABLE_NAME, [
            'work_on_request_id' => 6,
            'employee_id' => 2,
        ]);

        $this->insert(self::TABLE_NAME, [
            'work_on_request_id' => 8,
            'employee_id' => 2,
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

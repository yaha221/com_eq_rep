<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%bid}}`.
 */
class m230413_092510_create_bid_table extends Migration
{
    const TABLE_NAME = '{{%bid}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'bid_id' => $this->primaryKey(),
            'client_id' => $this->bigInteger()->notNull(),
            'equipment_id' => $this->bigInteger()->notNull(),
            'complaints' => $this->text()->notNull(),
            'status' => $this->smallInteger()->notNull(),
            'amount_payable' => $this->integer()->notNull(),
            'remainder' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'last_work' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        $this->insert(self::TABLE_NAME, [
            'client_id' => 1,
            'equipmant_id' => 3,
            'compaints' => 'Проблемы при работе с сетью, так же не работает приложение Проводник',
            'status' => 0,
            'amount_payable' => 7000,
            'remainder' => 1500,
        ]);

        $this->insert(self::TABLE_NAME, [
            'client_id' => 2,
            'equipmant_id' => 1,
            'compaints' => 'Большие просадки производительности при игре в Apex Legends, периодически и вовсе вылетает с синим экраном.',
            'status' => 0,
            'amount_payable' => 4500,
            'remainder' => 2750,
        ]);

        $this->insert(self::TABLE_NAME, [
            'client_id' => 3,
            'equipmant_id' => 2,
            'compaints' => 'Жалоб нет, просто надо поставить лицензионную ОС Windows 11',
            'status' => 0,
            'amount_payable' => 16000,
            'remainder' => 12500,
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

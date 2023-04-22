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
            'client_id' => $this->integer()->notNull(),
            'equipment_id' => $this->integer()->notNull(),
            'complaints' => $this->text()->notNull(),
            'status' => $this->smallInteger()->notNull(),
            'amount_payable' => $this->integer()->notNull(),
            'remainder' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'last_work' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP '),
        ]);

        $this->insert(self::TABLE_NAME, [
            'client_id' => 1,
            'equipment_id' => 3,
            'complaints' => 'Проблемы при работе с сетью, так же не работает приложение Проводник',
            'status' => 0,
            'amount_payable' => 7000,
            'remainder' => 1500,
        ]);

        $this->insert(self::TABLE_NAME, [
            'client_id' => 2,
            'equipment_id' => 1,
            'complaints' => 'Большие просадки производительности при игре в Apex Legends, периодически и вовсе вылетает с синим экраном.',
            'status' => 0,
            'amount_payable' => 4500,
            'remainder' => 2750,
        ]);

        $this->insert(self::TABLE_NAME, [
            'client_id' => 3,
            'equipment_id' => 2,
            'complaints' => 'Жалоб нет, просто надо поставить лицензионную ОС Windows 11',
            'status' => 0,
            'amount_payable' => 16000,
            'remainder' => 12500,
        ]);

        $sql_function = " CREATE  FUNCTION update_updated_on_bid()
        RETURNS TRIGGER AS $$
        BEGIN
            NEW.last_work = now();
            RETURN NEW;
        END;
        $$ language 'plpgsql'; ";
        
        $this->execute($sql_function);
        
        $sql_trigger = "CREATE TRIGGER update_bid_updated_on
        BEFORE UPDATE
        ON
            public.\"bid\"
        FOR EACH ROW
        EXECUTE PROCEDURE update_updated_on_bid();";
        $this->execute($sql_trigger);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute("DROP FUNCTION IF EXISTS `update_updated_on_bid()`;");
        $this->execute("DROP TRIGGER IF EXISTS `update_bid_updated_on`;");
        $this->dropTable(self::TABLE_NAME);
    }
}

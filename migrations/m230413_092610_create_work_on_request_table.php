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
            'price_list_id' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->defaultValue(0)->notNull(),
            'last_work' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP '),
        ]);

        $this->insert(self::TABLE_NAME, [
            'price_list_id' => 3,
            'status' => 0,
        ]);

        $this->insert(self::TABLE_NAME, [
            'price_list_id' => 5,
            'status' => 1,
        ]);

        $this->insert(self::TABLE_NAME, [
            'price_list_id' => 3,
            'status' => 2,
        ]);

        $this->insert(self::TABLE_NAME, [
            'price_list_id' => 3,
            'status' => 0,
        ]);

        $this->insert(self::TABLE_NAME, [
            'price_list_id' => 2,
            'status' => 2,
        ]);

        $this->insert(self::TABLE_NAME, [
            'price_list_id' => 5,
            'status' => 1,
        ]);

        $this->insert(self::TABLE_NAME, [
            'price_list_id' => 1,
            'status' => 0,
        ]);

        $this->insert(self::TABLE_NAME, [
            'price_list_id' => 4,
            'status' => 2,
        ]);

        $this->insert(self::TABLE_NAME, [
            'price_list_id' => 6,
            'status' => 1,
        ]);

        $sql_function = " CREATE  FUNCTION update_updated_on_work_on_request()
        RETURNS TRIGGER AS $$
        BEGIN
            NEW.last_work = now();
            RETURN NEW;
        END;
        $$ language 'plpgsql'; ";
        
        $this->execute($sql_function);
        
        $sql_trigger = "CREATE TRIGGER update_work_on_request_updated_on
        BEFORE UPDATE
        ON
            public.\"work_on_request\"
        FOR EACH ROW
        EXECUTE PROCEDURE update_updated_on_work_on_request();";
        $this->execute($sql_trigger);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute("DROP FUNCTION IF EXISTS `update_updated_on_work_on_request()`;");
        $this->execute("DROP TRIGGER IF EXISTS `update_work_on_request_updated_on`;");
        $this->dropTable(self::TABLE_NAME);
    }
}

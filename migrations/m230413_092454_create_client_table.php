<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%client}}`.
 */
class m230413_092454_create_client_table extends Migration
{
    const TABLE_NAME = '{{%client}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'client_id' => $this->primaryKey(),
            'name' => $this->string(30)->notNull(),
            'surname' => $this->string(50)->notNull(),
            'phone' => $this->string(20)->notNull(),
            'e-mail' => $this->string(100)->unique()->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP '),
        ]);

        $this->insert(self::TABLE_NAME, [
            'name' => 'Ефим',
            'surname' => 'Степин',
            'e-mail' => 'bomj@bomj.b',
            'phone' => '8-800-555-35-35',
        ]);

        $this->insert(self::TABLE_NAME, [
            'name' => 'Мото',
            'surname' => 'Степин',
            'e-mail' => 'moto@moto.m',
            'phone' => '8-555-800-35-35',
        ]);

        $this->insert(self::TABLE_NAME, [
            'name' => 'Анастасия',
            'surname' => 'Шевченко',
            'e-mail' => 'asya@asya.s',
            'phone' => '8-987-765-43-21',
        ]);

        $sql_function = " CREATE  FUNCTION update_updated_on_client()
        RETURNS TRIGGER AS $$
        BEGIN
            NEW.updated_at = now();
            RETURN NEW;
        END;
        $$ language 'plpgsql'; ";
        
        $this->execute($sql_function);
        
        $sql_trigger = "CREATE TRIGGER update_client_updated_on
        BEFORE UPDATE
        ON
            public.\"client\"
        FOR EACH ROW
        EXECUTE PROCEDURE update_updated_on_client();";
        $this->execute($sql_trigger);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute("DROP FUNCTION IF EXISTS `update_updated_on_client()`;");
        $this->execute("DROP TRIGGER IF EXISTS `update_client_updated_on`;");
        $this->dropTable(self::TABLE_NAME);
    }
}

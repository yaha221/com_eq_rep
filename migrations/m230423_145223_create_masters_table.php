<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%masters}}`.
 */
class m230423_145223_create_masters_table extends Migration
{
    const TABLE_NAME = '{{%masters}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'master_id' => $this->primaryKey(),
            'name' => $this->string(30)->notNull(),
            'surname' => $this->string(50)->notNull(),
            'status' => $this->smallInteger()->defaultValue(1)->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP '),
        ]);

        $this->insert(self::TABLE_NAME, [
            'name' => 'Грегорий',
            'surname' => 'Волков',
            'status' => 1,
        ]);

        $this->insert(self::TABLE_NAME, [
            'name' => 'Егор',
            'surname' => 'Голубцов',
            'status' => 1,
        ]);

        $this->insert(self::TABLE_NAME, [
            'name' => 'Анастасия',
            'surname' => 'Макарова',
            'status' => 1,
        ]);

        $this->insert(self::TABLE_NAME, [
            'name' => 'Дмитрий',
            'surname' => 'Блинов',
            'status' => 1,
        ]);

        $sql_function = " CREATE  FUNCTION update_updated_on_masters()
        RETURNS TRIGGER AS $$
        BEGIN
            NEW.updated_at = now();
            RETURN NEW;
        END;
        $$ language 'plpgsql'; ";
        
        $this->execute($sql_function);
        
        $sql_trigger = "CREATE TRIGGER update_masters_updated_on
        BEFORE UPDATE
        ON
            public.\"masters\"
        FOR EACH ROW
        EXECUTE PROCEDURE update_updated_on_masters();";
        $this->execute($sql_trigger);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute("DROP FUNCTION IF EXISTS `update_updated_on_masters()`;");
        $this->execute("DROP TRIGGER IF EXISTS `update_masters_updated_on`;");
        $this->dropTable(self::TABLE_NAME);
    }
}

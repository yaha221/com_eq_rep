<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%spares}}`.
 */
class m230413_092708_create_spares_table extends Migration
{
    const TABLE_NAME = '{{%spares}}';
    
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'spare_id' => $this->primaryKey(),
            'supplier_id' => $this->integer()->notNull(),
            'name' => $this->string(150)->notNull(),
            'description' => $this->text()->notNull(),
            'price' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->notNull(),
            'count' => $this->integer()->notNull(),
            'serial_number' => $this->string(150)->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP '),
        ]);

        $this->insert(self::TABLE_NAME, [
            'supplier_id' => 2,
            'name' => 'Kingston 8 GB 4660 DDR4',
            'description' => 'Оперативная память 4 поколения с тактовой частотой 4660 ГГц объёмом 8 ГБ',
            'price' => 5000,
            'status' => 1,
            'count' => 6,
            'serial_number' => 'H72O7SVW1M96M4',
        ]);

        $this->insert(self::TABLE_NAME, [
            'supplier_id' => 3,
            'name' => 'HDD Silicon Power Diamond 1TB',
            'description' => 'Жёсткий диск объёмом на 1 TB',
            'price' => 3500,
            'status' => 1,
            'count' => 2,
            'serial_number' => 'H279MDHPA5MFY60N0',
        ]);

        $this->insert(self::TABLE_NAME, [
            'supplier_id' => 1,
            'name' => 'Gembird FreeZzz',
            'description' => 'Процессорная термопаста ',
            'price' => 150,
            'status' => 0,
            'count' => 0,
            'serial_number' => 'GF-01-1.5',
        ]);

        $sql_function = " CREATE  FUNCTION update_updated_on_spares()
        RETURNS TRIGGER AS $$
        BEGIN
            NEW.updated_at = now();
            RETURN NEW;
        END;
        $$ language 'plpgsql'; ";
        
        $this->execute($sql_function);
        
        $sql_trigger = "CREATE TRIGGER update_spares_updated_on
        BEFORE UPDATE
        ON
            public.\"spares\"
        FOR EACH ROW
        EXECUTE PROCEDURE update_updated_on_spares();";
        $this->execute($sql_trigger);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute("DROP FUNCTION IF EXISTS `update_updated_on_spares()`;");
        $this->execute("DROP TRIGGER IF EXISTS `update_spares_updated_on`;");
        $this->dropTable(self::TABLE_NAME);
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%suppliers}}`.
 */
class m230413_092745_create_suppliers_table extends Migration
{
    const TABLE_NAME = '{{%supplier}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'supplier_id' => $this->primaryKey(),
            'name' => $this->string(150)->notNull(),
            'description' => $this->text()->notNull(),
            'status' => $this->smallInteger()->defaultValue(1)->notNull(),
            'phone' => $this->string(20)->notNull(),
            'e-mail' => $this->string(100)->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP '),
        ]);

        $this->insert(self::TABLE_NAME, [
            'name' => 'ОАО "КомпКомплект"',
            'description' => 'Наш основной поставщик',
            'status' => 1,
            'e-mail' => 'ComCom.Support@mail.com',
            'phone' => '8-902-535-32-67',
        ]);

        $this->insert(self::TABLE_NAME, [
            'name' => 'ИП "РемКомплект"',
            'description' => 'Альтернатива по заруюежным комплектующим',
            'status' => 1,
            'e-mail' => 'RemCom.Support@mail.com',
            'phone' => '8-923-648-39-21',
        ]);
        
        $this->insert(self::TABLE_NAME, [
            'name' => 'ЗАО "РемБаза"',
            'description' => 'Альтернатива по отечественным комплектующим',
            'status' => 1,
            'e-mail' => 'Baza.Support@mail.com',
            'phone' => '8-992-098-05-83',
        ]);

        $sql_function = " CREATE  FUNCTION update_updated_on_supplier()
        RETURNS TRIGGER AS $$
        BEGIN
            NEW.updated_at = now();
            RETURN NEW;
        END;
        $$ language 'plpgsql'; ";
        
        $this->execute($sql_function);
        
        $sql_trigger = "CREATE TRIGGER update_supplier_updated_on
        BEFORE UPDATE
        ON
            public.\"supplier\"
        FOR EACH ROW
        EXECUTE PROCEDURE update_updated_on_supplier();";
        $this->execute($sql_trigger);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute("DROP FUNCTION IF EXISTS `update_updated_on_supplier()`;");
        $this->execute("DROP TRIGGER IF EXISTS `update_supplier_updated_on`;");
        $this->dropTable(self::TABLE_NAME);
    }
}

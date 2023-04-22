<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%profession}}`.
 */
class m230413_092759_create_profession_table extends Migration
{
    const TABLE_NAME = '{{%profession}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'profession_id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'description' => $this->text()->notNull(),
            'salary' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP '),
        ]);

        $this->insert(self::TABLE_NAME, [
            'name' => 'Директор',
            'description' => 'Основная задача директора следить за выполнение работ и общаться с поставщиками запчастей',
            'salary' => 60000,
        ]);

        $this->insert(self::TABLE_NAME, [
            'name' => 'Мастер по ремонту компьютерной техники',
            'description' => 'Основной задачей является выявление причин неполадок, формирование заявок на запчасти и непосредственный ремонт. Брать с опытом работы не менее полугода',
            'salary' => 35000,
        ]);

        $this->insert(self::TABLE_NAME, [
            'name' => 'Уборщица',
            'description' => 'Приходить с утра за час до начала работы и наводить порядок в соответствии с положением',
            'salary' => 15000,
        ]);

        $this->insert(self::TABLE_NAME, [
            'name' => 'Администартор',
            'description' => 'Основная задача, встречать вновь прибовших клиентов и формировать заявки на ремонт. Обязательно иметь опыт в работе с ПК, а так же минимальное знание устройства ПК',
            'salary' => 20000,
        ]);

        $sql_function = " CREATE  FUNCTION update_updated_on_profession()
        RETURNS TRIGGER AS $$
        BEGIN
            NEW.updated_at = now();
            RETURN NEW;
        END;
        $$ language 'plpgsql'; ";
        
        $this->execute($sql_function);
        
        $sql_trigger = "CREATE TRIGGER update_profession_updated_on
        BEFORE UPDATE
        ON
            public.\"profession\"
        FOR EACH ROW
        EXECUTE PROCEDURE update_updated_on_profession();";
        $this->execute($sql_trigger);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute("DROP FUNCTION IF EXISTS `update_updated_on_profession()`;");
        $this->execute("DROP TRIGGER IF EXISTS `update_profession_updated_on`;");
        $this->dropTable(self::TABLE_NAME);
    }
}

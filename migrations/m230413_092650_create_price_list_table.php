<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%price_list}}`.
 */
class m230413_092650_create_price_list_table extends Migration
{
    const TABLE_NAME = '{{%price_list}}';
    
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'price_list_id' => $this->primaryKey(),
            'name' => $this->string(150)->notNull(),
            'description' => $this->text()->notNull(),
            'price' => $this->string(20)->defaultValue(false)->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP '),
        ]);

        $this->insert(self::TABLE_NAME, [
            'name' => 'Замена комплектующих',
            'description' => 'В стоимость входит замена зап.части плюс стоимость самой зап части',
            'price' => 1000,
        ]);

        $this->insert(self::TABLE_NAME, [
            'name' => 'Замена термопасты',
            'description' => 'В стоимость входит замена термопасты плюс небольшая наценка за термопасту',
            'price' => 500,
        ]);

        $this->insert(self::TABLE_NAME, [
            'name' => 'Обновление драйверов',
            'description' => 'В стоимость входит установка и настройка драйверов',
            'price' => 1000,
        ]);

        $this->insert(self::TABLE_NAME, [
            'name' => 'Установка лицензионной Windows',
            'description' => 'В стоимость входит сама лицензия, установка и настройка ОС',
            'price' => 12000,
        ]);

        $this->insert(self::TABLE_NAME, [
            'name' => 'Проверка компьютера на вирусы',
            'description' => 'В стоимость входит нахождение разногодного вредоносного ПО и удаление его с системы, если требуется сохранить нынешнюю систему (без переустановки)',
            'price' => 3000,
        ]);

        $this->insert(self::TABLE_NAME, [
            'name' => 'Полная чистка компьютера',
            'description' => 'Полный разбор компьютера с чисткой от пыли и грязи, а так же проверка различных контактов на окисление.',
            'price' => 3000,
        ]);

        $sql_function = " CREATE  FUNCTION update_updated_on_price_list()
        RETURNS TRIGGER AS $$
        BEGIN
            NEW.updated_at = now();
            RETURN NEW;
        END;
        $$ language 'plpgsql'; ";
        
        $this->execute($sql_function);
        
        $sql_trigger = "CREATE TRIGGER update_price_list_updated_on
        BEFORE UPDATE
        ON
            public.\"price_list\"
        FOR EACH ROW
        EXECUTE PROCEDURE update_updated_on_price_list();";
        $this->execute($sql_trigger);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute("DROP FUNCTION IF EXISTS `update_updated_on_price_list()`;");
        $this->execute("DROP TRIGGER IF EXISTS `update_price_list_updated_on`;");
        $this->dropTable(self::TABLE_NAME);
    }
}

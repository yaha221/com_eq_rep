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
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
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
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);
    }
}

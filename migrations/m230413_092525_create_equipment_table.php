<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%equipment}}`.
 */
class m230413_092525_create_equipment_table extends Migration
{
    const TABLE_NAME = '{{%equipment}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'equipment_id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'serial_number' => $this->string(150)->notNull(),
            'type_of_equipment' => $this->string(100)->notNull(),
            'manufacturer' => $this->string(150)->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'last_work' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        $this->insert(self::TABLE_NAME, [
            'name' => 'HP Omen 17-an013ur(2CK21EA)',
            'serial_number' => 'H4IS927CNJ7541B',
            'type_of_equipment' => 'PC',
            'manufacturer' => 'HP',
        ]);

        $this->insert(self::TABLE_NAME, [
            'name' => 'ProArt Studiobook Pro 16 OLED',
            'serial_number' => 'WYM241IB9LC82I',
            'type_of_equipment' => 'Laptop',
            'manufacturer' => 'ASUS',
        ]);

        $this->insert(self::TABLE_NAME, [
            'name' => 'GYGABYTE G5 GE',
            'serial_number' => 'NE9O1BY64QY8AXZ',
            'type_of_equipment' => 'Laptop',
            'manufacturer' => 'GIGABYTE',
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

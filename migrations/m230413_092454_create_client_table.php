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
            'sex' => $this->boolean()->notNull(),
            'phone' => $this->string(20)->notNull(),
            'e-mail' => $this->string(100)->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        $this->insert(self::TABLE_NAME, [
            'name' => 'Ефим',
            'surname' => 'Степин',
            'sex' => true,
            'e-mail' => 'bomj@bomj.b',
            'phone' => '8-800-555-35-35',
        ]);

        $this->insert(self::TABLE_NAME, [
            'name' => 'Мото',
            'surname' => 'Степин',
            'sex' => true,
            'e-mail' => 'moto@moto.m',
            'phone' => '8-555-800-35-35',
        ]);

        $this->insert(self::TABLE_NAME, [
            'name' => 'Анастасия',
            'surname' => 'Шевченко',
            'sex' => false,
            'e-mail' => 'asya@asya.s',
            'phone' => '8-987-765-43-21',
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

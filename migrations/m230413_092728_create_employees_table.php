<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employees}}`.
 */
class m230413_092728_create_employees_table extends Migration
{
    const TABLE_NAME = '{{%employees}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'employee_id' => $this->primaryKey(),
            'profession_id' => $this->integer()->notNull(),
            'name' => $this->string(30)->notNull(),
            'surname' => $this->string(50)->notNull(),
            'expirience' => $this->smallInteger()->defaultValue(6)->notNull(),
            'wage' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->defaultValue(1)->notNull(),
            'sex' => $this->boolean()->notNull(),
            'phone' => $this->string(20)->notNull(),
            'e-mail' => $this->string(100)->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        $this->insert(self::TABLE_NAME, [
            'profession_id' => 3,
            'name' => 'Зинаида',
            'surname' => 'Авдеева',
            'experience' => 36,
            'wage' => 20000,
            'status' => 1,
            'sex' => false,
            'e-mail' => 'pensia_ne_v_radosti@yandex.com',
            'phone' => '8-945-378-12-21',
        ]);

        $this->insert(self::TABLE_NAME, [
            'profession_id' => 2,
            'name' => 'Грегорий',
            'surname' => 'Волков',
            'experience' => 30,
            'wage' => 40000,
            'status' => 1,
            'sex' => true,
            'e-mail' => 'ne_hochy_rabotati@yandex.com',
            'phone' => '8-901-794-09-40',
        ]);

        $this->insert(self::TABLE_NAME, [
            'profession_id' => 2,
            'name' => 'Егор',
            'surname' => 'Голубцов',
            'experience' => 18,
            'wage' => 35000,
            'status' => 1,
            'sex' => true,
            'e-mail' => 'jezni_tlen@yandex.com',
            'phone' => '8-992-324-53-01',
        ]);

        $this->insert(self::TABLE_NAME, [
            'profession_id' => 4,
            'name' => 'Анастасия',
            'surname' => 'Макарова',
            'experience' => 0,
            'wage' => 20000,
            'status' => 1,
            'sex' => false,
            'e-mail' => 'nogotochki@yandex.com',
            'phone' => '8-981-902-03-44',
        ]);

        $this->insert(self::TABLE_NAME, [
            'profession_id' => 1,
            'name' => 'Дмитрий',
            'surname' => 'Блинов',
            'experience' => 12,
            'wage' => 70000,
            'status' => 1,
            'sex' => true,
            'e-mail' => 'yspeshniy_yspech@yandex.com',
            'phone' => '8-932-492-90-09',
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

<?php

use yii\db\Migration;

/**
 * Class m230106_113347_user
 */
class m230106_113347_user extends Migration
{
    const TABLE_NAME = '{{%user}}';

    public function up()
    {
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'username' => $this->string(50),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'status' => $this->smallInteger()->defaultValue(1)->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'register_ip' => $this->string(45),
            'last_login' => $this->timestamp()->defaultValue(null),
            'last_login_ip' => $this->string(45),
        ],);

        $this->createIndex('unq_email', '{{%user}}', 'email', true);

        $this->insert('user', [
            'username' => 'Админ',
            'auth_key' => 'admin',
            'password_hash' => '$2y$13$yDRGiLCNaoaIsEgSiwYC9e/XNs1plY9t5DO4AkNmrgoJOlH7c8Adi',
            'email' => 'admin@admin.a',
        ]);

        $this->insert('user', [
            'username' => 'Пользователь',
            'auth_key' => 'user',
            'password_hash' => '$2y$13$yDRGiLCNaoaIsEgSiwYC9e/XNs1plY9t5DO4AkNmrgoJOlH7c8Adi',
            'email' => 'user@user.u',
        ]);

        $sql_function = " CREATE  FUNCTION update_updated_on_user()
        RETURNS TRIGGER AS $$
        BEGIN
            NEW.updated_at = now();
            RETURN NEW;
        END;
        $$ language 'plpgsql'; ";
        
        $this->execute($sql_function);
        
        $sql_trigger = "CREATE TRIGGER update_user_updated_on
        BEFORE UPDATE
        ON
            public.\"user\"
        FOR EACH ROW
        EXECUTE PROCEDURE update_updated_on_user();";
        $this->execute($sql_trigger);

    }

    public function down()
    {
        $this->execute("DROP FUNCTION IF EXISTS `update_updated_on_user()`;");
        $this->execute("DROP TRIGGER IF EXISTS `update_user_updated_on`;");
        $this->dropTable('{{%user}}');
    }
}

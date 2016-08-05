<?php

use yii\db\Migration;

class m160805_102153_users extends Migration
{
    public function up()
    {

        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'role_id' => $this->integer(),
            'name' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'email_confirm' => "enum('0','1') NOT NULL DEFAULT '0'",
            'confirm_code' => $this->string(),
            'password' => $this->string(40)->notNull(),
//            'access_token' => $this->string(32)->notNull(),
            'auth_key' => $this->string(32),



        ]);


        $this->addForeignKey(
            'fk-users-role_id',
            'users',
            'role_id',
            'roles',
            'id',
            'CASCADE'
        );


    }

    public function down()
    {
        $this->dropTable('users');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}

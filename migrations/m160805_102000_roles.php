<?php

use yii\db\Migration;

class m160805_102000_roles extends Migration
{
    public function up()
    {
        $this->createTable('roles', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),


        ]);
    }

    public function down()
    {
        $this->dropTable('roles');
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

<?php

use yii\db\Migration;

class m160805_140616_letters extends Migration
{
    public function up()
    {

        $this->createTable('letters', [
            'id' => $this->primaryKey(),
            'email' => $this->string()->notNull(),
            'text' => $this->text(),
            'created_at' => $this->string(),
            'updated_at' => $this->string(),



        ]);


    }

    public function down()
    {
        $this->dropTable('letters');

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

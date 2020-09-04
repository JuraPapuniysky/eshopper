<?php

use yii\db\Migration;

class m160721_073410_update_order extends Migration
{
    public function up()
    {
        $this->addColumn('{{%order}}', 'order_number', \yii\db\mysql\Schema::TYPE_STRING. ' NOT NULL');
    }

    public function down()
    {
        echo "m160721_073410_update_order cannot be reverted.\n";

        return false;
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

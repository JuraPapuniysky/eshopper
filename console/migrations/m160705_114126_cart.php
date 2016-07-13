<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

class m160705_114126_cart extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%order}}',[
            'id' => Schema::TYPE_PK,
            'first_name' => Schema::TYPE_STRING. ' NOT NULL',
            'last_name' => Schema::TYPE_STRING. ' NOT NULL',
            'email' => Schema::TYPE_STRING. ' NOT NULL',
            'phone' => Schema::TYPE_STRING. ' NOT NULL',
            'addres' => Schema::TYPE_STRING. ' NOT NULL',
            'status' => Schema::TYPE_SMALLINT. " NOT NULL DEFAULT '1'",
            'time_stamp' => Schema::TYPE_TIMESTAMP. ' NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%order_product}}',[
            'product_id' => Schema::TYPE_INTEGER. ' NOT NULL',
            'size_id' => Schema::TYPE_INTEGER. ' NOT NULL',
            'order_id' => Schema::TYPE_INTEGER. ' NOT NULL',
            'count' => Schema::TYPE_INTEGER. ' NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%size}}', [
            'id' => Schema::TYPE_PK,
            'gender_id' => Schema::TYPE_STRING. ' NOT NULL',
            'size' => Schema::TYPE_STRING. ' NOT NULL',
            'description' => Schema::TYPE_STRING. ' NOT NULL',
        ], $tableOptions);

        $this->createIndex('FK_orderproduct_product', '{{%order_product}}', 'product_id');
        $this->addForeignKey(
            'FK_orderproduct_product', '{{%order_product}}', 'product_id', '{{%product}}', 'id'
        );

        $this->createIndex('FK_orderproduct_order', '{{%order_product}}', 'order_id');
        $this->addForeignKey(
            'FK_orderproduct_order', '{{%order_product}}', 'order_id', '{{%order}}', 'id'
        );

        
    }



    public function down()
    {
        echo "m160705_114126_cart cannot be reverted.\n";

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
